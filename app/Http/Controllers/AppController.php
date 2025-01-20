<?php

namespace App\Http\Controllers;

use App\Mail\RecoveryMail;
use App\Models\Appconfig;
use App\Models\Contact;
use App\Models\Depot;
use App\Models\Invoice;
use App\Models\Paiement;
use App\Models\Pay;
use App\Models\Pending;
use App\Models\Product;
use App\Models\Profil;
use App\Models\Publication;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;


class AppController extends Controller
{
    function login()
    {
        $login = request('login');
        $data['password'] = request('pass');
        $data['email'] = $login;

        if (Auth::attempt($data, request()->has('remember'))) {
            $user = auth()->user();

            return [
                'success' => true,
                'message' => "Connexion reussie.",
                'token' => $user->createToken('token')->plainTextToken
            ];
        }
        return [
            'success' => false,
            'message' => "Echec de connexion."
        ];
    }

    function logout()
    {
        if (Auth::check()) {
            Auth::logout();
        }
        return [];
    }


    function fpi()
    {
        $validator = Validator::make(request()->all(), [
            'phone' => 'required|string|min:10|max:10',
            'paiement_id' => 'required|exists:paiement,id',
        ]);

        if ($validator->fails()) {
            return [
                'message' => implode(" ", $validator->errors()->all())
            ];
        }
        $phone = request('phone');
        if (!isvalidenumber($phone)) {
            return [
                'message' => "Numéro de téléphone non valide"
            ];
        }

        $paiement = Paiement::where('id', request('paiement_id'))->first();
        $devise = $paiement->devise;
        $montant = $paiement->montant;

        $np = Transaction::where(['users_id' => auth()->user()->id, 'paiement_id' => $paiement->id])->sum('montant');
        $canpay = $paiement->montant > $np;
        if (!$canpay) {
            return [
                'message' => "Vous ne pouvez pas effectuer cette opération."
            ];
        }

        if ($devise == 'CDF' && $montant < 500) {
            return [
                'message' => 'Le montant minimum de paiement est de 500 FC'
            ];
        }
        if ($devise == 'USD' && $montant < 1) {
            return [
                'message' => 'Le montant minimum de paiement est de 1 USD'
            ];
        }
        abort_if(!in_array(auth()->user()->user_role, ['nurse']), 403);

        $pdata = compact('phone', 'devise', 'montant');
        $myref = uniqid('TRANS.', true);

        $insertdata = [
            'users_id' => auth()->user()->id,
            'paiement_id' => $paiement->id,
            'montant' => $montant,
            'devise' => $devise,
            'ref' => $myref,
            'date' => nnow(),
        ];
        $pdata['insertdata'] = $insertdata;

        $fp = Pay::create([
            'data' => json_encode($pdata),
            'myref' => $myref,
            'failed' => 0,
            'saved' => 0,
            'date' => nnow(),
        ]);

        $pn = "243" . ((int) $phone);
        $rep = gopay_init_payment($montant, $devise, $pn, $myref);

        if ($rep->success) {
            $pdata['apiresponse'] = $rep->data;
            $fp->update(['data' => json_encode($pdata), 'ref' => $rep->data->ref]);
        }
        return [
            'success' => $rep->success,
            'message' => $rep->message,
            'myref' => $myref
        ];
    }
    function fpc()
    {
        $myref = request()->myref;
        $ok =  false;
        $saved = 0;
        $trans = Pay::where(['myref' => $myref])->lockForUpdate()->first();

        if (!$trans) {
            return response([
                'success' => false,
                'message' => "Invalid ref"
            ]);
        };

        $t = transaction_status($myref);
        $status =   @$t->status;

        if ($status === 'success') {
            $saved = @Pay::where(['myref' => $myref])->first()->saved;
            if ($saved !== 1) {
                saveData($trans);
                $ok =  true;
                $trans->update(['failed' => 0]);
            }
        } else if ($status === 'failed') {
            $trans->update(['failed' => 1]);
        }

        if ($ok || $saved === 1 || @$trans->saved === 1) {
            return response([
                'success' => true,
                'message' => 'Votre paiement est effectué avec succès.',
                'transaction' => $t
            ]);
        } else {
            $m = "Aucun paiement trouvé.";
            return response([
                'success' => false,
                'message' => $m,
                'transaction' => $t
            ]);
        }
    }

    function newu()
    {
        $role = request('role');
        $affilie = request('affilie');
        abort_if(!in_array($role, ['user', 'nurse']), 403, "Invalide role : $role");
        abort_if(!in_array($affilie, ['OUI', 'NON']), 403);

        if ('nurse' == $role) {
            $rules =  [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required',
                'phone' => 'required|unique:users,phone',
                'genre' => 'required|in:M,F',
                'niveauetude' => 'required|in:' . implode(',', getlevel()),
                'etatcivil' => 'required|in:' . implode(',', getstate()),
                'numeroordre' => 'sometimes|max:200',
                'adresse' => 'required|string|max:200',
                'file' => 'sometimes|mimes:pdf',
                'image' => 'sometimes|mimes:png,jpg,jpeg',
                'datenaissance' => 'required|date',
            ];
            if ('OUI' == $affilie) {
                $rules['structuresante_id'] = 'required|exists:structuresante,id';
            }
        } else if ('user' == $role) {
            $rules =  [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required',
                'phone' => 'required|max:10,min:10|unique:users,phone',
            ];
        }

        $validator = Validator::make(request()->all(), $rules);

        if ($validator->fails()) {
            return [
                'message' => implode(" ", $validator->errors()->all())
            ];
        }

        $data  = $validator->validated();

        $data['password'] = Hash::make($data['password']);
        $data['name'] = ucfirst($data['name']);
        $data['user_role'] =  $role;

        DB::transaction(function () use ($data) {
            if (request('image')) {
                $data['image'] = request('image')->store('image', 'public');
            }
            $user = User::create($data);
            $data['users_id'] = $user->id;
            if (request('file')) {
                $data['fichier'] = request('file')->store('driver', 'public');
            }
            Profil::create($data);
            Auth::login($user, true);
        });

        $user = auth()->user();
        return [
            'success' => true,
            'message' => 'Votre compte a été créé. Bienvenue.',
            'token' => $user->createToken('token')->plainTextToken
        ];
    }


    function updatepass()
    {
        $validator = Validator::make(request()->all(), [
            'password' => 'required|string',
            'npassword' => 'required|string|min:6|same:cpassword',
            'cpassword' => 'required|string|min:6|',
        ], ['npassword.same' => "Les deux mot de passe sont différents."]);


        if ($validator->fails()) {
            return [
                'message' => implode(" ", $validator->errors()->all())
            ];
        }

        $cp = request()->password;
        $np = request()->npassword;
        $user = auth()->user();

        if (!(Hash::check($cp, $user->password))) {
            return [
                'message' => 'Le mot de passe actuel que vous avez saisi est incorrect.'
            ];
        }

        User::where('id', $user->id)->update(['password' => Hash::make($np)]);
        return [
            'success' => true,
            'message' => 'Votre mot de passe a été modifié.',
        ];
    }

    function updateinfo()
    {
        $user = auth()->user();
        $rules =  [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'required|unique:users,phone,' . $user->id,
            'genre' => 'required|in:M,F',
            'niveauetude' => 'required|in:' . implode(',', getlevel()),
            'etatcivil' => 'required|in:' . implode(',', getstate()),
            'numeroordre' => 'sometimes|max:200',
            'adresse' => 'required|string|max:200',
            'file' => 'sometimes|mimes:pdf',
            'image' => 'sometimes|mimes:png,jpg,jpeg',
            'datenaissance' => 'required|date',
        ];
        $validator = Validator::make(request()->all(), $rules);

        if ($validator->fails()) {
            return [
                'message' => implode(" ", $validator->errors()->all())
            ];
        }

        $data  = $validator->validated();
        DB::transaction(function () use ($data, $user) {
            $profil = $user->profils->first();
            if (request('image')) {
                $data['image'] = request('image')->store('image', 'public');
                File::delete('storage/' . $user->image);
            }
            $user->update($data);
            if (request('file')) {
                $data['fichier'] = request('file')->store('driver', 'public');
                File::delete('storage/' . $profil->fichier);
            }
            $profil->update($data);
        });

        return [
            'success' => true,
            'message' => "Votre profil a été mis à jour."
        ];
    }

    function contact()
    {
        $rules =  [
            'nom' => 'required',
            'telephone' => 'required',
            'email' => 'required|email',
            'sujet' => 'required|string|max:100',
            'message' => 'required|string|max:300',
        ];

        $validator = Validator::make(request()->all(), $rules);

        if ($validator->fails()) {
            return [
                'message' => implode(" ", $validator->errors()->all())
            ];
        }

        $data  = $validator->validated();
        Contact::create($data);

        return [
            'success' => true,
            'message' => 'Merci de nous avoir contacter, nous reviendrons à vous si nécessaire.',
        ];
    }

    function appconfig()
    {
        $rules =  [
            'tel' => 'sometimes',
            'email' => 'sometimes|email',
            'adresse' => 'sometimes|string|max:100',
            'description' => 'sometimes|string|max:255',
            'logo' => 'sometimes|mimes:png,jpg,jpeg|max:1200',
        ];

        $validator = Validator::make(request()->all(), $rules);

        if ($validator->fails()) {
            return [
                'message' => implode(" ", $validator->errors()->all())
            ];
        }

        $data  = $validator->validated();
        $ac = Appconfig::first();
        if ($ac) {
            unset($data['logo']);
            $ac->update($data);
        } else {
            $ac = Appconfig::create($data);
        }

        if (request()->has('logo')) {
            $data['logo'] = request('logo')->store('image', 'public');
            File::delete('storage/' . $ac->logo);
            $ac->update($data);
        }

        return [
            'success' => true,
            'message' => 'Données enregistrées.',
        ];
    }

    function search()
    {
        $q = request('q');
        $q = explode(' ', $q);
        $q = array_filter($q);

        if (!count($q)) {
            return [];
        }

        $data =  User::with(['profils', 'profils.structuresante']);
        $data =  DB::table('users')
            ->join('profil', 'profil.users_id', '=', 'users.id')
            ->join('structuresante', 'structuresante.id', '=', 'profil.structuresante_id')
            ->join('airesante', 'airesante.id', '=', 'structuresante.airesante_id')
            ->join('zonesante', 'zonesante.id', '=', 'airesante.zonesante_id');

        foreach ($q as $s) {
            $data = $data->orWhere(function ($query) use ($s) {
                $query->orWhere('name', 'like', "%$s%");
                $query->orWhere('phone', 'like', "%$s%");
                $query->orWhere('email', 'like', "%$s%");
                $query->orWhere('niveauetude', 'like', "%$s%");
                $query->orWhere('genre', 'like', "%$s%");
                $query->orWhere('numeroordre', 'like', "%$s%");
                $query->orWhere('etatcivil', 'like', "%$s%");
                $query->orWhere('structure', 'like', "%$s%");
                $query->orWhere('structuresante.adresse', 'like', "%$s%");
                $query->orWhere('airesante', 'like', "%$s%");
                $query->orWhere('zonesante', 'like', "%$s%");
            });
        }
        $data->orderBy('name');
        $data = $data->get();

        return $data;
    }

    function blog()
    {
        $t = Publication::orderBy('datemaj', 'desc')->orderBy('id', 'desc')->with(['user', 'categoriepublication'])->paginate(5);
        $tab = [];
        foreach ($t->getCollection() as $el) {
            $o = (object)$el->toArray();
            $o->date = $el->date?->format('d-m-Y H:i:s');
            $o->datemaj = $el->datemaj?->format('d-m-Y H:i:s');
            $o->image = asset('storage/' . $el->image);
            $tab[] = $o;
        }

        $data = $t->toArray();
        $data['data'] = $tab;

        return $data;
    }
}

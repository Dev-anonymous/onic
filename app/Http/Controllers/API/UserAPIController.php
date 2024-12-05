<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Profil;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $role = auth()->user()->user_role;
        $data = [];
        if ('admin' == $role) {
            $type = request('type');
            $t = User::orderBy('name')->where('user_role', $type);

            foreach ($t->get() as $el) {
                $o = (object)$el->toArray();
                $o->image = userimage($el);

                $profil = $el->profils->first();
                $pro = [];
                if ($profil) {
                    $pro['datenaissance'] = $profil->datenaissance?->format('d-m-Y');
                    $pro['age'] = (new Carbon($profil->datenaissance))->diffInYears() . ' ans';
                    $pro['genre'] = $profil->genre;
                    $pro['niveauetude'] = $profil->niveauetude;
                    $pro['numeroordre'] = $profil->numeroordre;
                    $pro['adresse'] = $profil->adresse;
                    $pro['structure'] = $profil->structuresante?->structure ?? '';
                    $pro['zone'] = $profil->structuresante?->airesante?->zonesante?->zonesante ?? '';
                    $pro['aire'] = $profil->structuresante?->airesante?->airesante ?? '';
                    $pro['fichier'] = asset('storage/' . $profil->fichier);
                    $pro['niveauetude'] = $profil->niveauetude;
                    $pro['etatcivil'] = $profil->etatcivil;
                }
                $o->profil = (object)$pro;

                $pai = [];

                foreach ($el->paiements()->orderBy('id', 'desc')->get() as $el) {
                }
                $o->trans = $pai;

                $data[] = $o;
            }
        }

        return [
            'success' => true,
            'data' => $data
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_role = request('user_role');
        $rules =  [
            'user_role' => 'required|in:admin',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'image' => 'sometimes|mimes:jpeg,jpg,png|max:500',
            'phone' => 'required|max:10,min:10',
        ];


        $validator = Validator::make(request()->all(), $rules);

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
        $data  = $validator->validated();

        DB::beginTransaction();
        if ($request->hasFile('image')) {
            $data['image'] = request()->file('image')->store('image', 'public');
        }

        $data['password'] = Hash::make($data['password']);
        $data['name'] = ucfirst($data['name']);
        $data['users_id'] = auth()->user()->id;
        $user = User::create($data);

        DB::commit();

        return ['success' => true, 'message' => 'Utilisateur créé.'];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $u = auth()->user();
        $user_role = $user->user_role;
        $rules =  [
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $user->id,
            'password' => 'sometimes',
            'image' => 'sometimes|mimes:jpeg,jpg,png|max:500',
            'phone' => 'required|max:10,min:10||unique:users,phone,' . $user->id,
        ];

        $validator = Validator::make(request()->all(), $rules);

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
        $data  = $validator->validated();
        $ps = request('password');
        if (!empty($ps)) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        if ($request->hasFile('image')) {
            File::delete('storage/' . $user->image);
            $data['image'] = request()->file('image')->store('image', 'public');
        }

        $data['name'] = ucfirst($data['name']);
        DB::beginTransaction();
        $user->update($data);
        DB::commit();

        return ['success' => true, 'message' => 'Utilisateur mis à jour.'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        abort_if(auth()->user()->user_role != 'admin', 403);
        if (auth()->user()->id == $user->id) {
            return [
                'message' => 'Veuillez demander à un autre administrateur de supprimer votre compte'
            ];
        }

        if ($user->user_role == 'nurse') {
            if ($user->transactions()->first()) {
                return [
                    'message' => 'Impossible de supprimer un compte infirmier avec des transactions en cours.'
                ];
            }

            $profil = $user->profils->first();
            if ($profil) {
                File::delete('storage/' . $profil->fichier);
            }
        }

        File::delete('storage/' . $user->image);
        $user->delete();
        return ['success' => true, 'message' => 'Compte supprimé'];
    }
}

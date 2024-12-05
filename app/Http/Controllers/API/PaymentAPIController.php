<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Paiement;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymentAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $t = Paiement::orderBy('id', 'desc')->get();

        $data = [];
        foreach ($t as $el) {
            $o = (object)$el->toArray();
            $o->fmontant = v($el->montant, $el->devise);
            $o->date = $el->date?->format('d-m-Y H:i:s');

            if ('admin' == $user->user_role) {
                $nurse = User::where('user_role', 'nurse')->count();
                $np = $el->transactions()->groupBy('users_id')->count();
                $n = "$np/$nurse";
                $perc = 0;
                if ($nurse) {
                    $perc = round($np * 100 / $nurse);
                }
                $o->perc = $perc;
                $cl = 'success';
                if ($perc < 50) {
                    $cl = 'danger';
                }
                if ($perc >= 50 && $perc <= 99) {
                    $cl = 'warning';
                }
                $o->cl = $cl;
                $o->n = $n;
            }
            if ('nurse' == $user->user_role) {
                $np = Transaction::where(['users_id' => $user->id, 'paiement_id' => $el->id])->sum('montant');
                $o->canpay = $el->montant > $np;
            }
            $data[] = $o;
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
        $user_role = auth()->user()->user_role;
        abort_if('admin' != $user_role, 403);

        $rules =  [
            'montant' => 'required|numeric|min:1',
            'devise' => 'required|in:CDF,USD',
            'description' => 'required|max:100|unique:paiement',
        ];

        $validator = Validator::make(request()->all(), $rules);

        if ($validator->fails()) {
            return [
                'message' => implode(" ", $validator->errors()->all())
            ];
        }

        $m = request('montant');
        $dev = request('devise');
        if ('CDF' == $dev and 500 > $m) {
            return ['message' => 'Le montant minimun de paiement est de 500 CDF'];
        }
        if ('USD' == $dev and 1 > $m) {
            return ['message' => 'Le montant minimun de paiement est de 1 USD'];
        }

        $data  = $validator->validated();
        $data['users_id'] = auth()->user()->id;
        $data['date'] = nnow();
        Paiement::create($data);

        return ['success' => true, 'message' => 'Paiement créé avec succè.'];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paiement  $paiement
     * @return \Illuminate\Http\Response
     */
    public function show(Paiement $paiement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paiement  $paiement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paiement $paiement)
    {
        $user_role = auth()->user()->user_role;
        abort_if('admin' != $user_role, 403);

        $n = $paiement->transactions()->count();
        if ($n) {
            return ['success' => false, 'message' => 'Ce paiement est lié à ' . $n . ' transaction(s).'];
        }

        $rules =  [
            'montant' => 'required|numeric|min:1',
            'devise' => 'required|in:CDF,USD',
            'description' => 'required|max:100|unique:paiement,description,' . $paiement->id,
        ];

        $validator = Validator::make(request()->all(), $rules);

        if ($validator->fails()) {
            return [
                'message' => implode(" ", $validator->errors()->all())
            ];
        }

        $m = request('montant');
        $dev = request('devise');
        if ('CDF' == $dev and 500 > $m) {
            return ['message' => 'Le montant minimun de paiement est de 500 CDF'];
        }
        if ('USD' == $dev and 1 > $m) {
            return ['message' => 'Le montant minimun de paiement est de 1 USD'];
        }

        $data  = $validator->validated();
        $data['users_id'] = auth()->user()->id;
        $data['date'] = nnow();
        $paiement->update($data);

        return ['success' => true, 'message' => 'Paiement mis à jour avec succè.'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paiement  $paiement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paiement $paiement)
    {
        $user_role = auth()->user()->user_role;
        abort_if('admin' != $user_role, 403);

        $n = $paiement->transactions()->count();
        if ($n > 0) {
            return ['success' => false, 'message' => 'Ce paiement est lié à ' . $n . ' transaction(s).'];
        }
        $paiement->delete();
        return ['success' => true, 'message' => 'Le paiement a été supprimé'];
    }
}

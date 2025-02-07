<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Structuresante;
use App\Models\Zonesante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ZoneSanteAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $t = Zonesante::orderBy('zonesante')->get();
        $data = [];
        foreach ($t as $el) {
            $o = (object)$el->toArray();
            $o->airesante = $el->airesantes()->count();
            $o->structuresante = Structuresante::whereIn('airesante_id', $el->airesantes()->pluck('id')->all())->count();
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
            'zonesante' => 'required',
        ];

        $validator = Validator::make(request()->all(), $rules);

        if ($validator->fails()) {
            return [
                'message' => implode(" ", $validator->errors()->all())
            ];
        }
        $data  = $validator->validated();

        $zonesante = explode(';', request('zonesante'));
        $zonesante =  array_unique($zonesante);

        $exist = [];
        $added = [];
        foreach ($zonesante as $el) {
            if (Zonesante::where('zonesante', $el)->first()) {
                $exist[] = $el;
            } else {
                Zonesante::create(['zonesante' => ucfirst(trim($el))]);
                $added[] = $el;
            }
        }
        $m = [];
        if (count($added)) {
            $m[] = "Zone de santé créée avec succès ( " . implode(', ', $added) . ')';
        }

        if (count($exist)) {
            $m[] = "Ces zones ont été ignorées : " . implode(', ', $exist) . '';
        }

        return ['success' => (bool) count($added), 'message' => $m];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Zonesante  $zonesante
     * @return \Illuminate\Http\Response
     */
    public function show(Zonesante $zonesante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Zonesante  $zonesante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Zonesante $zonesante)
    {
        $user_role = auth()->user()->user_role;
        abort_if('admin' != $user_role, 403);

        $rules =  [
            'zonesante' => 'required|unique:zonesante,zonesante,' . $zonesante->id,
        ];

        $validator = Validator::make(request()->all(), $rules);

        if ($validator->fails()) {
            return [
                'message' => implode(" ", $validator->errors()->all())
            ];
        }
        $data  = $validator->validated();
        $zonesante->update($data);

        return ['success' => true, 'message' => 'Zone de santé mise à jour.'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Zonesante  $zonesante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Zonesante $zonesante)
    {
        $user_role = auth()->user()->user_role;
        abort_if('admin' != $user_role, 403);

        $n = $zonesante->airesantes()->count();
        if ($n > 0) {
            return ['success' => false, 'message' => 'Cette zone contient ' . $n . ' aire(s) de santé.'];
        }
        $zonesante->delete();
        return ['success' => true, 'message' => 'La zone de santé a été supprimée'];
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Airesante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AireSanteAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $t = Airesante::orderBy('airesante')->get();
        $data = [];
        foreach ($t as $el) {
            $o = (object)$el->toArray();
            $o->zonesante = $el->zonesante->zonesante;
            $o->structuresante = $el->structuresantes->count();
            $data[] = $o;
        }
        return [
            'success' => true,
            'data' => $data
        ];
    }

    function index2()
    {
        $zonesante_id = request('zonesante_id');
        $data = Airesante::where(compact('zonesante_id'))->orderBy('airesante')->get();
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
            'airesante' => 'required',
            'zonesante_id' => 'required|exists:zonesante,id',
        ];

        $validator = Validator::make(request()->all(), $rules);

        if ($validator->fails()) {
            return [
                'message' => implode(" ", $validator->errors()->all())
            ];
        }
        $data  = $validator->validated();

        $airesante = explode(';', request('airesante'));
        $airesante =  array_unique($airesante);
        $zonesante_id = request('zonesante_id');

        $exist = [];
        $added = [];
        foreach ($airesante as $el) {
            if (Airesante::where(['airesante' => $el, 'zonesante_id' => $zonesante_id])->first()) {
                $exist[] = $el;
            } else {
                Airesante::create(['airesante' => ucfirst(trim($el)), 'zonesante_id' => $zonesante_id]);
                $added[] = $el;
            }
        }
        $m = [];
        if (count($added)) {
            $m[] = "Aire de santé créée avec succès ( " . implode(', ', $added) . ')';
        }

        if (count($exist)) {
            $m[] = "Ces aires ont été ignorées : " . implode(', ', $exist) . '';
        }

        return ['success' => (bool) count($added), 'message' => $m];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Airesante  $airesante
     * @return \Illuminate\Http\Response
     */
    public function show(Airesante $airesante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Airesante  $airesante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Airesante $airesante)
    {
        $user_role = auth()->user()->user_role;
        abort_if('admin' != $user_role, 403);

        $rules =  [
            'airesante' => 'required|unique:airesante,airesante,' . $airesante->id,
        ];

        $validator = Validator::make(request()->all(), $rules);

        if ($validator->fails()) {
            return [
                'message' => implode(" ", $validator->errors()->all())
            ];
        }
        $data  = $validator->validated();
        $airesante->update($data);

        return ['success' => true, 'message' => 'Aire de santé mise à jour.'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Airesante  $airesante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Airesante $airesante)
    {
        $user_role = auth()->user()->user_role;
        abort_if('admin' != $user_role, 403);

        $n = $airesante->structuresantes()->count();
        if ($n > 0) {
            return ['success' => false, 'message' => 'Cette aire contient ' . $n . ' structure(s) de santé.'];
        }
        $airesante->delete();
        return ['success' => true, 'message' => 'L\'aire de santé a été supprimée'];
    }
}

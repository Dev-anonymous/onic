<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Structuresante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StructureSanteAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $t = Structuresante::orderBy('structure')->get();
        $data = [];
        foreach ($t as $el) {
            $o = (object)$el->toArray();
            $o->airesante = $el->airesante->airesante;
            $o->infirmier = $el->profils->count();
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
            'airesante_id' => 'required|exists:airesante,id',
            'structure' => 'required',
            'adresse' => 'required',
            'contact' => 'required',
        ];

        $validator = Validator::make(request()->all(), $rules);

        if ($validator->fails()) {
            return [
                'message' => implode(" ", $validator->errors()->all())
            ];
        }
        $data  = $validator->validated();

        $airesante_id = request('airesante_id');
        $structure = request('structure');

        if (Structuresante::where(['structure' => $structure, 'airesante_id' => $airesante_id])->first()) {
            return [
                'message' => "La structure de santé \"$structure\" existe dans cette aire de santé."
            ];
        } else {
            Structuresante::create($data);
            return ['success' => true, 'message' => "La structure de santé a été créée."];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Structuresante  $structuresante
     * @return \Illuminate\Http\Response
     */
    public function show(Structuresante $structuresante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Structuresante  $structuresante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Structuresante $structuresante)
    {
        $user_role = auth()->user()->user_role;
        abort_if('admin' != $user_role, 403);

        $rules =  [
            'structure' => 'required',
            'adresse' => 'required',
            'contact' => 'required',
        ];

        $validator = Validator::make(request()->all(), $rules);

        if ($validator->fails()) {
            return [
                'message' => implode(" ", $validator->errors()->all())
            ];
        }
        $data  = $validator->validated();
        $structuresante->update($data);

        return ['success' => true, 'message' => 'Structure de santé mise à jour.'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Structuresante  $structuresante
     * @return \Illuminate\Http\Response
     */
    public function destroy(Structuresante $structuresante)
    {
        $user_role = auth()->user()->user_role;
        abort_if('admin' != $user_role, 403);

        $n = $structuresante->profils()->count();
        if ($n > 0) {
            return ['success' => false, 'message' => 'Cette structures contient ' . $n . ' infirmier(s).'];
        }
        $structuresante->delete();
        return ['success' => true, 'message' => 'La structure de santé a été supprimée'];
    }
}

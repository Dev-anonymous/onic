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

    function index2()
    {
        $airesante_id = request('airesante_id');
        $data = Structuresante::where(compact('airesante_id'))->orderBy('structure')->get();
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
            'type' => 'required|in:' . implode(',', gettypes()),
        ];

        if (request('file')) {
            $rules['file'] = 'required|mimes:xls,xlsx';
        } else {
            $rules['structure'] = 'required';
            $rules['adresse'] = 'sometimes';
            $rules['contact'] = 'sometimes';
        }

        $validator = Validator::make(request()->all(), $rules);

        if ($validator->fails()) {
            return [
                'message' => implode(" ", $validator->errors()->all())
            ];
        }
        $data  = $validator->validated();

        $airesante_id = request('airesante_id');
        $structure = request('structure');

        if (request('file')) {
            $file = request('file');
            $path = $file->getPathName();

            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($path);
            $sheet = $spreadsheet->getActiveSheet()->toArray();
            array_shift($sheet);
            if (!count($sheet)) {
                return ['success' => false, 'message' => "Le fichier ne contient pas de données à importer."];
            }

            $exist = [];
            $added = [];

            foreach ($sheet as $k => $row) {
                $str = @$row[0];
                $adre = @$row[1];
                $cont = @$row[2];
                $ty = @$row[3];
                if (!in_array($ty, gettypes())) {
                    $exist[] =  "Ligne " . ($k + 2) . " : Type : $ty invalide";
                    continue;
                }
                if ($str) {
                    $ins = ['structure' => $str, 'airesante_id' => $airesante_id];
                    if (Structuresante::where($ins)->first()) {
                        $exist[] = $str;
                    } else {
                        $ins['structure'] = ucfirst($str);
                        $ins['contact'] = $cont;
                        $ins['adresse'] = $adre;
                        $ins['type'] = $ty;
                        Structuresante::create($ins);
                        $added[] = $str;
                    }
                }
            }

            $m = [];
            if (count($added)) {
                $m[] = count($added) .  " structure de santé créée(s) avec succès. ";
            }

            if (count($exist)) {
                $m[] = "Ces structures ont été ignorées : " . implode(', ', $exist) . '';
            }

            return ['success' => (bool) count($added), 'message' => $m];
        } else {
            if (Structuresante::where(['structure' => $structure, 'airesante_id' => $airesante_id])->first()) {
                return [
                    'message' => "La structure de santé \"$structure\" existe dans cette aire de santé."
                ];
            } else {
                $data['structure'] = ucfirst($data['structure']);
                Structuresante::create($data);
                return ['success' => true, 'message' => "La structure de santé a été créée."];
            }
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
            'adresse' => 'sometimes',
            'contact' => 'sometimes',
            'type' => 'required|in:' . implode(',', gettypes()),
        ];

        $validator = Validator::make(request()->all(), $rules);

        if ($validator->fails()) {
            return [
                'message' => implode(" ", $validator->errors()->all())
            ];
        }
        $data  = $validator->validated();
        $data['structure'] = ucfirst($data['structure']);
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

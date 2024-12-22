<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Categoriepublication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $t = Categoriepublication::orderBy('categorie')->withCount('publications')->get();
        return [
            'success' => true,
            'data' => $t
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
            'categorie' => 'required',
        ];

        $validator = Validator::make(request()->all(), $rules);

        if ($validator->fails()) {
            return [
                'message' => implode(" ", $validator->errors()->all())
            ];
        }
        $data  = $validator->validated();

        $categorie = explode(';', request('categorie'));
        $categorie =  array_unique($categorie);

        $exist = [];
        $added = [];
        foreach ($categorie as $el) {
            if (Categoriepublication::where('categorie', $el)->first()) {
                $exist[] = $el;
            } else {
                Categoriepublication::create(['categorie' => ucfirst(trim($el))]);
                $added[] = $el;
            }
        }
        $m = [];
        if (count($added)) {
            $m[] = "Catégorie créée avec succès ( " . implode(', ', $added) . ')';
        }

        if (count($exist)) {
            $m[] = "Ces Catégorie ont été ignorées : " . implode(', ', $exist) . '';
        }

        return ['success' => (bool) count($added), 'message' => $m];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoriepublication  $categoriepublication
     * @return \Illuminate\Http\Response
     */
    public function show(Categoriepublication $categoriepublication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoriepublication  $categoriepublication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoriepublication $category)
    {
        $user_role = auth()->user()->user_role;
        abort_if('admin' != $user_role, 403);

        $rules =  [
            'categorie' => 'required|unique:categoriepublication,categorie,' . $category->id,
        ];

        $validator = Validator::make(request()->all(), $rules);

        if ($validator->fails()) {
            return [
                'message' => implode(" ", $validator->errors()->all())
            ];
        }
        $data  = $validator->validated();
        $data['datemaj'] = nnow();
        $category->update($data);

        return ['success' => true, 'message' => 'Catégorie mise à jour.'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoriepublication  $categoriepublication
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoriepublication $category)
    {
        $user_role = auth()->user()->user_role;
        abort_if('admin' != $user_role, 403);

        $n = $category->publications()->count();
        if ($n > 0) {
            return ['success' => false, 'message' => 'Cette catégorie contient ' . $n . ' article(s) de blog.'];
        }
        $category->delete();
        return ['success' => true, 'message' => 'La catégorie a été supprimée'];
    }
}

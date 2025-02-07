<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Baniere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class BaniereAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $t = Baniere::orderBy('id', 'desc')->get();
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
        $rules =  [
            'titre' => 'required|string|max:100',
            'description' => 'required|string|max:255',
            'image' => 'required|mimes:jpeg,jpg,png|max:500',
        ];

        $validator = Validator::make(request()->all(), $rules);

        if ($validator->fails()) {
            return [
                'message' => implode(" ", $validator->errors()->all())
            ];
        }

        $data  = $validator->validated();

        $data['image'] = request()->file('image')->store('banner', 'public');
        Baniere::create($data);
        return ['success' => true, 'message' => 'Bannière créée.'];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Baniere  $baniere
     * @return \Illuminate\Http\Response
     */
    public function show(Baniere $baniere)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Baniere  $baniere
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Baniere $baniere)
    {
        $rules =  [
            'titre' => 'required|string|max:100',
            'description' => 'required|string|max:255',
            'image' => 'sometimes|mimes:jpeg,jpg,png|max:500',
        ];

        $validator = Validator::make(request()->all(), $rules);

        if ($validator->fails()) {
            return [
                'message' => implode(" ", $validator->errors()->all())
            ];
        }

        $data  = $validator->validated();

        if ($request->hasFile('image')) {
            File::delete('storage/' . $baniere->image);
            $data['image'] = request()->file('image')->store('banner', 'public');
        }
        $baniere->update($data);
        return ['success' => true, 'message' => 'Bannière mise à jour.'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Baniere  $baniere
     * @return \Illuminate\Http\Response
     */
    public function destroy(Baniere $baniere)
    {
        abort_if(auth()->user()->user_role != 'admin', 403);
        File::delete('storage/' . $baniere->image);
        $baniere->delete();
        return ['success' => true, 'message' => 'Bannière supprimée.'];
    }
}

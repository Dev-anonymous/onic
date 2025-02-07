<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class PublicationAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $t = Publication::orderBy('datemaj', 'desc')->with(['user', 'categoriepublication'])->get();
        $data = [];
        foreach ($t as $el) {
            $o = (object)$el->toArray();
            $o->date = $el->date?->format('d-m-Y H:i:s');
            $o->datemaj = $el->datemaj?->format('d-m-Y H:i:s');
            $o->image = asset('storage/' . $el->image);
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
        $rules =  [
            'titre' => 'required|string|max:255',
            'categoriepublication_id' => 'required|exists:categoriepublication,id',
            'text' => 'required|',
            'image' => 'required|mimes:jpeg,jpg,png|max:500',
        ];

        $validator = Validator::make(request()->all(), $rules);

        if ($validator->fails()) {
            return [
                'message' => implode(" ", $validator->errors()->all())
            ];
        }

        $data  = $validator->validated();
        $data['users_id'] = auth()->user()->id;
        $data['date'] = nnow();

        $data['image'] = request()->file('image')->store('blog', 'public');
        Publication::create($data);
        return ['success' => true, 'message' => 'Publication créée.'];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function show(Publication $publication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publication $publication)
    {
        $rules =  [
            'titre' => 'required|string|max:255',
            'categoriepublication_id' => 'required|exists:categoriepublication,id',
            'text' => 'required|',
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
            File::delete('storage/' . $publication->image);
            $data['image'] = request()->file('image')->store('blog', 'public');
        }

        $data['editepar'] = auth()->user()->name;
        $data['datemaj'] = nnow();

        $publication->update($data);
        return ['success' => true, 'message' => 'Article mise à jour.'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publication $publication)
    {
        if (auth()->user()->id != $publication->user->id) {
            return ['success' => false, 'message' => "Seul {$publication->user->name} peut supprimer cet article."];
        }
        File::delete('storage/' . $publication->image);
        $publication->delete();
        return ['success' => true, 'message' => 'Article supprimé.'];
    }
}

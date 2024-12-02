<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Airesante;
use App\Models\Depot;
use App\Models\Profil;
use App\Models\Project;
use App\Models\Structuresante;
use App\Models\User;
use App\Models\Zonesante;
use Illuminate\Http\Request;

class DashAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();

        $data = [];
        if ('admin' == $user->user_role) {
            $data['zonesante']  = Zonesante::count();
            $data['airesante']  = Airesante::count();
            $data['structuresante']  = Structuresante::count();
            $data['blog']  = 0;

            $data['nbadmins'] = User::where('user_role', 'admin')->count();
            $data['nbinfirmiers'] = User::where('user_role', 'nurse')->count();


        }

        $lab = ['Jan', 'Fev', 'Mar', 'Avr', 'Mai', 'Jui', 'Juil', 'Aou', 'Sep', 'Oct', 'Nov', 'Dec'];

        $protab = [];
        $prooktab = [];
        $prononoktab = [];
        // $cartetab = [];

        foreach (range(1, 12) as $k => $m) {
            // $protab2 = Project::whereMonth('startdate', $m)->count();
            // $prooktab2 = Project::where('status', 1)->whereMonth('startdate', $m)->count();
            // $prononoktab2 = Project::where('status', 0)->whereMonth('startdate', $m)->count();

            // if ('admin' == $user->user_role) {
            //     //
            // } elseif ('user' == $user->user_role) {
            //     $profil = $user->profils()->first();
            //     $cash2 = $cash2->where('profil_id', $profil->id);
            //     $illico_cash2 = $illico_cash2->where('profil_id', $profil->id);
            //     $mobile_money2 = $mobile_money2->where('profil_id', $profil->id);
            //     $carte_bancaire2 = $carte_bancaire2->where('profil_id', $profil->id);
            // } else if ('agent' == $user->user_role) {
            //     $cash2 = $cash2->where('users_id', $user->id);
            //     $illico_cash2 = $illico_cash2->where('users_id', $user->id);
            //     $mobile_money2 = $mobile_money2->where('users_id', $user->id);
            //     $carte_bancaire2 = $carte_bancaire2->where('users_id', $user->id);
            // } else {
            //     abort(403);
            // }

            // $t = (float) $protab2;
            // $protab[] = (object) ['x' => $lab[$k], 'y' => $t];

            // $t = (float) $prooktab2;
            // $prooktab[] = (object) ['x' => $lab[$k], 'y' => $t];

            // $t = (float) $prononoktab2;
            // $prononoktab[] = (object) ['x' => $lab[$k], 'y' => $t];
        }

        // $series[] = (object) [
        //     "type" => 'line',
        //     'name' => 'Carte_bancaire',
        //     'data' => $cartetab
        // ];
        $series[] = (object) [
            "type" => 'line',
            'name' => 'Projets en cours',
            'data' => $prononoktab
        ];
        $series[] = (object) [
            "type" => 'line',
            'name' => 'Projets Fini',
            'data' => $prooktab
        ];
        $series[] = (object) [
            "type" => 'area',
            'name' => 'Projets',
            'data' => $protab
        ];

        $data['chart001'] = $series;

        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

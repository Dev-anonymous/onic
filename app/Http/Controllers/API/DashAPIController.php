<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Airesante;
use App\Models\Depot;
use App\Models\Profil;
use App\Models\Project;
use App\Models\Structuresante;
use App\Models\Transaction;
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
        $year = request()->year ?? date('Y');

        $data = [];
        if ('admin' == $user->user_role) {
            $data['zonesante']  = Zonesante::count();
            $data['airesante']  = Airesante::count();
            $data['structuresante']  = Structuresante::count();
            $data['blog']  = 0;

            $data['nbadmins'] = User::where('user_role', 'admin')->count();
            $data['nbinfirmiers'] = User::where('user_role', 'nurse')->count();
        }

        $data['recent'] = [];
        $nu = User::where('user_role', 'nurse')->orderBy('name')->limit(10)->get();
        foreach ($nu as $el) {
            $data['recent'][] = (object) [
                'image' => userimage($el),
                'name' => $el->name,
                'email' => $el->email,
                'phone' => $el->phone,
                'niveauetude' => $el->profils()->first()->niveauetude,
            ];
        }

        $lab = ['Jan', 'Fev', 'Mar', 'Avr', 'Mai', 'Jui', 'Juil', 'Aou', 'Sep', 'Oct', 'Nov', 'Dec'];
        $tab = [];
        $scdf = [];
        $susd = [];

        foreach (range(1, 12) as $k => $m) {
            $d = Transaction::selectRaw('sum(montant) as montant')->whereMonth('date', $m)->whereYear('date', $year)->where(['devise' => 'CDF'])->first();
            $d1 = Transaction::selectRaw('sum(montant) as montant')->whereMonth('date', $m)->whereYear('date', $year)->where(['devise' => 'USD'])->first();

            $scdf[] = (object) ['x' => $lab[$k], 'y' => (float) $d->montant];
            $susd[] = (object) ['x' => $lab[$k], 'y' => (float) $d1->montant];
        }

        $tab['CDF'] = $scdf;
        $tab['USD'] = $susd;

        foreach ($tab as $k => $v) {
            $series[] = (object) [
                "type" => 'CDF' == $k ? 'area' : 'line',
                'name' => $k,
                'data' => $v
            ];
        }

        // $series[] = (object) [
        //     "type" => 'line',
        //     'name' => 'Carte_bancaire',
        //     'data' => $cartetab
        // ];
        // $series[] = (object) [
        //     "type" => 'line',
        //     'name' => 'Projets en cours',
        //     'data' => $prononoktab = []
        // ];
        // $series[] = (object) [
        //     "type" => 'line',
        //     'name' => 'Projets Fini',
        //     'data' => $prooktab = []
        // ];
        // $series[] = (object) [
        //     "type" => 'area',
        //     'name' => 'Projets',
        //     'data' => $protab = []
        // ];

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

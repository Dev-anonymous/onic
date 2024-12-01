<?php

namespace App\Http\Controllers;

use App\Models\Airesante;
use App\Models\Categorie;
use App\Models\Category;
use App\Models\Commande;
use App\Models\Exportation;
use App\Models\Filiere;
use App\Models\FiliereHasPromotion;
use App\Models\Invoice;
use App\Models\InvoicePay;
use App\Models\Project;
use App\Models\Promotion;
use App\Models\Support;
use App\Models\User;
use App\Models\Zonesante;
use Illuminate\Http\Request;
use Shuchkin\SimpleXLSXGen;

class AdminController extends Controller
{
    function __construct()
    {
        $this->middleware(function ($request, $next) {
            $role = auth()->user()->user_role;
            abort_if($role != 'admin', 403);
            return $next($request);
        });
    }

    function home()
    {
        return view('admin.home');
    }

    function healthzone()
    {
        return view('admin.healthzone');
    }
    function healtharea()
    {
        $zones = Zonesante::orderBy('zonesante')->get();
        return view('admin.healtharea', compact('zones'));
    }

    function healthstructure()
    {
        $aires = Airesante::orderBy('airesante')->get();
        return view('admin.healthstructure', compact('aires'));
    }

    function admins()
    {
        return view('admin.admins');
    }

    function nurse()
    {
        $promotion = FiliereHasPromotion::with(['promotion' => function ($q) {
            $q->orderBy('promotion');
        }])->with(['filiere' => function ($q) {
            $q->orderBy('filiere');
        }])->get();
        return view('admin.nurse', compact('promotion'));
    }

    function users()
    {
        return view('admin.user');
    }

    function profile()
    {
        return view('admin.profile');
    }

    function blog()
    {
        return view('admin.blog');
    }
}

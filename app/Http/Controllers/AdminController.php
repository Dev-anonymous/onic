<?php

namespace App\Http\Controllers;

use App\Models\Airesante;
use App\Models\Appconfig;
use App\Models\Categorie;
use App\Models\Categoriepublication;
use App\Models\Category;
use App\Models\Commande;
use App\Models\Contact;
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
        return view('admin.nurse');
    }

    function profile()
    {
        return view('admin.profile');
    }

    function appconfig()
    {
        $conf = Appconfig::first();
        return view('admin.appconfig', compact('conf'));
    }

    function contact()
    {
        $data = Contact::orderBy('id', 'desc')->get();
        return view('admin.contact', compact('data'));
    }

    function baniere()
    {
        return view('admin.baniere');
    }

    function payment()
    {
        return view('admin.payment');
    }

    function blog()
    {
        $category = Categoriepublication::orderBy('categorie')->get();
        return view('admin.blog', compact('category'));
    }
    function category()
    {
        return view('admin.category');
    }
}

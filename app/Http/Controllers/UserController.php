<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Project;
use App\Models\ProjectHasUser;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware(function ($request, $next) {
            $role = auth()->user()->user_role;
            abort_if(!in_array($role, ['nurse']), 403);
            return $next($request);
        });
    }

    function home()
    {
        return view('user.home');
    }


    function profile()
    {
        return view('user.profile');
    }
}

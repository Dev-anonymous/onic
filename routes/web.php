<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\UserController;
use App\Models\Baniere;
use App\Models\Category;
use App\Models\Pay;
use App\Models\User;
use App\Models\Zonesante;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $banner = Baniere::orderBy('id', 'desc')->get();
    $docta = User::where('user_role', 'nurse')->inRandomOrder()->take(9)->get();
    return view('index', compact('banner', 'docta'));
})->name('home');

Route::get('/login', function () {
    if (Auth::check()) {
        // $role = auth()->user()->user_role;
        // $url = '';
        // if ($role == 'admin') {
        //     $url = route('admin.home');
        // } elseif ($role == 'nurse') {
        $url = route('home');
        // } else {
        //     Auth::logout();
        //     abort(403, "Invalide user role : $role");
        // }
        // $r = request('r');
        // if ($r) {
        //     $url = urldecode($r);
        // }
        return redirect($url);
    }

    $zones = Zonesante::orderBy('zonesante')->get();
    return view('login', compact('zones'));
})->name('login');

Route::post('auth/login', [AppController::class, 'login'])->name('auth-login');
Route::post('auth/logout', [AppController::class, 'logout'])->name('auth-logout');
Route::post('auth/new', [AppController::class, 'newu'])->name('auth-new');

Route::middleware('auth')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::controller(AdminController::class)->group(function () {
            Route::get('',  'home')->name('admin.home');
            Route::get('health-zone',  'healthzone')->name('admin.healthzone');
            Route::get('health-area',  'healtharea')->name('admin.healtharea');
            Route::get('health-structure',  'healthstructure')->name('admin.healthstructure');
            Route::get('admins',  'admins')->name('admin.admins');
            Route::get('nurse',  'nurse')->name('admin.nurse');
            Route::get('profile',  'profile')->name('admin.profile');
            Route::get('app-config',  'appconfig')->name('admin.appconfig');
            Route::get('app-contact',  'contact')->name('admin.contact');
            Route::get('app-hero',  'baniere')->name('admin.baniere');
            Route::get('blog',  'blog')->name('admin.blog');
        });
    });

    Route::prefix('nurse')->group(function () {
        Route::controller(UserController::class)->group(function () {
            Route::get('',  'home')->name('nurse.home');
            Route::get('profile',  'profile')->name('nurse.profile');
        });
    });
});

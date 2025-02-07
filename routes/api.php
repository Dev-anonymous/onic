<?php

use App\Http\Controllers\API\AireSanteAPIController;
use App\Http\Controllers\API\BaniereAPIController;
use App\Http\Controllers\API\CartAPIController;
use App\Http\Controllers\API\CategoryAPIController;
use App\Http\Controllers\API\ConfigAPIController;
use App\Http\Controllers\API\DashAPIController;
use App\Http\Controllers\API\DepotAPIController;
use App\Http\Controllers\API\ExportAPIController;
use App\Http\Controllers\API\FacultAPIController;
use App\Http\Controllers\API\PaymentAPIController;
use App\Http\Controllers\API\ProductAPIController;
use App\Http\Controllers\API\ProjectAPIController;
use App\Http\Controllers\API\PublicationAPIController;
use App\Http\Controllers\API\StructureSanteAPIController;
use App\Http\Controllers\API\TaskAPIController;
use App\Http\Controllers\API\TauxAPIController;
use App\Http\Controllers\API\TransactionAPIController;
use App\Http\Controllers\API\UserAPIController;
use App\Http\Controllers\API\ZoneSanteAPIController;
use App\Http\Controllers\AppController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::resource('users', UserAPIController::class)->only(['index', 'store', 'destroy']);
    Route::post('users/{user}', [UserAPIController::class, 'update']);
    Route::post('update-pass', [AppController::class, 'updatepass'])->name('updatepass');
    Route::post('update-info', [AppController::class, 'updateinfo'])->name('updateinfo');

    Route::resource('paiement', PaymentAPIController::class);
    Route::resource('transaction', TransactionAPIController::class)->only(['index']);
    Route::resource('zonesante', ZoneSanteAPIController::class);
    Route::resource('airesante', AireSanteAPIController::class);
    Route::resource('structuresante', StructureSanteAPIController::class);
    Route::resource('baniere', BaniereAPIController::class)->only(['index', 'store', 'destroy']);
    Route::post('baniere/{baniere}', [BaniereAPIController::class, 'update']);
    Route::resource('category', CategoryAPIController::class);
    Route::resource('publication', PublicationAPIController::class)->only(['index', 'store', 'destroy']);
    Route::post('publication/{publication}', [PublicationAPIController::class, 'update']);

    Route::resource('dash', DashAPIController::class)->only(['index']);
    Route::post('appconfig', [AppController::class, 'appconfig'])->name('appconfig');

    // Route::resource('config', ConfigAPIController::class)->only(['store']);

    Route::post('fpi', [AppController::class, 'fpi'])->name('fpi');
    Route::get('fpc', [AppController::class, 'fpc'])->name('fpc');
});

Route::get('pub/airesante', [AireSanteAPIController::class, 'index2'])->name('pub.area');
Route::get('pub/structuresante', [StructureSanteAPIController::class, 'index2'])->name('pub.structure');

Route::post('contact', [AppController::class, 'contact'])->name('contact');
Route::post('search', [AppController::class, 'search'])->name('search');

Route::get('blog', [AppController::class, 'blog'])->name('api.blog');

<?php

use App\Http\Controllers\API\AireSanteAPIController;
use App\Http\Controllers\API\CartAPIController;
use App\Http\Controllers\API\CategoryAPIController;
use App\Http\Controllers\API\ConfigAPIController;
use App\Http\Controllers\API\DashAPIController;
use App\Http\Controllers\API\DepotAPIController;
use App\Http\Controllers\API\ExportAPIController;
use App\Http\Controllers\API\FacultAPIController;
use App\Http\Controllers\API\ProductAPIController;
use App\Http\Controllers\API\ProjectAPIController;
use App\Http\Controllers\API\StructureSanteAPIController;
use App\Http\Controllers\API\TaskAPIController;
use App\Http\Controllers\API\TauxAPIController;
use App\Http\Controllers\API\UserAPIController;
use App\Http\Controllers\API\ZoneSanteAPIController;
use App\Http\Controllers\AppController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::resource('users', UserAPIController::class)->only(['index', 'store', 'destroy']);
    Route::post('users/{user}', [UserAPIController::class, 'update']);

    Route::resource('zonesante', ZoneSanteAPIController::class);
    Route::resource('airesante', AireSanteAPIController::class);
    Route::resource('structuresante', StructureSanteAPIController::class);


    Route::resource('dash', DashAPIController::class)->only(['index']);
    // Route::resource('config', ConfigAPIController::class)->only(['store']);

    Route::post('fpi', [AppController::class, 'fpi'])->name('fpi');
    Route::get('fpc', [AppController::class, 'fpc'])->name('fpc');
});

Route::get('pub/airesante', [AireSanteAPIController::class, 'index2'])->name('pub.area');
Route::get('pub/structuresante', [StructureSanteAPIController::class, 'index2'])->name('pub.structure');

// Route::get('products', [ProductAPIController::class, 'products'])->name('productlist');

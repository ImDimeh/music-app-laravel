<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TrackController;
use App\Http\Controllers\ApiKeyController;
use App\Http\Controllers\PlaylistController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/" , [TrackController::class ,'index'] )->name('tracks.index');

// MIG MODEL CONTROLLER
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {


    Route::resource('playlists', PlaylistController::class);
    Route::resource('api-keys', ApiKeyController::class);


    Route::middleware(['admin'])->group(function(){
        
        Route::post("tracks" , [TrackController::class ,'store'] )->name('tracks.store');
        Route::get("tracks/create" , [TrackController::class ,'create'] )->name('tracks.create'); 
        
        Route::get("tracks/{track}/edit" , [TrackController::class ,'edit'] )->name('tracks.edit');
        Route::put("tracks/{track}" , [TrackController::class ,'update'] )->name('tracks.update');
        Route::delete("tracks/{track}" , [TrackController::class ,'destroy'] )->name('tracks.destroy');

        
    });


}
);






// dashboad
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

// routes , controller::class , fonction recherché
Route::get("test" , [HomeController::class ,'index'] );
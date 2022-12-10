<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestauranteController;
use App\Http\Controllers\ReservaController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/restaurantes', [App\Http\Controllers\RestauranteController::class, 'indexp']);
Route::get('/reservas', [App\Http\Controllers\ReservaController::class, 'indexp']);
Route::post('/reservas/guardar',[ReservaController::class,'guardar']);
Route::post('/reservas/actualizar',[ReservaController::class,'actualizar']);
Route::post('/reservas/eliminar',[ReservaController::class,'eliminar']);



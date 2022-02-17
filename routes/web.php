<?php

use Illuminate\Support\Facades\Route;

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
    return view('agenda.index');
}) -> middleware('auth');

Auth::routes();

Route::group(['middleware' =>['auth']], function (){

Route::get('/cita', [App\Http\Controllers\CitaController::class, 'index']);
Route::post('/cita/mostrar', [App\Http\Controllers\CitaController::class, 'show']);

Route::post('/cita/agregar', [App\Http\Controllers\CitaController::class, 'store']);
Route::post('/cita/editar/{id}', [App\Http\Controllers\CitaController::class, 'edit']);
Route::post('/cita/borrar/{id}', [App\Http\Controllers\CitaController::class, 'destroy']);
Route::post('/cita/actualizar/{cita}', [App\Http\Controllers\CitaController::class, 'update']);

});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

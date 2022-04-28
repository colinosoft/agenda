<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AgendaController;
// use App\Http\Controllers\Auth;


// Route::get('/', function () {
//     return view('agenda.agenda');
// }) -> middleware('auth');

Auth::routes();

//Home
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('inicio');
//Agenda
Route::get('/agenda', [App\Http\Controllers\CitaController::class, 'index'])->name('agenda');
//Administrar
Route::get('/administrar', [App\Http\Controllers\AdministrarController::class, 'index'])->name('administrar');

//----- Recursos ------//
//-- Usuarios
Route::resource('Admin-users', UserController::class)->names('admin.users') -> middleware('auth');
Route::resource('Admin-agenda', AgendaController::class)->names('admin.agenda') -> middleware('auth');


// Route::group(['middleware' =>['auth']], function (){


//Modal agenda
Route::post('/agenda/mostrar', [App\Http\Controllers\CitaController::class, 'show']);
Route::post('/agenda/monstrarTratamiento', [App\Http\Controllers\TratamientosController::class, 'show']);
Route::post('/agenda/agregar', [App\Http\Controllers\CitaController::class, 'store']);
Route::post('/agenda/editar/{id}', [App\Http\Controllers\CitaController::class, 'edit']);
Route::post('/agenda/borrar/{id}', [App\Http\Controllers\CitaController::class, 'destroy']);
Route::post('/agenda/actualizar/{cita}', [App\Http\Controllers\CitaController::class, 'update']);

// });


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

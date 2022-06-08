<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AgendaController;
use App\Http\Controllers\Admin\TratamientosController;
use App\Http\Controllers\User\PedirCita;
use App\Http\Controllers\User\VerCita;
use Illuminate\Support\Facades\Auth;

// use App\Http\Controllers\Auth;


// Route::get('/', function () {
//     return view('agenda.agenda');
// }) -> middleware('auth');



//Home
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('inicio');
//Agenda
Route::get('/agenda', [App\Http\Controllers\CitaController::class, 'index'])->name('agenda');
//Administrar
Route::get('/administrar', [App\Http\Controllers\AdministrarController::class, 'index'])->name('administrar');
//Pedir cita
Route::get('/Cita', [PedirCita::class, 'index'])->name('cita');
//Ver citass
Route::get('/Ver-Citas', [VerCita::class, 'index'])->name('verCita');

//-------------- Recursos ---------------//
//-- Agenda --//
Route::resource('Admin-agenda', AgendaController::class)->names('admin.agenda') -> middleware('auth');
//-- Usuarios --//
Route::resource('Admin-users', UserController::class)->names('admin.users') -> middleware('auth');
//--- Tratamientos --//
Route::resource('Admin-tratamientos', TratamientosController::class)->names('admin.tratamientos')->middleware('auth');

// Route::group(['middleware' =>['auth']], function (){


//Modal agenda
Route::post('/agenda/mostrar', [App\Http\Controllers\CitaController::class, 'show']);
Route::post('/agenda/monstrarTratamiento', [App\Http\Controllers\TratamientosController::class, 'show']);
Route::post('/agenda/agregar', [App\Http\Controllers\CitaController::class, 'store']);
Route::post('/agenda/editar/{id}', [App\Http\Controllers\CitaController::class, 'edit']);
Route::post('/agenda/borrar/{id}', [App\Http\Controllers\CitaController::class, 'destroy']);
Route::post('/agenda/actualizar/{cita}', [App\Http\Controllers\CitaController::class, 'update']);
//Pedir cita


// });


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

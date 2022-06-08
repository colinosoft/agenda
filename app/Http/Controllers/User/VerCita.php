<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VerCita extends Controller
{
    public function index(Request $request)
    {
        if (is_null($request->user())) {

            return view('index');

        } else {

            $request->user()->authorizeRoles(['user', 'admin']);
            $user = "";
            $admin = "";

            return view('user.cita.verCita', [
                "user" => $user,
                "admin" => $admin
            ]);
        }
    }
}

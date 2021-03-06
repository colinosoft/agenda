<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministrarController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        //
        
        $request->user()->authorizeRoles(['admin']);
        $user = "";
        return view('administrar', [
            "user" => $user
        ]);
    }
}

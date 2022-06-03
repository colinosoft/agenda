<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        return view('index');
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function agenda(Request $request)
    {
        $request->user()->authorizeRoles(['user', 'admin']);

        return view('agenda');
    }
    public function index(){

        return  view('index');
    }
}

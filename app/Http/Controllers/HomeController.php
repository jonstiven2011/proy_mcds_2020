<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware('auth', ['except' => ['welcome', 'loadcat']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //return view('home');
        if(Auth::user()->role == 'admin') {
            return view('home');
        } else if (Auth::user()->role == 'editor') {
            return view('dashboard-editor');
        } else {
            return view('/');
        }
    }

}

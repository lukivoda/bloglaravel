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

    //oav znaci deka sekoj metod sto bi go imale vo ovoj konstruktor mora  da pomine niz ovoj filter(korisnikot mora da bide logiran)
    
    // logikata ja prefrluvame vo web
    
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
}

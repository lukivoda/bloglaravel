<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\User;
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
        return view('admin.dashboard')->with('post_count',Post::all()->count())
                                      ->with('trashed_posts_count',Post::onlyTrashed()->get()->count())
                                       ->with('users_count',User::all()->count())
                                        ->with('categories_count',Category::all()->count());
    }
}

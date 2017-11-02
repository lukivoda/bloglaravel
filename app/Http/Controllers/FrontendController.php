<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Setting;
use Illuminate\Http\Request;

class FrontendController extends Controller
{


    public function index() {


        return view('index')
                            ->with('title',Setting::first()->site_name)
                            ->with('categories',Category::take(5)->get())
                            ->with('latest_post',Post::orderBy('created_at','desc')->first())
                            ->with('second_post',Post::orderBy('created_at','desc')->skip(1)->take(1)->get()->first())
                            ->with('third_post',Post::orderBy('created_at','desc')->skip(2)->take(1)->get()->first())
                            ->with('laravel',Category::find(4))
                            ->with('laravel_posts',Category::find(4)->posts()->orderBy('created_at','desc')->take(3)->get())
                            ->with('javascript',Category::find(5)) 
                            ->with('javascript_posts',Category::find(5)->posts()->orderBy('created_at','desc')->take(3)->get())
                            ->with('setting',Setting::first());
    }


    public function singlePost($slug) {

        $post = Post::where('slug',$slug)->first();

        $prev_id = Post::where('id',"<",$post->id)->max('id');
        
        $next_id  = Post::where('id','>',$post->id)->min('id');

        return view('single')->with('post',$post)
            ->with('title',Setting::first()->site_name)
            ->with('categories',Category::take(5)->get())
            ->with('setting',Setting::first())
            ->with('previous',Post::find($prev_id))
            ->with('next',Post::find($next_id));

    }

}

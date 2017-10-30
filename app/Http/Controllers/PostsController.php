<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('admin.posts.index')->with('posts',Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $categories = Category::all();
        
        if(count($categories) ==0){
            
            Session::flash('info',"You must add at least one category");
            
            return redirect()->back();
        }
        
        
        return view('admin.posts.create')->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,[

           'title' =>'required|max:255',
           'featured' => 'required|image',
           'content'  => 'required',
           'category_id' => 'required'
           
       ]);


      $featured= $request->featured;

      $featured_new_name = time().$featured->getClientOriginalName();


      $featured->move('uploads/posts/',$featured_new_name);


      Post::create([
         'title' => $request->title,
          'content' => $request->content,
          'category_id' => $request->category_id,

          'featured' => 'uploads/posts/'.$featured_new_name,

          'slug' => str_slug($request->title)

      ]);

        Session::flash('success','Post inserted successfully');

      return redirect()->back();





    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    
    
    public function trashed() {
        
        $posts = Post::onlyTrashed()->get();
        
        
        return view('admin.posts.trashed')->with('posts',$posts);
        
    }
    
    
    public function destroy($id){

    $post = Post::find($id);

    $post->delete();

    Session::flash('success','Posts was trashed successfully');

    return redirect()->back();
    }




    public function kill($id)
    {
        $post = Post::withTrashed()->where('id',$id)->first();

        $post->forceDelete();

        Session::flash('success','Post was deleted permanently');

        return redirect()->back();
    }


    public function restore ($id)  {

        $post = Post::withTrashed()->where('id',$id)->first();

        $post->restore();


        Session::flash('success','Post was restored successfully');

        return redirect()->route('posts');

    }



}

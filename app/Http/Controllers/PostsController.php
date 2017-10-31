<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
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

        $tags = Tag::all();
        
        if($categories->count() ==0 || $tags->count() == 0){
            
            Session::flash('info',"You must add at least one category and tag");
            
            return redirect()->back();
        }
        
        
        return view('admin.posts.create')->with('categories',$categories)->with('tags',$tags);
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
           'category_id' => 'required',
           'tags'      => 'required'
           
       ]);


      $featured= $request->featured;

      $featured_new_name = time().$featured->getClientOriginalName();


      $featured->move('uploads/posts/',$featured_new_name);


      $post = Post::create([
         'title' => $request->title,
          'content' => $request->content,
          'category_id' => $request->category_id,

          'featured' => 'uploads/posts/'.$featured_new_name,

          'slug' => str_slug($request->title)

      ]);

    //vo pivot tablelata post_tag pravime insert na relaciite post_id so tag_id
        $post->tags()->attach($request->tags);

        Session::flash('success','Post inserted successfully');

      return redirect()->route('posts');





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
        $categories = Category::all();

        $post = Post::find($id);

        $tags = Tag::all();

        return view('admin.posts.edit')->with('post',$post)->with('categories',$categories)->with('tags',$tags);
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
        $this->validate($request,[

            'title' => 'required',
            'content' =>'required',
            'category_id'=> 'required',
            'tags'      => 'required'
        ]);

        $post = Post::find($id);


        if($request->hasFile('featured')) {

            $featured = $request->featured;

            $featured_new_name =  time() .$featured->getClientOriginalName();

            $featured->move('uploads/posts',$featured_new_name);

            $post->featured = 'uploads/posts/'.$featured_new_name;

        }





        $post->category_id = $request->category_id;

        $post->title =$request->title;

        $post->content = $request->content;

        $post->save();

        $post->tags()->sync($request->tags);


        Session::flash('success','Post was updated successfully');


        return redirect()->route('posts');




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

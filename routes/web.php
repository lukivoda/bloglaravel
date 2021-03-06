<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Category;
use App\Post;
use App\Setting;
use App\Tag;
use Spatie\Newsletter\NewsletterFacade as Newsletter;


Route::post('/subscribe',function(){

    $email = request('email');

    Newsletter::subscribe($email);

    Session::flash('subscribed','You are successfully subscribed');


    return redirect()->back();


});

Route::get('/', [
    
    'uses' => 'FrontendController@index',
    'as'   => 'index'  
    
]);


Route::get('/post/{slug}',[
     
    'uses' => 'FrontendController@singlePost',
    
    'as'   => 'post.single'
]);

Route::get('/category/{id}',[

    'uses' => 'FrontendController@category',

    'as'   => 'category.single'
]);


Route::get('/tag/{id}',[

    'uses' => 'FrontendController@tag',

    'as'   => 'tag.single'
]);


Route::get('/results',function(){

    $posts = Post::where('title','like','%'.request('query').'%')->get();

    $query =request('query');
    
    return view('results')->with('posts',$posts)
        ->with('query',$query)
        ->with('title',Setting::first()->site_name)
        ->with('categories',Category::take(5)->get())
        ->with('setting',Setting::first());
});


Auth::routes();






//vo url-ot ke ima prefix admin, a pristap do routes ke imaat samo logiranite korisnici
Route::group(['prefix' => 'admin','middleware' =>'auth'],function() {


    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/post/create',[

        'uses' => 'PostsController@create',

        'as'   => 'post.create'

    ]);


    Route::post('/posts/store',[

        'uses' =>'PostsController@store',
        'as'   => 'post.store'
    ]);

    Route::get('/category/create',[

        'uses' => 'CategoriesController@create',

        'as'   => 'category.create'

    ]);

    Route::post('/categories/store',[

        'uses' =>'CategoriesController@store',
        'as'   => 'category.store'

    ]);

    Route::get('/categories',[

        'uses' => 'CategoriesController@index',

        'as'   => 'categories'

    ]);


    Route::get('/category/edit/{id}',[

        'uses' => 'CategoriesController@edit',

        'as'   => 'category.edit'

    ]);

    Route::get('/category/delete/{id}',[

        'uses' => 'CategoriesController@destroy',

        'as'   => 'category.delete'

    ]);
    
    Route::post('/category/update{id}',[
       
        'uses' => 'CategoriesController@update',
        
        'as'  => 'category.update'
    ]);


    Route::get('/posts', [

       'uses' => 'PostsController@index',

        'as'  => 'posts'

    ]);


    Route::get('/post/delete/{id}', [

        'uses' => 'PostsController@destroy',

        'as'  => 'post.delete'

    ]);

    Route::get('/post/edit/{id}', [

        'uses' => 'PostsController@edit',

        'as'  => 'post.edit'

    ]);


    Route::post('/post/update/{id}', [

        'uses' => 'PostsController@update',

        'as'  => 'post.update'

    ]);
    

    Route::get('/posts/trashed', [

        'uses' => 'PostsController@trashed',

        'as'  => 'posts.trashed'

    ]);


    Route::get('/post/kill/{id}', [

        'uses' => 'PostsController@kill',

        'as'  => 'post.kill'

    ]);

    Route::get('/post/restore/{id}', [

        'uses' => 'PostsController@restore',

        'as'  => 'post.restore'

    ]);















    Route::get('/tags',[

        'uses' => 'TagsController@index',

        'as'   => 'tags'

    ]);


    Route::get('/tag/create',[

        'uses' => 'TagsController@create',

        'as'   => 'tag.create'

    ]);


    Route::get('/tag/edit/{id}',[

        'uses' => 'TagsController@edit',

        'as'   => 'tag.edit'

    ]);

    Route::get('/tag/delete/{id}',[

        'uses' => 'TagsController@destroy',

        'as'   => 'tag.delete'

    ]);


    Route::post('/tag/update{id}',[

        'uses' => 'TagsController@update',

        'as'  => 'tag.update'
    ]);




    Route::post('/tag/store',[

        'uses' => 'TagsController@store',

        'as'  => 'tag.store'
    ]);




    Route::get('/users',[

        'uses' => 'UsersController@index',

        'as'   => 'users'

    ]);


    Route::get('/user/create',[

        'uses' => 'UsersController@create',

        'as'   => 'user.create'

    ]);



    Route::post('/user/store',[

        'uses' => 'UsersController@store',

        'as'  => 'user.store'
    ]);



    Route::get('/user/not_admin/{id}',[

        'uses' => 'UsersController@notAdmin',

        'as'   => 'user.not.admin'

    ]);



    Route::get('/user/make_admin/{id}',[

        'uses' => 'UsersController@admin',

        'as'   => 'user.make.admin'

    ]);




    Route::get('/profile',[

        'uses' => 'ProfilesController@index',

        'as'   => 'profile'

    ]);


    Route::post('/profile/update',[

        'uses' => 'ProfilesController@update',

        'as'   => 'profile.update'

    ]);


    Route::get("/user/delete/{id}",[

        'uses' => 'UsersController@destroy',

        'as'   => 'user.delete'

    ]);


    Route::get("/settings",[

        'uses' => 'SettingsController@index',

        'as'   => 'settings'

    ]);


    Route::post("/settings/update",[

        'uses' => 'SettingsController@update',

        'as'   => 'settings.update'

    ]);







    


    Route::get('/test',function(){



        $post= Post::find(7);

        $tags =  $post->tags;

       return $tags;

    });
    



});

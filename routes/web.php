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

Route::get('/', function () {
    return view('welcome');
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

});

<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    
    
    
    
    
    
    public function __construct()
    {
        
        $this->middleware('Admin');
    }


    public function index()
    {

        return view("admin.users.index")->with('users',User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.users.create');
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

            'name' => 'required',

            'email' => 'required'



        ]);

       $user = User::create([

           'name' => $request->name,

           'email' => $request->email,

           'password' => bcrypt('password')

       ]);


        Profile::create([

            'user_id' =>$user->id,

            'avatar'  => '/uploads/avatars/1.png'

        ]);


        Session::flash('success','New user added');


        return redirect()->route('users');


    }


    public function notAdmin($id) {

        $user = User::find($id);

        $user->admin =0;


        $user->save();


        Session::flash('success','Permissions removed from user');

        return redirect()->back();


    }


    public function admin($id) {

        $user = User::find($id);

        $user->admin = 1;


        $user->save();


        Session::flash('success','User has become an admin');

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
    public function destroy($id)
    {
       $user = User::find($id);

        $user->profile->delete();

        $user->delete();
        

        Session::flash('success','User deleted successfully');


        return redirect()->back();


    }
}

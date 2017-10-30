<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user = App\User::create([
           
           'name' => "Stevan Ristov",
           
           'email' => 'steve@mail.com',
           
           'password' => bcrypt('123456'),

           'admin'    =>  1
           
       ]);
        
        
        App\Profile::create([
            
            'user_id' => $user->id,

            'avatar'  => "uploads/avatars/1.jpg",

            'about'   =>  "Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",

            'facebook' => 'facebook.com',
            
            'youtube'  =>  'youtube.com'
            
        ]);
        
    }
}

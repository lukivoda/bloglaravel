<?php

use App\Setting;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([

            "site_name" => "BlogLaravel",

            "contact_number" =>  '057453424242',
            
            "contact_email"  => "steve@mail.com",

            "address"    => "Dimitar Vlahov 46 Veles,Macedonia "


        ]);
    }
}

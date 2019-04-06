<?php

use Illuminate\Database\Seeder;

class taikhoansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => "vanthuy", 
                'viewname' => "Huỳnh Văn Thùy",
                'email' => 'abc.gmail.com',
                'password' => bcrypt('123'),
                'permission' => 'Admin',    
                'image' => 'avatar.jpg', 
            ],
        ]);
    }
}

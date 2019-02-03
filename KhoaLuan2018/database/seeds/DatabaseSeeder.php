<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(trangchusTableSeeder::class);
        $this->call(theloaisTableSeeder::class);
        $this->call(loaitinsTableSeeder::class); 
    }
}

<?php

use Illuminate\Database\Seeder;

class trangchusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trang_chus')->insert([
            'gioithieu' => "Đây là giới thiệu", 
            'hienthirss' => 1,
        ]);
    }
}

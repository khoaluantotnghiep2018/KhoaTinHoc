<?php

use Illuminate\Database\Seeder; 

class theloaisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('the_loais')->insert(
            [
                [
                    'tentheloai' => "Thông báo",
                    'uutien' => 0, 
                    'hienthi' => 1, 
                ],
                [
                    'tentheloai' => "Tin tức",
                    'uutien' => 1, 
                    'hienthi' => 1, 
                ],
                [
                    'tentheloai' => "Tuyển sinh",
                    'uutien' => 2, 
                    'hienthi' => 1, 
                ],
                [
                    'tentheloai' => "Chương trình học tập",
                    'uutien' => 3, 
                    'hienthi' => 1, 
                ],
            ]
        );
    }
}

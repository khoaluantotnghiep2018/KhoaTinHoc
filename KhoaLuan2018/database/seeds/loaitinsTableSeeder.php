<?php

use Illuminate\Database\Seeder;

class loaitinsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('loai_tins')->insert(
            [
                [
                    'tenloaitin' => "Chung",
                    'id_theloai' => 1,  
                ],
                [
                    'tenloaitin' => "Trường",
                    'id_theloai' => 1,  
                ],
                [
                    'tenloaitin' => "Đoàn - hội",
                    'id_theloai' => 1,  
                ],
                [
                    'tenloaitin' => "Khoa",
                    'id_theloai' => 1,  
                ],
                [
                    'tenloaitin' => "Chung",
                    'id_theloai' => 2,  
                ],
                [
                    'tenloaitin' => "Trường",
                    'id_theloai' => 2,  
                ],
                [
                    'tenloaitin' => "Đoàn - hội",
                    'id_theloai' => 2,  
                ],
                [
                    'tenloaitin' => "Khoa",
                    'id_theloai' => 2,  
                ],
                [
                    'tenloaitin' => "Đại học",
                    'id_theloai' => 3,  
                ],
                [
                    'tenloaitin' => "Sau đại học",
                    'id_theloai' => 3,  
                ],
                [
                    'tenloaitin' => "Đại học",
                    'id_theloai' => 4,  
                ],
                [
                    'tenloaitin' => "Sau đại học",
                    'id_theloai' => 4,  
                ],
            ]
        );
    }
}

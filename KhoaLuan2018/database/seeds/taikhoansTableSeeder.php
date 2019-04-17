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
                'name' => "Admin", 
                'viewname' => "Huỳnh Văn Thùy",
                'email' => 'huynhvanthuy1997@gmail.com',
                'password' => bcrypt('123'),
                'permission' => 'Admin',    
                'image' => 'avatar.jpg',  
            ],
            [
                'name' => "sinhvien", 
                'viewname' => "Sinh Viên",
                'email' => 'sinhvien@gmail.com',
                'password' => bcrypt('123'),
                'permission' => 'SinhVien',    
                'image' => 'avatar.jpg',  
            ],
            [
                'name' => "giangvien", 
                'viewname' => "Giảng Viên",
                'email' => 'giangvien@gmail.com',
                'password' => bcrypt('123'),
                'permission' => 'GiangVien',    
                'image' => 'avatar.jpg',  
            ],
        ]);
    }
}

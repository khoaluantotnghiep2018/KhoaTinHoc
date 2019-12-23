<?php

use Illuminate\Database\Seeder;

class lienketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lien_kets')->insert(
            [
                [
                    'tenlienket' => "https://thpt-nguyentatthanh-tphcm.edu.vn/uploads/banners/img_bgddt_220-1_1.jpg",
                    'linklienket' => "https://moet.gov.vn/Pages/home.aspx",  
                    'loailienket' => "HinhAnh"
                ],
                [
                    'tenlienket' => "https://thpt-nguyentatthanh-tphcm.edu.vn/uploads/banners/truonghocketnoitop_banner2_1.gif",
                    'linklienket' => "http://www.ntthnue.edu.vn/",  
                    'loailienket' => "HinhAnh"
                ],
                [
                    'tenlienket' => "https://thpt-nguyentatthanh-tphcm.edu.vn/uploads/banners/logo_small.gif",
                    'linklienket' => "https://hcm.edu.vn/Default33.aspx",  
                    'loailienket' => "HinhAnh"
                ],
                [
                    'tenlienket' => "https://thpt-nguyentatthanh-tphcm.edu.vn/uploads/banners/img_baogiaoduc_tphcm.jpg",
                    'linklienket' => "https://giaoduc.net.vn/",  
                    'loailienket' => "HinhAnh"
                ],
                // Giao Vien
                [
                    'tenlienket' => "Trang web 1",
                    'linklienket' => "https://hcm.edu.vn/Default33.aspx",  
                    'loailienket' => "GiaoVien"
                ],
                [
                    'tenlienket' => "Trang web 2",
                    'linklienket' => "https://giaoduc.net.vn/",  
                    'loailienket' => "GiaoVien"
                ],
                //Hoc sinh
                [
                    'tenlienket' => "Trang web 1",
                    'linklienket' => "https://hcm.edu.vn/Default33.aspx",  
                    'loailienket' => "HocSinh"
                ],
                [
                    'tenlienket' => "Trang web 2",
                    'linklienket' => "https://giaoduc.net.vn/",  
                    'loailienket' => "HocSinh"
                ],
                // Lien ket khac
                [
                    'tenlienket' => "Trang web 1",
                    'linklienket' => "https://hcm.edu.vn/Default33.aspx",  
                    'loailienket' => "LienKetKhac"
                ],
                [
                    'tenlienket' => "Trang web 2",
                    'linklienket' => "https://giaoduc.net.vn/",  
                    'loailienket' => "LienKetKhac"
                ]
            ]
        );
    }
}

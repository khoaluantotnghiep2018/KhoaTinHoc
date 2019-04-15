<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\TrangChu;
use App\Model\TheLoai;
use App\Model\LoaiTin;
use App\Model\TinTuc;
use App\Model\binhluan;
use DB, Mail; 


class thu extends Controller
{
    public function testmodel(){  
		$pass = '1234';
    	Mail::send('testmail', ['matkhau' => $pass], function($msg) { 
			$msg->from('huynhvanthuy97@gmail.com',"Khoa Tin học trường Đại học Sư phạm Huế");
			$msg->to('huynhvanthuy1997@gmail.com','Huỳnh Văn Thùy')
				->subject('Yêu cầu xác thực tài khoản!');
		});
		return "ok";
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Model\LoaiTin;
use App\Model\TheLoai;
use View;

class TaiKhoanController extends Controller
{
    function __construct(){ 
    	// $loaitin = LoaiTin::all();
    	// $theloai = TheLoai::all();
    	// view::share(['loaitin', $loaitin, 'theloai',$theloai, 'taikhoan',$taikhoan]);
	}
    // NGƯỜI DÙNG


    // QUẢN TRỊ VIÊN
    public function getTaiKhoan(){  
        $taikhoan = User::all(); 
        return view('pages.admin.TaiKhoan.ds_taikhoan',['taikhoan'=>$taikhoan]); 
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\LoaiTin;
use App\Model\TheLoai;
use View;

class LoaiTinController extends Controller
{
    function __construct(){ 
    	$loaitin = LoaiTin::all();
    	$theloai = TheLoai::all();
    	view::share(['loaitin', $loaitin, 'theloai',$theloai]);
	}


	// NGƯỜI DÙNG



	// QUẢN TRỊ VIÊN
    public function getLoaiTin(){ 
    	return view('pages.admin.LoaiTin.ds_loaitin');
    }

    public function themLoaiTin(){ 
    	return view('pages.admin.LoaiTin.them_loaitin');
    }

    public function suaLoaiTin(){ 
    	return view('pages.admin.LoaiTin.sua_loaitin');
    }

    public function xoaLoaiTin(){ 
    	return view('pages.admin.LoaiTin.xoa_loaitin');
    }
}

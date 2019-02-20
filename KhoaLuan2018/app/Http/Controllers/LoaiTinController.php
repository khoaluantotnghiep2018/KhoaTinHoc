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

    public function getsuaLoaiTin($id){ 
        $loaitinsua = LoaiTin::find($id);
    	return view('pages.admin.LoaiTin.sua_loaitin',['loaitinsua'=>$loaitinsua]); 
    }

    public function postsuaLoaiTin(Request $request, $id){ 
        $loaitinsua = LoaiTin::find($id);
        $loaitinsua->tenloaitin = $request->tenloaitin;
        $loaitinsua->id_theloai = $request->id_theloai;
        $kiemtra = $loaitinsua->save();

        if($kiemtra){
            return redirect('quantri/tintuc/loaitin/sua/'.$id)->with('thongbao',"1");
        }
        else{
            return redirect('quantri/tintuc/loaitin/sua/'.$id)->with('thongbao',"0");
        }
    }

    public function xoaLoaiTin(){ 
    	return view('pages.admin.LoaiTin.xoa_loaitin');
    }

    public function postthemLoaiTin(Request $request){  
        $loaitinmoi = new LoaiTin;
        $loaitinmoi->tenloaitin = $request->tenloaitin;
        $loaitinmoi->id_theloai = $request->id_theloai;
        $kiemtra = $loaitinmoi->save();

        if($kiemtra){
            return redirect('quantri/tintuc/loaitin/them')->with('thongbao',"1");
        }
        else{
            return redirect('quantri/tintuc/loaitin/them')->with('thongbao',"0");
        }
    }
}

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
    	$loai_tin = LoaiTin::all(); 
        return view('pages.admin.LoaiTin.ds_loaitin',['loai_tin'=>$loai_tin]);  
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
        return redirect('quantri/tintuc/loaitin/sua/'.$id)->with('thongbao',$kiemtra); 
    }

    public function getXoaLoaiTin($id){ 
    	$loaitinxoa = LoaiTin::find($id);
        $kiemtra = $loaitinxoa->delete(); 
        return redirect('quantri/tintuc/loaitin/danhsach/')->with('thongbaoxoa',$kiemtra);  
    }
 

    public function postthemLoaiTin(Request $request){  
        $loaitinmoi = new LoaiTin;
        $loaitinmoi->tenloaitin = $request->tenloaitin;
        $loaitinmoi->id_theloai = $request->id_theloai;
        $kiemtra = $loaitinmoi->save(); 
        return redirect('quantri/tintuc/loaitin/danhsach')->with('thongbaothem',$kiemtra); 
    }
}

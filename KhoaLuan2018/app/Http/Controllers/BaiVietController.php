<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\LoaiTin;
use App\Model\TheLoai;
use App\Model\TinTuc;
use View;

class BaiVietController extends Controller
{
    function __construct(){ 
    	$loaitin = LoaiTin::all();
    	$theloai = TheLoai::all();
    	view::share(['loaitin', $loaitin, 'theloai',$theloai]);
	}


	// NGƯỜI DÙNG


	// QUẢN TRỊ VIÊN
    public function getBaiViet(){ 
        $dsbaiviet = TinTuc::all(); 
    	return view('pages.admin.BaiViet.ds_baiviet',['dsbaiviet'=>$dsbaiviet]);
    }

    public function themBaiViet(){ 
    	return view('pages.admin.BaiViet.them_baiviet');
    }

    public function postThemBaiViet(Request $request){   
        if($request->noidung == null){
            return back()->with('thongbaonoidung','Bạn chưa nhập nội dung, vui lòng thực hiện lại!');
        }
        else{
            $baivietmoi = new TinTuc;
            $baivietmoi->tieude = $request->tieude;
            if($request->hasFile('hinhanh')){ 
                $now = new DateTime(); 
                $file = $request->file('hinhanh'); 
                $fileName = $now->getTimestamp().$file->getClientOriginalName(); 
                $file->move('assets/user/images/hinhtintuc',$fileName);  
            }
            else{
                $fileName = "hinhmota.jpg";
            }
            $baivietmoi->hinhdaidien = $fileName;
            $baivietmoi->mota = $request->mota;
            $baivietmoi->noidung = $request->noidung;
            $baivietmoi->id_loaitin = $request->idLoaiTin;

            $baivietmoi->id_user = '1';
            
            if($request->noibat === "on"){
                $baivietmoi->noibat = 1; 
            }
            $kiemtra = $baivietmoi->save(); 
            return redirect('quantri/tintuc/baiviet/them')->with('thongbaothem',$kiemtra);
        }
    }

    public function selectLoaiTin(Request $request){ 
        $loaitinajax = LoaiTin::all();
        $hienthi = '<label for="selectLoaiTin">Loại tin tức</label>
        <select class="form-control" name="idLoaiTin">';
        foreach($loaitinajax as $lt) {
            if($lt->id_theloai == $request->idTheLoai){
                $hienthi = $hienthi.'<option value="'. $lt->id .'">'. $lt->tenloaitin .'</option>';  
            }
        } 
        return $hienthi.'</select>';
    }

    public function postSuaNoiBat(Request $request){
        $hienthi = '<label>'; 
        $tintucsua = TinTuc::find($request->id);
        if($tintucsua->noibat == "1"){
            $tintucsua->noibat = 0;
            $hienthi = $hienthi.'<input type="checkbox" onchange="DoiNoiBat('.$request->id.')"><span class="label-text"> Tắt</span>'; 
        }
        else{
            $tintucsua->noibat = 1;
            $hienthi = $hienthi.'<input type="checkbox" checked onchange="DoiNoiBat('.$request->id.')"><span class="label-text"> Mở</span>';
        }
        $tintucsua->save(); 
        echo $hienthi.'</label>';
    }

    public function getsuaBaiViet($id){ 
        $baivietsua = TinTuc::find($id);
    	return view('pages.admin.BaiViet.sua_baiviet',['baivietsua'=>$baivietsua]); 
    }

    public function postsuaBaiViet(Request $request, $id){ 
        $loaitinsua = LoaiTin::find($id);
        $loaitinsua->tenloaitin = $request->tenloaitin;
        $loaitinsua->id_theloai = $request->id_theloai;
        $kiemtra = $loaitinsua->save(); 
        return redirect('quantri/tintuc/loaitin/sua/'.$id)->with('thongbao',$kiemtra); 
    }

    public function getXoaBaiViet($id){ 
    	$baivietxoa = TinTuc::find($id);
        $kiemtra = $baivietxoa->delete(); 
        return redirect('quantri/tintuc/baiviet/danhsach/')->with('thongbaoxoa',$kiemtra);  
    }
  
}

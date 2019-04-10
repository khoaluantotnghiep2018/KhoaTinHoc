<?php

Route::get('test', 'thu@testmodel');
    
    // NGƯỜI DÙNG 
Route::group(['prefix'=>'','middleware'=>'userCheckLogin'] , function(){
    Route::get('', function () {
        return redirect()->route('trangchinh');
    }); 
    Route::get('trangchu', 'TrangchuController@loadTrangChu')->name('trangchinh');    
    Route::get('gioithieu', 'TrangchuController@getDuLieuNguoiDung');

    Route::get('danhsachtin', 'BaiVietController@getDsTinTuc');

     
    Route::get('tintuc', function () {
        return view('pages/user/news');
    });
  
    // Route::get('/test', 'TrangchuController@getDuLieu'); 
    
});

Route::group(['prefix'=>'login'] , function(){  
    Route::post('sinhvien','LoginController@postLoginSinhVien');   
    Route::post('giangvien','LoginController@postLoginGiangVien');   
    Route::get('quantri','LoginController@getLoginQuanTri');   
    Route::post('quantri','LoginController@postLoginQuanTri');   
});
Route::group(['prefix'=>'logout'] , function(){  
    Route::get('sinhvien','LoginController@getLogoutSinhVien');    
    Route::get('quantri','LoginController@getLogoutQuanTriVien');    
});
    
// QUẢN TRỊ VIÊN
Route::group(['prefix'=>'quantri','middleware'=>'adminCheckLogin'] , function(){
    Route::get('', function () {
        return redirect()->route('trangchinhadmin');
    }); 
    Route::get('trangchu', function () {
        return view('pages/admin/trangchu');
    })->name('trangchinhadmin');
    Route::group(['prefix'=>'gioithieu'] , function(){
        Route::get('', 'TrangchuController@getDuLieuQuanTri');  
        Route::post('/sua', 'TrangchuController@SuaGioiThieu');
    });
    Route::group(['prefix'=>'hienthi'] , function(){
        Route::get('', 'TrangchuController@HienThiRss');  
        Route::post('suahienthirss', 'TrangchuController@updateHienThiRss'); 
        Route::post('suahienthitintuc', 'TrangchuController@updateHienThiTinTuc'); 
        Route::post('suaanhientintuc', 'TrangchuController@updateAnHienTinTuc');   
        Route::post('suathongbao', 'TrangchuController@updateThongBao');   
    });
    Route::group(['prefix'=>'tintuc'] , function(){ 
        Route::group(['prefix'=>'loaitin'] , function(){ 
            Route::get('danhsach', 'LoaiTinController@getLoaiTin');   

            Route::get('sua/{id}', 'LoaiTinController@getsuaLoaiTin');   
            Route::post('sua/{id}', 'LoaiTinController@postsuaLoaiTin');   

            Route::get('xoa/{id}', 'LoaiTinController@getXoaLoaiTin');   

            Route::get('them', 'LoaiTinController@themLoaiTin'); 
            Route::post('them', 'LoaiTinController@postthemLoaiTin');   
        });
    });
    Route::group(['prefix'=>'tintuc'] , function(){ 
        Route::group(['prefix'=>'baiviet'] , function(){ 
            Route::get('danhsach', 'BaiVietController@getBaiViet');   

            Route::get('sua/{id}', 'BaiVietController@getsuaBaiViet');   
            Route::post('sua/{id}', 'BaiVietController@postsuaBaiViet');   

            Route::get('xoa/{id}', 'BaiVietController@getXoaBaiViet');   

            Route::get('them', 'BaiVietController@themBaiViet'); 
            Route::post('them', 'BaiVietController@postThemBaiViet'); 

            Route::post('selectLoaiTin', 'BaiVietController@selectLoaiTin'); 
            Route::post('suanoibat', 'BaiVietController@postSuaNoiBat');  
        });
    });
    Route::group(['prefix'=>'taikhoan'] , function(){ 
        Route::group(['prefix'=>'quantri'] , function(){ 
            Route::get('danhsach', 'TaiKhoanController@getTaiKhoan');   

            Route::get('sua/{id}', 'TaiKhoanController@getsuaTaiKhoan');   
            Route::post('sua/{id}', 'TaiKhoanController@postsuaTaiKhoan');   

            Route::get('xoa/{id}', 'TaiKhoanController@getXoaTaiKhoan');   

            Route::get('them', 'TaiKhoanController@themTaiKhoan'); 
            Route::post('them', 'TaiKhoanController@postthemTaiKhoan');   
        });
    });

});


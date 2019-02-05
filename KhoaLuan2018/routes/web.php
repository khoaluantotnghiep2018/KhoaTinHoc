<?php

Route::get('test', 'thu@testmodel');
    
    // NGƯỜI DÙNG 
Route::group(['prefix'=>''] , function(){
    Route::get('', function () {
        return redirect()->route('trangchinh');
    }); 
    Route::get('trangchu', 'TrangchuController@loadTrangChu')->name('trangchinh');    
    Route::get('gioithieu', 'TrangchuController@getDuLieuNguoiDung');
    
    Route::get('danhsachtin', function () {
        return view('pages/user/type_news');
    });  
    Route::get('tintuc', function () {
        return view('pages/user/news');
    });

    // Route::get('/test', 'TrangchuController@getDuLieu');
});
    
// QUẢN TRỊ VIÊN
Route::group(['prefix'=>'quantri'] , function(){
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
            Route::get('sua', 'LoaiTinController@suaLoaiTin');   
            Route::get('xoa', 'LoaiTinController@xoaLoaiTin');   
            Route::get('them', 'LoaiTinController@themLoaiTin');   
        });
    });
});


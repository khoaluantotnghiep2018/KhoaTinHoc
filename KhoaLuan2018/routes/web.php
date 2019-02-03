<?php
    
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
    Route::get('trangchu', function () {
        return view('pages/admin/trangchu');
    }); 
    Route::group(['prefix'=>'gioithieu'] , function(){
        Route::get('', 'TrangchuController@getDuLieuQuanTri');  
        Route::post('/sua', 'TrangchuController@SuaGioiThieu');
    });
    Route::group(['prefix'=>'hienthi'] , function(){
        Route::get('', 'TrangchuController@HienThiRss');  
        Route::post('suahienthirss', 'TrangchuController@updateHienThiRss'); 
        Route::post('suahienthitintuc', 'TrangchuController@updateHienThiTinTuc'); 
        Route::post('suaanhientintuc', 'TrangchuController@updateAnHienTinTuc'); 
        
    });
});


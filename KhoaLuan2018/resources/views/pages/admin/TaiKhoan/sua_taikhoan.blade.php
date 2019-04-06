@extends('layout/admin/index')
@section('title')
Quản trị - Tài khoản - Sửa tài khoản
@endsection   
<style>
.app-sidebar__user-avatar_singin{
    width: 50px;
    height: 50px;
    margin-left: 30px;
    border-radius: 50% !important;
}
</style>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-edit"></i> Sửa tài khoản</h1>
          <p>Cập nhật thông tin tài khoản cho hệ thống</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Trang chủ</li>
          <li class="breadcrumb-item">Tài khoản</li>
          <li class="breadcrumb-item"><a href="#">Sửa</a></li>
        </ul>
      </div>
        <div class="offset-md-2 col-md-8">
          <div class="tile">
            <h3 class="tile-title"><center>Cập nhật thông tin</center></h3>
            @if(session('thongbao'))
							@if(session('thongbao') == '1')
								<div class="alert alert-dismissible alert-success">
				                	<button class="close" type="button" data-dismiss="alert">×</button>	<strong>Thành công!</strong> Dữ liệu đã được cập nhật!
				              </div>
                      @else
								<div class="alert alert-dismissible alert-danger">
				                	<button class="close" type="button" data-dismiss="alert">×</button>	<strong>Thất bại!</strong> Lỗi tiến trình cập nhật dữ liệu!
				              </div> 
							@endif
            @endif
            
            <div class="tile-body">
              <form class="form-horizontal" id="formDangKy" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-group row">
                  <label class="control-label col-md-3">Quyền truy cập</label>
                  <div class="col-md-9">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="permission" value="Admin" @if($taikhoansua->permission == 'Admin' ) checked @endif>Quản trị 
                      </label>
                    </div>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="permission" value="GiangVien" @if($taikhoansua->permission == 'GiangVien' ) checked @endif>Giảng viên
                      </label>
                    </div>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="permission" value="SinhVien" @if($taikhoansua->permission == 'SinhVien' ) checked @endif>Sinh viên
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Tên hiển thị</label>
                  <div class="col-md-8">
                    <input required class="form-control" type="text" name="viewname" placeholder="Nhập vào tên hiển thị" value="{{$taikhoansua->viewname}}">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Tên tài khoản</label>
                  <div class="col-md-8">
                    <input readonly required id="account" class="form-control" type="text" name="name" placeholder="Nhập vào tên tài khoản" value="{{$taikhoansua->name}}">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Email</label>
                  <div class="col-md-8">
                    <input readonly required class="form-control" type="email" name="email" placeholder="Nhập vào địa chỉ email" value="{{$taikhoansua->email}}">
                  </div>
                </div> 
                <div class="form-group row"> 
                  <label class="control-label col-md-3">Mật khẩu </label>
                  <div class="col-md-8">
                    <input id="password" class="form-control" type="password" name="password" placeholder="Nhập vào mật khẩu">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="control-label col-md-3">Xác nhận mật khẩu</label>
                  <div class="col-md-8">
                    <input id="setpassword" class="form-control" type="password" placeholder="Xác nhận lại mật khẩu">
                  </div>
                </div> 
                <div class="form-group row">
                  <div class="offset-3 col-md-5">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" id="viewpass">Hiển thị mật khẩu
                      </label>  
                    </div>
                  </div>
                </div>
                
                
                <div class="form-group row"> 
                  <label class="control-label col-md-3"><img class="app-sidebar__user-avatar_singin" src="assets/user/images/avatar/{{$taikhoansua->image}}" alt="User Image"></label>
                  <div class="col-md-8">
                    <input class="form-control" type="file" name="hinhanh" id="hinhdaidien"> 
                  </div>
                </div>
                <div class="tile-footer">
              <div class="row">
                <div class="col-md-8 col-md-offset-3">
                  <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Lưu lại</button>&nbsp;&nbsp;&nbsp;<button type='reset' class="btn btn-secondary"><i class="fa fa-refresh"></i>Nhập lại</button>
                </div>
              </div>
            </div>
              </form>
            </div>
            
          </div>
        </div>
       
      </div>
    </main>
@section('script')  
<script>
    var pw = $('#password');
    var spw = $('#setpassword');
    var frm = $('#formDangKy');
    frm.submit(function (e) {
        var acc = $('#account').val(); 
        if(/^[a-zA-Z0-9]*$/.test(acc) == false) { 
          swal({
              title: "Tài khoản không chứa ký tự đặt biệt!", 
          });
          return false;
        } 

        if(pw.val() != spw.val()){
          swal({
              title: "Mật khẩu chưa khớp!", 
          });
          return false;
        }
       
        var text_hinhdaihien = $("#hinhdaidien").val();
        var duoianh; 
        if(text_hinhdaihien != ''){
            duoianh = $('#hinhdaidien')[0].files[0].type;
        }
        else{
          duoianh = '';
        }
        switch(duoianh)
        {
            case '':
            case 'image/png':
            case 'image/gif':
            case 'image/jpeg':
            case 'image/pjpeg':
                  $.ajax({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    url:'quantri/taikhoan/quantri/sua/{{$taikhoansua->id}}',
                    method:'post', 
                    success:function(response){   
                        if(response == "1"){ 
                                // Hiển thị thông báo thành công
                                $.notify({
                                    title: "Thành công : ",
                                    message: "Tài khoản đã được cập nhật!",
                                    icon: 'fa fa-check' 
                                },{
                                    type: "success"
                                });   
                            }
                            else{
                                swal({
                                    title: "Tài khoản hoặc email đã tồn tại!",
                                });
                            } 
                        }
                  });
                break;
            default:
                swal({
                    title: "File ảnh không hợp lệ!",
                });
                return false;
        } 
    });
 
    $('#viewpass').click(function() { 
      if (pw.attr('type') === 'password') {
        pw.attr('type', 'text');
        spw.attr('type', 'text');
      } else {
          pw.attr('type', 'password');
          spw.attr('type', 'password');
      }
    }); 
</script>
@endsection
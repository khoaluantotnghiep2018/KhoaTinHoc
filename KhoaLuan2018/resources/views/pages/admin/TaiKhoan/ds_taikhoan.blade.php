@extends('layout/admin/index')
@section('title')
Quản trị - Tài khoản - Danh sách tài khoản
@endsection   

<main class="app-content">
	<div class="app-title">
        <div>
		<h1><i class="fa fa-edit"></i> Danh sách tài khoản</h1>
			<p>Quản trị viên</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
			<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
			<li class="breadcrumb-item">Trang chủ</li>
			<li class="breadcrumb-item"><a href="#">Tài khoản</a></li>
			<li class="breadcrumb-item"><a href="#">Quản trị</a></li>
		</ul>
      </div>
      <div class="row">
      <button onclick="location.href='quantri/taikhoan/quantri/them'" class="btn btn-success fa fa-plus-square-o" id="button-add-data" type="button"> Thêm mới</button>
      
      @if(session('thongbaoxoa'))
							@if(session('thongbaoxoa') == '1')
								<div class="alert alert-dismissible alert-success">
				                	<button class="close" type="button" data-dismiss="alert">×</button>	<strong>Thành công!</strong> Tài khoản đã được xóa bỏ vĩnh viễn khỏi hệ thống!
				              </div>
                      @else
								<div class="alert alert-dismissible alert-danger">
				                	<button class="close" type="button" data-dismiss="alert">×</button>	<strong>Thất bại!</strong> Lỗi tiến trình xóa bỏ dữ liệu!
				              </div> 
							@endif
            @endif
      
      <div class="col-md-12"> 
          <div class="tile">
            <div class="tile-body"> 
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>Stt</th>
                    <th>Tài khoản</th>
                    <th>Email</th>
                    <th>Ngày cập nhật</th>
                    <th>Quyền truy cập</th>
                    <th>Sửa / Xóa</th>
                  </tr>
                </thead>
                <tbody>
                  @if($taikhoan != null)
                  @foreach ($taikhoan as $tk)
                  <tr align="center">
                    <td>{{$tk->id}}</td>
                    <td>{{$tk->name}}</td>
                    <td>{{$tk->email}}</td>
                    <td>{{$tk->updated_at}}</td>
                    <td>{{$tk->permission}}</td>
                    <td><button onclick="location.href='quantri/taikhoan/quantri/sua/{{$tk->id}}'" class="btn btn-secondary fa fa-pencil-square-o" " type="button"> Sửa</button><button onclick="location.href='quantri/taikhoan/quantri/xoa/{{$tk->id}}'" class="btn btn-danger fa fa-minus-square-o" type="button"> Xóa</button></td>
                  </tr>
                  @endforeach
                  @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
</main>

@section('script')  
    <!-- The javascript plugin to display page loading on top-->
    <script src="assets/admin/js/plugins/pace.min.js"></script>
    <script type="text/javascript" src="assets/admin/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="assets/admin/js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endsection
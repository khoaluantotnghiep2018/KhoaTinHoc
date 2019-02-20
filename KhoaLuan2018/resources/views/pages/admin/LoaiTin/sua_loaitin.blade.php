@extends('layout/admin/index')
@section('title')
Quản trị - Tin Tức - Sửa loại tin
@endsection   

<main class="app-content">
	<div class="app-title">
		<div>
			<h1><i class="fa fa-edit"></i> Sửa loại tin</h1>
			<p>Thay đổi thông tin loại tin </p>
		</div>
		<ul class="app-breadcrumb breadcrumb">
			<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
			<li class="breadcrumb-item">Trang chủ</li>
			<li class="breadcrumb-item"><a href="#">Loại tin</a></li>
			<li class="breadcrumb-item"><a href="#">Sửa loại tin</a></li>
		</ul>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="tile">
				<div class="row">
					<div class="col-lg-6">
						@if(session('thongbao'))
							@if(session('thongbao') == '1')
								<div class="alert alert-dismissible alert-success">
				                	<button class="close" type="button" data-dismiss="alert">×</button>	<strong>Thành công!</strong> Dữ liệu đã được cập nhật!
				              </div>
							@else
								<div class="alert alert-dismissible alert-danger">
				                	<button class="close" type="button" data-dismiss="alert">×</button>	<strong>Thất bại!</strong> Lỗi tiến trình cập nhật	 dữ liệu!
				              </div>
							@endif
						@endif
						<form action="quantri/tintuc/loaitin/sua/{{$loaitinsua->id}}" method="POST">
							@csrf
							<div class="form-group">
								<label for="loaitin">Tên loại tin</label>
								<input class="form-control" id="loaitin" type="text" placeholder="Nhập tên loại tin tức" name="tenloaitin" required="" value="{{$loaitinsua->tenloaitin}}">
								<small class="form-text text-muted">Loại tin mới không hợp lệ nếu đã tồn tại một loại tin giống nó.</small>
							</div> 
							<div class="form-group">
								<label for="exampleSelect1">Thuộc thể loại</label>
								<select name="id_theloai" class="form-control" id="tentheloai">
									@foreach($theloai as $tl) 
										<option 
										@if($tl->id == $loaitinsua->id_theloai)
											{{"selected"}}
										@endif
										value="{{$tl->id}}">{{$tl->tentheloai}}</option> 
									@endforeach 
								</select>
							</div> 
							<div class="tile-footer">
								<button class="btn btn-primary" type="submit">Lưu lại</button> 
								<button class="btn btn-default" type="reset">Xóa nhập</button>
							</div> 
						</form>
					</div>
				</div> 
			</div>
		</div>
	</div>
</main>

@section('script') 

@endsection
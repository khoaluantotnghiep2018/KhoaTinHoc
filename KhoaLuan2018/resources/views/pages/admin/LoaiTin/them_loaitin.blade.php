@extends('layout/admin/index')
@section('title')
Quản trị - Tin Tức - Thêm loại tin
@endsection   

<main class="app-content">
	<div class="app-title">
		<div>
			<h1><i class="fa fa-edit"></i> Thêm loại tin tức</h1>
			<p>Thêm dữ liệu từ loại tin tức</p>
		</div>
		<ul class="app-breadcrumb breadcrumb">
			<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
			<li class="breadcrumb-item">Loại tin</li>
			<li class="breadcrumb-item"><a href="#">Thêm loại tin</a></li>
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
				                	<button class="close" type="button" data-dismiss="alert">×</button>	<strong>Thành công!</strong> Dữ liệu đã được thêm mới!
				              </div>
							@else
								<div class="alert alert-dismissible alert-danger">
				                	<button class="close" type="button" data-dismiss="alert">×</button>	<strong>Thất bại!</strong> Lỗi tiến trình thêm dữ liệu!
				              </div>
							@endif
						@endif
						<form action="quantri/tintuc/loaitin/them" method="POST">
							@csrf
							<div class="form-group">
								<label for="loaitin">Tên loại tin</label>
								<input class="form-control" id="loaitin" type="text" placeholder="Nhập tên loại tin tức" name="tenloaitin" required="">
								<small class="form-text text-muted">Loại tin mới không hợp lệ nếu đã tồn tại một loại tin giống nó.</small>
							</div> 
							<div class="form-group">
								<label for="exampleSelect1">Thuộc thể loại</label>
								<select name="id_theloai" class="form-control" id="tentheloai">
									@foreach($theloai as $tl)
										<option value="{{$tl->id}}">{{$tl->tentheloai}}</option>
									@endforeach 
								</select>
							</div> 
							<div class="tile-footer">
								<button class="btn btn-primary" type="submit">Thêm mới</button> 
								<button class="btn btn-default" type="reset">Nhập lại</button>
							</div> 
						</form>
					</div>
					<!-- <div class="col-lg-4 offset-lg-1">
						<form>
							<div class="form-group">
								<fieldset disabled="">
									<label class="control-label" for="disabledInput">Disabled input</label>
									<input class="form-control" id="disabledInput" type="text" placeholder="Disabled input here..." disabled="">
								</fieldset>
							</div>
							<div class="form-group">
								<fieldset>
									<label class="control-label" for="readOnlyInput">Readonly input</label>
									<input class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…" readonly="">
								</fieldset>
							</div>
							<div class="form-group has-success">
								<label class="form-control-label" for="inputSuccess1">Valid input</label>
								<input class="form-control is-valid" id="inputValid" type="text">
								<div class="form-control-feedback">Success! You've done it.</div>
							</div>
							<div class="form-group has-danger">
								<label class="form-control-label" for="inputDanger1">Invalid input</label>
								<input class="form-control is-invalid" id="inputInvalid" type="text">
								<div class="form-control-feedback">Sorry, that username's taken. Try another?</div>
							</div>
							<div class="form-group">
								<label class="col-form-label col-form-label-lg" for="inputLarge">Large input</label>
								<input class="form-control form-control-lg" id="inputLarge" type="text">
							</div>
							<div class="form-group">
								<label class="col-form-label" for="inputDefault">Default input</label>
								<input class="form-control" id="inputDefault" type="text">
							</div>
							<div class="form-group">
								<label class="col-form-label col-form-label-sm" for="inputSmall">Small input</label>
								<input class="form-control form-control-sm" id="inputSmall" type="text">
							</div>
							<div class="form-group">
								<label class="control-label">Input addons</label>
								<div class="form-group">
									<label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
									<div class="input-group">
										<div class="input-group-prepend"><span class="input-group-text">$</span></div>
										<input class="form-control" id="exampleInputAmount" type="text" placeholder="Amount">
										<div class="input-group-append"><span class="input-group-text">.00</span></div>
									</div>
								</div>
							</div>
						</form>
					</div> -->
				</div>
				
			</div>
		</div>
	</div>
</main>

@section('script') 

@endsection
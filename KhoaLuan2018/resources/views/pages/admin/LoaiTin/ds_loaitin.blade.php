@extends('layout/admin/index')
@section('title')
Quản trị - Tin Tức - Loại tin
@endsection  
@section('css') 
@endsection
<main class="app-content">
	<div class="app-title">
		<div>
			<h1><i class="fa fa-edit"></i> Tin tức</h1>
			<p>Quản lí tin tức</p>
		</div>
		<ul class="app-breadcrumb breadcrumb">
			<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
			<li class="breadcrumb-item">Trang chủ</li>
			<li class="breadcrumb-item"><a href="javascript:void(0)">Tin tức</a></li>
		</ul>
	</div> 

	<div class="col-md-12">
		<div class="tile"> 
			<h3 class="tile-title">Danh sách loại tin</h3> 
			<td><button onclick="location.href='quantri/tintuc/loaitin/them'" class="btn btn-success fa fa-plus-square-o" id="button-add-data" type="button"> Thêm mới</button></td> 
			<div class="table-responsive"> 
				<table class="table">
					<thead>
						<tr>
							<th>Mã</th>
							<th>Tên loại tin</th>
							<th>Thuộc thể loại</th>
							<th>Xóa</th>
							<th>Sửa</th>
						</tr>
					</thead>
					<tbody>
						@if($loaitin != null)
						@foreach($loaitin as $lt)
						<tr>
							<td>{{$lt->id}}</td>
							<td>{{$lt->tenloaitin}}</td> 

							@foreach($theloai as $tl)
							@if($tl->id == $lt->id_theloai)
							<td>{{$tl->tentheloai}}</td>
							@endif
							@endforeach
							<td><button onclick="location.href='quantri/tintuc/loaitin/sua/{{$lt->id}}'" class="btn btn-secondary fa fa-pencil-square-o" " type="button"> Sửa</button> 
							</td>
							<td><button class="btn btn-danger fa fa-minus-square-o" type="button"> Xóa</button></td>
						</tr>
						@endforeach
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</div>
</main>
@section('script') 

@endsection
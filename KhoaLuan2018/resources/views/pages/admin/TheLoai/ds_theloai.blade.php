@extends('layout/admin/index')
@section('title')
Giới thiệu
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
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th>Mã</th>
							<th>Tên loại tin</th>
							<th>Thuộc thể loại</th>
							<th>Tính năng</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>Mark</td>
							<td>Lorem ipsum dolor sit amet</td>
							<td> 
								<button class="btn btn-secondary fa fa-pencil-square-o" " type="button"> Sửa</button>
								<button class="btn btn-danger fa fa-minus-square-o" type="button"> Xóa</button>
							</td>
						</tr>
						<tr>
							<td>2</td>
							<td>Jacob</td>
							<td>Thornton</td>
							<td>
								
								<button class="btn btn-secondary fa fa-pencil-square-o" " type="button"> Sửa</button>
								<button class="btn btn-danger fa fa-minus-square-o" type="button"> Xóa</button>
							</td>
						</tr>
						<tr>
							<td>3</td>
							<td>Larry</td>
							<td>the Bird</td>
							<td>
								
								<button class="btn btn-secondary fa fa-pencil-square-o" " type="button"> Sửa</button>
								<button class="btn btn-danger fa fa-minus-square-o" type="button"> Xóa</button>
							</td>
						</tr>
						<tr>
							<td>4</td>
							<td>Jacob</td>
							<td>Thornton</td>
							<td>
								
								<button class="btn btn-secondary fa fa-pencil-square-o" " type="button"> Sửa</button>
								<button class="btn btn-danger fa fa-minus-square-o" type="button"> Xóa</button>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</main>
@section('script') 

@endsection
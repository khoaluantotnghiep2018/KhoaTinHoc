@extends('layout/admin/index')
@section('title')
Quản trị - Tài khoản - Danh sách bài viết
@endsection  
<style>
      .detail-img{
          width: 200px;
          height: 150px;
      }
      .tablebaiviet button{
        display : block;
        margin-top: 0.5em;
      }
</style> 

<main class="app-content">
	<div class="app-title">
        <div>
		<h1><i class="fa fa-edit"></i> Danh sách bài viết</h1> 
        </div>
        <ul class="app-breadcrumb breadcrumb">
			<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
			<li class="breadcrumb-item">Trang chủ</li>
			<li class="breadcrumb-item"><a href="#">Bài viết</a></li>
			<li class="breadcrumb-item"><a href="#">Danh sách</a></li>
		</ul>
      </div>
      <div class="row">
      <button onclick="location.href='quantri/tintuc/baiviet/them'" class="btn btn-success fa fa-plus-square-o" id="button-add-data" type="button"> Thêm mới</button>
      
      @if(session('thongbaoxoa'))
							@if(session('thongbaoxoa') == '1')
								<div class="alert alert-dismissible alert-success">
				                	<button class="close" type="button" data-dismiss="alert">×</button>	<strong>Thành công!</strong> Bài viết đã được xóa bỏ vĩnh viễn khỏi hệ thống!
				              </div>
                      @else
								<div class="alert alert-dismissible alert-danger">
				                	<button class="close" type="button" data-dismiss="alert">×</button>	<strong>Thất bại!</strong> Lỗi tiến trình xóa bỏ dữ liệu!
				              </div> 
							@endif
      @endif
      
      <div class="col-md-12"> 
          <div class="tile">
            <div class="tile-body tablebaiviet"> 
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>Stt</th>
                    <th>Tiêu đề</th>
                    <th>Mô tả</th>
                    <th>Hình ảnh</th>
                    <th>Nổi bật</th>
                    <th>Lượt xem</th>
                    <th>Sửa / Xóa</th>
                  </tr>
                </thead>
                <tbody>
                  @if($dsbaiviet != null)
                  @foreach ($dsbaiviet as $ds)
                  <tr align="center">
                    <td>{{$ds->id}}</td>
                    <td>{{$ds->tieude}}</td>
                    <td>{{$ds->mota}}</td>
                    <td><img class="detail-img" src="assets/user/images/hinhtintuc/{{$ds->hinhdaidien}}"></td>
                    <td> 
                      <div class="animated-checkbox" id="luuNoiBat{{$ds->id}}">
                        <label> 
                          @if( $ds->noibat == '1') 
                          <input type="checkbox" checked onchange="DoiNoiBat({{$ds->id}})"><span class="label-text"> Mở</span>  
                          @else
                          <input type="checkbox" onchange="DoiNoiBat({{$ds->id}})"><span class="label-text"> Tắt</span> 
                          @endif
                        </label>
                      </div>
                    </td>
                    <td>{{$ds->luotxem}}</td>
                    <td><button  class="btn btn-success fa fa-search" type="button"> Xem</button><button onclick="location.href='quantri/tintuc/baiviet/sua/{{$ds->id}}'" class="btn btn-secondary fa fa-pencil-square-o" type="button"> Sửa</button><button onclick="location.href='quantri/tintuc/baiviet/xoa/{{$ds->id}}'" class="btn btn-danger fa fa-trash" type="button"> Xóa </button></td>
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
    <script>
      function DoiNoiBat(id){ 
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            url: 'quantri/tintuc/baiviet/suanoibat',
            method: 'post',
            data: {id: id},
            success: function (data) { 
                $("#luuNoiBat"+id).html(data); 
            }
        });  
      }
    </script>
@endsection
@extends('layout/admin/index')
@section('title')
Liên kết
@endsection

@section('css')
@endsection

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> Liên kết</h1>
            <p>Quản lí liên kết trang</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Trang chủ</li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Liên kết</a></li>
        </ul>
    </div>
    <div class="row">
    <div class="col-md-12"> 
          <div class="tile">
            <div>
                <p>Quản lí hình ảnh liên kết </p>
            </div>
            <div class="tile-body"> 
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>Tên liên kết</th>
                    <th>Liên kết</th>
                    <th>Thiết lập</th>
                  </tr>
                </thead>
                <tbody>
                 
                  <tr>
                    <td><img src="" alt=""></td>
                    <td><input type="text" value="124"></td>
                    <td><button>Lưu</button></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <div class="tile">
            <div>
                <p>Quản lí liên kết </p>
            </div>
            <div class="tile-body"> 
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>Liên kết</th>
                    <th>Loại liên kết</th>
                    <th>Thiết lập</th>
                  </tr>
                </thead>
                <tbody>
                 
                  <tr>
                    <td><img src="" alt=""></td>
                    <td><input type="text" value="124"></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
    </div>
</main>
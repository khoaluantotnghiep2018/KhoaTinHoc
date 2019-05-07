@extends('layout/admin/index')
@section('title')
Quản trị - Hộp thư - Danh sách hộp thư
@endsection  
<style> 
</style> 

<main class="app-content">
<div class="app-title">
        <div>
          <h1><i class="fa fa-envelope-o"></i> Hộp thư hổ trợ</h1>
          <p>Danh sách hộp thư hổ trợ từ sinh viên</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Hộp thư</a></li>
          <li class="breadcrumb-item"><a href="#">Danh sách</a></li>
        </ul>
      </div>
      @if($hopthu != null) 
      <div class="row">
        @php
            $slChuaDoc = $slThuThuong = $slAnDanh = 0; 
            foreach($hopthu as $ht){
                if($ht->dadoc == 0){
                    $slChuaDoc++;
                }
                if($ht->andanh == 1 && $ht->dadoc == 0){
                    $slAnDanh++;
                }
                if($ht->andanh == 0 && $ht->dadoc == 0){
                    $slThuThuong++;
                }
            }
        @endphp 
        <div class="col-md-2"><a class="mb-2 btn btn-primary btn-block" href="javascript:void(0)">THƯ CHƯA ĐỌC</a>
          <div class="tile p-0">
            <!-- <h4 class="tile-title folder-head">Folders</h4> -->
            <div class="tile-body">
              <ul class="nav nav-pills flex-column mail-nav">
                  <li class="nav-item active"><a class="nav-link" href="#"><i class="fa fa-envelope-o fa-fw"></i> Thư thường<span class="badge badge-pill badge-primary float-right">@if($slThuThuong>0) {{$slThuThuong}} @endif</span></a></li> 
                  <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-file-text-o fa-fw"></i> Ẩn danh<span class="badge badge-pill badge-primary float-right">@if($slAnDanh>0) {{$slAnDanh}} @endif</span></a></li>
                  <li class="nav-item active"><a class="nav-link" href="#"><i class="fa fa-inbox fa-fw"></i> Tổng<span class="badge badge-pill badge-primary float-right">@if($slChuaDoc>0) {{$slChuaDoc}} @endif</span></a></li>
              </ul>
            </div> 
          </div>
        </div>
        <div class="col-md-9">
          <div class="tile">
            <div class="mailbox-controls">
              <div class="animated-checkbox">
                <label>
                  <input type="checkbox"><span class="label-text"></span>
                </label>
              </div>
              <div class="btn-group">
                <button class="btn btn-primary btn-sm" type="button"><i class="fa fa-trash-o"></i></button> 
                <button class="btn btn-primary btn-sm" type="button"><i class="fa fa-eye"></i></button>
                <button onclick=location.reload(); class="btn btn-primary btn-sm" type="button"><i class="fa fa-refresh"></i></button>
              </div>
            </div>
            <div class="table-responsive mailbox-messages">
              <table class="table table-hover">
                <tbody> 
                @foreach($hopthu as $ht) 
                        @php
                            if(strlen($ht->noidung) > 60){
                                $noidung = substr($ht->noidung, 0, 60).'...';   
                            }
                            else{
                                $noidung = $ht->noidung;
                            }
                        @endphp
                    @if($ht->andanh == "0")  
                  <tr>
                    <td>
                      <div class="animated-checkbox">
                        <label>
                          <input type="checkbox"><span class="label-text"> </span>
                        </label>
                      </div>
                    </td>
                    <td><a href="#"><i class="fa fa-user"></i></a></td>
                    <td><a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModalLong{{$ht->id}}" @if($ht->dadoc == 0) style="color: #dab021;" @endif >{{$ht->hoten}}</a></td>
                    <td class="mail-subject"><b>{{$ht->dienthoai}}</b> - {{$noidung}}</td>
                    <td>{{date("d-m-Y", strtotime($ht->updated_at))}}</td>
                  </tr>
                    @else 
                  <tr>
                    <td>
                      <div class="animated-checkbox">
                        <label>
                          <input type="checkbox"><span class="label-text"> </span>
                        </label>
                      </div>
                    </td>
                    <td><a href="#"><i class="fa fa-user-times"></i></a></td>
                    <td><a href="javascript:void(0)" data-toggle="modal" data-target="#exampleModalLong{{$ht->id}}" @if($ht->dadoc == 0) style="color: #dab021;" @endif >{{$ht->hoten}}</a></td>
                    <td>{{$noidung}}</td> 
                    <td>{{date("d-m-Y", strtotime($ht->updated_at))}}</td>  
                  </tr>   
                  @endif

                  <div class="modal fade" id="exampleModalLong{{$ht->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true"> 
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">{{$ht->hoten}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{$ht->noidung}}
                        </div> 
                        <div>
                        <input name="" class="form-control is-valid" type="text" >
                        </div> 
                        <div class="modal-footer">
                            @if($ht->andanh == 0)
                            <button type="button" class="btn btn-success" data-dismiss="modal">Trả lời</button>
                            @endif
                            @if($ht->dadoc == 0)
                            <button onclick="location.href='quantri/hopthu/xemMotTin/'+{{$ht->id}}" type="button" class="btn btn-primary">Đánh dấu đã đọc</button>
                            @endif
                            
                        </div>
                        </div>
                    </div>
                    </div>

                @endforeach
                </tbody>
              </table>
            </div> 
                @if($hopthu != null)
                {{$hopthu->links()}} 
                @endif  
          </div>
        </div>
      </div>
      @endif
</main>

@section('script')    
@endsection
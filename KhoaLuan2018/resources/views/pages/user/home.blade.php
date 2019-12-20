@extends('layout/user/index')

@section('title')
Trang chủ
@endsection

@section('content')
<div class="content">
    <!-- Hiển thị top news khoa -->
    @if($trangchu != null)
    <div class="content-box">
        <div class="content-box__title">
            <div class="link">
                <p>Tin mới nhất</p>
            </div>
            <div class="next">
            </div>
        </div>
        <div class="content-box__main" id="news_top">
            @if($baiviettopngaunhienchung != null)
            @foreach($baiviettopngaunhienchung as $bvtnnc)
            @php 
                $tieude = $bvtnnc->tieude;
                if(strlen($tieude) >= 50){
                    $tieudecat = substr($tieude,0,50);
                    $index = strrpos($tieudecat," ");  
                    $tieudengan = substr($tieudecat,0,$index); 
                }
                else{
                    $tieudengan = $tieude;
                }
            @endphp
            <article>
                <a href=""><img src="assets/user/images/hinhtintuc/{{$bvtnnc->hinhdaidien}}"
                    alt=""></a>
                    <div class="information">
                        <div class="information-title"><a href="">{{$tieudengan}}</a></div>
                        <div class="date">
                            <span class="fas fa-calendar-alt"> {{$bvtnnc->updated_at}}</span>
                        </div>
                        @php
                            $mota = $bvtnnc->mota;
                            if(strlen($mota) >= 215){
                                $motacat = substr($mota,0,215);
                                $index = strrpos($motacat," ");  
                                $motangan = substr($motacat,0,$index); 
                            }
                            else{
                                $motangan = $mota;
                            }
                        @endphp
                        <div class="text"> {{$motangan}}</div>
                    </div>
                    @php
                        if($binhluanchung != null){
                            $dembinhluan = 0;
                            foreach($binhluanchung as $bl){
                                if($bl->id_tintuc == $bvtnnc->id){
                                    $dembinhluan++;
                                }
                            }
                        }
                    @endphp
                    <div class="cmt">
                        <span><i class="fas fa-eye"></i> : {{$bvtnnc->luotxem}}</span>
                        <span><i class="far fa-comment"></i> :{{$dembinhluan}}</span>
                    </div>

                </article>
            @break
            @endforeach
            @endif
            </div>

        </div>
        @endif
        <!-- Hiên thị tin -->
        @if(($theloai != null) &&($demtheloaichung != null))
        @foreach($theloai as $tl) 
            @foreach($theloaicotintucchung as $tlcttc) 
                @if($tl->id == $tlcttc->idTheLoai)
        <div class="content-box" @if(!$tl->hienthi) hidden @endif>
            <div class="content-box__title">
                <div class="link">
                    <p href="">{{$tl->tentheloai}}</p>
                </div>

                <div class="next">
                    <a href=""><i class="fas fa-list"></i></a>
                </div>
            </div>

            <div class="content-box__main">
                <ul>
                    @php
                        $maxbaiviet = 0;
                    @endphp
                    @foreach($baiviettheoloaichung as $bvtlc) 
                        @if($bvtlc->idTheLoai == $tlcttc->idTheLoai && $maxbaiviet < 3)
                        @php
                            $maxbaiviet++;
                            $tieude = $bvtlc->tieude;
                            if(strlen($tieude) >= 50){
                                $tieudecat = substr($tieude,0,50);
                                $index = strrpos($tieudecat," ");  
                                $tieudengan = substr($tieudecat,0,$index); 
                            }
                            else{
                                $tieudengan = $tieude;
                            }
                        @endphp
                        <li><a href="tintuc/{{$bvtlc->id}}"><i class="fas fa-hand-point-right"></i> {{$tieudengan}}...</a></li>
                        @endif
                        @endforeach 
                        <li><a href="javascript:void(0)"></a></li>
                </ul>
                    @php
                        $dem = 0;
                    @endphp
                    @foreach($motbaiviettheoloaichung as $mbvtlc)  
                        @if($mbvtlc->idTheLoai == $tlcttc->idTheLoai && $dem == 0)
                        @php
                            $tieude = $mbvtlc->tieude;
                            if(strlen($tieude) >= 145){
                                $tieudecat = substr($tieude,0,145);
                                $index = strrpos($tieudecat," ");  
                                $tieudengan = substr($tieudecat,0,$index); 
                            }
                            else{
                                $tieudengan = $tieude;
                            }
                        @endphp
                    <article>
                        <a href="tintuc/{{$mbvtlc->id}}"><img src="assets/user/images/hinhtintuc/{{$mbvtlc->hinhdaidien}}"
                            alt=""></a>
                        <div class="information">
                            <div class="information-title"><a href="tintuc/{{$mbvtlc->id}}">{{$tieudengan}}</a></div>
                            <div class="date">
                                <span>{{$mbvtlc->updated_at}}</span>
                            </div>
                            @php
                                $mota = $mbvtlc->mota;
                                if(strlen($mota) >= 215){
                                    $motacat = substr($mota,0,215);
                                    $index = strrpos($motacat," ");  
                                    $motangan = substr($motacat,0,$index); 
                                }
                                else{
                                    $motangan = $mota;
                                }
                            @endphp
                            <div class="text">{{$motangan}}</div>
                        </div> 
                        <div class="cmt">
                            <span><i class="fas fa-eye"></i> : {{$mbvtlc->luotxem}}</span> 
                            @php
                                if($binhluanchung != null){
                                    $dembinhluan = 0;
                                    foreach($binhluanchung as $bl){
                                        if($bl->id_tintuc == $mbvtlc->id){
                                            $dembinhluan++;
                                        }
                                    }
                                }
                            @endphp
                            <span><i class="far fa-comment"></i> : {{$dembinhluan}} bình luận</span> 
                        </div>
                    </article>
                        @php
                            $dem = 1;
                        @endphp
                        @endif
                    @endforeach 
                    
                </div>

            </div> 
                    @endif 
                @endforeach
            @endforeach
            @endif

        </div> <!-- END CONTENT -->
        @endsection

        @section('script')

        @endsection
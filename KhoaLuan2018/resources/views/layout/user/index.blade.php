<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<base href="{{asset('')}}">
	<title>@yield('title')</title> 
	<link rel="stylesheet" href="assets/user/css/reset.css">
	<link rel="stylesheet" href="assets/user/css/style.css">
	<link rel="stylesheet" href="assets/user/css/all.css"> 
	<style>
		.showsubmenu{
			float: right;
			display: none;
			font-size: 22px;
		} 
		#checkRemember{
			width: auto;
		} 
		#loiHoTro{
			background-color: #f8f8f8; 
			border-radius: 20px; 
			color: red;
			display : none;
			font-weight: bold;
		}
		#thongBaoHoTro{
			background-color: #f8f8f8; 
			border-radius: 20px; 
			color: green;
			font-weight: bold;
			display : none;
		}
	</style>
	@yield('css') 
</head>

<body onload="timeclock()">
	<div class="container">
		<!-- Nội dung header -->
		<div class="log-form">
			<div class="form-wrapper">
				<div class="close-form"><i class="fas fa-times-circle"></i></div>
				<form class='form-dangnhap' id="form_dangnhap_sv" method="post">
					@csrf
					<div class="log-form__title">Sinh viên đăng nhập</div>
					<label for=""> 
						<span class="error" id="loiLogin">Tài khoản hoặc mật khẩu chưa đúng!</span> 	  
						<span class="error" id="loiPhanQuyen">Tài khoản không dùng cho sinh viên<br>Vui lòng chọn đăng nhập cho giảng viên!</span> 	 
					</label>
					<label for="">
						<span class='icon'><i class="fas fa-user"></i></span>
						<input required type="email" placeholder="Tên đăng nhập hoặc email" name="name" autofocus>
					</label>
					<label for="">
						<span class='icon'><i class="fas fa-unlock-alt"></i></span>
						<input required type="password" placeholder="Mật khẩu" name="password"> 
					</label>
					<label for="">
						<input id="checkRemember" type="checkbox" name="remember"> Ghi nhớ đăng nhập<br>
					</label> 
					<label for="">
						<button type='submit' class='btn-login' id="btnDangNhapSv">Đăng nhập</button>
					</label>
					<label for="">
						<a href="" class='link-register'><b>Giành cho giảng viên</b></a>
					</label> 
				</form>
				<form method="post" class='form-dangky' id="formLoginGv">
					@csrf
					<div class="log-form__title">Giảng viên đăng nhập</div>
					<label for=""> 
						<span class="error" id="loiLoginGV">Tài khoản hoặc mật khẩu chưa đúng!</span> 	  
						<span class="error" id="loiPhanQuyenGV">Tài khoản không dùng cho giảng viên<br>Vui lòng chọn đăng nhập cho sinh viên!</span> 	 
					</label>
					<label for="">
						<select name="permission" id="selectQuyen">
							<option value="">Mức quyền</option>
							<option value="Admin">Quản trị</option>
							<option value="GiangVien">Giảng viên</option>
						</select> 
					</label>
					<label for="">
						<span class='icon'><i class="fas fa-user"></i></span>
						<input required type="text" name="name" placeholder="Tên đăng nhập hoặc email" autofocus> 
					</label>
					<label for="">
						<span class='icon'><i class="fas fa-unlock-alt"></i></span>
						<input required type="password" name="password" placeholder="Mật khẩu"> 
					</label> 
					<label for="">
						<input id="checkRemember" type="checkbox" name="remember"> Ghi nhớ đăng nhập<br>
					</label>  
					<label for="">
						<button type='submit' class='btn-register' id="btnLoginAd">Đăng nhập</button>
					</label>
					<label for="">
						<a href="" class='link-login'><b>Giành cho sinh viên</b></a>
					</label>
				</form>
			</div>

		</div>

		<div id="logout-form">
			<!-- Modal content -->
			<div class="logout-form-content">
				<div class="test">
					<span class="closeLogout"><i class="fas fa-times-circle"></i></span>
					<ul>
						<li> <a href="#" class="far fa-user-circle"> Trang cá nhân</a> </li>
						<li> <a href="logout/sinhvien" class="fas fa-sign-out-alt"> Đăng xuất</a> </li>
					</ul>
				</div>

			</div>
		</div>
		<header class="header">
			<div class="header-banner">
				<img src="assets/user/images/bannerDHSP.gif" alt="">
			</div> 
			<div class="header-login" @if(Auth::check()) hidden @endif><i class="fas fa-lock"></i></div>
			<div class="header-logout" @if(!Auth::check()) hidden @endif>
				<i onclick="clickLogout()" class="fas fa-user-graduate"></i>
			</div>
		</header> <!-- END HEADER -->
		<div class="bar-menu"><i class="fas fa-bars"></i></div>
		<nav class="nav">
			<div class="close"><i class="fas fa-times-circle"></i></div>
			<ul>
				<li><a href="trangchu"><i class="fas fa-home"></i></a></li>
				<li><a href="gioithieu">Giới thiệu</a></li>
				@foreach($tatcatheloai as $tctl)
					<li>
						<a href="javascript:void(0)">{{$tctl->tentheloai}}<i class="fa fa-plus-square showsubmenu"></i></a>
						<ul class='submenu'>
							@foreach($loaitin as $lt) 
							@if($tctl->id == $lt->id_theloai)
							<li><center><a href="danhsachtin/{{$lt->id}}">{{$lt->tenloaitin}}</a></center></li> 
							@endif
							@endforeach
						</ul>
					</li> 
				@endforeach 

				<li><a href="">Danh sách</a></li>
				<li>
					<a href="">Tài liệu tham khảo</a>
					<ul class='submenu'> 
						<li><center><a href="">Tham khảo chung</a></center></li>   
						@can('quyensinhvien') 
						<li><center><a href="">Sinh viên</a></center></li>  
						@endcan 
						@can('quyengiangvien')  
						<li><center><a href="">Sinh viên</a></center></li>   
						<li><center><a href="">Giảng viên</a></center></li>  
						@endcan 
					</ul>	
				</li>
				<li><a href="">Liên hệ chúng tôi</a></li>
			</ul>
		</nav> <!-- END MENU -->

		<div class="search">
			<div id="clocktop"></div>
			<div class="form-search">
				<form action="" method='get'>
					<input type="text" placeholder="Tìm kiếm..." name='search'>
					<button><i class="fas fa-search"></i></button>
				</form>
			</div>
		</div> <!-- END SEARCH -->
		<!-- Xong nội dung header -->
		<main class="main">
			<!-- Left -->
			<div class="left">
				<div class="left-menu">
					<div class="danhmuc">Danh Mục <i class="fas fa-angle-down"></i></div>
					<ul>
						<li>
							<a href="javascript:void(0)">Cơ cấu tổ chức</a>
							<ul class="left-menu__sub">
								<li><a href="trangchu"><i class="fas fa-award"></i> Tổ chức 1</a></li>
								<li><a href="trangchu"><i class="fas fa-award"></i> Tổ chức 2</a></li>
								<li><a href="trangchu"><i class="fas fa-award"></i> Tổ chức 3</a></li>
								<li><a href="trangchu"><i class="fas fa-award"></i> Tổ chức 4</a></li>
							</ul>
						</li>
						<li>
							<a href="javascript:void(0)">Các tổ chuyên môn</a>
							<ul class="left-menu__sub">
								<li><a href="trangchu"><i class="fas fa-award"></i> Tổ 1</a></li>
								<li><a href="trangchu"><i class="fas fa-award"></i> Tổ 2</a></li>
								<li><a href="trangchu"><i class="fas fa-award"></i> Tổ 3</a></li>
								<li><a href="trangchu"><i class="fas fa-award"></i> Tổ 4</a></li>
							</ul>
						</li>
						<li><a href="javascript:void(0)">Chi bộ</a></li>
						<li><a href="javascript:void(0)">Thông tin từ cơ sở dữ liệu</a></li>
					</ul>
				</div>

				<div class="left-lienket">
					<div class="title">Hình ảnh liên kết</div>
					<div class="left-lienket__box">
						<a href=""><img src="https://thpt-nguyentatthanh-tphcm.edu.vn/uploads/banners/img_bgddt_220-1_1.jpg" alt=""></a>
						<a href='#'><img src="https://thpt-nguyentatthanh-tphcm.edu.vn/uploads/banners/truonghocketnoitop_banner2_1.gif"
							 alt=""></a>
						<a href='#'><img src="https://thpt-nguyentatthanh-tphcm.edu.vn/uploads/banners/logo_small.gif" alt=""></a>
						<a href='#'><img src="https://thpt-nguyentatthanh-tphcm.edu.vn/uploads/banners/img_bao-giao-ducvn.jpg" alt=""></a>
						<a href='#'><img src="https://thpt-nguyentatthanh-tphcm.edu.vn/uploads/banners/img_baogiaoduc_tphcm.jpg" alt=""></a>
					</div>
				</div>

				<div class="left-lienket">
					<div class="title">Liên kết website</div>
					<div class="lienket-website">

						<select name="" id="0">
							<option value="">Giành cho sinh viên</option>
							<option value="">website 1</option>
							<option value="">website 2</option>
						</select>
						<select name="" id="0">
							<option value="">Giành cho giảng viên</option>
							<option value="">website 1</option>
							<option value="">website 2</option>
						</select>
						<select name="" id="0">
							<option value="">Liên kết khác</option>
							<option value="">website 1</option>
							<option value="">website 2</option>
						</select>
					</div>
				</div>

				<div class="left-truycap">
					<div class="title">Thống kê truy cập</div>
					<div class="left-truycap__box">
						<div class="box">
							<span><i class="fas fa-grip-horizontal"></i> Đang truy cập</span>
							<span>9</span>
						</div>
						<div class="box">
							<span><i class="fas fa-filter"></i> Môt tháng trước</span>
							<span>9</span>
						</div>
						<div class="box">
							<span><i class="fas fa-calendar-alt"></i> Năm qua</span>
							<span>9</span>
						</div>
						<div class="box">
							<span><i class="fas fa-bars"></i> Tổng lượt truy cập</span>
							<span>9</span>
						</div>
					</div>
				</div>
			</div> <!-- END LEFT -->

			@yield('content')

			<!-- Right -->
			<div class="right">
				<div class="right-news">
					@if($dulieuthongbao != null)
					<div class="right-information">
						<a href="" class="fa fa-bullhorn"><strong> THÔNG BÁO</strong></a>
						<div class="ArticleNewTitle" align="center"><center><b>{{$dulieuthongbao->tieude}}</b></center></div>
						<hr> 
						{!!$dulieuthongbao->noidung!!}
						<hr>* <b><i>{{$dulieuthongbao->ghichu}}</i></b>
						<input hidden="" type="text" id="ngaybatdauthongbao" name="" value="{{$dulieuthongbao->ngaybatdau}}">
						<input hidden="" type="text" id="ngayhethanthongbao" name="" value="{{$dulieuthongbao->ngayhethan}}">
					</div>
					@endif
					<!--Giới thiệu trường học . RIGHT -->

					<div class="title">Tin tức nổi bật</div>
					<div class="right-news_border">
						<div class="marquee">
							@if($baivietnoibatchung != null)
								@foreach($baivietnoibatchung as $bvnbc)
								@php
									$tieude = $bvnbc->tieude;
									if(strlen($tieude) >= 50){
										$tieudecat = substr($tieude,0,50);
										$index = strrpos($tieudecat," ");  
										$tieudengan = substr($tieudecat,0,$index); 
									}
									else{
										$tieudengan = $tieude;
									}
								@endphp
								<div class="right-news__box">
									<a href="tintuc/{{$bvnbc->id}}"><img src="assets/user/images/hinhtintuc/{{$bvnbc->hinhdaidien}}"
										alt=""></a>
									<a href="tintuc/{{$bvnbc->id}}">{{$tieudengan}}...</a>
									<div style='clear:both'></div>
								</div>
								@endforeach
							@endif 
						</div>

					</div>

				</div>

			</div> <!-- END RIGHT -->

			<div class="contact">
				<div class="contact-title">
					<i class="fas fa-envelope-square"></i> <span>Hổ trợ sinh viên</span>
					<div class="contact-title__close"><i class="fas fa-times-circle"></i></div>
				</div>
				<div class="contact-content">
					<form method="post" id="postHoTroSinhVien">
					    @csrf
						<label for=""> 
							<span id="loiHoTro" id="loiLogin">Lỗi dữ liệu, kiểm tra lại!</span> 	  
							<span id="thongBaoHoTro" id="loiLogin">Chúng tôi sẽ phản hồi cho bạn sớm nhất!</span> 	  
						</label>
						<label for="">
							<span><i class="fas fa-user"></i></span>
							<input required name="hoten" type="text" placeholder="Họ tên">
						</label>
						<label for="">
							<span><i class="fas fa-envelope"></i></span>
							<input required name="email" type="text" placeholder="Email">
						</label>
						<label for="">
							<span><i class="fas fa-phone-volume"></i></span>
							<input onKeyPress="return isNumberKey(event)" required name="dienthoai" type="text" placeholder="Điện thoại">
						</label>
						<label for="">
							<textarea required name="noidung" id="noidunghotro" placeholder="Bạn cần khoa hổ trợ điều gì?" rows="1" cols="28"></textarea>
						</label>
						<button type="submit">Gửi hổ trợ</button>
						<button id="bntHoTroAnDanh" type="button">Gửi ẩn danh</button>
					</form>
				</div>
			</div> <!-- END CONTACT (LH) -->
		</main> <!-- END MAIN -->
		<div class="clickTop"><i class="fas fa-angle-up"></i></div>
	</div>
	<footer class='footer'>
		<div class="container">
			<div class="footer-left">
				<div class="title-footer">
					KHOA TIN HỌC - TRƯỜNG ĐẠI HỌC SƯ PHẠM HUẾ
				</div>
				<ul>
					<li>LIÊN HỆ CHÚNG TÔI</li>
					<li><a href=""><i class="fas fa-map-marker-alt"></i> Địa chỉ: 34 Lê Lợi - thành phố Huế, Việt Nam</a></li>
					<li><a href=""><i class="fas fa-phone-volume"></i> Điện thoại: 123456789</a></li>
					<li><a href=""><i class="fas fa-fax"></i> Fax: 0234.12345678</a></li>
					<li><a href=""><i class="fas fa-envelope-square"></i> Email: khoatinhocdhsphue.edu.vn</a></li>
					<li><a href=""><i class="fas fa-file-contract"></i> Website: http://khaotinhocsphue.edu.vn</a></li>
					<li>Bản quyền © thuộc về khoa Tin Học trường đại học sư phạm Huế, thiết kế bởi Huỳnh Văn Thùy.</li>
				</ul>
			</div>
			<div class="footer-right">
				<iframe src="https://www.facebook.com/plugins/page.php?href=https://www.facebook.com/Khoa-Tin-Ho%CC%A3c-%C4%90HSP-Hu%C3%AA%CC%81-609379282849972/&width=500&height=300&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId"
				 width="500" height="300" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"
				 allow="encrypted-media"></iframe>
			</div>
		</div>
	</footer> <!-- END FOOTER -->
</body> 
<script src="assets/admin/js/jquery-3.2.1.min.js"></script>
<script src='assets/user/js/style.js'></script> 
<script type="text/javascript" src="assets/admin/js/moment.min.js"></script>
<script type="text/javascript" src="assets/user/js/ustrangchu.js"></script> 
<script>
	var postFormLoginSv = $("#form_dangnhap_sv"); 
	var postLoginGv = $("#formLoginGv");  
	var selectQuyen = $("#selectQuyen");
	var btnSubLoginAd = $("#btnLoginAd");
	selectQuyen.change(function(){
		if(selectQuyen.val() == "Admin"){
			btnSubLoginAd.prop('disabled', true);
			var notify = confirm("Đăng nhập hệ thống quản trị?");
			if (notify == true) {
				location.href = 'login/quantri';
			}  
		}
		if(selectQuyen.val() == "GiangVien"){
			btnSubLoginAd.prop('disabled', false); 
		}
	}); 

	postFormLoginSv.submit(function(e){ 
		$.ajax({
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
			url: 'login/sinhvien',
			method: 'post',
			data: $('#form_dangnhap_sv').serialize(),
			success: function (response) {
				if (response == "ok") {
					 location.reload();
					 return false; 
				}
				if (response == "loiphanquyen") {
					$("#loiLogin").css("display", "none"); 
					$("#loiPhanQuyen").css("display", "block");
					postFormLoginSv.trigger("reset");
					return false; 
				}
				if (response == "loidangnhap") {
					$("#loiPhanQuyen").css("display", "none"); 
					$("#loiLogin").css("display", "block");
					return false; 
				}
			}
		});
		return false;
	});

	postLoginGv.submit(function(e){ 
		if($("#selectQuyen").val() == ""){
			$("#loiLoginGV").css("display", "none"); 
			$("#loiPhanQuyenGV").css("display", "none");   
			btnSubLoginAd.prop('disabled', true);  
			return false;
		}
		btnSubLoginAd.prop('disabled', false);  
		$.ajax({
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
			url: 'login/giangvien',
			method: 'post',
			data: $('#formLoginGv').serialize(),
			success: function (response) {
				if (response == "ok") {
					location.reload();
					return false; 
				}
				if (response == "loiphanquyen") {
					$("#loiLoginGV").css("display", "none"); 
					$("#loiPhanQuyenGV").css("display", "block");
					postLoginGv.trigger("reset");
					return false; 
				}
				if (response == "loidangnhap") {
					$("#loiPhanQuyenGV").css("display", "none"); 
					$("#loiLoginGV").css("display", "block");
					return false; 
				}
			}
		});
		return false;
	});

	// Xử lý thêm hổ trợ  
	function isNumberKey(evt)
	{
		var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57))
			return false;
		return true;
	}

	var postHoTroSinhVien = $('#postHoTroSinhVien');
	postHoTroSinhVien.submit(function(e){    
		$.ajax({
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
			url: 'hotro/thuong',
			method: 'post',
			data: $('#postHoTroSinhVien').serialize(),
			success: function (response) {
				if(response == "1"){
					$('#loiHoTro').css("display",'none');
					$('#thongBaoHoTro').css("display",'block');  
					$('#postHoTroSinhVien').trigger("reset");
					setTimeout(function(){ $('#thongBaoHoTro').css("display",'none'); }, 3000);  
				}
				else{
					$('#loiHoTro').css("display",'block');
					$('#thongBaoHoTro').css("display",'none');
				}
			}
		});
		return false;
	});

	$('#bntHoTroAnDanh').click(function(){
		var noidung = $('#noidunghotro');
		$('#loiHoTro').css("display",'none');
		$('#thongBaoHoTro').css("display",'none');
		if(noidung.val() == ""){
			alert("Nhập vào nội dung?");
		}
		$.ajax({
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
			url: 'hotro/andanh',
			method: 'get',
			data: {noidung : noidung.val(),},
			success: function (response) {
				if(response == "1"){
					$('#loiHoTro').css("display",'none');
					$('#thongBaoHoTro').css("display",'block');  
					$('#postHoTroSinhVien').trigger("reset");
					setTimeout(function(){ $('#thongBaoHoTro').css("display",'none'); }, 3000); 
				}
				else{
					$('#loiHoTro').css("display",'block');
					$('#thongBaoHoTro').css("display",'none');
				}
			}
		});
		return false;
	});
	
	
 
</script>
@yield('script')
</html>


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
	@yield('css')
	<script src='https://code.jquery.com/jquery-3.3.1.min.js'></script>
</head>

<body onload="timeclock()">
	<div class="container">
		<!-- Nội dung header -->
		<div class="log-form">
			<div class="form-wrapper">
				<div class="close-form"><i class="fas fa-times-circle"></i></div>
				<form action="" class='form-dangnhap'>

					<div class="log-form__title">Sinh viên đăng nhập</div>
					<label for="">
						<span class='icon'><i class="fas fa-user"></i></span>
						<input type="text" placeholder="Tên đăng nhập hoặc email">
						<span class="error"></span>
					</label>
					<label for="">
						<span class='icon'><i class="fas fa-unlock-alt"></i></span>
						<input type="password" placeholder="Mật khẩu">
						<span class="error"></span>
					</label>
					<label for="">
						<a href="" class='link-register'>Giành cho giảng viên</a>
					</label>
					<label for="">
						<button type='submit' class='btn-login'>Đăng nhập</button>
					</label>
				</form>
				<form action="" class='form-dangky'>
					<div class="log-form__title">Giảng viên đăng nhập</div>
					<label for="">
						<span class='icon'><i class="fas fa-user"></i></span>
						<input type="text" placeholder="Tên đăng nhập hoặc email">
						<span class="error"></span>
					</label>
					<label for="">
						<span class='icon'><i class="fas fa-unlock-alt"></i></span>
						<input type="password" placeholder="Mật khẩu">
						<span class="error"></span>
					</label>
					<label for="">
						<select name="" id="0">
							<option value="">Mức quyền</option>
							<option value="">website 1</option>
							<option value="">website 2</option>
						</select>
						<span class="error"></span>
					</label>
					<label for="">
						<a href="" class='link-login'>Giành cho sinh viên</a>
					</label>
					<label for="">
						<button type='submit' class='btn-register'>Đăng nhập</button>
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
						<li> <a href="trangchu" class="fas fa-sign-out-alt"> Đăng xuất</a> </li>
					</ul>
				</div>

			</div>
		</div>
		<header class="header">
			<div class="header-banner">
				<img src="assets/user/images/bannerDHSP.gif" alt="">
			</div>
			<div class="header-login" hidden><i class="fas fa-user"></i></div>
			<div class="header-logout">
				<i onclick="clickLogout()" class="fas fa-user-tie"></i>
			</div>
		</header> <!-- END HEADER -->
		<div class="bar-menu"><i class="fas fa-bars"></i></div>
		<nav class="nav">
			<div class="close"><i class="fas fa-times-circle"></i></div>
			<ul>
				<li><a href="trangchu.html"><i class="fas fa-home"></i></a></li>
				<li><a href="gioithieu">Giới thiệu</a></li>
				<li>
					<a href="">Thông báo</a>
					<ul class='submenu'>
						<li><a href="trangchu">Tin tức 1</a></li>
						<li><a href="">Tin tức 2</a></li>
						<li><a href="">Tin tức 4</a></li>
						<li><a href="">Tin tức 5</a></li>
					</ul>
				</li>
				<li>
					<a href="loaitintuc">Tin tức</a>
				</li>
				<li>
					<a href="">Tuyển sinh</a>
					<ul class='submenu'>
						<li><a href="">Đại học</a></li>
						<li><a href="">Sau đại học</a></li>
					</ul>
				</li>
				<li><a href="">Chương trình đào tạo</a></li>
				<li>
					<a href="">Danh sách</a>
					<ul class='submenu'>
						<li><a href="">Giảng viên</a></li>
						<li><a href="">Sinh viên</a></li>
					</ul>
				</li>
				<!-- <li><a href=""></a></li> -->
				<li><a href="">Tài liệu tham khảo</a></li>
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
							<a href="">Cơ cấu tổ chức</a>
							<ul class="left-menu__sub">
								<li><a href="trangchu"><i class="fas fa-award"></i> Tổ chức 1</a></li>
								<li><a href=""><i class="fas fa-award"></i> Tổ chức 2</a></li>
								<li><a href=""><i class="fas fa-award"></i> Tổ chức 3</a></li>
								<li><a href=""><i class="fas fa-award"></i> Tổ chức 4</a></li>
							</ul>
						</li>
						<li>
							<a href="">Các tổ chuyên môn</a>
							<ul class="left-menu__sub">
								<li><a href=""><i class="fas fa-award"></i> Tổ 1</a></li>
								<li><a href=""><i class="fas fa-award"></i> Tổ 2</a></li>
								<li><a href=""><i class="fas fa-award"></i> Tổ 3</a></li>
								<li><a href=""><i class="fas fa-award"></i> Tổ 4</a></li>
							</ul>
						</li>
						<li><a href="">Chi bộ</a></li>
						<li><a href="">Thông tin từ cơ sở dữ liệu</a></li>
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
					<div class="right-information">
						<a href=""><strong>THÔNG BÁO</strong></a>
						<div class="ArticleNewTitle" align="center"> LỊCH THI HỌC KỲ I (2018-2019) CHÍNH THỨC</div>
						<hr> » Đã có lịch thi chính thức, SV truy cập trang web để xem lịch thi cụ thể.
						<hr>
						<hr>* Thông báo cập nhật lúc 18h40 ngày 10/01/2019.
					</div>
					<!--Giới thiệu trường học . RIGHT -->

					<div class="title">Tin tức nỗi bật</div>
					<div class="right-news_border">
						<div class="marquee">
							<div class="right-news__box">
								<a href=""><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQFQOVokuNXIe_7iCgWZDjic0WbI-D83uVi8tGIn3ZX-l6dh_zavA"
									 alt=""></a>
								<a href="">Văn nghệ chào mừng kỹ niệm khoa tin học</a>
								<div style='clear:both'></div>
							</div>
							<div class="right-news__box">
								<a href=""><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQFQOVokuNXIe_7iCgWZDjic0WbI-D83uVi8tGIn3ZX-l6dh_zavA"
									 alt=""></a>
								<a href="">Văn nghệ chào mừng kỹ niệm khoa tin học</a>
								<div style='clear:both'></div>
							</div>
							<div class="right-news__box">
								<a href=""><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQFQOVokuNXIe_7iCgWZDjic0WbI-D83uVi8tGIn3ZX-l6dh_zavA"
									 alt=""></a>
								<a href="">Văn nghệ chào mừng kỹ niệm khoa tin học</a>
								<div style='clear:both'></div>
							</div>
							<div class="right-news__box">
								<a href=""><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQFQOVokuNXIe_7iCgWZDjic0WbI-D83uVi8tGIn3ZX-l6dh_zavA"
									 alt=""></a>
								<a href="">Văn nghệ chào mừng kỹ niệm khoa tin học</a>
								<div style='clear:both'></div>
							</div>
							<div class="right-news__box">
								<a href=""><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQFQOVokuNXIe_7iCgWZDjic0WbI-D83uVi8tGIn3ZX-l6dh_zavA"
									 alt=""></a>
								<a href="">Văn nghệ chào mừng kỹ niệm khoa tin học</a>
								<div style='clear:both'></div>
							</div>
							<div class="right-news__box">
								<a href=""><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQFQOVokuNXIe_7iCgWZDjic0WbI-D83uVi8tGIn3ZX-l6dh_zavA"
									 alt=""></a>
								<a href="">Văn nghệ chào mừng kỹ niệm khoa tin học</a>
								<div style='clear:both'></div>
							</div>
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
					<form action="">
						<label for="">
							<span><i class="fas fa-user"></i></span>
							<input type="text" placeholder="Họ tên">
						</label>
						<label for="">
							<span><i class="fas fa-envelope"></i></span>
							<input type="text" placeholder="Email">
						</label>
						<label for="">
							<span><i class="fas fa-phone-volume"></i></span>
							<input type="text" placeholder="Điện thoại">
						</label>
						<label for="">
							<textarea name="" id="" placeholder="Bạn cần khoa hổ trợ điều gì?" rows="1" cols="28"></textarea>
						</label>
						<button>Gửi hổ trợ</button>
						<button>Gửi ẩn danh</button>
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
					<li>Bản quyền © thuộc về khoa Tin Học trường đại học sư phạm Huế.</li>
				</ul>
			</div>
			<div class="footer-right">
				<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fdhsphue%2F&tabs=timeline&width=500&height=300&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId"
				 width="500" height="300" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"
				 allow="encrypted-media"></iframe>
			</div>
		</div>
	</footer> <!-- END FOOTER -->
</body>

</html>
<script src='assets/user/js/style.js'></script>
@yield('script')
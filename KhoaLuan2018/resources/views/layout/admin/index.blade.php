<!DOCTYPE html>
<html lang="vi">
  <head> 
    <title>@yield('title')</title>
    <meta charset="utf-8">  
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
    <base href="{{asset('')}}">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="assets/admin/css/main.css"> 
    @yield('css')
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head> 
  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="quantri/trangchu">Admin page</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <li class="app-search">
          <input class="app-search__input" type="search" placeholder="Search">
          <button class="app-search__button"><i class="fa fa-search"></i></button>
        </li>
        <!--Notification Menu-->
        <li class="dropdown"><a class="app-nav__item @if($hopthuchuadocchung->count() != 0) thongbaohopthu @endif" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="fa fa-bell-o fa-lg"></i></a>
          <ul class="app-notification dropdown-menu dropdown-menu-right">
            @if($hopthuchuadocchung->count() != 0)
            <?php 
                $soluongthu = 0;
                foreach($hopthuchuadocchung as $htcd){ 
                  $soluongthu++;
                }
            ?> 
              <div class="app-notification__content">
                <li><a class="app-notification__item avatarhome" href="quantri/hopthu/xemchuadoc"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Sinh viên đã yêu cầu hổ trợ</p>
                      <p class="app-notification__meta"><b>{{$soluongthu}}</b> tin nhắn mới</p>
                    </div></a></li>
                <!-- <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Mail server not working</p>
                      <p class="app-notification__meta">5 min ago</p>
                    </div></a></li>
                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Transaction complete</p>
                      <p class="app-notification__meta">2 days ago</p>
                    </div></a></li> -->
              </div>
            </div>
            <li class="app-notification__footer"><a href="quantri/hopthu/xemtatca">Xem tất cả thông báo.</a></li>
            @endif
          </ul>
        </li>
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right"> 
            <li><a class="dropdown-item" href="quantri/taikhoan/quantri/sua/{{Auth::User()->id}}"><i class="fa fa-user fa-lg"></i> Trang cá nhân</a></li>
            <li><a class="dropdown-item" href="logout/quantri"><i class="fa fa-sign-out fa-lg"></i> Đăng xuất</a></li>
          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar avatarPageAdmin" src="assets/user/images/avatar/{{Auth::User()->image}}" alt="User Image">
        <div>
          <p class="app-sidebar__user-name">{{Auth::User()->viewname}}</p>
          <p class="app-sidebar__user-designation">{{Auth::User()->permission}}</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item active" href="index.html"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Trang chủ</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="quantri/gioithieu"><i class="icon fa fa-circle-o"></i> Giới thiệu</a></li>
            <li><a class="treeview-item" href="quantri/hienthi"><i class="icon fa fa-circle-o"></i> Hiển thị</a></li> 
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Tin tức</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="quantri/tintuc/loaitin/danhsach"><i class="icon fa fa-circle-o"></i> Loại tin</a></li>
            <li><a class="treeview-item" href="quantri/tintuc/baiviet/danhsach"><i class="icon fa fa-circle-o"></i> Bài viết</a></li> 
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-user-circle-o"></i><span class="app-menu__label">Tài khoản</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="quantri/taikhoan/quantri/danhsach"><i class="icon fa fa-circle-o"></i> Danh sách tài khoản</a></li> 
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-envelope"></i><span class="app-menu__label">Hộp thư</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="quantri/hopthu/danhsach"><i class="icon fa fa-circle-o"></i> Hộp thư đến</a></li> 
          </ul>
        </li>
        <li><a class="app-menu__item" href="quantri/lienket"><i class="app-menu__icon fa fa-link"></i><span class="app-menu__label">Hình ảnh liên kết</span></a></li>
        <!-- <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-file-text"></i><span class="app-menu__label">Pages</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="blank-page.html"><i class="icon fa fa-circle-o"></i> Blank Page</a></li>
            <li><a class="treeview-item" href="page-login.html"><i class="icon fa fa-circle-o"></i> Login Page</a></li>
            <li><a class="treeview-item" href="page-lockscreen.html"><i class="icon fa fa-circle-o"></i> Lockscreen Page</a></li>
            <li><a class="treeview-item" href="page-user.html"><i class="icon fa fa-circle-o"></i> User Page</a></li>
            <li><a class="treeview-item" href="page-invoice.html"><i class="icon fa fa-circle-o"></i> Invoice Page</a></li>
            <li><a class="treeview-item" href="page-calendar.html"><i class="icon fa fa-circle-o"></i> Calendar Page</a></li>
            <li><a class="treeview-item" href="page-mailbox.html"><i class="icon fa fa-circle-o"></i> Mailbox</a></li>
            <li><a class="treeview-item" href="page-error.html"><i class="icon fa fa-circle-o"></i> Error Page</a></li>
          </ul>
        </li>  -->
      </ul>
    </aside>
    @yield('content')
    <!-- Essential javascripts for application to work-->
    <script src="assets/admin/js/jquery-3.2.1.min.js"></script>
    <script src="assets/admin/js/popper.min.js"></script>
    <script src="assets/admin/js/bootstrap.min.js"></script>
    <script src="assets/admin/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="assets/admin/js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="assets/admin/js/plugins/chart.js"></script> 
    <!-- TinyMCE -->
    <script src="tinymce/tinymce.js"></script>  
    <!-- Thông báo js -->
    <script type="text/javascript" src="assets/admin/js/plugins/bootstrap-notify.min.js"></script> 
    <script type="text/javascript" src="assets/admin/js/plugins/sweetalert.min.js"></script>  
    <!-- Thư viện date -->
    <script type="text/javascript" src="assets/admin/js/moment.min.js"></script>
    <!-- Thư viện kéo thả div -->
    <script src="assets/admin/js/jquery.sortable.js"></script>
    <!-- Thư viện ngày tháng năm -> lịch -->
    <script type="text/javascript" src="assets/admin/js/plugins/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="assets/admin/js/plugins/select2.min.js"></script> 
    <script type="text/javascript" src="assets/admin/js/plugins/bootstrap-datepicker.min.js"></script> 

    @yield('script')
  </body>
</html>
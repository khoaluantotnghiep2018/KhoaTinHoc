<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="{{asset('')}}">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="assets/admin/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login - Admin page</title>
    <style>
        #loiKhongKhopMatKhau{
            display: none;
        }
        #loiHeThong{
            display: none;
        }
        #goToUserPage{
            cursor: pointer;
        }
        #ThongBaoDoiPass{
            display: none;
        } 
    </style>
</head>

<body>
    <section class="material-half-bg">
        <div class="cover"></div>
    </section>
    <section class="login-content">
        <div class="logo">
            <h1 class="fa fa-hand-o-right " id="goToUserPage"> Back Home</h1>
        </div> 
        <div class="alert alert-dismissible alert-danger" id="loiKhongKhopMatKhau">
            <button class="close" type="button" data-dismiss="alert">×</button><strong>Lỗi!</strong><a
                class="alert-link" href="javascript:void(0)"> Mật khẩu không khớp, vui lòng kiểm tra lại!</a>
        </div>  
        <div class="alert alert-dismissible alert-danger" id="loiHeThong">
            <button class="close" type="button" data-dismiss="alert">×</button><strong>Cập nhật thất bại!</strong><a
                class="alert-link" href="javascript:void(0)"> Lỗi tiến trình cập nhật dữ liệu!</a>
        </div>
        <div class="alert alert-dismissible alert-success" id="ThongBaoDoiPass">
            <button class="close" type="button" data-dismiss="alert">×</button><strong>Thông báo</strong><a
                class="alert-link" href="javascript:void(0)"> Mật khẩu đã được thay đổi!</a>
        </div> 
        <div class="login-box">
            <form class="login-form" method="post" id="postFormResetPass">
                @csrf
                <h3 class="login-head">ĐẶT LẠI MẬT KHẨU</h3>
                <div class="form-group">
                    <label class="control-label">Mật khẩu mới</label>
                    <input id="ipPassword" name="password" class="form-control" type="password" placeholder="Nhập vào mật khẩu"
                        autofocus>
                </div>
                <div class="form-group">
                    <label class="control-label">Xác nhận mật khẩu mới</label>
                    <input id="ipSetPassword" class="form-control" type="password" placeholder="Nhập lại mật khẩu">
                </div>
                <div class="form-group" hidden>
                    <label class="control-label">Xác nhận mật khẩu mới</label>
                    <input name="id_user" class="form-control" type="password" value="{{$id_user}}">
                </div>
                <div class="form-group">
                    <div class="utility">
                        <div class="animated-checkbox">
                            <label>
                                <input type="checkbox" name="checkLog"><span class="label-text">Lưu và đăng nhập hệ thống</span>
                            </label>
                        </div> 
                    </div>
                </div>
                <div class="form-group btn-container">
                    <button class="btn btn-primary btn-block" type="submit"><i
                            class="fa fa-sign-in fa-lg fa-fw"></i>Xác nhận</button>
                </div>
            </form> 
        </div> 

    </section> 
    
    <!-- Essential javascripts for application to work-->
    <script src="assets/admin/js/jquery-3.2.1.min.js"></script>
    <script src="assets/admin/js/popper.min.js"></script>
    <script src="assets/admin/js/bootstrap.min.js"></script>
    <script src="assets/admin/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="assets/admin/js/plugins/pace.min.js"></script>
    <script type="text/javascript"></script>
    <script>
        var postFormResetPass = $("#postFormResetPass");
        postFormResetPass.submit(function (e) {
            var ipPass = $('#ipPassword').val();
            var ipSetPass = $('#ipSetPassword').val(); 
            if(ipPass != ipSetPass){
                $('#loiKhongKhopMatKhau').css('display','block');
                return false;
            }
            $.ajax({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                url: 'taikhoan/quenmatkhau/doimatkhau',
                method: 'post',
                data: $('#postFormResetPass').serialize(),
                success: function (response) {    
                    switch(response) {
                    case '1': 
                        $('#ThongBaoDoiPass').css('display','block');
                        $('#loiHeThong').css('display','none');
                        $('#loiKhongKhopMatKhau').css('display','none'); 
                        $('#ipPassword').val(""); 
                        $('#ipSetPassword').val(""); 
                        break;
                    case '2': 
                        location.href = "login/quantri"; 
                        break;
                    default: 
                        $('#loiHeThong').css('display','block');  
                        $('#loiKhongKhopMatKhau').css('display','none'); 
                        $('#ThongBaoDoiPass').css('display','none');  
                    }  
                }
            });
            return false;

        });

        $('#goToUserPage').click(function(){
            location.href = 'trangchu';
        });
    </script>
</body>

</html>
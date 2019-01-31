@extends('layout/user/index')
@section('title')
Danh sách
@endsection

@section('css')
<link rel="stylesheet" href="assets/user/css/list.css">
@endsection

@section('content')
<div class="content">

    <input type="text" id="idStudent" onkeyup="seachIdInfomation()" placeholder="Nhập mã ..." title="Mã sinh viên là?">
    <input type="text" id="nameStudent" onkeyup="seachNameInfomation()" placeholder="Nhập tên ..." title="Tên sinh viên là?">

    <div class="list"> 
        <div class="table">
            <table id="myTable">
                <tr>
                    <th>MÃ</th>
                    <th>HỌ VÀ TÊN</th>
                    <th>Ngày Sinh</th>
                    <th>Lớp</th>
                    <th>Địa chỉ</th>
                </tr>
                <tr>
                    <td>15s1021068</td>
                    <td>Huỳnh Văn Thùy</td>
                    <td>18/07/1996</td>
                    <td>Tin 4A</td>
                    <td>Tam Lãnh - Phú Ninh - Quảng Nam</td>
                </tr>
                <tr>
                    <td>DHU005986</td>
                    <td>PHẠM THỊ THU HẰNG</td>
                    <td>18/07/1996</td>
                    <td>12</td>
                    <td>Hà Nội 123123123123123123</td>
                </tr>
                <tr>
                    <td>DHU005986</td>
                    <td>PHẠM THỊ THU HẰNG</td>
                    <td>18/07/1996</td>
                    <td>12</td>
                    <td>Hà Nội 123123123123123123</td>
                </tr>
                <tr>
                    <td>DHU005986</td>
                    <td>PHẠM THỊ THU HẰNG</td>
                    <td>18/07/1996</td>
                    <td>12</td>
                    <td>Hà Nội 123123123123123123</td>
                </tr>
                <tr>
                    <td>DHU005986</td>
                    <td>PHẠM THỊ THU HẰNG</td>
                    <td>18/07/1996</td>
                    <td>12</td>
                    <td>Hà Nội 123123123123123123</td>
                </tr>
                <tr>
                    <td>DHU005986</td>
                    <td>PHẠM THỊ THU HẰNG</td>
                    <td>18/07/1996</td>
                    <td>12</td>
                    <td>Hà Nội 123123123123123123</td>
                </tr>
                <tr>
                    <td>DHU005986</td>
                    <td>PHẠM THỊ THU HẰNG</td>
                    <td>18/07/1996</td>
                    <td>12</td>
                    <td>Hà Nội 123123123123123123</td>
                </tr>
                <tr>
                    <td>DHU005986</td>
                    <td>PHẠM THỊ THU HẰNG</td>
                    <td>18/07/1996</td>
                    <td>12</td>
                    <td>Hà Nội 123123123123123123</td>
                </tr>
            </table>
        </div>

    </div>
</div> <!-- END CONTENT -->
@endsection


@section('script')
<script src="assets/user/js/list.js"></script>
@endsection
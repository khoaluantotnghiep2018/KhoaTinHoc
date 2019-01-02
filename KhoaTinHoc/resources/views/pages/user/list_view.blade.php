@extends('layout/user/index')
@section('title')
Danh sách
@endsection

@section('css')
<link rel="stylesheet" href="assets/user/css/list.css">
@endsection

@section('content') 
<div class="content">
    <div class="list-categories__title">
        <div>
            Danh Sách Sinh Viên	
        </div>
    </div>	<!-- Trang tin -->

    <div class="list">
        <div class="list-search">
            <form action="" >
                <input type="text" placeholder="Nhập ...">
                <button type='submit'>Tìm kiếm</button>
            </form>	

            <form action="">
                <select>
                    <option value="">Search theo lớp</option>
                    <option value="">10</option>
                    <option value="">11</option>
                    <option value="">12</option>
                </select>
            </form>
        </div>
        <div class="table">
            <table>
                <tr>
                    <th>Mã Sinh Viên</th>
                    <th>Họ & Tên</th>
                    <th>Ngày Sinh</th>
                    <th>Lớp</th>
                    <th>Địa chỉ</th>
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

@endsection
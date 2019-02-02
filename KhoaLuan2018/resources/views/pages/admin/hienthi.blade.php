@extends('layout/admin/index')
@section('title')
Giới thiệu
@endsection

@section('css')
<style> 
    #list li{
        cursor: move;
    }
</style>
@endsection

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i> Hiển thị</h1>
            <p>Quản lí trình bày - hiển thị nội dung trang chủ</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Trang chủ</li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Hiển thị</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="row">
                    <div class="col-lg-6">

                        <legend>Hiển thị tin đầu trang</legend>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" id="optionsRadios1" type="radio" name="optionsRadios"
                                    value="option1" @if($trangchu->hienthirss) checked @endif>Lựa chọn tin lấy
                                từ RSS
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" id="optionsRadios2" type="radio" name="optionsRadios"
                                    value="option2" @if(!$trangchu->hienthirss) checked @endif>Lựa chọn tin lấy
                                từ tin tức nỗi bật
                            </label>
                        </div>
                        <legend>Danh mục tin tức hiển thị</legend>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input id="checktintuc1" class="form-check-input" type="checkbox" checked>Thông báo
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input id="checktintuc2" class="form-check-input" type="checkbox">Tin tức
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input id="checktintuc3" class="form-check-input" type="checkbox">Tuyển sinh
                            </label>
                        </div>

                        <div class="form-check">
                            <label class="form-check-label">
                                <input id="checktintuc4" class="form-check-input" type="checkbox">Chương trình đào tạo
                            </label>
                        </div>
                        <!-- Quản lý tin tức ưu tiên -->
                        <legend>Sắp xếp hiển thị ưu tiên</legend>
                        <section> 
                            <ul class="sortable list" id="list">
                                <li class="indextintuc">Tin tức</li>
                                <li class="indextintuc">Thông báo</li>
                                <li class="indextintuc">tuyển sinh</li>
                                <li class="indextintuc">đào tạo</li> 
                            </ul>
                        </section> 

                        <form>
                            <div class="form-group">
                                <legend>Hiển thị tin đầu trang</legend>
                                <label for="exampleInputEmail1">Email address</label>
                                <input class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp"
                                    placeholder="Enter email"><small class="form-text text-muted" id="emailHelp">We'll
                                    never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input class="form-control" id="exampleInputPassword1" type="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleSelect1">Example select</label>
                                <select class="form-control" id="exampleSelect1">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleSelect2">Example multiple select</label>
                                <select class="form-control" id="exampleSelect2" multiple="">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleTextarea">Example textarea</label>
                                <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <input class="form-control-file" id="exampleInputFile" type="file" aria-describedby="fileHelp"><small
                                    class="form-text text-muted" id="fileHelp">This is some placeholder block-level
                                    help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox">Check me out
                                </label>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4 offset-lg-1">
                        <form>
                            <div class="form-group">
                                <fieldset disabled="">
                                    <label class="control-label" for="disabledInput">Disabled input</label>
                                    <input class="form-control" id="disabledInput" type="text" placeholder="Disabled input here..."
                                        disabled="">
                                </fieldset>
                            </div>
                            <div class="form-group">
                                <fieldset>
                                    <label class="control-label" for="readOnlyInput">Readonly input</label>
                                    <input class="form-control" id="readOnlyInput" type="text" placeholder="Readonly input here…"
                                        readonly="">
                                </fieldset>
                            </div>
                            <div class="form-group has-success">
                                <label class="form-control-label" for="inputSuccess1">Valid input</label>
                                <input class="form-control is-valid" id="inputValid" type="text">
                                <div class="form-control-feedback">Success! You've done it.</div>
                            </div>
                            <div class="form-group has-danger">
                                <label class="form-control-label" for="inputDanger1">Invalid input</label>
                                <input class="form-control is-invalid" id="inputInvalid" type="text">
                                <div class="form-control-feedback">Sorry, that username's taken. Try another?</div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label col-form-label-lg" for="inputLarge">Large input</label>
                                <input class="form-control form-control-lg" id="inputLarge" type="text">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label" for="inputDefault">Default input</label>
                                <input class="form-control" id="inputDefault" type="text">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label col-form-label-sm" for="inputSmall">Small input</label>
                                <input class="form-control form-control-sm" id="inputSmall" type="text">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Input addons</label>
                                <div class="form-group">
                                    <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text">$</span></div>
                                        <input class="form-control" id="exampleInputAmount" type="text" placeholder="Amount">
                                        <div class="input-group-append"><span class="input-group-text">.00</span></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="tile-footer">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </div>
        </div>
    </div>
</main>

@section('script')
<script src="assets/admin/js/hienthi.js"></script>
<script src="assets/admin/js/jquery.sortable.js"></script>
<script>
    $(function() {
        $('.sortable').sortable(); 
    }); 
</script>
@endsection
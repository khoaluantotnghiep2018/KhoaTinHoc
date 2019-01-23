@extends('layout/user/index')
@section('title')
Danh sách
@endsection

@section('css')
<link rel="stylesheet" href="assets/user/css/news.css">
@endsection

@section('content')  
<div class="content"> 

    <div class="news">
        <div class="news-title">
            <h1>TH Hồng Sơn - Tưng bừng ngày hội khai trường</h1>
        </div> <!-- tiêu đề tin tức -->

        <div class="news-infor">
            <span><i class="fas fa-user"></i> <a href="">Boy dep trai</a></span>
            <span><i class="fas fa-clock"></i> 10:16:00</span>
            <span><i class="fas fa-tags"></i> <a href="">Tin tức</a></span>
        </div> <!-- người đăng bài  -->

        <div class="news-tomtat">
            <strong>Hòa chung không khí hân hoan, náo nức của cả nước chào đón năm học mới. Sáng nay, ngày 05/09/2018 trường Tiểu học Hồng Sơn đã long trọng tổ chức lễ khai giảng năm học 2018 - 2019.</strong>
            
        </div> <!-- Tóm tắt tin tức -->

        <div class="news-content">
            <img src="http://tieuhochongson.vinhcity.edu.vn/uploads/news/2018_09/kg-8.jpg" alt="">

            <p>Từ sáng tinh mơ, không khí "toàn dân đưa trẻ đến trường'" đã rộn ràng khắp mọi nơi, trên mọi nẻo đường, ngõ phố. Sân trường Hồng Sơn ngập tràn sắc màu rực rỡ của cờ, hoa cùng tiếng trẻ thơ nô đùa ríu rít. Ngôi trường bừng lên sức sống mới trong niềm hân hoan chào đón năm học mới, năm học 2018-2019.</p>

            <p>
            Trong không khí vui tươi của ngày khai giảng năm học mới 2018-2019, Chủ tịch nước Trần Đại Quang đã gửi đến các thầy giáo, cô giáo, cán bộ, công chức, viên chức, người lao động đã và đang công tác trong ngành Giáo dục, các bậc phụ huynh cùng toàn thể các em sinh viên, học sinh cả nước những tình cảm thân thiết và lời chúc mừng tốt đẹp nhất.
            </p>
            
            <img src="http://tieuhochongson.vinhcity.edu.vn/uploads/news/2018_09/kg-9.jpg" alt="">

            <p>Từ sáng tinh mơ, không khí "toàn dân đưa trẻ đến trường'" đã rộn ràng khắp mọi nơi, trên mọi nẻo đường, ngõ phố. Sân trường Hồng Sơn ngập tràn sắc màu rực rỡ của cờ, hoa cùng tiếng trẻ thơ nô đùa ríu rít. Ngôi trường bừng lên sức sống mới trong niềm hân hoan chào đón năm học mới, năm học 2018-2019.</p>
            
            <img src="http://tieuhochongson.vinhcity.edu.vn/uploads/news/2018_09/40854064_1783045921808203_7490595342736424960_n.jpg" alt="">

            <p>
            Trong không khí vui tươi của ngày khai giảng năm học mới 2018-2019, Chủ tịch nước Trần Đại Quang đã gửi đến các thầy giáo, cô giáo, cán bộ, công chức, viên chức, người lao động đã và đang công tác trong ngành Giáo dục, các bậc phụ huynh cùng toàn thể các em sinh viên, học sinh cả nước những tình cảm thân thiết và lời chúc mừng tốt đẹp nhất.
            </p>
        </div>


        <div class="comment">
            <div class="cmt-title">
                <strong>55 Comment</strong>
                <small><a href="">Login để comment</a></small>
            </div>
            <div class="cmt-add">
                <div class="cmt-add__input">
                    <img src="http://www.zayedhotel.com/addons/default/themes/yoona/img/user.jpg" alt="">
                    <textarea name="" id="" cols="30" rows="3"></textarea>	
                </div>
                <div class="btn"><button>Gửi bình luận</button></div>
            </div>

            <div class="cmt-content">
                
                
                <div class="user">
                    <div class="cmt-user">
                        <img src="http://www.zayedhotel.com/addons/default/themes/yoona/img/user.jpg" alt="">
                        <div class="cmt-user__text">
                            <div class="name">Boy đẹp trai <small>20-10-1992</small></div>
                            <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto a, maxime quos, dolorum beatae ipsa. Dolor, aliquid. Iusto est odit.</div>
                           
                            <button class='fas fa-trash-alt remove'> Xóa</button>
                            <button class='far fa-edit remove'> Sửa</button>
                            <div class="rep"> 
                                <a class="btn-rep far fa-comment-dots"> 5 phản hồi khác</a>
                            </div>
                        </div>
                    </div>	 <!-- Nội dung comment của user -->
                    
                    <div class="user-content__rep">
                        <div class="rep-user">
                            <div class="cmt-user">
                                <img src="http://www.zayedhotel.com/addons/default/themes/yoona/img/user.jpg" alt="">
                                <div class="cmt-user__text">
                                    <div class="name">Boy đẹp trai <small>20-10-1992</small></div>
                                    <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto a, maxime quos, dolorum beatae ipsa. Dolor, aliquid. Iusto est odit.</div>
                                    <button class='fas fa-trash-alt remove'> Xóa</button>
                                    <button class='far fa-edit remove'> Sửa</button>
                                </div>
                            </div>	

                            <div class="cmt-user">
                                <img src="http://www.zayedhotel.com/addons/default/themes/yoona/img/user.jpg" alt="">
                                <div class="cmt-user__text">
                                    <div class="name">Boy đẹp trai <small>20-10-1992</small></div>
                                    <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci eos cumque ad, aspernatur officia maiores dolorum odio sit voluptatibus sint nulla voluptatum aliquam, quidem deserunt nostrum consequatur. Eaque, doloribus, rem?</div>
                                    <button class='fas fa-trash-alt remove'> Xóa</button>
                                    <button class='far fa-edit remove'> Sửa</button>
                                </div>
                            </div>	

                            <div class="cmt-user">
                                <img src="http://www.zayedhotel.com/addons/default/themes/yoona/img/user.jpg" alt="">
                                <div class="cmt-user__text">
                                    <div class="name">Boy đẹp trai <small>20-10-1992</small></div>
                                    <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto a, maxime quos, dolorum beatae ipsa. Dolor, aliquid. Iusto est odit.</div>
                                    <button class='fas fa-trash-alt remove'> Xóa</button>
                                    <button class='far fa-edit remove'> Sửa</button>
                                </div>
                            </div>	
                        </div> <!-- nội dung rep của user -->

                        <div class="rep-input">
                            <div class="cmt-add">
                                <div class="cmt-add__input">
                                    <img src="http://www.zayedhotel.com/addons/default/themes/yoona/img/user.jpg" alt="">
                                    <textarea name="" id="" cols="30" rows="3"></textarea>	
                                </div>
                                <div class="btn"><button>Trả lời</button></div>
                            </div>
                        </div> <!-- ô input rep user -->	
                    </div> <!-- Khung chứa của rep -->
                    
                </div>
 
            </div>
        </div>
    </div>
        
    
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
                <button>Gửi</button>
            </form>
        </div>
    </div> <!-- END CONTACT (LH) -->

</div> <!-- END CONTENT -->
@endsection

@section('script')
<script src='assets/user/js/comment.js'></script>
@endsection
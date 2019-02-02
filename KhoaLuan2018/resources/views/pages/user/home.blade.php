@extends('layout/user/index')

@section('title')
Trang chủ
@endsection

@section('content')
<div class="content">
    <!-- Hiển thị rss -->
    <div class="content-box" @if(!$trangchu->hienthirss) hidden @endif>
        <div class="content-box__title">
            <div class="link">
                <p>RSS</p>
                <a class="fa fa-rss" id="readRss" href="trangchu"></a>
            </div>
            <div class="next">
            </div>
        </div>
        <?php
            $doc = new DOMDocument();
            $doc->load("https://ictnews.vn/rss/cntt"); 
            $max = $doc->getElementsByTagName("item")->count();
            // Lấy ngẫu nhiên 1 tin 
            $index = rand(0,$max-1);
            $articles = $doc->getElementsByTagName("item")->item($index);
            $title = $articles->getElementsByTagName("title")->item(0);
            $description = $articles->getElementsByTagName("description")->item(0);
            $link = $articles->getElementsByTagName("link")->item(0);
            $pubDate = $articles->getElementsByTagName("pubDate")->item(0);
        ?>
        <div class="content-box__main" id="news_top">
            <article>
                <?php 
                    // Xử lý hình ảnh + nội dung  
                    $stat = strpos($description->nodeValue, '</br>');
                    $content_image = substr($description->nodeValue, 0, $stat); 
                    $content_text = substr($description->nodeValue, $stat+6, strlen($description->nodeValue)-1); 
                    $content_text = str_replace("]]>","",$content_text);
                    echo $content_image;   
                ?>
                <div class="information">
                    <div class="information-title"><a href="<?php echo $link->nodeValue; ?>">
                            <?php echo $title->nodeValue; ?></a></div>
                    <div class="date">
                        <span class="fas fa-calendar-alt">
                            <?php echo $pubDate->nodeValue ?></span>
                    </div>
                    <div class="text">
                        <?php  echo $content_text; ?>
                    </div>
                </div>
            </article>
        </div>

    </div>

    <!-- Hiển thị top news khoa -->
    <div class="content-box" @if($trangchu->hienthirss) hidden @endif>
        <div class="content-box__title">
            <div class="link">
                <p>RSS</p>
                <a class="fa fa-rss" id="readRss" href=""></a>
            </div>
            <div class="next">
            </div>
        </div>
        <div class="content-box__main" id="news_top">
            <article>
                <a href=""><img src="http://tintuc.hues.vn/wp-content/uploads/sites/2/2016/05/lanh-dao-DH-hue-tang-giay-khen-cho-2-tap-the-doi-6-ca-nhan-cua-khoa-Tin-hoc-vi-co-thanh-tich-trong-cong-tac-giang-day-nghien-cuu-khoa-hoc.jpg"
                        alt=""></a>
                <div class="information">
                    <div class="information-title"><a href="">Kỷ niệm 20 năm thành lập khoa Tin Học cùng cựu sinh viên</a></div>
                    <div class="date">
                        <span class="fas fa-calendar-alt"> 05/09/2018 17:38</span>
                    </div>
                    <div class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui tempora quam
                        laboriosam eveniet
                        ratione, pariatur eos neque explicabo ad corporis inventore cum quibusdam obcaecati placeat
                        tenetur! Esse iste
                        officiis dolor.
                        pariatur eos neque explicabo ad corporis inventore cum quibusdam obcaecati </div>
                </div>
                <div class="cmt">
                    <span><i class="fas fa-eye"></i> : 200</span>
                    <span><i class="far fa-comment"></i> :20</span>
                </div>

            </article>
        </div>

    </div>
    <!-- Thông báo -->
    <div class="content-box">
        <div class="content-box__title">
            <div class="link">
                <p href="">Thông báo</p>
            </div>

            <div class="next">
                <a href=""><i class="fas fa-list"></i></a>
            </div>
        </div>

        <div class="content-box__main">
            <ul>
                <li><a href=""><i class="fas fa-hand-point-right"></i> Tin tức chung 1</a></li>
                <li><a href=""><i class="fas fa-hand-point-right"></i> Tin tức chung 2</a></li>
                <li><a href=""><i class="fas fa-hand-point-right"></i> Tin tức chung 3</a></li>
                <li><a href=""><i class="fas fa-hand-point-right"></i> Tin tức chung 4</a></li>
                <li><a href="">Xem thêm &raquo;</a></li>
            </ul>

            <article>
                <a href=""><img src="http://tintuc.hues.vn/wp-content/uploads/sites/2/2016/05/lanh-dao-DH-hue-tang-giay-khen-cho-2-tap-the-doi-6-ca-nhan-cua-khoa-Tin-hoc-vi-co-thanh-tich-trong-cong-tac-giang-day-nghien-cuu-khoa-hoc.jpg"
                        alt=""></a>
                <div class="information">
                    <div class="information-title"><a href="">Kỷ niệm 20 năm thành lập khoa Tin Học cùng cựu sinh viên</a></div>
                    <div class="date">
                        <span>05/09/2018 17:38</span>
                    </div>
                    <div class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui tempora quam
                        laboriosam eveniet
                        ratione, pariatur eos neque explicabo ad corporis inventore cum quibusdam obcaecati placeat
                        tenetur! Esse iste
                        officiis dolor.</div>
                </div>

                <div class="cmt">
                    <span><i class="fas fa-eye"></i> : 200</span>
                    <span><i class="far fa-comment"></i> :20</span>
                    <iframe src="https://www.facebook.com/plugins/share_button.php?href=https://tuoitre.vn/dam-bao-khong-vi-xay-nha-hat-ma-thieu-tien-den-bu-cho-dan-thu-thiem-20181016160217609.html&layout=button_count&size=small&mobile_iframe=true&width=78&height=20&appId"
                        width="78" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                        allowTransparency="true" allow="encrypted-media"></iframe>
                </div>
            </article>
        </div>

    </div>
    <!-- Tin tức -->
    <div class="content-box">
        <div class="content-box__title">
            <div class="link">
                <p href="">Tin tức</p>
            </div>

            <div class="next">
                <a href=""><i class="fas fa-list"></i></a>
            </div>
        </div>

        <div class="content-box__main">
            <ul>
                <li><a href=""><i class="fas fa-hand-point-right"></i> Tin tức chung 1</a></li>
                <li><a href=""><i class="fas fa-hand-point-right"></i> Tin tức chung 2</a></li>
                <li><a href=""><i class="fas fa-hand-point-right"></i> Tin tức chung 3</a></li>
                <li><a href=""><i class="fas fa-hand-point-right"></i> Tin tức chung 4</a></li>
                <li><a href="">Xem thêm &raquo;</a></li>
            </ul>

            <article>
                <a href=""><img src="http://tintuc.hues.vn/wp-content/uploads/sites/2/2016/05/lanh-dao-DH-hue-tang-giay-khen-cho-2-tap-the-doi-6-ca-nhan-cua-khoa-Tin-hoc-vi-co-thanh-tich-trong-cong-tac-giang-day-nghien-cuu-khoa-hoc.jpg"
                        alt=""></a>
                <div class="information">
                    <div class="information-title"><a href="">Kỷ niệm 20 năm thành lập khoa Tin Học cùng cựu sinh viên</a></div>
                    <div class="date">
                        <span>05/09/2018 17:38</span>


                    </div>
                    <div class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui tempora quam
                        laboriosam eveniet
                        ratione, pariatur eos neque explicabo ad corporis inventore cum quibusdam obcaecati placeat
                        tenetur! Esse iste
                        officiis dolor.</div>
                </div>

                <div class="cmt">

                    <span><i class="fas fa-eye"></i> : 200</span>
                    <span><i class="far fa-comment"></i> :20</span>
                    <iframe src="https://www.facebook.com/plugins/share_button.php?href=https://tuoitre.vn/dam-bao-khong-vi-xay-nha-hat-ma-thieu-tien-den-bu-cho-dan-thu-thiem-20181016160217609.html&layout=button_count&size=small&mobile_iframe=true&width=78&height=20&appId"
                        width="78" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                        allowTransparency="true" allow="encrypted-media"></iframe>
                </div>
            </article>
        </div>

    </div>
    <!-- Tuyển sinh -->
    <div class="content-box">
        <div class="content-box__title">
            <div class="link">
                <p href="">Tin tức</p>
            </div>

            <div class="next">
                <a href=""><i class="fas fa-list"></i></a>
            </div>
        </div>

        <div class="content-box__main">
            <ul>
                <li><a href=""><i class="fas fa-hand-point-right"></i> Tin tức chung 1</a></li>
                <li><a href=""><i class="fas fa-hand-point-right"></i> Tin tức chung 2</a></li>
                <li><a href=""><i class="fas fa-hand-point-right"></i> Tin tức chung 3</a></li>
                <li><a href=""><i class="fas fa-hand-point-right"></i> Tin tức chung 4</a></li>
                <li><a href="">Xem thêm &raquo;</a></li>
            </ul>

            <article>
                <a href=""><img src="http://tintuc.hues.vn/wp-content/uploads/sites/2/2016/05/lanh-dao-DH-hue-tang-giay-khen-cho-2-tap-the-doi-6-ca-nhan-cua-khoa-Tin-hoc-vi-co-thanh-tich-trong-cong-tac-giang-day-nghien-cuu-khoa-hoc.jpg"
                        alt=""></a>
                <div class="information">
                    <div class="information-title"><a href="">Kỷ niệm 20 năm thành lập khoa Tin Học cùng cựu sinh viên</a></div>
                    <div class="date">
                        <span>05/09/2018 17:38</span>


                    </div>
                    <div class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui tempora quam
                        laboriosam eveniet
                        ratione, pariatur eos neque explicabo ad corporis inventore cum quibusdam obcaecati placeat
                        tenetur! Esse iste
                        officiis dolor.</div>
                </div>

                <div class="cmt">

                    <span><i class="fas fa-eye"></i> : 200</span>
                    <span><i class="far fa-comment"></i> :20</span>
                </div>
            </article>
        </div>
    </div>
    <!-- Chương trình đào tạo -->
    <div class="content-box">
        <div class="content-box__title">
            <div class="link">
                <p href="">Tin tức</p>
            </div>

            <div class="next">
                <a href=""><i class="fas fa-list"></i></a>
            </div>
        </div>

        <div class="content-box__main">
            <ul>
                <li><a href=""><i class="fas fa-hand-point-right"></i> Tin tức chung 1</a></li>
                <li><a href=""><i class="fas fa-hand-point-right"></i> Tin tức chung 2</a></li>
                <li><a href=""><i class="fas fa-hand-point-right"></i> Tin tức chung 3</a></li>
                <li><a href=""><i class="fas fa-hand-point-right"></i> Tin tức chung 4</a></li>
                <li><a href="">Xem thêm &raquo;</a></li>
            </ul>

            <article>
                <a href=""><img src="http://tintuc.hues.vn/wp-content/uploads/sites/2/2016/05/lanh-dao-DH-hue-tang-giay-khen-cho-2-tap-the-doi-6-ca-nhan-cua-khoa-Tin-hoc-vi-co-thanh-tich-trong-cong-tac-giang-day-nghien-cuu-khoa-hoc.jpg"
                        alt=""></a>
                <div class="information">
                    <div class="information-title"><a href="">Kỷ niệm 20 năm thành lập khoa Tin Học cùng cựu sinh viên</a></div>
                    <div class="date">
                        <span>05/09/2018 17:38</span>


                    </div>
                    <div class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui tempora quam
                        laboriosam eveniet
                        ratione, pariatur eos neque explicabo ad corporis inventore cum quibusdam obcaecati placeat
                        tenetur! Esse iste
                        officiis dolor.</div>
                </div>

                <div class="cmt">

                    <span><i class="fas fa-eye"></i> : 200</span>
                    <span><i class="far fa-comment"></i> :20</span>
                </div>
            </article>
        </div>
    </div>

</div> <!-- END CONTENT -->
@endsection

@section('script')
@endsection
<?php 
    get_header();
    $num_blog=count($list_blog);
    $num_brum=count_brum_blog($num_blog);
    $num_temp=($num_brum-1)*6;
    $list_6_blog=get_list_6_blog($num_temp);
?>
<div id="main-content-wp" class="clearfix blog-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?mod=home" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Blog</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="list-blog-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title">Blog</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        <?php 
                            foreach ($list_6_blog as $item) {
                                # code...
                                ?>
                                    <li class="clearfix">
                            <a href="?mod=post&act=detail&id=<?php echo $item['id_blog'] ?>" title="" class="thumb fl-left">
                                <img src="<?php echo $item['image_link'] ?>" alt="">
                            </a>
                            <div class="info fl-right">
                                <a href="?mod=post&act=detail&id=<?php echo $item['id_blog'] ?>" title="" class="title"><?php echo $item['topic'] ?></a>
                                <span class="create-date"><?php echo time_format( $item['create_date']) ?></span>
                                <p class="desc"><?php echo $item['desc_blog'] ?></p>
                            </div>
                        </li>
                                <?php
                            }
                        ?>
                        <!-- <li class="clearfix">
                            <a href="?page=detail_blog" title="" class="thumb fl-left">
                                <img src="public/images/img-post-01.jpg" alt="">
                            </a>
                            <div class="info fl-right">
                                <a href="?page=detail_blog" title="" class="title">Mời gọi kiều bào hiến kế, chung sức xây dựng phát triển TP. Hồ Chí Minh</a>
                                <span class="create-date">28/11/2017</span>
                                <p class="desc">Trong ngày hôm nay (11/11) đoàn kiều bào đã tổ chức thành 4 nhóm đi tham quan các điểm như huyện Cần Giờ, Đại học Quốc gia, Khu công nghệ cao TP.HCM, Công viên phần mềm Quang Trung, Khu Nông nghiệp Công nghệ cao, Khu Đô thị mới Thủ Thiêm, Cảng Cát Lái... để kiều bào hiểu thêm về tình hình phát [...]</p>
                            </div>
                        </li>
                        <li class="clearfix">
                            <a href="?page=detail_blog" title="" class="thumb fl-left">
                                <img src="public/images/img-post-01.jpg" alt="">
                            </a>
                            <div class="info fl-right">
                                <a href="?page=detail_blog" title="" class="title">Mời gọi kiều bào hiến kế, chung sức xây dựng phát triển TP. Hồ Chí Minh</a>
                                <span class="create-date">28/11/2017</span>
                                <p class="desc">Trong ngày hôm nay (11/11) đoàn kiều bào đã tổ chức thành 4 nhóm đi tham quan các điểm như huyện Cần Giờ, Đại học Quốc gia, Khu công nghệ cao TP.HCM, Công viên phần mềm Quang Trung, Khu Nông nghiệp Công nghệ cao, Khu Đô thị mới Thủ Thiêm, Cảng Cát Lái... để kiều bào hiểu thêm về tình hình phát [...]</p>
                            </div>
                        </li>
                        <li class="clearfix">
                            <a href="?page=detail_blog" title="" class="thumb fl-left">
                                <img src="public/images/img-post-01.jpg" alt="">
                            </a>
                            <div class="info fl-right">
                                <a href="?page=detail_blog" title="" class="title">Mời gọi kiều bào hiến kế, chung sức xây dựng phát triển TP. Hồ Chí Minh</a>
                                <span class="create-date">28/11/2017</span>
                                <p class="desc">Trong ngày hôm nay (11/11) đoàn kiều bào đã tổ chức thành 4 nhóm đi tham quan các điểm như huyện Cần Giờ, Đại học Quốc gia, Khu công nghệ cao TP.HCM, Công viên phần mềm Quang Trung, Khu Nông nghiệp Công nghệ cao, Khu Đô thị mới Thủ Thiêm, Cảng Cát Lái... để kiều bào hiểu thêm về tình hình phát [...]</p>
                            </div>
                        </li>
                        <li class="clearfix">
                            <a href="?page=detail_blog" title="" class="thumb fl-left">
                                <img src="public/images/img-post-01.jpg" alt="">
                            </a>
                            <div class="info fl-right">
                                <a href="?page=detail_blog" title="" class="title">Mời gọi kiều bào hiến kế, chung sức xây dựng phát triển TP. Hồ Chí Minh</a>
                                <span class="create-date">28/11/2017</span>
                                <p class="desc">Trong ngày hôm nay (11/11) đoàn kiều bào đã tổ chức thành 4 nhóm đi tham quan các điểm như huyện Cần Giờ, Đại học Quốc gia, Khu công nghệ cao TP.HCM, Công viên phần mềm Quang Trung, Khu Nông nghiệp Công nghệ cao, Khu Đô thị mới Thủ Thiêm, Cảng Cát Lái... để kiều bào hiểu thêm về tình hình phát [...]</p>
                            </div>
                        </li>
                        <li class="clearfix">
                            <a href="?page=detail_blog" title="" class="thumb fl-left">
                                <img src="public/images/img-post-01.jpg" alt="">
                            </a>
                            <div class="info fl-right">
                                <a href="?page=detail_blog" title="" class="title">Mời gọi kiều bào hiến kế, chung sức xây dựng phát triển TP. Hồ Chí Minh</a>
                                <span class="create-date">28/11/2017</span>
                                <p class="desc">Trong ngày hôm nay (11/11) đoàn kiều bào đã tổ chức thành 4 nhóm đi tham quan các điểm như huyện Cần Giờ, Đại học Quốc gia, Khu công nghệ cao TP.HCM, Công viên phần mềm Quang Trung, Khu Nông nghiệp Công nghệ cao, Khu Đô thị mới Thủ Thiêm, Cảng Cát Lái... để kiều bào hiểu thêm về tình hình phát [...]</p>
                            </div>
                        </li>
                        <li class="clearfix">
                            <a href="?page=detail_blog" title="" class="thumb fl-left">
                                <img src="public/images/img-post-01.jpg" alt="">
                            </a>
                            <div class="info fl-right">
                                <a href="?page=detail_blog" title="" class="title">Mời gọi kiều bào hiến kế, chung sức xây dựng phát triển TP. Hồ Chí Minh</a>
                                <span class="create-date">28/11/2017</span>
                                <p class="desc">Trong ngày hôm nay (11/11) đoàn kiều bào đã tổ chức thành 4 nhóm đi tham quan các điểm như huyện Cần Giờ, Đại học Quốc gia, Khu công nghệ cao TP.HCM, Công viên phần mềm Quang Trung, Khu Nông nghiệp Công nghệ cao, Khu Đô thị mới Thủ Thiêm, Cảng Cát Lái... để kiều bào hiểu thêm về tình hình phát [...]</p>
                            </div>
                        </li> -->
                    </ul>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail">
                    <?php 
                        if($num_brum>1)
                        {
                            ?>
                                <ul class="list-item clearfix">
                                    <?php
                                    for($i=1;$i<=$num_brum;$i++)
                                    {
                                        ?>
                                        <li>
                            <a href="" title=""><?php echo $i ?></a>
                                    </li>
                                        <?php
                                    }
                                    ?>
                        <!-- <li>
                            <a href="" title="">1</a>
                        </li>
                        <li>
                            <a href="" title="">2</a>
                        </li>
                        <li>
                            <a href="" title="">3</a>
                        </li> -->
                    </ul>
                            <?php
                        }
                    ?>
                    
                </div>
            </div>
        </div>
        <div class="sidebar fl-left">
            <div class="section" id="selling-wp">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm bán chạy</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        <?php 
                            foreach ($list_pro_sold as $item) {
                                # code...
                                ?>
                                <li class="clearfix">
                            <a href="?mod=page&act=detail&cat_id=<?php echo $item['cat_id'] ?>&id=<?php echo $item['id']  ?>" title="" class="thumb fl-left">
                                <img src="<?php echo $item['image_link'] ?>" alt="">
                            </a>
                            <div class="info fl-right">
                                <a href="?mod=page&act=detail&cat_id=<?php echo $item['cat_id'] ?>&id=<?php echo $item['id']  ?>" title="" class="product-name"><?php echo $item['name'] ?></a>
                                <div class="price">
                                    <span class="new"><?php echo currentcy_format($item['price']) ?></span>
                                    <span class="old"><?php echo currentcy_format($item['old_price']) ?></span>
                                </div>
                                <a href="?mod=cart&act=buynow&id=<?php echo $item['id'] ?>" title="" class="buy-now">Mua ngay</a>
                            </div>
                             </li>
                                <?php
                            }
                        ?>
                        <!-- <li class="clearfix">
                            <a href="?page=detail_product" title="" class="thumb fl-left">
                                <img src="public/images/img-pro-13.png" alt="">
                            </a>
                            <div class="info fl-right">
                                <a href="?page=detail_product" title="" class="product-name">Laptop Asus A540UP I5</a>
                                <div class="price">
                                    <span class="new">5.190.000đ</span>
                                    <span class="old">7.190.000đ</span>
                                </div>
                                <a href="" title="" class="buy-now">Mua ngay</a>
                            </div>
                        </li>
                        <li class="clearfix">
                            <a href="?page=detail_product" title="" class="thumb fl-left">
                                <img src="public/images/img-pro-11.png" alt="">
                            </a>
                            <div class="info fl-right">
                                <a href="?page=detail_product" title="" class="product-name">Iphone X Plus</a>
                                <div class="price">
                                    <span class="new">15.190.000đ</span>
                                    <span class="old">17.190.000đ</span>
                                </div>
                                <a href="" title="" class="buy-now">Mua ngay</a>
                            </div>
                        </li>
                        <li class="clearfix">
                            <a href="?page=detail_product" title="" class="thumb fl-left">
                                <img src="public/images/img-pro-12.png" alt="">
                            </a>
                            <div class="info fl-right">
                                <a href="?page=detail_product" title="" class="product-name">Iphone X Plus</a>
                                <div class="price">
                                    <span class="new">15.190.000đ</span>
                                    <span class="old">17.190.000đ</span>
                                </div>
                                <a href="" title="" class="buy-now">Mua ngay</a>
                            </div>
                        </li>
                        <li class="clearfix">
                            <a href="?page=detail_product" title="" class="thumb fl-left">
                                <img src="public/images/img-pro-05.png" alt="">
                            </a>
                            <div class="info fl-right">
                                <a href="?page=detail_product" title="" class="product-name">Iphone X Plus</a>
                                <div class="price">
                                    <span class="new">15.190.000đ</span>
                                    <span class="old">17.190.000đ</span>
                                </div>
                                <a href="" title="" class="buy-now">Mua ngay</a>
                            </div>
                        </li>
                        <li class="clearfix">
                            <a href="?page=detail_product" title="" class="thumb fl-left">
                                <img src="public/images/img-pro-22.png" alt="">
                            </a>
                            <div class="info fl-right">
                                <a href="?page=detail_product" title="" class="product-name">Iphone X Plus</a>
                                <div class="price">
                                    <span class="new">15.190.000đ</span>
                                    <span class="old">17.190.000đ</span>
                                </div>
                                <a href="" title="" class="buy-now">Mua ngay</a>
                            </div>
                        </li>
                        <li class="clearfix">
                            <a href="?page=detail_product" title="" class="thumb fl-left">
                                <img src="public/images/img-pro-23.png" alt="">
                            </a>
                            <div class="info fl-right">
                                <a href="?page=detail_product" title="" class="product-name">Iphone X Plus</a>
                                <div class="price">
                                    <span class="new">15.190.000đ</span>
                                    <span class="old">17.190.000đ</span>
                                </div>
                                <a href="" title="" class="buy-now">Mua ngay</a>
                            </div>
                        </li>
                        <li class="clearfix">
                            <a href="?page=detail_product" title="" class="thumb fl-left">
                                <img src="public/images/img-pro-18.png" alt="">
                            </a>
                            <div class="info fl-right">
                                <a href="?page=detail_product" title="" class="product-name">Iphone X Plus</a>
                                <div class="price">
                                    <span class="new">15.190.000đ</span>
                                    <span class="old">17.190.000đ</span>
                                </div>
                                <a href="" title="" class="buy-now">Mua ngay</a>
                            </div>
                        </li>
                        <li class="clearfix">
                            <a href="?page=detail_product" title="" class="thumb fl-left">
                                <img src="public/images/img-pro-15.png" alt="">
                            </a>
                            <div class="info fl-right">
                                <a href="?page=detail_product" title="" class="product-name">Iphone X Plus</a>
                                <div class="price">
                                    <span class="new">15.190.000đ</span>
                                    <span class="old">17.190.000đ</span>
                                </div>
                                <a href="" title="" class="buy-now">Mua ngay</a>
                            </div>
                        </li> -->
                    </ul>
                </div>
            </div>
            <div class="section" id="banner-wp">
                <div class="section-detail">
                    <a href="?page=detail_blog_product" title="" class="thumb">
                        <img src="public/images/banner.png" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    get_footer();
?>
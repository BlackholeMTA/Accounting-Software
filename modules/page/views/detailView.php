<?php
    get_header();
    $cat_id=(int)$_GET['cat_id'];
    $pro_id=(int)$_GET['id'];
    $info_pro=get_info_pro_by_id($pro_id);
    $list_image_pro=get_list_image_pro($pro_id);
   // echo $info_pro['image_link'];
   $list_pro=get_list_product_by_id_list_cat($cat_id);
?>
<div id="main-content-wp" class="clearfix detail-product-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?mod=home" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title=""><?php echo $list_cat[$cat_id-1]['cat_name'] ?></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
        <?php 
                            if(is_array($info_pro))
                            {
                                ?>
                                <div class="section" id="detail-product-wp">
                <div class="section-detail clearfix">
                    <div class="thumb-wp fl-left">
                        
                        <a href="" title="" id="main-thumb">
                            <img id="zoom" src="<?php echo $info_pro['image_link'] ?>" data-zoom-image="<?php echo $info_pro['image_link_zoom'] ?>"/>
                        </a>
                        <div id="list-thumb">
                            <?php 
                                foreach ($list_image_pro as $item) {
                                    # code...
                                    ?>
                                        <a href="" data-image="<?php echo $item['image_link'] ?>" data-zoom-image="<?php echo $item['image_link_zoom'] ?>">
                                <img id="zoom" src="<?php echo $item['image_link_dis_zoom'] ?>" />
                                </a>
                                    <?php
                                }
                            ?>
                            <!-- <a href="" data-image="https://media3.scdn.vn/img2/2017/10_30/sxlpFs_simg_ab1f47_350x350_maxb.jpg" data-zoom-image="https://media3.scdn.vn/img2/2017/10_30/sxlpFs_simg_70aaf2_700x700_maxb.jpg">
                                <img id="zoom" src="https://media3.scdn.vn/img2/2017/10_30/sxlpFs_simg_02d57e_50x50_maxb.jpg" />
                            </a>
                            <a href="" data-image="https://media3.scdn.vn/img2/2017/10_30/BlccRg_simg_ab1f47_350x350_maxb.jpg" data-zoom-image="https://media3.scdn.vn/img2/2017/10_30/BlccRg_simg_70aaf2_700x700_maxb.jpg">
                                <img id="zoom" src="https://media3.scdn.vn/img2/2017/10_30/BlccRg_simg_02d57e_50x50_maxb.jpg" />
                            </a>
                            <a href="" data-image="https://media3.scdn.vn/img2/2017/10_30/sxlpFs_simg_ab1f47_350x350_maxb.jpg" data-zoom-image="https://media3.scdn.vn/img2/2017/10_30/sxlpFs_simg_70aaf2_700x700_maxb.jpg">
                                <img id="zoom" src="https://media3.scdn.vn/img2/2017/10_30/sxlpFs_simg_02d57e_50x50_maxb.jpg" />
                            </a>
                            <a href="" data-image="https://media3.scdn.vn/img2/2017/10_30/BlccRg_simg_ab1f47_350x350_maxb.jpg" data-zoom-image="https://media3.scdn.vn/img2/2017/10_30/BlccRg_simg_70aaf2_700x700_maxb.jpg">
                                <img id="zoom" src="https://media3.scdn.vn/img2/2017/10_30/BlccRg_simg_02d57e_50x50_maxb.jpg" />
                            </a>
                            <a href="" data-image="https://media3.scdn.vn/img2/2017/10_30/sxlpFs_simg_ab1f47_350x350_maxb.jpg" data-zoom-image="https://media3.scdn.vn/img2/2017/10_30/sxlpFs_simg_70aaf2_700x700_maxb.jpg">
                                <img id="zoom" src="https://media3.scdn.vn/img2/2017/10_30/sxlpFs_simg_02d57e_50x50_maxb.jpg" />
                            </a>
                            <a href="" data-image="https://media3.scdn.vn/img2/2017/10_30/BlccRg_simg_ab1f47_350x350_maxb.jpg" data-zoom-image="https://media3.scdn.vn/img2/2017/10_30/BlccRg_simg_70aaf2_700x700_maxb.jpg">
                                <img id="zoom" src="https://media3.scdn.vn/img2/2017/10_30/BlccRg_simg_02d57e_50x50_maxb.jpg" />
                            </a> -->
                        </div>
                    </div>
                    <div class="thumb-respon-wp fl-left">
                        <img src="<?php echo $info_pro['image_link'] ?>" alt="">
                    </div>
                    <div class="info fl-right">
                        <h3 class="product-name"><?php echo $info_pro['name'] ?></h3>
                        <div class="desc">
                            <?php  echo $info_pro['product_desc']?>
                        </div>
                        <div class="num-product">
                            <span class="title">Sản phẩm: </span>
                            <span class="status">Còn hàng</span>
                        </div>
                        <p class="price"><?php echo currentcy_format( $info_pro['price']) ?></p>
                        <div id="num-order-wp">
                            <a title="" id="minus"><i class="fa fa-minus"></i></a>
                            <input type="number" name="num-order" value="1"  id="num-order">
                            <a title="" id="plus"><i class="fa fa-plus"></i></a>
                        </div>
                        <a href="?mod=cart&act=add&id=<?php echo $info_pro['id'] ?>" title="Thêm giỏ hàng" class="add-cart">Thêm giỏ hàng</a>
                    </div>
                </div>
            </div>
            <div class="section" id="post-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Mô tả sản phẩm</h3>
                </div>
                <div class="section-detail">
                    <?php echo $info_pro['content']?>
                </div>
            </div>
                                <?php
                            }
                            else{
                                echo "Sản phẩm không tồn tại";
                            }
                        ?>
                        
            
            
            <div class="section" id="same-category-wp">
                <div class="section-head">
                    <h3 class="section-title">Cùng chuyên mục</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        <?php 
                            foreach ($list_pro as $item) {
                                # code...
                                ?>
                                    <li>
                            <a href="?mod=page&act=detail&cat_id=<?php echo $cat_id ?>&id=<?php echo $item['id'] ?>" title="" class="thumb">
                                <img src="<?php  echo $item['image_link'] ?>">
                            </a>
                            <a href="?mod=page&act=detail&cat_id=<?php echo $cat_id ?>&id=<?php echo $item['id'] ?>" title="" class="product-name"><?php echo $item['name'] ?></a>
                            <div class="price">
                                <span class="new"><?php echo currentcy_format($item['price'])  ?></span>
                                <span class="old"><?php  echo currentcy_format($item['old_price'])  ?></span>
                            </div>
                            <div class="action clearfix">
                                <a href="" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="" title="" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>
                                <?php
                            }
                        ?>
                        <!-- <li>
                            <a href="" title="" class="thumb">
                                <img src="public/images/img-pro-17.png">
                            </a>
                            <a href="" title="" class="product-name">Laptop HP Probook 4430s</a>
                            <div class="price">
                                <span class="new">17.900.000đ</span>
                                <span class="old">20.900.000đ</span>
                            </div>
                            <div class="action clearfix">
                                <a href="" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="" title="" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>
                        <li>
                            <a href="" title="" class="thumb">
                                <img src="public/images/img-pro-18.png">
                            </a>
                            <a href="" title="" class="product-name">Laptop HP Probook 4430s</a>
                            <div class="price">
                                <span class="new">17.900.000đ</span>
                                <span class="old">20.900.000đ</span>
                            </div>
                            <div class="action clearfix">
                                <a href="" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="" title="" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>
                        <li>
                            <a href="" title="" class="thumb">
                                <img src="public/images/img-pro-19.png">
                            </a>
                            <a href="" title="" class="product-name">Laptop HP Probook 4430s</a>
                            <div class="price">
                                <span class="new">17.900.000đ</span>
                                <span class="old">20.900.000đ</span>
                            </div>
                            <div class="action clearfix">
                                <a href="" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="" title="" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>
                        <li>
                            <a href="" title="" class="thumb">
                                <img src="public/images/img-pro-20.png">
                            </a>
                            <a href="" title="" class="product-name">Laptop HP Probook 4430s</a>
                            <div class="price">
                                <span class="new">17.900.000đ</span>
                                <span class="old">20.900.000đ</span>
                            </div>
                            <div class="action clearfix">
                                <a href="" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="" title="" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>
                        <li>
                            <a href="" title="" class="thumb">
                                <img src="public/images/img-pro-21.png">
                            </a>
                            <a href="" title="" class="product-name">Laptop HP Probook 4430s</a>
                            <div class="price">
                                <span class="new">17.900.000đ</span>
                                <span class="old">20.900.000đ</span>
                            </div>
                            <div class="action clearfix">
                                <a href="" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="" title="" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>
                        <li>
                            <a href="" title="" class="thumb">
                                <img src="public/images/img-pro-22.png">
                            </a>
                            <a href="" title="" class="product-name">Laptop HP Probook 4430s</a>
                            <div class="price">
                                <span class="new">17.900.000đ</span>
                                <span class="old">20.900.000đ</span>
                            </div>
                            <div class="action clearfix">
                                <a href="" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="" title="" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li>
                        <li>
                            <a href="" title="" class="thumb">
                                <img src="public/images/img-pro-23.png">
                            </a>
                            <a href="" title="" class="product-name">Laptop HP Probook 4430s</a>
                            <div class="price">
                                <span class="new">17.900.000đ</span>
                                <span class="old">20.900.000đ</span>
                            </div>
                            <div class="action clearfix">
                                <a href="" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                <a href="" title="" class="buy-now fl-right">Mua ngay</a>
                            </div>
                        </li> -->
                    </ul>
                </div>
            </div>
        </div>
        <div class="sidebar fl-left">
            <div class="section" id="category-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Danh mục sản phẩm</h3>
                </div>
                <div class="secion-detail">
                <ul class="list-item">
                    <?php
                    
                    foreach ($list_cat as $item) {
                        
               # code...
               ?>
               <li>
               <a href="?mod=page&act=index&id=<?php echo $item['id'] ?>" title=""><?php echo $item['cat_name'] ?></a>
                     <?php
                     $cata_temp=get_list_catalog_by_id_list_cart($item['id']);
                     if(!empty($cata_temp))
                     {
                         ?>
                         <ul class="sub-menu">
                           <?php
                           foreach ($cata_temp as $item_temp_1) {
                             
                               # code...
                               ?>
                               <li>
                               <a href="?mod=page&act=index" title=""><?php echo $item_temp_1['catalog_name']?></a>
                               <?php
                               $pro_temp=get_list_product_by_id_catalog($item_temp_1['id']);
                                   if(!empty($pro_temp))
                                   {
                                       ?>
                                       <ul class="sub-menu">
                                       <?php
                                           foreach ($pro_temp as $item_temp_2) {
                                               # code...
                                               ?>
                                                   <li>
                                                   <a href="?mod=page&act=detail&cat_id=<?php echo $item_temp_1['id'] ?>&id=<?php echo $item_temp_2['id'] ?>" title=""><?php echo $item_temp_2['name'] ?></a>
                                                    </li>
                                               <?php
                                           }
                                       ?>
                                       </ul>
                                       <?php
                                   }
                               ?>

                               </li>
                               <?php
                           }
                           ?>

                           </ul>
                         <?php
                       
                     }
                     ?>
               </li>
               
               <?php 
               }
            ?> 
                    </ul>
                </div>
            </div>
            <div class="section" id="banner-wp">
                <div class="section-detail">
                    <a href="" title="" class="thumb">
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
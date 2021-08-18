<!DOCTYPE html>
<html>
    <head>
        <title>ISMART STORE</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="public/css/bootstrap/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/reset.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/carousel/owl.carousel.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/carousel/owl.theme.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/style.css" rel="stylesheet" type="text/css"/>
        <link href="public/responsive.css" rel="stylesheet" type="text/css"/>

        <script src="public/js/jquery-2.2.4.min.js" type="text/javascript"></script>
        <script src="public/js/elevatezoom-master/jquery.elevatezoom.js" type="text/javascript"></script>
        <script src="public/js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
        <script src="public/js/carousel/owl.carousel.js" type="text/javascript"></script>
        <script src="public/js/main.js" type="text/javascript"></script>
        <script src="public/js/ajax.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="site">
            <div id="container">
                <div id="header-wp">
                    <div id="head-top" class="clearfix">
                        <div class="wp-inner">
                            <a href="" title="" id="payment-link" class="fl-left">Hình thức thanh toán</a>
                            <div id="main-menu-wp" class="fl-right">
                                <ul id="main-menu" class="clearfix">
                                    <li>
                                        <a href="?mod=home" title="">Trang chủ</a>
                                    </li>
                                    <li>
                                        <a href="?mod=page&act=index&id=1" title="">Sản phẩm</a>
                                    </li>
                                    <li>
                                        <a href="?mod=post&act=index" title="">Blog</a>
                                    </li>
                                    <li>
                                        <a href="?page=detail_blog" title="">Giới thiệu</a>
                                    </li>
                                    <li>
                                        <a href="?page=detail_blog" title="">Liên hệ</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div id="head-body" class="clearfix">
                        <div class="wp-inner">
                            <a href="?page=home" title="" id="logo" class="fl-left"><img src="public/images/logo.png"/></a>
                            <div id="search-wp" class="fl-left">
                                <form method="POST" action="">
                                    <input type="text" name="s" id="s" placeholder="Nhập từ khóa tìm kiếm tại đây!">
                                    <button type="submit" id="sm-s">Tìm kiếm</button>
                                </form>
                            </div>
                            <div id="action-wp" class="fl-right">
                                <div id="advisory-wp" class="fl-left">
                                    <span class="title">Tư vấn</span>
                                    <span class="phone">0987.654.321</span>
                                </div>
                                <div id="btn-respon" class="fl-right"><i class="fa fa-bars" aria-hidden="true"></i></div>
                                <a href="?page=cart" title="giỏ hàng" id="cart-respon-wp" class="fl-right">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <span id="num">2</span>
                                </a>
                                <div id="cart-wp" class="fl-right">
                                    <div id="btn-cart">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        <span id="num"><?php 
                                $num_order=get_num_order_cart();
                                    if($num_order>0)
                                    {
                                        ?>
                                            <?php echo $num_order?>
                                        <?php
                                    }
                                ?></span>
                                    </div>
                                    <div id="dropdown">
                                        <p class="desc">Có <span><?php 
                                $num_order=get_num_order_cart();
                                    if($num_order>0)
                                    {
                                        echo $num_order;
                                    }
                                    else{
                                        echo "0";
                                    }
                                ?> sản phẩm</span> trong giỏ hàng</p>
                                    
                                        <ul class="list-cart">
                                            <?php 
                                                $list_pro_buy=get_list_buy_cart();
                                                foreach ($list_pro_buy as $item) {
                                                    # code...
                                                    ?>
                                                    <li class="clearfix">
                                                <a href="" title="" class="thumb fl-left">
                                                    <img src="<?php  echo $item['image_link'] ?>" alt="">
                                                </a>
                                                <div class="info fl-right">
                                                    <a href="" title="" class="product-name"><?php echo $item['name'] ?></a>
                                                    <p class="price"><?php echo currentcy_format($item['price']) ?></p>
                                                    <p class="qty" id="qty-<?php echo $item['id'] ?>">Số lượng: <span><?php 
                                                            echo $item['qty'];
                                                    ?></span></p>
                                                </div>
                                                </li>
                                                    <?php
                                                }
                                            ?>
                                            <!-- <li class="clearfix">
                                                <a href="" title="" class="thumb fl-left">
                                                    <img src="public/images/img-pro-11.png" alt="">
                                                </a>
                                                <div class="info fl-right">
                                                    <a href="" title="" class="product-name">Sony Express X6</a>
                                                    <p class="price">6.250.000đ</p>
                                                    <p class="qty">Số lượng: <span>1</span></p>
                                                </div>
                                            </li>
                                            <li class="clearfix">
                                                <a href="" title="" class="thumb fl-left">
                                                    <img src="public/images/img-pro-23.png" alt="">
                                                </a>
                                                <div class="info fl-right">
                                                    <a href="" title="" class="product-name">Laptop Lenovo 10</a>
                                                    <p class="price">16.250.000đ</p>
                                                    <p class="qty">Số lượng: <span>1</span></p>
                                                </div>
                                            </li> -->
                                        </ul>
                                        <div class="total-price clearfix">
                                            <p class="title fl-left">Tổng:</p>
                                            <p class="price fl-right" id="js-price"><?php echo currentcy_format( $total=get_total_cart()) ?></p>
                                        </div>
                                        <dic class="action-cart clearfix">
                                            <a href="?mod=cart&act=show" title="Giỏ hàng" class="view-cart fl-left">Giỏ hàng</a>
                                            <a href="?mod=cart&act=checkout" title="Thanh toán" class="checkout fl-right">Thanh toán</a>
                                        </dic>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
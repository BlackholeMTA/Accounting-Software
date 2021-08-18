<?php 
get_header();

?>
<?php 
    $list_buy=get_list_buy_cart();
?>
<div id="main-content-wp" class="cart-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?page=home" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Giỏ hàng</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner clearfix">
        <?php 
            if(!empty($list_buy))
            {
                ?>
                    <div class="section" id="info-cart-wp">
            <div class="section-detail table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <td>Mã sản phẩm</td>
                            <td>Ảnh sản phẩm</td>
                            <td>Tên sản phẩm</td>
                            <td>Giá sản phẩm</td>
                            <td>Số lượng</td>
                            <td colspan="2">Thành tiền</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($list_buy as $item) {

                                # code...
                                ?>
                                    <tr>
                            <td><?php echo $item['code'] ?></td>
                            <td>
                                <a href="" title="" class="thumb">
                                    <img src="<?php echo $item['image_link'] ?>" alt="">
                                </a>
                            </td>
                            <td>
                                <a href="" title="" class="name-product"><?php echo $item['name'] ?></a>
                            </td>
                            <td><?php echo currentcy_format($item['price'])  ?></td>
                            <td>
                                <input type="number" data-id="<?php echo $item['id']?>" name="qty[<?php echo $item['id'];?>]"  value="<?php echo $item['qty'] ?>" min="1" max="10" class="num-order">
                            </td>
                            <td id="sub-total-<?php echo $item['id']?>"><?php echo currentcy_format( $item['sub_total'] )?></td>
                            <td>
                                <a href="<?php echo $item['url_delete_cart'] ?>" title="" class="del-product"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                                <?php
                            }
                        ?>
                        <!-- <tr>
                            <td>HCA00031</td>
                            <td>
                                <a href="" title="" class="thumb">
                                    <img src="public/images/img-pro-11.png" alt="">
                                </a>
                            </td>
                            <td>
                                <a href="" title="" class="name-product">Sony Express X6</a>
                            </td>
                            <td>500.000đ</td>
                            <td>
                                <input type="text" name="num-order" value="1" class="num-order">
                            </td>
                            <td>500.000đ</td>
                            <td>
                                <a href="" title="" class="del-product"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>HCA00032</td>
                            <td>
                                <a href="" title="" class="thumb">
                                    <img src="public/images/img-pro-23.png" alt="">
                                </a>
                            </td>
                            <td>
                                <a href="" title="" class="name-product">Laptop Probook HP 4430s</a>
                            </td>
                            <td>350.000đ</td>
                            <td>
                                <input type="text" name="num-order" value="1" class="num-order">
                            </td>
                            <td>350.000đ</td>
                            <td>
                                <a href="" title="" class="del-product"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr> -->
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="7">
                                <div class="clearfix">
                                    <p id="total-price" class="fl-right">Tổng giá: <span><?php echo currentcy_format(get_total_cart()) ;?></span></p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="7">
                                <div class="clearfix">
                                    <div class="fl-right">
                                        <a href="" title="" id="update-cart">Cập nhật giỏ hàng</a>
                                        <a href="?mod=cart&act=checkout" title="" id="checkout-cart">Thanh toán</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
                <?php
            }
            else{
                echo "Không có sản phẩm nào!";
            }

        ?>
        
        <div class="section" id="action-cart-wp">
            <div class="section-detail">
                <p class="title">Click vào <span>“Cập nhật giỏ hàng”</span> để cập nhật số lượng. Nhập vào số lượng <span>0</span> để xóa sản phẩm khỏi giỏ hàng. Nhấn vào thanh toán để hoàn tất mua hàng.</p>
                <a href="?mod=home" title="" id="buy-more">Mua tiếp</a><br/>
                <a href="" title="" id="delete-cart">Xóa giỏ hàng</a>
            </div>
        </div>
    </div>
</div>
<?php 

get_footer();
?>
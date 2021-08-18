<?php 
    get_header();
?>
<?php 
    $pro=get_list_buy_cart();
   
    $num_order=get_num_order_cart();

    $total=get_total_cart();
?>
<style>
        .error{
            color: red;
        }
        h1{
        	font-size: 2rem;
        	font-weight: bold;
        }
    </style>
    
<div id="main-content-wp" class="checkout-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?mod=home" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Thanh toán</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner clearfix">
        <div class="section" id="customer-info-wp">
            <div class="section-head">
                <h1 class="section-title">Thông tin khách hàng</h1>
            </div>
            <div class="section-detail">
                <form method="POST" action="" name="form-checkout">
                    <div class="form-row clearfix">
                        <div class="form-col fl-left">
                            <label for="fullname">Họ tên</label>
                            <input type="text" name="fullname" id="fullname" value="<?php echo set_value("fullname") ?>">
                            <?php echo form_error("fullname")?>
                        </div>
                        <div class="form-col fl-right">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="<?php echo set_value("email") ?>" id="email">
                            <?php echo form_error("email")?>
                        </div>
                    </div>
                    <div class="form-row clearfix">
                        <div class="form-col fl-left">
                            <label for="address">Địa chỉ</label>
                            <input type="text" name="address" id="address" value="<?php echo set_value("address") ?>">
                            <?php echo form_error("address")?>
                        </div>
                        <div class="form-col fl-right">
                            <label for="phone">Số điện thoại</label>
                            <input type="tel" name="phone" id="phone" value="<?php echo set_value("phone") ?>">
                            <?php echo form_error("phone")?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="notes">Ghi chú</label>
                            <textarea name="note" value="<?php echo set_value("note") ?>"></textarea>
                        </div>
                    </div>
                    <div class="place-order-wp clearfix">
                    <input id="order-now" type="submit" name="btn_check"  value="Đặt hàng">
                </div>
                </form>
            </div>
        </div>
        <div class="section" id="order-review-wp">
            <div class="section-head">
                <h1 class="section-title">Thông tin đơn hàng</h1>
            </div>
            <?php 
                            if($num_order>0)
                            {
                                ?>
                                    <div class="section-detail">
                <table class="shop-table">
                    <thead>
                        <tr>
                            <td>Sản phẩm</td>
                            <td>Tổng</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($pro as $item) {
                                # code...
                                ?>
                                    <tr class="cart-item">
                            <td class="product-name"><?php echo  $item['name'] ?><strong class="product-quantity">x <?php echo $item['qty'] ?></strong></td>
                            <td class="product-total"><?php echo currentcy_format($item['sub_total']) ?></td>
                        </tr>
                                <?php
                            }
                        ?>
                        <!-- <tr class="cart-item">
                            <td class="product-name">Son môi nữ cá tính<strong class="product-quantity">x 1</strong></td>
                            <td class="product-total">350.000đ</td>
                        </tr>
                        <tr class="cart-item">
                            <td class="product-name">Đồ tẩy trang nhập khẩu Mỹ<strong class="product-quantity">x 2</strong></td>
                            <td class="product-total">500.000đ</td>
                        </tr> -->
                    </tbody>
                    <tfoot>
                        <tr class="order-total">
                            <td>Tổng đơn hàng:</td>
                            <td><strong class="total-price"><?php  echo currentcy_format($total) ?></strong></td>
                        </tr>
                    </tfoot>
                </table>
                <div id="payment-checkout-wp">
                    <ul id="payment_methods">
                        <li>
                            <input type="radio" id="direct-payment" checked="checked" name="payment-method" value="direct-payment">
                            <label for="direct-payment">Thanh toán tại cửa hàng</label>
                        </li>
                        <li>
                            <input type="radio" id="payment-home" name="payment-method" value="payment-home">
                            <label for="payment-home">Thanh toán tại nhà</label>
                        </li>
                    </ul>
                </div>
                <!-- <div class="place-order-wp clearfix">
                    <input type="submit" name="btn_check" id="order-now" value="Đặt hàng">
                </div> -->
            </div>
                                <?php
                            }
                            else{
                                echo "Chưa có sản phẩm nào được chọn!";
                            }

                        ?>
                       
            
        </div>
    </div>
</div>

<?php get_footer() ?>
<?php 
    $id=(int)$_POST['id'];
    $qty=(int)$_POST['qty'];

    //Lay thong tin san pham
    $item=get_info_pro_by_id($id);
    // echo "Xin chao moi nguoi";
    if(isset($_SESSION['cart'])&& array_key_exists($id,$_SESSION['cart']['buy']))
    {
        //Cập nhật số lượng
        $_SESSION['cart']['buy'][$id]['qty']=$qty;

        $sub_total=$qty*$item['price'];
        //Cập nhật tổng tiền
        $_SESSION['cart']['buy'][$id]['sub_total']=$sub_total;

        // Cập nhật giỏ hàng
        update_info_cart();
        // //Lấy tổng giá trị trong giỏ hàng
        // $temp=currentcy_format($sub_total);
        // $temp_2=currentcy_format($total);
        $total=get_total_cart();
        $pro_total=get_num_order_cart();
        
        $data=array(
            'sub_total'=>currentcy_format($sub_total),
            'total'=>currentcy_format($total)  ,
            'pro_total'=>$pro_total,
            'qty'=>$qty
        );
        echo json_encode($data) ;
        // echo $sub_total;
    }
?>
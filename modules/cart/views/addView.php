<?php 
// Lấy thông tin sản phẩm cần cho vào giỏ hàng
    $id=(int)$_GET['id'];
    add_cart($id);
    // echo $id;
//Thông tin của cả giỏ hàngư



// $_SESSION['cart']['buy']=array(
//     1=>array(
//         'id'=>1,
//         'product_title'=>'A',
//         'price'=>100000,
//         'product_thumb'=>'',
//         'code'=>'unit#1' ,
//         'qty'=>1,
//         'sub_total'=>100000,
//     ),
// )

//chuyển hướng tới danh sách sản phẩm

 redirect('?mod=cart&act=show');
?>
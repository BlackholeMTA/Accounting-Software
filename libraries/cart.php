<?php 
    function add_cart($id)
    {
       // global $list_product;
        $item=get_info_pro_by_id($id);
    echo "<pre>";
    print_r($item);
    echo "</pre>";
// THêm thông tin vào giỏ hàng

$qty=1;
if(isset($_SESSION['cart']['buy'])&&array_key_exists($id,$_SESSION['cart']['buy']))
{
    $qty=$_SESSION['cart']['buy'][$id]['qty']+1;
}
$_SESSION['cart']['buy'][$id]=array(
            'id'=>$item['id'],
            'url'=>$item['url'],
            'name'=>$item['name'],
            'price'=>$item['price'],
            'image_link'=>$item['image_link'],
            'code'=>$item['code'] ,
            'qty'=>$qty,
            'sub_total'=>$item['price']*$qty,
        );

// echo "<pre>";
//     print_r($_SESSION['cart']);
//     echo "</pre>";
update_info_cart();
   }

   function update_info_cart()
   {
    $num_order=0;
    $total=0;
    foreach ($_SESSION['cart']['buy'] as $item) {
        # code...
        $num_order+=$item['qty'];
        $total+=$item['sub_total'];
    }
    $_SESSION['cart']['info']=array(
        'num_order'=>$num_order,
        'total'=>$total,
    
    );
   }


   function get_list_buy_cart()
   {
       if(isset($_SESSION['cart']))
       {
        foreach ($_SESSION['cart']['buy'] as &$item) {
            # code...
            $item['url_delete_cart']="?mod=cart&act=delete&id={$item['id']}";
        }
        return $_SESSION['cart']['buy'];
       }
       
       return false;
   }
   function get_num_order_cart()
   {
       if(isset($_SESSION['cart']))
       {
        return $_SESSION['cart']['info']['num_order'];
       }
       return false;
       
   }
   function get_total_cart()
   {
    if(isset($_SESSION['cart']))
    {
     return $_SESSION['cart']['info']['total'];
    }
    return false;
   }
   function delete_cart($id)
   {
    if(isset($_SESSION['cart']))
    {
         //    Xoas 1 sản phẩm
         if(!empty($id))
         {
             unset($_SESSION['cart']['buy'][$id]);
             update_info_cart();
         }
         else {
             unset($_SESSION['cart']);
            // update_info_cart();
         }
    }
   
   }
   function update_cart($qty)
   {
       foreach ($qty as $id=>$new_qty) {
           # code...
           $qty =$_SESSION['cart']['buy'][$id]['qty']=$new_qty;
           // cập nhật só tiền
           $qty =$_SESSION['cart']['buy'][$id]['sub_total']=$new_qty*$_SESSION['cart']['buy'][$id]['price'];
       }
       update_info_cart();
   }
?>
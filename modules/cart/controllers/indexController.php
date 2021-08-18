<?php 
    function construct()
    {
        load_model('index');
    }
    function showAction()
    {
        load_view('show');
    }
    function buynowAction()
    {
        load_view('buynow');
    }
    function addAction()
    {
        load_view('add');
    }
    function deleteAction()
    {
        load_view('delete');
    }
    function update_ajaxAction()
    {
        load_view('update_ajax');
    }
    function checkoutAction()
    {
        global $fullname,$email,$address,$phone,$note,$error;
       // echo $_POST['btn_check'];   
        if(isset($_POST['btn_check']))
        {
           //echo $_POST['btn_check'];
            $error= array();
            if(empty($_POST['fullname']))
            {
                $error['fullname']="Bạn cần điền họ và tên";
                
            }
            else{
                $fullname=$_POST['fullname'];
            }
            if(empty($_POST['email']))
            {
                $error['email']="Bạn cần điền email";
                
            }
            else{
                if(!is_email($_POST['email']))
                {
                    $error['email']="Email không hợp lệ";
                }
                else{
                    // kiểm tra email đã sử dụng chưa 
                    // if(!check_email($_POST['email']))
                    // {
                    //     $error['email']="Email đã được sử dụng!";
                    // }
                    // else
                    // {
                        $email=$_POST['email'];
                    // }
                    
                }
            }
            if(empty($_POST['phone']))
            {
                $error['phone']="Bạn cần điền số điện thoại";
                
            }
            else{
                if(!is_phone($_POST['phone']))
                {
                    $error['phone']="Số điện thoại không hợp lệ";
                }
                else{

                    

                    $phone=$_POST['phone'];
                }
            }
            if(empty($_POST['address']))
            {
                $error['address']="Bạn cần điền địa điểm nhận hàng";
            }
            else 
            {
                $address=$_POST['address'];
            }
            
           $note=$_POST['note'];
            // $temp=$_POST['payment-method'];
            // $pay=array(
            //     'direct-payment'=>'0',
            //     'payment-home'=>'1'
            // );

            if(empty($error))
            {
                // $date=date("Y/m/d");
                // $time=time();
                $total=get_total_cart();
                $data_cus['fullname']=$fullname;
                $data_cus['email']=$email;
                $data_cus['address']=$address;
                $data_tran['note']=$note;
                $data_cus['phone']=$phone;
                db_insert('tbl_customer',$data_cus);
                $content="<p>Chào bạn {$fullname}</p>
                <p>Bạn đang thực hiện một giao dịch mua sản phẩm tại shop <a href='blackhole.com'>blackholesmart.com</a></p>
                <p>có giá trị {$total} đ</p> 
                <p>Chúng tôi đang giao sản phẩm cho quý khách trong 2h tới</p> 
                <p>Cảm ơn quý khách đã sử dụng dịch vụ</p>
                <p>I'm Black Hole</p>";
                 
                if(send_mail('boykutehyvn1999@gmail.com',$fullname,'Mua sản phẩm',$content))

                
                 redirect("?mod=cart&act=check");
                 else
                 echo ("Giao dịch không thành công!") ;
            }
            
           
        }
       
        load_view('checkout');
    }
    function checkAction()
    {
        // $pro=get_list_buy_cart();
   
        // $num_order=get_num_order_cart();

        // $total=get_total_cart();
        
        load_view('check');
    }
?>
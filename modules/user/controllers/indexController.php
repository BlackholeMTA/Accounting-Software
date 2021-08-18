<?php 
    function construct()
    {
        load_model('index');
        $list_users=get_list_users();
    }
    function regAction()
    {
        global $fullname, $username,$password,$error,$email;
        if(isset($_POST['btn_reg']))
        {
            $error=array();
            if(empty($_POST['fullname']))
            {
                $error['fullname']="Bạn cần điền họ và tên";
            }
            else $fullname=$_POST['fullname'];
            if(empty($_POST['username']))
            {
                $error['username']="Bạn cần điền tên đăng nhập";
               
            }
            else{
               
                if(!(strlen($_POST['username'])>=6 && strlen($_POST['username'])<=32))
                {
                    $error['username']="Tên đăng nhập từ 6 tới 32 kí tự";
                }   
                else {
                    // $partten="/^[A-Za-z0-9_\.]{6,32}$/";
                    if(!is_username($_POST['username']))
                    {
                        $error['username'] ="Tên đăng nhập cho phép nhập kí tự A->Z a->z 0->9 _ ";
                    }
                    else $username=$_POST['username'];
                     
                    
        
                }
               
            }
            if(empty($_POST['password']))
            {
                $error['password']="Bạn cần điền mật khẩu";
               
            }
            else{
              
                if(!(strlen($_POST['password'])>=6 && strlen($_POST['password'])<=32))
                {
                    $error['password']="Mật khẩu từ 6 tới 32 kí tự";
                }   
                else {
                    // $partten="/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/";
                    if(!is_password($_POST['password']))
                    {
                        $error['password'] ="Mật khẩu cho phép nhập kí tự A->Z a->z 0->9 _ bắt đầu bằng 1 kí tự in hoa và dùng các kí tự đặc biệt ";
                    }
                else $password=$_POST['password'];
                
                }
               
            }
            if(empty($_POST['email']))
            {
                $error['email']="Bạn cần điền email";
               
            }
            else{
               
                if(!is_email($_POST['email']))
                 {
               $error['email'] ="Email không đúng định dạng ";
                 }
                 else $email=$_POST['email'];
            }

            if(empty($error))
            {
                $active_token=md5($username.time());
            $data['username']=$username;
            $data['password']=$password;
            $data['fullname']=$fullname;
            $data['email']=$email;
            $data['active_token']=$active_token;
            $data['reg_time']=time();
            db_insert('tbl_users',$data);
            $link_active=base_url("?mod=user&action=active&active_token={$active_token}");
            $content="<p>Chào bạn {$fullname}</p>
            <p>Bạn vui lòng click vào đường link này để kích hoạt tài khoản:{$link_active}</p>
            <p>Nếu không phải bạn đăng ký tài khoản thì hãy bỏ qua email này</p>
            <p>I'm Black Hole</p>";
            echo send_mail('boykutehyvn1999@gmail.com','Đỗ Văn Hoàng','Kích hoạt tài khoản',$content);
            
            }
            
        }
        load_view('reg');
    }
    function loginAction()
    {
        
        global $username,$password,$error;
        if(isset($_POST['btn_login']))
        {
            $error=array();
            if(empty($_POST['username']))
            {
                $error['username']="Bạn cần điền tên đăng nhập";
               
            }
            else{
                
                if(!(strlen($_POST['username'])>=6 && strlen($_POST['username'])<=32))
                {
                    $error['username']="Tên đăng nhập từ 6 tới 32 kí tự";
                }   
                else {
                    // $partten="/^[A-Za-z0-9_\.]{6,32}$/";
                    if(!is_username($_POST['username']))
                    {
                        $error['username'] ="Tên đăng nhập cho phép nhập kí tự A->Z a->z 0->9 _ ";
                    } 
                    else $username=$_POST['username'];   
        
                }
               
            }
            if(empty($_POST['password']))
            {
                $error['password']="Bạn cần điền mật khẩu";
               
            }
            else{
                if(!(strlen($_POST['password'])>=6 && strlen($_POST['password'])<=32))
                {
                    $error['password']="Mật khẩu từ 6 tới 32 kí tự";
                }   
                else {
                    // $partten="/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/";
                    if(!is_password($_POST['password']))
                    {
                        $error['password'] ="Mật khẩu cho phép nhập kí tự A->Z a->z 0->9 _ bắt đầu bằng 1 kí tự in hoa và dùng các kí tự đặc biệt ";
                    }
                  else $password=md5($_POST['password']);
                    
        
                }
               
            }

            if(empty($error))
            {
                if(check_login($username,$password))
                {
                    $_SESSION['is_login']=true;
        	        $_SESSION['user_login']=$username;
        	        // chuyển hướng vào hệ thống
        	        redirect();
                }
                else
                {
        	        $error['account']="Tên tài khoản hoặc mật khẩu không tồn tại";
                }
            }
           
        }
        load_view('login');
        
        
        

        
    }
    function activeAction()
    {
        $active_token=$_GET['active_token'];
        $link_login=base_url("?mod=user&action=login");
        if(check_active_token($active_token))
        {
            echo active_user($active_token);
            
            echo "Bạn đã kích hoạt thành công! Vui lòng kích hoạt vào link sau để đăng nhập! <a href='$link_login'>Đăng nhập</a>";
        }
        else{
            echo "Yêu cầu kích hoạt không hợp lệ! Vui lòng kích hoạt vào link sau để đăng nhập! <a href='$link_login'>Đăng nhập</a>";
        }
       
    }

    function logoutAction()
    {
       unset($_SESSION['is_login']);
       unset($_SESSION['user_login']);
        // unset($_SESSION['password']);
        redirect("?mod=user&controller=index&action=login");
    //   redirect("?mod=user&action=login");
     // load_view('login');
    }

    function resetAction()
    {
        global $email,$error,$password;
        
        $reset_token=$_GET['reset_token'];
        if(!empty($reset_token))
        {
            // $password="";
           
            if(check_reset_token($reset_token))
            {
                if(isset($_POST['btn-new-pass']))
                {
                    
                    $error=array();
                    if(empty($_POST['password']))
                    {
                        $error['password']="Bạn cần điền mật khẩu";
                    }
                    else{
                        if(!(strlen($_POST['password'])>=6 && strlen($_POST['password'])<=32))
                        {
                            $error['password']="Mật khẩu từ 6 tới 32 kí tự";
                        }   
                        else {
                            // $partten="/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/";
                            if(!is_password($_POST['password']))
                            {
                                $error['password'] ="Mật khẩu cho phép nhập kí tự A->Z a->z 0->9 _ bắt đầu bằng 1 kí tự in hoa và dùng các kí tự đặc biệt ";
                            }
                          else $password=md5($_POST['password']);
                            
                
                        }
                        if(empty($error))
                        {
                            $data=array(
                                'password'=>$password
                            );
                            update_pass($data,$reset_token);
                            redirect("?mod=user&action=resetOk");
                        }
                       
                    }
                }
               
                load_view('newPass');
                
            }
            else{
                echo "Yêu cầu không  hợp lệ";
            }
            
        }
        else{
        if(isset($_POST['btn_reset']))
        {
            $error=array();
            if(empty($_POST['email']))
         {
                $error['email']="Bạn cần điền email";
                
          }
            else {
             
             // $partten="/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/";
             if(!is_email($_POST['email']))
             {
               $error['email'] ="Email không đúng định dạng ";
            }
            else {
                $email=$_POST['email'];
            }

             }
            
             if(empty($error))
             {
                 if(check_mail($email))
                 {
                    $reset_token=md5($email.time());
                    $data=array(
                        'reset_token'=> $reset_token
                    );
                    // Cập nhật mã  reset pass cho user cần khôi phục
                    update_reset_token($data,$email);
                    // gửi link khôi phục vào email của người dùng
                    $link=base_url("?mod=user&action=reset&reset_token={$reset_token}");
                    $content="<p>Bạn vui lòng click vào link sau để khôi phục mật khẩu: {$link}</p>
                    <p>Nếu không phải yêu cầu của bạn, vui lòng bỏ qua  email này</p>
                    <p>Black Hole</p>";
                    send_mail($email,'','Khôi phục mật khẩu Quản lý danh bạ điện thoại',$content);
                 }
                 else{
                    $error['account']="Gmail không tồn tại !";
                }
             }
            
        }
        // $data['email']=$email;
        // $data['error']=$error;
        load_view('reset');
    }
    }
    function resetOKAction()
    {
        load_view('resetOk');
    }
?>
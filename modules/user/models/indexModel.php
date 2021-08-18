<?php 
// hàm function check này nên viết ở index
function check()
{
    if(isset($_POST['btn_reg']))
{
    $error=array();
    if(empty($_POST['username']))
    {
        $error['username']="Bạn cần điền tên đăng nhập";
        $username=$_POST['username'];
    }
    else{
        $username=$_POST['username'];
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
             
            

        }
       
    }
    if(empty($_POST['password']))
    {
        $error['password']="Bạn cần điền mật khẩu";
        $password=$_POST['password'];
    }
    else{
        $password=$_POST['password'];
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
          
            

        }
       
    }
    if(empty($_POST['fullname']))
    {
        $error['fullname']="Bạn cần điền họ và tên";
        $fullname=$_POST['fullname'];
    }
    else {
        $fullname=$_POST['fullname'];
        // $partten="/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/";
        // if(!is_fullname($_POST['fullname']))
        // {
        //     $error['fullname'] ="Họ và tên không đúng định dạng ";
        // }
       
        

    }
    if(empty($_POST['email']))
    {
        $error['email']="Bạn cần điền email";
        $email=$_POST['email'];
    }
    else {
        $email=$_POST['email'];
        // $partten="/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/";
        if(!is_email($_POST['email']))
        {
            $error['email'] ="Email không đúng định dạng ";
        }
       
       

    }
    if(!db_check_user_gmail('tbl_users',$username,$email))
    $error['account']="Tên tài khoản hoặc email đã tồn tại";

//    if(empty($error))
//    {
//        echo $username;
//        echo "<br>{$password}";
//    }
//    else{
//        echo "<pre>";
//        print_r($error);
//        echo "<pre>";
//    }
    // $fullname=$_POST['fullname'];
    // $email=$_POST['email'];
    $user=array();
    if(empty($error))
    {
        // session_start();
        // $_SESSION['is_login']=true;
        // $data=array(
        //     'username' => "unitop",
        //     'password' =>"Unitop!@#"
        // );
        // $_SESSION['username']=$username;
        // $_SESSION['password']=$password;
        // if($username==$data['username']&& $password==$data['password'])
        // header('location: index.php');
        // else {
        //     echo "Thông tin tài khoản không chính xác!";
            
        // }


        // if(check_login($username,$password)==true)
        // {
        // 	if($_POST['remember_me']==1)
        //     {
        //         setcookie('is_login',true,time()+3600);
        //         setcookie('user_name',$username,time()+3600);

        //     }
        // 	$_SESSION['is_login']=true;
        // 	$_SESSION['user_login']=$username;
        // 	// chuyển hướng vào hệ thống
        // //	redirect('?page=home');
        // }
        // else
        // {
        // 	$error['account']="Tên tài khoản hoặc mật khẩu không tồn tại";
        // }
        
    }
    $user['username']=$username;
    $user['password']=$password;

$user['error']=$error;
$user['fullname']=$fullname;
$user['email']=$email;

return $user;
    
}
function db_check_user_gmail($table,$user,$email)
{
    $query_string_1="SELECT user_id FROM `".$table."` WHERE `username` = '{$user}'";
   $num_user=mysqli_num_rows(db_query($query_string_1))  ;
   $query_string_2="SELECT user_id FROM `".$table."` WHERE email = '{$email}'";
   $num_email=mysqli_num_rows(db_query($query_string_2) ) ;
    if($num_email||$num_user)
    return false;
    return true;
}

}
function get_list_users() {
    $result = db_fetch_array("SELECT * FROM `tbl_users`");
    return $result;
}
function active_user($active_token)
{
  return  db_update('tbl_users',array('is_active'=>1),"`active_token`='{$active_token}'");
}
function check_active_token($active_token){
    $query_string_1="SELECT * FROM `tbl_users` WHERE `active_token` = '{$active_token}'AND `is_active`='0'";//
   $num_user=mysqli_num_rows(db_query($query_string_1))  ;
   if($num_user)
   return true; // >0 thì có tài khoản
   return false; //=0 thì không có tài khoản
}
// function check_login($username,$password)
// {
// $check_user=db_num_rows("SELECT * FROM `tbl_users` WHERE `username`='{$username}' AND `password`='{$password}'");
// if($check_user)
// return true;
// return false;
// }
function check_mail($email)
{
    $check_email=db_num_rows("SELECT *FROM `tbl_users` WHERE  `email` = '{$email}'");
    if($check_email>0)
    return true;
    return false;
}
function update_reset_token($data,$email)
{
    db_update('tbl_users',$data,"`email`='{$email}'");
}
function check_reset_token($reset_token)
{
    $check_reset_token=db_num_rows("SELECT *FROM `tbl_users` WHERE  `reset_token` = '{$reset_token}'");
    if($check_reset_token>0)
    return true;
    return false;
}
function update_pass($data,$reset_token)
{
    db_update('tbl_users',$data,"`reset_token`='{$reset_token}'");
}
?>
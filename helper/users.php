<?php
	function check_login($username,$password){
		 $check_user=db_num_rows("SELECT * FROM `tbl_users` WHERE `username`='{$username}' AND `password`='{$password}'");
		if($check_user)
		return true;
		return false;
		
		
	} 
	// Kiểm tra login hay chưa
	function is_login()
	{
		if(isset($_SESSION['is_login']))
			return true;
		return false;
	}
	//Trả về user của người login

	function user_login()
	{
		if(!empty($_SESSION['user_login']))
			return $_SESSION['user_login'];
		return false;
	}
	// trả về thông tin user
	function info_user($field='id')
	{
		global $list_users;
		if(isset($_SESSION['is_login']))
		{
			foreach ($list_users as $user) {
				if($_SESSION['user_login']==$user['username'])
				{
					//Kiểm tra key có tồn tại trong mảng hay ko
					if(array_key_exists($field, $user))
						return $user[$field];


				}
			}
		}
			
			return false;
	}
	// kiểm tra xem có nhớ đăng nhập ko
	function is_remember_me()
	{
		if(!empty($_COOKIE['is_login']))
		return true;
		return false;
	}
?>
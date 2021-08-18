<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Quản lý danh bạ</title>

	<link href="public/css/bootstrap/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/reset.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link  rel="stylesheet" type="text/css" href="public/style.css"/>
        <link href="public/responsive.css" rel="stylesheet" type="text/css"/>
        <!-- <script src="public/js/jquery-3.4.1.min.js" type="text/javascript"></script> -->
        <script src="public/js/jquery-2.2.4.min.js" type="text/javascript"></script>
        <script src="public/js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
        <script src="public/js/main.js" type="text/javascript"></script>
        <script src="public/js/app.js" type="text/javascript"></script>
    <link rel="stylesheet" href="public/css/import/login.css">
</head>
<style>
        .error{
            color: red;
        }
        h1{
        	font-size: 2rem;
        	font-weight: bold;
        }
    </style>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div id="wrapper">
		<div id="wp-form-login">
			<h1>Đăng nhập</h1>
			<form action="" method="POST" id="form-login">
				<input id="username" type="text" name="username" value="<?php  echo set_value('username')?>" placeholder="Username">
				
				<?php echo form_error('username')?>
			<input id="password" type="password" name="password" value="" placeholder="Password">
				<?php echo form_error('password')?>
				<?php echo form_error('account')?>
                <!-- <input class="remember_me" value="1" type="checkbox" name="remember_me" id="remember_me" style="width: auto;display: unset; text-align: left;"><label class="remember_me" for="remember_me">Ghi nhớ đăng nhập</label> -->
			<input id="button" type="submit" name="btn_login" value="Đăng nhập">
			</form>
			<a href="<?php echo base_url("?mod=user&action=reg") ?>">Đăng ký</a><span> | </span><a href="<?php echo base_url("?mod=user&action=reset") ?>">Quên mật khẩu</a>
		</div>
	</div>
			</div>
		</div>
	</div>
	
</body>
</html>
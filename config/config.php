<?php
if(isset($_SESSION['cart']))
{
    unset($_SESSION['cart']);
}

session_start();
ob_start();
/*
 * ---------------------------------------------------------
 * BASE URL
 * ---------------------------------------------------------
 * Cấu hình đường dẫn gốc của ứng dụng
 * Ví dụ: 
 * http://hocweb123.com đường dẫn chạy online 
 * http://localhost/yourproject.com đường dẫn dự án ở local
 * 
 */

$config['base_url'] = "http://localhost/unitop/PHP/lesson/section_29/ismart.com";


$config['default_module'] = 'home';
$config['default_controller'] = 'index';
$config['default_action'] = 'index';













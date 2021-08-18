<?php 
    function check_email($email)
    {
    $query="SELECT * FROM `tbl_customer` where `email` ='{$email}'";
    $count=db_num_rows($query);
    if($count==0)
    return true;
    else return false;
    }
      
    
?>
<?php 

function get_list($table)
{
    $query="SELECT * FROM `{$table}`";
    $list_cat=db_fetch_array($query);
     return $list_cat;
}
// lấy danh sách có trạng thái status=1
function get_list_status($table)
{
    $query="SELECT * FROM `{$table}` where `status`='1'";
    $list_cat=db_fetch_array($query);
     return $list_cat;
}

?>
<?php 

function get_list($table)
{
    $query="SELECT * FROM `{$table}`";
    $list_cat=db_fetch_array($query);
     return $list_cat;
}
function get_list_status($table)
{
    $query="SELECT * FROM `{$table}` where `status`='1'";
    $list_cat=db_fetch_array($query);
     return $list_cat;
}
//Lấy danh sách 10 sản phẩm bán chạy nhất 
function get_list_product_sold()
{
    $list_pro=array();
    $query="SELECT pro.id,pro.name,pro.price,pro.old_price,pro.image_link,cart.id as cat_id FROM `tbl_products` as pro,`tbl_catalogs` as ca,`tbl_list_cats` as cart where pro.catalog_id=ca.id and ca.cat_id=cart.id ORDER by pro.`num_of_sold_pro` ASC LIMIT 0,10";
$list_pro=db_fetch_array($query);
return $list_pro;
}



?>
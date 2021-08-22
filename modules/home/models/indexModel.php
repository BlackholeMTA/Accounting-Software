<?php 
    //Lấy danh sách không có trạng thái status
    // function get_list($table)
    // {
    //     $query="SELECT * FROM `{$table}`";
    //     $list_cat=db_fetch_array($query);
    //      return $list_cat;
    // }
    // lấy danh sách có trạng thái status=1
    // function get_list_status($table)
    // {
    //     $query="SELECT * FROM `{$table}` where `status`='1'";
    //     $list_cat=db_fetch_array($query);
        
    //      return $list_cat;
    // }
    // đếm xem có sản phẩm giữa cha và con hay không
    // function check_parent_son($table_pa,$table_son,$id_pa,$id_son,$id)
    // {
    // $query="SELECT * `{$table_pa}` JOIN `{$table_son}` ON {$table_pa}.{$id_pa}= {$table_son}.{$id_son} WHERE `{$id_pa}`='{$id}'";
    // $num=db_num_rows($query);
    // if($num>0)
    // return true;
    // return false;
    // }
    // //Lấy danh sách catalog từ id_list_cart
    // function get_list_catalog_by_id_list_cart($id)
    // {
    //     $list_pro=array();
    //     $query="SELECT * FROM `tbl_catalogs` WHERE `cat_id`='{$id}'";
    //     $list_pro=db_fetch_array($query);
    //     return $list_pro;
    // }
    // //Lấy danh sách sản phẩm từ id_catalog
    // function get_list_product_by_id_catalog($id)
    // {
    //     $list_pro=array();
    //     $query="SELECT * FROM `tbl_products` WHERE `catalog_id`='{$id}'";
    //     $list_pro=db_fetch_array($query);
    //     return $list_pro;
    // }
    // Ra danh sách các  sản phẩm giữa cho và con
    // function get_list_pro($table_pa,$table_son,$id_pa,$id_son,$id)
    // {
    //     if(check_parent_son($table_pa,$table_son,$id_pa,$id_son,$id))
    //     {
    //         $list_pro=array();
    //         $query="SELECT * `{$table_pa}` JOIN `{$table_son}` ON {$table_pa}.{$id_pa}= {$table_son}.{$id_son} WHERE `{$id_pa}`='{$id}'";
    //         $list_pro=db_fetch_array($query);
    //         return $list_pro;
    //     }
    //     return false;
    // }

    //Lấy danh sách nổi bật là 10 sản phẩm đắt nhất
    // function get_list_product_highlight()
    // {
    //     $list_pro=array();
    //     $query="SELECT *  FROM `tbl_products` ORDER by `price` ASC LIMIT 0,10";
    // $list_pro=db_fetch_array($query);
    // return $list_pro;
    // }
    //Lấy danh sách 10 sản phẩm bán chạy nhất 
    // function get_list_product_sold()
    // {
    //     $list_pro=array();
    //     $query="SELECT pro.id,pro.name,pro.price,pro.old_price,pro.image_link,cart.id as cat_id FROM `tbl_products` as pro,`tbl_catalogs` as ca,`tbl_list_cats` as cart where pro.catalog_id=ca.id and ca.cat_id=cart.id ORDER by pro.`num_of_sold_pro` ASC LIMIT 0,10";
    // $list_pro=db_fetch_array($query);
    // return $list_pro;
    // }
    
 
?>
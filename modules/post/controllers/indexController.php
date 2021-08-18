<?php 
    function construct()
    {
        load_model('index');
    }
    function detailAction()
    {
        $adv=get_list_status('tbl_adv');
        $data['adv']=$adv;
        
        $list_pro_sold=get_list_product_sold();
        $data['list_pro_sold']=$list_pro_sold;
        
        load_view('detail',$data);
    }
    function indexAction()
    {
        
       // $list_cat=get_list('tbl_list_cats');
        $adv=get_list_status('tbl_adv');
        $list_blog=get_list('tbl_blog');
        $list_pro_sold=get_list_product_sold();

        
       // $data['list_cat']=$list_cat;
       $data['list_pro_sold']=$list_pro_sold;
       $data['list_blog']=$list_blog;
        $data['adv']=$adv;
        load_view('index',$data);
    }
    
?>
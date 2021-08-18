<?php 
    function construct()
    {
        load_model('index');
    }
    function detailAction()
    {
        $adv=get_list_status('tbl_adv');
        $data['adv']=$adv;
        
        $list_cat=get_list('tbl_list_cats');
        $data['list_cat']=$list_cat;
        load_view('detail',$data);
    }
    function indexAction()
    {
        
        $list_cat=get_list('tbl_list_cats');
        $adv=get_list_status('tbl_adv');



        
        $data['list_cat']=$list_cat;
        $data['adv']=$adv;
        load_view('index',$data);
    }
    
?>
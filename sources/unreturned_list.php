<?php
require_once("inc_base.php");
require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
require_once("inc_smarty.php");
readdata();
$smarty->assign('not_returned',$not_returned);
$smarty->assign('page',$page);
$smarty->assign('page_max',$page_max);
$smarty->assign('limit_page',$limit_page);
$smarty->assign('limit',$limit);
$smarty->assign('max',$max);
$smarty->assign('from',$from);
if(isset($_GET['page'])){
        $now_page = $_GET['page'];    
}
$smarty->assign('now_page',$now_page);
$smarty->assign('count',$now_page);
//データ抽出
function readdata(){
    $obj = new crental();
    $rows;
    global $from;
    global $limit;
    global $max;
    $count;
    $search_text;
    $flag;
    global $page;
    global $page_max;
    global $now_page;
    global $not_returned;
    global $limit_page;
    $count = 0;
    $from = 0;
    $limit = 2;
    //ページ送りがクリックされた場合
    if(isset($_GET['page'])){
        //現在の抽出条件の何番目からを表示するか指定
        $from = ($_GET['page']-1)*$limit;
    }
     if(isset($_GET['limit'])){
        //現在の抽出条件の何番目からを表示するか指定
        $from = 0;
        $limit = 1000000;
    }
    $not_returned = array();
    $rows = $obj->get_all_info(false,$from,$limit);
    $max  = $obj->get_all_count(false);
    
    
    $page_max = ceil($max/$limit);
    $page = 1;
    $now_page = 1;

     if($page_max<5){
        $limit_page = $page_max;
    }
    else{
        $limit_page = 5;
    }

    foreach($rows as $value){
        $not_returned[] = $value;
    }

}
$smarty->display('unreturned_list.tmpl');
?>
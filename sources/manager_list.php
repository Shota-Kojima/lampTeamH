<?php
session_start();
require_once("inc_base.php");
require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
require_once("inc_smarty.php");
if(!isset($_POST['search_text'])&&!isset($_POST['page'])){
	unset($_SESSION['HTeam']['search_text5']);
}
if(isset($_POST['admin'])){
    deletedata1();
}

readdata();
$smarty->assign('admin_list',$admin_list);
$smarty->assign('page',$page);
$smarty->assign('page_max',$page_max);
$smarty->assign('limit_page',$limit_page);

if(isset($_GET['page'])){
        $now_page = $_GET['page'];    
}
$smarty->assign('now_page',$now_page);
$smarty->assign('count',$now_page);
$smarty->assign('limit',$limit);
$smarty->assign('max',$max);
$smarty->assign('from',$from);
//データ抽出
function readdata(){
    $obj = new cadmin();
    $rows;
    global $from;
    global $limit;
    global $max;
    $count1;
    $search_text;
    $flag;
    global $page;
    global $page_max;
    global $now_page;
    global $admin_list;
    global $limit_page;
    $count = 0;
    $from = 0;
    $limit = 3;
    if(isset($_POST['search_text'])){
         $search_text = $_POST['search_text'];
         $_SESSION['HTeam']['search_text5'] = $search_text;
    }
    else if(isset($_SESSION['HTeam']['search_text5'])){
         $search_text = $_SESSION['HTeam']['search_text5'];
    }
    //ページ送りがクリックされた場合
	if(isset($_GET['page'])){
        //現在の抽出条件の何番目からを表示するか指定
        $from1 = ($_GET['page']-1)*$limit1;
    }
    if(isset($_GET['limit'])){
        //現在の抽出条件の何番目からを表示するか指定
        $from1 = 0;
        $limit1 = 1000000;
    }
    $replyed = array();
    $not_reply = array();
    if(isset($_POST['search_text'])||isset($_SESSION['HTeam']['search_text5'])){
         $search_text = '%'.$search_text.'%';
         $flag = "admin_name like '$search_text'";
         $rows = $obj->get_all_admin(false,$flag,$from,$limit);
         $max = $obj->get_tgt_count(false,$flag);
    }
    else{
         $flag = "1";
         $rows = $obj->get_all_reply(false,$flag1,$from1,$limit1);
         $max = $obj->get_tgt_count(false,$flag1);
    }
   
    $page_max1 = ceil($max1/$limit1);
    $page_max2 = ceil($max2/$limit2);
    $page1 = 1;
    $page2 = 1;
    $now_page1 = 1;
    $now_page2 = 1;
    if($page_max1<5){
        $limit_page1 = $page_max1;
    }
    else{
        $limit_page1 = 5;
    }
     if($page_max2<5){
        $limit_page2 = $page_max2;
    }
    else{
        $limit_page2 = 5;
    }
      
}
//データ削除
function deletedata1(){
    $chenge = new cchange_ex();
    $con1;
    $con1 = $_POST['con1'];
    foreach($con1 as $value){
        $chenge->delete("contact","contact_id=" . $value);
    }
}
function deletedata2(){
    $chenge = new cchange_ex();
    $con2;
    $con2 = $_POST['con2'];
    foreach($con2 as $value){
        $chenge->delete("contact","contact_id=" . $value);
    }
	
}
$smarty->display('contact_list.tmpl');
?>
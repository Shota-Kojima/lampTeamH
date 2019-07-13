<?php
require_once("inc_base.php");
require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
require_once("inc_smarty.php");
if(isset($_POST['con1'])){
    deletedata1();
}
if(isset($_POST['con2'])){
    deletedata2();
}
readdata();
$smarty->assign('contact_replyed',$replyed);
$smarty->assign('contact_not_reply',$not_reply);
$smarty->assign('page1',$page1);
$smarty->assign('page_max1',$page_max1);
$smarty->assign('limit_page1',$limit_page1);
$smarty->assign('page2',$page2);
$smarty->assign('page_max2',$page_max2);
$smarty->assign('limit_page2',$limit_page2);
if(isset($_GET['page1'])){
        $now_page1 = $_GET['page1'];    
}
if(isset($_GET['page2'])){
        $now_page2 = $_GET['page2'];    
}
$smarty->assign('now_page1',$now_page1);
$smarty->assign('count1',$now_page1);
$smarty->assign('now_page2',$now_page2);
$smarty->assign('count2',$now_page2);
//データ抽出
function readdata(){
    $obj = new ccontact();
    $rows1;
    $rows2;
    $from1;
    $limit1;
    $max1;
    $from2;
    $limit2;
    $max2;
    $count1;
    $count2;
    $search_text1;
    $search_text2;
    $flag1;
    $flag2;
    global $page1;
    global $page_max1;
    global $now_page1;
    global $page2;
    global $page_max2;
    global $now_page2;
    global $replyed;
    global $not_reply;
    global $limit_page1;
    global $limit_page2;
    $count1 = 0;
    $count2 = 0;
    $from1 = 0;
    $limit1 = 3;
    $from2 = 0;
    $limit2 = 3;
    if(isset($_POST['search_text1'])){
         $search_text1 = $_POST['search_text1'];
    }
    if(isset($_POST['search_text2'])){
         $search_text2 = $_POST['search_text2'];
    }
    //ページ送りがクリックされた場合
	if(isset($_GET['page1'])){
        //現在の抽出条件の何番目からを表示するか指定
        $from1 = ($_GET['page1']-1)*$limit1;
    }
    if(isset($_GET['page2'])){
        //現在の抽出条件の何番目からを表示するか指定
        $from2 = ($_GET['page2']-1)*$limit2;
    }
    if(isset($_GET['limit1'])){
        //現在の抽出条件の何番目からを表示するか指定
        $from1 = 0;
        $limit1 = 10000;
    }
     if(isset($_GET['limit2'])){
        //現在の抽出条件の何番目からを表示するか指定
        $from2 = 0;
        $limit2 = 10000;
    }
    $replyed = array();
    $not_reply = array();
    if(isset($_POST['search_text1'])){
         $search_text1 = '%'.$search_text1.'%';
         $flag1 = "reply_flag = 0 and contact_text like '$search_text1'";
         $rows1 = $obj->get_all_reply(false,$flag1,$from1,$limit1);
         $max1 = $obj->get_tgt_count(false,$flag1);
    }
    else{
         $flag1 = "reply_flag = 0";
         $rows1 = $obj->get_all_reply(false,$flag1,$from1,$limit1);
         $max1 = $obj->get_tgt_count(false,$flag1);
    }
    if(isset($_POST['search_text2'])){
         $search_text2 = '%'.$search_text2.'%';
         $flag2 = "reply_flag = 1 and contact_text like '$search_text2'";
         $rows2 = $obj->get_all_reply(false,$flag2,$from2,$limit2);
         $max2 = $obj->get_tgt_count(false,$flag2);
    }
    else{
         $flag2 = "reply_flag = 1";
         $rows2 = $obj->get_all_reply(false,$flag2,$from2,$limit2);
         $max2 = $obj->get_tgt_count(false,$flag2);
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
      
    foreach($rows1 as $value){
            $replyed[] = $value;
            if(strlen($value['contact_text'])>25){
                 $replyed[$count1]['contact_text'] = mb_substr($value['contact_text'],0,25);
                 $replyed[$count1]['contact_text'] =  $replyed[$count1]['contact_text']."...";
            }
           $count1++;
    }
   
     foreach($rows2 as $value){
       
             $not_reply[] = $value;
              if(strlen($value['contact_text'])>25){
                 $not_reply[$count2]['contact_text'] = mb_substr($value['contact_text'],0,25);
                 $not_reply[$count2]['contact_text'] =  $not_reply[$count2]['contact_text']."...";
             }
             $count2++;
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
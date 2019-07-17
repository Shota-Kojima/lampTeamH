<?php
require_once("inc_base.php");
require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
require_once("inc_smarty.php");
require_once($CMS_COMMON_INCLUDE_DIR . "auth_user.php"); 
if(!isset($_POST['search_text1'])&&!isset($_POST['page1'])){
	unset($_SESSION['HTeam']['search_text3']);
}
if(!isset($_POST['search_text2'])&&!isset($_POST['page2'])){
	unset($_SESSION['HTeam']['search_text4']);
}
// $smarty->assign('session',$_SESSION); 
// $smarty->assign('cart',$_SESSION);
//管理者IDに変更予定
function readdata(){
    $obj = new creview();
    $rows1;
    $rows2;
    global $from1;
    global $limit1;
    global $max1;
    global $from2;
    global $limit2;
    global $max2;
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
    global $flag_command1;
    global $flag_command2;
    if(isset($_POST['search-radio1'])){
        $flag_command1 = $_POST['search-radio1'];
    }
    if(isset($_POST['search-radio2'])){
        $flag_command2 = $_POST['search-radio2'];
    }

    $count1 = 0;
    $count2 = 0;
    $from1 = 0;
    $limit1 = 3;
    $from2 = 0;
    $limit2 = 3;
    if(isset($_POST['search_text1'])){
         $search_text1 = $_POST['search_text1'];
         $_SESSION['HTeam']['search_text3'] = $search_text1;
    }
    else if(isset($_SESSION['HTeam']['search_text3'])){
         $search_text1 = $_SESSION['HTeam']['search_text3'];
    }
    if(isset($_POST['search_text2'])){
         $search_text2 = $_POST['search_text2'];
         $_SESSION['HTeam']['search_text4'] = $search_text2;
    }
    else if(isset($_SESSION['HTeam']['search_text4'])){
         $search_text2 = $_SESSION['HTeam']['search_text4'];
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
        $limit1 = 1000000;
    }
     if(isset($_GET['limit2'])){
        //現在の抽出条件の何番目からを表示するか指定
        $from2 = 0;
        $limit2 = 1000000;
    }
    $replyed = array();
    $not_reply = array();
    if(isset($_POST['search_text1'])||isset($_SESSION['HTeam']['search_text3'])){
         $search_text1 = '%'.$search_text1.'%';
         $flag1 = "productH.product_category = 1 and '$flag_command1' like '$search_text1'";
         $rows1 = $obj->get_tgt_category_keyword(false,$flag1,$from1,$limit1);
         $max1 = $obj->get_tgt_category_keyword_count(false,$flag1);
    }
    else{
         $flag1 = "productH.product_category= 1";
         $rows1 = $obj->get_tgt_category_keyword(false,$flag1,$from1,$limit1);
         $max1 = $obj->get_tgt_category_keyword_count(false,$flag1);
    }
    if(isset($_POST['search_text2'])||isset($_SESSION['HTeam']['search_text4'])){
         $search_text2 = '%'.$search_text2.'%';
         $flag2 = "productH.product_category = 2 and '$flag_command2' like '$search_text2'";
         $rows2 = $obj->get_tgt_category_keyword(false,$flag2,$from2,$limit2);
         $max2 = $obj->get_tgt_category_keyword_count(false,$flag2);
    }
    else{
         $flag2 = "productH.product_category = 2";
         $rows2 = $obj->get_tgt_category_keyword(false,$flag2,$from2,$limit2);
         $max2 = $obj->get_tgt_category_keyword_count(false,$flag2);
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
          
    }
   
     foreach($rows2 as $value){
       
             $not_reply[] = $value;
             
    }
    
}
if(isset($_SESSION['HTeam_adm']['customer_id']) && $_SESSION['HTeam_adm']['customer_id'] !== ""){
readdata();


$smarty->assign('view1',$replyed);
$smarty->assign('view2',$not_reply);
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
$smarty->assign('limit1',$limit1);
$smarty->assign('limit2',$limit2);
$smarty->assign('max1',$max1);
$smarty->assign('max2',$max2);
$smarty->assign('from1',$from1);
$smarty->assign('from2',$from2);
//データ抽出

    // $review_obj = new creview();
    // $transInfo_obj = new ctransaction_info();
    // $reviewarr = $review_obj->get_allH(false);
    // $view = array();

    // for($i = 0; $i < count($reviewarr); $i++){

    //     $productarr = $product_obj->get_tgt(false,$reviewarr[$i]['product_id']);

    //         //取得出来たら商品の金額をセッションに格納
    //         if($productarr !== false){
    //             $transarr = $transInfo_obj->get_tgt(false,$reviewarr[$i]['transaction_id']);
    //             $transarr['customer_id'];
    //             $view[$i] = array(
    //                 'product_name'=> (String)$productarr['product_name'],
    //                 'product_id'=> (int)$productarr['product_id'],
    //                 'customer_id'=> (String)$transarr['customer_id'],
    //                 'transaction_id'=> (int)$reviewarr[$i]['transaction_id'],
    //                 'review_tittle'=> (String)$reviewarr[$i]['review_tittle'],
    //                 'review_value'=> (String)$reviewarr[$i]['review_value'],
    //                 'review'=> (String)$reviewarr[$i]['review'],
    //                 'review_date'=> (String)$reviewarr[$i]['review_date'],
    //             );
    //         }else{
    //             // echo '<script type="text/javascript">alert("64のelse");</script>';
    //             //  ステータスコードを出力
                
    //         }
    // }
    // $smarty->assign('view',$view);
}

$smarty->display('admini_review.tmpl');
?>
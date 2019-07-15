<?php
require_once("inc_base.php");
require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
require_once("inc_smarty.php");

if(isset($_GET['transaction_id']) && isset($_GET['product_id']) && 
    isset($_GET['customer_id'])&& isset($_GET['product_name'])){
    $review_obj = new creview();
    $reviewarr = $review_obj->get_tgtH(false,$_GET['transaction_id'],$_GET['product_id']);
    // var_dump($reviewarr);
    $bday = new DateTime($reviewarr['review_date']);
    
    $view = array(
        'product_name'=> $_GET['product_name'],
        'customer_id'=> (String)$_GET['customer_id'],
        'transaction_id'=> (int)$_GET['transaction_id'],
        'review_tittle'=> (String)$reviewarr['review_tittle'],
        'review_value'=> (String)$reviewarr['review_value'],
        'review'=> (String)$reviewarr['review'],
        'review_date'=> $bday->format('Y年m月d日'),
    );
    $smarty->assign('view',$view);
}
$smarty->display('review_details.tmpl');
?>
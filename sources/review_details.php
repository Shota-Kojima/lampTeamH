<?php
require_once("inc_base.php");
require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
require_once("inc_smarty.php");

if(isset($_GET['transaction_id'])&& isset($_GET['product_id'])){
    $review_obj = new creview();
    $reviewarr = $review_obj->get_tgtH(false,$_GET['transaction_id'],$_GET['product_id']);
    $smarty->assign('view',$reviewarr);
}


$smarty->display('review_details.tmpl');
?>
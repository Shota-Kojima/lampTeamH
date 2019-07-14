<?php
require_once("inc_base.php");
require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
require_once("inc_smarty.php");
require_once($CMS_COMMON_INCLUDE_DIR . "auth_user.php"); 
// $smarty->assign('session',$_SESSION); 
// $smarty->assign('cart',$_SESSION);
//管理者IDに変更予定
if(isset($_SESSION['HTeam_adm']['customer_id']) && $_SESSION['HTeam_adm']['customer_id'] !== ""){
    $review_obj = new creview();
    $transInfo_obj = new ctransaction_info();
    $reviewarr = $review_obj->get_allH(false);
    $view = array();

    for($i = 0; $i < count($reviewarr); $i++){

        $productarr = $product_obj->get_tgt(false,$product_id);

            //取得出来たら商品の金額をセッションに格納
            if($productarr !== false){
                $transarr = $transInfo_obj->get_tgt(false,$reviewarr[$i]['transaction_id']);
                $transarr['customer_id'];
                $view[$i] = array(
                    'product_id'=> (int)$productarr['product_id'],
                    'customer_id'=> (int)$transarr['customer_id'],
                    'transaction_id'=> (int)$reviewarr['transaction_id'],
                    'review_tittle'=> (String)$reviewarr['review_tittle'],
                    'review_value'=> (String)$reviewarr['review_value'],
                    'review'=> (String)$reviewarr['review'],
                    'review_date'=> (String)$reviewarr['review_date'],
                );
            }else{
                // echo '<script type="text/javascript">alert("64のelse");</script>';
                //  ステータスコードを出力
                
            }
    }
    $smarty->assign('view',$view);
}

$smarty->display('admini_review.tmpl');
?>
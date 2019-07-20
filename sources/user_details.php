<?php
require_once("inc_base.php");
require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
require_once("inc_smarty.php");
require_once($CMS_COMMON_INCLUDE_DIR . "auth_user.php"); 
$smarty->assign('session',$_SESSION); 
$smarty->assign('cart',$_SESSION);

if(isset($_GET['customer_id'])){
    $assessment_obj = new cassessment();
    $frimaproduct_obj = new cfrima_productH();
    $reviewer = array();
    $products = array();
    //----------------------------------------
    // カスタマーIDで、評価テーブルから全件持ってくる。
    //----------------------------------------
    $asessmentarr = $assessment_obj ->get_alldetail(false,$_GET['customer_id']);
    if(count($asessmentarr) > 0){
        //----------------------------------------
        // 評価テーブルのレビュワーのアイコンなど必要な
        // 情報を取得
        //----------------------------------------
        $reviewIndex = 0;//総合評価数
        $count=0;
        $icon;
        $customer_obj = new ccustomer();
        for($i=0; $i < count($asessmentarr); $i++){
            
            $customerarr = $customer_obj->get_tgt(false,$asessmentarr[$i]['reviewer_id']);

            if(count($customerarr > 0)){
                $reviewIndex += (int)$asessmentarr[$i]['evaluation_index'];
                $bday = new DateTime($asessmentarr[$i]['review_date']);
                //レビュワー配列
                $reviewer[$i]= array(
                    'evaluation_index'=> (int)$asessmentarr[$i]['evaluation_index'],//評価指数
                    'evaluation_state'=>(String)$asessmentarr[$i]['evaluation_state'],//評価文
                    'reviewer_id' => (String)$asessmentarr[$i]['reviewer_id'],//評価を書いたユーザ
                    'review_date'=> $bday->format('Y年m月d日'),//評価を書いた日時
                    'icon_pass'=> (String)$customerarr['icon_pass'] //評価を書いたユーザのアイコン
                );             
            }
        }
        $reviewIndex = $reviewIndex / count($asessmentarr);
        //----------------------------------------
        // カスタマーIDで、フリマの商品全件持ってくる
        //----------------------------------------
        $frimaarr = $frimaproduct_obj ->get_allex(false,$_GET['customer_id']);

        if($frimaarr > 0){
            $customerarr = $customer_obj->get_tgt(false,$_GET['customer_id']);
            for($i=0; $i < count($frimaarr); $i++){
                //出品商品配列
                $bday2 = new DateTime($frimaarr[$i]['exhibistion_date']);
                
                $products[$i]= array(
                    'frima_product_id'=> (int)$frimaarr[$i]['frima_product_id'],//フリマ商品ID
                    'frima_product_name'=>(String)$frimaarr[$i]['frima_product_name'],//フリマ商品名
                    'exhibistion_date' => $bday2->format('Y年m月d日'),//出品日
                    'product_pass'=> explode(',',(String)$frimaarr[$i]["product_pass"]),//フリマ商品名
                    'buy_user' => (String)$frimaarr[$i]['buy_user'],//購入者
                    'end_flg'=> (int)$frimaarr[$i]['end_flg']//取引終了フラグ
                );             
            }
            $icon = (String)$customerarr['icon_pass']; //評価を書いたユーザのアイコン
        }
        
    }
    
    $smarty->assign('customer_id',$_GET['customer_id']);//評価数値
    $smarty->assign('reviewIndex',$reviewIndex);//評価数値
    $smarty->assign('icon',$icon);//アイコン
    $smarty->assign('reviewer',$reviewer);//レビュー者の情報
    $smarty->assign('products',$products);//出品商品
}else{
    // ステータスコードを出力
	http_response_code( 301 ) ;
	// リダイレクト
	header( "Location: ./top.php" ) ;
	exit ;
}





$smarty->display('user_details.tmpl');
?>
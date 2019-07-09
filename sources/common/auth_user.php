<?php
/********************************

auth_user.php

メンバーログイン認証
$_SESSIONは多次元配列にする

2018/7/3 Y.YAMANOI
*********************************/
//ss
session_start();
require_once("inc_smarty.php");
$row = array();
$customer_obj = new ccustomer();
$cart_obj = new ccart();
$product_obj = new cproductH();
// var_dump($_SESSION);
if(isset($_SESSION['HTeam_adm']['customer_id'])&& 
    $_SESSION['HTeam_adm']['customer_id'] !== ''){
        
    //sesionが作られていない時に作成
    if(!isset($_SESSION['HTeam_adm']['customer_email']) && !isset($_SESSION['HTeam_adm']['last_name']) &&
        !isset($_SESSION['HTeam_adm']['last_name_kana']) && !isset($_SESSION['HTeam_adm']['first_name']) &&
        !isset($_SESSION['HTeam_adm']['first_name_kana']) && !isset($_SESSION['HTeam_adm']['postal_code']) &&
        !isset($_SESSION['HTeam_adm']['icon_pass']) && !isset($_SESSION['HTeam_adm']['customer_point']) &&
        !isset($_SESSION['HTeam_adm']['customer_created_date']) && !isset($_SESSION['HTeam_adm']['customer_sex'])){
            
        //------------------------
        //ユーザの情報を取得
        //------------------------
        $customerarr = $customer_obj->get_tgt(false,$_SESSION['HTeam_adm']['customer_id']);
        if($customerarr !== false){
            
            //セッション割り当て
            $_SESSION['HTeam_adm']['customer_email'] = $customerarr['customer_email'];
            $_SESSION['HTeam_adm']['last_name'] = $customerarr['last_name'];
            $_SESSION['HTeam_adm']['last_name_kana'] = $customerarr['last_name_kana'];
            $_SESSION['HTeam_adm']['first_name'] = $customerarr['first_name'];
            $_SESSION['HTeam_adm']['first_name_kana'] = $customerarr['first_name_kana'];
            $_SESSION['HTeam_adm']['postal_code'] = $customerarr['postal_code'];
            $_SESSION['HTeam_adm']['icon_pass'] = $customerarr['icon_pass'];
            $_SESSION['HTeam_adm']['customer_point'] = $customerarr['customer_point'];
            $_SESSION['HTeam_adm']['customer_created_date'] = $customerarr['customer_created_date'];
            $_SESSION['HTeam_adm']['customer_sex'] = $customerarr['customer_sex'];
        }else{
           
        }
    }   
    
    
    //------------------------
    //ユーザのカート情報を取得
    //------------------------
    $cartarr = $cart_obj->get_allH(false,$_SESSION['HTeam_adm']['customer_id']);
    if($cartarr !== false){
        //カート内の合計商品数
        $product_count = 0;
        //カート内の合計金額
        $product_sum = 0;

        for($i = 0; $i < count($cartarr);$i++){
            $countWk=(int)$cartarr[$i]['product_value'];
            //商品数カウント
            $product_count+=$countWk;
            //商品テーブルの処理
            $idWk=(int)$cartarr[$i]['product_id'];
            $product_id = $idWk;
            $productarr = $product_obj->get_tgt(false,$product_id);
            //取得出来たら商品の金額をセッションに格納
            if($productarr !== false){
                $valueWk=(int)$cartarr[$i]['product_value'];
                $priceWk=(int)$productarr["price"];
                $product_sum += $valueWk * $priceWk;
                $_SESSION['HTeam_adm']['product_count'] = (int)$product_count;
                $_SESSION['HTeam_adm']['product_sum'] = (int)$product_sum;
                // $smarty->assign('cart',$_SESSION);
            }else{
                // echo '<script type="text/javascript">alert("64のelse");</script>';
                //  ステータスコードを出力
                
            }
        }
    }else{
        // ステータスコードを出力
        $_SESSION['HTeam_adm']['product_count'] = 0;
        $_SESSION['HTeam_adm']['product_sum'] = 0;
    }
    

}else{
    // ステータスコードを出力
	http_response_code( 301 ) ;
	// リダイレクト
	header( "Location: ./loginH.php" ) ;
	exit ;
}

?>

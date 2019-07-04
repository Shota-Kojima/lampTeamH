<?php
/********************************

auth_user.php

メンバーログイン認証
$_SESSIONは多次元配列にする

             2018/7/3 Y.YAMANOI
*********************************/
session_start();

$row = array();
$customer_obj = new ccustomer();
$cart_obj = new ccart();
if(isset($_SESSION['HTeam_adm']['customer_id'])&& 
    $_SESSION['HTeam_adm']['customer_id'] !== ''){
    //------------------------
    //ユーザの情報を取得
    //------------------------
	$productarr = $product_obj->get_tgt(false,$_SESSION['HTeam_adm']['customer_id']);
	if($productarr !== false){
        //セッション割り当て
        $_SESSION['HTeam_adm']['customer_email'] = $productarr['customer_email'];
        $_SESSION['HTeam_adm']['last_name'] = $productarr['last_name'];
        $_SESSION['HTeam_adm']['last_name_kana'] = $productarr['last_name_kana'];
        $_SESSION['HTeam_adm']['first_name'] = $productarr['first_name'];
        $_SESSION['HTeam_adm']['first_name_kana'] = $productarr['first_name_kana'];
        $_SESSION['HTeam_adm']['postal_code'] = $productarr['postal_code'];
        $_SESSION['HTeam_adm']['icon_pass'] = $productarr['icon_pass'];
        $_SESSION['HTeam_adm']['customer_point'] = $productarr['customer_point'];
        $_SESSION['HTeam_adm']['postal_code'] = $productarr['postal_code'];
        $_SESSION['HTeam_adm']['customer_created_date'] = $productarr['customer_created_date'];
        $_SESSION['HTeam_adm']['customer_sex'] = $productarr['customer_sex'];
        $_SESSION['HTeam_adm']['postal_code'] = $productarr['postal_code'];	
		$smarty->assign('session',$_SESSION);
	}else{
        // ステータスコードを出力
        http_response_code( 301 ) ;
        // リダイレクト
        header( "Location: ./loginH.php" ) ;
        exit ;
    }
    //------------------------
    //ユーザのカート情報を取得
    //------------------------
    $cartarr = $cart_obj->get_allH(false,$_SESSION['HTeam_adm']['customer_id']);
	if($cartarr !== false){
        //カート内の合計商品数
        $product_count;
        //カート内の合計金額
        $product_sum;
        for($i = 0; $i < count($cartarr);$i++){
            //商品数カウント
            $product_count+=$cartarr['product_value'];
            //商品テーブルの処理
            $product_obj = new cproductH();
	        $product_id = $cartarr['product_id'];
            $productarr = $product_obj->get_tgt(false,$product_id);
            //取得出来たら商品の金額をセッションに格納
            if($productarr !== false){
                $product_sum = $cartarr['product_value'] * $productarr["price"];
                $_SESSION['HTeam_adm']['product_count'] = $productarr['product_count'];
                $_SESSION['HTeam_adm']['product_sum'] = $productarr['product_sum'];
                //var_dump($productarr);
                $smarty->assign('session',$_SESSION);
            }else{
                 // ステータスコードを出力
                http_response_code( 301 ) ;
                // リダイレクト
                header( "Location: ./loginH.php" ) ;
                exit ;
            }
        }
	}else{
        // ステータスコードを出力
        http_response_code( 301 ) ;
        // リダイレクト
        header( "Location: ./loginH.php" ) ;
        exit ;
    }

    $row = $customer_obj->get_tgt_login(false,$_SESSION[$CMS_SESSION_USER_BASE_NAME]['member_login']);
    if($row === false 
        || !isset($row['general_user_id'])
        || $row['general_user_id'] != $_SESSION[$CMS_SESSION_USER_BASE_NAME]['general_user_id']){
        //ゲスト
        $_SESSION[$CMS_SESSION_USER_BASE_NAME]['general_user_id'] = 0;
        $_SESSION[$CMS_SESSION_USER_BASE_NAME]['member_login'] = '';
        $_SESSION[$CMS_SESSION_USER_BASE_NAME]['general_user_name'] = 'ゲスト';
    }
}else{
    // ステータスコードを出力
	http_response_code( 301 ) ;
	// リダイレクト
	header( "Location: ./logingH.php" ) ;
	exit ;
}

?>

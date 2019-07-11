<?php
/*!
@file member_list_smarty.php
@brief メンバー一覧(Smarty版)
@copyright Copyright (c) 2017 Yamanoi Yasushi,Shimojima Ryo.
*/

/////////////////////////////////////////////////////////////////
/// 実行ブロック
/////////////////////////////////////////////////////////////////

//ライブラリをインクルード
require_once("inc_base.php");
require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
require_once("inc_smarty.php");
require_once($CMS_COMMON_INCLUDE_DIR . "auth_user.php");
$smarty->assign('session',$_SESSION);
$smarty->assign('cart',$_SESSION);
$show_mode = '';
$ERR_STR = '';

//ページの設定
//デフォルトは1
$page = 1;
//もしページが指定されていたら


if(isset($_GET['product_id']) 
//cutilクラスのメンバ関数をスタティック呼出
	&& cutil::is_number($_GET['product_id'])
	&& $_GET['product_id'] > 0){

	//商品Hクラスを構築
	$product_obj = new cproductH();
	$product_id = $_GET['product_id'];
	$productarr = $product_obj->get_tgt(false,$product_id);
	if($productarr !== false){
		
		$data = $productarr["product_pass"];
		$productarr["product_pass"] = explode(',',$data);
		$smarty->assign('productarr',$productarr);
	}else{
		// ステータスコードを出力
		http_response_code( 301 ) ;
		// リダイレクト
		header( "Location: ./products.php" ) ;
		exit ;
	}
	
}else{
	// ステータスコードを出力
	http_response_code( 301 ) ;
	// リダイレクト
	header( "Location: ./products.php" ) ;
	exit ;
}

/////////////////////////////////////////////////////////////////
/// 関数ブロック
/////////////////////////////////////////////////////////////////



//--------------------------------------------------------------------------------------
/*!
@brief	パラメータのチェック
@return	エラーがあったらfalse
*/
//--------------------------------------------------------------------------------------
function param_chk(){
	 global $ERR_STR;
	if(!isset($_POST['param']) 
	|| !cutil::is_number($_POST['param'])
	|| $_POST['param'] <= 0){
		$ERR_STR .= "パラメータを取得できませんでした\n";
		return false;
	}
	return true;
}



/////////////////////////////////////////////////////////////////
/// 関数呼び出しブロック
/////////////////////////////////////////////////////////////////
$smarty->assign('ERR_STR',$ERR_STR);


//Smartyを使用した表示(テンプレートファイルの指定)
$smarty->display('frimaTrans.tmpl');


?>

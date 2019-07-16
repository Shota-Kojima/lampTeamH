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

//--------------
//購入時
//--------------
if(isset($_POST['buy_count'])&& cutil::is_number($_POST['buy_count'])&& $_POST['buy_count'] > 0 && isset($_POST['product_id'])){

	//購入
	$buy_chk = true;
	regist();

//--------------
//最初のアクセス	
//--------------
}else if(isset($_GET['product_id']) 
//cutilクラスのメンバ関数をスタティック呼出
	&& cutil::is_number($_GET['product_id'])
	&& $_GET['product_id'] > 0){

	//商品Hクラスを構築
	$product_obj = new c();
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
		header( "Location: ./product_list.php" ) ;
		exit ;
	}
	
}else{
	// ステータスコードを出力
	http_response_code( 301 ) ;
	// リダイレクト
	header( "Location: ./product_list.php" ) ;
	exit ;
}

//購入後は、
if($buy_chk){
	//商品Hクラスを構築
	$product_obj = new cproductH();
	$product_id = $_GET['product_id'];
	$productarr = $product_obj->get_tgt(false,$product_id);
	if($productarr !== false){
		
		$data = $productarr["product_pass"];
		$productarr["product_pass"] = explode(',',$data);
		$smarty->assign('productarr',$productarr);
	}
}


//--------------------------------------------------------------------------------------
/*!
@brief	メンバーデータの追加／更新。保存後自分自身を再読み込みする。
@return	なし
*/
//--------------------------------------------------------------------------------------
function regist(){
	global $member_id;
	//ここは$session[customer_id]から取得,
	//無ければログインページにリダイレクト
	// $_POST['customer_id'] = "kojikoji";
	
	$_POST['customer_id'] = $_SESSION['HTeam_adm']['customer_id'];
	$dataarr = array();
	$dataarr['customer_id'] = (string)$_POST['customer_id'];
	$dataarr['product_id'] = (int)$_POST['product_id'];
	$dataarr['product_value'] = (int)$_POST['buy_count'];
    
	$chenge = new cchange_ex();
    $mid = $chenge->insert('cart',$dataarr);
	echo '<script type="text/javascript">alert("カートに入れました(カートIN確認画面に遷移予定)");</script>';
	cutil::redirect_exit("productDetail_smarty.php");
}

/////////////////////////////////////////////////////////////////
/// 関数呼び出しブロック
/////////////////////////////////////////////////////////////////
$smarty->assign('ERR_STR',$ERR_STR);


//Smartyを使用した表示(テンプレートファイルの指定)
$smarty->display('frimaTrans.tmpl');


?>

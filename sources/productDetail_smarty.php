<?php
/*!
@file member_detail_smarty.php
@brief メンバー詳細(Smarty版)
@copyright Copyright (c) 2017 Yamanoi Yasushi,Shimojima Ryo.
*/
session_start();
/////////////////////////////////////////////////////////////////
/// 実行ブロック
/////////////////////////////////////////////////////////////////

//ライブラリをインクルード
require_once("inc_base.php");
require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
require_once("inc_smarty.php");


$product_id = 0;
$err_array = array();
$err_flag = 0;
$page = 0;
$buy_chk = false;

if(isset($_POST['buy_count'])
	//cutilクラスのメンバ関数をスタティック呼出
	&& cutil::is_number($_POST['buy_count'])
	&& $_POST['buy_count'] > 0 && isset($_POST['product_id'])){
	//購入
	$buy_chk = true;
	regist();
	
}else if(isset($_GET['product_id']) 
//cutilクラスのメンバ関数をスタティック呼出
	&& cutil::is_number($_GET['product_id'])
	&& $_GET['product_id'] > 0){

	//商品Hクラスを構築
	$product_obj = new cproductH();
	$product_id = $_GET['product_id'];
	$productarr = $product_obj->get_tgt(false,$product_id);
	if($productarr !== false){
		// echo '<script type="text/javascript">alert("ここか？");</script>';
		//product_passを取得
		$data = $productarr["product_pass"];
		$productarr["product_pass"] = explode(',',$data);
		//var_dump($productarr);
		$smarty->assign('productarr',$productarr);
	}else{

	}
	
}else{
	// ステータスコードを出力
	http_response_code( 301 ) ;
	// リダイレクト
	header( "Location: ./products.php" ) ;
	exit ;
}

//購入後は、
if($buy_chk){
	$product_obj = new cproductH();
	$product_id = $_GET['product_id'];
	$productarr = $product_obj->get_tgt(false,$product_id);
	if($productarr !== false){
		// echo '<script type="text/javascript">alert("ここか？");</script>';
		//product_passを取得
		$data = $productarr["product_pass"];
		$productarr["product_pass"] = explode(',',$data);
		//var_dump($productarr);
		$smarty->assign('productarr',$productarr);
	}else{

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
    echo '<script type="text/javascript">alert("購入しました(購入完了画面に遷移予定)");</script>';
}



/////////////////////////////////////////////////////////////////
/// 関数呼び出しブロック
/////////////////////////////////////////////////////////////////

$smarty->assign('err_array',$err_array);

//Smartyを使用した表示(テンプレートファイルの指定)
$smarty->display('productDetail.tmpl');

?>

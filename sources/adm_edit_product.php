<?php
/*!
@file member_detail_smarty.php
@brief メンバー詳細(Smarty版)
@copyright Copyright (c) 2017 Yamanoi Yasushi,Shimojima Ryo.
*/
// session_start();
/////////////////////////////////////////////////////////////////
/// 実行ブロック
/////////////////////////////////////////////////////////////////

//ライブラリをインクルード
require_once("inc_base.php");
require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
require_once("inc_smarty.php");
require_once($CMS_COMMON_INCLUDE_DIR . "auth_user.php");

$product_id = 0;
$err_array = array();
$err_flag = 0;
$page = 0;
$buy_chk = false;
$filedir1 = "";
$filedir2 = "";
$filedir3 = "";
$imageUrl1 = "";
$imageUrl2 = "";
$imageUrl3 = ""; 
$fulldir = "http://wiz.developluna.jp/~tmH2019/lampTeamH/sources/images/product_img/";

if(isset($_POST['delete'])&&isset($_POST['product_id'])){
    //データ削除

    $chenge = new cchange_ex();
    $chenge->delete("productH","product_id=" . $_POST['product_id']);
    // ステータスコードを出力
	http_response_code( 301 ) ;
	// リダイレクト
	header( "Location: ./adm_product_list.php" ) ;
    exit ;
    
//--------------
//更新　処理	
//--------------
}else if(isset($_POST['update'])&&isset($_POST['product_id'])){
    
    $dataarr = array();
	$dataarr['product_name'] = (string)$_POST['product_name'];
	$dataarr['product_category'] = (int)$_POST['product_category'];
	$dataarr['genre_id'] = (int)$_POST['genre_id'];
    $dataarr['product_text'] = (string)$_POST['product_text'];
    $dataarr['price'] = (int)$_POST['price'];
    $dataarr['stock_value'] = (int)$_POST['stock'];
	
	
	$chenge = new cchange_ex();
	
	$result = $chenge->update('productH',$dataarr,'product_id="' . (int)$_POST['product_id'].'"');
	if(count($result)!== 0){
		
        echo '<script type="text/javascript">alert("変更しました");</script>';
        http_response_code( 301 ) ;
        // リダイレクト
        header( "Location: ./adm_product_list.php?product_id=".$_POST['product_id']) ;
        exit ;
		// cutil::redirect_exit("productDetail_smarty.php");
	}else{
		var_dump("むり");
	}

//--------------
//最初のアクセス	
//--------------
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
		// product_passを取得
		$data = $productarr["product_pass"];
		$productarr["product_pass"] = explode(',',$data);
        $smarty->assign('productarr',$productarr);
        //ジャンル取得してアサイン
        $genre_obj = new cgenre();
        $rows = $genre_obj->get_allH(false);
        $smarty->assign('rows',$rows);
	}else{

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

$smarty->assign('err_array',$err_array);
$smarty->assign('session',$_SESSION);
$smarty->assign('cart',$_SESSION);
//Smartyを使用した表示(テンプレートファイルの指定)
$smarty->display('adm_edit_product.tmpl');

?>

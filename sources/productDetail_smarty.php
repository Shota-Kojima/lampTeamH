<?php
/*!
@file member_detail_smarty.php
@brief メンバー詳細(Smarty版)
@copyright Copyright (c) 2017 Yamanoi Yasushi,Shimojima Ryo.
*/

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
// if(isset($_GET['page']) 
// 	&& cutil::is_number($_GET['page'])
// 	&& $_GET['page'] > 0){
// 	$page = $_GET['page'];
// }
if(isset($_POST['buy_count'])
	//cutilクラスのメンバ関数をスタティック呼出
	&& cutil::is_number($_POST['buy_count'])
	&& $_POST['buy_count'] > 0 && isset($_POST['product_id'])){
		echo '<script type="text/javascript">alert("iine");</script>';
	//カートクラスを構築
	regist();
	// $cart_obj = new ccart();
	// $product_id = $_POST['product_id'];
	// $dataarr = array();
	// $dataarr['member_id'] = (int)$member_id;
	// $dataarr['fruits_id'] = (int)$val;
	// $chenge->insert('cart',$dataarr);
	
}else if(isset($_GET['product_id']) 
//cutilクラスのメンバ関数をスタティック呼出
	&& cutil::is_number($_GET['product_id'])
	&& $_GET['product_id'] > 0){
		echo '<script type="text/javascript">alert("get");</script>';
	//商品Hクラスを構築
	$product_obj = new cproductH();
	$product_id = $_GET['product_id'];
	$productarr = $product_obj->get_tgt(false,$product_id);
	if($productarr !== false){
		// echo '<script type="text/javascript">alert("'.$productarr[0].'");</script>';

		//product_passを取得
		$data = $productarr["product_pass"];
		$productarr["product_pass"] = explode(',',$data);
		//var_dump($productarr);
		$smarty->assign('productarr',$productarr);
	}else{
		echo '<script type="text/javascript">alert("だめ1");</script>';
	}
	
}else{
	var_dump($_POST);
	//購入時
	
}

//--------------------------------------------------------------------------------------
/*!
@brief	パラメータのチェック
@return	エラーの場合はfalseを返す
*/
//--------------------------------------------------------------------------------------
function paramchk(){
	global $err_array;
	$retflg = true;
	/// メンバー名の存在と空白チェック
	if(ccontentsutil::chkset_err_field($err_array,'member_name','メンバー名','isset_nl')){
		$retflg = false;
	}
	/// メンバーの都道府県チェック
	if(ccontentsutil::chkset_err_field($err_array,'prefecture_id','都道府県','isset_num_range',1,47)){
		$retflg = false;
	}
	/// メンバー住所の存在と空白チェック
	if(ccontentsutil::chkset_err_field($err_array,'member_address','市区郡町村以下','isset_nl')){
		$retflg = false;
	}
	/// メンバーの性別チェック
	if(ccontentsutil::chkset_err_field($err_array,'member_gender','性別','isset_num_range',1,2)){
		$retflg = false;
	}

	return $retflg;
}

//--------------------------------------------------------------------------------------
/*!
@brief	メンバーデータの追加／更新。保存後自分自身を再読み込みする。
@return	なし
*/
//--------------------------------------------------------------------------------------
function regist(){
	global $member_id;
	$_POST['customer_id'] = "kojikoji";
	$dataarr = array();
	$dataarr['customer_id'] = (string)$_POST['customer_id'];
	$dataarr['product_id'] = (int)$_POST['product_id'];
	$dataarr['product_value'] = (int)$_POST['buy_count'];
    
	$chenge = new cchange_ex();
    $mid = $chenge->insert('cart',$dataarr);
    echo '<script type="text/javascript">alert("おｋ");</script>';
}



//--------------------------------------------------------------------------------------
/*!
@brief	ページの出力(一覧に戻るリンク用)
@return	なし
*/
//--------------------------------------------------------------------------------------
function assign_page(){
	//$smartyをグローバル宣言（必須）
	global $smarty;
	global $page;
	$pagestr = '';
	if($page > 0){
		$pagestr =  '?page=' . $page;
	}
	$smarty->assign('page',$pagestr);
}

//--------------------------------------------------------------------------------------
/*!
@brief	メンバーIDのアサイン
@return	なし
*/
//--------------------------------------------------------------------------------------
function assign_member_id(){
	//$smartyをグローバル宣言（必須）
	global $smarty;
	global $member_id;
	$smarty->assign('member_id',$member_id);
}

//--------------------------------------------------------------------------------------
/*!
@brief	メンバーIDのアサイン(新規の場合は「新規」)
@return	なし
*/
//--------------------------------------------------------------------------------------
function assign_member_id_txt(){
	//$smartyをグローバル宣言（必須）
	global $smarty;
	global $member_id;
	if($member_id <= 0){
		$smarty->assign('member_id_txt','新規');
	}
	else{
		$smarty->assign('member_id_txt',$member_id);
	}
}

//--------------------------------------------------------------------------------------
/*!
@brief	都道府県プルダウンのアサイン
@return	なし
*/
//--------------------------------------------------------------------------------------
function assign_prefecture_rows(){
	//$smartyをグローバル宣言（必須）
	global $smarty;
	//都道府県の一覧を取得
	$prefecture_obj = new cprefecture();
	$allcount = $prefecture_obj->get_all_count(false);
	$prefecture_rows = $prefecture_obj->get_all(false,0,$allcount);
    $smarty->assign('prefecture_rows',$prefecture_rows);
}
//--------------------------------------------------------------------------------------
/*!
@brief	好きな果物のアサイン
@return	なし
*/
//--------------------------------------------------------------------------------------
function assign_product_rows(){
	//$smartyをグローバル宣言（必須）
	global $smarty;
	//フルーツの一覧を取得
	$fruits_obj = new cfruits();
	$fruits_rows = $fruits_obj->get_all(false);
	if(!isset($_POST['fruits']))$_POST['fruits'] = array();
	foreach($fruits_rows as $key => $val){
		if(array_search($val['fruits_id'],$_POST['fruits']) !== false){
			$fruits_rows[$key]['check'] = 1;
		}
		else{
			$fruits_rows[$key]['check'] = 0;
		}
	}
	$product_obj = new cproductH();
	$product_rows = $product_obj->get_all(false);
	if(!isset($_POST['fruits']))$_POST['fruits'] = array();
	foreach($fruits_rows as $key => $val){
		if(array_search($val['fruits_id'],$_POST['fruits']) !== false){
			$fruits_rows[$key]['check'] = 1;
		}
		else{
			$fruits_rows[$key]['check'] = 0;
		}
	}
    $smarty->assign('fruits_rows',$fruits_rows);
}


/////////////////////////////////////////////////////////////////
/// 関数呼び出しブロック
/////////////////////////////////////////////////////////////////
// if(!isset($_POST['member_name']))$_POST['member_name'] = '';
// if(!isset($_POST['prefecture_id']))$_POST['prefecture_id'] = 0;
// if(!isset($_POST['member_address']))$_POST['member_address'] = '';
// if(!isset($_POST['member_gender']))$_POST['member_gender'] = 0;
// if(!isset($_POST['member_comment']))$_POST['member_comment'] = '';
// assign_err_flag();
// assign_page();
// assign_member_id();
// assign_member_id_txt();
// assign_prefecture_rows();
// assign_fruits_rows();
$smarty->assign('err_array',$err_array);

//Smartyを使用した表示(テンプレートファイルの指定)
$smarty->display('productDetail.tmpl');

?>

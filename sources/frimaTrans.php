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
$buy_chk = false;

//--------------
//購入終了後[評価時]
//--------------
if(isset($_POST['product_id']) && isset($_POST['hyoka'])){
	// $assess_obj = new cassessment();
	
	$dataarr = array();
	$frima_obj = new cfrima_productH();
	
	$frimaarr = $frima_obj->get_tgt(false,$_POST['product_id']);
	
	$dataarr['customer_id'] = $frimaarr['ex_user'];
	$dataarr['evaluation_index'] = (int)$_POST['evaluation_index'];
	$dataarr['evaluation_state'] = (String)$_POST['evaluation_state'];
	
	$chenge = new cchange_ex();
	$mid = $chenge->insert('assessment',$dataarr);
	
	$dataarr2 = array();
	$dataarr2['end_hlg'] = (int)1;
	$result = $chenge->update('frima_productH',$dataarr2,'frima_product_id="' . (int)$_POST['product_id'].'"');
	if(count($result)!== 0){
		$data = $frimaarr["product_pass"];
		$frimaarr["product_pass"] = explode(',',$data);
		$smarty->assign('frimaarr',$frimaarr);
		echo '<script type="text/javascript">alert("評価しました");</script>';
		// cutil::redirect_exit("productDetail_smarty.php");
	}else{
		var_dump("むり");
	}

//--------------
//購入時
//--------------
}else if(isset($_POST['product_id'])&&isset($_POST['buy'])){
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
	$frima_obj = new cfrima_productH();
	$product_id = $_GET['product_id'];
	$frimaarr = $frima_obj->get_tgt(false,$product_id);
	if($frimaarr !== false){
		//自分が購入者の場合
		if($frimaarr['buy_user'] === $_SESSION['HTeam_adm']['customer_id']){
			$data = $frimaarr["product_pass"];
			$frimaarr["product_pass"] = explode(',',$data);
			$smarty->assign('frimaarr',$frimaarr);
		//自分が出品者の場合
		}else if($frimaarr['ex_user'] === $_SESSION['HTeam_adm']['customer_id']){
			$data = $frimaarr["product_pass"];
			$frimaarr["product_pass"] = explode(',',$data);
			$smarty->assign('frimaarr',$frimaarr);
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
	$frima_obj = new cfrima_productH();
	$product_id = $_GET['product_id'];
	$frimaarr = $frima_obj->get_tgt(false,$product_id);
	if($frimaarr !== false){
		
		$data = $frimaarr["product_pass"];
		$frimaarr["product_pass"] = explode(',',$data);
		$smarty->assign('frimaarr',$frimaarr);
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
	$dataarr['buy_user'] = (string)$_POST['customer_id'];
	$dataarr['buy_flg'] = (int)1;
    
	$chenge = new cchange_ex();
    $result = $chenge->update('frima_productH',$dataarr,'frima_product_id="' . (int)$_POST['product_id'].'"');
	if(count($result)!== 0){
		echo '<script type="text/javascript">alert("購入しました(削除予定)");</script>';
		// cutil::redirect_exit("productDetail_smarty.php");
	}else{
		var_dump("むり");
	}
	
	
}

/////////////////////////////////////////////////////////////////
/// 関数呼び出しブロック
/////////////////////////////////////////////////////////////////
$smarty->assign('ERR_STR',$ERR_STR);


//Smartyを使用した表示(テンプレートファイルの指定)
$smarty->display('frimaTrans.tmpl');


?>

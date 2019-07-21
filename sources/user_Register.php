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


$customer_id = 0;
$err_array = array();
$err_flag = 0;
$registFlg = false;
$page = 0;
$pageCount = 0;
//それぞれのフラグを管理する配列
$flg = array("customer_id"=>false,"customer_email"=>false,
			"last_name"=>false,"last_name_kana"=>false,
			"first_name"=>false,"first_name_kana"=>false,
			"customer_address"=>false,"customer_password"=>false,
			"zip21"=>false,"zip22"=>false,"addr21"=>false
		);

//useIDチェック
if(isset($_POST['customer_id'])){
	global $flg;
	//IDが使われているかどうかチェックする
	$customer_obj = new ccustomer();
	$customer_id = $_POST['customer_id'];
	$customerarr = $customer_obj->get_tgt(false,$customer_id);
	//使われている場合
	if($customerarr !== false){
		flgUpd(false);
		$flg["customer_id"] = true;
		$smarty->assign('flg',$flg);
	}else{
		flgUpd(true);
		$flg["customer_id"] = false;
		$smarty->assign('flg',$flg);
	}
}

// mailAddressチェック
if(isset($_POST['customer_email'])){
	global $flg;
	if (preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $_POST['customer_email'])) {
		$flg["customer_email"] = false;
		$smarty->assign('flg',$flg);
	}else{
		flgUpd(false);
		$flg["customer_email"] = true;
		$smarty->assign('flg',$flg);
	}
}

//性チェック
if(isset($_POST['last_name'])){
	global $flg;
	//20文字超えているかどうかチェックする
	if(count($_POST['last_name']) >= 20){
		flgUpd(false);
		$flg["last_name"] = true;
		$smarty->assign('flg',$flg);
	}else{
		$flg["last_name"] = false;
		$smarty->assign('flg',$flg);
	}
}
//せいチェック
if(isset($_POST['last_name_kana'])){
	global $flg;
	//20文字超えているかどうかチェックする
	if(count($_POST['last_name_kana']) >= 20){
		flgUpd(false);
		$flg["last_name_kana"] = true;
		$smarty->assign('flg',$flg);
	}else{
		$flg["last_name_kana"] = false;
		$smarty->assign('flg',$flg);
	}
}
//名
if(isset($_POST['first_name'])){
	global $flg;
	//20文字超えているかどうかチェックする
	if(count($_POST['first_name']) >= 20){
		flgUpd(false);
		$flg["first_name"] = true;
		$smarty->assign('flg',$flg);
	}else{
		$flg["first_name"] = false;
		$smarty->assign('flg',$flg);
	}
}
//めい
if(isset($_POST['first_name_kana'])){
	global $flg;
	//１０文字超えているかどうかチェックする
	if(count($_POST['first_name_kana']) >= 20){
		flgUpd(false);
		$flg["first_name_kana"] = true;
		$smarty->assign('flg',$flg);
	}else{
		$flg["first_name_kana"] = false;
		$smarty->assign('flg',$flg);
	}
}
//郵便番号１
if(isset($_POST['zip21'])){
	global $flg;
	//１０文字超えているかどうかチェックする
	if(!count($_POST['zip21']) >= 100){
		flgUpd(false);
		$flg["zip21"] = true;
		$smarty->assign('flg',$flg);
	}else{
		$flg["zip21"] = false;
		$smarty->assign('flg',$flg);
	}
}

//住所
if(isset($_POST['zip22'])){
	global $flg;
	//１０文字超えているかどうかチェックする
	if(!count($_POST['zip22']) >= 100){
		flgUpd(false);
		$flg["zip22"] = true;
		$smarty->assign('flg',$flg);
	}else{
		$flg["zip22"] = false;
		$smarty->assign('flg',$flg);
	}
}

//住所
if(isset($_POST['addr21'])){
	global $flg;
	//１０文字超えているかどうかチェックする
	if(!count($_POST['addr21']) >= 100){
		flgUpd(false);
		$flg["addr21"] = true;
		$smarty->assign('flg',$flg);
	}else{
		$flg["addr21"] = false;
		$smarty->assign('flg',$flg);
	}
}

//PASSWORDチェック
if(isset($_POST['customer_password'])&&isset($_POST['customer_password_check'])){
	global $flg;
	//15文字超えているかどうかチェックする
	if(!count($_POST['customer_password']) <= 15){
		//PASSWORDが一致しているときのみ処理
		if($_POST['customer_password'] === $_POST['customer_password_check']){
			$flg["customer_password"] = false;
			$smarty->assign('flg',$flg);
		}else{
			flgUpd(false);
			$flg["customer_password"] = true;
			$smarty->assign('flg',$flg);
		}
	}else{
		flgUpd(false);
		$flg["customer_password"] = false;
		$smarty->assign('flg',$flg);
	}
}


if($registFlg){
	regist();
}else{
	$smarty->assign('POST',$_POST);
}


/////////////////////////////////////////////////////////////////
/// 関数ブロック
/////////////////////////////////////////////////////////////////

function flgUpd($bool){
	global $registFlg;
	$registFlg = $bool;
}




//--------------------------------------------------------------------------------------
/*!
@brief	メンバーデータの追加／更新。保存後自分自身を再読み込みする。
@return	なし
*/
//--------------------------------------------------------------------------------------
function regist(){
	global $customer_id;
	$_POST['customer_point'] = 0;
	$_POST['icon_pass'] = "http://wiz.developluna.jp/~tmH2019/lampTeamH/sources/images/user_icon/user.png";
	$_POST['customer_created_date'] = date('YmdHis');
	$dataarr = array();
	$dataarr['customer_id'] = (string)$_POST['customer_id'];//ID
	$dataarr['customer_email'] = (string)$_POST['customer_email'];//メールアドレス
	$dataarr['last_name'] = (string)$_POST['last_name'];//性
	$dataarr['last_name_kana'] = (string)$_POST['last_name_kana'];//せい
	$dataarr['first_name'] = (string)$_POST['first_name'];//名
	$dataarr['first_name_kana'] = (string)$_POST['first_name_kana'];//めい
	$dataarr['postal_code'] = (string)$_POST['zip21'] + (string)$_POST['zip22'];//住所
	$dataarr['customer_address'] = (string)$_POST['addr21'];//住所
	$dataarr['icon_pass'] = (string)$_POST['icon_pass'];//アイコンの初期画像
	$dataarr['customer_point'] = (int)$_POST['customer_point'];//ポイント = 0
	$dataarr['customer_created_date'] = (string)$_POST['customer_created_date'];//作成日
	$dataarr['customer_password'] = (string)$_POST['customer_password'];//パス
	$dataarr['customer_sex'] = (int)$_POST['sex_error'];//性別
	$chenge = new cchange_ex();
	$mid = $chenge->insert('customer',$dataarr);
	echo '<script type="text/javascript">alert("追加おｋ");</script>';
}


/////////////////////////////////////////////////////////////////
/// 関数呼び出しブロック
/////////////////////////////////////////////////////////////////

$smarty->assign('err_array',$err_array);
$smarty->assign('flg',$flg);
$smarty->display('user_Register.tmpl');
?>



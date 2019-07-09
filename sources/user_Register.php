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
			"customer_address"=>false,"customer_password"=>false
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
//住所
if(isset($_POST['customer_address'])){
	global $flg;
	//１０文字超えているかどうかチェックする
	if(!count($_POST['customer_address']) >= 20){
		flgUpd(false);
		$flg["customer_address"] = true;
		$smarty->assign('flg',$flg);
	}else{
		$flg["customer_address"] = false;
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
@brief	エラー存在のアサイン
@return	なし
*/
//--------------------------------------------------------------------------------------
function assign_err_flag(){
	//$smartyをグローバル宣言（必須）
	global $smarty;
	global $err_flag;
	$str = '';
	switch($err_flag){
		case 1:
		$str =<<<END_BLOCK

<p class="red">入力エラーがあります。各項目のエラーを確認してください。</p>
END_BLOCK;
		break;
		case 2:
		$str =<<<END_BLOCK

<p class="red">更新に失敗しました。サポートを確認下さい。</p>
END_BLOCK;
		break;
	}
	$smarty->assign('err_flag',$str);
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
	global $customer_id;
	$_POST['customer_point'] = 0;
	$_POST['icon_pass'] = "images/user.png";
	$_POST['customer_created_date'] = date('YmdHis');
	$dataarr = array();
	$dataarr['customer_id'] = (string)$_POST['customer_id'];//ID
	$dataarr['customer_email'] = (string)$_POST['customer_email'];//メールアドレス
	$dataarr['last_name'] = (string)$_POST['last_name'];//性
	$dataarr['last_name_kana'] = (string)$_POST['last_name_kana'];//せい
	$dataarr['first_name'] = (string)$_POST['first_name'];//名
	$dataarr['first_name_kana'] = (string)$_POST['first_name_kana'];//めい
	$dataarr['customer_address'] = (string)$_POST['customer_address'];//住所
	$dataarr['icon_pass'] = (string)$_POST['icon_pass'];//アイコンの初期画像
	$dataarr['customer_point'] = (int)$_POST['customer_point'];//ポイント = 0
	$dataarr['customer_created_date'] = (string)$_POST['customer_created_date'];//作成日
	$dataarr['customer_password'] = (string)$_POST['customer_password'];//パス
	$dataarr['customer_sex'] = (int)$_POST['customer_sex'];//性別
	$chenge = new cchange_ex();

	$mid = $chenge->insert('customer',$dataarr);
	echo '<script type="text/javascript">alert("追加おｋ");</script>';
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
@brief	フルーツデータの追加／更新
@return	なし
*/
//--------------------------------------------------------------------------------------
function regist_customer($customer_id){
	$chenge = new cchange_ex();
	$chenge->delete("customer","customer_id=" . $customer_id);
	foreach($_POST['fruits'] as $key => $val){
		$dataarr = array();
		$dataarr['customer_id'] = (String)$customer_id;
		$chenge->insert('customer',$dataarr);
	}
}

/////////////////////////////////////////////////////////////////
/// 関数呼び出しブロック
/////////////////////////////////////////////////////////////////

$smarty->assign('err_array',$err_array);
$smarty->assign('flg',$flg);
$smarty->display('user_Register.tmpl');
?>



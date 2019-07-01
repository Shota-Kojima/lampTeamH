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
//それぞれのフラグを管理する配列
$flg = array("customer_id"=>false,"customer_email"=>false,
			"last_name"=>false,"last_name_kana"=>false,
			"first_name"=>false,"first_name_kana"=>false,
			"customer_address"=>false,"customer_password"=>false
		);

//useIDチェック
if(isset($_POST['customer_id'])){
	//IDが使われているかどうかチェックする
	$customer_obj = new ccustomer();
	$customer_id = $_POST['customer_id'];
	$customerarr = $customer_obj->get_tgt(false,$customer_id);
	//使われている場合
	if($productarr !== false){
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
	if (!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $_POST['email'])) {
		flgUpd(false);
		$flg["customer_email"] = true;
		$smarty->assign('flg',$flg);
	}else{
		$flg["customer_email"] = false;
		$smarty->assign('flg',$flg);
	}
}

//性チェック
if(isset($_POST['last_name'])){
	//１０文字超えているかどうかチェックする
	if(count($_POST['last_name']) <= 10){
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
	//１０文字超えているかどうかチェックする
	if(count($_POST['last_name_kana']) <= 10){
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
	//１０文字超えているかどうかチェックする
	if(count($_POST['first_name']) <= 10){
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
	//１０文字超えているかどうかチェックする
	if(count($_POST['first_name_kana']) <= 10){
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
	//１０文字超えているかどうかチェックする
	if(!count($_POST['address']) <= 10){
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
	//１０文字超えているかどうかチェックする
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
}

// if(isset($_GET['product_id']) 
// //cutilクラスのメンバ関数をスタティック呼出
// 	&& cutil::is_number($_GET['product_id'])
// 	&& $_GET['product_id'] > 0){
// 	//商品Hクラスを構築
// 	$product_obj = new cproductH();
// 	$product_id = $_GET['product_id'];
// 	$productarr = $product_obj->get_tgt(false,$product_id);
// 	if($productarr !== false){

// 		//product_passを取得
// 		$data = $productarr["product_pass"];
// 		$productarr["product_pass"] = explode(',',$data);
// 		//var_dump($productarr);
// 		$smarty->assign('productarr',$productarr);
// 	}else{
		
// 	}
	
// }else{
// 	//購入時
// 	if(isset($_POST['buy_count']) 
// 	//cutilクラスのメンバ関数をスタティック呼出
// 	&& cutil::is_number($_GET['buy_count'])
// 	&& $_GET['buy_count'] > 0){
// 	//商品Hクラスを構築
// 		$product_obj = new cproductH();
// 		$product_id = $_GET['product_id'];
// 		$productarr = $product_obj->get_tgt(false,$product_id);
// 		if($productarr !== false){
// 			// echo '<script type="text/javascript">alert("'.$productarr[0].'");</script>';

// 			//product_passを取得
// 			$data = $productarr["product_pass"];
// 			$productarr["product_pass"] = explode(',',$data);
// 			//var_dump($productarr);
// 			$smarty->assign('productarr',$productarr);
// 		}else{
// 			$smarty->display('user_Register.tmpl');
// 		}
	
// 	}else{

// 	}
// }
// //$_POST優先
// if(isset($_POST['member_id']) 
// //cutilクラスのメンバ関数をスタティック呼出
// 	&& cutil::is_number($_POST['member_id'])
// 	&& $_POST['member_id'] > 0){
// 	$member_id = $_POST['member_id'];
// }



//配列にメンバーを$_POSTに取り出す
//すでにPOSTされていたら、DBからは取り出さない

// if(isset($_POST['func'])){
// 	switch($_POST['func']){
// 		case 'set':
// 			if(!paramchk()){
// 				$_POST['func'] = 'edit';
// 				$err_flag = 1;
// 			}
// 			else{
// 				regist();
// 				//regist()内でリダイレクトするので
// 				//ここまで実行されればリダイレクト失敗
// 				$_POST['func'] = 'edit';
// 				//システムに問題のあるエラー
// 				$err_flag = 2;
// 			}
// 		case 'conf':
// 			if(!paramchk()){
// 				$_POST['func'] = 'edit';
// 				$err_flag = 1;
// 			}
// 		break;
// 		case 'edit':
// 			//戻るボタン。
// 		break;
// 		default:
// 			//通常はありえない
// 			echo '原因不明のエラーです。';
// 			exit;
// 		break;
// 	}
// }
// else{
// 	if($member_id > 0){
// 		if(($_POST = $member_obj->get_tgt(false,$member_id)) === false){
// 			$_POST['func'] = 'new';
// 		}
// 		else{
// 			$_POST['fruits'] = $member_obj->get_all_fruits_match(false,$member_id);
// 			$_POST['func'] = 'edit';
// 		}
// 	}
// 	else{
// 		//新規の入力フォーム
// 		$_POST['func'] = 'new';
// 	}
// }

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
	echo '<script type="text/javascript">alert("regist呼べました");</script>';
	global $customer_id;
	$_POST['point'] = 0;
	$_POST['icon_pass'] = "";
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
	if($customer_id > 0){
		$chenge->update('customer',$dataarr,'customer_id=' . $customer_id);
		regist_fruits($customer_id);
		cutil::redirect_exit($_SERVER['PHP_SELF'] . '?mid=' . $customer_id);
	}
	else{
		$mid = $chenge->insert('customer',$dataarr);
		regist_fruits($mid);
		cutil::redirect_exit($_SERVER['PHP_SELF'] . '?mid=' . $mid);
	}
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
// function assign_member_id_txt(){
// 	//$smartyをグローバル宣言（必須）
// 	global $smarty;
// 	global $member_id;
// 	if($member_id <= 0){
// 		$smarty->assign('member_id_txt','新規');
// 	}
// 	else{
// 		$smarty->assign('member_id_txt',$member_id);
// 	}
// }

//--------------------------------------------------------------------------------------
/*!
@brief	都道府県プルダウンのアサイン
@return	なし
*/
//--------------------------------------------------------------------------------------
// function assign_prefecture_rows(){
// 	//$smartyをグローバル宣言（必須）
// 	global $smarty;
// 	//都道府県の一覧を取得
// 	$prefecture_obj = new cprefecture();
// 	$allcount = $prefecture_obj->get_all_count(false);
// 	$prefecture_rows = $prefecture_obj->get_all(false,0,$allcount);
//     $smarty->assign('prefecture_rows',$prefecture_rows);
// }
//--------------------------------------------------------------------------------------
/*!
@brief	好きな果物のアサイン
@return	なし
*/
//--------------------------------------------------------------------------------------
// function assign_product_rows(){
// 	//$smartyをグローバル宣言（必須）
// 	global $smarty;
// 	//フルーツの一覧を取得
// 	$fruits_obj = new cfruits();
// 	$fruits_rows = $fruits_obj->get_all(false);
// 	if(!isset($_POST['fruits']))$_POST['fruits'] = array();
// 	foreach($fruits_rows as $key => $val){
// 		if(array_search($val['fruits_id'],$_POST['fruits']) !== false){
// 			$fruits_rows[$key]['check'] = 1;
// 		}
// 		else{
// 			$fruits_rows[$key]['check'] = 0;
// 		}
// 	}
// 	$product_obj = new cproductH();
// 	$product_rows = $product_obj->get_all(false);
// 	if(!isset($_POST['fruits']))$_POST['fruits'] = array();
// 	foreach($fruits_rows as $key => $val){
// 		if(array_search($val['fruits_id'],$_POST['fruits']) !== false){
// 			$fruits_rows[$key]['check'] = 1;
// 		}
// 		else{
// 			$fruits_rows[$key]['check'] = 0;
// 		}
// 	}
//     $smarty->assign('fruits_rows',$fruits_rows);
// }


/////////////////////////////////////////////////////////////////
/// 関数呼び出しブロック
/////////////////////////////////////////////////////////////////

$smarty->assign('err_array',$err_array);
$smarty->assign('flg',$flg);
$smarty->display('user_Register.tmpl');
?>



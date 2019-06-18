<?php
/*!
<?php
/*!
@file product_detail.php
@brief 商品詳細
@copyright Copyright (c) 2017 Yamanoi Yasushi,Shimojima Ryo.
*/

/////////////////////////////////////////////////////////////////
/// 実行ブロック
/////////////////////////////////////////////////////////////////

//ライブラリをインクルード
require_once("inc_base.php");
//ライブラリをインクルード
require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");


$product_id = 0;
$err_array = array();
$err_flag = 0;

$page = 0;
if(isset($_GET['page']) 
	&& cutil::is_number($_GET['page'])
	&& $_GET['page'] > 0){
	$page = $_GET['page'];
}

if(isset($_GET['pid']) 
//cutilクラスのメンバ関数をスタティック呼出
	&& cutil::is_number($_GET['pid'])
	&& $_GET['pid'] > 0){
	$product_id = $_GET['pid'];
}
//$_POST優先
if(isset($_POST['product_id']) 
//cutilクラスのメンバ関数をスタティック呼出
	&& cutil::is_number($_POST['product_id'])
	&& $_POST['product_id'] > 0){
	$product_id = $_POST['product_id'];
}
//商品クラスを構築
$product_obj = new cproduct();

//配列に商品を$_POSTに取り出す
//すでにPOSTされていたら、DBからは取り出さない
if(isset($_POST['func'])){
	switch($_POST['func']){
		case 'set':
			if(!paramchk()){
				$_POST['func'] = 'edit';
				$err_flag = 1;
			}
			else{
				regist();
				//regist()内でリダイレクトするので
				//ここまで実行されればリダイレクト失敗
				$_POST['func'] = 'edit';
				//システムに問題のあるエラー
				$err_flag = 2;
			}
		case 'conf':
			if(!paramchk()){
				$_POST['func'] = 'edit';
				$err_flag = 1;
			}
		break;
		case 'edit':
			//戻るボタン。
		break;
		default:
			//通常はありえない
			echo '原因不明のエラーです。';
			exit;
		break;
	}
}
else{
	if($product_id > 0){
		
		if(($_POST = $product_obj->get_tgt(false,$product_id)) === false){
			$_POST['func'] = 'new';
		}
		else{
			$_POST['func'] = 'edit';
		}
	}
	else{
		//新規の入力フォーム
		$_POST['func'] = 'new';
	}
}

/////////////////////////////////////////////////////////////////
/// 関数ブロック
/////////////////////////////////////////////////////////////////

//--------------------------------------------------------------------------------------
/*!
@brief	エラー存在の表示
@return	なし
*/
//--------------------------------------------------------------------------------------
function echo_err_flag(){
	global $err_flag;
	switch($err_flag){
		case 1:
		$str =<<<END_BLOCK

<p class="red">入力エラーがあります。各項目のエラーを確認してください。</p>
END_BLOCK;
		echo $str;
		break;
		case 2:
		$str =<<<END_BLOCK

<p class="red">更新に失敗しました。サポートを確認下さい。</p>
END_BLOCK;
		echo $str;
		break;
	}
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
	// 商品名の存在と空白チェック
	//contents_funcのchkset_err_fieldにアクセス
	if(ccontentsutil::chkset_err_field($err_array,'product_name','商品名','isset_nl')){
		$retflg = false;
	}
	//価格の存在と空白チェック
	//contents_funcのchkset_err_fieldにアクセス
	if(ccontentsutil::chkset_err_field($err_array,'product_price','価格','isset_nl')){
		$retflg = false;
	}
	return $retflg;
}
//--------------------------------------------------------------------------------------
/*!
@brief	商品データの追加／更新。保存後自分自身を再読み込みする。
@return	なし
*/
//--------------------------------------------------------------------------------------
function regist(){
	global $product_id;
	$dataarr = array();
    $dataarr['product_name'] = (string)$_POST['product_name'];
    $dataarr['product_price'] = (string)$_POST['product_price'];
	$dataarr['product_info'] = (string)$_POST['product_info'];
	//cchange_exのインスタンス生成
	$chenge = new cchange_ex();
	if($product_id > 0){
		$chenge->update('product',$dataarr,'product_id=' . $product_id);
		cutil::redirect_exit($_SERVER['PHP_SELF'] . '?pid=' . $product_id);
	}
	else{
		$pid = $chenge->insert('product',$dataarr);
		cutil::redirect_exit($_SERVER['PHP_SELF'] . '?pid=' . $pid);
	}
}
//--------------------------------------------------------------------------------------
/*!
@brief	ページの出力(一覧に戻るリンク用)
@return	なし
*/
//--------------------------------------------------------------------------------------
function echo_page(){
	global $page;
	if($page > 0){
		echo '?page=' . $page;
	}
}

//--------------------------------------------------------------------------------------
/*!
@brief	商品IDの出力
@return	なし
*/
//--------------------------------------------------------------------------------------
function echo_product_id(){
	global $product_id;
	echo $product_id;
}

//--------------------------------------------------------------------------------------
/*!
@brief	商品IDの出力(新規の場合は「新規」)
@return	なし
*/
//--------------------------------------------------------------------------------------
function echo_product_id_txt(){
	global $product_id;
	if($product_id <= 0){
		echo '新規';
	}
	else{
		echo $product_id;
	}
}
//--------------------------------------------------------------------------------------
/*!
@brief	商品の出力
@return	なし
*/
//--------------------------------------------------------------------------------------
function echo_product_name(){
	global $err_array;
	if(!isset($_POST['product_name']))$_POST['product_name'] = '';
	//controls.phpのctextboxのインスタンスを生成
	//テキストボックスの生成
	$tgt = new ctextbox('product_name',$_POST['product_name'],'size="70"');
	$tgt->show($_POST['func'] == 'conf');
	if(isset($err_array['product_name'])){
		echo '<br /><span class="red">' 
		. cutil::ret2br($err_array['product_name']) 
		. '</span>';
	}
}

function echo_product_price(){
	global $err_array;
	if(!isset($_POST['product_price']))$_POST['product_price'] = '';
	//controls.phpのctextboxのインスタンスを生成
	//テキストボックスの生成
	$tgt = new ctextbox('product_price',$_POST['product_price'],'size="70"');
	$tgt->show($_POST['func'] == 'conf');
	if(isset($err_array['product_price'])){
		echo '<br /><span class="red">' 
		. cutil::ret2br($err_array['product_price']) 
		. '</span>';
	}
}
function echo_product_info(){
	global $err_array;
	if(!isset($_POST['product_info']))$_POST['product_info'] = '';
	//controls.phpのctextareaのインスタンスを生成
	//テキストエリアの生成
	$tgt = new ctextarea('product_info',$_POST['product_info'],'cols="70" rows="10"');
	$tgt->show($_POST['func'] == 'conf');
}

//--------------------------------------------------------------------------------------
/*!
@brief	操作ボタンの出力
@return	なし
*/
//--------------------------------------------------------------------------------------
function echo_switch(){
	global $product_id;
	//すでに商品が存在していたらこの処理
	if($_POST['func'] == 'conf'){
		$button = '更新';
		//商品idが設定されてなければ
		if($product_id <= 0){
			$button = '追加';
		}

		$str =<<<END_BLOCK
<input type="button"  value="戻る" onClick="javascript:set_func_form('edit','')"/>&nbsp;
<input type="button"  value="{$button}" onClick="javascript:set_func_form('set','')"/>
END_BLOCK;
	}
	//更新、戻る、新規が押されたらこの処理
	else{
		$str =<<<END_BLOCK
<input type="button"  value="確認" onClick="javascript:set_func_form('conf','')"/>
END_BLOCK;
	}
	echo $str;
}

?>
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="css/main.css" rel="stylesheet" type="text/css">
<title>商品詳細</title>
<script type="text/javascript">
<!--
//ボタンが押された時の処理
function set_func_form(fn,pm){
	document.form1.target = "_self";
	document.form1.func.value = fn;
	document.form1.param.value = pm;
	document.form1.submit();
}

// -->
</script>
</head>
<body>
<!-- 全体コンテナ　-->
<div id="container">
<?php require_once("gmenu.php"); ?>
<div id="headTitle">
<h2>商品詳細</h2>
</div>
<!-- コンテンツ　-->
<div id="inquiry">
<?php echo_err_flag(); ?>

<form name="form1" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
<a href="product_list.php<?php echo_page(); ?>">一覧に戻る</a>
<table>
<tr>
<th>ID</th>
<td width="70%"><?php echo_product_id_txt(); ?></td>
</tr>
<tr>
<th>商品名</th>
<td width="70%"><?php echo_product_name(); ?></td>
</tr>
<th>価格</th>
<td width="70%"><?php echo_product_price(); ?></td>
</tr>
<th>商品情報</th>
<td width="70%"><?php echo_product_info(); ?></td>
</tr>
</table>
<input type="hidden" name="func" value="" />
<input type="hidden" name="param" value="" />
<input type="hidden" name="product_id" value="<?php echo_product_id(); ?>" />
<p class="center"><?php echo_switch(); ?></p>
</form>
</div>
<!-- /コンテンツ　-->
</div>
<!-- /全体コンテナ　-->
</body>
</html>

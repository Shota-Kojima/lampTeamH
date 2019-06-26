<?php
/*!
@file product_list.php
@brief 商品一覧
@copyright Copyright (c) 2017 Yamanoi Yasushi,Shimojima Ryo.
*/

/////////////////////////////////////////////////////////////////
/// 実行ブロック
/////////////////////////////////////////////////////////////////

//ライブラリを（一回だけ）インクルード
require_once("inc_base.php");
//ライブラリを（一回だけ）インクルード
require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");

$show_mode = '';
$ERR_STR = '';

//ページの設定
//デフォルトは1
$page = 1;
//もしページが指定されていたら
if(isset($_GET['page']) 
    //なおかつ、数字だったら
    && cutil::is_number($_GET['page'])
    //なおかつ、0より大きかったら
    && $_GET['page'] > 0){
    //パラメータを設定
    $page = $_GET['page'];
}

//1ページのリミット
$limit = 20;
//配列定義
$rows = array();
//コマンドが渡されていたら実行
if(is_func_active()){
	//エラーがなければ実行
	if(param_chk()){
		switch($_POST['func']){
			case "del":
				$show_mode = 'del';
				//削除操作
				deljob();
				//リダイレクトするページの計算
				$re_page = $page;
				//cproductのインスタンス生成
				$obj = new cproduct();
				//cproductのget_all_countに値を渡して返り値をallcountに代入
				//デバッグ文字を出力しないためにfalseを渡す
				$allcount = $obj->get_all_count(false);
				$last_page = (int)($allcount / $limit);
				if($allcount % $limit){
					$last_page++;
				}
				if($re_page > $last_page){
					$re_page = $last_page;
				}
				//再読み込みのためにリダイレクト
				cutil::redirect_exit($_SERVER['PHP_SELF'] 
				. '?page=' . $re_page);
			break;
			default:
			break;
		}
	}
}
$show_mode = 'edit';
//データの読み込み
readdata();

/////////////////////////////////////////////////////////////////
/// 関数ブロック
/////////////////////////////////////////////////////////////////

//--------------------------------------------------------------------------------------
/*!
@brief	コマンドが渡されたかどうか
@return	渡されたらtrue
*/
//--------------------------------------------------------------------------------------
function is_func_active(){
    if(isset($_POST['func']) && $_POST['func'] != ""){
        return true;
    }
    return false;
}


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


//--------------------------------------------------------------------------------------
/*!
@brief	データ読み込み
@return	なし
*/
//--------------------------------------------------------------------------------------
function readdata(){
	global $limit;
	global $rows;
	 global $order;
	global $page;
	//インスタンス生成
	$obj = new cproduct();
	//抽出開始行の指定
	$from = ($page - 1) * $limit;
	//cproductのget_all関数に値を渡して返り値をrowsに代入
	$rows = $obj->get_all(false,$from,$limit);
}

//--------------------------------------------------------------------------------------
/*!
@brief	削除
@return	なし
*/
//--------------------------------------------------------------------------------------
function deljob(){
	//インスタンス生成
	$chenge = new cchange_ex();
	if($_POST['param'] > 0){
		//返り値を代入(cchangeのdeleteで削除するかを判定、実行)
		$chenge->delete("product","product_id=" . $_POST['param']);
	}
}


//--------------------------------------------------------------------------------------
/*!
@brief	ページャーの表示
@return	なし
*/
//--------------------------------------------------------------------------------------
function echo_page_block(){
	global $limit;
	global $page;
	$retstr = '';
	$obj = new cproduct();
	$allcount = $obj->get_all_count(false);
	$ctl = new cpager($_SERVER['PHP_SELF'],$allcount,$limit);
	$ctl->show('page',$page);
}


//--------------------------------------------------------------------------------------
/*!
@brief	一覧の表示
@return	なし
*/
//--------------------------------------------------------------------------------------
function echo_product_list(){
	global $rows;
	global $page;
	$retstr = '';
	$urlparam = '&page=' . $page;
	$rowscount = 1;
	//rows配列の要素が０でなければ処理を行う
	if(count($rows) > 0){
		foreach($rows as $key => $value){
		$javamsg =  '【' . $rows[$key]['product_name'] . '】';
		$nobottom = '';
		if($rowscount == count($rows)){
			$nobottom = ' nobottom';
		}
		//商品データの内容(html)
		$str =<<<END_BLOCK
<tr>
<td width="20%" class="center{$nobottom}">
{$rows[$key]['product_id']}
</td>
<td width="65%" class="center{$nobottom}">
<a href="product_detail.php?pid={$rows[$key]['product_id']}{$urlparam}">{$rows[$key]['product_name']}</a>
</td>
<td width="15%" class="center{$nobottom}">
<input type="button" value="削除確認" onClick="javascript:del_func_form({$rows[$key]['product_id']},'{$javamsg}')" />
</td>
</tr>
END_BLOCK;
		$retstr .= $str;
		$rowscount++;
		}
	}
	else{
		$retstr =<<<END_BLOCK
<tr><td colspan="3" class="nobottom">商品が見つかりません</td></tr>
END_BLOCK;
	}
	//入力済みの商品データの出力
	echo $retstr;
}


//入力したフォームのデータ転送先の指定(?)
function echo_tgt_uri(){
    global $page;
    echo $_SERVER['PHP_SELF'] 
        . '?page=' . $page;
}

?>
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="css/main.css" rel="stylesheet" type="text/css">
<title>商品一覧</title>
<script type="text/javascript">
<!--
function set_func_form(fn,pm){
    document.form1.target = "_self";
    document.form1.func.value = fn;
    document.form1.param.value = pm;
    document.form1.submit();
}
//削除ボタンが押された時の処理
function del_func_form(pm,mess){
    var message = "本当に\r\n";
    message += mess;
    message += "\r\nを削除しますか？";
    if(confirm(message)){
        document.form1.target = "_self";
        document.form1.func.value = 'del';
        document.form1.param.value = pm;
        document.form1.submit();
    }
}
// -->
</script>
</head>
<body>
<!-- 全体コンテナ　-->
<div id="container">
<?php require_once("gmenu.php"); ?>
<div id="headTitle">
<h2>商品一覧</h2>
</div>
<!-- コンテンツ　-->
<div id="inquiry">
<?php echo $ERR_STR; ?>
<form name="form1" action="<?php echo_tgt_uri(); ?>" method="post" >
<p><a href="product_detail.php">新規</a></p>
<p><?php echo_page_block(); ?></p>
<table>
<tr>
<th>商品ID</th>
<th>商品名</th>
<th>操作</th>
</tr>
<?php echo_product_list(); ?>
</table>
<input type="hidden" name="func" value="" />
<input type="hidden" name="param" value="" />
</form>
<p>&nbsp;</p>

</div>
<!-- /コンテンツ　-->
</div>
<!-- /全体コンテナ　-->
</body>
</html>


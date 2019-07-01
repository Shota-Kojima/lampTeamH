<?php
/*!
@file prefecture_list.php
@brief  都道府県一覧(管理画面)
@copyright Copyright (c) 2017 Yamanoi Yasushi.
*/
require_once("inc_base.php");
require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
//smartyクラスの初期化
require_once("inc_smarty.php");

//1ページのリミット
$limit = 12;
$rows = array();
readdata();
$smarty->assign('limit',$limit);
$smarty->assign('products',$rows);

//データの読み込み
function readdata(){
	global $limit;
	global $rows;
	$obj = new cproductH();
	$from = 0;
		$rows = $obj->get_all(false,$from,$limit);
}
//Smartyを使用した表示(テンプレートファイルの指定)
$smarty->display('products.tmpl');

//▲▲▲▲▲▲関数呼び出しブロック▲▲▲▲▲▲

?>
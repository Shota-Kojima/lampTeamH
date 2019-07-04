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
$limit = 100;
$rows = array();
$use_rows = array();
//var_dump($_SESSION['HTeam_adm']['customer_id']);
readdata();
$smarty->assign('limit',$limit);
$smarty->assign('products',$use_rows);
$smarty->assign('limit',$limit);
$smarty->assign('count',$count);

//データの読み込み
function readdata(){
	global $limit;
	global $rows;
	global $use_rows;
	global $tgt_culmn;
	$tgt_culmn = "product_id";
if(isset($_GET['sort_method'])){
	if($_GET['sort_method'] == "aiueo_order"){
		$tgt_culmn = "product_name";
	}
	else if($_GET['sort_method'] == "sales_order"){
		$tgt_culmn = "product_name";
	}
	else if($_GET['sort_method'] == "price_desk_order"){
		$tgt_culmn = "price desc";
	}
	else if($_GET['sort_method'] == "price_ask_order"){
		$tgt_culmn = "price";
	}
}
	$obj = new cproductH();
	$from = 0;
	global $count;
	$count = $obj->get_all_count(false);
	$rows = $obj->get_all_order(false,$from,$limit,$tgt_culmn);
	$use_rows = $rows;
	for($i = 0; $i < $count-1; $i ++) {
		if(strpos($use_rows[$i]['product_pass'],',') !== false){
			$work = explode(",",$use_rows[$i]['product_pass']);
			$use_rows[$i]['product_pass'] = $work[0];
		}
	
	}
}
//Smartyを使用した表示(テンプレートファイルの指定)
$smarty->display('products.tmpl');

//▲▲▲▲▲▲関数呼び出しブロック▲▲▲▲▲▲

?>

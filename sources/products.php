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
require_once($CMS_COMMON_INCLUDE_DIR . "auth_user.php");
if(!isset($_GET['page'])&&!isset($_GET['genre_id'])&&!isset($_GET['sort_method'])){
		unset($_SESSION['HTeam_adm']['genre_id']);
		unset($_SESSION['HTeam_adm']['sort_method']);
}
//1ページのリミット

//デフォルト値
readdata();
// foreach($use_rows as $value){
// var_dump($value['product_name']);
// }
$smarty->assign('products',$use_rows);
$smarty->assign('page',$page);
if(isset($_GET['page'])){
	$smarty->assign('comp',$_GET['page']);
}
else{
	$smarty->assign('comp',0);
}
// echo($_SESSION['HTeam_adm']['product_sum']);
// echo($_SESSION['HTeam_adm']['product_count']);
//$smarty->assign('session',$_GET['page']);
$smarty->assign('cart',$_SESSION);


//データの読み込み
function readdata(){
	global $page;
    global $max;
	global $rows;
	global $use_rows;
	global $tgt_culmn;
	global $conditions;
	global $count;
	global $limit;
	$obj = new cproductH();
	$page = 1;
	$from = 0;
	$limit = 9;
	//デフォルトでの抽出条件はidが0より上のもの＝すべて
	$tgt_culmn = "product_id";
	$conditions = "genre_id >";
	$tgt_genre = "0";
	if(isset($_GET['genre_id'])){
		unset($_SESSION['HTeam_adm']['genre_id']);
		unset($_SESSION['HTeam_adm']['sort_method']);
	}
	// if(isset($_GET['genre_id'])){
	// 	unset($_SESSION['HTeam_adm']['genre_id']);
	// }

	//genre_idが送られてきている(ジャンルタブがクリックされている)場合
	//かつジャンルタブの「すべて」以外がクリックされている場合
	if(isset($_GET['genre_id'])&&($_GET['genre_id']!="0")){
		//抽出条件がクリックされたタブのジャンルのものとなる
		//同時にgenre_idをsessionに保持
		$conditions = "genre_id =";
		$tgt_genre = $_GET['genre_id'];
		$_SESSION['HTeam_adm']['genre_id'] = $tgt_genre;
	}
	//sessionにgenre_idが保持されていた場合
	if(isset($_SESSION['HTeam_adm']['genre_id'])){
		$conditions = "genre_id =";
		//保持されているgenre_idを抽出条件にする
		$tgt_genre = $_SESSION['HTeam_adm']['genre_id'];
	}
	//order byの条件の設定	
	//並べ替えのボタンがクリックされた場合
	if(isset($_GET['sort_method'])){
		//条件別にsessionに保持
		//これはページ送りを行って際に並び替え情報がリセットされないようにするため
		if($_GET['sort_method'] == "aiueo_order"){
			$_SESSION['HTeam_adm']['sort_method'] = "product_name";
		}
		else if($_GET['sort_method'] == "sales_order"){
			$_SESSION['HTeam_adm']['sort_method'] = "product_name";
		}
		else if($_GET['sort_method'] == "price_desk_order"){
			$_SESSION['HTeam_adm']['sort_method'] = "price desc";
		}
		else if($_GET['sort_method'] == "price_ask_order"){
			$_SESSION['HTeam_adm']['sort_method'] = "price";
		}	
		//var_dump($_SESSION['HTeam_adm']['genre_id']);
	}
	if(isset($_SESSION['HTeam_adm']['sort_method'])){
		$tgt_culmn = $_SESSION['HTeam_adm']['sort_method'];
	}
	//ページング処理ゾーンはじまり
	//現在の検索条件での抽出件数を格納
	$max = $obj->get_all_category_genre_count(false,$conditions,$tgt_genre,1);

	//１ページに表示する数を抽出件数が上回っている場合
	if($max>$limit){
		//上回っている回数分だけページを作り出す
		//例）１ページに表示する数が3で抽出件数が10の場合
		//    3ページ作り出す
		$page = ($max/$limit+1)+1;
	}

	//ページ送りがクリックされた場合
	if(isset($_GET['page'])){
		//現在の抽出条件の何番目からを表示するか指定
		//ちなみにlimitが１ページに何枚表示するかを格納する変数
		$from = ($_GET['page']-1)*$limit;
	}
	//ページング処理ゾーンおわり
	//ここまでで指定した抽出条件を送り、値を格納した配列を取得
	$rows = $obj->get_all_order(false,$from,$limit,$conditions,$tgt_genre,$tgt_culmn,1);
	$use_rows = $rows;
	// for($i = 0; $i < $limit; $i ++) {
	// 	if(strpos($use_rows[$i]['product_pass'],',') !== false){
	// 		$work = explode(",",$use_rows[$i]['product_pass']);
	// 		$use_rows[$i]['product_pass'] = $work[0];
	// 	}
	// }
	//指定した画像たちの一番最初だけを抽出
	foreach($use_rows as &$value) {
		if(strpos($value['product_pass'],',') !== false){
	 		$work = explode(",",$value['product_pass']);
			$value['product_pass'] = $work[0];
		}
	}
	

}

//Smartyを使用した表示(テンプレートファイルの指定)
$smarty->display('products.tmpl');

//▲▲▲▲▲▲関数呼び出しブロック▲▲▲▲▲▲

?>

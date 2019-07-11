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


//デフォルト値
readdata();
// foreach($use_rows as $value){
// var_dump($value['product_name']);
// }
$smarty->assign('products1',$category_array1);
$smarty->assign('products2',$category_array2);
$smarty->assign('products3',$category_array3);
$smarty->assign('page1',$page1);
$smarty->assign('page2',$page2);
$smarty->assign('page3',$page3);
if(isset($_GET['page1'])){
	$smarty->assign('comp1',$_GET['page1']);
}
else{
	$smarty->assign('comp1',0);
}

if(isset($_GET['page2'])){
	$smarty->assign('comp2',$_GET['page2']);
}
else{
	$smarty->assign('comp2',0);
}

if(isset($_GET['page3'])){
	$smarty->assign('comp3',$_GET['page3']);
}
else{
	$smarty->assign('comp3',0);
}
// echo($_SESSION['HTeam_adm']['product_sum']);
// echo($_SESSION['HTeam_adm']['product_count']);
//$smarty->assign('session',$_GET['page']);
$smarty->assign('cart',$_SESSION);


//データの読み込み
function readdata(){
	global $category_array1;
	global $category_array2;
	global $category_array3;
	$category_array1 = array();
	$category_array2 = array();
	$category_array3 = array();
	global $page1;
	global $page2;
	global $page3;
	global $max1;
	global $max2;
	global $max3;
	global $rows;
	global $use_rows;
	global $tgt_culmn;
	global $conditions;
	global $count;
	global $limit;
	$obj = new cproductH();
	$page1 = 1;
	$page2 = 1;
	$page3 = 1;
	$from1 = 0;
	$from2 = 0;
	$from3 = 0;
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
	$max1 = $obj->get_all_category_genre_count(false,$conditions,$tgt_genre,1);
	$max2 = $obj->get_all_category_genre_count(false,$conditions,$tgt_genre,2);
	$max3 = $obj->get_all_category_genre_count(false,$conditions,$tgt_genre,3);

	//１ページに表示する数を抽出件数が上回っている場合
	if($max1>$limit){
		//上回っている回数分だけページを作り出す
		//例）１ページに表示する数が3で抽出件数が10の場合
		//    3ページ作り出す
		$page1 = ($max1/$limit+1)+1;
		
	}
	if($max2>$limit){
		//上回っている回数分だけページを作り出す
		//例）１ページに表示する数が3で抽出件数が10の場合
		//    3ページ作り出す
	
		$page2 = ($max2/$limit+1)+1;
	}
	if($max3>$limit){
		//上回っている回数分だけページを作り出す
		//例）１ページに表示する数が3で抽出件数が10の場合
		//    3ページ作り出す
	
		$page3 = ($max3/$limit+1)+1;
	}

	//ページ送りがクリックされた場合
	if(isset($_GET['page1'])){
		//現在の抽出条件の何番目からを表示するか指定
		//ちなみにlimitが１ページに何枚表示するかを格納する変数
		$from1 = ($_GET['page1']-1)*$limit;
	}
	if(isset($_GET['page2'])){
		//現在の抽出条件の何番目からを表示するか指定
		//ちなみにlimitが１ページに何枚表示するかを格納する変数
		$from2= ($_GET['page2']-1)*$limit;
	}
	if(isset($_GET['page3'])){
		//現在の抽出条件の何番目からを表示するか指定
		//ちなみにlimitが１ページに何枚表示するかを格納する変数
		$from3 = ($_GET['page3']-1)*$limit;
	}
	//ページング処理ゾーンおわり
	//ここまでで指定した抽出条件を送り、値を格納した配列を取得
	$tgt_category = 1;
	$category_array1 = $obj->get_all_order(false,$from1,$limit,$conditions,$tgt_genre,$tgt_culmn,$tgt_category);
	$tgt_category = 2;
	$category_array2 = $obj->get_all_order(false,$from2,$limit,$conditions,$tgt_genre,$tgt_culmn,$tgt_category);
	$tgt_category = 3;
	$category_array3 = $obj->get_all_order(false,$from3,$limit,$conditions,$tgt_genre,$tgt_culmn,$tgt_category);
	$use_rows = $rows;
	// for($i = 0; $i < $limit; $i ++) {
	// 	if(strpos($use_rows[$i]['product_pass'],',') !== false){
	// 		$work = explode(",",$use_rows[$i]['product_pass']);
	// 		$use_rows[$i]['product_pass'] = $work[0];
	// 	}
	// }
	//指定した画像たちの一番最初だけを抽出
	foreach($category_array1 as &$value) {
		if(strpos($value['product_pass'],',') !== false){
	 		$work = explode(",",$value['product_pass']);
			$value['product_pass'] = $work[0];
		}
	}
	foreach($category_array2 as &$value) {
		if(strpos($value['product_pass'],',') !== false){
	 		$work = explode(",",$value['product_pass']);
			$value['product_pass'] = $work[0];
		}
	}
	foreach($category_array3 as &$value) {
		if(strpos($value['product_pass'],',') !== false){
	 		$work = explode(",",$value['product_pass']);
			$value['product_pass'] = $work[0];
		}
	}
	//カテゴリ分別
	
}

//Smartyを使用した表示(テンプレートファイルの指定)
$smarty->display('products.tmpl');

//▲▲▲▲▲▲関数呼び出しブロック▲▲▲▲▲▲

?>

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
$smarty->assign('cart',$_SESSION);
if(!isset($_GET['sale_genre_id'])&&!isset($_GET['sale_sort_method'])&&!isset($_GET['sale_page'])&&!isset($_POST['search_sale'])){
	unset($_SESSION['HTeam']['sale_genre_id']);
	unset($_SESSION['HTeam']['sale_sort_method']);
	unset($_SESSION['HTeam']['search_sale']);
}
if(!isset($_GET['rental_genre_id'])&&!isset($_GET['rental_sort_method'])&&!isset($_GET['rental_page'])&&!isset($_POST['search_rental'])){
	unset($_SESSION['HTeam']['rental_genre_id']);
	unset($_SESSION['HTeam']['rental_sort_method']);
	unset($_SESSION['HTeam']['search_rental']);
}
if(!isset($_GET['frima_genre_id'])&&!isset($_GET['frima_sort_method'])&&!isset($_GET['frima_page'])&&!isset($_POST['search_frima'])){
	unset($_SESSION['HTeam']['frima_genre_id']);
	unset($_SESSION['HTeam']['frima_sort_method']);
	unset($_SESSION['HTeam']['search_frima']);
}

$pass_data = array(1 => array('page','count','category','genre','conditions','sort','from','limit','page_count','page_limit','search'),
 				   2 => array('page','count','category','genre','conditions','sort','from','limit','page_count','page_limit','search'),
				   3 => array('page','count','category','genre','conditions','sort','from','limit','page_count','page_limit','search'));

for($i = 0; $i<3; $i++){
	$pass_data[$i]['page'] = 1;
	$pass_data[$i]['category'] = $i+1;
	$pass_data[$i]['genre'] = '0';
	$pass_data[$i]['conditions'] = 'genre_id > '.$pass_data[$i]['genre'];
	$pass_data[$i]['sort'] = 'product_id';
	$pass_data[$i]['from'] = 0;
	$pass_data[$i]['limit'] = 15;
}

if(isset($_GET['sale_genre_id'])){
	$_SESSION['HTeam']['sale_genre_id'] = $_GET['sale_genre_id'];
	$pass_data[0]['genre'] = $_SESSION['HTeam']['sale_genre_id'];
	$pass_data[0]['conditions'] = 'genre_id = '.$pass_data[0]['genre'];
	$_SESSION['HTeam']['sale_sort_method'] = 'product_id';
}
else{
	if(isset($_SESSION['HTeam']['sale_genre_id'])&&isset($_GET['HTeam']['sale_page'])){
		$pass_data[0]['genre'] = $_SESSION['HTeam']['sale_genre_id'];
		$pass_data[0]['conditions'] = 'genre_id = '.$pass_data[0]['genre'];
		$pass_data[0]['page'] = $_GET['HTeam']['sale_page'];
		$pass_data[0]['from'] = $pass_data[0]['page']*$pass_data[0]['limit'] = 15;
    }
}
if(isset($_GET['rental_genre_id'])){
	$_SESSION['HTeam']['rental_genre_id'] = $_GET['rental_genre_id'];
	$pass_data[1]['genre'] = $_SESSION['HTeam']['rental_genre_id'];
	$pass_data[1]['conditions'] = 'genre_id = '.$pass_data[1]['genre'];
	$_SESSION['HTeam']['rental_sort_method'] = 'product_id';
}
else{
	if(isset($_SESSION['HTeam']['rental_genre_id'])&&isset($_GET['HTeam']['rental_page'])){
		$pass_data[1]['genre'] = $_SESSION['HTeam']['rental_genre_id'];
		$pass_data[1]['conditions'] = 'genre_id = '.$pass_data[1]['genre'];
		$pass_data[1]['page'] = $_GET['HTeam']['rental_page'];
		$pass_data[1]['from'] = $pass_data[1]['page']*$pass_data[1]['limit'] = 15;
    } 
}

if(isset($_GET['frima_genre_id'])){
	$_SESSION['HTeam']['frima_genre_id'] = $_GET['frima_genre_id'];
	$pass_data[2]['genre'] = $_SESSION['HTeam']['frima_genre_id'];
	$pass_data[2]['conditions'] = 'genre_id = '.$pass_data[2]['genre'];
	$_SESSION['HTeam']['frima_sort_method'] = 'product_id';
}
else{
	if(isset($_SESSION['HTeam']['frima_genre_id'])&&isset($_GET['HTeam']['sale_page'])){
		$pass_data[2]['genre'] = $_SESSION['HTeam']['frima_genre_id'];
		$pass_data[2]['conditions'] = 'genre_id = '.$pass_data[2]['genre'];
		$pass_data[2]['page'] = $_GET['HTeam']['frima_page'];
		$pass_data[2]['from'] = $pass_data[2]['page']*$pass_data[2]['limit'] = 15;
	}
} 

if(isset($_GET['sale_sort_method'])){
		if(isset($_SESSION['HTeam']['sale_genre_id'])){
			$pass_data[0]['genre'] = $_SESSION['HTeam']['sale_genre_id'];
			$pass_data[0]['conditions'] = 'genre_id = '.$pass_data[0]['genre'];
		}
		//条件別にsessionに保持
		//これはページ送りを行って際に並び替え情報がリセットされないようにするため
		if($_GET['sale_sort_method'] == "aiueo_order"){
			$_SESSION['HTeam']['sale_sort_method'] = "product_name";
		}
		else if($_GET['sale_sort_method'] == "sales_order"){
			$_SESSION['HTeam']['sale_sort_method'] = "product_name";
		}
		else if($_GET['sale_sort_method'] == "price_desk_order"){
			$_SESSION['HTeam']['sale_sort_method'] = "price desc";
		}
		else if($_GET['sale_sort_method'] == "price_ask_order"){
			$_SESSION['HTeam']['sale_sort_method'] = "price";
		}	
		//var_dump($_SESSION['HTeam_adm']['genre_id']);
}
if(isset($_GET['rental_sort_method'])){
		if(isset($_SESSION['HTeam']['rental_genre_id'])){
			$pass_data[1]['genre'] = $_SESSION['HTeam']['rental_genre_id'];
			$pass_data[1]['conditions'] = 'genre_id = '.$pass_data[1]['genre'];
		}
		//条件別にsessionに保持
		//これはページ送りを行って際に並び替え情報がリセットされないようにするため
		if($_GET['rental_sort_method'] == "aiueo_order"){
			$_SESSION['HTeam']['rental_sort_method'] = "product_name";
		}
		else if($_GET['rental_sort_method'] == "sales_order"){
			$_SESSION['HTeam']['rental_sort_method'] = "product_name";
		}
		else if($_GET['rental_sort_method'] == "price_desk_order"){
			$_SESSION['HTeam']['rental_sort_method'] = "price desc";
		}
		else if($_GET['rental_sort_method'] == "price_ask_order"){
			$_SESSION['HTeam']['rental_sort_method'] = "price";
		}	
		//var_dump($_SESSION['HTeam_adm']['genre_id']);
}
if(isset($_GET['frima_sort_method'])){
		if(isset($_SESSION['HTeam']['frima_genre_id'])){
			$pass_data[2]['genre'] = $_SESSION['HTeam']['frima_genre_id'];
			$pass_data[2]['conditions'] = 'genre_id = '.$pass_data[2]['genre'];
		}
		//条件別にsessionに保持
		//これはページ送りを行って際に並び替え情報がリセットされないようにするため
		if($_GET['frima_sort_method'] == "aiueo_order"){
			$_SESSION['HTeam']['frima_sort_method'] = "product_name";
		}
		else if($_GET['frima_sort_method'] == "sales_order"){
			$_SESSION['HTeam']['frima_sort_method'] = "product_name";
		}
		else if($_GET['frima_sort_method'] == "price_desk_order"){
			$_SESSION['HTeam']['frima_sort_method'] = "price desc";
		}
		else if($_GET['frima_sort_method'] == "price_ask_order"){
			$_SESSION['HTeam']['frima_sort_method'] = "price";
		}	
		//var_dump($_SESSION['HTeam_adm']['genre_id']);
}
if(isset($_SESSION['HTeam']['sale_sort_method'])){
		$pass_data[0]['sort'] = $_SESSION['HTeam']['sale_sort_method'];
}
if(isset($_SESSION['HTeam']['rental_sort_method'])){
		$pass_data[1]['sort'] = $_SESSION['HTeam']['rental_sort_method'];
}
if(isset($_SESSION['HTeam']['frima_sort_method'])){
		$pass_data[2]['sort'] = $_SESSION['HTeam']['frima_sort_method'];
}

if(isset($_GET['sale_page'])){
		if(isset($_SESSION['HTeam']['sale_genre_id'])){
			$pass_data[0]['genre'] = $_SESSION['HTeam']['sale_genre_id'];
			$pass_data[0]['conditions'] = 'genre_id = '.$pass_data[0]['genre'];
		}
		$pass_data[0]['page'] = $_GET['sale_page'];
}
if(isset($_GET['rental_page'])){
	    if(isset($_SESSION['HTeam']['rental_genre_id'])){
			$pass_data[1]['genre'] = $_SESSION['HTeam']['rental_genre_id'];
			$pass_data[1]['conditions'] = 'genre_id = '.$pass_data[1]['genre'];
		}
		$pass_data[1]['page'] = $_GET['rental_page'];
}
if(isset($_GET['frima_page'])){
		if(isset($_SESSION['HTeam']['frima_genre_id'])){
			$pass_data[2]['genre'] = $_SESSION['HTeam']['frima_genre_id'];
			$pass_data[2]['conditions'] = 'genre_id = '.$pass_data[2]['genre'];
		}
		$pass_data[2]['page'] = $_GET['frima_page'];
}

	if(isset($_POST['search_sale'])){
		$_SESSION['HTeam']['search_sale'] = $_POST['search_sale'];
		var_dump($_SESSION['HTeam']['search_sale']);
	}
	if(isset($_POST['search_rental'])){
		$_SESSION['HTeam']['search_rental'] = $_POST['search_rental'];
	}
	if(isset($_POST['search_frima'])){
		$_SESSION['HTeam']['search_frima'] = $_POST['search_frima'];
	}

	if(isset($_SESSION['HTeam']['search_sale'])){
		$pass_data[0]['search'] = 'product_name like'."'".'%'.$_SESSION['HTeam']['search_sale'].'%'."'";
		$pass_data[0]['conditions'] = $pass_data[0]['conditions']." and ".$pass_data[0]['search'];
		
	}
	if(isset($_SESSION['HTeam']['search_rental'])){
		$pass_data[1]['search'] = 'product_name like'."'".'%'.$_SESSION['HTeam']['search_rental'].'%'."'";
		$pass_data[1]['conditions'] = $pass_data[1]['conditions']." and ".$pass_data[1]['search'];
	}
	if(isset($_SESSION['HTeam']['search_frima'])){
		$pass_data[2]['search'] = 'product_name like'."'".'%'.$_SESSION['HTeam']['search_frima'].'%'."'";
		$pass_data[2]['conditions'] = $pass_data[2]['conditions']." and ".$pass_data[2]['search'];
	}



readdata();
$smarty->assign('product_sale',$sale_array);
$smarty->assign('product_rental',$rental_array);
$smarty->assign('product_frima',$frima_array);
$smarty->assign('sale_page',$pass_data[0]['page']);
$smarty->assign('rental_page',$pass_data[1]['page']);
$smarty->assign('frima_page',$pass_data[2]['page']);
$smarty->assign('sale_page_count',$pass_data[0]['page_count']);
$smarty->assign('rental_page_count',$pass_data[1]['page_count']);
$smarty->assign('frima_page_count',$pass_data[2]['page_count']);
$smarty->assign('sale_page_limit',$pass_data[0]['page_limit']);
$smarty->assign('rental_page_limit',$pass_data[1]['page_limit']);
$smarty->assign('frima_page_limit',$pass_data[2]['page_limit']);
$smarty->assign('sale_from',$pass_data[0]['from']);
$smarty->assign('rental_from',$pass_data[1]['from']);
$smarty->assign('frima_from',$pass_data[2]['from']);
$smarty->assign('sale_limit',$pass_data[0]['limit']);
$smarty->assign('rental_limit',$pass_data[1]['limit']);
$smarty->assign('frima_limit',$pass_data[2]['limit']);
$smarty->assign('sale_count',$pass_data[0]['count']);
$smarty->assign('rental_count',$pass_data[1]['count']);
$smarty->assign('frima_count',$pass_data[2]['count']);



function readdata(){
	global $pass_data;
	global $sale_array;
	global $rental_array;
	global $frima_array;
	$obj = new cproductH();
	$obj_frima = new cfrima_productH();

	$pass_data[0]['count'] = $obj->get_tgt_category_genre_count(false,$pass_data[0]['conditions'],$pass_data[0]['category']);

	$pass_data[1]['count'] = $obj->get_tgt_category_genre_count(false,$pass_data[1]['conditions'],$pass_data[1]['category']);

	$pass_data[2]['count'] = $obj_frima->get_tgt_category_genre_count(false,$pass_data[2]['conditions'],$pass_data[2]['category']);

	$pass_data[0]['from'] = ($pass_data[0]['page']-1)*$pass_data[0]['limit'];

	$pass_data[1]['from'] = ($pass_data[1]['page']-1)*$pass_data[1]['limit'];

	$pass_data[2]['from'] = ($pass_data[2]['page']-1)*$pass_data[2]['limit'];

	$pass_data[0]['page_count'] = ceil($pass_data[0]['count']/$pass_data[0]['limit']);

	$pass_data[1]['page_count'] = ceil($pass_data[1]['count']/$pass_data[1]['limit']);

	$pass_data[2]['page_count'] = ceil($pass_data[2]['count']/$pass_data[2]['limit']);

	if($pass_data[0]['page_count']<5){
        $pass_data[0]['page_limit'] = $pass_data[0]['page_count'];
    }
    else{
       $pass_data[0]['page_limit'] = 5;
	}
	if($pass_data[1]['page_count']<5){
        $pass_data[1]['page_limit'] = $pass_data[1]['page_count'];
    }
    else{
       $pass_data[1]['page_limit'] = 5;
	}
	if($pass_data[2]['page_count']<5){
        $pass_data[2]['page_limit'] = $pass_data[2]['page_count'];
    }
    else{
       $pass_data[2]['page_limit'] = 5;
	}
	
	$sale_array = $obj->get_tgt_order(false,$pass_data[0]['from'],$pass_data[0]['limit'],$pass_data[0]['conditions'],
									  $pass_data[0]['sort'],$pass_data[0]['category']);

	$rental_array = $obj->get_tgt_order(false,$pass_data[1]['from'],$pass_data[1]['limit'],$pass_data[1]['conditions'],
									    $pass_data[1]['sort'],$pass_data[1]['category']);

	$frima_array = $obj_frima->get_tgt_order(false,$pass_data[2]['from'],$pass_data[2]['limit'],$pass_data[2]['conditions'],
									   $pass_data[2]['sort'],$pass_data[2]['category']);

		foreach($sale_array as &$value) {
			if(strpos($value['product_pass'],',') !== false){
				$work = explode(",",$value['product_pass']);
				$value['product_pass'] = $work[0];
			}
			$value['price'] = number_format($value['price']);
		}

		foreach($rental_array as &$value) {
			if(strpos($value['product_pass'],',') !== false){
				$work = explode(",",$value['product_pass']);
				$value['product_pass'] = $work[0];
			}
			$value['price'] = number_format($value['price']);
		}
		foreach($frima_array as &$value) {
			if(strpos($value['product_pass'],',') !== false){
				$work = explode(",",$value['product_pass']);
				$value['product_pass'] = $work[0];
			}
			$value['price'] = number_format($value['price']);
		}
		
}






// if(!isset($_GET['page'])&&!isset($_GET['sale_genre_id'])&&!isset($_GET['sort_method'])){
// 		unset($_SESSION['HTeam_adm']['sale_genre_id']);
// 		unset($_SESSION['HTeam_adm']['sort_method']);
// }
// //1ページのリミット

// //デフォルト値
// readdata();
// // foreach($use_rows as $value){
// // var_dump($value['product_name']);
// // }
// $smarty->assign('product_sale',$use_rows);
// $smarty->assign('page1',$pass_data[1]['page']);
// if(isset($_GET['page'])){
// 	$smarty->assign('comp',$_GET['page']);
// }
// else{
// 	$smarty->assign('comp',0);
// }
// // echo($_SESSION['HTeam_adm']['product_sum']);
// // echo($_SESSION['HTeam_adm']['product_count']);
// //$smarty->assign('session',$_GET['page']);
// $smarty->assign('cart',$_SESSION);


// //データの読み込み
// function readdata(){
// 	global $pass_data;
// 	$pass_data = array(1 => array('page','max','tgt_culmn','conditions','count','limit','tgt_genre'),
// 					   2 => array('page','max','tgt_culmn','conditions','count','limit','tgt_genre'),
// 				       3 => array('page','max','tgt_culmn','conditions','count','limit','tgt_genre'));
// 	global $rows;
// 	global $use_rows;
// 	$obj = new cproductH();
// 	$pass_data[1]['page'] = 1;
// 	$pass_data[1]['from'] = 0;
// 	$pass_data[1]['limit'] = 9;
// 	//デフォルトでの抽出条件はidが0より上のもの＝すべて
// 	$pass_data[1]['tgt_culmn'] = "product_id";
// 	$pass_data[1]['conditions'] = "genre_id >";
// 	$pass_data[1]['tgt_genre'] = "0";
// 	if(isset($_GET['sale_genre_id'])){
// 		unset($_SESSION['HTeam_adm']['sale_genre_id']);
// 		unset($_SESSION['HTeam_adm']['sort_method']);
// 	}
// 	// if(isset($_GET['genre_id'])){
// 	// 	unset($_SESSION['HTeam_adm']['genre_id']);
// 	// }

// 	//genre_idが送られてきている(ジャンルタブがクリックされている)場合
// 	//かつジャンルタブの「すべて」以外がクリックされている場合
// 	if(isset($_GET['sale_genre_id'])&&($_GET['sale_genre_id']!="0")){
// 		//抽出条件がクリックされたタブのジャンルのものとなる
// 		//同時にgenre_idをsessionに保持
// 		$pass_data[1]['conditions'] = "genre_id =";
// 		$pass_data[1]['tgt_genre'] = $_GET['sale_genre_id'];
// 		$_SESSION['HTeam_adm']['sale_genre_id'] = $pass_data[1]['tgt_genre'];
// 	}
// 	//sessionにgenre_idが保持されていた場合
// 	if(isset($_SESSION['HTeam_adm']['sale_genre_id'])){
// 		$pass_data[1]['conditions'] = "genre_id =";
// 		//保持されているgenre_idを抽出条件にする
// 		$pass_data[1]['tgt_genre'] = $_SESSION['HTeam_adm']['sale_genre_id'];
// 	}
// 	//order byの条件の設定	
// 	//並べ替えのボタンがクリックされた場合
// 	if(isset($_GET['sort_method'])){
// 		//条件別にsessionに保持
// 		//これはページ送りを行って際に並び替え情報がリセットされないようにするため
// 		if($_GET['sort_method'] == "aiueo_order"){
// 			$_SESSION['HTeam_adm']['sort_method'] = "product_name";
// 		}
// 		else if($_GET['sort_method'] == "sales_order"){
// 			$_SESSION['HTeam_adm']['sort_method'] = "product_name";
// 		}
// 		else if($_GET['sort_method'] == "price_desk_order"){
// 			$_SESSION['HTeam_adm']['sort_method'] = "price desc";
// 		}
// 		else if($_GET['sort_method'] == "price_ask_order"){
// 			$_SESSION['HTeam_adm']['sort_method'] = "price";
// 		}	
// 		//var_dump($_SESSION['HTeam_adm']['genre_id']);
// 	}
// 	if(isset($_SESSION['HTeam_adm']['sort_method'])){
// 		$pass_data[1]['tgt_culmn'] = $_SESSION['HTeam_adm']['sort_method'];
// 	}
// 	//ページング処理ゾーンはじまり
// 	//現在の検索条件での抽出件数を格納
// 	$pass_data[1]['max'] = $obj->get_all_category_genre_count(false,$pass_data[1]['conditions'],$pass_data[1]['tgt_genre'],1);

// 	//１ページに表示する数を抽出件数が上回っている場合
// 	if($pass_data[1]['max']>$pass_data[1]['limit']){
// 		//上回っている回数分だけページを作り出す
// 		//例）１ページに表示する数が3で抽出件数が10の場合
// 		//    3ページ作り出す
// 		$pass_data[1]['page'] = ($pass_data[1]['max']/$pass_data[1]['limit']+1)+1;
// 	}

// 	//ページ送りがクリックされた場合
// 	if(isset($_GET['page'])){
// 		//現在の抽出条件の何番目からを表示するか指定
// 		//ちなみにlimitが１ページに何枚表示するかを格納する変数
// 		$pass_data[1]['limit'] = ($_GET['page']-1)*$pass_data[1]['limit'];
// 	}
// 	//ページング処理ゾーンおわり
// 	//ここまでで指定した抽出条件を送り、値を格納した配列を取得
// 	$rows = $obj->get_all_order(false,$pass_data[1]['from'],$pass_data[1]['limit'],$pass_data[1]['conditions'],$pass_data[1]['tgt_genre'],$pass_data[1]['tgt_culmn'],1);
// 	$use_rows = $rows;
// 	// for($i = 0; $i < $pass_data[1]['limit']; $i ++) {
// 	// 	if(strpos($use_rows[$i]['product_pass'],',') !== false){
// 	// 		$work = explode(",",$use_rows[$i]['product_pass']);
// 	// 		$use_rows[$i]['product_pass'] = $work[0];
// 	// 	}
// 	// }
// 	//指定した画像たちの一番最初だけを抽出
// 	foreach($use_rows as &$value) {
// 		if(strpos($value['product_pass'],',') !== false){
// 	 		$work = explode(",",$value['product_pass']);
// 			$value['product_pass'] = $work[0];
// 		}
// 	}
	

// }

//Smartyを使用した表示(テンプレートファイルの指定)
$smarty->display('product_list.tmpl');

//▲▲▲▲▲▲関数呼び出しブロック▲▲▲▲▲▲

?>
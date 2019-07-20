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

for($i = 0; $i<2; $i++){
	$pass_data[$i]['page'] = 1;
	$pass_data[$i]['category'] = $i+1;
	$pass_data[$i]['genre'] = '0';
	$pass_data[$i]['conditions'] = 'genre_id > '.$pass_data[$i]['genre'];
	$pass_data[$i]['sort'] = 'product_id';
	$pass_data[$i]['from'] = 0;
	$pass_data[$i]['limit'] = 15;
}

	$pass_data[2]['page'] = 1;
	$pass_data[2]['category'] = 3;
	$pass_data[2]['genre'] = '0';
	$pass_data[2]['conditions'] = 'frima_genre_id > '.$pass_data[$i]['genre'];
	$pass_data[2]['sort'] = 'frima_product_id';
	$pass_data[2]['from'] = 0;
	$pass_data[2]['limit'] = 15;

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
	$pass_data[2]['conditions'] = 'frima_genre_id = '.$pass_data[2]['genre'];
	$_SESSION['HTeam']['frima_sort_method'] = 'frima_product_id';
}
else{
	if(isset($_SESSION['HTeam']['frima_genre_id'])&&isset($_GET['HTeam']['sale_page'])){
		$pass_data[2]['genre'] = $_SESSION['HTeam']['frima_genre_id'];
		$pass_data[2]['conditions'] = 'frima_genre_id = '.$pass_data[2]['genre'];
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
			$pass_data[2]['conditions'] = 'frima_genre_id = '.$pass_data[2]['genre'];
		}
		//条件別にsessionに保持
		//これはページ送りを行って際に並び替え情報がリセットされないようにするため
		if($_GET['frima_sort_method'] == "aiueo_order"){
			$_SESSION['HTeam']['frima_sort_method'] = "frima_product_name";
		}
		else if($_GET['frima_sort_method'] == "sales_order"){
			$_SESSION['HTeam']['frima_sort_method'] = "frima_product_name";
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
			$pass_data[2]['conditions'] = 'frima_genre_id = '.$pass_data[2]['genre'];
		}
		$pass_data[2]['page'] = $_GET['frima_page'];
}

	if(isset($_POST['search_sale'])){
		$_SESSION['HTeam']['search_sale'] = $_POST['search_sale'];
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
		$pass_data[2]['search'] = 'frima_product_name like'."'".'%'.$_SESSION['HTeam']['search_frima'].'%'."'";
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
//Smartyを使用した表示(テンプレートファイルの指定)
$smarty->display('adm_product_list.tmpl');

//▲▲▲▲▲▲関数呼び出しブロック▲▲▲▲▲▲

?>
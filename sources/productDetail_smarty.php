<?php
/*!
@file member_detail_smarty.php
@brief メンバー詳細(Smarty版)
@copyright Copyright (c) 2017 Yamanoi Yasushi,Shimojima Ryo.
*/
// session_start();
/////////////////////////////////////////////////////////////////
/// 実行ブロック
/////////////////////////////////////////////////////////////////

//ライブラリをインクルード
require_once("inc_base.php");
require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
require_once("inc_smarty.php");
require_once($CMS_COMMON_INCLUDE_DIR . "auth_user.php");

$product_id = 0;
$err_array = array();
$err_flag = 0;
$page = 0;
$buy_chk = false;

//--------------
//マイリスト登録時
//--------------
if(isset($_POST['mylist'])){
	//商品Hクラスを構築
	$product_id = $_POST['product_id'];
	//マイリスト追加
	$dataarr = array();
	$dataarr['customer_id'] = $_SESSION['HTeam_adm']['customer_id'];
	$dataarr['product_id'] = (int)$_POST['product_id'];
	$dataarr['memo'] = $_POST['memo'];
    
	$chenge = new cchange_ex();
    $mid = $chenge->insert('favorite',$dataarr);

	//商品Hクラスを構築
	$product_obj = new cproductH();
	$product_id = $_GET['product_id'];
	$productarr = $product_obj->get_tgt(false,$product_id);
	if($productarr !== false){
		// echo '<script type="text/javascript">alert("ここか？");</script>';
		// product_passを取得
		$data = $productarr["product_pass"];
		$productarr["product_pass"] = explode(',',$data);
		$smarty->assign('productarr',$productarr);
		productReviewAssign($_GET['product_id']);
	}else{

	}
//--------------
//購入時
//--------------
}else if(isset($_POST['buy_count'])
	//cutilクラスのメンバ関数をスタティック呼出
	&& cutil::is_number($_POST['buy_count'])
	&& $_POST['buy_count'] > 0 && isset($_POST['product_id'])){
	var_dump("buy");
	//購入
	$buy_chk = true;
	regist();
//--------------
//最初のアクセス	
//--------------
}else if(isset($_GET['product_id']) 
//cutilクラスのメンバ関数をスタティック呼出
	&& cutil::is_number($_GET['product_id'])
	&& $_GET['product_id'] > 0){

	//商品Hクラスを構築
	$product_obj = new cproductH();
	$product_id = $_GET['product_id'];
	$productarr = $product_obj->get_tgt(false,$product_id);
	if($productarr !== false){
		// echo '<script type="text/javascript">alert("ここか？");</script>';
		// product_passを取得
		$data = $productarr["product_pass"];
		$productarr["product_pass"] = explode(',',$data);
		$smarty->assign('productarr',$productarr);
		productReviewAssign($_GET['product_id']);
	}else{

	}
	
}else{
	// ステータスコードを出力
	http_response_code( 301 ) ;
	// リダイレクト
	header( "Location: ./product_list.php" ) ;
	exit ;
}

//購入後は、
if($buy_chk){
	$product_obj = new cproductH();
	$product_id = $_GET['product_id'];
	$productarr = $product_obj->get_tgt(false,$product_id);
	if($productarr !== false){
		// echo '<script type="text/javascript">alert("ここか？");</script>';
		//product_passを取得
		$data = $productarr["product_pass"];
		$productarr["product_pass"] = explode(',',$data);
		//var_dump($productarr);
		$smarty->assign('productarr',$productarr);
	}else{

	}
}

//商品のレビューとそのレビューを書いたユーザのアイコン、ユーザIDを取得し
//Assignする関数
function productReviewAssign($product_id){
	$review_obj = new creview();
	$trans_obj = new ctransaction_info();
	$customer_obj = new ccustomer();
	$view_review = arrau();

	$reviewarr = $review_obj ->get_tgt_product_id(false,$product_id);
	
	if($reviewarr > 0){

		for($i = 0; $i<count($reviewarr); $i++){
			$bday = new DateTime($transInfoarr[$i]['purchase_date']);
			$trans = $trans_obj->get_tgt(false,$reviewarr[$i]['transaction_id']);
			//あるばあいのみ
			if($trans !== false){
				$cust = $customer_obj -> get_tgt(false,$trans['customer_id']);
				//ある場合のみ
				if($cust　!== false){
					$view_review[$i] = array(
						'customer_id'=> (String)$cust['customer_id'],//ユーザID
						'icon_pass'=>(String)$cust['icon_pass'],//アイコンURL
						'review_tittle' => (String)$reviewarr[$i]['review_tittle'],//レビューの件名
						'review'=> (String)$reviewarr[$i]['review'],//レビューの本文
						'review_value'=>(int)$reviewarr[$i]['review_value'],//レビューの本文
						'review_date'=>$bday->format('Y年m月d日')//レビュー日時
					);
				}
			}		
		}
		
		$smarty->assign('view_review',$view_review);
	}

}


//--------------------------------------------------------------------------------------
/*!
@brief	メンバーデータの追加／更新。保存後自分自身を再読み込みする。
@return	なし
*/
//--------------------------------------------------------------------------------------
function regist(){
	global $member_id;
	//ここは$session[customer_id]から取得,
	//無ければログインページにリダイレクト
	// $_POST['customer_id'] = "kojikoji";
	
	$_POST['customer_id'] = $_SESSION['HTeam_adm']['customer_id'];
	$dataarr = array();
	$dataarr['customer_id'] = (string)$_POST['customer_id'];
	$dataarr['product_id'] = (int)$_POST['product_id'];
	$dataarr['product_value'] = (int)$_POST['buy_count'];
    
	$chenge = new cchange_ex();
    $mid = $chenge->insert('cart',$dataarr);
	echo '<script type="text/javascript">alert("カートに入れました(カートIN確認画面に遷移予定)");</script>';
	cutil::redirect_exit("productDetail_smarty.php");
}



/////////////////////////////////////////////////////////////////
/// 関数呼び出しブロック
/////////////////////////////////////////////////////////////////

$smarty->assign('err_array',$err_array);
$smarty->assign('session',$_SESSION);
$smarty->assign('cart',$_SESSION);
//Smartyを使用した表示(テンプレートファイルの指定)
$smarty->display('productDetail.tmpl');

?>

<?php
require_once("inc_base.php");
require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
require_once("inc_smarty.php");
require_once($CMS_COMMON_INCLUDE_DIR . "auth_user.php");
//商品ID取引IDでゲットアクセスした場合は
//商品名と画像表示
if(isset($_POST['star'])&& isset($_POST['review_tittle']) && isset($_POST['review'])){
    $chenge = new cchange_ex(); 
    $dataarr = array();
    $dataarr['transaction_id'] = $_POST['transaction_id'];
    $dataarr['product_id'] = $_POST['product_id'];
    $dataarr['review_tittle'] = $_POST['review_tittle'];
    $dataarr['review'] = $_POST['review'];
    $dataarr['review_value'] = (int)$_POST['star'];
    $dataarr['review_date'] = date('YmdHis');
    
    $mid = $chenge->insert('review',$dataarr);
    
    cutil::redirect_exit("history.php");

}else if(isset($_GET["product_id"]) && isset($_GET["transaction_id"])){
    $productarr = $product_obj->get_tgt(false,$_GET["product_id"]);
    $path = explode(",",$productarr['product_pass']);
    $view = array(
        'product_name' => (String)$productarr['product_name'],
        'product_pass'=> (String)$path[0],
    ); 
    $data = array(
        'product_id' => $_GET["product_id"],
        'transaction_id'=> $_GET["transaction_id"]
    ); 
    $smarty->assign('view',$view);
    $smarty->assign('data',$data);
    
}else{
    // ステータスコードを出力
	http_response_code( 301 ) ;
	// リダイレクト
	header( "Location: ./history.php" ) ;
	exit ;
}

$smarty->display('review.tmpl')
?>
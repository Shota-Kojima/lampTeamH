<?php

//ライブラリをインクルード
require_once("inc_base.php");
require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
require_once("inc_smarty.php");
require_once($CMS_COMMON_INCLUDE_DIR . "auth_user.php");
global $date;
$date = date('YmdHis');
//初期値
$filedir1 = "";
$filedir2 = "";
$filedir3 = "";
$imageUrl1 = "";
$imageUrl2 = "";
$imageUrl3 = ""; 
$fulldir = "http://wiz.developluna.jp/~tmH2019/lampTeamH/sources/images/product_img/";

if(isset($_POST['product_name'])&&isset($_POST['price'])&&
    isset($_POST['genre_id'])&&isset($_POST['product_text'])){
    
    //画像のチェック
    if(isset($_FILES["image_file1"]["tmp_name"])){
        //画像の保存処理
        //画像１枚目
        if (is_uploaded_file($_FILES["image_file1"]["tmp_name"])) {
            //ある時のみ値変更(無しの時の処理)
            $filedir1 = "./images/product_img/".$date."1".".jpg";
            //DBの画像パス
            $imageUrl1 = $fulldir.$date."1".".jpg";
            move_uploaded_file($_FILES["image_file1"]["tmp_name"], $filedir1);
        }    
    }
    if(isset($_FILES["image_file2"]["tmp_name"])){
        //画像２枚目
        if (is_uploaded_file($_FILES["image_file2"]["tmp_name"])) {
            //ある時のみ値変更(無しの時の処理)
            $filedir2 = "./images/product_img/".$date."2".".jpg";
            $imageUrl2 = $fulldir.$date."2".".jpg";
            move_uploaded_file($_FILES["image_file2"]["tmp_name"], $filedir2);
        }
    }
    if(isset($_FILES["image_file3"]["tmp_name"])){
        //画像３枚目
        if (is_uploaded_file($_FILES["image_file3"]["tmp_name"])) {
            //ある時のみ値変更(無しの時の処理)
            $filedir3 = "./images/product_img/".$date."3".".jpg";
            $imageUrl2 = $fulldir.$date."3".".jpg";
            move_uploaded_file($_FILES["image_file3"]["tmp_name"], $filedir3);
        }
    }
    $_POST['exhibistion_date'] = $date;
    $_POST['product_pass'] = $imageUrl1.",".$imageUrl2.",".$imageUrl3;
    regist();
}

//--------------------------------------------------------------------------------------
/*!
@brief	メンバーデータの追加／更新。保存後自分自身を再読み込みする。
@return	なし
*/
//--------------------------------------------------------------------------------------
function regist(){
	global $member_id;
	$dataarr = array();
	$dataarr['frima_product_name'] = (string)$_POST['product_name'];
	$dataarr['frima_genre_id'] = (int)$_POST['genre_id'];
	$dataarr['product_pass'] = (string)$_POST['product_pass'];
    $dataarr['product_text'] = (string)$_POST['product_text'];
    $dataarr['price'] = (int)$_POST['price'];
    $dataarr['exhibistion_date'] = (string)$_POST['exhibistion_date'];
    $dataarr['ex_user'] = (string)$_SESSION['HTeam_adm']['customer_id'];
    $dataarr['buy_user'] = "";
    $dataarr['buy_flg'] = (int)0;
    $dataarr['end_flg'] = (int)0;
    
	$chenge = new cchange_ex();
    $mid = $chenge->insert('frima_productH',$dataarr);
    echo '<script type="text/javascript">alert('.$mid.');</script>';
}

//ジャンル取得してアサイン
$genre_obj = new cgenre();
$rows = $genre_obj->get_allH(false);
$smarty->assign('rows',$rows);
$smarty->display('frimaEx.tmpl');
?>

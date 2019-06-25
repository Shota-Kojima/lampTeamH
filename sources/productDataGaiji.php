
<form action="" method="post" enctype="multipart/form-data" autocomplete="off">
    <p>
    商品名<input type="text" name="product_name" size="100">
    </p>
    <p>
    値段<input type="text" name="price" size="200">
    </p>
    <p>
    在庫数<input type="text" name="stock_value" size="200">
    </p>
    <p>
    カテゴリ
    <select name="product_category">
        <option value="1">販売</option>
        <option value="2">レンタル</option>
        <option value="3">フリマ</option>
    </select>
    </p>
    <p>
    <!-- ジャンル<input type="text" name="genre_id" size="200"> -->
    ジャンル
    <select name="genre_id">
        <option value="1">ガソリンランタン </option>
        <option value="2">LPガスランタン</option>
        <option value="3">LEDライティング</option>
        <option value="4">大人用 </option>
        <option value="5">子供用</option>
        <option value="6">テント</option>
        <option value="7">タープ</option>
        <option value="8">シェード</option>
        <option value="9">マット</option>
        <option value="10">レクタングラー（封筒型）</option>
        <option value="11">エアーベッド</option>
        <option value="12">バーナー </option>
        <option value="13">グリル</option>
        <option value="14">ヒーター</option>
        <option value="15">クックウエア</option>
        <option value="16">ハードクーラー</option>
        <option value="17">ソフトクーラー</option>
        <option value="18">ジャグ</option>
        <option value="19">チェア</option>
        <option value="20">テーブル</option>
        <option value="21">キッチンテーブル</option>
        <option value="22">オールインワン</option>
    </select>
    </p>
    <p>
    商品説明<br>
    <textarea name="product_text" rows="4" cols="40"></textarea>
    </p>
    <p>
    画像<br>
    <input type="file" name="image_file1" accept="image/*">
    <input type="file" name="image_file2" accept="image/*">
    <input type="file" name="image_file3" accept="image/*">
    </p>
    <p>
    <input type="submit" value="送信">
    </p>
</form>

<?php

//ライブラリをインクルード
require_once("inc_base.php");
require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
require_once("inc_smarty.php");

global $date;
$date = date('YmdHis');
//初期値
$filedir1 = "";
$filedir2 = "";
$filedir3 = "";
$imageUrl1 = "";
$imageUrl2 = "";
$imageUrl3 = ""; 
$fulldir = "http://wiz.developluna.jp/~e09/PHPBase-master/sources/images/product_img/";
// isset($_POST['product_name'])&&
//     &&
//     isset($_FILES["image_file2"]["tmp_name2"])&&
//     isset($_FILES["image_file3"]["tmp_name3"])&&
//     isset($_POST['product_text'])&&
//     isset($_POST['price'])&&
//     issset($_POST['genre'])&&
//     isset($_POST['categoly'])

// &&isset($_POST['product_category'])&&
//     issset($_POST['genre_id'])
//テキストなどの入力チェック
// if(isset($_POST['product_category'])){
//     echo ($_POST['product_category']);
// }
// if(isset($_POST['genre_id'])){
//     echo ($_POST['genre_id']);
// }

if(isset($_POST['product_name'])&&isset($_POST['price'])&&
    isset($_POST['product_category'])&&isset($_POST['genre_id'])&&
    isset($_POST['product_text'])&&isset($_POST['stock_value'])){
    
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
@brief	フルーツデータの追加／更新
@return	なし
*/
//--------------------------------------------------------------------------------------
function regist_puroductH($member_id){
	$chenge = new cchange_ex();
	$chenge->delete("productH","product_id=" . $member_id);
	foreach($_POST['fruits'] as $key => $val){
		$dataarr = array();
		$dataarr['product_id'] = (int)$member_id;
		// $dataarr['fruits_id'] = (int)$val;
		$chenge->insert('productH',$dataarr);
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
	$dataarr = array();
	$dataarr['product_name'] = (string)$_POST['product_name'];
	$dataarr['product_category'] = (int)$_POST['product_category'];
	$dataarr['genre_id'] = (int)$_POST['genre_id'];
	$dataarr['product_pass'] = (string)$_POST['product_pass'];
    $dataarr['product_text'] = (string)$_POST['product_text'];
    $dataarr['price'] = (string)$_POST['price'];
    $dataarr['exhibistion_date'] = (string)$_POST['exhibistion_date'];
    $dataarr['stock_value'] = (int)$_POST['stock_value'];
    
	$chenge = new cchange_ex();
	// if($member_id > 0){
	// 	$chenge->update('member',$dataarr,'member_id=' . $member_id);
	// 	regist_fruits($member_id);
	// 	cutil::redirect_exit($_SERVER['PHP_SELF'] . '?mid=' . $member_id);
	// }
	// else{
    $mid = $chenge->insert('productH',$dataarr);
	// 	regist_fruits($mid);
    // cutil::redirect_exit($_SERVER['PHP_SELF'] . '?mid=' . $mid);
    // }
    echo '<script type="text/javascript">alert("追加おｋ");</script>';
}

?>

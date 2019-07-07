<?php
require_once("inc_base.php");
require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
require_once("inc_smarty.php");
require_once($CMS_COMMON_INCLUDE_DIR . "auth_user.php");
//------------------------
//ユーザのカート情報を取得
//------------------------
if(isset($_SESSION['HTeam_adm']['customer_id']) && $_SESSION['HTeam_adm']['customer_id'] !== ""){
    $cartarr = $cart_obj->get_allH(false,$_SESSION['HTeam_adm']['customer_id']);
    //--------------------------
    //カート内の全商品取得
    //--------------------------
    if($cartarr !== false){
        //カート内の合計商品数
        $product_count = 0;
        //カート内の合計金額
        $product_sum = 0;
        //表示用配列
        $cart_product=array();

        //--------------------------
        //商品一つ一つの情報を取得
        //--------------------------
        for($i = 0; $i < count($cartarr);$i++){
            //商品数カウント
            $product_count+=(int)$cartarr[$i]['product_value'];;
            //商品テーブルの処理
            $product_id = (int)$cartarr[$i]['product_id'];
            $productarr = $product_obj->get_tgt(false,$product_id);
            //取得出来たら商品の金額をセッションに格納
            if($productarr !== false){

                $product_sum += (int)$cartarr[$i]['product_value'] * (int)$productarr["price"];
                $_SESSION['HTeam_adm']['product_count'] = $product_count;
                $_SESSION['HTeam_adm']['product_sum'] = $product_sum;
                //表示用配列
                for($i = 0; $i < count($cart_product); $i++){
                    $hoge = array_merge($hoge,array('key2'=>'value2'));
                }

            }else{
                // echo '<script type="text/javascript">alert("64のelse");</script>';
                //  ステータスコードを出力
                
            }
        }
    }else{
        // echo '<script type="text/javascript">alert("75のelse");</script>';
        // ステータスコードを出力
        $_SESSION['HTeam_adm']['product_count'] = 0;
        $_SESSION['HTeam_adm']['product_sum'] = 0;
    }
}

$smarty->assign('session',$_SESSION);
$smarty->assign('cart',$_SESSION);
$smarty->display('cart.tmpl');
?>
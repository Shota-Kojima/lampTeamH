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
        $hanbai_count = 0;
        $rental_count = 0;
        //カート内の合計金額
        $product_sum = 0;
        //重複して入る配列
        $cart_product=array();
        // 重複を消す配列
        $wk = array();
        //--------------------------
        //商品一つ一つの情報を取得
        //--------------------------
        for($i = 0; $i < count($cartarr);$i++){
            //商品数カウント
            $product_count+=(int)$cartarr[$i]['product_value'];
            //商品テーブルの処理
            $product_id = (int)$cartarr[$i]['product_id'];
            $productarr = $product_obj->get_tgt(false,$product_id);
            //取得出来たら商品の金額をセッションに格納
            if($productarr !== false){

                $product_sum += (int)$cartarr[$i]['product_value'] * (int)$productarr["price"];
                $_SESSION['HTeam_adm']['product_count'] = $product_count;
                $_SESSION['HTeam_adm']['product_sum'] = $product_sum;
                $wk[$i] = $productarr['product_id'];
                $cart_product[$i] = $productarr;
                

            }else{
                http_response_code( 301 ) ;
                //ステータスコード301はSEO意識
                header( "Location: ./login.php" ) ;
                exit ;
            }
        } 

        $wk = array_unique($wk);
        $wk = array_values($wk);
        $cart = array();
        //--------------------------------------------------
        //56行目~73まで無理やり感。リファクタリング必須
        //--------------------------------------------------
        for($i = 0; $i < count($wk); $i++){
            $cnt = 0;
            for($j = 0; $j < count($cart_product); $j++){
                
                if($wk[$i] === $cart_product[$j]['product_id']){
                    //個数更新
                    $cnt += (int)$cartarr[$j]['product_value'];
                }else{
                    continue;
                }
                $cart[$i] = array('product_id'=> (int)$cart_product[$j]['product_id'],
                                'product_name' => $cart_product[$j]['product_name'],
                                'product_category'=> (int)$cart_product[$j]['product_category'],
                                'product_pass'=> explode(",", $cart_product[$j]['product_pass']),
                                'price'=> (int)$cart_product[$j]['price'] * (int)$cnt,
                                'cart_count'=> $cnt);
                
            }
        }

        for($i=0;$i<count($cart);$i++){
            if($cart[$i]['product_category'] === 1){
                $hanbai_count += $cart[$i]['cart_count'];
            }else if($cart[$i]['product_category'] === 2){
                $rental_count += $cart[$i]['cart_count'];
            }
        }
        $_SESSION['HTeam_adm']['hanbai_count']=$hanbai_count;
        $_SESSION['HTeam_adm']['rental_count']=$rental_count;
        foreach($cart as &$value){
            $value['price'] = number_format($value['price']);
        }
        $smarty->assign('cart',$cart);

    }
    
}

$smarty->assign('session',$_SESSION);
$smarty->display('cart.tmpl');
?>
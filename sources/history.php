<?php
require_once("inc_base.php");
require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
require_once("inc_smarty.php");
require_once($CMS_COMMON_INCLUDE_DIR . "auth_user.php");
$smarty->assign('cart',$_SESSION);

//------------------------
//ユーザIDがあるときのみ動作
//------------------------
if(isset($_SESSION['HTeam_adm']['customer_id']) && $_SESSION['HTeam_adm']['customer_id'] !== ""){
    $transaction_info_obj = new ctransaction_info();
    $transaction_details_obj = new ctransaction_details();
    //--------------------------
    //取引情報テーブル内の全レコード取得
    //--------------------------
    $transInfoarr = $transaction_info_obj->get_allH(false,$_SESSION['HTeam_adm']['customer_id']);
    if($transInfoarr !== false){
        
        //重複して入る配列
        $cart_product=array();
        $history= array();
        //--------------------------
        //１取引情報に紐づく複数の取引明細を取得し、
        //tmplに渡す変数に格納
        //--------------------------
        for($i = 0; $i < count($transInfoarr); $i++){
            //１明細を取得
            $detailsarr = $transaction_details_obj->transaction_id(false,$transInfoarr[$i]['transaction_id']);
            for($j = 0; $j < count($detailsarr); $j++){
                $productarr = $product_obj->get_tgt(false,$product_id);
                //取得出来たら商品の金額をセッションに格納
                if($productarr !== false){
                    
                    $path = explode(",",$productarr['product_pass']);
                    $detailsarr['product_text'] = $productarr['product_text'];
                    $detailsarr['product_pass'] = $path[0];
                    $history[$i][$j] = $detailsarr;
                }else{
                    // echo '<script type="text/javascript">alert("64のelse");</script>';
                    //  ステータスコードを出力
                    
                }
                
            }
        } 
        var_dump($history);
        // $wk = array_unique($wk);
        // $wk = array_values($wk);
        // $cart = array();
        // //--------------------------------------------------
        // //56行目~73まで無理やり感。リファクタリング必須
        // //--------------------------------------------------
        // for($i = 0; $i < count($wk); $i++){
        //     $cnt = 0;
        //     for($j = 0; $j < count($cart_product); $j++){
                
        //         if($wk[$i] === $cart_product[$j]['product_id']){
        //             //個数更新
        //             $cnt += (int)$transInfoarr[$j]['product_value'];
        //         }else{
        //             continue;
        //         }
        //         $cart[$i] = array('product_id'=> (int)$cart_product[$j]['product_id'],
        //                         'product_name' => $cart_product[$j]['product_name'],
        //                         'product_category'=> (int)$cart_product[$j]['product_category'],
        //                         'product_pass'=> explode(",", $cart_product[$j]['product_pass']),
        //                         'price'=> (int)$cart_product[$j]['price'] * (int)$cnt,
        //                         'cart_count'=> $cnt);
        //     }
        // }

        // for($i=0;$i<count($cart);$i++){
        //     if($cart[$i]['product_category'] === 1){
        //         $hanbai_count += $cart[$i]['cart_count'];
        //     }else if($cart[$i]['product_category'] === 2){
        //         $rental_count += $cart[$i]['cart_count'];
        //     }
        // }
        // $_SESSION['HTeam_adm']['hanbai_count']=$hanbai_count;
        // $_SESSION['HTeam_adm']['rental_count']=$rental_count;
        // $smarty->assign('cart',$cart);

    }
    
}
$smarty->display('history.tmpl')
?>
<?php
require_once("inc_base.php");
require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
require_once("inc_smarty.php");
require_once($CMS_COMMON_INCLUDE_DIR . "auth_user.php");

if(isset($_POST["commit"])){
    
    $cartarr = $cart_obj->get_allH(false,$_SESSION['HTeam_adm']['customer_id']);
    //--------------------------
    //カート内の全商品取得
    //--------------------------
    if($cartarr !== false){
        //カート内の合計商品数
        $product_count = 0;
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
        
        
            $dataarr = array();
            $dataarr['customer_id'] = (String)$_SESSION['HTeam_adm']['customer_id'];
            $dataarr['purchase_date'] = (String)date('YmdHis');
            $cart_obj = new ccart();
            $chenge = new cchange_ex(); 
            $mid = $chenge->insert('transaction_info',$dataarr);
            
            $dataarr = array();

            for($i=0;$i<count($cart);$i++){
                $dataarr['transaction_id'] = (int)$mid;
                $dataarr['product_id'] = (int)$cart[$i]['product_id'];
                $dataarr['purchase_value'] = (int)$cart[$i]['cart_count'];
                $dataarr['purchase_price'] = (int)$cart[$i]['price'];
                //レンタル期間
                $dataarr['rental_date'] = "";
                $dataarr['transaction_category'] = (int)$cart[$i]['product_category'];
                $mid = $chenge->insert('transaction_details',$dataarr);
            }
            // $_SESSION[];
            $_SESSION['HTeam_adm']['product_count']=0;
            $_SESSION['HTeam_adm']['product_sum']=0;
            $_SESSION['HTeam_adm']['fake_sum']=0;

            $cartarr = $cart_obj->get_allH(false,$_SESSION['HTeam_adm']['customer_id']);
            if($cartarr !== false){
                $chenge->delete("cart","customer_id=" . '"'.$_SESSION['HTeam_adm']['customer_id'].'"');
                echo '<script type="text/javascript">alert(購入完了);</script>';    
            }else{
                echo '<script type="text/javascript">alert(ダメでしょ);</script>';     
            }
            
          
        // for($i=0; $i < count($cart); $i++){
        // }

        $smarty->assign('cart',$cart);

    }
    
}
$smarty->display('final_done.tmpl');
?>
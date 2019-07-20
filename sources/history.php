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
            $bday = new DateTime($transInfoarr[$i]['purchase_date']);
            //明細を取得
            $detailsarr = $transaction_details_obj->get_allH(false,$transInfoarr[$i]['transaction_id']);
            for($j = 0; $j < count($detailsarr); $j++){
                //商品テーブルから商品の画像とテキストなどを取得したいため持ってくる
                $productarr = $product_obj->get_tgt(false,$detailsarr[$j]['product_id']);
                
                //取得出来たら商品の金額をセッションに格納
                if($productarr !== false){
                    
                    $path = explode(",",$productarr['product_pass']);
                    $history[$i][$j] = array(
                                            'product_id'=> (int)$detailsarr[$j]['product_id'],
                                            'transaction_id'=>(int)$detailsarr[$j]['transaction_id'],
                                            'product_name' => (String)$productarr['product_name'],
                                            'product_category'=> (int)$detailsarr[$j]['transaction_category'],
                                            'product_pass'=> (String)$path[0],
                                            'purchase_price'=> (int)$detailsarr[$j]['purchase_price'],
                                            'purchase_value'=> (int)$detailsarr[$j]['purchase_value'],
                                            'product_text'=>$productarr['product_text'],
                                            'total_value'=>$transInfoarr[$i]['total_value'],
                                            'total_money'=>$transInfoarr[$i]['total_money'],
                                            'purchase_date'=>$bday->format('Y年m月d日'),
                                            'purchase_sum'=>(int)$detailsarr[$j]['purchase_price']*(int)$detailsarr[$j]['purchase_value']
                                        );             
                }else{
                    // echo '<script type="text/javascript">alert("64のelse");</script>';
                    //  ステータスコードを出力
                    
                }
            }
            
        } 
        foreach($history as &$value){
              foreach($value as &$value2){
                  $value2['purchase_sum'] = number_format($value2['purchase_sum']);
                  $value2['purchase_price'] = number_format($value2['purchase_price']);
                  $value2['total_money'] = number_format($value2['total_money']);
              }
        }
      
     $smarty->assign('history',$history);
    }
}
$smarty->display('history.tmpl')
?>
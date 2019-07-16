<?php
require_once("inc_base.php");
require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
require_once("inc_smarty.php");
require_once($CMS_COMMON_INCLUDE_DIR . "auth_user.php");

//------------------------
//ユーザIDがあるときのみ動作
//------------------------
if(isset($_SESSION['HTeam_adm']['customer_id']) && $_SESSION['HTeam_adm']['customer_id'] !== ""){
    $favorite_obj = new cfavorite();
    //--------------------------
    //いいねテーブル内の全レコード取得
    //--------------------------
    $favoritearr = $favorite_obj->get_allH(false,$_SESSION['HTeam_adm']['customer_id']);
    if($favoritearr !== false){
       
        $view = array();
        if(count($favoritearr)===0){
            
        }else{
            for($i = 0; $i < count($favoritearr); $i++){

                //商品テーブルから商品の画像とテキストなどを取得したいため持ってくる
                $productarr = $product_obj->get_tgt(false,$favoritearr[$i]['product_id']);
                
                //取得出来たら商品の金額をセッションに格納
                if($productarr !== false){
                    
                    $path = explode(",",$productarr['product_pass']);
                    $view[$i] = array(
                                    'customer_id'=> (String)$favoritearr[$i]['customer_id'],
                                    'product_id'=>(int)$favoritearr[$i]['product_id'],
                                    'memo' => (String)$favoritearr[$i]['memo'],
                                    'product_name'=> (String)$productarr['product_name'],
                                    'product_pass'=>(String)$path[0],
                                    'price'=>(int)$productarr['price'],
                                    'stock_value'=>(int)$productarr['stock_value']
                                );
                }else{
                    // echo '<script type="text/javascript">alert("64のelse");</script>';
                    //  ステータスコードを出力
                    
                }
            } 
        }
        
        
        $smarty->assign('view',$view);

    }
}


$smarty->display('mylist.tmpl')
?>
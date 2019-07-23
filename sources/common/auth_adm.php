<?php
/********************************

auth_user.php

メンバーログイン認証
$_SESSIONは多次元配列にする

2018/7/3 Y.YAMANOI
*********************************/
//ss
session_start();
require_once("inc_smarty.php");
$row = array();
$adm = new cadmin();
// var_dump($_SESSION);
if(isset($_SESSION['HTeam_adm']['auth_adm_id'])&& 
    $_SESSION['HTeam_adm']['auth_adm_id'] !== ''){
        
    //sesionが作られていない時に作成
    // if(!isset($_SESSION['HTeam_adm']['customer_email']) && !isset($_SESSION['HTeam_adm']['last_name']) &&
    //     !isset($_SESSION['HTeam_adm']['last_name_kana']) && !isset($_SESSION['HTeam_adm']['first_name']) &&
    //     !isset($_SESSION['HTeam_adm']['first_name_kana']) && !isset($_SESSION['HTeam_adm']['postal_code']) &&
    //     !isset($_SESSION['HTeam_adm']['icon_pass']) && !isset($_SESSION['HTeam_adm']['customer_point']) &&
    //     !isset($_SESSION['HTeam_adm']['customer_created_date']) && !isset($_SESSION['HTeam_adm']['customer_sex'])){
            
        //------------------------
        //ユーザの情報を取得
        //------------------------
        $admarr = $adm->get_tgt(false,$_SESSION['HTeam_adm']['auth_adm_id']);
        if($admarr !== false){
            
            //セッション割り当て
            $_SESSION['HTeam_adm']['adm_password'] = $admarr['adm_password'];
            $_SESSION['HTeam_adm']['adm_created_date'] = $admarr['adm_created_date'];
            $_SESSION['HTeam_adm']['adm_name'] = $admarr['adm_name'];
            $_SESSION['HTeam_adm']['adm_write'] = $admarr['adm_write'];
            $_SESSION['HTeam_adm']['adm_read'] = $admarr['adm_read'];
            $_SESSION['HTeam_adm']['adm_create'] = $admarr['adm_create'];
            $_SESSION['HTeam_adm']['adm_delete'] = $admarr['adm_delete'];
        }else{
           
        }
    // }   
    
    
    //------------------------
    //ユーザのカート情報を取得
    //------------------------
   
}else{
    // ステータスコードを出力
	http_response_code( 301 ) ;
	// リダイレクト
	header( "Location: ./admin_login.php" ) ;
	exit ;
}

?>

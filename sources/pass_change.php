<?php
require_once("inc_base.php");
require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
require_once("inc_smarty.php");
//securityコード判定フラグ
$pass_change_flg = false;
//パスワードが一致しているかいないか
$pass_check_flg = false;
session_start();
//emailでセッションが作られているときのみ実行される
if(isset($_SESSION['HTeam_adm']['securityCode'])){
    
    if(isset($_POST['customer_password'])){
        //パスワードが一致している場合、
        if($_POST['customer_password'] === $_POST['customer_password_check']){
            var_dump("一致");
            //SQL
            $pass_check_flg = false;
            $dataarr = array();
            $dataarr['customer_password'] = (string)$_POST['customer_password'];
            
            
            $chenge = new cchange_ex();
            
            $result = $chenge->update('customer',$dataarr,'customer_id="' . $_SESSION['HTeam_adm']['change_user'].'"');

            if(count($result)!== 0){
                
                echo '<script type="text/javascript">alert("変更しました");</script>';
                http_response_code( 301 ) ;
                // リダイレクト
                header( "Location: ./pass_change_kanryou.php") ;
                exit ;
                // cutil::redirect_exit("productDetail_smarty.php");
            }else{
                var_dump("むり");
            }
            
        }else{
            var_dump("不一致");
            var_dump($_POST['customer_password']);
            var_dump($_POST['customer_password_check']);
            //
            $pass_change_flg = true;
            $pass_check_flg = true;

        }

    }else if(isset($_POST['securityCode'])){
        if($_SESSION['HTeam_adm']['securityCode'] === (int)$_POST['securityCode']){
            $pass_change_flg = true;
        }else{
            $pass_change_flg = false;
            $pass_check_flg = false;
        }
    }else{
    
    }
}else{
    cutil::redirect_exit("loginH.php");
}

$smarty->assign('pass_check_flg',$pass_check_flg);
$smarty->assign('pass_change_flg',$pass_change_flg);
$smarty->display('pass_change.tmpl')
?>
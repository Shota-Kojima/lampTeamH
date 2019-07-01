<?php
/*!
@file login.php
@brief  メインメニュー(管理画面)
@copyright Copyright (c) 2017 Yamanoi Yasushi.
*/

require_once("inc_base.php");
require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
require_once("inc_smarty.php");

$ERR_STR = "";
$customer_id = "";
$admin_name = "";

session_start();
if(isset($_SESSION['ZTeam_adm']['err']) && $_SESSION['ZTeam_adm']['err'] != ""){
    $ERR_STR = $_SESSION['ZTeam_adm']['err'];
}

session_unset();
session_destroy();

if(isset($_POST['login_id']) && isset($_POST['login_pw'])){
    if(chk_login_id(
        strip_tags($_POST['login_id']),
        strip_tags($_POST['login_pw']))){
        session_start();
        $_SESSION['ZTeam_adm']['login_id'] = strip_tags($_POST['login_id']);
        $_SESSION['ZTeam_adm']['customer_id'] = $customer_id;
        $_SESSION['ZTeam_adm']['admin_name'] = $admin_name;
        if(true){
            cutil::redirect_exit("products_user.php");
        }
        else{
            cutil::redirect_exit("products_admin.php");
        }
        
    }
    else if($_POST['login_id'] == "" && $_POST['login_pw'] == ""){
       
          $smarty->assign('err_message','ユーザ名とパスワードを入力してください。');
    }
     else if(!chk_login_id(
              strip_tags($_POST['login_id']),
              strip_tags($_POST['login_pw']))
              && $_POST['login_id'] != ""
              && $_POST['login_pw'] != ""){
              $smarty->assign('err_message','ユーザ名またはパスワードが違います。');
    } 
    else if($_POST['login_id'] == ""){
       
          $smarty->assign('err_message','ユーザ名を入力してください。');
    }
    else if($_POST['login_pw'] == ""){
          $smarty->assign('err_message','パスワードを入力してください。');
    }
   
}

if(isset($_POST['login_id'])){
    $id = $_POST['login_id'];
}
else{
    $id = "";
}
if(isset($_POST['login_pw'])){
    $pw = $_POST['login_pw'];
}
else{
    $pw = "";
}
$smarty->assign('id',$id);
$smarty->assign('pw',$pw);
function chk_login_id($login_id,$login_pw){
    global $ERR_STR;
    global $customer_id;
    global $admin_name;
    global $smarty;
    $customer = new ccustomer();
    $row = $customer->get_tgt(false,$login_id);
    if($row === false || !isset($row['customer_id'])){
        return false;
    }
    if($_POST['login_pw']!=$row['customer_password']){
        return false;
    }
    $customer_id = $row_id['customer_id'];
    return true;
}

//Smartyを使用した表示(テンプレートファイルの指定)
$smarty->display('loginH.tmpl');
?>

<?php
/*!
@file login.php
@brief  メインメニュー(管理画面)
@copyright Copyright (c) 2017 Yamanoi Yasushi.
*/

require_once("inc_base.php");
require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
require_once("inc_smarty.php");
session_start();
unset($_SESSION['HTeam_adm']['auth_adm_id']);
$ERR_STR = "";
$auth_adm_id = "";
$admin_name = "";
//ログインチェック
if(isset($_POST['login_id']) && isset($_POST['login_pw'])){
    if(chk_login_id(
        strip_tags($_POST['login_id']),
        strip_tags($_POST['login_pw']))){
        if(true){
            session_start();
            $_SESSION['HTeam_adm']['auth_adm_id'] = $_POST['login_id'];
            cutil::redirect_exit("admin_top.php");
        }
        else{
            cutil::redirect_exit("admin_top.php");
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
    global $auth_adm_id;
    global $admin_name;
    global $smarty;
    $admin = new cadmin();
    $row = $admin->get_tgt(false,$login_id);
    if($row === false || !isset($row['auth_adm_id'])){
        
        return false;
    }
    if($_POST['login_pw']!=$row['adm_password']){
         return false;
    }
    $auth_adm_id = $row_id['auth_adm_id'];
    return true;
}

//Smartyを使用した表示(テンプレートファイルの指定)
$smarty->display('admin_login.tmpl');
?>

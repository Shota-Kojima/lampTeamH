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
        cutil::redirect_exit("products.php");
    }
}

function chk_login_id($login_id,$login_pw){
    global $ERR_STR;
    global $customer_id;
    global $admin_name;
    $admin = new ccustomer();
    $row = $admin->get_tgt(false,$login_id);
    if($row === false || !isset($row['customer_id'])){
        $ERR_STR .= "ログイン名が不定です。\n";
        return false;
    }
    $customer_id = $row['customer_id'];
    $admin_name = $row['admin_name'];
    return true;
}

//Smartyを使用した表示(テンプレートファイルの指定)
$smarty->display('login.tmpl');


?>

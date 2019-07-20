<?php
session_start();
require_once("inc_base.php");
require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
require_once("inc_smarty.php");
if(isset($_POST['id'])){
    updatedata();  
}
if(isset($_POST['del'])){
    deletedata();
}
readdata();
if(!isset($_GET['adm_id'])&&!isset($_POST['delete'])){
     cutil::redirect_exit("manager_list.php");
}
$smarty->assign('admin',$admin);

function readdata(){
    global $admin;
    $obj = new cadmin();
    if(isset($_GET['adm_id'])){
    $_SESSION['HTeam']['admin'] = $_GET['adm_id'];
    }
    $admin = $obj->get_tgt(false,$_SESSION['HTeam']['admin']);
}
//データ変更
function updatedata(){
    $admin_arr = array();
    $admin_arr['auth_adm_id'] = $_POST['id'];
    $admin_arr['adm_password'] = $_POST['pw'];
    $admin_arr['adm_name'] = $_POST['name'];
    $admin_arr['adm_write'] = (int)$_POST['write'];
    $admin_arr['adm_read'] = (int)$_POST['read'];
    $admin_arr['adm_create'] = (int)$_POST['create'];
    $admin_arr['adm_delete'] = (int)$_POST['delete'];

    $chenge = new cchange_ex();
    $result = $chenge->update('admin',$admin_arr,'auth_adm_id="' . $_POST['id'].'"');
    
}
//データ削除
function deletedata(){
    $chenge = new cchange_ex();
    $value =  $_SESSION['HTeam']['admin'];
     var_dump($_SESSION['HTeam']['admin']);
    $chenge->delete('admin','auth_adm_id="' . $value.'"');
}

$smarty->display('manager_edit.tmpl');
?>
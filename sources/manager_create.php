<?php
session_start();
require_once("inc_base.php");
require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
require_once("inc_smarty.php");

if(isset($_POST['id'])){
    insertdata();  
}
readdata();

$smarty->assign('admin',$admin);

// function readdata(){
//     global $admin;
//     $obj = new cadmin();
//     if(isset($_GET['adm_id'])){
//     $_SESSION['HTeam']['admin'] = $_GET['adm_id'];
//     }
//     $admin = $obj->get_tgt(false,$_SESSION['HTeam']['admin']);
// }
//データ変更
function insertdata(){
    $admin_arr = array();
    $admin_arr['auth_adm_id'] = $_POST['id'];
    $admin_arr['adm_password'] = $_POST['pw'];
    $admin_arr['adm_created_date'] = date('Y/m/d');
    $admin_arr['adm_name'] = $_POST['name'];
    $admin_arr['adm_write'] = (int)$_POST['write'];
    $admin_arr['adm_read'] = (int)$_POST['read'];
    $admin_arr['adm_create'] = (int)$_POST['create'];
    $admin_arr['adm_delete'] = (int)$_POST['delete'];

    $chenge = new cchange_ex();
    $result = $chenge->insert('admin',$admin_arr);
    
}
$smarty->display('manager_create.tmpl');
?>
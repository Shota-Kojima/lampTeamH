<?php
require_once("inc_base.php");
require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
require_once("inc_smarty.php");
require_once($CMS_COMMON_INCLUDE_DIR . "auth_user.php"); 
$smarty->assign('session',$_SESSION); 
$smarty->assign('cart',$_SESSION);
$smarty->display('blacklist.tmpl');
?>
<?php
session_start();
require_once("inc_base.php");
require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
require_once("inc_smarty.php");
$smarty->display('manager_edit.tmpl');
?>
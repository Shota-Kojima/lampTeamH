<?php
require_once("inc_base.php");
require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
require_once("inc_smarty.php");

if(isset($_GET['contact_id']) 
//cutilクラスのメンバ関数をスタティック呼出
	&& cutil::is_number($_GET['contact_id'])
	&& $_GET['contact_id'] > 0){
	//商品Hクラスを構築
	$contact_obj = new ccontact();
	$contact_id = $_GET['contact_id'];
	$contactarr = $contact_obj->get_tgt(false,$contact_id);
	if($contactarr !== false){
        
		$smarty->assign('contactarr',$contactarr);
	}else{
        cutil::redirect_exit("unreturned_list.php");
    }
}else{
    cutil::redirect_exit("unreturned_list.php");
}

$smarty->display('unreturned_contact.tmpl');
?>
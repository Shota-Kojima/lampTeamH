<?php
require_once("inc_base.php");
require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
require_once("inc_smarty.php");

//お問い合わせ詳細で、返信ボタンを押したときに
//ユーザにメールを送信する。
if(isset($_POST['customer_email'])&&isset($_POST['message'])&&isset($_POST['contact_id'])){
	mb_language("Japanese");
	mb_internal_encoding("UTF-8");

	$dataarr = array();
	$dataarr['reply_flag'] = 1;
	
	
	$chenge = new cchange_ex();
	
	$result = $chenge->update('contact',$dataarr,'contact_id="' . (int)$_POST['contact_id'].'"');
	if(count($result)!== 0){
		
		if(mb_send_mail($_POST['customer_email'], "Re:SURVIVAL運営", $_POST['message'])){
			echo '<script type="text/javascript">alert("送信しました(送信完了画面に遷移予定)");</script>';
			cutil::redirect_exit("contact_list.php");
		} else {
			echo '<script type="text/javascript">alert("送信に失敗しました(送信失敗画面に遷移予定)");</script>';
		}
	}else{
		var_dump("むり");
	}
}
else if(isset($_GET['contact_id']) 
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
        cutil::redirect_exit("contact_list.php");
    }
}else{
    cutil::redirect_exit("contact_list.php");
}






$smarty->display('contact_detail.tmpl');
?>
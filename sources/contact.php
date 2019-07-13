<?php
require_once("inc_base.php");
require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
require_once("inc_smarty.php");
require_once($CMS_COMMON_INCLUDE_DIR . "auth_user.php");
$smarty->assign('session',$_SESSION);
$smarty->assign('cart',$_SESSION);

if(isset($_POST['customer_email']) && isset($_SESSION['HTeam_adm']['customer_id']) && isset($_POST['contact_text'])) {
    regist();
	
	
}else{
	
}

//--------------------------------------------------------------------------------------
/*!
@brief	メンバーデータの追加／更新。保存後自分自身を再読み込みする。
@return	なし
*/
//--------------------------------------------------------------------------------------
function regist(){
    $date = date('YmdHis');
    $dataarr = array();
    $dataarr['customer_id'] = (string)$_SESSION['HTeam_adm']['customer_id'];
    $dataarr['customer_email'] = (string)$_POST['customer_email'];
    $dataarr['receive_date'] = $date;
    $dataarr['contact_text'] = (string)$_POST['contact_text'];
    $dataarr['reply_flag'] = (int)0;
    echo '<script type="text/javascript">alert("きちゃった");</script>';
    // $chenge = new cchange_ex();
    // $mid = $chenge->insert('contact',$dataarr);
    // if($mid > 0){
    //     mb_language("Japanese");
    //     mb_internal_encoding("UTF-8");
        
        
    //     if(mb_send_mail("zeal17310029@c-league.jp", "お問い合わせ", $_POST['contact_text'])){
    //         echo '<script type="text/javascript">alert("送信しました(送信完了画面に遷移予定)");</script>';
    //     } else {
    //         echo '<script type="text/javascript">alert("送信に失敗しました(送信失敗画面に遷移予定)");</script>';
    //     }
        
    // }else{
    //     echo '<script type="text/javascript">alert("送信に失敗しました(送信失敗画面に遷移予定)");</script>';
    // }
    // echo '<script type="text/javascript">alert("送信しました(送信完了画面に遷移予定)");</script>';
}


$smarty->display('contact.tmpl');
?>
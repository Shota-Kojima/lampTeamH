<?php
require_once("inc_base.php");
require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
require_once("inc_smarty.php");
$flg = false;
if(isset($_POST['customer_email'])){
    $cust_obj = new ccustomer();
    $count = $cust_obj -> get_count_mailaddress(false,$_POST['customer_email']);
    //  登録されているとき
    if($count > 0){
        $customer = $cust_obj -> get_tgt_mail(false,$_POST['customer_email']);
        $flg = false;
        $str="";
        for($i=0;$i<8;$i++){
            $str.=mt_rand(0,9);
        }
        session_start();
        $_SESSION['HTeam_adm']['securityCode'] = (int)$str;
        $_SESSION['HTeam_adm']['change_user'] = (String)$customer['customer_id'];
        mb_language("Japanese");
        mb_internal_encoding("UTF-8");
        $messageStr= $_SESSION['HTeam_adm']['securityCode']."が、あなたのRe:SURVIVALアカウントのセキュリティコードです。";   
        
        if(mb_send_mail($_POST['customer_email'], "セキュリティコード",$messageStr )){
            cutil::redirect_exit("pass_change.php");
        } else {
            echo '<script type="text/javascript">alert("送信に失敗しました");</script>';
        }
    //  登録されていない時
    }else{
        $flg = true;
        
    }
    
}


$smarty->assign('flg',$flg);
$smarty->display('pass_email.tmpl');
?>
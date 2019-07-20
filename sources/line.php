<?php
if(isset($_POST['userId'])){
    require_once("inc_base.php");
    require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
    require_once("inc_smarty.php");
    $LINE_obj = new cLINE();
    $Lineuser = $LINE_obj->get_tgt(false,$_POST['userId']);
    if($Lineuser === false){
        //UserIdがない時
        $dataarr = array();
        $dataarr['LINE_id'] = (string)$_POST['userId'];
        $chenge = new cchange_ex();
        $mid = $chenge->insert('LINE',$dataarr);
        echo("YES:insert_true");
    }else{
        echo("YES:insert_false");
    }
}else{
    echo("NO:ACCESS");
}

?>
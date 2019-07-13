        <?php
require_once("inc_base.php");
require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
require_once("inc_smarty.php");
if(isset($_POST['con'])){
    deletedata();
}
readdata();
$smarty->assign('contact_replyed',$replyed);
$smarty->assign('contact_not_reply',$not_reply);
$smarty->assign('page',$page);
$smarty->assign('page_max',$page_max);
$smarty->assign('limit_page',$limit_page);
if(isset($_GET['page'])){
        $now_page = $_GET['page'];    
}
$smarty->assign('now_page',$now_page);
$smarty->assign('count',$now_page);
//データ抽出
function readdata(){
    $obj = new ccontact();
    $rows;
    $from;
    $limit;
    $max;
    $count1;
    $count2;
    global $page;
    global $page_max;
    global $now_page;
    global $replyed;
    global $not_reply;
    global $limit_page;
    $count1 = 0;
    $count2 = 0;
    $from = 0;
    $limit = 2;
    //ページ送りがクリックされた場合
	if(isset($_GET['page'])){
        //現在の抽出条件の何番目からを表示するか指定
        $from = ($_GET['page']-1)*$limit;
    }
    if(isset($_GET['limit'])){
        //現在の抽出条件の何番目からを表示するか指定
        $from = 0;
        $limit = 10000;
    }
    $replyed = array();
    $not_reply = array();
    $rows = $obj->get_all(false,$from,$limit);

    $max = $obj->get_all_count(false,$from,$limit);
    $page_max = floor($max/$limit);
    $page = 1;
    $now_page = 1;
    if($page_max<5){
        $limit_page = $page_max-1;
    }
    else{
        $limit_page = 5;
    }
      
    foreach($rows as $value){
        if($value['reply_flag']==0){
            $replyed[] = $value;
            if(strlen($value['contact_text'])>25){
                 $replyed[$count1]['contact_text'] = mb_substr($value['contact_text'],0,30);
                 $replyed[$count1]['contact_text'] =  $replyed[$count1]['contact_text']."...";
            }
           $count1++;
        }
        else if($value['reply_flag']==1){
             $not_reply[] = $value;
              if(strlen($value['contact_text'])>25){
                 $replyed[$count2]['contact_text'] = mb_substr($value['contact_text'],0,30);
                 $replyed[$count2]['contact_text'] =  $replyed[$count2]['contact_text']."...";
             }
             $count2++;
        }
    }

  
}
//データ削除
function deletedata(){
    $chenge = new cchange_ex();
    $con;
    $con = $_POST['con'];
    foreach($con as $value){
        $chenge->delete("contact","contact_id=" . $value);
    }
	// foreach($_POST['fruits'] as $key => $val){
	// 	$dataarr = array();
	// 	$dataarr['customer_id'] = (String)$customer_id;
	// 	$chenge->insert('customer',$dataarr);
	// }
}
$smarty->display('contact_list.tmpl');
?>
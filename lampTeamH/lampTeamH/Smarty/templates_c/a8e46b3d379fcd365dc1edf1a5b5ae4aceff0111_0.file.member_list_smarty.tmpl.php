<?php
/* Smarty version 3.1.30, created on 2019-06-04 13:57:49
  from "/home/e09/public_html/PHPBase-master/Smarty/templates/member_list_smarty.tmpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5cf5fa4d8c43a5_58859082',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a8e46b3d379fcd365dc1edf1a5b5ae4aceff0111' => 
    array (
      0 => '/home/e09/public_html/PHPBase-master/Smarty/templates/member_list_smarty.tmpl',
      1 => 1559529856,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:gmenu.tmpl' => 1,
  ),
),false)) {
function content_5cf5fa4d8c43a5_58859082 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="css/main.css" rel="stylesheet" type="text/css">
<title>メンバー一覧</title>

<?php echo '<script'; ?>
 type="text/javascript">
<!--
function set_func_form(fn,pm){
    document.form1.target = "_self";
    document.form1.func.value = fn;
    document.form1.param.value = pm;
    document.form1.submit();
}

function del_func_form(pm,mess){
    var message = "本当に\r\n";
    message += mess;
    message += "\r\nを削除しますか？";
    if(confirm(message)){
        document.form1.target = "_self";
        document.form1.func.value = 'del';
        document.form1.param.value = pm;
        document.form1.submit();
    }
}
// -->
<?php echo '</script'; ?>
>

</head>
<body>
<!-- 全体コンテナ　-->
<div id="container">
<?php $_smarty_tpl->_subTemplateRender("file:gmenu.tmpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div id="headTitle">
<h2>メンバー一覧(Smarty版)</h2>
</div>
<!-- コンテンツ　-->
<div id="inquiry">
<?php echo $_smarty_tpl->tpl_vars['ERR_STR']->value;?>

<form name="form1" action="<?php echo $_smarty_tpl->tpl_vars['tgt_uri']->value;?>
" method="post" >
<p><a href="member_detail_smarty.php">新規</a></p>
<p><?php echo $_smarty_tpl->tpl_vars['pager_arr']->value;?>
</p>
<table>
<tr>
<th>メンバーID</th>
<th>メンバー名</th>
<th>操作</th>
</tr>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rows']->value, 'value', false, 'k');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['value']->value) {
?>
<tr>
<td width="20%" class="center">
<?php echo $_smarty_tpl->tpl_vars['value']->value['member_id'];?>

</td>
<td width="65%" class="center">
<a href="member_detail_smarty.php?mid=<?php echo $_smarty_tpl->tpl_vars['value']->value['member_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value['member_name'];?>
</a>
</td>
<td width="15%" class="center">
<input type="button" value="削除確認" onClick="javascript:del_func_form(<?php echo $_smarty_tpl->tpl_vars['value']->value['member_id'];?>
,'【<?php echo $_smarty_tpl->tpl_vars['value']->value['member_name'];?>
】')" /></td>
</tr>
<?php
}
} else {
?>

<tr>
<tr><td colspan="3" class="nobottom">メンバーが見つかりません</td></tr>
</tr>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</table>
<input type="hidden" name="func" value="" />
<input type="hidden" name="param" value="" />
</form>
<p>&nbsp;</p>

</div>
<!-- /コンテンツ　-->
</div>
<!-- /全体コンテナ　-->
</body>
</html>
<?php }
}

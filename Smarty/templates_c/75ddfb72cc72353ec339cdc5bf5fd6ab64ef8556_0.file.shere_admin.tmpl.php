<?php
/* Smarty version 3.1.30, created on 2019-07-07 18:23:45
  from "/home/tmH2019/public_html/lampTeamH/Smarty/templates/shere_admin.tmpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5d21ba21c4c0f6_96553522',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '75ddfb72cc72353ec339cdc5bf5fd6ab64ef8556' => 
    array (
      0 => '/home/tmH2019/public_html/lampTeamH/Smarty/templates/shere_admin.tmpl',
      1 => 1562491418,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d21ba21c4c0f6_96553522 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="gray top" style="box-shadow:1px">
<ul>
<li><a href="#">TOP</a></li>
<li><a href="#">お買い物カゴ</a></li>
<li><a href="#">お問い合わせ</a></li>
<li><a href="#">ガイド/返品</a></li>
</ul>
</div>
<div id="header_shere">
 <img class="users" src="images/user.png">
<h1><a href="#"><img src="images/title_logo.png" width="130px" height="100px"></a></h1>
<form id="form1" action="URL">
<input id="sbox"  id="s" name="s" type="text" placeholder="キーワードを入力" />
<input id="sbtn" type="submit" value="検索" />
</form>
<div class="container1">
<a href="#" class="btn-border">ログイン</a>
<a href="#" class="btn-border">新規登録</a>
</div>
<div id="nav-drawer">
      <input id="nav-input" type="checkbox" class="nav-unshown">
      <label id="nav-open" for="nav-input"><span></span></label>
      <label class="nav-unshown" id="nav-close" for="nav-input"></label>
      <div id="nav-content">
      <div class="hamburger-top"><label class="cancel" for="nav-input"></label></div>
      <ul>
      <p>
      <img src="images/user.png" width="100px" height="100px">
      ユーザID・メアド
      </p>
      <li><a href="#"><img src="images/top.png" width="40px" height="40px">Top</a></li>
      <li><a href="manager_list.php"><img src="images/kanri.png" width="40px" height="40px">管理者一覧</a></li>
      <li><a href="#"><img src="images/return.png" width="40px" height="40px">未返却リスト</a></li>
      <li><a href="#"><img src="images/blacklist.png" width="40px" height="40px">ブラックリスト</a></li>
      <li><a href="contact_list.php"><img src="images/contact.png" width="40px" height="40px">お問い合わせ一覧</a></li>
      <li><a href="#"><img src="images/logout.png" width="40px" height="40px">ログアウト</a></li>
      </ul>
      </div>
  </div>
   <div style="height:0.1px;">
    </div>
  </div><?php }
}

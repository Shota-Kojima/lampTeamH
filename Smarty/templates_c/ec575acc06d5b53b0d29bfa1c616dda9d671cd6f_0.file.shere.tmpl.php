<?php
/* Smarty version 3.1.30, created on 2019-07-07 23:52:54
  from "/home/tmH2019/public_html/lampTeamH/Smarty/templates/shere.tmpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5d2207467658c5_53039945',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ec575acc06d5b53b0d29bfa1c616dda9d671cd6f' => 
    array (
      0 => '/home/tmH2019/public_html/lampTeamH/Smarty/templates/shere.tmpl',
      1 => 1562511168,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d2207467658c5_53039945 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="gray top">
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
      <li><a href="cart.php"><img src="images/cart1.png" width="40px" height="40px">カート</a></li>
      <li><a href="#"><img src="images/tutorial.png" width="40px" height="40px">初めての方へ</a></li>
      <li><a href="#"><img src="images/message.png" width="40px" height="40px">お問い合わせ</a></li>
      <li><a href="#"><img src="images/logout.png" width="40px" height="40px">ログアウト</a></li>
      </ul>
      </div>
  </div>
    </div>
   <div class="single" >
	<div class="container">
		 <div class="apparel_box">
			<ul class="login" style="height:15px;">
		    </ul>
		    <div class="cart_bg">
			  <ul class="cart">
				<i class="cart_icon"></i><p class="cart_desc"><?php echo $_smarty_tpl->tpl_vars['cart']->value['HTeam_adm']['product_sum'];?>
<br><span class="yellow"><?php echo $_smarty_tpl->tpl_vars['cart']->value['HTeam_adm']['product_count'];?>
個の商品</span></p>
			    <div class='clearfix'></div>
			  </ul>
			  <ul class="product_control_buttons">
				 <li><a href="#"><img src="images/close.png" alt=""/></a></li>
				 <li><a href="#">Edit</a></li>
			  </ul>
		      <div class='clearfix'></div>
			 </div>
			 <ul class="quick_access">
				<li class="view_cart"><a href="cart.php">View Cart</a></li>
				<li class="check"><a href="cart.php">Checkout</a></li>
				<div class='clearfix'></div>
		     </ul>
		  </div>
		</div>
    </div>

<?php }
}

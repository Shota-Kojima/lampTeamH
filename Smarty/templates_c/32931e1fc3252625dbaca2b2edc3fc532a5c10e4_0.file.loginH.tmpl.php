<?php
/* Smarty version 3.1.30, created on 2019-07-07 16:49:18
  from "/home/tmH2019/public_html/lampTeamH/Smarty/templates/loginH.tmpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5d21a3fe4cd611_05895843',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '32931e1fc3252625dbaca2b2edc3fc532a5c10e4' => 
    array (
      0 => '/home/tmH2019/public_html/lampTeamH/Smarty/templates/loginH.tmpl',
      1 => 1562485746,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:shere_noncart.tmpl' => 1,
  ),
),false)) {
function content_5d21a3fe4cd611_05895843 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>RE:SURVIVAL : ログイン</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<?php echo '<script'; ?>
 src="js/jquery.min.js"><?php echo '</script'; ?>
>
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/component.css" rel='stylesheet' type='text/css' />
<link href="css/manager.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php echo '<script'; ?>
 type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } <?php echo '</script'; ?>
>
<!--webfont-->
<link href='http://fonts.googleapis.com/css?family=Roboto:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<?php echo '<script'; ?>
 src="js/jquery.easydropdown.js"><?php echo '</script'; ?>
>
<!-- Add fancyBox main JS and CSS files -->
<?php echo '<script'; ?>
 src="js/jquery.magnific-popup.js" type="text/javascript"><?php echo '</script'; ?>
>
<?php $_smarty_tpl->_subTemplateRender("file:shere_noncart.tmpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<link href="css/magnific-popup.css" rel="stylesheet" type="text/css">
		<?php echo '<script'; ?>
>
			$(document).ready(function() {
				$('.popup-with-zoom-anim').magnificPopup({
					type: 'inline',
					fixedContentPos: false,
					fixedBgPos: true,
					overflowY: 'auto',
					closeBtnInside: true,s
					preloader: false,
					midClick: true,
					removalDelay: 300,
					mainClass: 'my-mfp-zoom-in'
			});
		});
		<?php echo '</script'; ?>
>
</head>
<body>
   <div class="main">
	  <div class="content_box">
		<div class="container">
			<div class="row">
			  <div class="col-md-9">
			    <div class="dreamcrub">
			   	 <ul class="breadcrumbs">
                    <li class="home">
                       <a href="products.php" title="Go to Home Page">Home</a>&nbsp;
                       <span>&gt;</span>
                    </li>
                    <li class="home">&nbsp;
                        &nbsp;Account
                        <span>&gt;</span>&nbsp;
                    </li>
                    <li class="women">
                       Login
                    </li>
                </ul>
                <ul class="previous">
                	<li><a href="products.php">Back to Previous Page</a></li>
                </ul>
                <div class="clearfix"></div>
			   </div>
			   <div class="account_grid">
			   
			   <div class="col-md-6 login-right">
			  	<h4>RE:SURVIVALにログイン</h4>
				<form action="loginH.php" method="post">
				  <div>
					<span>ユーザーID<label>*</label></span>
					<input type="text" name="login_id" value="<?php if (isset($_smarty_tpl->tpl_vars['id']->value)) {
echo $_smarty_tpl->tpl_vars['id']->value;
}?>"> 
				  </div>
				  <div>
					<span>パスワード<label>*</label></span>
					<input type="text" name="login_pw" value="<?php if (isset($_smarty_tpl->tpl_vars['pw']->value)) {
echo $_smarty_tpl->tpl_vars['pw']->value;
}?>"> 
				  </div>
				  <div style="margin-top:10px;margin-bottom:10px;color:red;" >
				   <?php if (isset($_smarty_tpl->tpl_vars['err_message']->value)) {?>
				  <?php echo $_smarty_tpl->tpl_vars['err_message']->value;?>

				  <?php }?>
				  </div>
				  <div style="display:inline-block">
				  <input type="submit" name="submit_button" value="ログイン">
				  </form>	     
				   <a class="acount-btn" href="user_Register.php" style="margin-left:5px;margin-bottom:7px">会員登録</a>
				   <div>
				   	<u><a class="forgot" href="#" style="margin-top:10px">パスワードをお忘れの場合</a></u>
				  </div>
				  </div> 
			   </div>	
			   <div class="clearfix"> </div>
			 </div>
		   </div>
		  </div>
	     </div>
	    </div>
	    </div>	
</body>
</html>		<?php }
}

<?php
/* Smarty version 3.1.30, created on 2019-07-07 17:21:25
  from "/home/tmH2019/public_html/lampTeamH/Smarty/templates/user_Register.tmpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5d21ab85a0ee48_38696150',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8d6cef5842844e0af9bfdc4df1bd6463c685928b' => 
    array (
      0 => '/home/tmH2019/public_html/lampTeamH/Smarty/templates/user_Register.tmpl',
      1 => 1562487668,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:shere_noncart.tmpl' => 1,
  ),
),false)) {
function content_5d21ab85a0ee48_38696150 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!--cssはstyle.cssを編集せずにそのまま使いました-->
<!DOCTYPE HTML>
<html>
<head>

<title>RE:SURVIVAL : 会員登録</title>
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
					closeBtnInside: true,
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
	<!--会員登録のクラス-->
    <div class="main">
	   <div class="container">
		  <div class="register">
		  	  <form action="" method="post" enctype="multipart/form-data"> 
				 <div class="register-top-grid">
					<h3>会員登録</h3>
					 <div>
					 	<?php if ($_smarty_tpl->tpl_vars['flg']->value['last_name'] == true) {?><font color="red">入力内容に問題があります</font><?php }?>
						<span>氏<font color="red">　必須</font></span>
						<select name="customer_sex">
							<option value="1">男</option>
							<option value="2">女</option>
							<option value="3">その他</option>
						</select>
						<input type="text" name="last_name" value="<?php if (isset($_smarty_tpl->tpl_vars['POST']->value['last_name'])) {
echo $_smarty_tpl->tpl_vars['POST']->value['last_name'];
}?>"> 
					 </div>
					 <div>
					 	<?php if ($_smarty_tpl->tpl_vars['flg']->value['last_name_kana'] == true) {?><font color="red">入力内容に問題があります</font><?php }?>
						<span>せい<font color="red">　必須</font></span>
						<input type="text" name="last_name_kana" value="<?php if (isset($_smarty_tpl->tpl_vars['POST']->value['last_name_kana'])) {
echo $_smarty_tpl->tpl_vars['POST']->value['last_name_kana'];
}?>"> 
					 </div>
					 <div>
					 	<?php if ($_smarty_tpl->tpl_vars['flg']->value['first_name'] == true) {?><font color="red">入力内容に問題があります</font><?php }?>
						<span>名<font color="red">　必須</font></span>
						<input type="text" name="first_name" value="<?php if (isset($_smarty_tpl->tpl_vars['POST']->value['first_name'])) {
echo $_smarty_tpl->tpl_vars['POST']->value['first_name'];
}?>"> 
					 </div>
					 <div>
					 	<?php if ($_smarty_tpl->tpl_vars['flg']->value['first_name_kana'] == true) {?><font color="red">入力内容に問題があります</font><?php }?>
						<span>めい<font color="red">　必須</font></span>
						<input type="text" name="first_name_kana" value="<?php if (isset($_smarty_tpl->tpl_vars['POST']->value['first_name_kana'])) {
echo $_smarty_tpl->tpl_vars['POST']->value['first_name_kana'];
}?>"> 
					 </div>
					 <div>
					 	<?php if ($_smarty_tpl->tpl_vars['flg']->value['customer_address'] == true) {?><font color="red">入力内容に問題があります</font><?php }?>
						<span>住所<font color="red">　必須</font></span>
						<select name="ken">
						<option value="" selected>都道府県</option>
							<option value="1">北海道</option>
							<option value="2">青森県</option>
							<option value="3">岩手県</option>
							<option value="4">宮城県</option>
							<option value="5">秋田県</option>
							<option value="6">山形県</option>
							<option value="7">福島県</option>
							<option value="8">茨城県</option>
							<option value="9">栃木県</option>
							<option value="10">群馬県</option>
							<option value="11">埼玉県</option>
							<option value="12">千葉県</option>
							<option value="13">東京都</option>
							<option value="14">神奈川県</option>
							<option value="15">新潟県</option>
							<option value="16">富山県</option>
							<option value="17">石川県</option>
							<option value="18">福井県</option>
							<option value="19">山梨県</option>
							<option value="20">長野県</option>
							<option value="21">岐阜県</option>
							<option value="22">静岡県</option>
							<option value="23">愛知県</option>
							<option value="24">三重県</option>
							<option value="25">滋賀県</option>
							<option value="26">京都府</option>
							<option value="27">大阪府</option>
							<option value="28">兵庫県</option>
							<option value="29">奈良県</option>
							<option value="30">和歌山県</option>
							<option value="31">鳥取県</option>
							<option value="32">島根県</option>
							<option value="33">岡山県</option>
							<option value="34">広島県</option>
							<option value="35">山口県</option>
							<option value="36">徳島県</option>
							<option value="37">香川県</option>
							<option value="38">愛媛県</option>
							<option value="39">高知県</option>
							<option value="40">福岡県</option>
							<option value="41">佐賀県</option>
							<option value="42">長崎県</option>
							<option value="43">熊本県</option>
							<option value="44">大分県</option>
							<option value="45">宮崎県</option>
							<option value="46">鹿児島県</option>
							<option value="47">沖縄県</option>
							</select>
						<input type="text" name="customer_address" value="<?php if (isset($_smarty_tpl->tpl_vars['POST']->value['customer_address'])) {
echo $_smarty_tpl->tpl_vars['POST']->value['customer_address'];
}?>"> 
					 </div>
					 <div>
						 <?php if ($_smarty_tpl->tpl_vars['flg']->value['customer_email'] == true) {?><font color="red">入力内容に問題があります</font><?php }?>
						 <span>メールアドレス<font color="red">　必須</font></span>
						 <input type="text" name="customer_email" autocomplete="off" value="<?php if (isset($_smarty_tpl->tpl_vars['POST']->value['customer_email'])) {
echo $_smarty_tpl->tpl_vars['POST']->value['customer_email'];
}?>">
					 </div>
					 <div class="clearfix"> </div>
					   <a class="news-letter" href="#">
						 <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>メールでお知らせを受け取る</label>
					   </a>
					 </div>
				     <div class="register-bottom-grid">
							<h3>ID・パスワード登録</h3>
							<div>
								<?php if ($_smarty_tpl->tpl_vars['flg']->value['customer_id'] == true) {?><font color="red">このIDは使用されています</font><?php }?>
								<span>ID<font color="red">　必須</font></span>
								<input type="text" name="customer_id" autocomplete="off" value="<?php if (isset($_smarty_tpl->tpl_vars['POST']->value['customer_id'])) {
echo $_smarty_tpl->tpl_vars['POST']->value['customer_id'];
}?>">
							 </div>
							 <div>
							 	<?php if ($_smarty_tpl->tpl_vars['flg']->value['customer_password'] == true) {?><font color="red">パスワードに問題があります</font><?php }?>
								<span>パスワード(6文字以上15文字以下　半角英数)<font color="red">　必須</font></span>
								<input type="password" name="customer_password" size="30" minlength="8" pattern="[a-zA-Z0-9]+" title="パスワードは8文字以上の半角英数字で入力してください。" required autocomplete="off">
							 </div>
							 <div>
								<span>パスワード確認<font color="red">　必須</font></span>
								<input type="password" name="customer_password_check" size="30" minlength="8" pattern="[a-zA-Z0-9]+" title="パスワードは8文字以上の半角英数字で入力してください。" required autocomplete="off">
							 </div>
					 </div>
					 <div class="register-but">
				
						<input type="submit" value="確認">
						<div class="clearfix"> 
						</div>
				
					</div>
				</form>
		   </div>
	    </div>
	</div>

		<div class="container">
		  <div class="brands">
			 <ul class="brand_icons">
				<li><img src='images/icon1.jpg' class="img-responsive" alt=""/></li>
				<li><img src='images/icon2.jpg' class="img-responsive" alt=""/></li>
				<li><img src='images/icon3.jpg' class="img-responsive" alt=""/></li>
				<li><img src='images/icon4.jpg' class="img-responsive" alt=""/></li>
				<li><img src='images/icon5.jpg' class="img-responsive" alt=""/></li>
				<li><img src='images/icon6.jpg' class="img-responsive" alt=""/></li>
				<li class="last"><img src='images/icon7.jpg' class="img-responsive" alt=""/></li>
			 </ul>
		   </div>
	    </div>
	    <div class="container">
	      <div class="instagram_top">
	      	<div class="instagram text-center">
				<h3><i class="insta_icon"> </i> Instagram feed:&nbsp;<span class="small">#Surfhouse</span></h3>
			</div>
	        <ul class="instagram_grid">
			  <li><a class="popup-with-zoom-anim" href="#small-dialog1"><img src="images/i1.jpg" class="img-responsive"alt=""/></a></li>
			  <li><a class="popup-with-zoom-anim" href="#small-dialog1"><img src="images/i2.jpg" class="img-responsive" alt=""/></a></li>
			  <li><a class="popup-with-zoom-anim" href="#small-dialog1"><img src="images/i3.jpg" class="img-responsive" alt=""/></a></li>
			  <li><a class="popup-with-zoom-anim" href="#small-dialog1"><img src="images/i4.jpg" class="img-responsive" alt=""/></a></li>
			  <li><a class="popup-with-zoom-anim" href="#small-dialog1"><img src="images/i5.jpg" class="img-responsive" alt=""/></a></li>
			  <li class="last_instagram"><a class="popup-with-zoom-anim" href="#small-dialog1"><img src="images/i6.jpg" class="img-responsive" alt=""/></a></li>
			  <div class="clearfix"></div>
			  <div id="small-dialog1" class="mfp-hide">
				<div class="pop_up">
					<h4>A Sample Photo Stream</h4>
					<img src="images/i_zoom.jpg" class="img-responsive" alt=""/>
				</div>
			  </div>
			</ul>
		  </div>
	      <ul class="footer_social">
			<li><a href="#"> <i class="fb"> </i> </a></li>
			<li><a href="#"><i class="tw"> </i> </a></li>
			<li><a href="#"><i class="pin"> </i> </a></li>
			<div class="clearfix"></div>
		   </ul>
	    </div>
        <div class="footer">
			<div class="container">
				<div class="footer-grid">
					<h3>Category</h3>
					<ul class="list1">
					  <li><a href="#">Home</a></li>
					  <li><a href="#">About us</a></li>
					  <li><a href="#">Eshop</a></li>
					  <li><a href="#">Features</a></li>
					  <li><a href="#">New Collections</a></li>
					  <li><a href="#">Blog</a></li>
					  <li><a href="#">Contact</a></li>
				    </ul>
				</div>
				<div class="footer-grid">
					<h3>Our Account</h3>
				    <ul class="list1">
					  <li><a href="#">Your Account</a></li>
					  <li><a href="#">Personal information</a></li>
					  <li><a href="#">Addresses</a></li>
					  <li><a href="#">Discount</a></li>
					  <li><a href="#">Orders history</a></li>
					  <li><a href="#">Addresses</a></li>
					  <li><a href="#">Search Terms</a></li>
				    </ul>
				</div>
				<div class="footer-grid">
					<h3>Our Support</h3>
					<ul class="list1">
					  <li><a href="#">Site Map</a></li>
					  <li><a href="#">Search Terms</a></li>
					  <li><a href="#">Advanced Search</a></li>
					  <li><a href="#">Mobile</a></li>
					  <li><a href="#">Contact Us</a></li>
					  <li><a href="#">Mobile</a></li>
					  <li><a href="#">Addresses</a></li>
				    </ul>
				  </div>
				  <div class="footer-grid">
					<h3>Newsletter</h3>
					<p class="footer_desc">Nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat</p>
					<div class="search_footer">
					
			          <input type="text" class="text" value="Insert Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Insert Email';}">
			          <input type="submit" value="Submit">
					
			        </div>
			        <img src="images/payment.png" class="img-responsive" alt=""/>
				 </div>
				 <div class="footer-grid footer-grid_last">
					<h3>About Us</h3>
					<p class="footer_desc">Diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam,.</p>
                    <p class="f_text">Phone:  &nbsp;&nbsp;&nbsp;00-250-2131</p>
                    <p class="email">Email: &nbsp;&nbsp;&nbsp;<span>info(at)Surfhouse.com</span></p>	
                 </div>
				 <div class="clearfix"> </div>
			</div>
		</div>
        <div class="footer_bottom">
        	<div class="container">
        		<div class="copy">
				   <p>&copy; 2014 Template by <a href="http://w3layouts.com" target="_blank"> w3layouts</a></p>
			    </div>
        	</div>
        </div>
</body>
</html>		<?php }
}

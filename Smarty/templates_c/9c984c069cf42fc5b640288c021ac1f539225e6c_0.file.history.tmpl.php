<?php
/* Smarty version 3.1.30, created on 2019-07-07 16:48:36
  from "/home/tmH2019/public_html/lampTeamH/Smarty/templates/history.tmpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5d21a3d410dff5_69868028',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9c984c069cf42fc5b640288c021ac1f539225e6c' => 
    array (
      0 => '/home/tmH2019/public_html/lampTeamH/Smarty/templates/history.tmpl',
      1 => 1562485692,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:shere.tmpl' => 1,
  ),
),false)) {
function content_5d21a3d410dff5_69868028 (Smarty_Internal_Template $_smarty_tpl) {
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
<title>RE:SURVIVAL : 注文履歴</title>
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
<?php $_smarty_tpl->_subTemplateRender("file:shere.tmpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<link href="css/magnific-popup.css" rel="stylesheet" type="text/css">
<!--注文履歴のcss-->
<link href="css/history.css" rel='stylesheet' type='text/css' />
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
    <div class="main">
	   <div class="container">
          <div class="history">
          	<font size="7" color="#FF5B36">注文履歴</font>
		  	<div class="box11">
    			<font color="#FF5B36">注文日</font><span class="gou">合計</span><span class="ko">個数</span><span class="si">お支払方法</span>
				<br>2019/06/29<span class="kei">¥9,600</span><span class="ten">1点</span><span class="ha">代金引換</span>
				<div class="shipping"><font color="#ff0000">発送中</font></div>
                	<div class="mono">
						<div class="mono1">
							<a href="#"><img src="images/pic1.jpg"  width="120" height="120">
						</div>
						<p><b><font size="5">商品名</font></b></a><br><font color="#ff0000">¥9,600</font></p>
						<button class="re" type="button">再度購入</button>
						<button class="review" type="button">商品のレビューを書く</button>
						</div>
			</div>
		  	<div class="box11">
    			<font color="#FF5B36">注文日</font><span class="gou">合計</span><span class="ko">個数</span><span class="si">お支払方法</span>
				<br>2019/06/20<span class="kei">¥5,000</span><span class="ten">2点</span><span class="ha">コンビニ決済</span>
                <div class="shipping"><font color="#00ff7f">発送済み</font></div>
					<div class="mono">
						<div class="mono1">
							<a href="#"><img src="images/pic2.jpg"  width="120" height="120">
						</div>
							<p><b><font size="5">商品名</font></b></a><br><font color="#ff0000">¥2,500</font></p>
							<button class="re" type="button">再度購入</button>
					</div>
					<div class="mono">
						<div class="mono1">
							<a href="#"><img src="images/pic3.jpg"  width="120" height="120">
						</div>
							<p><b><font size="5">商品名</font></b></a><br><font color="#ff0000">¥2,500</font></p>
							<button class="re" type="button">再度購入</button>
						</div>
						<button class="review" type="button">商品のレビューを書く</button>
					</div>
					<ul class="paging">
						<li><a href="#">&laquo; 前</a></li>
						<li><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
						<li><a href="#">6</a></li>
						<li><a href="#">次 &raquo;</a></li>
						</ul>
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

<?php
/* Smarty version 3.1.30, created on 2019-07-07 17:09:46
  from "/home/tmH2019/public_html/lampTeamH/Smarty/templates/user_details.tmpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5d21a8ca683137_67473077',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '24d3fd37280ce9fadf4209b5648d3a3ac2a42169' => 
    array (
      0 => '/home/tmH2019/public_html/lampTeamH/Smarty/templates/user_details.tmpl',
      1 => 1562486962,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:shere.tmpl' => 1,
  ),
),false)) {
function content_5d21a8ca683137_67473077 (Smarty_Internal_Template $_smarty_tpl) {
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
<title>RE:SURVIVAL : ユーザ詳細</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/user_details.css" rel='stylesheet' type='text/css' />
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
<!-- ここからユーザー詳細 -->
    <div class="main">
		<div class="left">
			<!-- ユーザーが任意の写真を設定(現在はりぼて) -->
			<div class="userpic">   
				<img src="images/pic1.jpg" alt="ユーザー写真" width="200" height="230">
			</div>
			<!-- ユーザー名と評価(こちらもはりぼて) -->
			<p class="name">ここにユーザー名</p>
			<p class="name">ユーザーの評価</p>
			<div class="star-rating">
				<div class="star-rating-front" style="width: 50%">★★★★★</div>
				<div class="star-rating-back">★★★★★</div>
			</div>
		</div>
		<!-- 右側に一覧 -->
		<div class="tabs">
			<input id="all" type="radio" name="tab_item" checked>
			<label class="tab_item" for="all">出品一覧</label>
			<input id="evaluation" type="radio" name="tab_item">
			<label class="tab_item" for="evaluation">評価一覧</label>
			<!-- 商品画像、商品名、日付 -->
			<div class="tab_content" id="all_content">	
				<ul>
				<li><div class="flame"><div class="ribbon19-content"><span class="ribbon19">SOLD</span></div>
					<img class="products" src="images/pic2.jpg" alt="商品写真"></img><p>2019.6.17</p></div>
				<li><div class="flame"><div class="ribbon19-content"><span class="ribbon19">SOLD</span></div>
					<img class="products" src="images/pic3.jpg" alt="商品写真"></img><p>2019.6.7</p></div>
				<li><div class="flame"><div class="ribbon19-content"><span class="ribbon19">SOLD</span></div>
					<img class="products" src="images/pic4.jpg" alt="商品写真"></img><p>2019.5.27</p></div>
				<li><div class="flame"><div class="ribbon19-content"><span class="ribbon19">SOLD</span></div>
					<img class="products" src="images/pic5.jpg" alt="商品写真"></img><p>2019.5.20</p></div>
				<li><div class="flame"><div class="ribbon19-content"><span class="ribbon19">SOLD</span></div>
					<img class="products" src="images/pic6.jpg" alt="商品写真"></img><p>2019.5.3</p></div>
				<li><div class="flame"><div class="ribbon19-content"><span class="ribbon19">SOLD</span></div>
					<img class="products" src="images/pic7.jpg" alt="商品写真"></img><p>2019.4.22</p></div>
				</ul>	
			</div>
			<div class="tab_content" id="evaluation_content">
				<ul>
				<li><div class="eva_pic"><img src="images/smal.jpg"></div>
					<div class="balloon"><strong>ユーザー名</strong><span class="rate">★★★★★</span>
					<p>品物の状態が良く、発送も早かったです。</p><p class="time">🕒2019/6/29/15:33</p></div><li>
				<li><div class="eva_pic"><img src="images/smal1.jpg"></div>
					<div class="balloon"><strong>ユーザー名</strong><span class="rate">★★★★★</span>
					<p>返信が速く、スムーズに取引できました。</p><p class="time">🕒2019/6/24/14:21</p></div><li>
				<li><div class="eva_pic"><img src="images/smal2.jpg"></div>
					<div class="balloon"><strong>ユーザー名</strong><span class="rate">★★★★★</span>
					<p>概ね満足だったが品物の梱包が少し雑だった。</p><p class="time">🕒2019/6/23/5:23</p></div><li>
				<li><div class="eva_pic"><img src="images/smal3.jpg"></div>
					<div class="balloon"><strong>ユーザー名</strong><span class="rate">★★★★★</span>
					<p>大満足！！</p><p class="time">🕒2019/5/9/17:09</p></div><li>
				<li><div class="eva_pic"><img src="images/s1.jpg"></div>
					<div class="balloon"><strong>ユーザー名</strong><span class="rate">★★★★★</span>
					<p>返信が遅かった。</p><p class="time">🕒2019/5/6/21:56</p></div><li>
				<li><div class="eva_pic"><img src="images/s2.jpg"></div>
					<div class="balloon"><strong>ユーザー名</strong><span class="rate">★★★★★</span>
					<p>品物の状態が良く、発送も早かったです。</p><p class="time">🕒2019/4/25/23:43</p></div><li>
				<ul>
			</div>	
		</div>
		<br clear="left">
    </div>                    
<!-- アイコンだしてるだけ -->
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
		<!-- ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー -->
		<!-- 注目 -->
		<!-- ここ嘘に使えます -->
		<!-- インスタに上がってますよアピール -->
		<!-- ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー -->
	    <div class="container">
	      <div class="instagram_top">
	      	<div class="instagram text-center">
				<h3><i class="insta_icon"> </i> Instagram feed:&nbsp;<span class="small">#Surfhouse</span></h3>
			</div>
			<!-- クリックしたらその画像表示する -->
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
		  <!-- このhrefにリンクつけて -->
		  <!-- Facebook(fb)Twitter(tw)しらね(しらね)のページにでも飛ばすか？ -->
	      <ul class="footer_social">
			<li><a href="#"> <i class="fb"> </i> </a></li>
			<li><a href="#"><i class="tw"> </i> </a></li>
			<li><a href="#"><i class="pin"> </i> </a></li>
			<div class="clearfix"></div>
		   </ul>
	    </div>
	 </div>
<!-- いろいろ詰め込んどけゾーン -->
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
</html><?php }
}

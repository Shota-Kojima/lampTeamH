<?php
/* Smarty version 3.1.30, created on 2019-07-08 10:17:02
  from "/home/tmH2019/public_html/lampTeamH/Smarty/templates/Purchase.tmpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5d22998e5ab5f9_10486651',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'abb8139e36b67a198a635b74e2402e3e2c809068' => 
    array (
      0 => '/home/tmH2019/public_html/lampTeamH/Smarty/templates/Purchase.tmpl',
      1 => 1562548600,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:shere_admin.tmpl' => 1,
  ),
),false)) {
function content_5d22998e5ab5f9_10486651 (Smarty_Internal_Template $_smarty_tpl) {
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
<title>RE:SURVIVAL : カート</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<?php echo '<script'; ?>
 src="js/jquery.min.js"><?php echo '</script'; ?>
>
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/component.css" rel='stylesheet' type='text/css' />
<link href="css/manager.css" rel='stylesheet' type='text/css' />
<link href="css/Purchase.css" rel='stylesheet' type='text/css' />
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
<link href="css/magnific-popup.css" rel="stylesheet" type="text/css">
<?php $_smarty_tpl->_subTemplateRender("file:shere_admin.tmpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

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
    <div class="buy">
	   <div class="container">
		   <div class="register">
           <h4 class="title">お支払い方法を選択</h4>
           <div class="kakomi-box">
                <p class="cart"><b style="font-size:20px;">クレジットカード以外のお支払い方法</b></p>
                <h4 class="title"></h4>
             <p class="cart">
             <input type="radio" name="trigger" value=""><b>代金引換</b>国内配送のみ。代引手数料がかかります。獲得したポイントは、支払い後に確定します。詳しくはこちらをご確認ください。
             <br><br>
             <input type="radio" name="trigger" value=""><b>コンビニ・ATM・ネットバンキング・ 電子マネー払い</b>代金のお支払い後に商品が発送されます。なお、お支払いの際に必要となるお支払い番号は、出荷準備に入り次第発行されます。発行後は注文履歴からもお支払い番号を確認できます。その他の詳細はこちら。</p>
                <p class="cart" style="margin-top:20px;"><b style="font-size:20px;">RE:SURVIVALポイント</b></p>
                <h4 class="title"></h4>
                <p class="cart">
                <b>RE:SURVIVALポイント:</b>
                <br>
             <input type="radio" name="survival" value="">今回の注文で利用可能なポイントをすべて利用する
             <br><br>
             <input type="radio" name="survival" value="">一部のポイントを利用する<input type="">pt</p>
              </div>
              <div class="kakomi-box1">
              <div class="btn111">
				   <form>
					 <input type="submit" value="次に進む" title="">
				  </form>
                  注文の最終確認ができます
				</div>
                </div>
			<h4 class="title" style="margin-top:20px;">その他のお支払いオプション</h4>
		  	  <p class="cart"><b style="font-size:20px;">クレジットカード</b><br>以下のクレジットカードをご利用いただけます<br>
                <img src="images/Visa.png"  height="30px">
                <img src="images/Paypal.png"  height="30px">
                <img src="images/Jcb.png"  height="30px">
                <img src="images/Master.png"  height="30px">
                <br>
                <a href="products.php">カードを追加</a></p>
                <h4 class="title" style="margin-top:20px;"></h4>
		  	  <p class="cart"><b style="font-size:20px;">携帯決済</b><br>
                <img src="images/docomo.png"  height="30px">
                <img src="images/au.png"  height="30px">
                <img src="images/softbank.png"  height="30px">
                <br>
                <a href="products.php">新しいアカウント追加</a></p>
             </div>
             </div>
		   
	     </div>
	    </div>
		
	     
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

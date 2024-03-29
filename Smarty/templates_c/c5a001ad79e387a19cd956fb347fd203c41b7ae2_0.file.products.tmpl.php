<?php
/* Smarty version 3.1.30, created on 2019-07-08 01:13:48
  from "/home/tmH2019/public_html/lampTeamH/Smarty/templates/products.tmpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5d221a3c446646_31538965',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c5a001ad79e387a19cd956fb347fd203c41b7ae2' => 
    array (
      0 => '/home/tmH2019/public_html/lampTeamH/Smarty/templates/products.tmpl',
      1 => 1562516003,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:shere.tmpl' => 1,
  ),
),false)) {
function content_5d221a3c446646_31538965 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!--
	ここ最後まで読んでくれ
	よめ
	よめ
	よめ
	よめ
「商品一覧ページ」
class は　CSSなどにあらかじめ設定してある色などを設定することができる
cart_bgって名前のclassはオレンジ色にしたりする
(css/style.cssの174行目参照)

	ーーーーーーーーーーーーーー見るところーーーーーーーーーーーーーーーーーー
	1.CSSファイルは読まなくていい(時間の無駄)
	2.Clasに設定している物によって、「何色に変わるか」、「どんなフォントになるか」「どんな配置になるか」
	を見てくれ
	3.Classでよく使われている [clearfix]そして、[container] ってのがあるんだけど、
	これが超重要になる 
	clearfixについて：http://creator.aainc.co.jp/archives/4721
	container:https://www.ipentec.com/document/html-css-bootstrap-container
	ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー

	６分くらいでよめるから頑張ってくれ！
	あと時間あったらJquery調べといて！よろ
-->
<!DOCTYPE HTML>
<html>
<head>

<!-- タイトル名の設定と、CSSの読み込み -->
<title>Surfhouse Bootstarp Website Template | Home :: w3layouts</title>
<link href="./css/bootstrap.css" rel='stylesheet' type='text/css' />

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- jQueryの読み込み -->
<?php echo '<script'; ?>
 src="js/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="js/tab.js"><?php echo '</script'; ?>
>

<!-- Custom Theme files -->
<link href="./css/products.css" rel='stylesheet' type='text/css' />
<link href="css/products_header.css" rel='stylesheet' type='text/css' />
<link href="./css/style.css" rel='stylesheet' type='text/css' />
<link href="./css/tab.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php echo '<script'; ?>
 type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } <?php echo '</script'; ?>
>

<!--webfont-->
<!-- これ大事 -->
<!-- CDN(URLでCSSを読み込むことができるもの)でフォントを設定する -->
<link href='http://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
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
	<!-- ここから商品一覧らへん -->
	<div class="main">
	  <div class="content_box">
		<div class="container">
			<div class="row">
				<!-- あと商品出してるだけ -->
			     <div class="col-md-12">
				<h4 class="title">Products</h4>
				<!--タブ-->
				<ul class="tab-group">
					<li class="tab is-active">販売商品</li>
					<li class="tab">レンタル商品</li>
					<li class="tab">フリマ商品</li>
				</ul>
				<form action="products.php" method="get">
				<ul class="sort_command">
					<span style="margin-left:100px">
					<li ><a href="products.php?sort_method=aiueo_order">五十音順</a></li>
					<li ><a href="products.php?sort_method=sales_order">売れ筋順</a></li>
					<li ><a href="products.php?sort_method=price_desk_order">価格高い順</a></li>
					<li ><a href="products.php?sort_method=price_ask_order">価格低い順</a></li>
					<ul>
					</span>
					</ul>
					<span style="margin-left:220px">
					<ul>
					<li ><a href="#">１</a></li>
					<li ><a href="#">２</a></li>
					<li ><a href="#">３</a></li>
					<li ><a href="#">４</a></li>
					<li ><a href="#">５</a></li>
					</ul>
					</span>
				</ul>
				</form>
				<span style="display:flex">
				<span id="category_zone" style="position:absolute;">
				<h4 id="category">カテゴリ</h4>
				<ul style="margin-top:40px;">
				<div id="category_main">ライティング</div>
				<ul id="category_sub">
				<li id="category_detail"><a href="products.php?product_category=">ガソリンランタン</a></li>
				<li id="category_detail"><a href="products.php?product_category=">LPガスランタン</a></li>
				<li id="category_detail"><a href="products.php?product_category=">LEDライテイング</a></li>
				</ul>
				</ul>
				<ul style="margin-top:105px;">
				<div id="category_main">バッグ</div>
				<ul id="category_sub">
				<li id="category_detail"><a href="products.php?product_category=">大人用</a></li>
				<li id="category_detail"><a href="products.php?product_category=">子供用</a></li>
				</ul>
				</ul>
				<ul style="margin-top:170px;">
				<div id="category_main">テント＆タープ</div>
				<ul id="category_sub">
				<li id="category_detail"><a href="products.php?product_category=">テント</a></li>
				<li id="category_detail"><a href="products.php?product_category=">タープ</a></li>
				<li id="category_detail"><a href="products.php?product_category=">シェード</a></li>
				</ul>
				</ul>
				<ul style="margin-top:235px;">
				<div id="category_main">スリーピングバッグ</div>
				<ul id="category_sub">
				<li id="category_detail"><a href="products.php?product_category=">マット</a></li>
				<li id="category_detail"><a href="products.php?product_category=">レンタングラー</a></li>
				<li id="category_detail"><a href="products.php?product_category=">エアーベッド</a></li>
				</ul>
				</ul>
				<ul style="margin-top:300px;">
				<div id="category_main">クッキング＆ヒーティング</div>
				<ul id="category_sub">
				<li id="category_detail"><a href="products.php?product_category=">バーナー</a></li>
				<li id="category_detail"><a href="products.php?product_category=">グリル</a></li>
				<li id="category_detail"><a href="products.php?product_category=">ヒーター</a></li>
				<li id="category_detail"><a href="products.php?product_category=">クックウェア</a></li>
				</ul>
				</ul>
				<ul style="margin-top:365px;">
				<div id="category_main">クーラー＆ジャグ</div>
				<ul id="category_sub">
				<li id="category_detail"><a href="products.php?product_category=">ハードクーラー</a></li>
				<li id="category_detail"><a href="products.php?product_category=">ソフトクーラー</a></li>
				<li id="category_detail"><a href="products.php?product_category=">ジャグ</a></li>
				</ul>
				</ul>
				<ul style="margin-top:430px;">
				<div id="category_main">ファニチャー</div>
				<ul id="category_sub">
				<li id="category_detail"><a href="products.php?product_category=">チェア</a></li>
				<li id="category_detail"><a href="products.php?product_category=">テーブル</a></li>
				<li id="category_detail"><a href="products.php?product_category=">キッチンテーブル</a></li>
				<li id="category_detail"><a href="products.php?product_category=">オールインワン</a></li>
				</ul>
				</ul>
				</span>
				<!--タブを切り替えて表示するコンテンツ-->
				<span class="panel-group" style="float:right position:absolute">
						<span class="panel is-show">
						<div></div>
							<?php
$_smarty_tpl->tpl_vars['start'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['start']->step = 1;$_smarty_tpl->tpl_vars['start']->total = (int) ceil(($_smarty_tpl->tpl_vars['start']->step > 0 ? $_smarty_tpl->tpl_vars['limit']->value+1 - (0) : 0-($_smarty_tpl->tpl_vars['limit']->value)+1)/abs($_smarty_tpl->tpl_vars['start']->step));
if ($_smarty_tpl->tpl_vars['start']->total > 0) {
for ($_smarty_tpl->tpl_vars['start']->value = 0, $_smarty_tpl->tpl_vars['start']->iteration = 1;$_smarty_tpl->tpl_vars['start']->iteration <= $_smarty_tpl->tpl_vars['start']->total;$_smarty_tpl->tpl_vars['start']->value += $_smarty_tpl->tpl_vars['start']->step, $_smarty_tpl->tpl_vars['start']->iteration++) {
$_smarty_tpl->tpl_vars['start']->first = $_smarty_tpl->tpl_vars['start']->iteration == 1;$_smarty_tpl->tpl_vars['start']->last = $_smarty_tpl->tpl_vars['start']->iteration == $_smarty_tpl->tpl_vars['start']->total;?>
							<?php if ($_smarty_tpl->tpl_vars['products']->value[$_smarty_tpl->tpl_vars['start']->value]['product_category'] == 1) {?>
							<div class="col_1_of_3 span_1_of_3"> 
								<a href="productDetail_smarty.php?product_id=<?php echo $_smarty_tpl->tpl_vars['products']->value[$_smarty_tpl->tpl_vars['start']->value]['product_id'];?>
">
									<div class="product_image">
										<img src="<?php echo $_smarty_tpl->tpl_vars['products']->value[$_smarty_tpl->tpl_vars['start']->value]['product_pass'];?>
" class="product_images"/>
										<div id="add_info">
											<div id="product_name">
												<p style="display:inline-block;text-align:left;"><?php echo $_smarty_tpl->tpl_vars['products']->value[$_smarty_tpl->tpl_vars['start']->value]['product_name'];?>
<p>
											</div>
											<div id="product_price">
												<div style="display:inline-block;text-align:left;"><p style="margin-top:15px;">￥<?php echo $_smarty_tpl->tpl_vars['products']->value[$_smarty_tpl->tpl_vars['start']->value]['price'];?>
</p></div>
											</div>
										</div>
									</div>
								</a>
							</div>
							<?php }?>
							<?php }
}
?>

						</span>
						
						<span class="panel">
						<div></div>
							<?php
$_smarty_tpl->tpl_vars['start'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['start']->step = 1;$_smarty_tpl->tpl_vars['start']->total = (int) ceil(($_smarty_tpl->tpl_vars['start']->step > 0 ? $_smarty_tpl->tpl_vars['limit']->value+1 - (0) : 0-($_smarty_tpl->tpl_vars['limit']->value)+1)/abs($_smarty_tpl->tpl_vars['start']->step));
if ($_smarty_tpl->tpl_vars['start']->total > 0) {
for ($_smarty_tpl->tpl_vars['start']->value = 0, $_smarty_tpl->tpl_vars['start']->iteration = 1;$_smarty_tpl->tpl_vars['start']->iteration <= $_smarty_tpl->tpl_vars['start']->total;$_smarty_tpl->tpl_vars['start']->value += $_smarty_tpl->tpl_vars['start']->step, $_smarty_tpl->tpl_vars['start']->iteration++) {
$_smarty_tpl->tpl_vars['start']->first = $_smarty_tpl->tpl_vars['start']->iteration == 1;$_smarty_tpl->tpl_vars['start']->last = $_smarty_tpl->tpl_vars['start']->iteration == $_smarty_tpl->tpl_vars['start']->total;?>
							<?php if ($_smarty_tpl->tpl_vars['products']->value[$_smarty_tpl->tpl_vars['start']->value]['product_category'] == 2) {?>
							<div class="col_1_of_3 span_1_of_3"> 
								<a href="productDetail_smarty.php?product_id=<?php echo $_smarty_tpl->tpl_vars['products']->value[$_smarty_tpl->tpl_vars['start']->value]['product_id'];?>
">
									<div class="product_image">
										<div style="height:60px;background:white;color:black;font-size:15px;text-align:center;">
											<p style="display:inline-block;text-align:left;"><?php echo $_smarty_tpl->tpl_vars['products']->value[$_smarty_tpl->tpl_vars['start']->value]['product_name'];?>
<p>
										</div>
										<img src="<?php echo $_smarty_tpl->tpl_vars['products']->value[$_smarty_tpl->tpl_vars['start']->value]['product_pass'];?>
" class="product_images"/>
										<div style="height:60px;background:white;color:black;font-size:20px;text-align:center;">
											<div style="display:inline-block;text-align:left;"><p style="margin-top:15px;">￥<?php echo $_smarty_tpl->tpl_vars['products']->value[$_smarty_tpl->tpl_vars['start']->value]['price'];?>
</p></div>
										</div>
									</div>
								</a>
							</div>
							<?php }?>
							<?php }
}
?>

						</span>

						<span class="panel">
						<div></div>
							<?php
$_smarty_tpl->tpl_vars['start'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['start']->step = 1;$_smarty_tpl->tpl_vars['start']->total = (int) ceil(($_smarty_tpl->tpl_vars['start']->step > 0 ? $_smarty_tpl->tpl_vars['limit']->value+1 - (0) : 0-($_smarty_tpl->tpl_vars['limit']->value)+1)/abs($_smarty_tpl->tpl_vars['start']->step));
if ($_smarty_tpl->tpl_vars['start']->total > 0) {
for ($_smarty_tpl->tpl_vars['start']->value = 0, $_smarty_tpl->tpl_vars['start']->iteration = 1;$_smarty_tpl->tpl_vars['start']->iteration <= $_smarty_tpl->tpl_vars['start']->total;$_smarty_tpl->tpl_vars['start']->value += $_smarty_tpl->tpl_vars['start']->step, $_smarty_tpl->tpl_vars['start']->iteration++) {
$_smarty_tpl->tpl_vars['start']->first = $_smarty_tpl->tpl_vars['start']->iteration == 1;$_smarty_tpl->tpl_vars['start']->last = $_smarty_tpl->tpl_vars['start']->iteration == $_smarty_tpl->tpl_vars['start']->total;?>
							<?php if ($_smarty_tpl->tpl_vars['products']->value[$_smarty_tpl->tpl_vars['start']->value]['product_category'] == 3) {?>
							<div class="col_1_of_3 span_1_of_3"> 
								<a href="productDetail_smarty.php?product_id=<?php echo $_smarty_tpl->tpl_vars['products']->value[$_smarty_tpl->tpl_vars['start']->value]['product_id'];?>
">
									<div class="product_image">
										<div style="height:60px;background:white;color:black;font-size:15px;text-align:center;">
											<p style="display:inline-block;text-align:left;"><?php echo $_smarty_tpl->tpl_vars['products']->value[$_smarty_tpl->tpl_vars['start']->value]['product_name'];?>
<p>
										</div>
										<img src="<?php echo $_smarty_tpl->tpl_vars['products']->value[$_smarty_tpl->tpl_vars['start']->value]['product_pass'];?>
" class="product_images"/>
										<div style="height:60px;background:white;color:black;font-size:20px;text-align:center;">
											<div style="display:inline-block;text-align:left;"><p style="margin-top:15px;">￥<?php echo $_smarty_tpl->tpl_vars['products']->value[$_smarty_tpl->tpl_vars['start']->value]['price'];?>
</p></div>
										</div>
									</div>
								</a>
							</div>
							<?php }?>
							<?php }
}
?>

						</span>
				</span>
				</span>
				   <div class="clearfix"></div>
			    </div>
			  </div>
			</div>
		 </div>
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
</html>		<?php }
}

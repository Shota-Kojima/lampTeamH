<?php
/* Smarty version 3.1.30, created on 2019-07-07 16:38:44
  from "/home/tmH2019/public_html/lampTeamH/Smarty/templates/admini_review.tmpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5d21a184d74a77_26188343',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd48786c5b0ac021fab36b961c1f26160dbf672a0' => 
    array (
      0 => '/home/tmH2019/public_html/lampTeamH/Smarty/templates/admini_review.tmpl',
      1 => 1562485115,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:shere_admin.tmpl' => 1,
  ),
),false)) {
function content_5d21a184d74a77_26188343 (Smarty_Internal_Template $_smarty_tpl) {
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
<title>Surfhouse Bootstarp Website Template | Login :: w3layouts</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/admini_review.css" rel='stylesheet' type='text/css' />
<link href="css/manager.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<?php echo '<script'; ?>
 src="js/jquery.min.js"><?php echo '</script'; ?>
>
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/component.css" rel='stylesheet' type='text/css' />
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
<?php $_smarty_tpl->_subTemplateRender("file:shere_admin.tmpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
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
    <!-- ここからレビュー一覧(管理者側) -->
	<div class="all">
		<!-- ヘッダー下～一覧上-->	
	    <div class="dreamcrub">
			<ul class="breadcrumbs">
				<li class="home">
					<a href="index.html" title="Go to Home Page">Home</a>&nbsp;
					<span>&gt;</span>
				</li>
				<li class="women">
					レビュー一覧
				</li>
            </ul>
			<ul class="previous">
				<li><a href="index.html">前のページへ戻る</a></li>
			</ul>
            <div class="clearfix"></div>
		</div>
		<!-- ここから一覧　-->
        <div class="box">        
			<div class="searcharea">
			<p class="re">レビュー一覧</p>
				<div class="searchform">
					<form id="form_s" action="自分のサイトURL">
						<input id="serbox"  id="s" name="s" type="text" placeholder="キーワードを入力" />
						<input id="serbtn" type="submit" value="検索" />
					</form>
                    <div class="kind">
						<select name="kind">
							<option value="全ての商品">全ての商品</option>
							<option value="通常商品">販売中の商品のみ</option>
							<option value="レンタル商品">レンタル商品のみ</option>
						</select>
					</div>
					<form id="radiobtn">
						<label class="radio-in">
							<input type="radio" name="search-radio" value="商品名で検索" checked>商品名で検索
						</label>
						<label class="radio-in">
							<input type="radio" name="search-radio" value="ユーザーIDで検索">ユーザーIDで検索
						</label>
					</form>
				</div>
			</div>
			<div class="table">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr id="odd">
						<th>ユーザーID</th>
						<th>商品名</th>
						<th width="110" class="ac">投稿日時</th>
					</tr>
					<tr>
						<td><h3><a href="#">camp12</a></h3></td>
						<td>ノーススター（Ｒ）チューブマントルランタン</td>
						<td>2019/6/30</td>
						<td><input class="edibtn" type="button" id="delBtn1" value="詳細" onclick="location.href=''"><!--<input class="delbtn" type="button" id="delBtn1" value="削除" onclick="deleteRow(this)">--></td>
					</tr>
					<tr>
						<td><h3><a href="#">user1</a></h3></td>
						<td>ワンマントルランタン</td>
						<td>2019/6/24</td>
						<td><input class="edibtn" type="button" id="delBtn1" value="詳細" onclick="location.href=''"><!--<input class="delbtn" type="button" id="delBtn1" value="削除" onclick="deleteRow(this)">--></td>
					</tr>
					<tr>
						<td><h3><a href="#">user2</a></h3></td>
						<td>商品名</td>
						<td>日時</td>
						<td><input class="edibtn" type="button" id="delBtn1" value="詳細" onclick="location.href=''"><!--<input class="delbtn" type="button" id="delBtn1" value="削除" onclick="deleteRow(this)">--></td>
					</tr>
					<tr>
						<td><h3><a href="#">camp12@jp</a></h3></td>
						<td>商品名</td>
						<td>日時</td>
						<td><input class="edibtn" type="button" id="delBtn1" value="詳細" onclick="location.href=''"><!--<input class="delbtn" type="button" id="delBtn1" value="削除" onclick="deleteRow(this)">--></td>
					</tr>
					<tr>
						<td><h3><a href="#">camp12@jp</a></h3></td>
						<td>商品名</td>
						<td>日時</td>
						<td><input class="edibtn" type="button" id="delBtn1" value="詳細" onclick="location.href=''"><!--<input class="delbtn" type="button" id="delBtn1" value="削除" onclick="deleteRow(this)">--></td>
					</tr>
					<tr>
						<td><h3><a href="#">camp12@jp</a></h3></td>
						<td>商品名</td>
						<td>日時</td>
						<td><input class="edibtn" type="button" id="delBtn1" value="詳細" onclick="location.href=''"><!--<input class="delbtn" type="button" id="delBtn1" value="削除" onclick="deleteRow(this)">--></td>
					</tr>
					<tr>
						<td><h3><a href="#">camp12@jp</a></h3></td>
						<td>商品名</td>
						<td>日時</td>
						<td><input class="edibtn" type="button" id="delBtn1" value="詳細" onclick="location.href=''"><!--<input class="delbtn" type="button" id="delBtn1" value="削除" onclick="deleteRow(this)">--></td>
					</tr>
					<tr>
						<td><h3><a href="#">camp12@jp</a></h3></td>
						<td>商品名</td>
						<td>日時</td>
						<td><input class="edibtn" type="button" id="delBtn1" value="詳細" onclick="location.href=''"><!--<input class="delbtn" type="button" id="delBtn1" value="削除" onclick="deleteRow(this)">--></td>
					</tr>
					<tr>
						<td><h3><a href="#">camp12@jp</a></h3></td>
						<td>商品名</td>
						<td>日時</td>
						<td><input class="edibtn" type="button" id="delBtn1" value="詳細" onclick="location.href=''"><!--<input class="delbtn" type="button" id="delBtn1" value="削除" onclick="deleteRow(this)">--></td>
					</tr>
					<tr>
						<td><h3><a href="#">camp12@jp</a></h3></td>
						<td>商品名</td>
						<td>日時</td>
						<td><input class="edibtn" type="button" id="delBtn1" value="詳細" onclick="location.href=''"><!--<input class="delbtn" type="button" id="delBtn1" value="削除" onclick="deleteRow(this)">--></td>
					</tr>
					<tr>
						<td><h3><a href="#">camp12@jp</a></h3></td>
						<td>商品名</td>
						<td>日時</td>
						<td><input class="edibtn" type="button" id="delBtn1" value="詳細" onclick="location.href=''"><!--<input class="delbtn" type="button" id="delBtn1" value="削除" onclick="deleteRow(this)">--></td>
					</tr>
						<td><h3><a href="#">camp12@jp</a></h3></td>
						<td>商品名</td>
						<td>日時</td>
						<td><input class="edibtn" type="button" id="delBtn1" value="詳細" onclick="location.href=''"><!--<input class="delbtn" type="button" id="delBtn1" value="削除" onclick="deleteRow(this)">--></td>
					</tr>
					<tr>
						<td><h3><a href="#">camp12@jp</a></h3></td>
						<td>商品名</td>
						<td>日時</td>
						<td><input class="edibtn" type="button" id="delBtn1" value="詳細" onclick="location.href=''"><!--<input class="delbtn" type="button" id="delBtn1" value="削除" onclick="deleteRow(this)">--></td>
					</tr>
					<tr>
						<td><h3><a href="#">camp12@jp</a></h3></td>
						<td>商品名</td>
						<td>日時</td>
						<td><input class="edibtn" type="button" id="delBtn1" value="詳細" onclick="location.href=''"><!--<input class="delbtn" type="button" id="delBtn1" value="削除" onclick="deleteRow(this)">--></td>
					</tr>
					<tr>
						<td><h3><a href="#">camp12@jp</a></h3></td>
						<td>商品名</td>
						<td>日時</td>
						<td><input class="edibtn" type="button" id="delBtn1" value="詳細" onclick="location.href=''"><!--<input class="delbtn" type="button" id="delBtn1" value="削除" onclick="deleteRow(this)">--></td>
					</tr>
					<tr>
						<td><h3><a href="#">camp12@jp</a></h3></td>
						<td>商品名</td>
						<td>日時</td>
						<td><input class="edibtn" type="button" id="delBtn1" value="詳細" onclick=""><!--<input class="delbtn" type="button" id="delBtn1" value="削除" onclick="deleteRow(this)">--></td>
					</tr>
				</table>
				<div class="pagging">
					<div class="left">表示中 1-16</div>
					<div class="right">
						<a href="#">前へ</a>
						<a href="#">1</a>
						<a href="#">2</a>
						<a href="#">3</a>
						<a href="#">4</a>
						<a href="#">245</a>
						<span>...</span>
						<a href="#">次へ</a>
						<a href="#">すべて表示</a>
					</div>
				</div>
			</div>
		</div>
		</div>
		</div>
	<div class="clearfix"></div>
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

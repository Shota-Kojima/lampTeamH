<?php
/* Smarty version 3.1.30, created on 2019-07-07 17:05:42
  from "/home/tmH2019/public_html/lampTeamH/Smarty/templates/productEx.tmpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5d21a7d623e341_78604365',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '314e56c95fc9cfab7a15718cb09b64622265b44a' => 
    array (
      0 => '/home/tmH2019/public_html/lampTeamH/Smarty/templates/productEx.tmpl',
      1 => 1562486729,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:shere_admin.tmpl' => 1,
  ),
),false)) {
function content_5d21a7d623e341_78604365 (Smarty_Internal_Template $_smarty_tpl) {
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
<title>RE:SURVIVAL : 出品</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<?php echo '<script'; ?>
 src="js/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 language="JavaScript" src="js/fileSelect.js" type="text/javascript"><?php echo '</script'; ?>
>

<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/component.css" rel='stylesheet' type='text/css' />
<link href="css/manager.css" rel='stylesheet' type='text/css' />
<link href="css/productEx.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php echo '<script'; ?>
 type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } <?php echo '</script'; ?>
>
<!--webfont-->
<link href='http://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
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
					closeBtnInside: true,
					preloader: false,
					midClick: true,
					removalDelay: 300,
					mainClass: 'my-mfp-zoom-in'
			});
		});
		<?php echo '</script'; ?>
>
<!----details-product-slider--->
<!-- Include the Etalage files -->
<link rel="stylesheet" href="css/etalage.css">
<?php echo '<script'; ?>
 src="js/jquery.etalage.min.js"><?php echo '</script'; ?>
>
				<!-- Include the Etalage files -->
				<?php echo '<script'; ?>
>
						jQuery(document).ready(function($){
			
							$('#etalage').etalage({
								thumb_image_width: 300,
								thumb_image_height: 400,
								
								show_hint: true,
								click_callback: function(image_anchor, instance_id){
									alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
								}
							});
							// This is for the dropdown list example:
							$('.dropdownlist').change(function(){
								etalage_show( $(this).find('option:selected').attr('class') );
							});

					});
				<?php echo '</script'; ?>
>
				 <!--//details-product-slider-->	
<?php echo '<script'; ?>
 src="js/easyResponsiveTabs.js" type="text/javascript"><?php echo '</script'; ?>
>
		    <?php echo '<script'; ?>
 type="text/javascript">
			    $(document).ready(function () {
			        $('#horizontalTab').easyResponsiveTabs({
			            type: 'default', //Types: default, vertical, accordion           
			            width: 'auto', //auto or any width like 600px
			            fit: true   // 100% fit in a container
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
				<div class="col-md-3">
					<div class="menu_box">
				   	  	<h3 class="menu_head">Menu</h3>
				   	     <ul class="nav">
					   	  	<li><a href="apparel.html">About</a></li>
					   	  	<li><a href="apparel.html">Apparel</a></li>
					   	  	<li><a href="apparel.html">Surf Apparel</a></li>
					   	  	<li><a href="apparel.html">Windsurf</a></li>
					   	  	<li><a href="apparel.html">Kitesurf</a></li>
					   	  	<li><a href="apparel.html">Accessories</a></li>
					   	  	<li><a href="apparel.html">Sale</a></li>
					   	  	<li><a href="apparel.html">Brands</a></li>
					   	  	<li><a href="apparel.html">Blog</a></li>
					   	  	<li><a href="apparel.html">Gadgets</a></li>
					   	  	<li><a href="contact.php">Contact</a></li>
					   	 </ul>
			   	    </div>
			   	    <div class="category">
			   	    	<h3 class="menu_head">Category Options</h3>
			   	    	<ul class="category_nav">
					   	  	<li><a href="#">Men</a></li>
					   	  	<li><a href="#">Women</a></li>
					   	  	<li><a href="#">Kids</a></li>
					   	  	<li><a href="#">Wetsuits</a></li>
					   	  	<li><a href="#">Outerwear</a></li>
					   	</ul>
			   	    </div>
			   	    <div class="category">
			   	    	<h3 class="menu_head">Brand Options</h3>
			   	    	<ul class="category_nav">
					   	  	<li><a href="#">Billabong</a></li>
					   	  	<li><a href="#">Element</a></li>
					   	  	<li><a href="#">o'neill</a></li>
					   	  	<li><a href="#">Oakley</a></li>
					   	  	<li><a href="#">Reef</a></li>
					   	  	<li><a href="#">Quiksilver</a></li>
					   	  	<li><a href="#">Ripcurl</a></li>
					   	  	<li><a href="#">Jackss</a></li>
					   	</ul>
			   	    </div>
			   	    <div class="tags">
				    	<h4 class="tag_head">Tags Widget</h4>
				         <ul class="tags_links">
							<li><a href="#">Kitesurf</a></li>
							<li><a href="#">Super</a></li>
							<li><a href="#">Duper</a></li>
							<li><a href="#">Theme</a></li>
							<li><a href="#">Men</a></li>
							<li><a href="#">Women</a></li>
							<li><a href="#">Equipment</a></li>
							<li><a href="#">Best</a></li>
							<li><a href="#">Accessories</a></li>
							<li><a href="#">Men</a></li>
							<li><a href="#">Apparel</a></li>
							<li><a href="#">Super</a></li>
							<li><a href="#">Duper</a></li>
							<li><a href="#">Theme</a></li>
							<li><a href="#">Responsiv</a></li>
					        <li><a href="#">Women</a></li>
							<li><a href="#">Equipment</a></li>
						</ul>
						<a href="#" class="link1">View all tags</a>
				     </div>
				     <div class="side_banner">
					   <div class="banner_img"><img src="images/pic9.jpg" class="img-responsive" alt=""/></div>
					   <div class="banner_holder">
						  <h3>Now <br> is <br> Open!</h3>
					   </div>
				     </div>
			  </div>
				<div class="col-md-9">
					<div class="dreamcrub">
						<ul class="breadcrumbs">
							<li class="home">
							<a href="products.php" title="Go to Home Page">Home</a>&nbsp;
							<span>&gt;</span>
							</li>
							<li class="home">&nbsp;
								Apparel&nbsp;
								<span>&gt;</span>&nbsp;
							</li>
							<li class="home">&nbsp;
								&nbsp;Women
								<span>&gt;</span>&nbsp;
							</li>
							<li class="women">
							Peekey Cropped
							</li>
						</ul>
						<ul class="previous">
							<li><a href="products.php">商品一覧へ</a></li>
						</ul>
						<div class="clearfix"></div>
					</div>
			   <div class="singel_right">
					<div class="labout span_1_of_a1">
					<!-- start product_slider -->
                    
					<!-- end product_slider -->
			  		</div>
				<div class="cont1 span_2_of_a1">
					<form action="" method="post" enctype="multipart/form-data" autocomplete="off">	
						<p>
						商品名<input type="text" name="product_name" size="30">
						</p>
						<br>
						<p>
						値段<input type="text" name="price" size="20">
						</p>
						<br>
						<p>
						カテゴリ
						<select name="product_category">
							<option value="1">販売商品</option>
							<option value="2">レンタル商品</option>
						</select>
						</p>
						<br>
						<p>
							<!-- ジャンル<input type="text" name="genre_id" size="200"> -->
							ジャンル
							<select name="genre_id">
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rows']->value, 'valueString');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['valueString']->value) {
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['valueString']->value['genre_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['valueString']->value['genre_name'];?>
</option>
								<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

							</select>
						</p>
						<br>	
						<p>
						在庫数<input type="text" name="stock" size="20" value=1>
						</p>
						<br>
						<p>
						商品説明<br>
						<textarea name="product_text" rows="4" cols="40"></textarea>
						</p>
						<br>
						<!--画像選択フォーム-->
						<p>
							<label>
								<span class="filelabel1" title="ファイルを選択">
									<img src="./images/fileSelect.png" width="32" height="26">
									<span id="selectednum1">選択</span>
								</span>
								<input type="file" name="image_file1" accept="image/*" id="filesend1" accept=".jpg,.gif,.png,image/gif,image/jpeg,image/png">
							</label>
							<!--画像プレビューボックス-->
							<span id="previewbox1"></span>
						</p>
						<p>
							<label>
								<span class="filelabel2" title="ファイルを選択">
									<img src="./images/fileSelect.png" width="32" height="26" >
									<span id="selectednum2">選択</span>
								</span>
								<input type="file" name="image_file2" accept="image/*" id="filesend2" accept=".jpg,.gif,.png,image/gif,image/jpeg,image/png">
							</label>
							<span id="previewbox2"></span>
						</p>
						<p>
							<label>
								<span class="filelabel3" title="ファイルを選択">
									<img src="./images/fileSelect.png" width="32" height="26">
									<span id="selectednum3">選択</span>
								</span>
								<input type="file" name="image_file3" accept="image/*" id="filesend3" accept=".jpg,.gif,.png,image/gif,image/jpeg,image/png">
							</label>
							<span id="previewbox3"></span>
						</p>				
						<!--意味はないけどそれっぽいから置いとけ-->	
						<ul class="size">
							<h3>Size</h3>
							<li><a href="#">25</a></li>
							<li><a href="#">26</a></li>
							<li><a href="#">27</a></li>
							<li><a href="#">28</a></li>
							<li><a href="#">29</a></li>
							<li><a href="#">30</a></li>
							<li><a href="#">31</a></li>
							<li><a href="#">32</a></li>
							<li><a href="#">33</a></li>
						</ul>
						
						<br>
						<div class="btn_form">
						<input type="submit" value="出品" title="">
					</form>
				</div>
			</div>
			<div class="clearfix"></div>
		   </div>
		   <div class="sap_tabs">	
				     <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
						  <ul class="resp-tabs-list">
						  	  <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>Product Description</span></li>
							  <li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>Additional Information</span></li>
							  <li class="resp-tab-item" aria-controls="tab_item-2" role="tab"><span>Reviews</span></li>
							  <div class="clear"></div>
						  </ul>				  	 
							<div class="resp-tabs-container">
							    <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
									<div class="facts">
									  <ul class="tab_list">
									  	<li><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat</a></li>
									  	<li><a href="#">augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigatione</a></li>
									  	<li><a href="#">claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica</a></li>
									  	<li><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</a></li>
									  </ul>           
							        </div>
							     </div>	
							      <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
									<div class="facts">
									  <ul class="tab_list">
									    <li><a href="#">augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigatione</a></li>
									  	<li><a href="#">claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica</a></li>
									  	<li><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</a></li>
									  </ul>           
							        </div>
							     </div>	
							      <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-2">
									<ul class="tab_list">
									  	<li><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat</a></li>
									  	<li><a href="#">augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigatione</a></li>
									  	<li><a href="#">claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores leg</a></li>
									  	<li><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</a></li>
									  </ul>      
							     </div>	
							 </div>
					      </div>
					 </div>	
					 <h3 class="like">You Might Also Like</h3>        			
				     <ul id="flexiselDemo3">
						<li><img src="images/pic11.jpg" /><div class="grid-flex"><a href="#">Syenergy 2mm</a><p>Rs 850</p></div></li>
						<li><img src="images/pic10.jpg" /><div class="grid-flex"><a href="#">Surf Yoke</a><p>Rs 1050</p></div></li>
						<li><img src="images/pic9.jpg" /><div class="grid-flex"><a href="#">Salty Daiz</a><p>Rs 990</p></div></li>
						<li><img src="images/pic8.jpg" /><div class="grid-flex"><a href="#">Cheeky Zane</a><p>Rs 850</p></div></li>
						<li><img src="images/pic7.jpg" /><div class="grid-flex"><a href="#">Synergy</a><p>Rs 870</p></div></li>
				     </ul>
				    <?php echo '<script'; ?>
 type="text/javascript">
					 $(window).load(function() {
						$("#flexiselDemo3").flexisel({
							visibleItems: 3,
							animationSpeed: 1000,
							autoPlay: true,
							autoPlaySpeed: 3000,    		
							pauseOnHover: true,
							enableResponsiveBreakpoints: true,
					    	responsiveBreakpoints: { 
					    		portrait: { 
					    			changePoint:480,
					    			visibleItems: 1
					    		}, 
					    		landscape: { 
					    			changePoint:640,
					    			visibleItems: 2
					    		},
					    		tablet: { 
					    			changePoint:768,
					    			visibleItems: 3
					    		}
					    	}
					    });
					    
					});
				   <?php echo '</script'; ?>
>
				   <?php echo '<script'; ?>
 type="text/javascript" src="js/jquery.flexisel.js"><?php echo '</script'; ?>
>
				   <h3 class="recent">Recently Viewed</h3>
				   <ul id="flexiselDemo1">
						<li><img src="images/pic1.jpg" /><div class="grid-flex"><a href="#">Syenergy 2mm</a><p>Rs 850</p></div></li>
						<li><img src="images/pic2.jpg" /><div class="grid-flex"><a href="#">Surf Yoke</a><p>Rs 1050</p></div></li>
						<li><img src="images/pic3.jpg" /><div class="grid-flex"><a href="#">Salty Daiz</a><p>Rs 990</p></div></li>
						<li><img src="images/pic4.jpg" /><div class="grid-flex"><a href="#">Cheeky Zane</a><p>Rs 850</p></div></li>
						<li><img src="images/pic5.jpg" /><div class="grid-flex"><a href="#">Synergy</a><p>Rs 870</p></div></li>
				     </ul>
				    <?php echo '<script'; ?>
 type="text/javascript">
					 $(window).load(function() {
						$("#flexiselDemo1").flexisel({
							visibleItems: 3,
							animationSpeed: 1000,
							autoPlay: true,
							autoPlaySpeed: 3000,    		
							pauseOnHover: true,
							enableResponsiveBreakpoints: true,
					    	responsiveBreakpoints: { 
					    		portrait: { 
					    			changePoint:480,
					    			visibleItems: 1
					    		}, 
					    		landscape: { 
					    			changePoint:640,
					    			visibleItems: 2
					    		},
					    		tablet: { 
					    			changePoint:768,
					    			visibleItems: 3
					    		}
					    	}
					    });					    
					});
				   <?php echo '</script'; ?>
>
			</div>
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

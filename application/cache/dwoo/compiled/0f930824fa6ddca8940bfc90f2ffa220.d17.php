<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><!DOCTYPE HTML>
<html>
<head>
<title>Culture Update</title>
<!-- GLOBAL CSS -->
<link rel="stylesheet" href="http://localhost/culture-update//assets/global_css/grid.css" type="text/css" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="http://localhost/culture-update//assets/global_css/reset.css" type="text/css" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="http://localhost/culture-update//assets/global_css/text.css" type="text/css" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="http://localhost/culture-update//assets/global_css/ui-style.css" type="text/css" media="screen" title="no title" charset="utf-8">

<!-- END GLOBAL CSS -->

<!-- GLOBAL JS 
<script src="../assets/global_js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script src="../assets/global_js/dodolan_js_lib.js" type="text/javascript" charset="utf-8"></script>

END GLOBAL JS -->


<!-- THEME CSS -->
<link rel="stylesheet" href="http://localhost/culture-update//assets/theme/front/css/front-style.css" type="text/css" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="http://localhost/culture-update//assets/theme/front/css/cloud_zoom.css" type="text/css" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="http://localhost/culture-update//assets/theme/front/css/page_style.css" type="text/css" media="screen" title="no title" charset="utf-8">

<!-- END THEME CSS -->

<!-- THEME JS -->


<!-- END THEME JS -->

<body id="home">
	<div class="wrapper">
		<div class="inner_wrap ctr grid_960">
			<div class="header">
				<div class="logo ctr">
					<img src="http://localhost/culture-update//assets/theme/front/img/top_logo_width.png" width="870" height="33" alt="Top Logo Width">
				</div>
			</div>
			
			<div class="component">
				<div class="topBar">
					<div class="navTop left">
						application/views/
	
			<div class="modularizer ">
	
					<ul class="horizontal"><li><a href="http://localhost/culture-update/"><span>New Aririval</span></a></li><li><a href="http://localhost/culture-update/store/collection"><span>Collection</span></a></li><li><a href="http://localhost/culture-update/store/product/browse/cat/22"><span>Top</span></a></li><li><a href="http://localhost/culture-update/store/product/browse/cat/23"><span>Bottoms</span></a></li><li><a href="http://localhost/culture-update/store/product/browse/cat/25"><span>Dresses</span></a></li><li><a href="http://localhost/culture-update/store/product/browse/cat/24"><span>Outwears</span></a></li><li><a href="http://localhost/culture-update/store/product/browse/cat/26"><span>Accessories</span></a></li><li><a href="http://localhost/culture-update/page/view/5"><span>Contact</span></a></li><li><a href="http://localhost/culture-update/page/view/8"><span>How To</span></a></li><div class="clear"></div></ul>	</div>
	
					</div>
					<div class="userMenu right">
						<p>
							<a href=""><span>Sign In</span></a> | 
							<a href=""><span>Register</span></a> | 
							<a href=""><span class="cart_info"><span class="cart_icon"></span>Your Bag is Empty</span></a>
						</p>

					</div>
					<div class="clear"></div>
				</div>

				<div class="headingPage">

				</div>

				<div class="sideBar"></div>

				<div class="comp_content">
						<?php echo $this->scope["template"]["body"];?>


				</div>
			</div>


		<div class="footer">
			<div class="site_copyright left">
				<p>&copy; OlineWorkrobe.com all right reserved</p>
			</div>
			<div class="dev_sign right mr10">
				<p>Develop by BarockProject</p>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>
</body>
</html><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>
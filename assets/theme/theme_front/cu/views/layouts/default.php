<!DOCTYPE HTML>
<html>
<head>
<title><?=$this->config->item('site_name')?> <? if(isset($pT)){ echo ' | '.$pT ;}elseif(!isset($pT) && isset($pH)){echo ' | '.$pH;}?></title>

<!--////////////////////////////
		  GLOBAL ASSETS 
/////////////////////////////-->

<!-- GLOBAL CSS -->
<link rel="stylesheet" href="<?=base_url();?>/assets/global_css/grid.css" type="text/css" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="<?=base_url();?>/assets/global_css/reset.css" type="text/css" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="<?=base_url();?>/assets/global_css/text.css" type="text/css" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="<?=base_url();?>/assets/global_css/ui-style.css" type="text/css" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="<?=base_url();?>/assets/global_js/jgrowl/jquery.jgrowl.css" type="text/css" media="screen" title="no title" charset="utf-8">

<!-- END GLOBAL CSS -->

<!-- GLOBAL JS -->
<script src="<?=base_url();?>/assets/global_js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script src="<?=base_url();?>/assets/global_js/dodolan_js_lib.js" type="text/javascript" charset="utf-8"></script>
<script src="<?=base_url();?>/assets/global_js/jquery_ui/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>
<script src="<?=base_url();?>/assets/global_js/jquery_ui/jquery-ui-timepicker-addon.js" type="text/javascript" charset="utf-8"></script>
<script src="<?=base_url();?>/assets/global_js/jgrowl/jquery.jgrowl.js" type="text/javascript" charset="utf-8"></script>


<!-- END GLOBAL JS -->

<!--////////////////////////////
		END GLOBAL ASSETS 
/////////////////////////////-->


<!--////////////////////////////
		   THEME ASSETS 
/////////////////////////////-->

<!-- THEME CSS -->
<link rel="stylesheet" href="<?=$this->dodol_theme->path();?>/css/front-style.css" type="text/css" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="<?=$this->dodol_theme->path();?>/css/cloud_zoom.css" type="text/css" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="<?=$this->dodol_theme->path();?>/css/page_style.css" type="text/css" media="screen" title="no title" charset="utf-8">
<?=$template['metadata']?>
<!-- END THEME CSS -->

<!-- THEME JS -->
<script src="<?=$this->dodol_theme->path();?>/js/cloud-zoom.1.0.2.js" type="text/javascript" charset="utf-8"></script>

<!-- END THEME JS -->

<!--////////////////////////////
		   THEME ASSETS 
/////////////////////////////-->

<?=modules::run('ajax/js_showmsg')?>
<body id="<?=$this->router->class.'_'.$this->router->method;?>">

	<div class="wrapper">
		<div class="inner_wrap ctr grid_960">
			<div class="header">
				<div class="logo ctr">
					<img src="<?=base_url();?>/assets/theme/front/img/top_logo_width.png" width="870" height="33" alt="Top Logo Width">
				</div>
			</div>
			
			<div class="component">
				<div class="topBar">
					<div class="navTop left">
						<?=load_widget('topmenu');?>
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
						<?=$template['body'];?>

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
		<div class="msg_debug">
		<?=$this->bug->my_trace();?>
		</div>
	</div>
</div>

</body>
</html>
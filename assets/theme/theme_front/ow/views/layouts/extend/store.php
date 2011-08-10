<!DOCTYPE HTML>
<html>
<head>
<title><?=$this->dodol->conf('site', 'name')?> <? if(isset($pT)){ echo ' | '.$pT ;}elseif(!isset($pT) && isset($pH)){echo ' | '.$pH;}?></title>

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
		THEME ASSETS ASSETS 
/////////////////////////////-->

<!-- THEME CSS -->
<link rel="stylesheet" href="<?=$this->dodol_theme->path();?>/css/front_style.css" type="text/css" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="<?=$this->dodol_theme->path();?>/css/page_style.css" type="text/css" media="screen" title="no title" charset="utf-8">

<link rel="stylesheet" href="<?=$this->dodol_theme->path();?>/css/cloud_zoom.css" type="text/css" media="screen" title="no title" charset="utf-8">

<!-- END THEME CSS -->

<!-- THEME JS -->
<script src="<?=$this->dodol_theme->path();?>/js/cloud-zoom.1.0.2.js" type="text/javascript" charset="utf-8"></script>

<!-- END THEME JS -->

<!--////////////////////////////
	END THEME ASSETS ASSETS 
/////////////////////////////-->

</head>

<?=modules::run('ajax/js_showmsg')?>
<body id="<?=$this->router->class.'_'.$this->router->method;?>" class="store_layout" >

	<div class="wrapper">
		<div class="inner_wrap ctr grid_950">
				<div class="header">
					<div class="logo right">
							
					</div>
					<div class="horline_top relative right">
						<div class="line"></div>
					</div>
					
					<div class="clear"></div>
				</div>
				<div class="content_body">
					<div class="sidebar">
						<div class="inner">
							<div class="mod">
							<?=load_widget('store_side_menu');?>
							</div>
						</div>
					<div class="decor">
						</div>
					</div>
					
					<div class="component">
						<?=$template['body'];?>
						
					</div>
					<div class="clear"></div>
				</div>
				<div class="footer">
					<div class="site_copyright left">
						<p>&copy; <?=$this->dodol->conf('site', 'name')?> all right reserved</p>
					</div>
					<div class="dev_sign right mr10">
						<p>Develop by BarockProject</p>
					</div>
					<div class="clear"></div>
				</div>
		</div>
	</div>
</body>
</html>

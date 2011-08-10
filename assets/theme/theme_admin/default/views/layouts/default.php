<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?=$this->dodol->conf('site','name')?> - 	<? if(isset($pT)){ echo $pT ;}elseif(!isset($pT) && isset($pH)){echo $pH;}?></title>
<!-- CSS and JS Global -->
<link href="<?=base_url();?>assets/global_css/reset.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url();?>assets/global_css/ui-style.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url();?>assets/global_css/text.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url();?>assets/global_css/grid.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?=base_url();?>/assets/global_js/jquery_ui/theme/Aristo/jquery-ui-1.8.7.custom.css" media="screen"  />	
<link rel="stylesheet" type="text/css" href="<?=base_url();?>/assets/global_js/jgrowl/jquery.jgrowl.css" media="screen"  />	
<script src="<?=base_url();?>/assets/global_js/jquery.min.js"></script>
<script src="<?=base_url();?>/assets/global_js/jquery_ui/jquery-ui.min.js"></script>
<script src="<?=base_url();?>/assets/global_js/jquery_ui/jquery-ui-timepicker-addon.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript" src="<?=base_url();?>/assets/global_js/dodolan_js_lib.js"></script>
<script type="text/javascript" src="<?=base_url();?>/assets/global_js/jgrowl/jquery.jgrowl.js"></script>

<!-- js for HighCharts and CSS -->
<script src="<?=base_url();?>/assets/global_js/hc/highcharts.js" type="text/javascript" charset="utf-8"></script>
<script src="<?=base_url();?>/assets/global_js/hc/modules/exporting.js" type="text/javascript" charset="utf-8"></script>



<!--   JS AND CSS ADD ON FOR SPECIFY PAGE   -->
<?=$this->carabiner->display('add_on')?>
<!-- END JS AND CSS ADD ON FOR SPECIFY PAGE -->


<!-- Css and JS for Specify Individual Theme -->
<link href="<?=$this->dodol_theme->admin_path();?>/css/admin-style.css" rel="stylesheet" type="text/css" />
<link href="<?=$this->dodol_theme->admin_path();?>/css/page_style.css" rel="stylesheet" type="text/css" />

<?=modules::run('ajax/js_showmsg')?>
</head>


<body  id="<?=$this->router->class.'_'.$this->router->method;?>" class="backend">
<div class="navigation"><div class="inner ctr grid_990">
	<div class="left">
		<div class="grid_550">
		<script type="text/javascript">

		//build menu with DIV ID="myslidemenu" on page:
		droplinemenu.buildmenu("backendMenu")

		</script>

		<div class="topMenu droplinetabs" id="backendMenu"><?=menu_rend(modules::run('nav/nav_item/getnested', 9))?>
		</div>
		</div>
	</div>
	<div class="right grid_400">
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function(){
			
				$('.triggerWrap').click(function(){
					$('.backend_userPane .paneContainer').toggle('slide', {direction:'up'});				
				})
			});
		</script>
		<div class="backend_userPane left ml20 right">
			<div class="triggerWrap"><p class="trigger">Administrator</p></div>
			<div class="paneContainer">
				<div class="menu left">
				<ul>
					<li><span><a href="#">Account</a></span></li>
					<li><span><a href="#">Setting</a></span></li>
					<li><span><a href="#">Logout</a></span></li>
				<ul>
				</div>
				<div class="user_img right">
					<img src="http://a1.twimg.com/profile_images/1479705438/mypic.jpg" width="70">
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="backendSearch form-Ui left">
			<form action="default_submit" method="get" accept-charset="utf-8">
				<div class="grid_250">
				<input type="text" name="search" value="search" id="some_name">
				</div>
			</form>
		</div>
		
		<div class="clear"></div>
	</div>
	<br class="clear"/>
	</div>
</div>
<div class="grid_990 ctr">
<div class="mainGrid ui-corner-bottom">
	<div class="header grid_950 ctr relative">
		<div class="left logoTop">
		<h1 class="logoText"><?=$this->dodol->conf('site', 'name');?><small> Beta 0.1</small></h1>
		</div>
		<?if(isset($pageMenu)):?>
			<div class="pageMenu right absolute"><?=$pageMenu?></div>
		<?endif?>
		<div class="clear"></div>
	</div>


<!END HEADER/>

<?if($this->uri->segment(3) == 'first'){?>
<script type="text/javascript" charset="utf-8">
	$('.mainGrid').hide().show('slide', {direction:'up'});
</script>
<?}?>
<div id="component">
<div class="mainWrap grid_950 ctr" id="mainArea">

<!PAGE HEADING AND TOOL/>
	<?if (isset($pageTool) || isset($pH)):?>
	<div class="pageHeading">
		<?$heading = (isset($ph)) ? $pH : $pT;?>
		<div class="headingTitle left">
			<h1><?=$heading?></h1>
		</div>
	
		
		<?if(isset($pageTool)):?>
		<div class="pageTool right">
			<?if(is_array($pageTool)):?>
				<?foreach($pageTool as $pt):?>
					<?= $pt ?>
				<?endforeach?>
			<?else:?>
				<?= $pageTool?>
			<?endif?>
		
		</div >
		<?endif?>
		<div class="clear"></div>
	</div>
	
	<?endif?>
<!END OF PAGE HEADING>
		
<!component start here/>
	<?=$template['body'];?>
<!component end here/>
</div>
</div>

<!FOOTER START/>

	<div class="footerWrap">
	<p>Dodolan Framework &copy; 2011 Alright Reserved, Develop by BarockProjects</p>
	</div>
	<small>Debug</small>
	
	<div class="horline"></div>
Page rendered in {elapsed_time} seconds
</div>
</div>
<div id="ajaxdialog" class="ajaxdialog hide msg-Ui">
	
</div>
</body>
</html>

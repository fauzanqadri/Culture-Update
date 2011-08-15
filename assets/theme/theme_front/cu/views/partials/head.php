<!DOCTYPE HTML>
<html>
<head>
<title><?=$this->dodol->conf('site','name')?> <? if(isset($pT)){ echo ' | '.$pT ;}elseif(!isset($pT) && isset($pH)){echo ' | '.$pH;}?></title>

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
</head>
<body id="<?=str_replace('/', '_', $this->dodol_theme->get_layout());?>_layout" >
	<div id="<?=$this->router->class.'_'.$this->router->method;?>">
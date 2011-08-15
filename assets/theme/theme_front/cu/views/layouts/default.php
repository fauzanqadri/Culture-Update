<?=$this->dodol_theme->partial('head');?>
<div class="wrapper">
	<div class="inner_wrap ctr grid_960">
			<div class="header">
				<div class="logo ctr">
					<img src="<?=$this->dodol_theme->path();?>/img/top_logo_width.png" width="870" height="33" alt="Top Logo Width">
				</div>
			</div>
			<div class="component">
				<div class="topBar">
					<div class="navTop left">
						<?=load_widget('topmenu');?>
					</div>
					<div class="barRight right">
						<?=load_widget('top_right')?>
					</div>
					<div class="clear"></div>
				</div>
				<div class="comp_content">
					<?=$template['body'];?>
				</div>
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
<?=$this->dodol_theme->partial('footer')?>
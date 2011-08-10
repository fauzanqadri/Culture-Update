<div class="browseMenu left">
		<div class="catMenu">
		<?=menu_rend(modules::run('store/category/getCategoryMenu'))?>
		</div>
</div>
<div class="browseProduct left">
	
<?if($prods):
	foreach($prods as $prod):?>
		<?=modules::run('store/product/prodSnap',$prod->p_id )?>
	<?endforeach;?>
	<div class="clear"></div>
	<div class="pagination right">
	<?=$this->barock_page->make_link();?>
	</div>
	<div class="clear"></div>
<?else:?>
	there aren't product in this category
<?endif;?>
	<div class="clear"></div>
</div>
<div class="clear"></div>

<script type="text/javascript" charset="utf-8">
	$(document).ready(function(){
		$('.item').hover(function(){
			var detail = $(this).find('.item_detail');
			var img = $(this).find('.prod_img');
		
			detail.animate({bottom:0});
			img.animate({width:330});
			
		}, function(){
			var detail = $(this).find('.item_detail');
			var img = $(this).find('.prod_img');
			detail.animate({bottom:-70});
			img.animate({width:310});
		});
	});
</script>
<div class="product_list picker_product">
<?foreach($ids as $prod):?>
<?$prod = modules::run('store/product/api_getbyid', $prod , array('media'), 'l_desc');?>
	<div class="item">
		<div class="item_img">
			<a href="<?=site_url('store/product/view/'.element('product', $prod)->id);?>"><img class="prod_img ctr" src="<?=site_url('thumb/show/310-320-crop/dir/assets/store/product_img/'.element('media', $prod)->path);?>" alt="<?=element('product', $prod)->name?>"></a>
			
		</div>
		<div class="item_detail">
			<h3 class="name left"><?=element('product', $prod)->name?></h3>
			<small class="right"><?=element('product', $prod)->category_name?></small>
			<div class="clear"></div>
			<?=html_word_limiter(element('product', $prod)->l_desc, 25)?>
		</div>
		
	</div>
<?endforeach;?>
<div class="clear"></div>
</div>


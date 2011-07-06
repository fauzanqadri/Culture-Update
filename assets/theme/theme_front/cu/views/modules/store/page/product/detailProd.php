
<div class="view_product">
	<div class="product_media">
		<? $defimg = element('media', $prod); $m = element('medias', $prod);?>
			<script>
			$(document).ready(function(){
				$('a.cloud-zoom-gallery').click(function(){
					var title = $(this).attr('title');
					$('img.zoom_curent_img').attr('title', title);
				});
			});
			</script>

			<div class="currentImg left">
				<a href='<?=site_url('thumb/show/1200-600-crop/dir/assets/store/product_img/'.$defimg->path);?>' 
					class = 'cloud-zoom' 
					id='zoom1'
					rel="position: 'inside' ,tint: '#ffffff',tintOpacity:0.5 ,smoothMove:10,zoomWidth:300,zoomHeight:400">
	            	<img  src="<?=site_url('thumb/show/600-300-crop/dir/assets/store/product_img/'.$defimg->path);?>"
						class="zoom_curent_img" 
						alt='' 
						title="<?=$defimg->name;?>" />
	        	</a>

			</div>
			<?if($m){?>
				<div class="otherImg left">
					<?foreach($m as $med){?>
						<div class="item left">
						<a href='<?=site_url('thumb/show/1200-600-crop/dir/assets/store/product_img/'.$med->path);?>' 
							class='cloud-zoom-gallery' 
							title='<?=$med->name;?>'
							rel="useZoom: 'zoom1', smallImage: '<?=site_url('thumb/show/600-300-crop/dir/assets/store/product_img/'.$med->path);?>' ">
		        			<img src="<?=site_url('thumb/show/100-100-crop/dir/assets/store/product_img/'.$med->path);?>"   
								alt ="<?=$med->name;?>"/>
						</a>
						</div>

				<?}?>
				<div class="clear"></div>	
				</div>
			<?}?>
			<div class="clear"></div>
			

	</div>
	<div class="product_detail">
		<div class="cartForm">
			<h1 class="product_name left"><?=element('product', $prod)->name?></h1>
			<div class="product_cart right">
				<?=modules::run('store/store_cart/addToCartForm', element('attributes', $prod), element('product', $prod));?>
				<span class="product_price"><?=$this->dodol->arrayObject(modules::run('store/product/prod_price', element('product', $prod)->id))->formated?></span>

			</div>
			<div class="clear"></div>
		</div>
		<div class="product_desciption">
			<?=element('product',$prod)->l_desc;?>
		</div>
		
	</div>

	<div class="clear"></div>
</div>
<?//=$this->dodol->print_arrayRecrusive($_ci_vars);?>
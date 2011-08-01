<div class="collection_info">
	<div class="coll_bg">
		<img src="<?=site_url('thumb/show/700-300-crop/dir/assets/store/collection_img/'.$coll->img_path);?>" />
		<div class="cover_overlay"></div>
		<div class="clear"></div>
	</div>	
	<div class="coll_detail">
		<h1 class="font_myriad"><?=$coll->name?></h1>
		<small class="publish_time">Launch <?=$this->dodol->custom_time($coll->p_date)?></small>
		<div class="description">
		<?=$coll->description;?>
		</div>
		<div class="meta">
		</div>
	</div>
	<div class="clear"></div>
</div>


<div class="clear"></div>
<div class="collection_content">
<div class="clear"></div>
<div class="browseProduct">
<? if($items->num_rows() > 0){ foreach($items->result() as $prod){?>
<?=modules::run('store/product/prodSnap',$prod->product_id )?>
<?}?>
<div class="clear"></div>
<?}else{?>

	there aren't product in this Collection
<?}?>
<div class="clear">></div>
</div>
</div>
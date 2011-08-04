<div class="coll_list">
<?if($colls):?>
<?$i = 1 ; foreach($colls as $data):?>
<? $q= modules::run('store/collection/exe_getById', $data->id);
	$i++;
   $items = $q['ref'];
   $coll  = $q['main'];
  $type = ($i%2) ? 'odd' : 'even';
?>
<div class="item <?=$type;?>">
	<div class="coll_image">
	<a href="<?=site_url('store/collection/detail/'.$coll->id.'/'.$this->dodol_theme->nice_strlink($coll->name))?>">
		<img src="<?=site_url('thumb/show/600-200-crop/dir/assets/store/collection_img/'.$coll->img_path);?>" />
	</a>
	</div>
	<div class="coll_detail">
		<h1 class="font_myriad"><?=$coll->name?></h1>
		<small class="publish_time">Launch <?=$this->dodol->custom_time($coll->p_date)?></small>
		<div class="description">
		<?=html_word_limiter($coll->description, 30);?>
		</div>
		<div class="horline"></div>
		
		<div class="meta">
			
		</div>
	</div>

	<div class="clear"></div>
</div>
<?endforeach?>
<?else:?>
There are no collection yet

<?endif?>
</div>
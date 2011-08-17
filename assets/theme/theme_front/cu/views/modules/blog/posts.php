<div class="post_list">
	
<?if($posts):?>

	<?foreach($posts as $post): set_post($post) ?>
	<div class="post_item">
		<? echo blog_date($post->c_date, 'F jS, Y');?>
		
		<h1 class="post_title"><a href="<?=post_link();?>"><?=post_title();?></a></h1>
		<div class="left"><a href="<?=post_link();?>"><img src="<?=post_img_thumb('200_100_crop');?>" alt="<?=post_title();?>"/></a></div>
		
		<div class="post_content_pre right grid_500"><?=post_content_prev(70)?></div>
	
		<div class="clear"></div>
		<div class="list_decor_right"></div>
		
	</div>
	<?unset_post(); endforeach;?>
	<div class="clear"></div>
	<div class="pagination right">
	<?=$this->dodol_paging->make_link();?>
	</div>
	<div class="clear"></div>
<?else:?>
	'There isn't post
<?endif?>
</div>

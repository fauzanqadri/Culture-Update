<div class="post_list grid_720 left">
<?if($posts):?>
	<?foreach($posts as $post):?>
	<div class="post_item">	
		<h1 class="post_title"><a href="<?=site_url('blog/read/'.$post->slug)?>"><?=$post->title;?></a></h1>
		<div class="post_content_pre"><?=html_word_limiter($post->content, 100)?></div>
	</div>
	<?endforeach;?>
<?else:?>
	'There isn't post
<?endif?>
</div>
<div class="category_menu">
	<?=menu_rend(modules::run('blog/api_cat_menu'))?>
</div>
<div class="clear"></div>
<div class="post_list">
	
<?if($posts):?>

	<?foreach($posts as $post):?>
	<div class="post_item">
		<?echo blog_date($post->c_date, 'F jS, Y');?>
		
		<h1 class="post_title"><a href="<?=site_url('blog/read/'.$post->slug)?>"><?=$post->title;?></a></h1>
		<?=blog_img_thumb($post);?>
		<?;?>
		<div class="post_content_pre"><?=html_word_limiter($post->content, 100)?></div>
	</div>
	<?endforeach;?>
	<div class="clear"></div>
	<div class="pagination right">
	<?=$this->barock_page->make_link();?>
	</div>
	<div class="clear"></div>
<?else:?>
	'There isn't post
<?endif?>
</div>

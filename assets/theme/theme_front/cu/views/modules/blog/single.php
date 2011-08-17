<div class="post" id="post_<?=$post->id;?>">
<div class="heading"><h1><?=$post->title?></h1></div>
<div class="meta left"><span class="date"><?=blog_date($post->c_date)?></span>, <span class="cat"><?=$post->cat_name;?></span></div>
<div class="author right"><span>by : <?=$post->first_name.' '.$post->last_name?></span></div>
<div class="clear"></div>
<div class="content">
	<?=$post->content?>
</div>
</div>
<?=Modules::run('blog/comment_form');?>
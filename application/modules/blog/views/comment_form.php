<div class="comment_part">
<h3 class="part_title">Comments</h3>
<div class="list_decor_right"></div>
<div class="comment_list">
	<div class="item">
		<div class="left avatar"><?=gravatar_img('zidmubarock@gmail.com')?></div>
		<div class="content right">
			<div class="meta"><span class="author">Zidni Mubarock</span> <span class="date"><?=custom_time($post->c_date)?></span></div>
			<p>1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div>
		<div class="clear"></div>
	</div>
	<div class="item">
		<div class="left avatar"><img src="http://a3.twimg.com/profile_images/1497591376/DSC_0737_copy_reasonably_small.jpg" alt="arock"></div>
		<div class="content right">
			<div class="meta"><span class="author">Zidni Mubarock</span> <span class="date"><?=custom_time($post->c_date)?></span></div>
			<p>1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div>
		<div class="clear"></div>
	</div>
	<div class="item">
		<div class="left avatar"><img src="http://a3.twimg.com/profile_images/1497591376/DSC_0737_copy_reasonably_small.jpg" alt="arock"></div>
		<div class="content right">
			<div class="meta"><span class="author">Zidni Mubarock</span> <span class="date"><?=custom_time($post->c_date)?></span></div>
			<p>1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div>
		<div class="clear"></div>
	</div>
	
</div>
<div class="comment_form">
		<?=load_jq_validate();?>
		<script type="text/javascript" charset="utf-8">
		

			$(document).ready(function(){
				$('#comment_post_<?=$post->id;?> .trigger').click(function(){
						var post_data = $('#comment_post_<?=$post->id;?>').serialize();
						$.ajax({
							type : "POST",
							dataType : "json",
							data : post_data,
							url : "<?=site_url('blog/ajx_add_comment');?>",
							success : function(data){
								if(data.msg == 1){
									output = comment_theme(data);
									$('.comment_list').append(output);
									$('#comment_'+data.comment.id).show('slide', {direction:'down'});
									
								}
							}
							
						})
					return false;
				});
				
			});

			function comment_theme(obj){
				var content = '<div id="comment_'+obj.comment.id+'" class="hide item"><div class="left avatar">'+obj.gravatar+'</div><div class="content right"><div class="meta"><span class="author">'+obj.comment.author_name+'</span> <span class="date">'+obj.comment.c_date+'</span></div><p>'+obj.comment.comment+'</p></div><div class="clear"></div></div>';
				return content;
			}
			$(document).ready(function(){
				$('#comment_post_<?=$post->id;?>').validate();
			});
	
		
		</script>
		<form id="comment_post_<?=$post->id;?>" action="" method="post" accept-charset="utf-8">
				<div class="author_data">
					<span><input type="text" class="required"  notsame="Name" value="Name"  name="com_author_name" ></span>
					<span><input type="text" class="required email" name="com_author_email"  value="Email"></span>
					<span><input type="text"  name="com_author_url" value="URL"></span>
				</div>
				<div class="clear"></div>
				<div class="comment_content">
					<textarea name="com_comment"></textarea>
				</div>
				<input type="hidden" name="com_post_id" value="<?=$post->id;?>" id="com_post_id">
				<p><input type="submit" class="trigger" value="Add Comment &rarr;"></p>
		</form>
</div>
</div>
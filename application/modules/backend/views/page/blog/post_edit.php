<div class="form-Ui editPost">
<form action="" method="post" accept-charset="utf-8">
	<div class="grid_650 left">
	<input type="text" name="bl_title" value="<?=$post->title;?>" class="text-input mb15">
	<textarea id="bl_content" name="bl_content"><?=$post->content;?></textarea>
	<?$this->dodol_theme->load_text_editor('bl_content')?>
	</div>
	<div class="blog_meta box2 grid_250 right">
		<div class="left"><input type="submit" name="publish" value="Publish" class="button"></div>
		<div class="left ml20"><input type="submit" name="save" value="Save" class="button"></div>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function(){
				$('input[name="publish"]').hover(function(){
						$('input[name="bl_status"]').val('publish');
				});
				$('input[name="save"]').hover(function(){
						$('input[name="bl_status"]').val('draft');
				});
			});
		</script>
		<input type="hidden" name="bl_status" value="" id="bl_publish">
		<div class="clear mb10"></div>
		<div class="horline mb10"></div>
		
		<div class="inputSet">
			<script type="text/javascript" charset="utf-8">
			
				$(document).ready(function(){
					var delayer = delayTimer(1000);
					$('input[name="bl_cat_src"]').live('keyup',function(event){
							delayer(function(){
								var q = $('input[name="bl_cat_src"]').val();
								$.ajax({
										type: "POST",
										dataType : "json",
										data : {'cat_src' : q},	
										url: "<?=site_url('backend/blog/b_blog/ajx_src_cat')?>",
										success: function(data){					     
											   	if(data.msg == 1){
													$('.list_cat').remove();
													print_autolist(data.cats, 'list_cat', 'id', 'input[name="bl_cat_src"]');
													add_cat();
											   	}
										   }
									});
							});
					});
				});
				function add_cat(){
					$('.list_cat .cat_name').live('click', function(event){
						$('input[name="bl_cat_id"]').val('');
						$('input[name="bl_cat_src"]').val('');
						var id = $(this).attr('id');
						var text = $(this).text();
						$('input[name="bl_cat_id"]').val(id);
						$('input[name="bl_cat_src"]').val(text);
						$('.list_cat').remove();
					});
				}
			</script>
			<div class="label"><span>Category</span></div>
			<div class="input relative">
				<input type="text" name="bl_cat_src" value="<?=$post->cat_name;?>">
				<input type="hidden"  name="bl_cat_id" value="<?=$post->cat_id;?>">
			</div>
			<div class="clear"></div>
		</div>
		<div class="inputSet">
			<div class="label"><span>Tag</span></div>
			<div class="input">
				<input type="text" name="tag" value="" id="tag">
			</div>
			<div class="clear"></div>
		</div>
		<div class="inputSet">
			<div class="label"><span>Publish Date</span></div>
			<div class="input">
					<script>
					$(document).ready(function(){

					$(".hasTime").datetimepicker({
						dateFormat:"yy-mm-dd",
						timeFormat: 'hh:mm:ss'
						});
					});
					</script>
				<input type="text" name="bl_p_date" value="" class="hasTime">
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="clear"></div>
	
</form>
</div>
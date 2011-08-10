<div class="clear"></div>
<div class="blog_cat_tool">
	<div class="right">
		<div class="new_catFrom right">
			<script type="text/javascript" charset="utf-8">
				$(document).ready(function(){
					$('#add_new').click(function(){
						var name = $('input[name="new_cat_name"]').val();
						if(name == ''){
							return false;
						}else{
		
							$.ajax({
									type: "POST",
									dataType : "json",
									data : {'name' : name},	
									url: "<?=site_url('backend/blog/b_blog/ajx_cat_crt')?>",
									success: function(data){					     
										   	if(data.msg == 1){
											$('.catList').prepend('<tr><td>'+data.cat.name+'</td><td>0</td><td>Action</td></tr>');
										   	}
									   }
								});
						
								
						}
					});
				});
			</script>
		<span>New Category</span> <input type="text" name="new_cat_name" value=""> <span class="button add-button-Ui" id="add_new">Add New</span>
		</div>
		<div class="clear"></div>
		
	</div>
	<div class="clear"></div>
</div>
<div class="browse_cats mt10">
	<?if($cats):?>   
<div class="table-Ui">
	
<table class="catList">
 <thead>
  <tr>
    <td>Name</td>
    <td>total post</td>
	<td>Action</td>
  </tr>
 </thead>
 <tbody>
	<?foreach($cats as $cat):?>
	<tr>
		<td><?=$cat->name?></td>
		<td>100</td>
	    <td>Action</td>
	</tr>
	<?endforeach;?>
 </tbody>

</table>
</div>
<?else:?>
	there isn't post
<?endif?>
</div>
<div class="browse_post mt10">
	<?if($posts):?>
	   
<div class="table-Ui">
	
<table class="postList">
 <thead>
  <tr>
    <td>Title</td>
    <td>Category</td>
	<td>Status</td>
	<td>Date create</td>
    <td>Action</td>

  </tr>
 </thead>
 <tbody>
	<?foreach($posts as $post):?>
	<tr>
		<td><?=$post->title?></td>
	    <td><?=modules::run('blog/api_cat_getbyid',$post->cat_id)->name?></td>
		<td><?=$post->status?></td>
		<td><?=datetime($post->c_date)?></td>
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
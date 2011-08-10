<div class="browse_user mt10">
	<?if($users):?>
	   
<div class="table-Ui">
	
<table class="prodList">
 <thead>
  <tr>
    <td>Name</td>
    <td>Role</td>
	<td>Email</td>
    <td>Action</td>

  </tr>
 </thead>
 <tbody>
	<?foreach($users as $user):?>
	<tr>
		<td><?=$user->first_name.' '.$user->last_name;?></td>
	    <td><?=$user->role?></td>
		<td><?=$user->email?></td>
	    <td>Action</td>
	</tr>
	<?endforeach;?>
 </tbody>

</table>
</div>
<?else:?>
	there isn't user 
<?endif?>
</div>
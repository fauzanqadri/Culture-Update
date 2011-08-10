<div class="box2 grid_700 ctr form-Ui">
	<form action="<?=current_url();?>" method="post" accept-charset="utf-8">
		<div class="inputSet">
		<div class="label"><span>Name</span></div>
		<div class="input"><input type="text" name="name" value=""></div>
		<div class="clear"></div>
		</div>
		<div class="inputSet">
		<div class="label"><span>No Rek</span></div>
		<div class="input"><input type="text" name="no_rek" value=""></div>
		<div class="clear"></div>
		</div>
		<div class="inputSet">
		<div class="label"><span>An Rek</span></div>
		<div class="input"><input type="text" name="an_rek" value=""></div>
		<div class="clear"></div>
		</div>
		<span>Description</span>
		<div class="clear"></div>
		<textarea name="desc" style="height:150px;"></textarea>
		<div class="clear"></div>
		<?$this->dodol_theme->load_text_editor('desc')?>
		<p><input type="submit" name="submit" value="Continue &rarr;"></p>
	</form>
</div>
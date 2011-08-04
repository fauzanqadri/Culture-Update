<div class="cart_form form-Ui">
	<form action="" method="post" accept-charset="utf-8">
	<?if($attrbs = element('attributes', $prod)):?>
		<?foreach($this->cart->load_attr($attrbs) as $attrb=>$items):?>
			<select name="<?=$attrb;?>">
				<option value="none"><?=$attrb;?></option>
				<?foreach($items as $item):?>
					<option value="<?=$item;?>"><?=$item;?></option>
				<?endforeach;?>
			</select>
		<?endforeach;?>
		<input type="hidden" name="have_attrb" value="y">
	<?else:?>
		<input type="hidden" name="have_attrb" value="n">
	<?endif;?>
		<input type="text" name="qty" value="qty" class="grid_50 text-input">
		<input type="hidden" value="<?=$p->id;?>" name="id_prod"/>
		<input type="submit" name="addcart" value="Add To Cart" id="exec_add" class="button">
	</form>
</div>
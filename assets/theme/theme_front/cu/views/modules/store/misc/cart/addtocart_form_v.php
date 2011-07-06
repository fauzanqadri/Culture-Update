<div class="addToCart">
	<form method="post" id="buyProd" action="<?=current_url();?>">
		<div class="attrbProd">
			
	<? if($a){?>	
	<?
	$colors = $this->cart->loadAttrib($a, 'c');
	$sizes = $this->cart->loadAttrib($a, 's');
	?>
		<select name="s">
			<option value="no">size</option>
		<? foreach($sizes as $size){?>
			<option value="<?=$size?>"><?=$size?></option>
		<?}?>
		</select>
		<select name="c">
			<option value="no">Color</option>
		<? foreach($colors as $color){?>
			<option value="<?=$color?>"><?=$color?></option>
		<?}?>
		</select>
		<input type="hidden" name="have_attrb" value="y">
	<?}else{?>
		<input type="hidden" name="have_attrb" value="n">
	<?}?>	
		<input type="text" name="qty" class="text-input grid_50" value="QTY"/>
		</div>
		<div class="clear"></div>
		<br/>
		<input type="hidden" value="<?=$p->id;?>" name="id_prod"/>
		<input type="submit" name="addcart" value="Add to Cart" class="button"/>	
		
	</form>
    </div>
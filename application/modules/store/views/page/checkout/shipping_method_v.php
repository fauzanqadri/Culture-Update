<div class="shipping_method">
	<?=$cart;?>
	<form method="post" action="<?=current_url();?>">
	<?=$this->cart->shipping_option();?>
	<input type="submit" name="next" value="next" class="button">
 </form>
</div>
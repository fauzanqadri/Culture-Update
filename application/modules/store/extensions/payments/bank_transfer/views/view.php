<div class="bank_tarnsfer">
	<h6 class="bold">Bank Transfer</h6>
	<div class="bank_list">
<?foreach($payments as $payment):?>
	<div class="item <?=strtolower(str_replace(' ', '_', $payment->name));?>">
		<span class="name_payment"><?=$payment->name?></span>
		<input type="radio" name="payment_id" value="bt_<?=$payment->id;?>">
	</div>
<?endforeach;?>
	</div>

</div>
<div class="payment_method">

	<?=$cart;?>
	<div class="checkout-step">
		<script>
		$(document).ready(function(){
			var item = $('.choosen_payment:checked');
			var item_val = item.val();
			if(item){
				item.parents('.item').addClass('checked');
				$('.payment_information .'+item_val).show().addClass('active');
			}
			$(".method_items .item").click(function () {
				$('.payment_information .active').hide().removeClass('active');
				$('.method_items .item').removeClass('checked');
			      $(this).toggleClass("checked");
					var choosen = $(this).find('.choosen_payment');
					var ch_val = choosen.val();
					choosen.attr('checked', true);
					$('.payment_information .'+ch_val).delay(300).show().addClass('active');
					
			});
		
		});
		</script>
		<?if($this->cart->payment_info){ $checked = 'checked=checked'; }else{ $checked = '';}?>
		
		<div class="form-Ui">
		<form action="<?=current_url();?>" method="post">
			<?=$this->cart->payment_option()?>
		
		
			<input type="submit" class="button right" name="next" value="Next">
			<br class="clear"/>
		</form>
		</div>
	</div>
	
</div>
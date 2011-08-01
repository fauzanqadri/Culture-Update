<div class="table-Ui jne_carrier">
	<div class="carrier_logo">
		<img src="<?=base_url();?>/assets/store/carrier_logo/jne_logo.png" alt="UPS" height="50">
	</div>
	<table>
		<thead>
		<tr>
			<td>Service</td>
			<td>Rate</td>
		</tr>
		</thead>
		<tbody>
			<?foreach($data as $item):?>
			<tr> 
					<td>
						<div class="ui_choose">
						<span class="service"><?=element('service', $item);?></span>
						<input type="radio" class="hide" name="rate_id" value="<?=element('jne_rate_id', $item);?>">				</div>
					</td>
						
					<td><?=$this->cart->show_price(element('rate', $item));?></td>
			</tr>
			<?endforeach?>
		</tbody>
	</table>
	
	
</div>

<script type="text/javascript" charset="utf-8">
	$(document).ready(function(){
		$('.jne_carrier .ui_choose .service').click(function(){
			$('.jne_carrier .ui_choose .service').removeClass('button');
			$(this).addClass('button');
			$(this).next().attr('checked', true )
		});
	});
</script>

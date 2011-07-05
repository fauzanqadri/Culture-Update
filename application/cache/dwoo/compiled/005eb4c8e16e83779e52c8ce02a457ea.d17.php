<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><script type="text/javascript" charset="utf-8">
	$(document).ready(function(){
		function redi(){
		<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Notice</p>
<p>Message:  Undefined variable: redi</p>
<p>Filename: backend/backend_login_v.php</p>
<p>Line Number: 4</p>

</div>			var url = 'http://localhost/culture-update//backend/index/first';
			$(location).attr('href', url);
		}
		$('.loginMod form').submit(function(){
			var data = $(this).serialize();
			$('.loginMod .ajx_msg-Ui').empty();
			$('.loginMod .ajx_msg-Ui').append('<div class="ajax_loader_small"></div>');
		
			$.ajax({
				 type: "POST",
					   dataType : "json",	
					   url: "http://localhost/culture-update//user/auth/ajx_backend_login",
					   data: data ,
					   success: function(data){					     
						   	if(data.status == 'success'){
						   	$('.mainGrid').hide('fade','slow', redi);
						   	}else if(data.status == 'failed'){
						   		$('.loginMod .ajax_loader_small').fadeOut();
						   		$('.loginMod .ajx_msg-Ui').hide().append(data.msg).delay(1000).fadeIn().delay(2000).fadeOut();
						   	}
					   }

			});
			return false;
			
		});
		$('.mainGrid').hide();
		$('.mainGrid').show('fade','slow' );
	});
</script>
<div class="grid_960 ctr">
	
<br/>
<br/>
<br/>
<br/>
<br/>

<div class="grid_420 ctr mt20 login_page mainGrid ui-corner-all">
     <div class="heading_page  def_grad">
		<h4>Culture Update Backend Login</h4>
		</div>
	<div class="form-Ui loginMod padd20">
	   
		<form action="http://localhost/culture-update/backlogin/red/backend" method="post">
			<div class="mb20">
				<div class="left grid_100 text_right mr10">
					Email 
				</div>
				<div class="grid_260 left">
				<input type="text" class="text-input" name="email" value="email">
				</div>
				<br class="clear"/>
			</div>
			<div class="">
				<div class="left grid_100 text_right mr10">
					Password 
				</div>
				<div class="grid_260 left">
				<input type="password" class="text-input" name="password" value="password">
				</div>
				<br class="clear"/>
			</div>
			<div class="clear"></div>
			<br>
			<div class="left grid_280 ajx_msg-Ui">
				
			</div>
			<div class="right">
				<input type="submit" class="button login" name="login" value="login">
			</div>
			<div class="clear"></div>
		</form>
	</div>
</div>
<div class="clear"></div>
</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>
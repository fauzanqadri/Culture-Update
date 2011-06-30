
<?=$this->dodol_theme->partial('header');?>
<div class="component">
	<div class="topBar">
		<div class="navTop left">
			<?=load_widget('topmenu');?>
		</div>
		<div class="userMenu right">
			<p>
				<a href=""><span>Sign In</span></a> | 
				<a href=""><span>Register</span></a> | 
				<a href=""><span class="cart_info"><span class="cart_icon"></span>Your Bag is Empty</span></a>
			</p>
			
		</div>
		<div class="clear"></div>
	</div>
	
	<div class="headingPage">
	
	</div>
	
	<div class="sideBar"></div>
	
	<div class="comp_content">
			<? if(isset($directLayer)){ echo $directLayer ;}?>
			<? if(isset($mainLayer)){ echo $this->load->view($mainLayer) ;}?>
	
	</div>
</div>

<?=$this->dodol_theme->partial('footer');?>
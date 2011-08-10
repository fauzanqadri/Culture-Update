<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

Class Cu_theme{
	
	function Cu_theme(){
	
	}
	function register(){
		$this->load->library('dodol_theme');
		$this->dodol_theme->set_front_layout('store');
	}
	
	
}
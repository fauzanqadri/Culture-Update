<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

include APPPATH . '/libraries/kint/Kint.class.php';
class Bug extends Kint {
	
	var $msg = array();
	
	function bug (){
		$this->_ci =& get_instance();
	}
	function send($msg=false){
		if($msg!=false){
			$this->msg['Template_debug'] = $msg;
		}else{
			return false;
		}
	}
	function show(){	    
		if(count($this->msg) > 0){
			return	$this->_ci->dodol->print_arrayRecrusive($this->msg);
		}else{
			return false;
		}
		
	}
	function my_trace(){
		parent::trace();
		get_defined_vars();
		
	}
	
}
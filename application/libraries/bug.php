<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Bug {
	
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
	
}
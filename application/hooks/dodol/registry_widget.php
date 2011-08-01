<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Registry_widget{
	var $CI ;
	function Registry_widget(){
		$this->CI =& get_instance();
	}
	function refresh(){
		if($this->CI->session->userdata('loaded_widget')):
			$this->CI->session->unset_userdata('loaded_widget');
			$data = array('loaded_widget' => array()); $this->CI->session->set_userdata($data);
		else:
			$data = array('loaded_widget' => array()); $this->CI->session->set_userdata($data);
		endif;
	}
	/*
	function register(){
			foreach($this->CI->session->userdata('loaded_widget') as $item){
			$file = element('state', $item).'/'.element('name', $item).'/'.element('name', $item).'/register';
				widget_helper::placed($file, element('param', $item));
			
			}
	}
	*/
	
	

}

?>
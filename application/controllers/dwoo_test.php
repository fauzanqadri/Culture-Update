<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dwoo_test extends MX_Controller {

	var $data;
    function index()
    {

    	$this->load->library('parser');
		$this->data->asuh = 'kampret';
		$this->data->anjing = 'asuh';
    	$this->parser->parse('test',  $this->data);
    	
	}
	function my_theme(){
		$data = array('asuh' => 'koe');
		$this->dodol_theme->render()->build('test', $data);
	}
 
	
}

?>
<?php (defined('BASEPATH')) OR exit('No direct script access allowed');
class MY_Exceptions extends CI_Exceptions {
	
	function __construct(){
		$this->ci =& get_instance();
	}
	function show_404($page = '', $log_error = TRUE)
	{	
		if ($log_error)
		{
			log_message('error', '404 Page Not Found --> '.$page);
		}
		echo $this->ci->load->library('dodol_theme')->not_found();
	}
	function show_error($heading, $message, $template = 'error_general', $status_code = 500)
	{
	
	}
	function show_php_error($severity, $message, $filepath, $line)
	{
	
	}
	
}
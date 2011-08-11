<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dodol_theme_helper 
{
	function __construct(){
		$this->_ci =& get_instance();
		$this->_ci->load->library('dodol');
		$this->_ci->dodol->test();
	}
	function register($theme){
		$args = func_get_args();
		$path = './assets/theme/theme_front/'.$theme.'/';
		$file = 'theme_'.$theme;
		if(!is_file($path.$file.EXT)) : return false;endif;
		self::find($path, $file);
		Modules::load_file($file, $path);
		$file = ucfirst($file);
	    $this->theme = new $file();
	 	return call_user_func_array(array($this->theme, 'register'), array_slice($args, 1));    
		
	}

	function theme(){
		return $this->theme;
	}
	
	function load($object){
        $this->$object = load_class(ucfirst($object));
    }
	function find($path, $file){
		$file_path = $path.'/'.$file.EXT ;
		// check that file exist
		if(!file_exists($file_path)){
			return false;
		}else{
			return true;
		}
	}
}
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
Theme Library for CI, Personaly Use for barock [zidmubarock@gmail.com]
file name : Theme.php
**/

class Dodol_theme
{
		var $_ci 			=  '';
		var $core_js      	= array();
		var $core_css 		= array();
		var $front_js 		= array();
		var $front_css 		= array();
		var $back_js 		= array();
		var $back_css 		= array();

		function Dodol_theme(){
			$this->_ci =& get_instance();
			$this->front_theme = 'cu';
			$this->admin_theme = 'default';
			$this->front_theme_location = './assets/theme/theme_front/';
			$this->admin_theme_location = './assets/theme/theme_admin/';
		}

		function render(){
			parse_str($_SERVER['QUERY_STRING'], $_GET); 
			$this->_ci->input->_clean_input_data($_GET);
			
			$layout = 'default';
			
			
			$this->_ci->template->add_theme_location($this->front_theme_location);
			$this->_ci->template->set_theme($this->front_theme);
			return $this->_ci->template->set_layout($layout);
		}
		function view($view, $vars = array(), $return = FALSE){
			// THEME FILE PATH OVERIDE
			$path = $this->front_theme_location.$this->front_theme.'/views/modules/';
			// IF VIEW FILE EXIST ON THEME, LETS PUT ALL on here
			if(file_exists($path.$view.EXT)):
				return $this->_ci->load->my_view($path, $view, $vars, $return);
		
			else:
			// IF THEME DOSN't HAve THE file, Let put it back to th module 
				return $this->_ci->load->view($view, $vars, $return);
			endif;

		}
		function path($dir =NULL){
		$path = $this->front_theme_location.$this->front_theme.'/'.$dir;
		return base_url().$path;
		}
		function admin_render(){
			$this->_ci->template->add_theme_location($this->admin_theme_location);
			$this->_ci->template->set_theme($this->admin_theme);
			return $this->_ci->template->set_layout('default');
		}
		function admin_view($view, $vars = array(), $return = FALSE){
			// THEME FILE PATH OVERIDE
			$path = $this->admin_theme_location.$this->admin_theme.'/views/modules/';
			// IF VIEW FILE EXIST ON THEME, LETS PUT ALL on here
			if(file_exists($path.$view.EXT)):
				return $this->_ci->load->my_view($path, $view, $vars, $return);
			else:
			// IF THEME DOSN't HAve THE file, Let put it back to th module 
				return $this->_ci->load->view($view, $vars, $return);
			endif;

		}
		function admin_path($dir=null){
			return base_url().substr_replace($this->admin_theme_location.$this->admin_theme.'/'.$dir, '', -1) ;
		}




		function isAjax() {
			return (isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
				($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest'));
			}

		function ajax_loader($width=50, $class="loader"){
			$loader = '<img class="'.$class.'" src="'.base_url().'/assets/gen_img/loader.gif" alt="loader" width="'.$width.'">';
			return $loader;
		}
		function menu_rend($source, $type = 'menu_hor' ){
			$out = '<ul class="'.$type.'">';
			foreach($source as $s){
				$out .= '<li><a href="'.$s['link'].'">'.$s['anchor'].'</a></li>';
			}
			$out .= '<div class="clear"></div></ul>';
			return $out;
		}
		function call_assets($dir, $extension, $root, $push ) {
			if(is_dir($dir)) {
				if($dh = opendir($dir)){
					while($file = readdir($dh)){
						if($file != '.' && $file != '..'){
							if(is_dir($dir . $file)){
							//	echo $dir . $file.'<br/>';
								// since it is a <strong class="highlight">directory</strong> we recurse i
								$this->call_assets($dir . $file . '/', $extension, $root, $push);
							}else{
								if(strpos($file, '.'.$extension) !== false){
									array_push($this->$push, array(str_replace($root, '', $dir . $file)));
								}	
						

					 		}
						}
			 		}
				}
		 		closedir($dh);         
		     	}
		}
		public function show_date($date){

				$date= new DateTime($date);

		//		$date = date_create_from_format('Y-m-d H:i:s', $date);
				$str_date = $date->format('l, F j,  Y');
				return $str_date;
		}
		public function nice_strlink($string)
		{
			$new_string = strtolower(str_replace(' ', '-', $string));
			return $new_string;
		}
		function copy_this_link($string, $anchor = 'copy this' ){
			$object = '<span class="toClipBoard button" alt="'.$string.'">'.$anchor.'</span>';
			return $object;
		}



		function load_text_editor($id){
				$this->_ci->load->helper('url');
				$this->_ci->load->helper('ckeditor');
				//Ckeditor's configuration
				$config = array(
					'id' 	=> 	$id, 
					'path'	=>	'assets/global_js/ckeditor', 
					'config' => array('toolbar' 	=> 	"Full", 'width' 	=> 	"100%", 'height' 	=> 	'200px',),
					'toolbar' => 'Basic',
					'styles' => array(
						 'style 1' => array (
							'name' 		=> 	'Blue Title','element' 	=> 	'h2', 'styles' => array(
								'color' 	=> 	'Blue','font-weight' 	=> 	'bold')),

					'style 2' => array (
						'name' 	=> 	'Red Title','element' 	=> 	'h2','styles' => array(
							'color' 	=> 	'Red',	'font-weight' 		=> 	'bold','text-decoration'	=> 	'underline'))				
					));
		
					echo display_ckeditor($config);

			}	

	


}
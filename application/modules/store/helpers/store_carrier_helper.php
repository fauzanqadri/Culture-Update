<? if (!defined('BASEPATH')) exit('No direct script access allowed');

class Store_carrier_helper
{


	
	function __construct(){
		$this->source_data 	= ($ship = $this->session->userdata('shipto_info')) ? $ship : $this->session->userdata('customer_info');
		if($this->source_data && $shipping = $this->cart->shipping_info()) :
			if(	element('country_id', $this->source_data) != element('country_id', $shipping) ||
				element('zip', $this->source_data) != element('zip', $shipping) ||
				element('city', $this->source_data) != element('city', $shipping) ) :
			endif;
			
		endif;
		log_message('debug', 'Store_carrier_helper Initialized');
			
	}
	
	function load($file){
		
		
		
		if(strpos($file, '/') !== false){
			$post = explode('/', $file);
			$file = $post[0].'_carrier';
			$func = $post[1];
		}else{
			$file = $file.'_carrier';
			$func = 'load';
		}
		$this->path =  APPPATH.'modules/store/extensions/carriers/'.str_replace('_carrier', '', $file).'/';
		
		$path = $this->path;
		$args = func_get_args();
		// check that file exist;
  		if(self::find($path, $file)):
		    Modules::load_file($file, $path);
		    $file = ucfirst($file);
		    $carrier = new $file();
		    $carrier->carrier_path = $path;
		    return call_user_func_array(array($carrier, $func), array_slice($args, 1));
		else:
			return false;
		endif;
	
	}
	function get_rate(){
		
	}
	function choose_rate(){
		
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
	function render($view, $data = array()){
        extract($data);
        include $this->carrier_path.'views/'.$view.EXT;
    }

	function registry($func = null){
		$func = ($func != null) ? $func : 'get_rate';
		$all_shipper    = scandir(APPPATH.'modules/store/extensions/carriers/');
		$output = '';
		if(count($all_shipper) > 0):
			foreach($all_shipper as $item){
				if($item != '.' && $item != '..'  && $item != '.DS_Store'){
					store_carrier_helper::load($item.'/'.$func);	
				}
			}
		else:
			return false;
		endif;
		
	}
	
	// LOAD CI GET_INSTANCE
	function __get($var) {
        global $CI;
        return $CI->$var;
    }
}
?>

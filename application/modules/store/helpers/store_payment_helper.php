<? if (!defined('BASEPATH')) exit('No direct script access allowed');

class Store_payment_helper
{
		function __construct(){
				log_message('debug', 'Store_payment_helper Initialized');
		}
		// ABSTRACT OVERIDE FUNCTIONS
		function get_option(){

		}
		function choose_option(){

		}
		function payment_action(){

		}

		function load($file){



			if(strpos($file, '/') !== false){
				$post = explode('/', $file);
				$file = $post[0].'_payment';
				$func = $post[1];
			}else{
				$file = $file.'_carrier';
				$func = 'load';
			}
			$this->path =  APPPATH.'modules/store/extensions/payments/'.str_replace('_payment', '', $file).'/';

			$path = $this->path;
			$args = func_get_args();
			// check that file exist;
	  		if(self::find($path, $file)):
			    Modules::load_file($file, $path);
			    $file = ucfirst($file);
			    $payment = new $file();
			    $payment->carrier_path = $path;
			    return call_user_func_array(array($payment, $func), array_slice($args, 1));
			else:
				return false;
			endif;

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
			$all_payment    = scandir(APPPATH.'modules/store/extensions/payments/');
			$output = '';
			if(count($all_payment) > 0):
				foreach($all_payment as $item){
					if($item != '.' && $item != '..'  && $item != '.DS_Store'){
						store_payment_helper::load($item.'/'.$func);	
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
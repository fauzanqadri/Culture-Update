<? if (!defined('BASEPATH')) exit('No direct script access allowed');
class Basic_carrier extends Store_carrier_helper {
	function __construct(){
		
	}
	function get_rate(){
		if($this->session->userdata('store_carrier') == '') :
			$this->render('view', array('data' => false));
		else:
			return false;
		endif;
	}
	function choose_rate(){	
	}
}
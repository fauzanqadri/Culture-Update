<? if (!defined('BASEPATH')) exit('No direct script access allowed');

class Bank_transfer_payment extends Store_payment_helper {
	function __construct(){
		
	}
	function get_option(){
		$q = $this->db->get('store_payment'); 
		if($q->num_rows() == 0){
			return false;
		}
		$this->render('view', array('payments' => $q->result()));
		
	}
	function choose_option(){
		$id = $this->input->post('payment_id');
		if(strpos($id,'bt_') !== false):
			$id = str_replace('bt_', '', $id);
			$choosen  = $this->db->where('id', $id)->get('store_payment')->row();
			$data = array(
				'method' => $choosen->name .' NO '.$choosen->no_rek.', AN '.$choosen->nm_rek,
				 );
			$this->session->set_userdata(array('payment_info' => $data));
		endif;
	}

}


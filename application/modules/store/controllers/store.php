<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Store extends MX_Controller {

	//php 5 constructor
	function __construct() {
		parent::__construct();
		$this->load->model('store/store_m');
	}
	
	//php 4 constructor
	function Store() {
		parent::__construct();
	}
	
	function index() {
	 	echo 'asuh';
	}
	function testing_route(){
		echo 'its work';
	}

	function request_restock($data=array()){
		$this->template->build('misc/store/request_restockform_v', $data);
	}
	function exe_requestRestock(){
		$data = array(
			'email'=>$this->input->post('email'),
			'name'=> $this->input->post('name'),
			'id_prod' => $this->input->post('id_prod'),
				);
		if($this->input->post('id_attrb')){
		$data['id_attrb'] = $this->input->post('id_attrb');
		}
		$q = $this->store_m->add_request_restock($data);
		if($q){
			$this->messages->add('your request successfully added', 'success');
		}else{
			$this->messages->add('you seem already request restock from this product');
		}
	}
	function ajax_requestRestock(){
		if($this->input->post('email')){
		$ins_data = array(
			'email'=>$this->input->post('email'),
			'name'=> $this->input->post('name'),
			'id_prod' => $this->input->post('id_prod'),
			'c_date' => date('Y-m-d H:i:s'),
				);
		if($this->input->post('id_attrb')){
		$ins_data['id_attrb'] = $this->input->post('id_attrb');
		}
		$q = $this->store_m->add_request_restock($ins_data);
		if($q){
			$data['status'] = 'on';
			$data['msg']    = 'your request successfully added';
			echo json_encode($data);
		}else{
			$data['status'] = 'off';
			$data['msg']    = 'you seem already request restock from this product';
			echo json_encode($data);
		}
	}
	}
	function getCountry($id){
	return	$this->store_m->get_country($id);
	}
	function payprocessing(){
		$id = $this->session->userdata('order_id');
		$data['form'] = modules::run('paypal/generate_form', $id);
		$data['loadSide'] = false;
		$data['mainLayer'] = 'store/page/checkout/payProcessing_v';
		$this->dodol_theme->render($data);
	}
	function carrier_cont(){
		parse_str($_SERVER['QUERY_STRING'], $_GET); 
		$this->input->_clean_input_data($_GET);
		$state = $this->input->get('cr');
		$this->load->helper('store/store_carrier');
		return store_carrier_helper::load($state);
	}
	function new_arrival(){
		$this->load->library('dodol_paging');
		$uri = $this->uri->uri_to_assoc();
		$param['start'] = (!element('page', $uri)) ? 0 : element('page', $uri);
		$param['limit'] = 10;
		$param['order_role'] = 'ASC';
		$param['order_by'] = 'prod.c_date';
		$q = modules::run('store/product/api_browse', $param);
		if(!$q):
			return $this->dodol_theme->not_found();
		endif;
		$target_url = str_replace('/page/'.element('page', $uri) , '', current_url());
				// configuration for pagination
		$confpage = array(
					'target_page' => $target_url,
					'num_records' => element('num_rows', $q),
					'num_link'	  => 5,
					'per_page'   => $param['limit'],
					'cur_page'   => element('page', $uri),
					);
				// execute the pagination conf
		$this->dodol_paging->initialize($confpage);
		$render['prods'] = element('prods', $q);
		$render['pT'] 	 = 'New Arrival';
		$this->dodol_theme->render()->build('store/page/store/new_arrival', $render);
		
		
	}

}?>
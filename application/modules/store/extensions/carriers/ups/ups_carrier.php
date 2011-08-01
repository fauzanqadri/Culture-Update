<?

class Ups_carrier extends Store_carrier_helper {


	var $fecth_url = 'http://www.neox.net/ups/upsrate.php';
	var $weight;
	var $source_data ;
	var $base_country_ID ;
	var $base_country_ZIP ;
	
	function __construct(){
		$this->source_data 	= ($ship = $this->session->userdata('shipto_info')) ? $ship : $this->session->userdata('customer_info');
		if($this->source_data) :
		$this->country_ID 	= $this->db->where('country_id', element('country_id', $this->source_data))->get('store_country')->row()->country_2_code;
		endif;
		$this->weight 		= $this->cart->weight()/0.45;
		$this->load->config('store');
		$this->base_country_ID  = $this->config->item('store_country_ID');
		$this->base_country_ZIP = $this->config->item('store_zip');
		$ups =  element('ups', $this->session->userdata('store_carrier'));
		$ups_meta = element('meta', $ups);
		if(	
			// if UPS table exist and country id == ID
			  $this->country_ID == 'ID'  ||
			// if meta ups not mact with source data
			( 
				$ups &&
				( 
					element('country_id', $this->source_data) != element('country_id', $ups_meta) ||
					element('zip', $this->source_data) != element('zip', $ups_meta) ||
					element('city', $this->source_data) != element('city', $ups_meta) ||
					element('province', $this->source_data) != element('province', $ups_meta) )
				) 
			):
			
			// UNSET UPS TABLE, Sorry :(
			unset($this->session->userdata['store_carrier']['ups']);
		endif;
	
	}
	

	function get_rate(){

		if($this->country_ID == 'ID'){
			return false;
		}
		if($ups_table = element('ups',$this->session->userdata('store_carrier'))){	
			return 	$this->render('view', $ups_table);
		}

		
			$param = array(
				's_country' 	=> $this->base_country_ID,
				's_zip'  		=> $this->base_country_ZIP,
				't_country' 	=> $this->country_ID,
				't_zip'			=> $this->source_data['zip'],
				'weight'		=> $this->weight ,
				'pickup'		=> '01',
				'residential' 	=> '0',
				'submit'		=> 'Calculate Shipping Cost'
			);
			$this->load->library('curl');
			$this->load->helper('dodol_dom');
			$this->curl->create($this->fecth_url);
			$this->curl->option(CURLOPT_BUFFERSIZE, 10);
			$this->curl->post($param);
			$result = $this->curl->execute();

			$html = str_get_html($result);
			//echo $result;
			$td = $html->find('table', 0);
			$output = array();
			$index = array();
			//GETTING INDEX of EACH Value Information
			foreach($td->find('tr th') as $row){

						array_push($index, strtolower(str_replace(' ', '_', $row->innertext)));

			}
			// CHECK That everything works good :)
			if(element(0, $index) != 'service'){
				return false;
			}
			$header = $index;
			// EXTRACT EACH RATE VALUE
			foreach($td->find('tr') as $row){
					$value = array();
					if($row->find('td') != null):
						foreach($row->find('td') as $item){
							$string = ($item->innertext == null) ? '0' : $item->innertext ;
							array_push($value, str_replace('$', '', $item->innertext));
						}
						array_push($output, array_combine($index, $value));
					endif;
			}
			$return['meta'] = array(
				'country_id' => element('country_id', $this->source_data),
				'zip'		=> element('zip', $this->source_data),
				'city'		=>element('city', $this->source_data),
				'province'	=> element('province', $this->source_data)
				);
			if($this->cart->currency() != 'USD'):
				$rate = $this->cart->conv('USD', 'IDR');
				$new_output = array();
				foreach ($output as $index => $val){

					foreach($val as $key => $value){
							$money = array('basic_charge', 'option_charge', 'total_charge');
							$pre = array();
							if(in_array($key, $money)){
								$new[$key] = $value*$rate;
							}else{
								$new[$key] = $value;
							}

					}
					$this->load->helper('string');
					$new['ups_rate_id'] = 'ups_'.random_string('alnum', 32);
					array_push($new_output, $new);
				}
				
				$return['index_header'] = $header;
				$return['data'] = $new_output;
				$this->session->userdata['store_carrier']['ups'] = $return;
				$this->session->sess_write();
				$this->render('view', $return);
			else:
				$return['index_header'] = $header;
				$return['data'] = $output;
				$this->session->userdata['store_carrier']['ups'] = $return;
				$this->session->sess_write();
				$this->render('view', $return);
			endif;
			
			
	}
	function choose_rate(){	
		// GRAB THE LISTENER
		$id_rate = $this->input->post('rate_id');
		// check that ups choosen
		if($id_rate || $id_rate != '' && strpos($id_rate,'ups_') !== false): 
				foreach($this->session->userdata['store_carrier']['ups']['data'] as $item):
					if($item['ups_rate_id'] == $id_rate) :
							$rate_detail = array(
								'fee' => element('total_charge', $item),
								'service' => element('service', $item),
								'carrier' => 'UPS',
								'country_id' => element('country_id', $this->source_data),
								'zip' => element('zip', $this->source_data),
								'city' => element('city', $this->source_data)
							);
														
					endif;
				endforeach;
				ksort($ship_detail);
				$this->session->set_userdata('shipping_info', $rate_detail );
		else:
			return false;
		endif;



	}
	
	function load()
	{
	
	}
	
	
}
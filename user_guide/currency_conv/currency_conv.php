<?
class Currency_conv extends Widget_helper
{
	var $detail = array(
		'name' => 'Currency Converter',
		'Author' => 'Zidni Mubarock',
		'file_name' => 'currency_conv',
		'state' => 'front',
		'Email' => 'zidmubarock@gmail.com',
		'version' => '1.0',
		'description' => 'Currency converter for site'
	);
	function getdetail(){
		return $this->detail;
	}
	function run(){
		if($this->input->post('currency')){
			if($this->input->post('currency') != $this->config->item('currency')){
			  $from   = $this->config->item('currency'); /*change it to your required currencies */
	        $to     = $this->input->post('currency');
	        $url = 'http://finance.yahoo.com/d/quotes.csv?e=.csv&f=sl1d1t1&s='. $from . $to .'=X';
	        $handle = @fopen($url, 'r');
	        	if ($handle) {
		            $result = fgets($handle, 4096);
		            fclose($handle);
		        }    
					$allData = explode(',',$result); /* Get all the contents to an array */
			        $rate = $allData[1];
       
			 		if($result){
			       		$data = array('currency' => $this->input->post('currency'), 'rate' => $rate);
						$this->session->set_userdata($data);
					}
				}else{
					$this->session->unset_userdata('currency');
					$this->session->unset_userdata('rate');
				}
			modules::run('store/store_cart/refresh_cart');
			redirect(current_url());
			}
		$this->render('index');	
	}
}
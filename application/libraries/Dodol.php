<?

class Dodol {
	var $theme;
	function __construct()
	{
		$this->_ci =& get_instance();
	}
	function test(){
		echo 'asuh';
	}
	function custom_time($date, $nodate=false){
		if(empty($date) || $date == null) {
			if($nodate==false){
		        return "No date provided";
			}else{
				return $nodate;
			}
		    }

		    $periods         = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
		    $lengths         = array("60","60","24","7","4.35","12","10");

		    $now             = time();
		    $unix_date         = strtotime($date);

		       // check validity of date
		    if(empty($unix_date)) {    
		        return "Bad date";
		    }

		    // is it future date or past date
		    if($now > $unix_date) {    
		        $difference     = $now - $unix_date;
		        $tense         = "ago";

		    } else {
		        $difference     = $unix_date - $now;
		        $tense         = "from now";
		    }

		    for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
		        $difference /= $lengths[$j];
		    }

		    $difference = round($difference);

		    if($difference != 1) {
		        $periods[$j].= "s";
		    }
		    return "$difference $periods[$j] {$tense}";
	}
	function arrayObject($array){
		return json_decode(json_encode($array));
	}
	function objectToArray($object){
			$array=array();
			foreach($object as $member=>$data)
			{
				$array[$member]=$data;
			}
			return $array;
	}
	function jsonToArray($json){
		return json_decode($json, true);
	}
	function arrayToJson($array){
		return json_encode($array);
	}
	function objectToJson($objects){
		return json_encode($this->objectToArray($objects));
	}
	function print_arrayRecrusive($array){
		$array = (is_object($array)) ? $this->objectToArray($array) : $array;
		$output = '';
		foreach($array as $key => $value){
			$output .= '<div class="box2 mb10"><span class="bold">'.$key.'</span> =';
			if(is_array($value) || is_object($value)){
				$output .= $this->print_arrayRecrusive($value);
			}else{
				$output .= $value;
			}
			$output .= '</div>';
		}
		return $output;
	}
	function datetime($sort=false){
		if($sort){
			return date('Y-m-d H:i:s', strtotime($sort));
		}else{
			return date('Y-m-d H:i:s');
		}
	}
	function db_found_rows(){

		return $this->_ci->db->query('SELECT FOUND_ROWS() as total;')->row()->total;
	}
	function db_calc_found_rows(){
		$select = array();
		$selects =  $this->_ci->db->ar_select;
		$this->_ci->db->ar_select = array();
		// if already have select put the index 0 together with calc_found_row
		if(count($selects) == 1){
			$CALC = 'SQL_CALC_FOUND_ROWS '.$selects[0];
			$this->_ci->db->select($CALC,false);
		}elseif(count($selects) > 1){
			$CALC = 'SQL_CALC_FOUND_ROWS '.$selects[0].',';
			$this->_ci->db->select($CALC,false);
			unset($selects[0]);
			foreach($selects as $s){
				$this->_ci->db->select($s);
			}
			
		}elseif(count($selects) < 1){
			$CALC = 'SQL_CALC_FOUND_ROWS *';
			$this->_ci->db->select($CALC,false);
		}
	}
	function enable_get(){
			parse_str($_SERVER['QUERY_STRING'], $_GET); 
			$this->_ci->input->_clean_input_data($_GET);
	}
	
	function conf($conf, $item=false){
		if(is_int($conf)):
		$this->_ci->db->where('id', $conf);
		else:
		$this->_ci->db->where('name', $conf);
		endif;
		$this->_ci->db->select('config_object');
		$q = $this->_ci->db->get('site_conf');
		if($q->num_rows() > 0):
			if($item!=false):
				$list = json_decode($q->row()->config_object, true);
				if(array_key_exists($item, $list)):
					return $list[$item];
				else:
					return false;
				endif;
			else:
				return json_decode($q->row()->config_object);
			endif;
		else:
			return false;
		endif;
	}
	function current_user($select=false){
		if($select!=false):
			$this->_ci->db->select($select);
		endif;
		$this->_ci->db->where('id', element('user_id', $this->_ci->session->userdata('login_data')));
		$q = $this->_ci->db->get('user');
		if($q->num_rows() == 1):
			return $q->row();
		else:
			return false;
		endif;
	
	}
}
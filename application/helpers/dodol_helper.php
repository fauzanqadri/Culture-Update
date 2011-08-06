<?



function ddl_post_filter($suffix){
			$new_post = array();
			foreach($_POST as $post => $value){
				if(strpos($post, $suffix) !== false):
				$new_index = str_replace($suffix, '', $post);
				$new_post[$new_index] = $value;
				endif;
			}
			if(count($new_post)>0){
				return $new_post;
			}else{
				return false;
			}
}
function html_word_limiter($string, $limiter = false){
	$output = strip_tags($string);
	if($limiter != false){
		$output = word_limiter($output, $limiter);
	}
	return $output;
}
function merge(){
	    //check if there was at least one argument passed.
	    if(func_num_args() > 0){
	        //get all the arguments
	        $args = func_get_args();
	        //get the first argument
	        $array = array_shift($args);
	        //check if the first argument is not an array
	        //and if not turn it into one.
	        if(!is_array($array)) $array = array($array);
	        //loop through the rest of the arguments.
	        foreach($args as $array2){
	            //check if the current argument from the loop
	            //is an array.
	            if(is_array($array2)){
	                //if so then loop through each value.
	                foreach($array2 as $k=>$v){
	                    //check if that key already exists.
	                    if(isset($array[$k])){
	                        //check if that value is already an array.
	                        if(is_array($array[$k])){
	                            //if so then add the value to the end
	                            //of the array.
	                            $array[$k][] = $v;
	                        } else {
	                            //if not then make it one with the
	                            //current value and the new value.
	                            $array[$k] = array($array[$k], $v);
	                        }
	                    } else {
	                        //if not exist then add it
	                        $array[$k] = $v;
	                    }
	                }
	            } else {
	                //if not an array then just add that value to
	                //the end of the array
	                $array[] = $array2;
	            }
	        }
	        //return our array.
	        return($array);
	    }
	    //return false if no values passed.
	    return(false);
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
	$array = (is_object($array)) ? objectToArray($array) : $array;
	$output = '';
	foreach($array as $key => $value){
		$output .= '<div class="box2 mb10"><span class="bold">'.$key.'</span> =';
		if(is_array($value) || is_object($value)){
			$output .= print_arrayRecrusive($value);
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
function show_date($date){
	$date= new DateTime($date);
	$date = date_create_from_format('Y-m-d H:i:s', $date);
	$str_date = $date->format('l, F j,  Y');
	return $str_date;
}
function nice_strlink($string){
		$new_string = strtolower(str_replace(' ', '-', $string));
		return $new_string;
}

function isAjax() {
	return (isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
		($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest'));
}
function ajax_loader($width=50, $class="loader"){
	$loader = '<img class="'.$class.'" src="'.base_url().'/assets/gen_img/loader.gif" alt="loader" width="'.$width.'">';
	return $loader;
}
function menu_rend($source, $type = 'menu_hor', $style = array()){
	$wrap = ($wrap = element('link_wrap', $style)) ? $wrap : 'span';
	$wrap_open = '<'.$wrap.'>';
	$wrap_close = '</'.$wrap.'>';
	$out = '<ul class="'.$type.'">';
	foreach($source as $s){
		if($child = element('child', $s)) :
			$out .= '<li  class="hv_child">'.$wrap_open.'<a href="'.$s['link'].'">'.$s['anchor'].'</a>'.$wrap_close._menu_rend($child, 1, $style).'</li>';
		else:
			$out .= '<li>'.$wrap_open.'<a href="'.$s['link'].'">'.$s['anchor'].'</a>'.$wrap_close.'</li>';
		endif;
	}
	$out .= '<div class="clear"></div></ul>';
	return $out;
}
function _menu_rend($source , $level, $style){
	$wrap = ($wrap = element('link_wrap', $style)) ? $wrap : 'span';
	$wrap_open = '<'.$wrap.'>';
	$wrap_close = '</'.$wrap.'>';
	$level = $level+1;
	$out = '<ul class="level_'.$level.'">';
	foreach($source as $s){
		if($child = element('child', $s)) :
			$out .= '<li class="hv_child">'.$wrap_open.'<a href="'.$s['link'].'">'.$s['anchor'].'</a>'.$wrap_close._menu_rend($child, $level, $style).'</li>';
		else:
		$out .= '<li>'.$wrap_open.'<a href="'.$s['link'].'">'.$s['anchor'].'</a>'.$wrap_close.'</li>';
		endif;
	}
	$out .= '</ul>';
	return $out;
}

function load_text_editor($id){
		$this->_ci->load->helper('url');
		$this->_ci->load->helper('ckeditor');
		//Ckeditor's configuration
		$config = array(
			'id' 		=> 	$id, 
			'path'		=>	'assets/global_js/ckeditor', 
			'config' 	=> array(
				'toolbar' 	=> 	"Full", 'width' 	=> 	"100%", 'height' 	=> 	'200px'),
			'toolbar'	=> 'Basic',
			'styles' 	=> array(
				// STYLE 1 
				'style 1' => array (
					'name' 		=> 	'Blue Title','element' 	=> 	'h2', 'styles' => array(
						'color' 	=> 	'Blue','font-weight' 	=> 	'bold')
						),
				// STYLE 2
				'style 2' => array (
				'name' 	=> 	'Red Title','element' 	=> 	'h2','styles' => array(
					'color' 	=> 	'Red',	'font-weight' 		=> 	'bold','text-decoration'	=> 	'underline')
						)				
					)
			);

			echo display_ckeditor($config);

}
function copy_this($string, $anchor = 'copy this' ){
		$object = '<span class="zeroCLipBut"><span class="toClipBoard button" alt="'.$string.'">'.$anchor.'</span></span>';
		return $object;
}
function load_ZeroClip(){
	echo ('<script src="'.base_url().'/assets/global_js/zeroclip/ZeroClipboard.js" type="text/javascript" charset="utf-8"></script>');
	echo ("<script>
	
		$(document).ready(function(){
				ZeroClipboard.setMoviePath('".base_url()."/assets/global_js/zeroclip/ZeroClipboard.swf');
			clip = new ZeroClipboard.Client();
			clip.setHandCursor( true );
			// assign a common mouseover function for all elements using jQuery
			$('.toClipBoard').mouseover( function() {
				// set the clip text to our innerHTML
				text = $(this).attr('alt');
				clip.setText(text);
				// reposition the movie over our element
				// or create it if this is the first time
				if (clip.div) {
					clip.receiveEvent('mouseout', null);
					clip.reposition(this);
				}
				else clip.glue(this);
				// gotta force these events due to the Flash movie
				// moving all around. This insures the CSS effects
				// are properly updated.
				clip.receiveEvent('mouseover', null);

			} );


		});
		</script>");
}
function load_tableSort(){
	echo ('
	<!-- TAble SOrt -->
	<script src="'.base_url().'/assets/global_js/tableSort/jquery.tablednd_0_5.js" type="text/javascript" charset="utf-8"></script>');
}

<?



if ( ! function_exists('ddl_post_filter'))
	{
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
	}
if ( ! function_exists('html_word_limiter'))
		{
			function html_word_limiter($string, $limiter = false){
				$output = strip_tags($string);
				if($limiter != false){
					$output = word_limiter($output, $limiter);
				}
				return $output;
			}
		}
	
if( ! function_exists('merge'))
{
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
	
}



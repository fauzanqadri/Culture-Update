<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 function blog_date($str_date, $str_format){
	return date_format(new Datetime($str_date), $str_format);
}
function blog_img_thumb($post){
	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->content, $matches);
	$first_img = element(0,element(1 , $matches));
	if($first_img == false){ 
		$first_img = "";
	}
	return $first_img;
	
}

?>
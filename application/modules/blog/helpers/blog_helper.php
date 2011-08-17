<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
function blog_date($str_date, $str_format = 'F jS, Y'){
	return date_format(new Datetime($str_date), $str_format);
}
function post_content_prev($limit = 100){
	$post = get_post();
 	return html_word_limiter($post->content, $limit);
}
function post_img_thumb($param = '100_100_crop'){
	$post = get_post();
	$ci =& get_instance();
	$ci->load->library('PhpThumbFactory');
	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->content, $matches);
	$first_img = element(0,element(1 , $matches));
	if($first_img == false){ 
		$first_img = base_url().'assets/gen_img/no_imge.jpg';
	}
	$return = site_url('blog/thumb/'.$param.'/source/'.str_replace('http://', '', $first_img));
	return $return;
	
}
function post_link(){
	return site_url('blog/read/'.get_post()->slug);
}
function post_title(){
	$post = modules::run('blog/get_post');
	return $post->title;
}
function set_post($post){
	return modules::run('blog/set_post', $post);
}
function unset_post(){
	return modules::run('blog/unset_post');
}
function get_post(){
	return modules::run('blog/get_post');
}
function the_post(){
	return get_post();
}

/**
* Gravatar
*
* Fetches a gravatar from the Gravatar website using the specified params
*
* @access  public
* @param   string
* @param   string
* @param   integer
* @param   string
* @return  string
*/
function gravatar( $email, $size = null, $rating = null, $default = 'mm' ) 
{
    
    # Return the generated URL
        # If we are using SSL, get it from a secure URL
        # Lowercase, trim and MD5 hash the e-mail
        # Only show options if they're set (defaults will be used otherwise)

    return (	element('HTTPS', $_SERVER) ? 'https' : 'http')
        .'://gravatar.com/avatar/'
        .md5( strtolower( trim( $email )))
        .'?'
        .($rating != null ? '&r='.$rating : '')
        .($size != null ? '&s='.$size : '')
        .($default != null ? '&d='.$default : '');
}

/**
* Gravatar_img
*
* Fetches a gravatar from the Gravatar website using the specified params and returns the <img> 
*
* @access  public
* @param   string
* @param   string
* @param   integer
* @param   string
* @return  string
*/
function gravatar_img($email, $size = null, $rating = null, $default = 'mm')
{
    return '<img src="'.gravatar($email, $size, $rating, $default).'" alt="Gravatar" />';
}

?>
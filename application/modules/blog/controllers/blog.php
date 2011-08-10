<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Blog extends MX_Controller {

	function __construct() {
		parent::__construct();
		$this->mdl = $this->load->model('blog/blog_m');
	}
	function index(){
		
	}
	function category(){
		
	}
	function post(){
		
	}
	function browse(){
		
	}
	
	// API //
	function api_post_create($data){
		if(	(element('cat_id', $data) == null || element('cat_id', $data) == '') &&
			(element('cat_src', $data) == null || element('cat_src', $data) == '')):
			$data['cat_id'] = 1;
		endif;
		
		if( (element('cat_id', $data) == null || element('cat_id', $data) == '') &&
			(element('cat_src', $data) != null || element('cat_src', $data) != '')):
			$data['cat_id'] = modules::run('blog/api_cat_create', array('name'=> element('cat_src', $data)))->id;
			
		endif;
		
		if(element('p_date', $data) && element('p_date', $data) > date("Y-m-d H:i:s")):
			$data['status'] = 'draft';
		endif;
		unset($data['cat_src']);
		$data['author'] = element('user_id', $this->session->userdata('login_data'));
		return $this->mdl->post_create($data);
	}
	function api_post_update($id, $data){
		if(element('p_date', $data) && element('p_date', $data) > date("Y-m-d H:i:s")):
			$data['status'] = 'draft';
		endif;
		return $this->mdl->post_update($id, $data);
	}
	function api_post_delete($id){
		return $this->mdl->post_delete($id);
	}
	function api_post_getbyid($id){
		return $this->mdl->post_getbyid($id);
	}
	function api_post_browse($param){
		return $this->mdl->post_browse($param);
	}
	function api_comment_create($data){
		return $this->mdl->comment_create($data);
	}
	function api_comment_update($id, $data){
		return $this->mdl->comment_update($id, $data);
	}
	function api_comment_delete($id){
		return $this->mdl->comment_delete($id);
	}
	function api_comment_getbyid($id){
		return $this->mdl->comment_getbyid($id);
	}
	function api_comment_browse($param){
		return $this->mdl->comment_browse($param);
	}
	function api_cat_create($data){
		return $this->mdl->cat_create($data);
	}
	function api_cat_update($id, $data){
		return $this->mdl->cat_update($id, $data);
	}
	function api_cat_delete($id){
		return $this->mdl->cat_delete($id);
	}
	function api_cat_getbyid($id){
		return $this->mdl->cat_getbyid($id);
	}
	function api_cat_browse($param){
		return $this->mdl->cat_browse($param);
	}

}
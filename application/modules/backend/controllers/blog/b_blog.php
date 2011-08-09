<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class B_blog extends MX_Controller {

	//php 5 constructor
	function __construct() {
		parent::__construct();
			modules::run('user/auth/userRoleCheck', 'owner');
	}
	function index() {
		
	}
	function post_create(){
		if($pub = $this->input->post('publish') || $sav = $this->input->post('save')):
			$data = ddl_post_filter('bl_');
			modules::run('blog/api_post_create',$data);
		endif;
		$data['pT'] = 'Create Post';
		$this->dodol_theme->admin_render()->build('page/blog/post_create', $data);
	}
	function post_edit(){
		$id = $this->uri->segment(4);
		if($this->input->post('create')):
			modules::run('blog/api_post_create',$id , $data);
		endif;
		$data['pT'] = 'Edit Post';
		$this->dodol_theme->admin_render()->build('page/blog/post_edit', $data);
	}
	function post_browse(){
		$q = modules::run('blog/api_post_browse',array());
		$data['pT'] = 'Browse Post';
		$data['posts'] = element('posts', $q);
		$this->dodol_theme->admin_render()->build('page/blog/post_browse', $data);
	}
	function post_delete(){
	
		
	}

	// MISC //
	function ajx_src_cat(){
		$param['src'] = $this->input->post('cat_src');
		if($q = modules::run('blog/api_cat_browse',$param)):
			$return = array('msg' => 1, 'cats' => element('cats', $q));
		else:
			$return = array('msg' => 0);
		endif;
		echo json_encode($return);
	}
	function ajx_src_tag(){
		$param['src'] = $this->input->post('tag_src');
		if($q = modules::run('blog/api_tag_browse',$param)):
			$return = array('msg' => 1, 'tags' => element('tags', $q));
		else:
			$return = array('msg'=> 0);
		endif;
		echo json_encode($return);
	}
	
	function category_create(){
		
	}
	function category_edit(){
	}
	function category_browse(){
		
	}
	function category_delete(){
		
	}
	function comment_create(){
		
	}
	function comment_edit(){
	}
	function comment_browse(){
		
	}
	function comment_delete(){
		
	}
	
	
}
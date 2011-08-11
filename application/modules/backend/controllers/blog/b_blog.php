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
			if($new = modules::run('blog/api_post_create',$data)):
				$this->messages->add('Success Create Post with title '.$new->title, 'success');
				redirect('backend/blog/b_blog/post_browse');
			else:
				$this->messages->add('somthing wrong, please try again', 'warning');
				return false;
			endif;
		endif;
		$data['pT'] = 'Create Post';
		$this->dodol_theme->render()->build('page/blog/post_create', $data);
	}
	function post_edit(){
		$id = $this->uri->segment(4);
		if($this->input->post('create')):
			modules::run('blog/api_post_create',$id , $data);
		endif;
		$data['pT'] = 'Edit Post';
		$this->dodol_theme->render()->build('page/blog/post_edit', $data);
	}
	function post_browse(){
		$q = modules::run('blog/api_post_browse',array());
		$data['pT'] = 'Browse Post';
		$data['posts'] = element('posts', $q);
		$this->dodol_theme->render()->build('page/blog/post_browse', $data);
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
	function ajx_cat_crt(){
		$data['name'] = $this->input->post('name');
		if($q = modules::run('blog/api_cat_create',$data)) :
			$return = array('msg' => 1, 'cat' => $q);
		else:
			$this->messages->add('something wrong, try again', 'warning');
			$return = array('msg' => 0);
		endif;
		echo json_encode($return);
	}
	function category_create(){
		if($this->input->post('create')):
			$data = ddl_post_filter('bl_');
			if($new = modules::run('blog/api_cat_create',$data)	):
				$this->messages->add('Success Create category with name '.$new->name, 'success');
				redirect('backend/blog/b_blog/category_browse');
			else:
				$this->messages->add('somthing wrong, please try again', 'warning');
				return false;
			endif;
		endif;
		
	}
	function category_edit(){
		$data['pT'] = 'Edit Category';
		$this->dodol_theme->render()->build('page/blog/category_edit', $data);
	}
	function category_browse(){
		$q = modules::run('blog/api_cat_browse',array());
		$data['pT'] = 'Browse Category';
		$data['cats'] = element('cats', $q);
		$this->dodol_theme->render()->build('page/blog/category_browse', $data);
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
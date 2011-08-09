<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class Blog_m extends CI_Model {

	//php 5 constructor
	function __construct() {
		parent::__construct();
		
	}
	function post_create($data){
		$data['c_date'] = date('Y-m-d H:i:s');
		$this->db->where('title', element('title', $data));
		$pre = $this->db->get('blog_post');
		if($pre->num_rows() > 0):
			$data['slug'] = strtolower(str_replace(' ', '_', element('title', $data))).'_'.$pre->num_rows()+1;
		else:
			$data['slug'] = strtolower(str_replace(' ', '_', element('title', $data)));
		endif;
		$this->db->insert('blog_post', $data);
		return $this->getbyid($this->db->insert_id());
	}
	function post_update($id, $data){
		$data['m_date'] = date('Y-m-d H:i:s');
		$this->db->where('title', element('title', $data));
		$pre = $this->db->get('blog_post');
		if($pre->num_rows() > 0):
			$data['slug'] = strtolower(str_replace(' ', '_', element('title', $data))).'_'.$pre->num_rows()+1;
		else:
			$data['slug'] = strtolower(str_replace(' ', '_', element('title', $data)));
		endif;
		$this->db->where('id', $id);
		if($this->db->update('blog_post', $data)):
			return $this->getbyid($id);
		else:
			return false;
		endif;
		
	}
	function post_delete($id){
		if($item = $this->getbyid($id)):
			$this->db->where('id', $id);
			$this->db->delete('blog_post');
			return $item;
		else:
			return false;
		endif;
		
	}
	function post_getbyid($id){
		$this->db->where('id', $id);
		$q = $this->db->get('blog_post');
		if($q->num_rows() == 1):
			return $q->row();
		else:
			return false;
		endif;
	}
	function post_browse($param){
		
	}
	function comment_create($data){
		$data['c_date'] = date('Y-m-d H:i:s');
		if($this->db->insert('blog_comment', $data)):
			return $this->comment_getbyid($this->db->insert_id());
		else:
			return false;
		endif;
	}
	function comment_update($id, $data){
		if(!$this->comment_getbyid($id)): return false; endif;
		
		$data['c_date'] = date('Y-m-d H:i:s');
		$this->db->where('id', $id);
		if($this->db->update('blog_comment')):
			return $this->comment_getbyid($id);
		else:
			return false;
		endif;
	}
	function comment_delete($id){
		if(!$del = $this->comment_getbyid($id)): return false; endif;
		if($this->db->where('id')->delete('blog_comment')):
			return $this->comment_getbyid($id);
		else:
			return false;
		endif;
	}
	function comment_getbyid($id){
		$this->db->where('id');
		$q = $this->db->get('blog_comment');
		if($q->num_rows() == 1):
			return $q->row();
		else:
			return true;
		endif;
	}
	function comment_browse($data){
		if(element('post_id', $data)) : $this->db->whwre('post_id', element('post_id', $data)); endif;
		$q = $this->db->get('blog_comment', element('start', $data), element('limit', $data));
		if($q->num_rows() >0):
			return $q->result();
		else:
			return false;
		endif;
	}
	
	function cat_create($data){
		if($this->db->where('name', element('name', $data))->get('blog_category')->num_rows > 0): return false;endif;
		if($this->db->insert('blog_category', $data)):
			return $this->cat_getbyid($id);
		else:
			return false;
		endif;
	}
	function cat_update($id, $data){
		if(!$this->cat_getbyid($id)) : return false;endif;
		$this->db->where('id', $id);
		if($this->db->update('blog_category', $data)):
			return $this->cat_getbyid($id);
		else:
			return false;
		endif;
	}
	function cat_delete($id){
		if(!$item = $this->cat_getbyid($id)) : return false;endif;
		$this->db->where('id', $id);
		if($this->db->delete('blog_category')):
			return $item;
		else:
			return false;
		endif;
	}
	function cat_browse($param){
		$q = $this->db->get('blog_category');
		if($q->num_rows() > 0):
			return $q->result();
		else:
			return false;
		endif;
	}
}
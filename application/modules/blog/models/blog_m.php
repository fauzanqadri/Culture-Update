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
	
}
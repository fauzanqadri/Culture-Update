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
			$data['slug'] = strtolower(str_replace(' ', '_', element('title', $data))).'_'.$pre->num_rows();
		else:
			$data['slug'] = strtolower(str_replace(' ', '_', element('title', $data)));
		endif;
		$this->db->insert('blog_post', $data);
		return $this->post_getbyid($this->db->insert_id());
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
	function post_getbyslug($slug){	
		$this->db->select('*');
		$this->db->select('b.name as cat_name');
		$this->db->where('a.slug',$slug);
		$this->db->join('blog_category b', 'b.id = a.cat_id');
		$this->db->join('user c', 'c.id = a.author');
		$q = $this->db->get('blog_post a');
		if($q->num_rows() == 1):
			return $q->row();
		else:
			return false;
		endif;
	}
	function post_getbyid($id){
		$this->db->select('*');
		$this->db->select('b.name as cat_name');
		$this->db->where('a.id',$id);
		$this->db->join('blog_category b', 'b.id = a.cat_id');
		$this->db->join('user c', 'c.id = a.author');
		$q = $this->db->get('blog_post a');
		if($q->num_rows() == 1):
			return $q->row();
		else:
			return false;
		endif;
	}
	function post_browse($param){
		if($cat_id = element('cat_id', $param)) :
			$this->db->where('cat_id', $cat_id);
		endif;
		if($status = element('status', $param)):
			$this->db->where('status', $status);
		endif;
		if($src = element('src', $param)):
			$this->db->like('title', $src);
		endif;
		$this->dodol->db_calc_found_rows();
		$q = $this->db->get('blog_post', element('limit', $param), element('start', $param));
		if($q->num_rows() > 0):
			$return = array('posts' => $q->result(), 'num_rows' => $this->dodol->db_found_rows());
			return $return;
		else:
			return false;
		endif;
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
		$this->db->where('name', element('name', $data));
		$pre = $this->db->get('blog_category');
		if($pre->num_rows() > 0):
			$data['slug'] = strtolower(str_replace(' ', '_', element('name', $data))).'_'.$pre->num_rows();
		else:
			$data['slug'] = strtolower(str_replace(' ', '_', element('name', $data)));
		endif;
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
	function cat_browse($param=false){
		if($src = element('src', $param)): 
			$this->db->like('name', $src); 
		endif;
		
		$q = $this->db->get('blog_category');
		if($q->num_rows() > 0):
			$return = array('num_rows' => $q->num_rows(), 'cats' => $q->result());
			return $return;
		else:
			return false;
		endif;
	}
	function cat_getbyid($id){
		$this->db->where('id', $id);
		$q = $this->db->get('blog_category');
		if($q->num_rows() == 1):
			return $q->row();
		else:
			return false;
		endif;
	}
	function cat_getbyslug($slug){
		$this->db->where('slug', $slug);
		$q = $this->db->get('blog_category');
		if($q->num_rows() == 1):
			return $q->row();
		else:
			return false;
		endif;
	}
	
	function tag_create($data){
		$this->db->where('name', element('name', $data));
		$pre = $this->db->get('blog_tag');
		if($pre->num_rows() >  0):	return false; endif;

		if($this->db->insert('blog_tag', $data)):
			return $this->tag_getbyid($this->db->insert_id());
		else:
			return false;
		endif;
	}
	function tag_update($id, $data){
		if(!$this->tag_getbyid($id)) : return false; endif;
		
		$this->db->where('name', element('name', $data));
		$pre = $this->db->get('blog_tag');
		if($pre->num_rows() >  0):	return false; endif;
		
		$this->db->where('id', $id);
		if($this->db->update('blog_tag', $data)):
			return $this->tag_getbyid($id);
		else:
			return false;
		endif;
		
	}
	function tag_getbyid($id){
		$this->db->where('id', $id);
		$q = $this->db->get('blog_tag');
		if($q->num_rows() == 1 ):
			return $q->row();
		else:
			return false;
		endif;
	}
	function tag_delete($id){
		if(!$item = $this->tag_getbyid($id)) : return false;endif;
		$this->db->where('id', $id);
		if($this->db->delete('blog_tag')):
			return $item;
		else:
			return false;
		endif;
	}
	function tag_browse($param){
		if($src = element('src', $param)):
			$this->db->like('name', $src);
		endif;
		$q = $this->db->get('blog_tag');
		if($q->num_rows() > 0):
			$return = array('num_rows' => $q->num_rows(), 'tags' => $q->result());
		else:
			return false;
		endif;
	}
}
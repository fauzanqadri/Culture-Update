<?php 
if (! defined('BASEPATH')) exit('No direct script access');
/**
 * Category controller, under store controller
 * path : applicatio/modules/store/controller/category.php
 *
 * @package default
 * @author Zidni Mubarock
 */
class category extends MX_Controller {

	//php 5 constructor
	function __construct() {
		parent::__construct();
		$this->store_cat = $this->load->model('store/category_m');
		$this->load->model('store/product_m');
	}
	
	//php 4 constructor
	function Category() {
		parent::__construct();
	}
	/**
	 * Get Detail Of Category
	 *
	 * @param int $id 
	 * @return object
	 * @author Zidni Mubarock
	 */
	function index(){
	}
	function getCatDet($id){
		$cat = $this->store_cat->getcatbyid($id);
		if($cat){
			return $cat;
		}else{
			return false;
		}
	}
	function showAllCat() {
		$q = $this->store_cat->getAllCat();
		if($q){
			return $q;
		}else{
			return false;
		}
	}
	// page 
	function view(){
		$this->load->library('barock_page');
		$cat_id = $this->uri->segment(4);
		$param = $this->uri->uri_to_assoc(5);
		if(!isset($param['limit'])){
			$param['limit'] = 12;
		}
		if(!isset($param['page'])){
			$param['page'] = 0;
		}
		$search = (!isset($param['q'])) ? false : $param['q'];
		
		if($param['page']){
			$start = ($param['page'] - 1)* $param['limit'];
		}else{
			$start = 0;
		}
		$limit = $param['limit'];
		// configuration before query to database
		$conf = array(
			'cat_id'   => $cat_id,
			'publish'  => 'y',
			'limit'    => $limit,
			'start'    => $start,
			'search'   =>  $search
			);
		$prods = $this->product_m->getListProd($conf);
		// get the base url for pagination,
		$target_url = str_replace('/page/'.$param['page'] , '', current_url());
		// configuration for pagination
		$confpage = array(
			'target_page' => $target_url,
			'num_records' => $prods['num_rec'],
			'num_link'	  => 5,
			'per_page'   => $limit,
			'cur_page'   => $param['page']
			);
		// execute the pagination conf
		$this->barock_page->initialize($confpage);
		$data = array(
			'mainLayer' => 'page/product/browse_view_v',
			'prods'     => $prods['prods'],
			'param'     => $param
			);
		$cat = $this->getCatDet($cat_id);
		$data['pT'] = $cat->name;
		$data['cat'] = $cat;
		
		$this->dodol_theme->render()
			 			  ->build('page/category/view', $data);
	}
	function getCategoryMenu($par = 0){
			$storage = array();
			if($root = $this->category_m->getCatByPar($par)):
				foreach($root as $item):
					$menu_item = array();
					$menu_item['anchor'] = $item->name;
					$menu_item['link'] = site_url('store/category/view/'.$item->id);
					if($child = $this->_getnested($item->id)):
					$menu_item['child'] = $child;
					endif;
					array_push($storage, $menu_item);
				endforeach;
				return $storage;
			else:
				return false;
			endif;
		
	}
	function _getnested($parent){
		$storage = array();
		if($root = $this->category_m->getCatByPar($parent)):
			foreach($root as $item):
				$menu_item = array();
				$menu_item['anchor'] = $item->name;
				$menu_item['link'] = site_url('store/product/browse/cat/'.$item->id);
				if($child = $this->_getnested($item->id)):
					$menu_item['child'] = $child;
				endif;
				array_push($storage, $menu_item);
			endforeach;
			return $storage;
		else:
			return false;
		endif;
	}
	
	
	
	/**
	 * Catlistmenu
	 *
	 * @param int $id 
	 * @return void
	 * @author Zidni Mubarock
	 */
	function catlistmenu($id=0){
	$root = $id;
	if($root == 0){
	$tree = $this->subtree0(0);
	}else{
	$tree = $this->subtree($root);
	}
	echo $tree;
	}
	
	function subtree0($parid){
		$roots = $this->category_m->getCatByPar($parid);
		$tree = '<ul>';	
		if($roots){
		    foreach($roots as $root){
				$tree .= '<li><a href="'.site_url('store/product/browse/cat/'.$root->id).'">'.$root->name.'</a>';
				$subs = $this->category_m->getCatByPar($root->id);
				if($subs){
				$tree .= $this->subtree0($root->id);
				$tree .='</li>';
				}
			}
		}
		$tree .= '</ul>';
		return $tree;
	}
	function subtree($parid){
		$roots = $this->category_m->getCatByPar($parid);
		$tree = '<ul>';	
		if($roots){
			$own = $this->category_m->getcatbyid($parid);
			$tree .='<ul>';
		    foreach($roots as $root){
				$tree .= '<li><a href="'.site_url('store/product/browse/cat/'.$root->id).'">'.$root->name.'</a>';
				$subs = $this->category_m->getCatByPar($root->id);
				if($subs){
				$tree .= $this->subtree($root->id);
				$tree .='</li>';
				}
			}
			$tree .= '</ul>';
		}else{
			$own = $this->category_m->getcatbyid($parid);
			$tree .= '<li><a href="'.site_url('store/product/browse/cat/'.$own->id).'">'.$own->name.'</a></li>';
		}
		$tree .= '</ul>';
		return $tree;
	}
	// end of category menu list	
	
	
	/// API ///
	function exe_delete($id){
		$del = $this->store_cat->deletecat($id);
		return $del;
	}
	function some(){
		$this->load->library('template');
		$data = array('asuh' => 'koe');
		$this->template
		->set('foo', $data)
		->set_theme('cu')
		->set_layout('default')
		->build('store/page/category/test', $data);
	}

}
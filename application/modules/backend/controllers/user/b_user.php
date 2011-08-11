<?php 

if (! defined('BASEPATH')) exit('No direct script access');

class B_user extends MX_Controller {
	
	
	function __construct() {
		parent::__construct();
		modules::run('user/auth/userRoleCheck', 'owner');
		
	}
	function index() {
	
	}
	function browse(){
		
		$data['users'] = element('users',modules::run('user/api_browse'));
		$data['pT'] = 'User';
		$this->dodol_theme->render()->build('page/user/browse', $data);
		
	}
	function view(){
		
	}
	function edit(){
		
	}
	function delete(){
		
	}
	function account(){
		
	}


}
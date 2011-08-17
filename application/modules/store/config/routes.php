<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "store";
$route['store/cat/(:num)/(:any)'] = "category/view/$1/$2";
$route['store/prod/(:any)'] = "product/view/$1";
$route['store/routing'] = "store/testing_route";
$route['store/collection/(:num)/(:any)'] = "collection/detail/$1/$2";

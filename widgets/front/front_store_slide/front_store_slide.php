<?
class Front_store_slide extends Widget_helper
{
	var $detail = array(
		'name' => 'Font store Slide',
		'Author' => 'Zidni Mubarock',
		'file_name' => 'front_store_slide',
		'state' => 'front',
		'Email' => 'zidmubarock@gmail.com',
		'version' => '1.0',
		'description' => 'Some Koplak Widget',
		'path'		=> './widgets/front/front_store_slide/',
	);
	function getdetail(){
		return $this->detail;
	}
    function run($data=array()) {
		$this->dodol_widget->add_css('widgets/front/front_store_slide/css/style.css');
		$this->picker_product(array('list_product' => '282,265,264'));
    }
	function register($data=array()){
		modules::run('modularizer/add_css', 'widgets/front_store_slide/style.css');
	}
	function picker_product($param=array()){


		if(element('list_product', $param)){
			$render['ids'] = explode(',', element('list_product', $param));
			$this->render('picker_product_v', $render);
		}else{
			return false;
		}
	}
}
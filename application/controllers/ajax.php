<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('subcategory_model');
	}

	function get_subcategories($category_id)
	{
        echo(json_encode($this->subcategory_model->get_subcategories($category_id)));
	}


}
?>
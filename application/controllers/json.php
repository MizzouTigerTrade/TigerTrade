	<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Json extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->model('category_model');
		$this->load->model('subcategory_model');
	}

	public function index()
	{
		$this->layout->view('home/test');
	}


	public function getJson()
	{
		$ads = $this->ad_model->get_all_ads_json();
		//$ads = $ads->result();

		$this->output->set_header('Content-Type: application/json; charset=utf-8');
  		echo json_encode($ads);
		//$this->load->view('home/getJson', $data);
	}

	public function getJson2()
	{
		$cat = $this->uri->segment(3);
        $sub  = $this->uri->segment(4);
		
		
		if($cat == null)
		{
			$ads = $this->ad_model->get_all_ads_json();
			//$ads = $ads->result();
		}
		elseif($sub == null)
		{
			$ads = $this->ad_model->get_ads_category_json($cat);
		}
		else
		{
			
			$ads = $this->ad_model->get_ads_subcategory_json($sub);
		}
		
		$this->output->set_header('Content-Type: application/json; charset=utf-8');
	  	echo json_encode($ads);
	}
}

	
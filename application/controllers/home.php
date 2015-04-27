<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

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
		$data['menu'] = $this->load->view('shared/menu');
	}

	public function index()
	{
		if( $this->ion_auth->user()->row() != null)
        {
            // Not logged in - so force them away
            redirect ('/market/index');
       	}
		$data['categories'] = $this->category_model->get_all_categories();
		$data['subcategories'] = $this->subcategory_model->get_all_subcategories();
		$data['title'] = 'Home';
		$data['message'] = "";
		$this->layout->view('home/home', $data);
	}

	public function databaseTest()
	{
		$dbconn = mysqli_connect("localhost", "kylecarlson", "QRvC3TMCBt", "kylecarlson_tigertrade");

		if (!$dbconn)
		{
		  echo "Please try later.";
		}
		else
		{
			echo "it worked";
		}

		$blah = mysqli_query($dbconn, "SELECT * FROM users");

		var_dump($blah);


	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
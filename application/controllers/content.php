<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Content extends CI_Controller {

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
		$data['menu'] = $this->load->view('shared/menu');
	}

	public function terms()
	{
		//$this->load->view('header');
		//$this->load->view('welcome_message');
		//$this->load->view('footer');
		$data['title'] = 'Terms';
		$this->layout->view('terms/terms', $data);
		//$this->layout->view('welcome_message', $data);
	}

	public function team()
	{
		//$this->load->view('header');
		//$this->load->view('welcome_message');
		//$this->load->view('footer');
		$data['title'] = 'Team';
		$this->layout->view('team/index', $data);
		//$this->layout->view('welcome_message', $data);
	}
}
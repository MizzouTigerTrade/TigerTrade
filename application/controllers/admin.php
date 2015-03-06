<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

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
		//$this->load->view('header');
		//$this->load->view('welcome_message');
		//$this->load->view('footer');
		$data['title'] = 'Admin';
		$this->layout->view('admin/dashboard', $data);
		//$this->layout->view('welcome_message', $data);
	}
	
	function new_category()
	{
		$data['title'] = 'New Category';
		
		if (isset($_POST) && !empty($_POST))
		{
			$category_name = $this->input->post('category_name');
			$category_description = $this->input->post('category_description');
			
			if($this->category_model->get_category_by_name($category_name))
			{
					$data['error'] = "Category already exists";
			}
			else
			{
				if($this->category_model->insert_new_category($category_name, $category_description))
				{
					$data['created'] = true;
				}
				else
				{
					$data['error'] = true;
				}
			}
		}
		
		$data['categories'] = $this->category_model->get_all_categories();
		$this->layout->view('forms/new_category', $data);
	}
	
	function new_subcategory()
	{
		$data['title'] = 'New Subcategory';
		
		if (isset($_POST) && !empty($_POST))
		{
			$category_id = $this->input->post('category_id');
			$subcategory_name = $this->input->post('subcategory_name');
			$subcategory_description = $this->input->post('subcategory_description');
			
			if($this->subcategory_model->get_subcategory_by_name($subcategory_name))
			{
					$data['error'] = "Subcategory already exists";
			}
			else
			{
				if($this->subcategory_model->insert_new_subcategory($subcategory_name, $subcategory_description, $category_id))
				{
					$data['created'] = true;
				}
				else
				{
					$data['error'] = true;
				}
			}
		}
		
		$data['categories'] = $this->category_model->get_all_categories();
		$this->layout->view('forms/new_subcategory', $data);
	}
}
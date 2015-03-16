<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	 
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->model('category_model');
		$this->load->model('subcategory_model');
		$this->load->model('ad_model');
		$data['menu'] = $this->load->view('shared/menu');
		$this->lang->load('auth');
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
	
	
	function manage_flags()
	{
		$data['title'] = 'Flags';
		
		$data['message'] = $this->session->flashdata('message');
		
		$data['flags'] = $this->ad_model->get_flagged_ads();

		$this->layout->view('admin/manage_flags', $data);
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
	
	function dismiss_flag($ad_id)
	{	
		$this->ad_model->dismiss_flag($ad_id);
		
		$this->session->set_flashdata('message', "Removed flag from Ad " . $ad_id);
		redirect('admin/manage_flags', 'refresh');
		
	}
	
	function delete_ad($ad_id)
	{
		$ad = $this->ad_model->get_ad($ad_id);

		$message_to_user = $this->input->post('message_to_user');
		
		$user = $this->ion_auth->user()->row();
		$to = $user->email;
	
		$subject = "Flagged Ad Removed";
		
		$message = "
		<html>
		<body>
		<h1 style='border-bottom: 2px solid black;'>TigerTrade</h1>
		<p> Ad <strong style='color: red;'>" . $ad->title . "</strong> was deleted from Tiger Trade.</p>
		<p>" . $message_to_user . "</p>
		</body>
		</html>
		";
		
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= 'From: <admin@thetigertrade.com>' . "\r\n";
		
		mail($to,$subject,$message,$headers);
		
		$this->ad_model->delete_ad($ad_id);
		$this->session->set_flashdata('message', "Removed Ad");
		redirect('admin/manage_flags', 'refresh');
	}
}
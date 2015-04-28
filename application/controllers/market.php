<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Market extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		
		$this->load->model('ad_model');
		$this->load->model('category_model');
		$this->load->model('subcategory_model');
		$data['menu'] = $this->load->view('shared/menu');
		if( $this->ion_auth->user()->row() == null)
        {
            // Not logged in - so force them away
            redirect ('/home/index');
       	}
	}

	function index()
	{
		$cat = $this->uri->segment(3);
        $sub  = $this->uri->segment(4);
		
		
		if($cat == null)
		{
			$data['link'] = base_url('json/getJson2');
			$data['market_name'] = 'All';
			$data['ads'] = $this->ad_model->get_all_ads();
		}
		elseif($sub == null)
		{
			$data['link'] = base_url('json/getJson2/') . '/' . $cat;
			$category = $this->category_model->get_category($cat);
			$data['market_name'] = ucwords($category->name);
			$data['ads'] = $this->ad_model->get_ads_category($cat);
		}
		else
		{
			$data['link'] = base_url('json/getJson2/') . $cat . '/'.$sub;
			$category = $this->category_model->get_category($cat);
			$subcategory = $this->subcategory_model->get_subcategory($sub);

			$data['market_name'] = ucwords($category->name) . ' - ' . ucwords($subcategory->name);
			$data['ads'] = $this->ad_model->get_ads_subcategory($sub);
		}
		
		$data['images'] = $this->ad_model->get_all_images();
		$data['tags'] = $this->ad_model->get_all_tags();
		$data['category_id'] = $cat;
		$data['subcategory_id'] = $sub;
		$data['categories'] = $this->category_model->get_all_categories();
		$data['subcategories'] = $this->subcategory_model->get_all_subcategories();
		$data['title'] = 'Market'; 
		$data['message'] = $this->session->flashdata('message');
		
		$this->layout->view('market/home', $data);
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

	//shows details of a specific ad
	function category($category_id)
	{
		$data['category_id'] = $category_id;
		$data['category'] = $this->category_model->get_category($category_id);
		$data['categories'] = $this->category_model->get_all_categories();
		$data['subcategories'] = $this->subcategory_model->get_all_subcategories();
		$data['ads'] = $this->ad_model->get_ads_category($category_id);
		$data['title'] = 'Category Home';
		$this->layout->view('market/category_home', $data);
	}
	
	function subcategory($subcategory_id)
	{
		$data['categories'] = $this->category_model->get_all_categories();
		$data['subcategories'] = $this->subcategory_model->get_all_subcategories();
		$data['subcategory'] = $this->subcategory_model->get_subcategory($subcategory_id);
		$data['category'] = $this->category_model->get_category($data['subcategory']->category_id);
		$ads = $this->ad_model->get_ads_subcategory($subcategory_id);
		$data['ads'] = $ads;
		$data['images'] = $this->ad_model->get_image_of_ads($ads->result());
		$data['title'] = 'Subcategory Home';
		$this->layout->view('market/subcategory_home', $data);
	}

	//edit ad by id
	function edit($category_id)
	{

	}

	//update ad by id
	function update($category_id)
	{

	}

	//create an ad
	function create()
	{

	}

	//delete a specific ad
	function delete($category_id)
	{

	}
}
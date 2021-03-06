<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Ad extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('upload');
        $this->load->library('image_lib');
		$this->load->model('ad_model');
		$this->load->model('subcategory_model');
		$this->load->model('category_model');
		$data['menu'] = $this->load->view('shared/menu');
		if( $this->ion_auth->user()->row() == null)
        {
            // Not logged in - so force them away
            redirect ('/home/index');
       	}
	}

	function index()
	{
		$data['title'] = 'Ad Home';

		$this->layout->view('ad/ad_view', $data);
	}

	function removeImage($img_id)
	{
		$this->ad_model->remove_image($img_id);
	}

	//shows details of a specific ad
	function details($ad_id)
	{	
		$user = $this->ion_auth->user()->row();
		if($user) {
			$user_id = $user->user_id;
		}
		
		$data['tags'] = $this->ad_model->get_all_tags();
		$ad = $this->ad_model->get_ad($ad_id);
		$data['ad'] = $ad;
		$data['category'] = $this->category_model->get_category($data['ad']->category_id);
		
		$data['comments'] = $this->ad_model->get_comments($ad_id);
		
		if ($data['ad']->subcategory_id == 0) 
		{
			$data['subcategory'] = '';
		} else {
			$sub = $this->subcategory_model->get_subcategory($data['ad']->subcategory_id);
			$data['subcategory'] = ' > ' . $sub->name;
		}
		
		$data['images'] = $this->ad_model->get_ad_images($ad_id);
		$data['title'] = 'Ad Detail';
		$data['message'] = $this->session->flashdata('message');
		if($user) {
			$data['flagged'] = $this->ad_model->check_if_ad_flagged($ad_id, $user_id);
		} else {
			$data['flagged'] = true; // Don't show report ad button to non-users
		}
		
		if($this->ion_auth->is_admin()){
			$data['admin'] = true;
		}
		else{
			$data['admin'] = false;
		}

		$this->layout->view('ad/ad_detail', $data);
	}

	//edit ad by id
	function edit($ad_id)
	{
		$user = $this->ion_auth->user()->row();
		$ad = $this->ad_model->get_ad($ad_id);
		if($ad->user_id != $user->user_id && !$this->ion_auth->is_admin())
		{
			redirect('/market/index');
		}
		$data['ad'] = $ad;
		$data['images'] = $this->ad_model->get_ad_images($ad_id);
		$data['tags'] = $this->ad_model->get_ad_tags($ad_id);
		$data['title'] = 'Edit Ad';
		$data['categories'] = $this->category_model->get_all_categories();
		$data['subcategories'] = $this->subcategory_model->get_all_subcategories();
		$this->layout->view('ad/edit_ad', $data);
	}

	//update ad by id
	function update()
	{
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('price', 'Price', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('category', 'Category', 'required');
		$this->form_validation->set_rules('ad_id', 'Ad id', 'required');
		$category = $this->security->xss_clean($this->input->post('category'));
		$sub_category_check = $this->ad_model->check_subCategory($category);
		if($sub_category_check > 0)
		{
			$this->form_validation->set_rules('subCategory', 'Sub-Category', 'required');
		}

		//if validation fails
		if ($this->form_validation->run() == false)
		{
			echo "error";
		}
		else
		{
			
			$ad_id = $this->security->xss_clean($this->input->post('ad_id'));
			$user = $this->ion_auth->user($id)->row();
			$ad = $this->ad_model->get_ad($ad_id);
			if($ad->user_id != $user->user_id && !$this->ion_auth->is_admin())
			{
				redirect('/market/index');
			}
			$title = $this->security->xss_clean($this->input->post('title'));
			$description = $this->security->xss_clean($this->input->post('description'));
			$price = $this->security->xss_clean($this->input->post('price'));
			$category = $this->security->xss_clean($this->input->post('category'));
			$subCategory = $this->security->xss_clean($this->input->post('subCategory'));
			$tags = $this->security->xss_clean($this->input->post('tags'));

			$this->ad_model->update_ad($ad_id, $title, $description, $price, $category, $subCategory);
			
			$this->ad_model->update_tags($ad_id, $tags);

			$j = 0;     // Variable for indexing uploaded image.
			if(count($_FILES['userfile']['name']) > 0)
			{
				for ($i = 0; isset($_FILES['userfile']['name'][$i]); $i++) {
					$target_path = "assets/Images/";     // Declaring Path for uploaded images.
					// Loop to get individual element from the array
					$validextensions = array("jpeg", "jpg", "png");      // Extensions which are allowed.
					$ext = explode('.', basename($_FILES['userfile']['name'][$i]));   // Explode file name from dot(.)
					$file_extension = end($ext); // Store extensions in the variable.
					$target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext) - 1];     // Set the target path with a new name of image.
					$j = $j + 1;      // Increment the number of uploaded images according to the files in array.
					if (($_FILES["userfile"]["size"][$i] < 100000)  && in_array($file_extension, $validextensions)) {
						if (move_uploaded_file($_FILES['userfile']['tmp_name'][$i], $target_path)) {

						// If file moved to uploads folder.
							echo '<div class="alert alert-success">
			        			<a href="#" class="close" data-dismiss="alert">&times;</a>
			       				 <strong>Success!</strong> '.$j .' Image Uploaded.</div>';

			       				 //echo count($_FILES['userfile']['name'])
			       				$this->ad_model->insert_img_ad($ad_id, $target_path);
						} 
						else {     //  If File Was Not Moved.
							echo '<div class="alert alert-error">
			        			<a href="#" class="close" data-dismiss="alert">&times;</a>
			       				 <strong>Success!</strong> '.$j .' Image Not Uploaded.
			    			</div>';
						}
					}
					
				}
				
			}
		}
		$data['error'] = 'shit';
		
		if ( $ad->user_id != $user->user_id && $this->ion_auth->is_admin() ){
			$this->session->set_flashdata('message', "Updated Ad");
			redirect('market', 'refresh');
		}
		else{
			$this->session->set_flashdata('message', "Updated Ad");
			redirect('ad/user_ads');
		}
		
	}

	//shows form to create a new ad
	function new_ad()
	{
		if($this->ion_auth->logged_in() === true) {
			$data['title'] = 'New Ad';
			$data['categories'] = $this->category_model->get_all_categories();
			$data['subcategories'] = $this->subcategory_model->get_all_subcategories();
			$this->layout->view('forms/new_ad', $data);
		} else {
			redirect('/auth/login', 'refresh');
		}
	}

	//shows form to create a new ad
	function make_offer($ad_id)
	{
		$data['ad'] = $this->ad_model->get_ad($ad_id);
		$data['ad_id'] = $ad_id;
		$data['title'] = 'Make an Offer';
		$this->layout->view('forms/make_offer', $data);
	}

	//create an ad
	function create()
	{
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('price', 'Price', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('category', 'Category', 'required');
		$category = $this->security->xss_clean($this->input->post('category'));
		$sub_category_check = $this->ad_model->check_subCategory($category);
		if($sub_category_check > 0)
		{
			$this->form_validation->set_rules('subCategory', 'Sub-Category', 'required');
		}

		//if validation fails
		if ($this->form_validation->run() == false)
		{
			$data['error'] = true;
		}
		//if validation passes
		else
		{
			
			$title = $this->security->xss_clean($this->input->post('title'));
			$description = $this->security->xss_clean($this->input->post('description'));
			$price = $this->security->xss_clean($this->input->post('price'));
			$category = $this->security->xss_clean($this->input->post('category'));
			$subCategory = $this->security->xss_clean($this->input->post('subCategory'));
			$tags = $this->security->xss_clean($this->input->post('tags'));
			
			$user = $this->ion_auth->user()->row();
			$user_id = $user->user_id;

			$this->ad_model->insert_new_ad($title, $description, $price, $user_id, $category, $subCategory);

			$ad_id = $this->ad_model->get_new_ad_id($title, $description, $price, $user_id, $category, $subCategory);

			$this->ad_model->insert_new_tags($ad_id, $tags);
			
			$j = 0;     // Variable for indexing uploaded image.
			if(count($_FILES['userfile']['name']) > 0)
			{
				for ($i = 0; isset($_FILES['userfile']['name'][$i]); $i++) {
					$target_path = "assets/Images/";     // Declaring Path for uploaded images.
					// Loop to get individual element from the array
					$validextensions = array("jpeg", "jpg", "png");      // Extensions which are allowed.
					$ext = explode('.', basename($_FILES['userfile']['name'][$i]));   // Explode file name from dot(.)
					$file_extension = end($ext); // Store extensions in the variable.
					$target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext) - 1];     // Set the target path with a new name of image.
					$j = $j + 1;      // Increment the number of uploaded images according to the files in array.
					if (($_FILES["userfile"]["size"][$i] < 100000)  && in_array($file_extension, $validextensions)) {
						if (move_uploaded_file($_FILES['userfile']['tmp_name'][$i], $target_path)) {

						// If file moved to uploads folder.
							echo '<div class="alert alert-success">
			        			<a href="#" class="close" data-dismiss="alert">&times;</a>
			       				 <strong>Success!</strong> '.$j .' Image Uploaded.</div>';

			       				 //echo count($_FILES['userfile']['name'])
			       				$this->ad_model->insert_img_ad($ad_id, $target_path);
						} 
						else {     //  If File Was Not Moved.
							echo '<div class="alert alert-error">
			        			<a href="#" class="close" data-dismiss="alert">&times;</a>
			       				 <strong>Success!</strong> '.$j .' Image Not Uploaded.
			    			</div>';
						}
					}
					/*
					else 
					{     //   If File Size And File Type Was Incorrect.
						echo '<div class="alert alert-error">
			        			<a href="#" class="close" data-dismiss="alert">&times;</a>
			       				 <strong>Success!</strong> '.$j .' Image Not Uploaded.
			    			</div>';
					}
					*/



				$data['created'] = true;
					
				}
				
			}
			else
			{
				$data['created'] = true;
			}

		}

		if ($data['created'] == null){
		$this->session->set_flashdata('message', 'Error creating your ad');
		redirect('market', 'refresh');
		}
		
		if ($data['created'] == true){
		$this->session->set_flashdata('message', 'Your Ad was created and placed on the market. To edit your ad visit "My Ads" under your name in the navigation bar.');
		redirect('market', 'refresh');
		}	
		
	}
	
	//flags an ad
	function flag_ad($ad_id)
	{
		$user = $this->ion_auth->user()->row();
		$user_id = $user->user_id;
		
		$this->ad_model->flag_ad($ad_id, $user_id);
		$this->session->set_flashdata('message', "Thank you for flagging this Ad. The content of this Ad will be reviewed.");
		redirect('ad/details/' . $ad_id, 'refresh');
	}

	function user_ads()
	{
		$user = $this->ion_auth->user()->row();
		$user_id = $user->user_id;

		$data['ads'] = $this->ad_model->get_user_ads($user_id);
		$data['message'] = $this->session->flashdata('message');

		$this->layout->view('forms/user_ads', $data);
	}

	//delete a specific ad
	function delete($ad_id)
	{
		$this->ad_model->delete_ad($ad_id);
		$this->session->set_flashdata('message', "Your Ad has been deleted");
		redirect ('ad/user_ads');
	}
	
	function set_expiration($ad_id, $boolean)
	{
		$this->ad_model->set_expiration($ad_id, $boolean);
		if($boolean == true){
			$this->session->set_flashdata('message', "Your ad has been deactivated");
		}
		else{
			$this->session->set_flashdata('message', "Your ad has been activated");
		}
		redirect ('ad/user_ads');
	}

	//adds a comment to the ad
	function comment()
	{
		$this->form_validation->set_rules('comment', 'Comment', 'required');	
		$this->form_validation->set_rules('ad_id', 'Ad id', 'required');

		//if validation fails
		if ($this->form_validation->run() == false)
		{
			$data['error'] = true;
		}
		//if validation passes
		else
		{
			$ad_id = $this->security->xss_clean($this->input->post('ad_id'));
			$ad_comment = $this->security->xss_clean($this->input->post('comment'));
			
			$user = $this->ion_auth->user()->row();
			$user_id = $user->user_id;
		
			$this->ad_model->comment_ad($ad_id, $ad_comment, $user_id);
	
			$this->session->set_flashdata('message', 'Your comment: "' . $ad_comment . '" has been saved. View it below.');
			redirect('ad/details/' . $ad_id, 'refresh');
		}
	}
}
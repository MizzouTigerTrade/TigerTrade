<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Offers extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('ad_model');
		$this->load->model('offer_model');
		$data['menu'] = $this->load->view('shared/menu');
		
		if (!$this->ion_auth->logged_in())
		{
			//redirect them to the login page
			redirect('auth/login', 'refresh');
		}
	}

	function index()
	{
		$data['title'] = 'Offers';
		$this->layout->view('offers/home', $data);
	}

	function create() {
		$user = $this->ion_auth->user()->row();
		
		$this->form_validation->set_rules('price', 'Price', 'required');
		$this->form_validation->set_rules('buyer_message', 'Buyer_Message', 'required');

		//if validation fails
		if ($this->form_validation->run() == false)
		{
			$data['error'] = true;
		}
		//if validation passes
		else
		{
			$ad_id = $this->input->post('ad_id');
			$seller_id = $this->ad_model->get_seller_id($ad_id);
			$buyer_id = $user->id;
			$price = $this->security->xss_clean($this->input->post('price'));
			$buyer_message = $this->security->xss_clean($this->input->post('buyer_message'));

			$data['seller_id'] = $seller_id;
			$data['ad_id'] = $ad_id;
			$data['buyer_id'] = $buyer_id;
			$data['price'] = $price;
			$data['buyer_message'] = $buyer_message;

			$this->offer_model->insert_new_offer($buyer_id, $seller_id, $ad_id, $buyer_message, $price);

			$data['created'] = true;
			
			$this->session->set_flashdata('message', "Your offer has been sent to the seller");
		}
		
		redirect('ad/details/' . $ad_id , 'refresh');
		
	}

	function sent()
	{
		$user = $this->ion_auth->user()->row();
		$data['title'] = 'Sent Offers';
		$data['pending'] = $this->offer_model->get_buyer_pending_offers($user->id);
		$data['accepted'] = $this->offer_model->get_buyer_accepted_offers($user->id);
		$data['declined'] = $this->offer_model->get_buyer_declined_offers($user->id);
		$data['accepted_notification'] = $this->offer_model->get_accepted_offer_notification($user->id);
		$data['declined_notification'] = $this->offer_model->get_declined_offer_notification($user->id);
		$this->layout->view('offers/sent', $data);
		$this->offer_model->set_all_sent_offer_notification($user->id);
	}

	function received()
	{
		$user = $this->ion_auth->user()->row();
		$offer_notification = $this->offer_model->get_received_offer_notification($user->id);
		$data['offer_notification'] = $offer_notification;
		
		if($offer_notification == 1){
			$data['message'] = "You have 1 new offer!";
		}
		else if ($offer_notification > 1){
			$data['message'] = "You have " . $offer_notification . " new offers!";
		}
		else{
			$data['message'] = $this->session->flashdata('message');
		}
		
		$data['title'] = 'Received Offers';
		$data['pending'] = $this->offer_model->get_seller_pending_offers($user->id);
		$data['accepted'] = $this->offer_model->get_seller_accepted_offers($user->id);
		$data['declined'] = $this->offer_model->get_seller_declined_offers($user->id);
		
		$this->layout->view('offers/received', $data);
		$this->offer_model->set_all_received_offer_notification($user->id);
	}

	//shows form to create a new ad
	function review_offer($offer_id)
	{
		$user = $this->ion_auth->user()->row();
		$data['offer'] = $this->offer_model->get_offer($offer_id);
		$offer = $data['offer'];
		$data['ad'] = $this->ad_model->get_ad($offer->ad_id);
		$data['title'] = 'Review Offer';
		$this->layout->view('forms/offer_response', $data);
	}
	
	function response($offer_id)
	{
		$user = $this->ion_auth->user()->row();
		
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_rules('seller_response', 'Seller_Response', 'required');

		//if validation fails
		if ($this->form_validation->run() == false)
		{
			$data['error'] = true;
		}
		//if validation passes
		else
		{
			$status = $this->security->xss_clean($this->input->post('status'));
			$seller_response = $this->security->xss_clean($this->input->post('seller_response'));
			
			$data['status'] = $status;
			$data['seller_response'] = $seller_response;
			
			$offer = $this->offer_model->get_offer($offer_id);				

			$this->offer_model->respond_to_offer($seller_response, $status, $offer_id);

			$data['created'] = true;
			
			if ($status == "Accepted"){
				$this->ad_model->set_expiration($offer->ad_id, TRUE);
				$this->session->set_flashdata('message', "You accepted the offer");
			}
			else{
				$this->session->set_flashdata('message', "You declined the offer");
			}
		}
		
		redirect('offers/received' , 'refresh');
		
	}
	
	function detail($offer_id) {
		$user = $this->ion_auth->user()->row();
		$data['offer'] = $this->offer_model->get_offer($offer_id);
		$offer = $data['offer'];
		$data['ad'] = $this->ad_model->get_ad($offer->ad_id);
		$data['title'] = 'Offer Details';
		$this->layout->view('offers/details', $data);
	}	
}
?>
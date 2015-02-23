<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Offers extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

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
			$seller_id = 1;
			$ad_id = 1;
			$buyer_id = $user->id;
			$price = $this->security->xss_clean($this->input->post('price'));
			$buyer_message = $this->security->xss_clean($this->input->post('buyer_message'));

			$data['seller_id'] = $seller_id;
			$data['ad_id'] = $ad_id;
			$data['buyer_id'] = $buyer_id;
			$data['price'] = $price;
			$data['buyer_message'] = $buyer_message;

			$this->offer_model->insert_new_offer($price, $seller_id, $ad_id, $buyer_id, $buyer_message);

			$data['created'] = true;
		}

		$data['title'] = 'New Offer';
		$this->layout->view('offers/new_offer', $data);
	}

	function sent()
	{
		$user = $this->ion_auth->user()->row();
		$data['title'] = 'Sent Offers';
		$data['pending'] = $this->offer_model->get_pending_offers($user->id);
		$data['accepted'] = $this->offer_model->get_buyer_accepted_offers($user->id);
		$data['declined'] = $this->offer_model->get_buyer_declined_offers($user->id);
		$this->layout->view('offers/sent', $data);
	}

	function received()
	{
		$data['title'] = 'Received Offers';
		$this->layout->view('offers/received', $data);
	}

}
?>
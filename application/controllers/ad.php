<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Ad extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
	}

	function index()
	{
		$data['title'] = 'Ad Home';
		$this->layout->view('ad_view', $data);
	}

	//shows details of a specific ad
	function details($ad_id)
	{

	}

	//edit ad by id
	function edit($ad_id)
	{

	}

	//update ad by id
	function update($ad_id)
	{

	}

	//shows form to create a new ad
	function new_ad()
	{
		$data['title'] = 'New Ad';
		$this->layout->view('new_ad', $data);
	}

	//shows form to create a new ad
	function make_offer()
	{
		$data['title'] = 'Make an Offer';
		$this->layout->view('make_offer', $data);
	}

	//create an ad
	function create()
	{

	}

	//delete a specific ad
	function delete($ad_id)
	{

	}
}
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Offer_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function insert_new_offer($name, $description, $category_id)
	{
		$this->db->set('buyer_id', $buyer_id);
		$this->db->set('seller_id', $seller_id);
		$this->db->set('ad_id', $ad_id);
		$this->db->set('buyer_message', $buyer_message);
		$this->db->set('price', $price);
		// Seller Message is null by default
		//$this->db->set('seller_response', $seller_response);
		// Default status is 'Pending'
		//$this->db->set('status', $status);

		//insert into db, throw error if data not inserted
		if( $this->db->insert('offers') != TRUE)
		{
			throw new Exception("Cannot insert");
		}
		else
		{
			return $this->db->affected_rows();
		}
	}

	public function get_all_offers()
	{
		return $this->db->get('offers');
	}

	public function get_pending_offers($buyer_id)
	{
		$query = $this->db->query("SELECT * FROM offers WHERE buyer_id = '$buyer_id' AND status = 'Pending'");
		return $query;
	}

	public function get_buyer_declined_offers($buyer_id)
	{
		$query = $this->db->query("SELECT * FROM offers WHERE buyer_id = '$buyer_id' AND status = 'Declined'");
		return $query;
	}
	
	public function get_buyer_accepted_offers($buyer_id)
	{
		$query = $this->db->query("SELECT * FROM offers WHERE buyer_id = '$buyer_id' AND status = 'Accepted'");
		return $query;
	}
	
	public function get_seller_declined_offers($seller_id)
	{
		$query = $this->db->query("SELECT * FROM offers WHERE buyer_id = '$seller_id' AND status = 'Declined'");
		return $query;
	}
	
	public function get_seller_accepted_offers($seller_id)
	{
		$query = $this->db->query("SELECT * FROM offers WHERE buyer_id = '$seller_id' AND status = 'Accepted'");
		return $query;
	}

}

?>
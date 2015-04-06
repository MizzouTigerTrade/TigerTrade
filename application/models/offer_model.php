<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Offer_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function insert_new_offer($buyer_id, $seller_id, $ad_id, $buyer_message, $price)
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

	public function get_offer($offer_id)
	{
		$result = $this->db->query("SELECT * FROM offers WHERE offer_id = '$offer_id'");
		$result = $result->row();
		return $result;
	}

	public function get_all_offers()
	{
		return $this->db->get('offers');
	}

	public function get_buyer_pending_offers($buyer_id)
	{
		$result = $this->db->query("SELECT * FROM offers WHERE buyer_id = '$buyer_id' AND status = 'Pending'");
		return $result;
	}

	public function get_buyer_declined_offers($buyer_id)
	{
		$result = $this->db->query("SELECT * FROM offers WHERE buyer_id = '$buyer_id' AND status = 'Declined'");
		return $result;
	}
	
	public function get_buyer_accepted_offers($buyer_id)
	{
		$result = $this->db->query("SELECT * FROM offers WHERE buyer_id = '$buyer_id' AND status = 'Accepted'");
		return $result;
	}

	public function get_seller_pending_offers($seller_id)
	{
		$result = $this->db->query("SELECT * FROM offers WHERE seller_id = '$seller_id' AND status = 'Pending'");
		return $result;
	}
	
	public function get_seller_declined_offers($seller_id)
	{
		$result = $this->db->query("SELECT * FROM offers WHERE seller_id = '$seller_id' AND status = 'Declined'");
		return $result;
	}
	
	public function get_seller_accepted_offers($seller_id)
	{
		$result = $this->db->query("SELECT * FROM offers WHERE seller_id = '$seller_id' AND status = 'Accepted'");
		return $result;
	}

	public function respond_to_offer($seller_response, $status, $offer_id)
	{
		$data = array(
               'seller_response' => $seller_response,
               'status' => $status
            );
        $this->db->where('offer_id', $offer_id);
		$this->db->update('offers', $data); 
	}
	
	public function get_received_offers_notification($user_id)
	{
		$this->db->select('received_offers');
		$query = $this->db->get('notifications');
		$result = $query->result();
		return $result;
	}
	
	public function get_sent_offers_notification($user_id)
	{
		$this->db->select('sent_offers');
		$query = $this->db->get('notifications');
		$result = $query->result();
		return $result;
	}
	
	public function add_received_offer_notification($user_id)
	{
		$this->db->set('received_offers', 'received_offers+1', FALSE);
		$this->db->where('user_id', $user_id);
		
		if( $this->db->update('notifications') != TRUE)
		{
			throw new Exception("Cannot Update Notifications");
		}
		else
		{
			return $this->db->affected_rows();
		}
	}
	
	public function add_sent_offer_notification($user_id)
	{
		$this->db->set('sent_offers', 'sent_offers+1', FALSE);
		$this->db->where('user_id', $user_id);
		
		if( $this->db->update('notifications') != TRUE)
		{
			throw new Exception("Cannot Update Notifications");
		}
		else
		{
			return $this->db->affected_rows();
		}
	}

}

?>
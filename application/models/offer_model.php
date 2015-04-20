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
			$this->add_received_offer_notification($seller_id);
			return $this->db->affected_rows();
		}
	}

	public function get_offer($offer_id)
	{
		$result = $this->db->query("SELECT *, offers.price AS offer_price, ads.price AS asking_price FROM offers JOIN ads ON offers.ad_id = ads.ad_id WHERE offer_id = '$offer_id'");
		$result = $result->row();
		return $result;
	}

	public function get_all_offers()
	{
		return $this->db->get('offers');
	}

	public function get_buyer_pending_offers($buyer_id)
	{
		$result = $this->db->query("SELECT *, offers.price AS offer_price, ads.price AS asking_price FROM offers JOIN ads ON offers.ad_id = ads.ad_id WHERE buyer_id = '$buyer_id' AND status = 'Pending'");
		return $result;
	}

	public function get_buyer_declined_offers($buyer_id)
	{
		$result = $this->db->query("SELECT *, offers.price AS offer_price, ads.price AS asking_price FROM offers JOIN ads ON offers.ad_id = ads.ad_id WHERE buyer_id = '$buyer_id' AND status = 'Declined'");
		return $result;
	}
	
	public function get_buyer_accepted_offers($buyer_id)
	{
		$result = $this->db->query("SELECT *, offers.price AS offer_price, ads.price AS asking_price FROM offers JOIN ads ON offers.ad_id = ads.ad_id WHERE buyer_id = '$buyer_id' AND status = 'Accepted'");
		return $result;
	}

	public function get_seller_pending_offers($seller_id)
	{
		$result = $this->db->query("SELECT *, offers.price AS offer_price, ads.price AS asking_price FROM offers JOIN ads ON offers.ad_id = ads.ad_id WHERE seller_id = '$seller_id' AND status = 'Pending'");
		return $result;
	}
	
	public function get_seller_declined_offers($seller_id)
	{
		$result = $this->db->query("SELECT *, offers.price AS offer_price, ads.price AS asking_price FROM offers JOIN ads ON offers.ad_id = ads.ad_id WHERE seller_id = '$seller_id' AND status = 'Declined'");
		return $result;
	}
	
	public function get_seller_accepted_offers($seller_id)
	{
		$result = $this->db->query("SELECT *, offers.price AS offer_price, ads.price AS asking_price FROM offers JOIN ads ON offers.ad_id = ads.ad_id WHERE seller_id = '$seller_id' AND status = 'Accepted'");
		return $result;
	}
	
	public function get_seller_accepted_declined_offers($seller_id)
	{
		$result = $this->db->query("SELECT *, offers.price AS offer_price, ads.price AS asking_price FROM offers JOIN ads ON offers.ad_id = ads.ad_id WHERE seller_id = '$seller_id' AND status = 'Accepted' OR status = 'Declined'");
		return $result;
	}
	
	public function get_buyer_id($offer_id)
	{
		$this->db->where('offer_id', $offer_id);
		$query = $this->db->get('offers');
		$result = $query->row();
		$buyer_id = $result->buyer_id;
		return $buyer_id;
	}

	public function respond_to_offer($seller_response, $status, $offer_id)
	{
		$data = array(
               'seller_response' => $seller_response,
               'status' => $status
            );
        $this->db->where('offer_id', $offer_id);
		$this->db->update('offers', $data); 
		
		$buyer_id = $this->get_buyer_id($offer_id);
		$this->add_sent_offer_notification($buyer_id);
		
	}
	
	public function get_received_offer_notification($user_id)
	{
		$result = $this->db->query("SELECT * FROM offers WHERE seller_id = '$user_id' AND seen_by_seller = false");
		$count = $result->num_rows();
		return $count;
	}
	
	public function get_sent_offer_notification($user_id)
	{
		$result = $this->db->query("SELECT * FROM offers WHERE buyer_id = '$user_id' AND seen_by_buyer = false");
		$count = $result->num_rows();
		return $count;
	}
	
	public function get_accepted_offer_notification($user_id)
	{
		$result = $this->db->query("SELECT * FROM offers WHERE buyer_id = '$user_id' AND seen_by_buyer = false AND status = 'Accepted'");
		$count = $result->num_rows();
		return $count;
	}
	
	public function get_declined_offer_notification($user_id)
	{
		$result = $this->db->query("SELECT * FROM offers WHERE buyer_id = '$user_id' AND seen_by_buyer = false AND status = 'Declined'");
		$count = $result->num_rows();
		return $count;
	}
	
	public function add_received_offer_notification($user_id)
	{
		$this->db->set('received_offer_notification', 'received_offer_notification+1', FALSE);
		$this->db->where('id', $user_id);
		
		if( $this->db->update('users') != TRUE)
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
		$this->db->set('sent_offer_notification', 'sent_offer_notification+1', FALSE);
		$this->db->where('id', $user_id);
		
		if( $this->db->update('users') != TRUE)
		{
			throw new Exception("Cannot Update Notifications");
		}
		else
		{
			return $this->db->affected_rows();
		}
	}
	
	public function set_received_offer_notification($user_id)
	{
		
		$this->db->set('seen_by_seller', true, FALSE);
		$this->db->where('seller_id', $user_id);
		
		if( $this->db->update('offers') != TRUE)
		{
			throw new Exception("Cannot Update Notifications");
		}
		else
		{
			return $this->db->affected_rows();
		}
		
	}
	
	public function set_sent_offer_notification($user_id)
	{
		$this->db->set('seen_by_buyer', false, FALSE);
		$this->db->where('buyer_id', $user_id);
		
		if( $this->db->update('offers') != TRUE)
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
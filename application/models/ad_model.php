<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Ad_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('category_model');
	}

	public function insert_new_ad($title, $description, $price, $user_id, $category, $subCategory)
	{
		$this->db->set('title', $title);
		$this->db->set('description', $description);
		$this->db->set('price', $price);
		$this->db->set('user_id', $user_id);
		$this->db->set('category_id', $category);
		$this->db->set('subcategory_id', $subCategory);

		//insert into db, throw error if data not inserted
		if( $this->db->insert('ads') != TRUE)
		{
			throw new Exception("Cannot insert");
		}
		else
		{
			return $this->db->affected_rows();
		}
	}

	public function get_new_ad_id($title, $description, $price, $user_id, $category, $subCategory)
	{
		$this->db->select('ad_id, title');		
		$this->db->where('title', $title);
		$this->db->where('description', $description);
		$this->db->where('price', $price);
		$this->db->where('user_id', $user_id);
		$this->db->where('category_id', $category);
		$this->db->where('subcategory_id', $subCategory);
		$query = $this->db->get('ads');
		if($query->num_rows() == 1)
		{
			$query = $query->row();
			return $query->ad_id;
		}
		else
		{
			return 0;
		}

	}


	public function get_subcategories($category_id){
        $this->db->select('subcategory_id, name');
        $this->db->where('category_id', $category_id);
        $query = $this->db->get('subcategories');
        $subcategories = array();

        if($query->result()){
            foreach ($query->result() as $sub) {
                $subcategories[$sub->subcategory_id] = ucfirst($sub->name);
            }
            return $subcategories;
        } else {
            return FALSE;
        }
    } 



	public function get_all_ads()
	{
		$result = $this->db->query("SELECT * FROM ads");
		return $result;
	}

	public function get_ads_category($category_id)
	{
		$result = $this->db->query("SELECT * FROM ads WHERE category_id = '$category_id'");
		return $result;
	}

	public function get_ads_subcategory($subcategory_id)
	{
		$result = $this->db->query("SELECT * FROM ads WHERE subcategory_id = '$subcategory_id'");
		return $result;
	}

	public function get_ad($ad_id)
	{
		$result = $this->db->query("SELECT * FROM ads WHERE ad_id = '$ad_id'");
		$result = $result->row();
		return $result;
	}

	public function get_seller_id($ad_id)
	{
		$result = $this->db->query("SELECT * FROM ads WHERE ad_id = '$ad_id'");
		$result = $result->row();
		$seller_id = $result->user_id;
		return $seller_id;
	}

	public function get_user_ads($user_id)
	{
		$result = $this->db->query("SELECT * FROM ads where user_id = '$user_id'");
		$ad_array = new ArrayObject();
		$i = 0;
		if($result->num_rows() > 0)
		{
			$result = $result->result();
			foreach($result as $ad)
			{
				$single_ad['ad_id'] = $ad->ad_id;
				$single_ad['title'] = $ad->title;
				$single_ad['price'] = '$'.$ad->price;
				$category = $this->category_model->get_category($ad->category_id);
				$single_ad['category'] = ucwords($category->name);
				if($ad->subcategory_id)
				{
					$subCategory = $this->category_model->get_subCategory($ad->subcategory_id);
					$single_ad['subCategory'] = ucwords($subCategory->name);
				}
				else
				{
					$single_ad['subCategory'] = "";
				}
				$ad_array->append($single_ad);
			}
			return $ad_array;
		}
		else
		{
			return 0;
		}
	}

	public function delete_ad($ad_id)
	{
		//delete ad here
		return 0;
	}

}

?>
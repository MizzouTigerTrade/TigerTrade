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

	public function insert_new_tags($ad_id, $tags)
	{
			if(!empty($tags))
			{
				$tags = explode(',', $tags);
				foreach ($tags as $tag) 
				{
					$this->ad_model->insert_single_tag($ad_id, $tag);	
				}
			}
	}

	public function insert_single_tag($ad_id, $tag)
	{
		$this->db->set('ad_id', $ad_id);
		$this->db->set('description', $tag);

		//insert into db, throw error if data not inserted
		if( $this->db->insert('tags') != TRUE)
		{
			throw new Exception("Cannot insert");
		}
		else
		{
			return $this->db->affected_rows();
		}
	}

	public function get_all_tags()
	{
		$result = $this->db->query("SELECT * FROM tags");
		return $result;
	}

	public function get_ad_images($ad_id)
	{
		$result = $this->db->query("SELECT * FROM images where ad_id = '$ad_id'");
		return $result;
	}

	public function get_all_images()
	{
		$result = $this->db->query("SELECT * FROM images");
		return $result;
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

	public function insert_img_ad($ad_id, $target_path)
	{
		$this->db->set('ad_id', $ad_id);
		$this->db->set('image_path', $target_path);

		//insert into db, throw error if data not inserted
		if( $this->db->insert('images') != TRUE)
		{
			throw new Exception("Cannot insert");
		}
		else
		{
			return $this->db->affected_rows();
		}
	}

	public function get_ad_tags($ad_id)
	{
		$ad_tags = "";
		$result = $this->db->query("SELECT * FROM tags WHERE ad_id = '$ad_id'");
		foreach($result->result() as $tag)
		{
			$ad_tags = $ad_tags . $tag->description . ",";
		}
		return $ad_tags;
	}


	public function get_all_ads()
	{
		$result = $this->db->query("SELECT * FROM ads WHERE expired = 0");
		return $result;
	}
	//edit
	public function get_ad_count()
	{
		$result = $this->db->query("SELECT COUNT(ads.ad_id) FROM ads");
		return $result;
	}

	public function get_ads_category($category_id)
	{
		$result = $this->db->query("SELECT * FROM ads WHERE category_id = '$category_id' and expired = 0");
		return $result;
	}

	public function get_ads_subcategory($subcategory_id)
	{
		$result = $this->db->query("SELECT * FROM ads WHERE subcategory_id = '$subcategory_id' and expired = 0");

		return $result;
	}

	public function check_if_image_exists($ad_id)
	{
		$result = $this->db->query("SELECT * FROM images where ad_id = '$ad_id'");

		return $result;
	}

	public function update_ad($ad_id, $title, $description, $price, $category, $subCategory)
	{
		$data = array(
			'title' 		=> $title,
			'description' 	=> $description,
			'price'			=> $price,
			'category_id' 	=> $category,
			'subcategory_id'=> $subCategory
			);

		$this->db->where('ad_id', $ad_id);

		if( $this->db->update('ads', $data) != TRUE)
		{
			throw new Exception("Cannot Update ad");
		}
		else
		{
			return $this->db->affected_rows();
		}
	}

	public function update_tags($ad_id, $tags)
	{
		$this->db->query("DELETE FROM tags WHERE ad_id = '$ad_id'");
		if(!empty($tags))
		{
			$tags = explode(',', $tags);
			foreach ($tags as $tag) 
			{
				$this->ad_model->insert_single_tag($ad_id, $tag);	
			}
		}
	}


	public function get_image_of_ads($ads)
	{
		$result = $this->db->query("SELECT * FROM images");

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
	
	public function get_flagged_ads()
	{
		$query = $this->db->query("SELECT *, COUNT(flags.ad_id) AS flag_count FROM flags JOIN ads ON flags.ad_id = ads.ad_id JOIN users ON ads.user_id = users.id GROUP BY flags.ad_id ORDER BY COUNT(flags.ad_id) DESC");
		$result = $query->result();
		return $result;
	}
	
	public function get_flagged_ads_count()
	{
		$query = $this->db->query("SELECT * FROM flags GROUP BY ad_id");
		$result = $query->num_rows();
		return $result;
	}
	
	
	//user_id is the id of user who is flagging an ad
	public function flag_ad($ad_id, $user_id)
	{
		$data = array(
		'ad_id' => $ad_id ,
		'user_id' => $user_id ,
		);

		if( $this->db->insert('flags', $data) != TRUE)
		{
			throw new Exception("Cannot Update Flag Count");
		}
		else
		{
			return $this->db->affected_rows();
		}
		
	}
	
	//checks if user has flagged an ad
	//true returned if ad has been flagged by user
	//false returned if ad has NOT been flagged by user
	public function check_if_ad_flagged($ad_id, $user_id)
	{
		$query = $this->db->get_where('flags', array('ad_id' => $ad_id, 'user_id' => $user_id));
		
		if ($query->num_rows() > 0) {
			return true;
		}
		else {
			return false;
		}	
	}

	public function dismiss_flag($ad_id)
	{	
		$this->db->where('ad_id', $ad_id);
		$this->db->delete('flags'); 
	}
	
	public function check_subCategory($category)
	{
		$result = $this->db->query("SELECT * FROM subcategories WHERE category_id = '$category'");

		return $result->num_rows();
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
				$single_ad['expired'] = $ad->expired;
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
		$this->db->where('ad_id', $ad_id);
		$this->db->delete('ads'); 
	}

	public function get_comments($ad_id)
	{
		$this->db->select('user_id');
		$this->db->select('ad_comment');
		$this->db->select('timestmp AS comment_time');
		$this->db->from('comments');
		$this->db->where('ad_id', $ad_id);
		
		$query = $this->db->get();
		
		if($query->num_rows() > 0) {
			$results = $query->result();
			return $results;
		}
	}
	
	public function comment_ad($ad_id, $ad_comment, $user_id)
	{
		$data = array(
		'ad_id' => $ad_id ,
		'ad_comment' => $ad_comment,
		'user_id' => $user_id ,
		);
		
		$this->db->set('timestmp', 'NOW()', FALSE);
		
		if($this->db->insert('comments', $data) != TRUE)
		{
			throw new Exception("cannot insert");
		}
		else
		{
			return $this->db->affected_rows();
		}
	}
	
	public function set_expiration($id, $boolean) {
		$this->db->where('ad_id', $id);
		$this->db->set('expired', $boolean);
		
		if($this->db->update('ads') != TRUE)
		{
			throw new Exception("Cannot update expired field.");
		}
		else
		{
			return $this->db->affected_rows();
		}
	}

	public function get_image($ad_id)
	{
		$result = $this->db->query("SELECT * FROM images Where ad_id = '$ad_id'");
		if($result->num_rows() > 0)
		{
			$result = $result->row();
			return $result->image_path;
		}
		else
		{
			return null;
		}
	}

	public function get_all_ads_json()
	{
		$ads = array();
		$j=0;
		$all_ads = $this->get_all_ads();
		$all_ads = $all_ads->result();
		foreach($all_ads as $ad)
		{
			$ads[$j] = array('image' => $this->get_image($ad->ad_id), 'ad_id' => $ad->ad_id, 'title' => $ad->title, 'description' => $ad->description, 
						'price' => $ad->price, 'user_id' => $ad->user_id, 'category_id' => $ad->category_id, 'subcategory_id' => $ad->subcategory_id,
						'tags' => $this->get_ad_tags($ad->ad_id));

			$j++;
		}

		return $ads;
	}

	public function get_ads_category_json($cat)
	{
		$ads = array();
		$j=0;
		$all_ads = $this->get_ads_category($cat);
		$all_ads = $all_ads->result();
		foreach($all_ads as $ad)
		{
			$ads[$j] = array('image' => $this->get_image($ad->ad_id), 'ad_id' => $ad->ad_id, 'title' => $ad->title, 'description' => $ad->description, 
						'price' => $ad->price, 'user_id' => $ad->user_id, 'category_id' => $ad->category_id, 'subcategory_id' => $ad->subcategory_id,
						'tags' => $this->get_ad_tags($ad->ad_id));

			$j++;
		}

		return $ads;
	}

	public function get_ads_subcategory_json($sub)
	{
		$ads = array();
		$j=0;
		$all_ads = $this->get_ads_subcategory($sub);
		$all_ads = $all_ads->result();
		foreach($all_ads as $ad)
		{
			$ads[$j] = array('image' => $this->get_image($ad->ad_id), 'ad_id' => $ad->ad_id, 'title' => $ad->title, 'description' => $ad->description, 
						'price' => $ad->price, 'user_id' => $ad->user_id, 'category_id' => $ad->category_id, 'subcategory_id' => $ad->subcategory_id,
						'tags' => $this->get_ad_tags($ad->ad_id));

			$j++;
		}

		return $ads;
	}

	public function remove_image($img_id)
	{
		$result = $this->db->query("DELETE FROM images WHERE tag_id = '$img_id'");

		return 0;
	}
}

?>
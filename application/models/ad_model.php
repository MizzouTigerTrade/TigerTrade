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
			$ad_tags = $ad_tags . $tag->description . ", ";
		}
		return $ad_tags;
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

	//edit
	/*
	public function get_comments($ad_id)
	{
		//$query = $this->db->query("SELECT description FROM comments where ad_id = '$ad_id'");
		$result = $this->db->query("SELECT ad_comment FROM comments JOIN ads ON comments.ad_id = ads.ad_id JOIN users ON ads.user_id = users.id GROUP BY comments.timestmp ORDER BY COUNT(comments.timestmp) DESC");
		$result = $result->result();
		return $result;
	}
	*/
	public function get_comments($ad_id)
	{
		//$result = $this->db->query("SELECT * FROM comments JOIN ads ON comments.ad_id = ads.ad_id JOIN users ON ads.user_id = users.id GROUP BY comments.timestmp ORDER BY COUNT(comments.timestmp) DESC");
		$result = $this->db->query("SELECT * FROM comments WHERE ad_id = '$ad_id'");
		$comment_array = new ArrayObject();
		if($result->num_rows() > 0)
		{
			$result = $result->result();
			foreach($result as $ad)
			{
				$single_comment['ad_id'] = $ad->ad_id;
				$single_comment['ad_comment'] = $ad->ad_comment;
				$single_comment['user_id'] = $ad->user_id;
				$single_comment['timestmp'] = $ad->timestmp;
				$comment_array->append($single_comment);
			}
			return $comment_array;
		}
		else
		{
			$comment_array = "There are no available comments for this ad. If you have questions about the details of this ad, please make an appropriate comment below.";
			return $comment_array;
		}
	}
	
	public function comment_ad($ad_id, $ad_comment, $user_id, $timestmp)
	{
		/*
		$this->db->set('ad_id', $ad_id);
		$this->db->set('ad_comment', $ad_comment);
		$this->db->set('user_id', $user_id);
		$this->db->set('timestmp', $timestmp);
		*/
		$data = array(
		'ad_id' => $ad_id ,
		'ad_comment' => $ad_comment,
		'user_id' => $user_id ,
		'timestmp' => $timestmp
		);
		
		//insert into db, error thrown if not inserted correctly
		if($this->db->insert('comments', $data) != TRUE)
		{
			throw new Exception("cannot insert");
		}
		else
		{
			return $this->db->affected_rows();
		}
	}
}

?>
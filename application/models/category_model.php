<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function insert_new_category($name, $description)
	{
		$this->db->set('name', $name);
		$this->db->set('description', $description);

		//insert into db, throw error if data not inserted
		if( $this->db->insert('categories') != TRUE)
		{
			throw new Exception("Cannot insert");
		}
		else
		{
			return $this->db->affected_rows();
		}
	}
	
	public function get_all_categories()
	{
		return $this->db->get('categories');
	}

	public function get_category($category_id)
	{
		$query = $this->db->query("SELECT * FROM categories WHERE category_id = '$category_id'");
		$query = $query->row();
		return $query;
	}
	
	public function get_category_by_name($name)
	{
		$query = $this->db->query("SELECT * FROM categories WHERE name = '$name'");
		$query = $query->row();
		return $query;
	}

}

?>
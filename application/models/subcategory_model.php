<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subcategory_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function insert_new_subcategory($name, $description, $category_id)
	{
		$this->db->set('name', $name);
		$this->db->set('description', $description);
		$this->db->set('category_id', $category_id);

		//insert into db, throw error if data not inserted
		if( $this->db->insert('subcategories') != TRUE)
		{
			throw new Exception("Cannot insert");
		}
		else
		{
			return $this->db->affected_rows();
		}
	}

	public function get_all_subcategories()
	{
		$this->db->order_by("name", "asc"); 
		return $this->db->get('subcategories');
	}

	/*
	public function get_subcategories($category_id)
	{
		$query = $this->db->query("SELECT * FROM subcategories WHERE category_id = '$category_id' ORDER BY name ASC");
		return $query;
	}
	*/

	public function get_subcategories($category_id){
		
        $this->db->select('subcategory_id, name');
		$this->db->order_by("name", "asc"); 
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
	
	public function get_subcategory($subcategory_id)
	{
		$query = $this->db->query("SELECT * FROM subcategories WHERE subcategory_id = '$subcategory_id'");
		$query = $query->row();
		return $query;
	}
	
	
	
	public function get_subcategory_by_name($name)
	{
		$query = $this->db->query("SELECT * FROM subcategories WHERE name = '$name'");
		$query = $query->row();
		return $query;
	}

}

?>
<?php  
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Notifications
{
    function __construct()
    {
		$this->CI =& get_instance();
        $this->CI->load->model('ad_model');
    }

    function get_flagged_ads_count()
    {
		$flag_count = $this->CI->ad_model->get_flagged_ads_count();
		return $flag_count;
    }

}
?> 
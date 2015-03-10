<?php  
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Notifications
{
    function __construct()
    {
        $this->load->model('ad_model');
    }

    function get_flagged_ads_count()
    {
		$flag_count = $this->ad_model->get_flagged_ads_count();
		return $flag_count;
    }

}
?> 
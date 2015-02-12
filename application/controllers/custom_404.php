<?php 
class Custom_404 extends CI_Controller 
{
    public function __construct() 
    {
        parent::__construct(); 
        $data['menu'] = $this->load->view('shared/menu');
    } 

    public function index() 
    { 
        $data['title'] = '404 Not Found';
        $this->layout->view('error/custom_404', $data);
    } 
} 
?> 
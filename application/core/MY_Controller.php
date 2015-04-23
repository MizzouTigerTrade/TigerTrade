<?php
class MY_Controller extends CI_Controller {

    protected $calledClass ;
    protected $calledMethod;
    protected $isAuthException;

    public function __construct()
    {
        parent::__construct();

        $this->load->library("router");

        /* 
            add the controllers and the methods which don't need auth check.
            This is to assign any controller and it's methods to skip the auth
            check.

            Format : "{CONTROLLER}" => "{A METHOD}", "{Another METHOD}",
        */

        $authExceptions = array(

            "admin"     => array("login", "logout", "create_user")

        );

        $this->calledClass = $this->router->fetch_class();
        $this->calledMethod = $this->router->fetch_method();

        $this->isAuthException = array_key_exists($this->calledClass,$authExceptions) && in_array($this->calledMethod, $authExceptions[$this->calledClass]);

        if(!$this->isAuthException && !isset($this->ion_auth->is_admin()))
        {
            redirect('auth/login.php');
        }
    }
}
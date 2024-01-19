<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends MX_Controller {
	
    function __construct() {
        parent::__construct();
        $this->load->library('session');
        modules::run('web_panel/User_panel_ini/user_ini');
        $this->load->helper('custom');
       // $this->load->model('About_model');
    }

	public function index()
	{
          
	      $this->load->view('faq');
	}
        
        
}

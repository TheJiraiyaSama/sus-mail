<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About_us extends MX_Controller {
	
    function __construct() {
        parent::__construct();
        $this->load->library('session');
        modules::run('web_panel/User_panel_ini/user_ini');
        $this->load->helper('custom');
       // $this->load->model('About_model');
    }

	public function index()
	{
              $result['about']=$this->db->get('master_aboutus')->result_array();
              // print_r($result); die();
	      $this->load->view('about-us',$result);
	}
        
        
}

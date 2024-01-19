<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Our_business extends MX_Controller {

	
     function __construct() {
        parent::__construct();
        $this->load->library('session');
        modules::run('web_panel/User_panel_ini/user_ini');
        $this->load->helper('custom');
    }

	public function index()
	{
                $result['our']=$this->db->get('our_business')->result_array();
		$this->load->view('our-business',$result);
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Franchise_process extends MX_Controller {


    function __construct() {
        parent::__construct();
        $this->load->library('session');
        modules::run('web_panel/User_panel_ini/user_ini');
        $this->load->helper('custom');
    }
  	
    
	public function index()
	{       
                $result['process']=$this->db->get('franchise_process')->result_array();
		$this->load->view('franchise-process',$result);
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vision_mission extends MX_Controller {

	
    function __construct() {
        parent::__construct();
        $this->load->library('session');
        modules::run('web_panel/User_panel_ini/user_ini');
        $this->load->helper('custom');
    }

	public function index()
	{
                $result['vision']=$this->db->get('vision_mission')->result_array();
		$this->load->view('vision-mission',$result);
	}
}

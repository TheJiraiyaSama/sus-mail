<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Our_team extends MX_Controller {

	
	public function index()
	{
        	  $this->db->where('status',1);
        	   $result['team']= $this->db->get('team')->result_array();
	   
	//   print_r($result['team']);die;
		$this->load->view('our-team', $result);
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends MX_Controller {

	
	public function index()
	{
	    $result['video']= $this->db->get('master_video')->result_array();
		$this->load->view('video', $result);
	}
}

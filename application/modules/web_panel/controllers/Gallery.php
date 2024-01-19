<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends MX_Controller {

	
	public function index()
	{       
           $result['gallery']= $this->db->get('gallery')->result_array();
           $this->load->view('gallery',$result);
	}
}

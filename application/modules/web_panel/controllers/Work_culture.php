<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Work_culture extends MX_Controller {

	
	public function index()
	{
            
              $result['data']= $this->db->get('work_culture')->result_array();
               
               $this->load->view('work-culture', $result);
	}
}

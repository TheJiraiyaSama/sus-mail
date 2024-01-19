<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Franchise extends MX_Controller {

	
	public function index()
	{
            
            $input=$this->input->post();
            if(!empty($input))
            {
            $input['created'] = time();
            $result=$this->db->insert('apply_franchise',$input);
            if($result)
            {
                  echo json_encode(array('status' => true, 'message' => 'Successfully Submited'));
            }else
            {
                  echo json_encode(array('status' => true, 'message' => 'not Successfully Submited'));
            }
            
            }
          $this->load->view('franchise');
	}
}

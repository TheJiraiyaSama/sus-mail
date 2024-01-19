<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_us extends MX_Controller {

	public function index() {
        $input = $this->input->post();
        $view_data['success'] = "";
        if($input){
            if($this->session->userdata('active_user_id')){
                $this->db->select('name,email');
                $this->db->where('id',$this->session->userdata('active_user_id'));
                $data = $this->db->get('users')->row_array();
                $input['name'] = $data['name'];
                $input['email'] = $data['email'];
                $input['users_id'] = $this->session->userdata('active_user_id');
                $input['registered'] = 1;
            }
            $input['status'] = 1;
            $input['created'] = time();
            $this->db->insert('contact',$input);
            echo json_encode(array('status' => true, 'message' => 'Successfully Submited'));
            die;
        }
        $result['video']= $this->db->get('master_video')->result_array();
        $this->load->view('contact-us',$view_data);
    } 
	
	
	
}

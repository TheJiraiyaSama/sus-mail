<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends CI_Model {
    
public function save_customer_info(){
		$data = array();
		$data['user_id'] = $this->input->post('user_id');
		$data['name'] = $this->input->post('first_name');
		$data['first_name'] = $this->input->post('first_name');
		$data['last_name'] = $this->input->post('last_name');
		$data['email'] = $this->input->post('email');
		$data['mobile'] = $this->input->post('mobile');
		$data['password'] = md5($this->input->post('password'));
		$data['user_type'] = 2;
		$data['status'] = 1;
 	//	print_r($data);die;
		$this->db->insert("users",$data);
		$customerid = $this->db->insert_id();
		return $customerid;
	}
	
	public function select_customer_info_by_id($customer_id){
		$data = $this->db->select('*')
			->from('users')
			->where("id",$customer_id)
			->get()
			->row();
			return $data;
	}
	


	
	public function get_user_login_by_email($cus_email){
		$data = $this->db->select('*')
			->from('tbl_customer')
			->where("cus_email",$cus_email)
			->get()
			->row();
			return $data;
	}
	

}
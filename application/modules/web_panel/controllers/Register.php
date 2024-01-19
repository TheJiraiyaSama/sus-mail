<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends MX_Controller {

	function __construct() {
        parent::__construct();
        $this->load->library('session');
        modules::run('web_panel/User_panel_ini/user_ini');
        $this->load->helper('custom');
        $this->load->model('Register_model');
    }
	public function index()
	{
	    
	        $input=$this->input->post();
              //print_r($input); 
              



            if(!empty($input))
            {
            $result=$this->db->insert('users',$input);
            if($result)
            {
                  echo json_encode(array('status' => true, 'message' => 'Successfully Submited'));
            }else
            {
                  echo json_encode(array('status' => true, 'message' => 'not Successfully Submited'));
            }
            
            }
		$this->load->view('register');
	}

 public function customer_registration(){
     $input=      $this->input->post();
    // print_r($input);die();
    if($input){
            $customer_id = $this->Register_model->save_customer_info();
            
            if($customer_id){
              //  echo 'success';
                $this->customer_login();
                
                redirect("index.php/admin_panel/Admin/index");
        }

      }else{
                  $this->customer_registration();//checkout means login page
            }
      }
      public function customer_login(){
        
                 redirect("index.php/admin_panel/Admin/index");
            
      }

}

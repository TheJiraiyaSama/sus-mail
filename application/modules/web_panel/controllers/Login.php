<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MX_Controller {
  
   function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('html');
       // $this->load->helper('custom');
//        $this->load->model('User_model');
      //  $this->load->helper('cookie');
        $this->load->library('email');
        //$this->load->library('Facebook');        
    }
    public function index() {

      if ($this->input->post()) { 

          if ($this->input->post('email') == '') {
                echo json_encode(array('status' => 0, 'message' => 'Please enter email OR mobile number'));
                die;
            }
            if (!filter_var($this->input->post('email'), FILTER_VALIDATE_EMAIL)) {
                echo json_encode(array('status' => 0, 'message' => 'Please enter an valid email'));
                die;
            }
            if ($this->input->post('password') == '') {
                echo json_encode(array('status' => 0, 'message' => 'Please enter password'));
                die;
            }
            if (strlen($this->input->post('password')) < '6') {
                echo json_encode(array('status' => 0, 'message' => 'Enter password atleast 6 character'));
                die;
            }

            $this->db->group_start()
                    ->where('email', $this->input->post('email'))
                     ->group_end();
            $this->db->Where('password', $this->input->post('password'));
            $result = $this->db->get('master_register')->row();
           
            if ($result) {
                $newdata = array(
                    'active_user_flag' => True,
                    'active_user_id' => $result->id,
                    'active_sm_userdata' => $result,
                    'u_name'=>$result->name,
                    'u_email'=>$result->email
                );
                $this->session->set_userdata($newdata);
                redirect(site_url());
               echo json_encode(array('status' => 1, 'message' => 'Login successfully'));die;
            } else {
                  redirect(site_url('web_panel/Login'));
           
                echo json_encode(array('status' => 0, 'message' => 'Please Enter Correct Email/Mobile and Password'));die;
            }
        }
         $this->load->view('login');
    }


    public function logout() {
        $this->session->sess_destroy();
        // delete_cookie('remember_me');
        redirect(site_url('web_panel/Home'));
    }

}

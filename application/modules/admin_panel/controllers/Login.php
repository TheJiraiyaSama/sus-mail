<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation', 'uploads');
        $this->load->helper('custom');
    }

    public function index() {
        if ($this->session->userdata('active_admin_data')) {
            redirect(site_url('admin_panel/admin/index'));
            die;
        }
        if ($this->input->post()) {
            $input = $this->input->post();
            $this->db->Where("email", $input['email']);
            $this->db->Where("password", md5($input['password']));
            $this->db->Where("user_type", 2);
            $this->db->where('status',1);
            $result = $this->db->get('users')->row();
            //echo $this->db->last_query();die;;
            if ($result){
                //pre($result);die;
                $newdata = array(
                    'active_admin_flag' => True,
                    'active_admin_id' => $result->id,
                    'active_admin_data' => $result,
                    'admin_name'=>$result->name,
                    'admin_email'=>$result->email
                );
                $this->session->set_userdata($newdata);
                //die('sdf');
                redirect(site_url('admin_panel/admin/index'));
                die;
            }else{
                $this->db->Where("email", $input['email']);
                $result = $this->db->get('users')->row();
                if($result){
                    if($result->password != md5($input['password'])){
                        echo '<script>alert("Enter Valid Password..!");</script>';
                    }else if($result->user_type != 2){
                        echo '<script>alert("Enter Valid Details..!");</script>';
                    }else if($result->status == 0){
                        echo '<script>alert("Your Account is pending for activation..!");</script>';
                    }else if($result->status == 2){
                        echo '<script>alert("Your Account is Blocked..!");</script>';
                    }else if($result->status == 3){
                        echo '<script>alert("Your Account is Deleted..!");</script>';
                    }else{
                        echo '<script>alert("Enter Valid Email..!");</script>';
                    }
                }
            }
        }
        //$this->load->view('tutor_panel/login/login');
        $this->load->view('login/login');
    }

    public function create_link(){
        $input = $this->input->post('email');
        if($input){
            $this->db->where('user_type',2);
            $this->db->where('email',$input);
            $result = $this->db->get('users')->row_Array();
            if($result){
                echo json_encode(array('name'=>'success','message'=>site_url('admin_panel/login/create_password?token='.base64_encode($result['id']))));
                die;
            }
        }
        echo json_encode(array('name'=>'p_email','message'=>'Enter Valid Email'));
    }
    
    public function create_password(){
        $input = $this->input->post();
        if($input){
            $this->db->where('id',$input['id']);
            $result = $this->db->get('users')->row_array();
            if($result){
                if(md5($input['password'])==$result['password']){
                    echo json_encode(array("status"=>'success',"message"=>'password has been changed..!'));
                    die;
                }
            }
            $this->db->where('id',$input['id']);
            $this->db->update('users',array('password'=> md5($input['password'])));
            $r = $this->db->affected_rows();
            if($r>0){
                echo json_encode(array("status"=>'success',"message"=>'password has been changed..!'));
            }else{
                echo json_encode(array("status"=>'failed'));
            }
            die;
        }
        $this->load->view('login/forgot_password');
    }

    public function forgot_password() {
    $input = $this->input->post();
    if ($input) {
        if ($input['type'] == 1) {
            unset($input['type']);
            $this->db->where('user_type', 2);
            $this->db->where('email', $input['email']);
            $r = $this->db->get('users')->row_array();
            if ($r) {
                echo json_encode(array('status' => 1));
                die;
            }
            echo json_encode(array('status' => 2, 'message' => 'Email Does not exist'));
            die;
        } else if ($input['type'] == 2) {
            unset($input['type']);
            echo json_encode(array('status' => 1));
            die;
        } else {
            unset($input['type']);
            if ($input['pass'] != $input['c_pass']) {
                echo json_encode(array('status' => 2, 'message' => 'Password Does not match'));
                die;
            } else {
                $this->db->where('email', $input['email']);
                $this->db->update('users', array('password' => md5($input['pass'])));
                echo json_encode(array('status' => 1));
                die;
            }
        }
    }
    $this->load->view('login/forgot_password');
}

    public function logout() {
        $this->session->sess_destroy();
        redirect(site_url('admin_panel/login/index'));
        //redirect(site_url('tutor_panel/login/index'));
    }
}

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        modules::run('admin_panel/admin_panel_ini/admin_ini');
        $this->load->helper('custom');
        $this->load->helper('array');
        $this->load->model('Login_model');
    }

    public function ajax_is_email_exist() {
        $input = $this->input->post();
        if ($input) {
            $this->db->where('email', $input['email']);
            $result = $this->db->get('users')->row_array();
            if ($result) {
                echo json_encode(array('status' => FALSE, 'message' => 'Email Already exist'));
                die;
            }
            echo json_encode(array('status' => TRUE, 'message' => ''));
            die;
        }
        echo json_encode(array('status' => TRUE, 'message' => ''));
        die;
    }

    public function ajax_is_mobile_exist() {
        $input = $this->input->post();
        if ($input) {
            $this->db->where('mobile', $input['mobile']);
            $result = $this->db->get('users')->row_array();
            //print_r($result);die;
            if ($result) {
                echo json_encode(array('status' => FALSE, 'message' => 'Mobile No Already exist'));
                die;
            }
            echo json_encode(array('status' => TRUE, 'message' => ''));
            die;
        }
        echo json_encode(array('status' => TRUE, 'message' => ''));
        die;
    }

    public function update_profile() {
        $user_data = $this->session->userdata('active_admin_id');
        $input = $this->input->post();
        if (isset($input['image_submit'])) {
            $input['modified'] = time();
            $file_name = $_FILES['choseprofilepic']['name'];
            $path = base_url().'uploads/profile/'.$file_name;
            //echo $path.'<br>';
            if(move_uploaded_file($_FILES['choseprofilepic']['name'], $path)){
                echo 'Uploaded'.'<br>';
            }else{
                echo 'not uploaded'.'<br>';
            }
            
        } else if ($input) {
            $input['modified'] = time();
            $this->db->where('id', $user_data);
            $this->db->update('users', $input);
        }//echo 'dfertg';die;
        $view_data['result'] = $this->db->get_where('users', array('id' => $user_data))->row_array();
        $view_data['tab'] = 'setting';
        $view_data['page'] = "update profile";
        $data['page_data'] = $this->load->view('login/update_profile', $view_data, TRUE);
        echo modules::run('admin_panel/template/call_default_template', $data);
        die;
    }

    public function change_password() {
        $input = $this->input->post();
        if ($input) {
            $user_data = $this->session->userdata('active_admin_id');
            $input = $this->input->post();
            //print_r($user_data);die;
            if ($input) {
                if ($input['new_pass'] != $input['c_pass']) {
                    echo json_encode(array('status' => FALSE, 'message' => 'Password does not match'));
                    die;
                } else {
                    $this->db->where('id', $user_data);
                    $this->db->update('users', array('password' => md5($input['new_pass'])));
                    echo json_encode(array('status' => TRUE, 'message' => 'Password Changed'));
                    die;
                }
            }
            echo json_encode(array('status' => FALSE, 'message' => 'Enter valid Input'));
            die;
        }
        $view_data['tab'] = 'profile';
        $view_data['page'] = "change password";
        $data['page_data'] = $this->load->view('login/change_password', $view_data, TRUE);
        echo modules::run('admin_panel/template/call_default_template', $data);
        die;
    }
}

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        modules::run('admin_panel/admin_panel_ini/admin_ini');
        $this->load->helper('custom');
        $this->load->helper('array');
        $this->load->model('Users_model');   
    }
    
    public function users_list(){
        $view_data['tab'] = "users";
        //$view_data['page'] = "user list";
        $data['page_data'] = $this->load->view('users/users',$view_data, TRUE);
        echo modules::run('admin_panel/template/call_default_template', $data);
    }
    
    public function ajax_users_list(){
        $this->Users_model->ajax_users_list();
    }
    
    public function ajax_block_user(){
        $input = $this->input->post();
        $this->db->where('id',$input['id']);
        $this->db->update('apply_franchise',$input);
        //print_r($input);die;
        echo "success";
    }
    
    
       public function franchise_list(){
        $view_data = [];
        //$view_data['page'] = "user list";
        $data['page_data'] = $this->load->view('users/franchise_list',$view_data, TRUE);
        echo modules::run('admin_panel/template/call_default_template', $data);
    }
    
        public function career_list(){
        $view_data = [];
        //$view_data['page'] = "user list";
        $data['page_data'] = $this->load->view('users/carrer_list',$view_data, TRUE);
        echo modules::run('admin_panel/template/call_default_template', $data);
    }
    
       public function ajax_career_list(){
        $this->Users_model->ajax_career_list();
    }
    
    public function ajax_block_career(){
        $input = $this->input->post();
        $this->db->where('id',$input['id']);
        $this->db->update('apply_franchise',$input);
        //print_r($input);die;
        echo "success";
    }
    
}
?>
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends MX_Controller {

    function __construct() {//die('dsf');
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        modules::run('admin_panel/admin_panel_ini/admin_ini');
        $this->load->helper('custom');
        $this->load->helper('array');
        $this->load->helper('compress');
        $this->load->database();
        $this->load->model("Service_model");
    }

    public function add_service() {
        $this->Service_model->add_service();
    }

    public function list_service() {
        $view_data['tab'] = "service";
        $view_data['page'] = "list service";
        $this->db->where('status',1);
        $view_data['regions'] = $this->db->get('region')->result_array();
        $data['page_data'] = $this->load->view('admin_panel/service/list_service', $view_data, TRUE);
        echo modules::run('admin_panel/template/call_default_template', $data);
    }

    public function ajax_services_list() {
        $this->Service_model->ajax_service_list();
    }

    public function ajax_block_service() {
        $input = $this->input->post();
        if ($input) {
            $this->db->where('id', $input['id']);
            $this->db->update('master_services', $input);
            echo 1;
        }
    }

    public function ajax_delete_service() {
        $input = $this->input->post();
        if ($input) {
            $this->db->where('id', $input['id']);
            $this->db->update('master_services', $input);
            echo 1;
        }
    }
    
    public function add_sub_service() {
        $this->Service_model->add_sub_service();
    }

    public function list_sub_service() {
        $view_data['tab'] = "service";
        $view_data['page'] = "list sub service";
        $data['page_data'] = $this->load->view('admin_panel/service/list_sub_service', $view_data, TRUE);
        echo modules::run('admin_panel/template/call_default_template', $data);
    }

    public function ajax_sub_services_list() {
        $this->Service_model->ajax_sub_service_list();
    }

    public function ajax_block_sub_service() {
        $input = $this->input->post();
        if ($input) {
            $this->db->where('id', $input['id']);
            $this->db->update('master_sub_services', $input);
            echo 1;
        }
    }

    public function ajax_delete_sub_service() {
        $input = $this->input->post();
        if ($input) {
            $this->db->where('id', $input['id']);
            $this->db->update('master_sub_services', $input);
            echo 1;
        }
    }
}
?>

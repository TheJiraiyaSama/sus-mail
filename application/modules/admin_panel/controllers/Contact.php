<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends MX_Controller {

    function __construct() {//die('dsf');
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        modules::run('admin_panel/admin_panel_ini/admin_ini');
        $this->load->helper('custom');
        $this->load->helper('array');
        $this->load->model('Contact_model');
        $this->load->database();
    }

    public function add_contact() {
        $this->Contact_model->add_contact();
    }

    public function list_contact() {
        $view_data['tab'] = "contactus";
        $view_data['page'] = "list contactus";
        $data['page_data'] = $this->load->view('admin_panel/contact/list_contact', $view_data, TRUE);
        echo modules::run('admin_panel/template/call_default_template', $data);
    }

    public function ajax_contact_list() {
        $this->Contact_model->ajax_contact_list();
    }

    public function ajax_block_contact() {
        $input = $this->input->post();
        if ($input) {
            $this->db->where('id', $input['id']);
            $this->db->update('master_address', $input);
            echo 1;
        }
    }

    public function ajax_delete_contact() {
        $input = $this->input->post();
        if ($input) {
            $this->db->where('id', $input['id']);
            $this->db->delete('master_address', $input);
            echo 1;
        }
    }
}
?>

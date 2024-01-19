<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MX_Controller {

    function __construct() {
        parent::__construct();
        /* !!!!!! Warning !!!!!!!11
         *  admin panel initialization
         *  do not over-right or remove auth_panel/auth_panel_ini/auth_ini
         */
        $this->load->helper('aul');
        modules::run('admin_panel/Admin_panel_ini/admin_ini');
        $this->load->library('form_validation', 'uploads');
        $this->load->helper('custom');
        $this->load->model('Admin_model');
    }

    public function index($id = '') {
        //$user_id = $this->session->userdata('active_admin_id');
        $view_data = $this->Admin_model->index();
        $view_data['tab'] = 'dashboard';
        $data['page_data'] = $this->load->view('admin/WELCOME_PAGE_SUPER_USER', $view_data, TRUE);
        $data['page_title'] = "welcome page";
        echo modules::run('admin_panel/template/call_default_template', $data);
    }
}

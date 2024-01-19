<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Configuration extends MX_Controller {

    function __construct() {//die('dsf');
        parent::__construct();
        modules::run('admin_panel/admin_panel_ini/admin_ini');
        $this->load->model('Configuration_model');
        $this->load->helper('custom');
    }

    public function add_configuration() {
        $input = $this->input->post();
     //   pre($input);
        $view_data['result'] = $this->Configuration_model->add_configuration($input);
//        pre($view_data);die;
        $view_data['tab'] = "configuration";
        $data['page_data'] = $this->load->view('configuration/add_configuration', $view_data, TRUE);
        echo modules::run('admin_panel/template/call_default_template', $data);
    }
}
?>

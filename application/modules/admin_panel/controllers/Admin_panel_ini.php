<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_panel_ini extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('template');
    }

    public function admin_ini() {
        /* default template path */
        if (!defined('ADMIN_TEMPLATE')) {
            define("ADMIN_TEMPLATE", "admin_panel/template/");
        }

        /* default template conatant name  */
        if (!defined('ADMIN_DEFAULT_TEMPLATE')) {
            define("ADMIN_DEFAULT_TEMPLATE", "admin_panel/template/call_default_template");
        }

        /* default auth panel assets path  */
        if (!defined('ADMIN_PANEL_URL')) {
            define("ADMIN_PANEL_URL", base_url() . 'index.php/admin_panel/');
        }

        /* default auth files assets path */
        if (!defined('ADMIN_ASSETS')) {
            define("ADMIN_ASSETS", base_url() . "auth_panel_assets/");
        }

        $active_backend_user_flag = $this->session->userdata('active_admin_flag');
        $active_backend_user_id = $this->session->userdata('active_admin_id');

        /* if ajax request and session is not set
          if ($this->input->is_ajax_request() && $active_backend_user_flag != True ){
          echo json_encode(array('status'=>false,'error_code'=>10001,'message'=>'Authentication Failure'));
          die;
          }
         */

        if (!$this->input->is_ajax_request() && $active_backend_user_flag != True) {
            redirect(site_url('admin_panel/login/index'));
            die;
        }


        if (!defined('ADMIN_PANEL_URL')) {
            define("ADMIN_PANEL_URL", base_url() . 'index.php/admin_panel/');
        }
    }

    public function not_authorize() {
        modules::run('admin_panel/auth_panel_ini/auth_ini');
        $data['page_data'] = $this->load->view('template/not_authorize', array(), TRUE);
        echo modules::run(ADMIN_DEFAULT_TEMPLATE, $data);
    }

}

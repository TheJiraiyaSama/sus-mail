<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mail extends MX_Controller {

    function __construct() {//die('dsf');
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        modules::run('admin_panel/admin_panel_ini/admin_ini');
        $this->load->helper('custom');
        $this->load->helper('array');
        $this->load->helper('mail');
        $this->load->model('Mail_model');
        $this->load->database();
    }

    function testing() {
        send_mail_smtp();
    }

    public function index() {
        $this->Mail_model->index();
    }

    public function list_mail() {
        $view_data['tab'] = "send mail tab";
        $view_data['page'] = "list mail";
        $data['page_data'] = $this->load->view('admin_panel/mail/list_mail', $view_data, TRUE);
        echo modules::run('admin_panel/template/call_default_template', $data);
    }

    public function ajax_mail_list() {
        $this->Mail_model->ajax_mail_list();
    }

}

?>

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class News extends MX_Controller {

    function __construct() {//die('dsf');
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        modules::run('admin_panel/admin_panel_ini/admin_ini');
        $this->load->helper('custom');
        $this->load->helper('compress');
        $this->load->model('News_model');
        $this->load->database();
    }

    public function add_news() {
        $this->News_model->add_news();
    }

    public function list_news() {
        $view_data['tab'] = "news";
        $view_data['page'] = "list news";
        $data['page_data'] = $this->load->view('admin_panel/news/list_news', $view_data, TRUE);
        echo modules::run('admin_panel/template/call_default_template', $data);
    }

    public function ajax_news_list() {
        $this->News_model->ajax_news_list();
    }

    public function ajax_block_news() {
        $input = $this->input->post();
        if ($input) {
            $this->db->where('id', $input['id']);
            $this->db->update('master_news', $input);
            echo 1;
        }
    }

    public function ajax_delete_news() {
        $input = $this->input->post();
        if ($input) {
            $this->db->where('id', $input['id']);
            $this->db->update('master_news', $input);
            echo 1;
        }
    }
}
?>

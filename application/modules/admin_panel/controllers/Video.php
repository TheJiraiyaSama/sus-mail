<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends MX_Controller {

    function __construct() {//die('dsf');
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        modules::run('admin_panel/admin_panel_ini/admin_ini');
        $this->load->helper('custom');
        $this->load->helper('array');
        $this->load->model('Video_model');
        $this->load->database();
    }

    public function add_video() {
        $this->Video_model->add_video();
    }

    public function list_video() {
        $view_data['tab'] = "video";
        $view_data['page'] = "list video";
        $data['page_data'] = $this->load->view('admin_panel/video/list_video', $view_data, TRUE);
        echo modules::run('admin_panel/template/call_default_template', $data);
    }

    public function ajax_video_list() {
        $this->Video_model->ajax_video_list();
    }

    public function ajax_block_video() {
        $input = $this->input->post();
        if ($input) {
            $this->db->where('id', $input['id']);
            $this->db->update('master_video', $input);
            echo 1;
        }
    }

    public function ajax_delete_video() {
        $input = $this->input->post();
        if ($input) {
            $this->db->where('id', $input['id']);
            $this->db->delete('master_video', $input);
            echo 1;
        }
    }
}
?>

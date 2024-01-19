<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends MX_Controller {

    function __construct() {//die('dsf');
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        modules::run('admin_panel/admin_panel_ini/admin_ini');
        $this->load->helper('custom');
        $this->load->helper('array');
        $this->load->helper('compress');
        $this->load->database();
    }

    public function index() {
        $input = $this->input->post();
        if ($input) {
            $ext = explode(".", $_FILES["image"]["name"]);
            $ext = end($ext);
            $filename = time() . "." . $ext;
            $file_path = getcwd() . '/uploads/gallery/' . $filename;
            move_uploaded_file($_FILES['image']["tmp_name"], $file_path);
            $input['image'] = $filename;
            if($input['type']==1){
                $input['yt_url'] = $name = Upload("yt_url", getcwd() . '/uploads/gallery/videos/', time(), TRUE, getcwd() . '/uploads/gallery/videos/', 680, 370);
                }
            $input['created'] = time();
            //print_r($input);die;
            $this->db->insert('gallery', $input);
            page_alert_box('success', 'New Member Added', 'Member has been added successfully');
        }
        $view_data['tab'] = "gallery";
        $view_data['page'] = "";
        $view_data['results'] = $this->db->get('gallery')->result_array();
        $data['page_data'] = $this->load->view('gallery/gallery', $view_data, TRUE);
        echo modules::run('admin_panel/template/call_default_template', $data);
    }

    public function ajax_delete() {
        $input = $this->input->post();
        if ($input) {
            $this->db->where('id', $input['id']);
            $image = $this->db->get('gallery')->row()->image;
            $image = getcwd() . '\uploads\gallery\\' . $image;
            if (file_exists($image)) {
                unlink($image);
            }
            $this->db->where('id', $input['id']);
            $this->db->delete('gallery');
            echo json_encode(array("data" => 1));
        }
    }

}

?>

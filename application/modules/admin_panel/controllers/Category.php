<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MX_Controller {

    function __construct() {//die('dsf');
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        modules::run('admin_panel/admin_panel_ini/admin_ini');
        $this->load->helper('custom');
        $this->load->helper('array');
        $this->load->helper('compress');
        $this->load->database();
        $this->load->model("Category_model");
    }
  public function add_category() {
      
        $this->Category_model->add_category();
    }

    public function list_category() {
        $view_data['tab'] = "category";
        $view_data['page'] = "list category";
        $this->db->where('status',1);
        $data['page_data'] = $this->load->view('admin_panel/category/list_category', $view_data, TRUE);
        echo modules::run('admin_panel/template/call_default_template', $data);
    }

    public function ajax_categorys_list() {
        $this->Category_model->ajax_category_list();
    }

    public function ajax_block_category() {
        $input = $this->input->post();
        if ($input) {
            $this->db->where('id', $input['id']);
            $this->db->update('master_category', $input);
            echo 1;
        }
    }

    public function ajax_delete_category() {
        $input = $this->input->post();
        if ($input) {
            $this->db->where('id', $input['id']);
            $this->db->update('master_category', $input);
            echo 1;
        }
    }
    
    public function add_sub_category() {
        $this->Category_model->add_sub_category();
    }

    public function list_sub_category() {
        $view_data['tab'] = "category";
        $view_data['page'] = "list sub category";
        $data['page_data'] = $this->load->view('admin_panel/category/list_sub_category', $view_data, TRUE);
        echo modules::run('admin_panel/template/call_default_template', $data);
    }

    public function ajax_sub_categorys_list() {
        $this->Category_model->ajax_sub_category_list();
    }

    public function ajax_block_sub_category() {
        $input = $this->input->post();
        if ($input) {
            $this->db->where('id', $input['id']);
            $this->db->update('master_sub_category', $input);
            echo 1;
        }
    }

    public function ajax_delete_sub_category() {
        $input = $this->input->post();
        if ($input) {
            $this->db->where('id', $input['id']);
            $this->db->update('master_sub_category', $input);
            echo 1;
        }
    }
    
    public function add_sub_sub_category() {
        $this->Category_model->add_sub_sub_category();
    }

    public function list_sub_sub_category() {
        $view_data['tab'] = "category";
        $view_data['page'] = "list sub sub category";
        $data['page_data'] = $this->load->view('admin_panel/category/list_sub_sub_category', $view_data, TRUE);
        echo modules::run('admin_panel/template/call_default_template', $data);
    }

    public function ajax_sub_sub_categorys_list() {
        $this->Category_model->ajax_sub_sub_category_list();
    }

    public function ajax_block_sub_sub_category() {
        $input = $this->input->post();
        if ($input) {
            $this->db->where('id', $input['id']);
            $this->db->update('master_sub_sub_category', $input);
            echo 1;
        }
    }

    public function ajax_delete_sub_sub_category() {
        $input = $this->input->post();
        if ($input) {
            $this->db->where('id', $input['id']);
            $this->db->update('master_sub_sub_category', $input);
            echo 1;
        }
    }
  public function ajax_get_master_list() {
        $this->db->order_by('id', 'ASC');
        $this->db->where('master_services_id', $this->input->post('master_menu_id'));
        $subcat = $this->db->get('master_sub_category')->result_array();
        echo '<option value="0">Select Sub Category</option>';
        if ($subcat) {
            foreach ($subcat as $s_cat) {
                echo '<option value="' . $s_cat['id'] . '">' . $s_cat['title'] . '</option>';
            }
        }
      }
    
}
?>

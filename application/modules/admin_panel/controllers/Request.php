<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Request extends MX_Controller {

    function __construct() {//die('dsf');
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        modules::run('admin_panel/admin_panel_ini/admin_ini');
        $this->load->helper('custom');
        $this->load->helper('mail');
        $this->load->model('Request_model');
        $this->load->database();
    }

    public function index() {
        $this->Request_model->index();
    }

    public function ajax_request_list() {
        $this->Request_model->ajax_request_list();
    }

    public function view() {
        $input = $this->input->post();
        if (isset($_GET['id'])) {
            $this->db->where("request_for_buy.id", $_GET['id']);
            $this->db->select("users.name as name,users.email as email,request_for_buy.mobile as mobile,region.name as region,request_for_buy.service_start_date as start_date,service_mode,mode_description,requirement_type,requirement_details,request_for_buy.created as request_date,request_for_buy.modified as modified,price,request_for_buy.status as status");
            $this->db->join('region', 'region.id=request_for_buy.region');
            $this->db->join('master_sub_services', 'master_sub_services.id=request_for_buy.sub_service_id');
            $this->db->join('users', 'users.id=request_for_buy.user_id');
            $view_data['result'] = $this->db->get("request_for_buy")->row_array();
            //echo $this->db->last_query();die;
        }
        if ($input) {
            
        }
        $view_data['tab'] = "request";
        //$view_data['page'] = "list news";
        $data['page_data'] = $this->load->view('admin_panel/request/view_request', $view_data, TRUE);
        echo modules::run('admin_panel/template/call_default_template', $data);
    }

    public function ajax_process_request() {
        $input = $this->input->post();
        if ($input) {
            $input['modified'] = time();
            $this->db->where('id', $input['id']);
            $this->db->update('request_for_buy', $input);
            echo 1;
        }
    }

    public function accept_service_request() {
        $input = $this->input->post();
        if ($input) {
            $input['modified'] = time();
            $input['status'] = 2;
            $this->db->where('id', $input['id']);
            $this->db->update('request_for_buy', $input);
            $this->db->select('request_for_buy.id,users.name,users.email,request_for_buy.price');
            $this->db->join('users', 'users.id=request_for_buy.user_id');
            $request_detail = $this->db->get('request_for_buy')->row_array();
            print_r($request_detail);

            $mail_detail = array(
                'to_mail' => $request_detail['email'],
                'subject' => 'Buy Service',
                'message' => '<a href="'.base_url('index.php/web_panel/paypal/index/'). base64_encode(base64_encode($input['id'].SALT)).'">View Link</a>',
            );

            send_mail_smtp($mail_detail);
        }
        redirect('admin_panel/request/index');
    }

}

?>

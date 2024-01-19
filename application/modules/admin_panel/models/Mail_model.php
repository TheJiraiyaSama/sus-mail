<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mail_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function index() {
     $input = $this->input->post();
     if (isset($_GET['id'])) {
            $this->db->where('id', $_GET['id']);
            $view_data['result'] = $this->db->get('mail_to_users')->row_array();
        }
        if ($input) {
            $data = "";
            if ($input['users'][0] == "") {
                unset($input['users'][0]);
            }
            foreach ($input['users'] as $key => $user) {
                if ($key == 0) {
                    $data = $user;
                } else {
                    $data = $data . "," . $user;
                }
                $this->db->select('email');
                $this->db->where('id', $user);
                $email = $this->db->get('users')->row()->email;
                send_mail_smtp(array('to_mail' => $email, 'subject' => $input['subject'], 'message' => $input['message']));
            }
            unset($input['users']);
            $input['users_id'] = $data;
            $input['created'] = time();
            $this->db->insert('mail_to_users', $input);
            page_alert_box('success', 'New Send Mail Added', 'Send Mail has been added successfully');
            redirect('admin_panel/Mail/list_mail');
        }
        $this->db->select('id,name,email');
        $view_data['users'] = $this->db->get('users')->result_array();
        $view_data['tab'] = "send mail tab";
        $view_data['page'] = "send mail";
        $data['page_data'] = $this->load->view('mail/send_mail', $view_data, TRUE);
        echo modules::run('admin_panel/template/call_default_template', $data);
    }

    function ajax_mail_list(){
        $requestData = $_REQUEST;
        $columns = array(
            0 => 'id',
            1 => 'to',
            2 => 'from',
            3 => 'subject',
            4 => 'message',
            5 => 'created'
        );
        $query = "SELECT count(id) as total FROM mail_to_users";
        $query = $this->db->query($query);
        $query = $query->row_array();
        $totalData = (count($query) > 0) ? $query['total'] : 0;
        $totalFiltered = $totalData;
   //   print_r($totalFiltered);
        $sql = "SELECT * FROM mail_to_users where 1";
       if (!empty($requestData['columns'][1]['search']['value'])) {   //name
            $sql .= " AND to LIKE'" . $requestData['columns'][1]['search']['value'] . "%' ";
        }
        if (!empty($requestData['columns'][2]['search']['value'])) {   //name
            $sql .= " AND from LIKE'" . $requestData['columns'][2]['search']['value'] . "%' ";
        }
        $sql .= " order by " . $columns[$requestData['order'][0]['column']] . " " . $requestData['order'][0]['dir'] . " limit " . $requestData['start'] . " , " . $requestData['length'];
        $result = $this->db->query($sql)->result();
        $data = array();
        $i = $requestData['start'];
        foreach ($result as $r) {  // preparing an array
            $i++;
            $nestedData = array();
            $nestedData[] = $i;
            $nestedData[] = $r->to;
            $nestedData[] = $r->from;
            $nestedData[] = $r->subject;
            $nestedData[] = $r->message;
            $nestedData[] = date("H:i:s A, m/d/Y", $r->created);
            $nestedData[] = "<a href='javascript:void(0)'><button class='btn btn-xs btn-info'><i class='fa fa-eye'</i></button></a>";
            $data[] = $nestedData;
        }
        $json_data = array(
            "draw" => intval($requestData['draw']), // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.
            "recordsTotal" => intval($totalData), // total number of records
            "recordsFiltered" => intval($totalFiltered), // total number of records after searching, if there is no searching then totalFiltered = totalData
            "data" => $data   // total data array
        );

        echo json_encode($json_data);  // send data as json format
    }
}

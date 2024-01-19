<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends MX_Controller {

    function __construct() {//die('dsf');
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        modules::run('admin_panel/admin_panel_ini/admin_ini');
        $this->load->helper('custom');
        $this->load->helper('array');
        $this->load->database();
    }

    public function faq() {
        $view_data['tab'] = "faq";
        //$view_data['page'] = "list support";
        $data['page_data'] = $this->load->view('admin_panel/faq/faq', $view_data, TRUE);
        echo modules::run('admin_panel/template/call_default_template', $data);
    }

    public function ajax_faq_list() {
        $requestData = $_REQUEST;
        $columns = array(
            0 => 'id',
            1 => 'name',
            2 => 'email',
            3 => 'subject',
            4 => 'comment'
        );
        $query = "SELECT count(id) as total FROM master_contact where type!=0";
        $query = $this->db->query($query);
        $query = $query->row_array();
        $totalData = (count($query) > 0) ? $query['total'] : 0;
        $totalFiltered = $totalData;

        $sql = "SELECT * FROM master_contact where type!=0 ";
        if (!empty($requestData['columns'][1]['search']['value'])) {   //name
            $sql .= " AND name LIKE'" . $requestData['columns'][1]['search']['value'] . "%' ";
        }
        if (!empty($requestData['columns'][2]['search']['value'])) {   //name
            $sql .= " AND email LIKE'" . $requestData['columns'][2]['search']['value'] . "%' ";
        }
        if (!empty($requestData['columns'][3]['search']['value'])) {   //name
            $sql .= " AND status ='" . $requestData['columns'][3]['search']['value'] . "' ";
        }else{
            $sql .= " and status!=2"; 
        }
        $sql .= " order by " . $columns[$requestData['order'][0]['column']] . " " . $requestData['order'][0]['dir'] . ", status asc limit ".$requestData['start']." , ".$requestData['length'];
        $result = $this->db->query($sql)->result();
        $data = array();
        $i = $requestData['start'];
        foreach ($result as $r) {  // preparing an array
            $i++;
            $nestedData = array();
            $nestedData[] = $i;
            $nestedData[] = $r->name;
            $nestedData[] = $r->email;
            $nestedData[] = $r->subject;
            $nestedData[] = $r->comment;
            if ($r->status == 1) {
                $nestedData[] = "Open";
                $nestedData[] = "</button> &nbsp; <button  class='btn-xs bold btn btn-warning' id='$r->id' onclick='pending_faq(this.id)'>Hold</button>"
                        . "     <button class='btn-xs bold btn btn-success' id='d$r->id' onclick='resolve_faq(this.id)'>Resolve</button>";
            } else if ($r->status == 3){
                $nestedData[] = "On Hold";
                $nestedData[] = "<button class='btn-xs bold btn btn-success' id='d$r->id' onclick='resolve_faq(this.id)'>Resolve</button>";
            }else{
                $nestedData[] = "Closed";
                $nestedData[] = "<button class='btn btn-xs btn-danger' disabled>Resolved</span>";
            }
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

    public function ajax_pending_faq() {
        $input = $this->input->post();
        if ($input) {
            $this->db->where('id', $input['id']);
            $this->db->update('master_contact', $input);
            echo 1;
        }
    }

    public function ajax_resolve_faq() {
        $input = $this->input->post();
        if ($input) {
            $this->db->where('id', $input['id']);
            $this->db->update('master_contact', $input);
            echo 1;
        }
    }
}
?>

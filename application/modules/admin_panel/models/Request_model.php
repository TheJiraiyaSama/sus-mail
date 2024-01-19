<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Request_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $view_data['tab'] = "request";
        //$view_data['page'] = "list news";
        $this->db->where('status!=', 3);
        $this->db->where('id!=', 1);
        $view_data['regions'] = $this->db->get('region')->result_array();
        $data['page_data'] = $this->load->view('admin_panel/request/list_request', $view_data, TRUE);
        echo modules::run('admin_panel/template/call_default_template', $data);
    }

    function ajax_request_list() {
        $requestData = $_REQUEST;
        $columns = array(
            0 => 'request_for_buy.id',
            1 => 'users.name',
            2 => 'users.email',
            3 => 'users.mobile',
            4 => 'master_sub_services.title',
            5 => 'region.name',
            6 => 'request_for_buy.created',
            7 => 'request_for_buy.modified'
        );
        $query = "SELECT count(id) as total FROM request_for_buy";
        $query = $this->db->query($query);
        $query = $query->row_array();
        $totalData = (count($query) > 0) ? $query['total'] : 0;
        $totalFiltered = $totalData;

        $sql = "SELECT * FROM request_for_buy join users on users.id=request_for_buy.user_id join master_sub_services on master_sub_services.id=request_for_buy.sub_service_id where 1";
        if (!empty($requestData['columns'][1]['search']['value'])) {   //name
            $sql .= " AND users.name LIKE'" . $requestData['columns'][1]['search']['value'] . "%' ";
        }
        if (!empty($requestData['columns'][2]['search']['value'])) {   //name
            $sql .= " AND users.email LIKE'" . $requestData['columns'][2]['search']['value'] . "%' ";
        }
        if (!empty($requestData['columns'][3]['search']['value'])) {   //name
            $sql .= " AND master_sub_services.title LIKE'" . $requestData['columns'][3]['search']['value'] . "%' ";
        }
        if (!empty($requestData['columns'][4]['search']['value'])) {   //name
            $sql .= " AND request_for_buy.status ='" . $requestData['columns'][4]['search']['value'] . "' ";
        } else {
            $sql .= " and request_for_buy.status!=2  and request_for_buy.status != 4";
        }
        if (!empty($requestData['columns'][5]['search']['value'])) {   //name
            $sql .= " AND request_for_buy.region LIKE'" . $requestData['columns'][5]['search']['value'] . "%' ";
        }
        if (!empty($requestData['columns'][6]['search']['value'])) {   //name
            $sql .= " AND request_for_buy.mobile LIKE'" . $requestData['columns'][6]['search']['value'] . "%' ";
        }
        $query = $this->db->query($sql)->result();
        $totalFiltered = count($query); // when there is a search parameter then we have to modify total number filtered rows as per search result.

        $sql = "SELECT request_for_buy.id as id,region.name as region , users.name as name,users.email as email,request_for_buy.mobile as mobile, master_sub_services.title as title,request_for_buy.created as created,request_for_buy.modified as modified, request_for_buy.status as status "
                . "FROM request_for_buy "
                . "join users on users.id=request_for_buy.user_id "
                . "join master_sub_services on request_for_buy.sub_service_id=master_sub_services.id "
                . "join region on region.id=request_for_buy.region where 1 ";
        if (!empty($requestData['columns'][1]['search']['value'])) {   //name
            $sql .= " AND users.name LIKE'" . $requestData['columns'][1]['search']['value'] . "%' ";
        }
        if (!empty($requestData['columns'][2]['search']['value'])) {   //name
            $sql .= " AND users.email LIKE'" . $requestData['columns'][2]['search']['value'] . "%' ";
        }
        if (!empty($requestData['columns'][3]['search']['value'])) {   //name
            $sql .= " AND master_sub_services.title LIKE'" . $requestData['columns'][3]['search']['value'] . "%' ";
        }
        if (!empty($requestData['columns'][4]['search']['value'])) {   //name
            $sql .= " AND request_for_buy.status ='" . $requestData['columns'][4]['search']['value'] . "' ";
        } else {
            $sql .= " and request_for_buy.status != 2 and request_for_buy.status != 4";
        }
        if (!empty($requestData['columns'][5]['search']['value'])) {   //name
            $sql .= " AND request_for_buy.region ='" . $requestData['columns'][5]['search']['value'] . "' ";
        }
        if (!empty($requestData['columns'][6]['search']['value'])) {   //name
            $sql .= " AND request_for_buy.mobile LIKE'" . $requestData['columns'][6]['search']['value'] . "%' ";
        }
        $sql .= " order by " . $columns[$requestData['order'][0]['column']] . " " . $requestData['order'][0]['dir'] . ", request_for_buy.status asc limit " . $requestData['start'] . " , " . $requestData['length'];
        $result = $this->db->query($sql)->result();
        //echo $this->db->last_query();die;
        $data = array();
        $i = $requestData['start'];
        foreach ($result as $r) {  // preparing an array
            $i++;
            $nestedData = array();
            $nestedData[] = $i;
            $nestedData[] = $r->name;
            $nestedData[] = $r->email;
            $nestedData[] = $r->mobile;
            $nestedData[] = $r->title;
            $nestedData[] = $r->region;
            $nestedData[] = date("d/M/Y", $r->created);
            if ($r->modified == 0) {
                $nestedData[] = "";
            } else {
                $nestedData[] = date("d/M/Y", $r->modified);
            }
            if ($r->status == 1) {
                $nestedData[] = "<span style='color:green'>Request</span>";
                $nestedData[] = "<a href='" . ADMIN_PANEL_URL . "request/view?id=$r->id'><button  class='btn-xs bold btn btn-success'>View</button></a>"
                        . " <button  class='btn-xs bold btn btn-warning' id='$r->id' onclick='pending_request(this.id)'>On Hold</button>"
                        . " <button class='btn-xs bold btn btn-danger' id='r$r->id' onclick='reject_request(this.id)'>Reject</button>";
            } else if ($r->status == 2) {
                $nestedData[] = "<span style='color:green'>Accepted</span>";
                $nestedData[] = "<a href='" . ADMIN_PANEL_URL . "request/view?id=$r->id'><button  class='btn-xs bold btn btn-success'>View</button></a>&nbsp;<button class='btn-xs bold btn btn-danger' disabled=''>Accepted</button>";
            } else if ($r->status == 3) {
                $nestedData[] = "<span style='color:#d58512'>On Hold</span>";
                $nestedData[] = "<a href='" . ADMIN_PANEL_URL . "request/view?id=$r->id'><button  class='btn-xs bold btn btn-success'>View</button></a> "
                        . "&nbsp;<button class='btn-xs bold btn btn-danger' id='r$r->id' onclick='reject_request(this.id)'>Reject</button>";
            } else {
                $nestedData[] = "<span style='color:#ff6c60'>Rejected</span>";
                $nestedData[] = "<button class='btn btn-xs btn-danger' disabled>Rejected</span>";
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

}

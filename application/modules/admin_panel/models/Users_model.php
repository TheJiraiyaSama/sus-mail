<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function ajax_users_list() {
        $requestData = $_REQUEST;
        $columns = array(
            0 => 'id',
            1 => 'name',
            2 => 'email',
            3 => 'phone'
           
        );
        $query = "SELECT count(id) as total FROM apply_franchise where user_type=1";
        $query = $this->db->query($query);
        $query = $query->row_array();
        $totalData = (count($query) > 0) ? $query['total'] : 0;
        $totalFiltered = $totalData;
     //  print_r($totalFiltered);die;
        $sql = "SELECT id, name, phone, email, state, city, model, investment,created
            FROM apply_franchise where user_type=1";

        if (!empty($requestData['columns'][1]['search']['value'])) {   //name
            $sql .= " AND name LIKE'" . $requestData['columns'][1]['search']['value'] . "%' ";
        }
        if (!empty($requestData['columns'][2]['search']['value'])) {   //name
            $sql .= " AND email LIKE'" . $requestData['columns'][2]['search']['value'] . "%' ";
        }
        if (!empty($requestData['columns'][3]['search']['value'])) {   //name
            $sql .= " AND phone LIKE'" . $requestData['columns'][3]['search']['value'] . "%' ";
        }
       
      
        $sql .= " order by " . $columns[$requestData['order'][0]['column']] . " " . $requestData['order'][0]['dir'] . " LIMIT " . $requestData['start'] . " ," . $requestData['length'];

        $result = $this->db->query($sql)->result();
        $data = array();
        $i = $requestData['start'];
        foreach ($result as $r) {  // preparing an array
            $i++;
            $nestedData = array();
            $nestedData[] = $i;
//            $nestedData[] = $r->user_name;
            $image = "<img src='default.png'>";
            if (isset($r->image)) {
                $image = "<img src='$r->image'>";
            }
            //$nestedData[] = $image;
            $nestedData[] = $r->name;
            $nestedData[] = $r->email;
            $nestedData[] = $r->phone;
            $nestedData[] = $r->state;
            $nestedData[] = $r->city;
            $nestedData[] = $r->model;
            $nestedData[] = $r->investment;
            $nestedData[] = date('d-m-Y', $r->created);
            $btn = "<button  class='btn-xs bold btn btn-primary' id='$r->id' onclick='block_unblock_user(this.id)' >Unblock</button>";
            if (($r->status) == 1) {
                $btn = "<button  class='btn-xs bold btn btn-warning' id='$r->id' onclick='block_unblock_user(this.id)' >Block</button>";
            }
            $nestedData[] = $btn;
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
    
      function ajax_career_list() {
        $requestData = $_REQUEST;
        $columns = array(
            0 => 'id',
            1 => 'name',
            2 => 'email',
            3 => 'phone'
           
        );
        $query = "SELECT count(id) as total FROM master_career";
        $query = $this->db->query($query);
        $query = $query->row_array();
        $totalData = (count($query) > 0) ? $query['total'] : 0;
        $totalFiltered = $totalData;
     //  print_r($totalFiltered);die;
        $sql = "SELECT id, name, phone, email, state, city, dob, resume,job_title,address,created
            FROM master_career";

        if (!empty($requestData['columns'][1]['search']['value'])) {   //name
            $sql .= " AND name LIKE'" . $requestData['columns'][1]['search']['value'] . "%' ";
        }
        if (!empty($requestData['columns'][2]['search']['value'])) {   //name
            $sql .= " AND email LIKE'" . $requestData['columns'][2]['search']['value'] . "%' ";
        }
        if (!empty($requestData['columns'][3]['search']['value'])) {   //name
            $sql .= " AND phone LIKE'" . $requestData['columns'][3]['search']['value'] . "%' ";
        }
       
      
        $sql .= " order by " . $columns[$requestData['order'][0]['column']] . " " . $requestData['order'][0]['dir'] . " LIMIT " . $requestData['start'] . " ," . $requestData['length'];

        $result = $this->db->query($sql)->result();
        $data = array();
        $i = $requestData['start'];
        foreach ($result as $r) {  // preparing an array
            $i++;
            $nestedData = array();
            $nestedData[] = $i;
//            $nestedData[] = $r->user_name;
            $image = "<img src='default.png'>";
            if (isset($r->image)) {
                $image = "<img src='$r->image'>";
            }
            //$nestedData[] = $image;
            $nestedData[] = $r->name;
            $nestedData[] = $r->email;
            $nestedData[] = $r->phone;
            $nestedData[] = $r->state;
            $nestedData[] = $r->city;
            $nestedData[] = $r->dob;
            $nestedData[] = $r->resume;
            $nestedData[] = $r->job_title;
            $nestedData[] = $r->address;
            $nestedData[] = date('d-m-Y', $r->created);
            $btn = "<button  class='btn-xs bold btn btn-primary' id='$r->id' onclick='block_unblock_user(this.id)' >Unblock</button>";
            if (($r->status) == 1) {
                $btn = "<button  class='btn-xs bold btn btn-warning' id='$r->id' onclick='block_unblock_user(this.id)' >Block</button>";
            }
            $nestedData[] = $btn;
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

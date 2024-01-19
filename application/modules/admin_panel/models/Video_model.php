<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Video_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function add_video() {
        $input = $this->input->post();
        if (isset($_GET['id']) && empty($input)) {
            $this->db->where('id', $_GET['id']);
            $view_data['result'] = $this->db->get('master_video')->row_array();
        } else if ($input) {
            if (isset($_GET['id'])) {
                $input['modified'] = time();
                $this->db->where('id', $_GET['id']);
                $this->db->update('master_video', $input);
                page_alert_box('success', 'Video Updated', 'Video has been updated successfully');
                redirect("admin_panel/video/list_video");
            } else {
                $input['created'] = time();
                $input['status'] = 1;
                $this->db->insert('master_video', $input);
                page_alert_box('success', 'New Video Added', 'Video has been added successfully');
                redirect("admin_panel/video/list_video");
            }
        }
        $view_data['tab'] = "video";
        $view_data['page'] = "add video";
        $data['page_data'] = $this->load->view('video/add_video', $view_data, TRUE);
        echo modules::run('admin_panel/template/call_default_template', $data);
    }

    function ajax_video_list() {
        $requestData = $_REQUEST;
        $columns = array(
            0 => 'id',
            2 => 'title',
            4 => 'status'
        );
        $query = "SELECT count(id) as total FROM master_video";
        $query = $this->db->query($query);
        $query = $query->row_array();

        $totalData = (count($query) > 0) ? $query['total'] : 0;
        $totalFiltered = $totalData;

        $where = "";

        if (!empty($requestData['columns'][1]['search']['value'])) {   //name
            $where .= " AND title LIKE'" . $requestData['columns'][1]['search']['value'] . "%' ";
        }
        if (!empty($requestData['columns'][3]['search']['value'])) {   //name
            $where .= " AND master_video.status ='" . $requestData['columns'][3]['search']['value'] . "' ";
        } else {
            $where .= " AND master_video.status ='1' ";
        }


        $sql = "SELECT * FROM master_video where 1 " . $where . " order by " . $columns[$requestData['order'][0]['column']] . " " . $requestData['order'][0]['dir'] . ", status asc limit " . $requestData['start'] . " , " . $requestData['length'];
        $query = $this->db->query($sql)->result();
        $totalFiltered = count($query); // when there is a search parameter then we have to modify total number filtered rows as per search result.

        $result = $this->db->query($sql)->result();
        $data = array();
        $i = $requestData['start'];
        foreach ($result as $r) {  // preparing an array
            $i++;
            $nestedData = array();
            $nestedData[] = $i;
            $nestedData[] = "<i class='$r->icon' aria-hidden='true'>";
            $nestedData[] = $r->title;
            $nestedData[] = $r->url;
            if ($r->status == 1) {
                $nestedData[] = "Active";
                $nestedData[] = "<button  class='btn-xs bold btn btn-primary'><a href='" . base_url() . "index.php/admin_panel/video/add_video?id=" . $r->id . "'>Edit</a>"
                        . "     </button> <button  class='btn-xs bold btn btn-warning' id='$r->id' onclick='block_video(this.id)'>Block</button>"
                        . "     <button class='btn-xs bold btn btn-danger' id='d$r->id' onclick='delete_video(this.id)'>Delete</button>";
            } else if ($r->status == 2) {
                $nestedData[] = "Blocked";
                $nestedData[] = "<button  class='btn-xs bold btn btn-primary'><a href='" . base_url() . "index.php/admin_panel/features/add_features?id=" . $r->id . "'>Edit</a>"
                        . "     </button> <button  class='btn-xs bold btn btn-primary' id='$r->id' onclick='block_aboutus(this.id)'>Unblock</button>"
                        . "     <button class='btn-xs bold btn btn-danger' id='d$r->id' onclick='delete_aboutus(this.id)'>Delete</button>";
            } else {
                $nestedData[] = "Deleted";
                $nestedData[] = "<button class='btn btn-xs btn-danger' disabled>Deleted</span>";
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

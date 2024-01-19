<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Category_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function add_category() {
      //  pre($_FILES);die;
        $input = $this->input->post();
        if (isset($_GET['id']) && empty($input)) {
            $this->db->where('id', $_GET['id']);
            $view_data['result'] = $this->db->get('master_category')->row_array();
        } else if ($input) {
            if (isset($_GET['id'])) {
                $image_name = $this->db->query("select image from master_category where id=" . $_GET['id'])->row()->image;
                $image_name = getcwd() . '\uploads\category\\' . $image_name;
                if (!empty($_FILES["image"]["name"])) {
                    if (file_exists($image_name)) {
                        unlink($image_name);
                    }
                    $input['image'] = $name = Upload("image", getcwd() . '/uploads/category/', time(), TRUE, getcwd() . '/uploads/category/', 680, 370);
                }
                $input['modified'] = time();
                $this->db->where('id', $_GET['id']);
                $this->db->update('master_category', $input);
                page_alert_box('success', 'Keyword Updated', 'Keyword has been updated successfully');
                redirect("admin_panel/category/list_category");
            } else {
                $input['image'] = $name = Upload("image", getcwd() . '/uploads/category/', time(), TRUE, getcwd() . '/uploads/category/', 680, 370);
                $input['created'] = time();
                $input['status'] = 1;
                //pre($input);die;
                $this->db->insert('master_category', $input);
                page_alert_box('success', 'New Keyword Added', 'Keyword has been added successfully');
                redirect("admin_panel/category/list_category");
            }
        }
        $view_data['tab'] = "category";
        $view_data['page'] = "add category";
        $this->db->where('status', 1);
        $data['page_data'] = $this->load->view('category/add_category', $view_data, TRUE);
        echo modules::run('admin_panel/template/call_default_template', $data);
    }

    function ajax_category_list() {
        $requestData = $_REQUEST;
        $columns = array(
            0 => 'master_category.id',
            1 => 'master_category.title'
           
        );
        $query = "SELECT count(*) as total FROM master_category where 1 ";
      
        $query = $this->db->query($query);
        $query = $query->row_array();
        $totalData = (count($query) > 0) ? $query['total'] : 0;
        $totalFiltered = $totalData;
        $where = "";
        if (!empty($requestData['columns'][1]['search']['value'])) {   //name
            $where .= " AND master_category.title LIKE'" . $requestData['columns'][1]['search']['value'] . "%' ";
        }
         if (!empty($requestData['columns'][3]['search']['value'])) {   //name
            $where .= " AND master_category.status ='" . $requestData['columns'][3]['search']['value'] . "' ";
        } else {
            $where .= " AND master_category.status ='1' ";
        }

        $sql = "SELECT *,master_category.id as ids,master_category.status as status FROM master_category where 1 " . $where . " order by " . $columns[$requestData['order'][0]['column']] . " " . $requestData['order'][0]['dir'] . ", master_category.status asc limit " . $requestData['start'] . " , " . $requestData['length'];
        $result = $this->db->query($sql)->result();

        $data = array();
        $i = $requestData['start'];
        foreach ($result as $r) {  // preparing an array
            $i++;
            $nestedData = array();
            $nestedData[] = $i;
            $nestedData[] = $r->title;
            if ($r->status == 1) {
                $nestedData[] = "Active";
                $nestedData[] = "<button  class='btn-xs bold btn btn-primary'><a href='" . base_url() . "index.php/admin_panel/category/add_category?id=" . $r->ids . "'>Edit</a>"
                        . "     </button> <button  class='btn-xs bold btn btn-warning' id='$r->ids' onclick='block_category(this.id)'>Block</button>"
                        . "     <button class='btn-xs bold btn btn-danger' id='d$r->ids' onclick='delete_category(this.id)'>Delete</button>";
            } else if ($r->status == 2) {
                $nestedData[] = "Blocked";
                $nestedData[] = "<button  class='btn-xs bold btn btn-primary'><a href='" . base_url() . "index.php/admin_panel/category/add_category?id=" . $r->ids . "'>Edit</a>"
                        . "     </button> <button  class='btn-xs bold btn btn-primary' id='$r->ids' onclick='block_category(this.id)'>Unblock</button>"
                        . "     <button class='btn-xs bold btn btn-danger' id='d$r->ids' onclick='delete_category(this.id)'>Delete</button>";
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

    function add_sub_category() {
        //pre($_FILES);die;
        $input = $this->input->post();
        if (isset($_GET['id']) && empty($input)) {
            $this->db->where('id', $_GET['id']);
            $view_data['result'] = $this->db->get('master_sub_category')->row_array();
        } else if ($input) {
            if (isset($_GET['id'])) {
                $image_name = $this->db->query("select image from master_sub_category where id=" . $_GET['id'])->row()->image;
                $image_name = getcwd() . '\uploads\sub_category\\' . $image_name;
                if (!empty($_FILES["image"]["name"])) {
                    if (file_exists($image_name)) {
                        unlink($image_name);
                    }
                    $input['image'] = $name = Upload("image", getcwd() . '/uploads/sub_category/', time(), TRUE, getcwd() . '/uploads/services/', 262, 170);
                }
                $input['modified'] = time();
                $this->db->where('id', $_GET['id']);
                $this->db->update('master_sub_category', $input);
                page_alert_box('success', 'Sub Category Updated', 'Sub Category has been updated successfully');
                redirect("admin_panel/service/list_sub_service");
            } else {
                $input['image'] = $name = Upload("image", getcwd() . '/uploads/sub_category/', time(), TRUE, getcwd() . '/uploads/services/', 262, 170);
                $input['created'] = time();
                $input['status'] = 1;
                $this->db->insert('master_sub_category', $input);
                page_alert_box('success', 'New Sub Category Added', 'Sub Category has been added successfully');
                redirect("admin_panel/category/list_sub_category");
            }
        }
        $view_data['tab'] = "category";
        $view_data['page'] = "add sub category";
        $this->db->where('status!=', 3);
        $view_data['services'] = $this->db->get("master_category")->result_array();
        $data['page_data'] = $this->load->view('category/add_sub_category', $view_data, TRUE);
        echo modules::run('admin_panel/template/call_default_template', $data);
    }

    function ajax_sub_category_list(){
        $requestData = $_REQUEST;
        $columns = array(
            0 => 'id',
            2 => 'master_category.title',
            3 => 'master_sub_category.title',
            4 => 'master_sub_category.status'
        );
        $query = "SELECT count(*) as total FROM master_sub_category join master_category on master_sub_category.master_services_id=master_category.id where 1 ";
        $query = $this->db->query($query);
        $query = $query->row_array();
        $totalData = (count($query) > 0) ? $query['total'] : 0;
        $totalFiltered = $totalData;
      
        $where = " ";
        if (!empty($requestData['columns'][1]['search']['value'])) {   //name
            $where .= " AND master_category.title LIKE'" . $requestData['columns'][1]['search']['value'] . "%' ";
        }
        if (!empty($requestData['columns'][2]['search']['value'])) {   //name
            $where .= " AND master_sub_category.title LIKE'" . $requestData['columns'][2]['search']['value'] . "%' ";
        }
        if (!empty($requestData['columns'][3]['search']['value'])) {   //name
            $where .= " AND master_sub_category.status ='" . $requestData['columns'][3]['search']['value'] . "' ";
        }else{
            $where .= " AND master_sub_category.status ='1' ";
        }
        $sql = "SELECT master_sub_category.id as id,master_sub_category.image as image, master_category.title as title_category,master_sub_category.title as title_sub_category,master_sub_category.status as status FROM master_sub_category join master_category on master_sub_category.master_services_id=master_category.id where 1 ".$where." order by " . $columns[$requestData['order'][0]['column']] . " " . $requestData['order'][0]['dir'] . ", master_category.status asc limit ".$requestData['start']." , ".$requestData['length'];
        $result = $this->db->query($sql)->result();
        
        $data = array();
        $i = $requestData['start'];
        //pre($result);die;
        foreach ($result as $r) {  // preparing an array
            $i++;
            $nestedData = array();
            $nestedData[] = $i;
            $image = "<img height='50px' width='50px' src='". base_url("/uploads/sub_category/default.jpg")."'>";
            if($r->image){
                $image = "<img height='50px' width='50px' src='". base_url("/uploads/sub_category/$r->image")."'>";
            }
            $nestedData[] = $image;
            $nestedData[] = $r->title_category;
            $nestedData[] = $r->title_sub_category;
            if ($r->status == 1) {
                $nestedData[] = "Active";
                $nestedData[] = "<button  class='btn-xs bold btn btn-primary'><a href='" . base_url() . "index.php/admin_panel/category/add_sub_category?id=" . $r->id . "'>Edit</a>"
                        . "     </button> <button  class='btn-xs bold btn btn-warning' id='$r->id' onclick='block_sub_category(this.id)'>Block</button>"
                        . "     <button class='btn-xs bold btn btn-danger' id='d$r->id' onclick='delete_sub_category(this.id)'>Delete</button>";
            } else if ($r->status == 2){
                $nestedData[] = "Blocked";
                $nestedData[] = "<button  class='btn-xs bold btn btn-primary'><a href='" . base_url() . "index.php/admin_panel/category/add_sub_category?id=" . $r->id . "'>Edit</a>"
                        . "     </button> <button  class='btn-xs bold btn btn-primary' id='$r->id' onclick='block_sub_category(this.id)'>Unblock</button>"
                        . "     <button class='btn-xs bold btn btn-danger' id='d$r->id' onclick='delete_sub_category(this.id)'>Delete</button>";
            }else{
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
   
    function add_sub_sub_category() {
        //pre($_FILES);die;
        $input = $this->input->post();
        if (isset($_GET['id']) && empty($input)) {
            $this->db->where('id', $_GET['id']);
            $view_data['result'] = $this->db->get('master_sub_sub_category')->row_array();
        } else if ($input) {
            if (isset($_GET['id'])) {
                $image_name = $this->db->query("select image from master_sub_sub_category where id=" . $_GET['id'])->row()->image;
                $image_name = getcwd() . '\uploads\sub_sub_category\\' . $image_name;
                if (!empty($_FILES["image"]["name"])) {
                    if (file_exists($image_name)) {
                        unlink($image_name);
                    }
                    $input['image'] = $name = Upload("image", getcwd() . '/uploads/sub_sub_category/', time(), TRUE, getcwd() . '/uploads/sub_sub_category/', 262, 170);
                }
                $input['modified'] = time();
                $this->db->where('id', $_GET['id']);
                $this->db->update('master_sub_sub_category', $input);
                page_alert_box('success', 'Sub Category Updated', 'Sub Category has been updated successfully');
                redirect("admin_panel/category/list_sub_sub_category");
            } else {
                $input['image'] = $name = Upload("image", getcwd() . '/uploads/sub_category/', time(), TRUE, getcwd() . '/uploads/sub_sub_category/', 262, 170);
                $input['created'] = time();
                $input['status'] = 1;
                $this->db->insert('master_sub_sub_category', $input);
                page_alert_box('success', 'New Sub Sub Category Added', 'Sub Sub Category has been added successfully');
                redirect("admin_panel/category/list_sub_sub_category");
            }
        }
        $view_data['tab'] = "category";
        $view_data['page'] = "add sub sub category";
        $this->db->where('status!=', 3);
        $view_data['cat'] = $this->db->get("master_category")->result_array();
        $data['page_data'] = $this->load->view('category/add_sub_sub_category', $view_data, TRUE);
        echo modules::run('admin_panel/template/call_default_template', $data);
    }
    
      function ajax_sub_sub_category_list(){
        $requestData = $_REQUEST;
        $columns = array(
            0 => 'id',
            2 => 'master_category.title',
            3 => 'master_sub_category.title',
            4 => 'master_sub_sub_category.title',
            5 => 'master_sub_sub_category.status'
        );
        $query = "SELECT count(*) as total FROM master_sub_sub_category 
        join master_sub_category on master_sub_sub_category.master_sub_menu_id=master_sub_category.id 
        join master_category on master_category.id=master_sub_category.master_services_id where 1 ";
        $query = $this->db->query($query);
        $query = $query->row_array();
        $totalData = (count($query) > 0) ? $query['total'] : 0;
        $totalFiltered = $totalData;
        $where = " ";
     
        if (!empty($requestData['columns'][3]['search']['value'])) {   //name
            $where .= " AND master_sub_category.title LIKE'" . $requestData['columns'][3]['search']['value'] . "%' ";
        }
        if (!empty($requestData['columns'][4]['search']['value'])) {   //name
            $where .= " AND master_sub_sub_category.title LIKE'" . $requestData['columns'][4]['search']['value'] . "%' ";
        }
        if (!empty($requestData['columns'][5]['search']['value'])) {   //name
            $where .= " AND master_sub_sub_category.status ='" . $requestData['columns'][5]['search']['value'] . "' ";
        }else{
            $where .= " AND master_sub_sub_category.status ='1' ";
        }
        $sql = "SELECT master_sub_sub_category.id as id,master_sub_sub_category.image as image, master_sub_category.title as title_sub_category,master_sub_sub_category.title as title_sub_sub_category,master_sub_sub_category.status as status, master_category.title as title FROM master_sub_sub_category join master_sub_category on master_sub_sub_category.master_sub_menu_id=master_sub_category.id 
         join master_category on master_category.id=master_sub_category.master_services_id 
         where 1 ".$where." order by " . $columns[$requestData['order'][0]['column']] . " " . $requestData['order'][0]['dir'] . ", master_sub_category.status asc limit ".$requestData['start']." , ".$requestData['length'];
        $result = $this->db->query($sql)->result();
        
        $data = array();
        $i = $requestData['start'];
        //pre($result);die;
        foreach ($result as $r) {  // preparing an array
            $i++;
            $nestedData = array();
            $nestedData[] = $i;
            $image = "<img height='50px' width='50px' src='". base_url("/uploads/sub_sub_category/default.jpg")."'>";
            if($r->image){
                $image = "<img height='50px' width='50px' src='". base_url("/uploads/sub_sub_category/$r->image")."'>";
            }
            $nestedData[] = $image;
            $nestedData[] = $r->title;
            $nestedData[] = $r->title_sub_category;
            $nestedData[] = $r->title_sub_sub_category;
            if ($r->status == 1) {
                $nestedData[] = "Active";
                $nestedData[] = "<button  class='btn-xs bold btn btn-primary'><a href='" . base_url() . "index.php/admin_panel/category/add_sub_sub_category?id=" . $r->id . "'>Edit</a>"
                        . "     </button> <button  class='btn-xs bold btn btn-warning' id='$r->id' onclick='block_sub_sub_category(this.id)'>Block</button>"
                        . "     <button class='btn-xs bold btn btn-danger' id='d$r->id' onclick='delete_sub_sub_category(this.id)'>Delete</button>";
            } else if ($r->status == 2){
                $nestedData[] = "Blocked";
                $nestedData[] = "<button  class='btn-xs bold btn btn-primary'><a href='" . base_url() . "index.php/admin_panel/category/add_sub_sub_category?id=" . $r->id . "'>Edit</a>"
                        . "     </button> <button  class='btn-xs bold btn btn-primary' id='$r->id' onclick='block_sub_sub_category(this.id)'>Unblock</button>"
                        . "     <button class='btn-xs bold btn btn-danger' id='d$r->id' onclick='delete_sub_sub_category(this.id)'>Delete</button>";
            }else{
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

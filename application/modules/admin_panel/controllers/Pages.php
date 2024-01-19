<?php

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

class Pages extends MX_Controller {

    public function __construct() {
        parent::__construct();
        /* !!!!!! Warning !!!!!!!11
         *  admin panel initialization
         *  do not over-right or remove auth_panel/auth_panel_ini/auth_ini
         */
        $this->load->helper('aul');
        $this->load->helper('custom');
        modules::run('auth_panel/auth_panel_ini/auth_ini');
        /* do not remove helper and grocey_crud
         * It will put you in danger
         */
        $this->load->model('Event_model');
        $this->load->model('Course_list_model');
        $this->load->library('grocery_CRUD');
        $this->load->helper("message_sender_helper");
        $this->load->helper("push");
    }

    public function _example_output($output = null) {
        $this->load->view(AUTH_TEMPLATE . 'grocery_crud_template', (array) $output);
    }

    public function amazon_s3_upload($name, $aws_path) {
        $_FILES['file'] = $name;
        require_once(FCPATH . 'aws/aws-autoloader.php');

        $s3Client = new S3Client([
            'version' => 'latest',
            'region' => 'ap-south-1',
            'credentials' => [
                'key' => AMS_S3_KEY,
                'secret' => AMS_SECRET,
            ],
        ]);
        $result = $s3Client->putObject(array(
            'Bucket' => AMS_BUCKET_NAME,
            'Key' => $aws_path . '/' . rand(0, 7896756) . $_FILES["file"]["name"],
            'SourceFile' => $_FILES["file"]["tmp_name"],
            'ContentType' => 'image',
            'ACL' => 'public-read',
            'StorageClass' => 'REDUCED_REDUNDANCY',
            'Metadata' => array('param1' => 'value 1', 'param2' => 'value 2')
        ));
        $data = $result->toArray();
        return $data['ObjectURL'];
    }

    public function contact_us_list($id = '') {
        $view_data = [];
        $data['page_data'] = $this->load->view('pages/contact_us_list', $view_data, TRUE);
        echo modules::run(AUTH_DEFAULT_TEMPLATE, $data);
    }

    public function ajax_contact_us_list() {
        $where = "AND status != 3";
        $requestData = $_REQUEST;

        $columns = array(
            // datatable column index  => database column name
            0 => 'id',
            1 => 'name',
            2 => 'mobile',
            3 => 'email',
            4 => 'city',
            5 => 'subject',
            6 => 'reference',
            7 => 'creation_time'
        );

        $query = "SELECT count(id) as total FROM contact_us where 1=1 $where";
        $query = $this->db->query($query);
        $query = $query->row_array();
        $totalData = (count($query) > 0) ? $query['total'] : 0;
        $totalFiltered = $totalData;

        $sql = "SELECT * FROM contact_us where 1=1 $where";

        // getting records as per search parameters
        if (!empty($requestData['columns'][1]['search']['value'])) {  //salary
            $sql .= " AND name LIKE '" . $requestData['columns'][1]['search']['value'] . "%' ";
        }
        if (!empty($requestData['columns'][2]['search']['value'])) {  //salary
            $sql .= " AND mobile LIKE '" . $requestData['columns'][2]['search']['value'] . "%' ";
        }
        if (!empty($requestData['columns'][3]['search']['value'])) {  //salary
            $sql .= " AND email LIKE '" . $requestData['columns'][3]['search']['value'] . "%' ";
        }
        if (!empty($requestData['columns'][5]['search']['value'])) {  //salary
            $sql .= " AND subject LIKE '" . $requestData['columns'][5]['search']['value'] . "%' ";
        }
        if (!empty($requestData['columns'][6]['search']['value'])) {  //salary
            $sql .= " AND reference LIKE '" . $requestData['columns'][6]['search']['value'] . "%' ";
        }
        if (!empty($requestData['columns'][9]['search']['value'])) {   //name
            $sql .= " AND status = '" . $requestData['columns'][9]['search']['value'] . "' ";
        }
        $query = $this->db->query($sql)->result();
        $totalFiltered = count($query); // when there is a search parameter then we have to modify total number filtered rows as per search result.
        //$sql .= " ORDER BY  contact_us.id desc  LIMIT " . $requestData['start'] . " ," . $requestData['length'] . "   ";  // adding length

        $sql .= " ORDER BY " . $columns[$requestData['order'][0]['column']] . "   " . $requestData['order'][0]['dir'] . "   LIMIT " . $requestData['start'] . " ," . $requestData['length'] . "   ";  // adding length


        $result = $this->db->query($sql)->result();
        //pre($result); die;
        $data = array();
        $i = 0;
        foreach ($result as $r) {  // preparing an array
            $nestedData = array();
            $nestedData[] = ++$i;
            $nestedData[] = $r->name;
            $nestedData[] = $r->mobile;
            $nestedData[] = $r->email;
            $nestedData[] = $r->city . ", " . $r->state;
            $nestedData[] = $r->subject;
            $nestedData[] = $r->reference;
//            $nestedData[] = $r->message;
            $nestedData[] = date('d-M-Y', $r->creation_time);
            $active_text = '<span class="badge" style="background-color:red">Pending</span>';
            $disable_text = '<p style="color:green"><b>REPLIED</b></p>';
            $nestedData[] = $r->status == 1 ? $active_text : $disable_text;

            $action = "<button class='bold btn-xs btn btn-info' onclick='view_message($r->id)'>View</button> ";
            $replied_btn = "<a class='bold btn-xs btn btn-success' onclick='rep_entry($r->id)'>Replied</a>";
            $delete_btn = " <a class='btn-xs bold  btn btn-danger' onclick='delete_entry($r->id)'>Delete</a> ";
            $action .= ($r->status == 1) ? $replied_btn . $delete_btn : $delete_btn;

            $nestedData[] = $action;

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

    public function update_contact_us_status($status, $id) {
        if ($id) {
            $this->db->where('id', $id);
            $this->db->update("contact_us", ['status' => $status]);
            if ($status == 2) {
                page_alert_box('success', 'Contact us', 'Replied successfull');
            }
            if ($status == 3) {
                page_alert_box('success', 'Contact us', 'Delete successfully.');
            }
            redirect(AUTH_PANEL_URL . "Pages/contact_us_list");
        }
    }
    
    public function ajax_update_contact_us_status($status, $id) {
        if ($id) {
            $this->db->where('id', $id);
            $this->db->update("contact_us", ['status' => $status]);
            echo json_encode(['status'=>true,'message'=>'success']); die;
        } else {
            echo json_encode(['status'=>false,'message'=>'error']); die;
        }
    }

    public function franchise_list($id = '') {
        $view_data = [];
        $data['page_data'] = $this->load->view('pages/franchise_list', $view_data, TRUE);
        echo modules::run(AUTH_DEFAULT_TEMPLATE, $data);
    }
    

    public function ajax_feeback_list() {
        $where = "AND feedback_queries.status != 3";
        $requestData = $_REQUEST;

        $columns = array(
            // datatable column index  => database column name
            0 => 'feedback_queries.id',
            1 => 'name',
            2 => 'mobile',
            3 => 'email',
            4 => 'payment_for_category',
            5 => 'title',
            6 => 'course_price',
            7 => 'feedback_queries.creation_time'
        );

        $query = "SELECT count(id) as total FROM feedback_queries where 1=1 $where";
        $query = $this->db->query($query);
        $query = $query->row_array();
        $totalData = (count($query) > 0) ? $query['total'] : 0;
        $totalFiltered = $totalData;

        $sql = "SELECT feedback_queries.*,feedback_queries.id as feed_id,feedback_queries.creation_time as sending_time, course_master.*, course_master.id as course_id, users.id as user_id,users.name as name, users.mobile as mobile, users.email as email, course_transaction_record.* 
                FROM feedback_queries
                LEFT JOIN course_transaction_record ON course_transaction_record.id = feedback_queries.transaction_id
                LEFT JOIN users ON users.id = course_transaction_record.user_id
                LEFT JOIN course_master ON course_master.id = course_transaction_record.course_id
                where 1=1 $where";

        // getting records as per search parameters
        if (!empty($requestData['columns'][1]['search']['value'])) {  //salary
            $sql .= " AND users.name LIKE '" . $requestData['columns'][1]['search']['value'] . "%' ";
        }
        if (!empty($requestData['columns'][2]['search']['value'])) {  //salary
            $sql .= " AND users.mobile LIKE '" . $requestData['columns'][2]['search']['value'] . "%' ";
        }
        if (!empty($requestData['columns'][3]['search']['value'])) {  //salary
            $sql .= " AND users.email LIKE '" . $requestData['columns'][3]['search']['value'] . "%' ";
        }
        if (!empty($requestData['columns'][4]['search']['value'])) {   //name
            $sql .= " AND payment_for_category = '" . $requestData['columns'][4]['search']['value'] . "' ";
        }
        if (!empty($requestData['columns'][5]['search']['value'])) {  //salary
            $sql .= " AND title LIKE '" . $requestData['columns'][5]['search']['value'] . "%' ";
        }

        if (!empty($requestData['columns'][9]['search']['value'])) {   //name
            $sql .= " AND feedback_queries.status = '" . $requestData['columns'][9]['search']['value'] . "' ";
        }
        $query = $this->db->query($sql)->result();
        $totalFiltered = count($query); // when there is a search parameter then we have to modify total number filtered rows as per search result.
        //$sql .= " ORDER BY  feedback_queries.id desc  LIMIT " . $requestData['start'] . " ," . $requestData['length'] . "   ";  // adding length

        $sql .= " ORDER BY " . $columns[$requestData['order'][0]['column']] . "   " . $requestData['order'][0]['dir'] . "   LIMIT " . $requestData['start'] . " ," . $requestData['length'] . "   ";  // adding length

        $result = $this->db->query($sql)->result();
        //pre($result); die;
        $data = array();
        $i = 0;
        foreach ($result as $r) {  // preparing an array
            $nestedData = array();
            $nestedData[] = ++$i;
            $redirect_url = base_url('index.php/auth_panel/web_user/user_profile/') . $r->user_id;
            $nestedData[] = '<a href="' . $redirect_url . '">' . $r->name . '</a>';
            $nestedData[] = $r->mobile;
            $nestedData[] = $r->email;
            $payment_cat = "";
            if ($r->payment_for_category == 4) {
                $payment_cat = "Course";
            }
            if ($r->payment_for_category == 5) {
                $payment_cat = "Event";
            }
            if ($r->payment_for_category == 6) {
                $payment_cat = "Premium Video";
            }
            if ($r->payment_for_category == 7) {
                $payment_cat = "Newsletter";
            }
            if ($r->payment_for_category == 8) {
                $payment_cat = "Calculator";
            }
            $nestedData[] = $payment_cat;
            $nestedData[] = ucfirst($r->title);
            $nestedData[] = $r->course_price;
//            $nestedData[] = $r->message;
            $nestedData[] = date('d-M-Y', $r->sending_time);
            $active_text = '<span class="badge" style="background-color:red">Pending</span>';
            $disable_text = '<p style="color:green"><b>REPLIED</b></p>';
            $nestedData[] = $r->status == 1 ? $active_text : $disable_text;

            $action = "<button class='bold btn-xs btn btn-info' onclick='view_message($r->feed_id)'>View</button> ";
            $replied_btn = "<a class='bold btn-xs btn btn-success rep_$r->feed_id' onclick='rep_entry($r->feed_id)' >Replied</a>";
            $delete_btn = " <a class='btn-xs bold  btn btn-danger del_$r->feed_id' onclick='delete_entry($r->feed_id)' data-id='$r->feed_id'>Delete</a> ";
            $action .= ($r->status == 1) ? $replied_btn . $delete_btn : $delete_btn;

            $nestedData[] = $action;

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

    public function update_feedback_status($status, $id) {
        if ($id) {
            $this->db->where('id', $id);
            $this->db->update("feedback_queries", ['status' => $status]);
            if ($status == 2) {
                page_alert_box('success', 'Feedback', 'Replied successfull');
            }
            if ($status == 3) {
                page_alert_box('success', 'Feedback', 'Delete successfully.');
            }
            redirect(AUTH_PANEL_URL . "Pages/feeback_list");
        }
    }
    
    public function ajax_update_feedback_status($status, $id) {
        if ($id) {
            $this->db->where('id', $id);
            $this->db->update("feedback_queries", ['status' => $status]);
            echo json_encode(['status'=>true,'message'=>'success']); die;
        } else {
            echo json_encode(['status'=>false,'message'=>'error']); die;
        }
    }

//    public function send_notification() {
//        $view_data = [];
//        if ($this->input->post()) {
//            $input_data = $this->input->post();
//            //pre($input_data); die;
//            $input_data['from_user_type'] = 1;
//            $input_data['creation_time'] = time();
//            //pre($input_data); die;
//            $this->db->insert('user_activity_generator', $input_data);
//            $insert_id = $this->db->insert_id();
//            $this->db->where('id', $insert_id);
//            $notification = $this->db->get('user_activity_generator')->row_array();
//            //$notification = $this->db->get_where('user_activity_generator', ['id' =>876645])->row_array();
//            //pre($notification); die;
//            if ($notification) {
//                $this->db->select('id,device_type,device_token');
//                $this->db->group_by('device_token');
//                $this->db->where('status', 1);
//                $users = $this->db->get('users')->result_array();
//                if ($users) {
//                    foreach ($users as $each) {
//                        $device_type = $each['device_type'];
//                        $device_token = $each['device_token'];
//                        $each['message'] = $notification['title'];
//                        $each['notification_data'] = $notification;
//                        $user_ids[] = $each['id'];
//                        //pre($each); die; 
//                        generatePush($device_type, $device_token, $each);
//                    }
//                    //pre($user_ids); die;
//                    page_alert_box('success', 'Notification', 'Notification sent successfully');
//                }
//            }
//        }
//        $view_data['page'] = "Send Notification";
//        $data['page_data'] = $this->load->view('pages/send_notification', $view_data, TRUE);
//        echo modules::run(AUTH_DEFAULT_TEMPLATE, $data);
//    }

    public function send_notification() {
        $view_data = [];
        if ($this->input->post()) {
            $input_data = $this->input->post();
            //pre($input_data); die;
            $input_data['from_user_type'] = 1;
            $input_data['creation_time'] = time();
            //pre($input_data); die;
            $this->db->insert('user_activity_generator', $input_data);
            echo $this->db->last_query(); die;
            $insert_id = $this->db->insert_id();
            $this->db->where('id', $insert_id);
            $notification = $this->db->get('user_activity_generator')->row_array();
            //$notification = $this->db->get_where('user_activity_generator', ['id' =>876645])->row_array();
            //pre($notification); die;
            if ($notification) {
                $this->db->select('distinct(device_token),id,device_type,device_token');
                $users = $this->db->get('users')->result_array();
                if ($users) {
                    foreach ($users as $each) {
                        $each['message'] = $notification['title'];
                        $each['notification_data'] = $notification;
                        if ($each['device_type'] == 1) {
                            $android_user_tokens[] = $each['device_token'];
                        }
                        if ($each['device_type'] == 2) {
                            //$ios_user_tokens[] = $each['device_token'];
                            //pre($each); die; 
                            //generatePush(2, $each['device_token'], $each);
                        }
                    }
                    //pre($android_user_tokens); die;
                    if ($android_user_tokens) {
                        $each['message'] = $notification['title'];
                        $each['notification_data'] = $notification;
                        $each['device_token'] = $device_token = $android_user_tokens;
                        //$each['device_token'] = $device_token = ['c_nwnjC4k8o:APA91bG5EBLLPJhoVlINPADfKenG4fvneXw3v1iLr5A2KFLHT6JdEptFq6DycuHrIAq9mjhGoDFgOM1ZHS6a9GB86u95CBiqvoVNGT4F1mzOJT3VVLS3lZxha9yWw5Tb0Hwp2b0PCUTA', 'c_nwnjC4k8o:APA91bG5EBLLPJhoVlINPADfKenG4fvneXw3v1iLr5A2KFLHT6JdEptFq6DycuHrIAq9mjhGoDFgOM1ZHS6a9GB86u95CBiqvoVNGT4F1mzOJT3VVLS3lZxha9yWw5Tb0Hwp2b0PCUTA'];
                        //generatePush(1, $device_token, $each);
                    }
//                    if ($ios_user_tokens) {
//                        $device_type = 2;
//                        $each['device_token'] = $device_token = $ios_user_tokens;
//                        generatePush($device_type, $device_token, $each);
//                    }
                    page_alert_box('success', 'Notification', 'Notification sent successfully');
                }
            }
        }
        $view_data['page'] = "Send Notification";
        $data['page_data'] = $this->load->view('pages/send_notification', $view_data, TRUE);
        echo modules::run(AUTH_DEFAULT_TEMPLATE, $data);
    }

    public function contact_details() {
        $view_data = [];
        if ($this->input->post()) {
            $input_data = $this->input->post();
            $input_data['modify_time'] = time();
            //pre($input_data); die;
            $this->db->where('id', $input_data['id']);
            $this->db->update('contact_detail', $input_data);
            page_alert_box('success', 'Contact Information', 'Contact information successfully updated');
        }
        $view_data['page'] = "Contact Information";
        $view_data['contact'] = $this->db->get('contact_detail')->row_array();
        //pre($view_data); die;
        $data['page_data'] = $this->load->view('pages/contact_details', $view_data, TRUE);
        echo modules::run(AUTH_DEFAULT_TEMPLATE, $data);
    }

    public function ajax_contact_us_deatils($id) {
        $message = "";
        if ($id) {
            $result = $this->db->get_where('contact_us', ['id' => $id])->row_array();
            if ($result) {
                $message = $result['message'];
            }
        }
        echo "<p>" . $message . "</p>";
    }

    public function bank_details() {
        $view_data = [];
        if ($this->input->post()) {
            $input_data = $this->input->post();
            //$input_data['modify_time'] = time();
            //pre($input_data); //die;
            if (isset($input_data['id']) && !empty($input_data['id'])) {
                $this->db->where('id', $input_data['id']);
                //pre($input_data); die;
                $this->db->update('bank_detail', $input_data);
                page_alert_box('success', 'Bank Information', 'Bank information successfully updated');
            } else {
                $this->db->insert('bank_detail', $input_data);
                page_alert_box('success', 'Bank Information', 'Bank information successfully inserted');
            }
        }
        $view_data['page'] = "Bank Information";
        $view_data['contact'] = $this->db->get('bank_detail')->row_array();
        //pre($view_data); die;
        $data['page_data'] = $this->load->view('pages/bank_details', $view_data, TRUE);
        echo modules::run(AUTH_DEFAULT_TEMPLATE, $data);
    }

    public function ajax_bank_deatils($id) {
        $message = "";
        if ($id) {
            $result = $this->db->get_where('contact_us', ['id' => $id])->row_array();
            if ($result) {
                $message = $result['message'];
            }
        }
        echo "<p>" . $message . "</p>";
    }

    public function ajax_feedback_deatils($id) {
        $message = "";
        //pre($id); die;
        if ($id) {
            $result = $this->db->get_where('feedback_queries', ['id' => $id])->row_array();
            if ($result) {
                $message = $result['message'];
            }
        }
        echo "<p>" . $message . "</p>";
    }

    public function extend_validity() {
        $view_data['page'] = 'extend_validity';
        $view_data['contact'] = [];
        if ($this->input->post()) {
            $inputs = $this->input->post();
            //pre($inputs);die;
            $payment_for_category = $this->input->post('payment_for_category');
            $course_id = $this->input->post('course_id');

            $this->db->where('payment_for_category', $payment_for_category);
            $this->db->where('course_id', $course_id);
            if ($inputs['newsletter_plan_type'] != "" && ($payment_for_category == 7 || $payment_for_category == 8)) {
                $this->db->where('newsletter_plan_type', $inputs['newsletter_plan_type']);
            }
            if ($inputs['all_user'] == 2) {
                $this->db->where_in('user_id', $inputs['user_id']);
            }
            $txn_ids = $this->db->get('course_transaction_record')->result_array();
            //pre($txn_ids); die;
            if ($txn_ids) {
                foreach ($txn_ids as $each) { //pre($each['id']);
                    $prev_date = date('Y-m-d', $each['validity'] / 1000);
                    //pre($prev_date); die;
                    $days = $inputs['days'];
                    $updated_validity_date = date('Y-m-d', strtotime($prev_date . ' + ' . $days . ' days'));
                    //pre(date('Y-m-d H:i:s',(strtotime($updated_validity_date)) + 86399)*1000); die;
                    $data_for_update['validity'] = (strtotime($updated_validity_date) + 86399)*1000;
                    $this->db->where('id', $each['id']);
                    $this->db->update('course_transaction_record', ['validity' => $data_for_update['validity']]);
                }
            }

            page_alert_box('success', 'Action performed', 'Validity Extended');
        }

        $data['page_data'] = $this->load->view('pages/extend_validity', $view_data, TRUE);
        echo modules::run(AUTH_DEFAULT_TEMPLATE, $data);
    }

    public function ajax_course_list() {
        if ($this->input->post()) {
            $course_main_fk = $this->input->post('payment_for_category');
            $this->db->where('state', 0);
            $this->db->where('publish', 1);
            $courses = $this->db->where('course_main_fk', $course_main_fk)->get('course_master')->result_array();
            //pre($courses); die;
            if ($courses) {
                echo "<option value=''>Select</option>";
                foreach ($courses as $each) {
                    echo "<option value='" . $each['id'] . "'>" . $each['title'] . "</option>";
                }
            } else {
                echo "<option value=''>Select</option>";
            }
        } else {
            echo "<option value=''>Select</option>";
        }
    }

    public function ajax_newsletter_plan() {
        if ($this->input->post()) {
            $course_id = $this->input->post('course_id');
            $courses = $this->db->where('course_id', $course_id)->get('newsletter_plans')->result_array();
            //pre($courses); die;
            if ($courses) {
                foreach ($courses as $each) {
                    if ($each['plan_type'] == 3) {
                        $plan_type = "Monthly";
                    }
                    if ($each['plan_type'] == 4) {
                        $plan_type = "Quarterly";
                    }
                    if ($each['plan_type'] == 5) {
                        $plan_type = "Half yearly";
                    }
                    if ($each['plan_type'] == 6) {
                        $plan_type = "Yearly";
                    }
                    echo "<option value='" . $each['plan_type'] . "'>" . $plan_type . "</option>";
                }
            } else {
                echo "<option value=''>Select</option>";
            }
        } else {
            echo "<option value=''>Select</option>";
        }
    }

    public function ajax_get_paid_user_list_old() {
        if ($this->input->post()) {
            $this->db->select('users.id as id, users.email, users.mobile, users.name');
            $this->db->join('users', 'users.id = course_transaction_record.user_id');
            if ($this->input->post('payment_for_category') == 7 || $this->input->post('payment_for_category') == 8) {
                $this->db->where('newsletter_plan_type', $this->input->post('newsletter_plan_type'));
            }
            $this->db->where('course_id', $this->input->post('course_id'));
            $users = $this->db->get('course_transaction_record')->result_array();
            //echo $this->db->last_query(); die;
            if ($users) {
                foreach ($users as $each) {
                    echo "<option value='" . $each['id'] . "'>" . $each['mobile'] . " (" . $each['name'] . ")</option>";
                }
            } else {
                echo "<option value=''>Select</option>";
            }
        } else {
            echo "<option value=''>Select</option>";
        }
    }
    
    
    public function ajax_get_paid_user_list() {
        if ($this->input->post()) {
            $this->db->select('users.id as id, users.email, users.mobile, users.name');
            $this->db->join('users', 'users.id = course_transaction_record.user_id');
            if ($this->input->post('payment_for_category') == 7 || $this->input->post('payment_for_category') == 8) {
                $this->db->where('newsletter_plan_type', $this->input->post('newsletter_plan_type'));
            }
            $this->db->where('course_id', $this->input->post('course_id'));
            $users = $this->db->get('course_transaction_record')->result_array();
            //echo $this->db->last_query(); die;
            if ($users) {
                foreach ($users as $each) {
                    echo "<option value='" . $each['id'] . "'>" . $each['mobile'] . " (" . $each['name'] . ")</option>";
                }
            } else {
                echo "<option value=''>Select</option>";
            }
        } else {
            echo "<option value=''>Select</option>";
        }
    }

    ///////////////////////////////// end here //////////////////////////////////////////////////
}

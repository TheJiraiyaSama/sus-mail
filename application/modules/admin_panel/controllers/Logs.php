<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Logs extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('Logs_model');
        $this->load->helper('custom_helper');
    }

    function insert_logs() {
        $input = check_inputs();
        
        $log = "Time: ".date('Y-m-d, H:i s').PHP_EOL;
        $log = $log."Responce ". json_encode($input).PHP_EOL.PHP_EOL;
        file_put_contents('logs/insert_logs.txt', $log, FILE_APPEND);
        
        if (isset($input)) {
            //$input['otp']= rand(1000, 9999);
            $result = $this->Logs_model->insert($input);
            if ($result) {
                return_data(TRUE, 'Data Successfully Inserted', array());
            }
            return_data(FALSE, 'Data did not inserted', array());
        }
        return_data(FALSE, 'Please Provide valid details', array());
    }
    
    function get_logs(){
        $input = check_inputs();
        //pre($input);die;
        if($input['users_id']!=""){
            $result = $this->Logs_model->get($input);
            if($result){
                return_data(TRUE, 'Data Posted Successfully', $result);
            }
            return_data(FALSE, 'Data did not found', array());
        }
        return_data(FALSE, 'Please Provide Id(users_id)', array());
    }
    
    function get_time(){
        return_data(TRUE, 'time)', array("time"=> time()));
    }
}

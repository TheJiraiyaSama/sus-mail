<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Admin_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function index(){
        $view_data = array();
        $view_data['total_users'] = $this->db->query('select count(*) as total from users where user_type=1')->row()->total;
        $view_data['total_active_users'] = $this->db->query('select count(*) as total from users where user_type=1 and status=1')->row()->total;
        $view_data['total_blocked_users'] = $this->db->query('select count(*) as total from users where user_type=1 and status=2')->row()->total;
 
        return $view_data;
    }
}
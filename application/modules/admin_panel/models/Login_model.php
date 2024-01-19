<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Login_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function register($data){
        $data['password'] = md5($data['password']); 
        $this->db->insert('users',$data);
        $id = $this->db->insert_id();
        return $id;
    }
}
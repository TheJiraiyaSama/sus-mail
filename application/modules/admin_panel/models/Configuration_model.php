<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Configuration_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function add_configuration($input) {
        // if (file_exists("logs/configuration.txt") && $input) {
        //     $data = (array) json_decode(file_get_contents("logs/configuration.txt"));
        //     $data['mobile'] = $input['mobile'];
        //     $data['email'] = $input['email'];
        //     $data['address'] = $input['address'];
        //     file_put_contents("logs/configuration.txt", json_encode($data));
        //     $input = $data;
        // }
        // return (array) json_decode(file_get_contents("logs/configuration.txt"));
         $input['created'] = time();
         $this->db->where('id',$input['id']);
          $result= $this->db->update('info',$input);
        return $result;
    }

}

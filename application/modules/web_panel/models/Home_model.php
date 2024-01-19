<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Home_model extends CI_Model{
    function __construct() {
        parent::__construct();
    }

    
    public function get_all_categories_for_header() {
        
        $query = $this->db->get('master_category',5);
        return $query->result_array();
    }
    
    
    function get_all_subcategories_for_header($cat_id) {
        //echo $cat_id; die;
        
        $query = $this->db->get_where('master_sub_category', array('master_services_id' => $cat_id));
        $this->db->limit(5);
        return $query->result_array();
    } 
    
     public function get_all_subcat() {
        
        $query = $this->db->get('master_sub_category');
        return $query->result_array();
    } 
    
    
    public function get_all_subsubcat() {
        
        $query = $this->db->get('master_sub_sub_category');
        return $query->result_array();
    }
    
  function get_all_subsubcategories_for_header($scat_id) {
       // echo $scat_id; die;
        $query = $this->db->get_where('master_sub_sub_category', array('master_sub_menu_id' => $scat_id));
          $this->db->limit(5);
        return $query->result_array();
    } 
    
    
  
  
}
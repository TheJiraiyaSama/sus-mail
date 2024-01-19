<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Product_model extends CI_Model{
    function __construct() {
        parent::__construct();
    }

    public function get_all_product_list() {
        $this->db->order_by("id","desc");
        //$this->db->where('master_menu_id',3);
        $query = $this->db->get('product',15);
        return $query->result_array();
    }
    
     public function get_product_details($id) {
        //echo $id; die;
        $this->db->where('id',$id);
        $query = $this->db->get('product');
        //print_r($query->result_array());
        return $query->row_array();
    }
    
    public function get_product_details_main_cat($main_cat) {
        //echo $id; die;
        $this->db->where('master_menu_id',$main_cat);
        $query = $this->db->get('product');
        return $query->result_array();
    }
    
    public function get_product_details_sub_cat($main_cat,$sub_cat) {
        //echo $id; die;
        $this->db->where('master_menu_id',$main_cat);
        $this->db->where('master_sub_menu_id',$sub_cat);
        $query = $this->db->get('product');
        return $query->result_array();
    }
    public function get_product_details_sub_sub_cat($main_cat,$sub_cat,$subsub_cat) {
        //echo $id; die;
        $this->db->where('master_menu_id',$main_cat);
        $this->db->where('master_sub_menu_id',$sub_cat);
        $this->db->where('master_sub_sub_menu_id',$subsub_cat);
        $query = $this->db->get('product');
        return $query->result_array();
    }
  
    public function get_all_product_list1() {
        $this->db->order_by("id","desc");
        $this->db->where('master_menu_id',4);
        $query = $this->db->get('product',8);
        return $query->result_array();
    }
    
      public function get_all_product_list2() {
        $this->db->order_by("id","desc");
        $this->db->where('master_menu_id',5);
        $query = $this->db->get('product',8);
        return $query->result_array();
    }
    
      public function get_all_product_list3() {
        $this->db->order_by("id","desc");
        $this->db->where('master_menu_id',6);
        $query = $this->db->get('product',8);
        return $query->result_array();
    }
    
    
      public function get_all_product_list4() {
        $this->db->order_by("id","desc");
        $this->db->where('master_menu_id',5);
        $query = $this->db->get('product',8);
        return $query->result_array();
    }
    
      public function get_all_product_list5() {
        $this->db->order_by("id","desc");
        $this->db->where('master_menu_id',7);
        $query = $this->db->get('product',8);
        return $query->result_array();
    }
    
      public function get_all_product_list6() {
        $this->db->order_by("id","desc");
        $this->db->where('master_menu_id',8);
        $query = $this->db->get('product',8);
        return $query->result_array();
    }
 
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MX_Controller {

		
	function __construct() {
		parent::__construct();

		$this->load->model("home_model");
		$this->load->model("product_model");

	}
	
	public function index()
	{
	    
	      $result['product'] = $this->product_model->get_all_product_list();
	      if(isset($_GET['ct'])){
	          $result['product'] = $this->product_model->get_product_details_main_cat($_GET['ct']); 
	      }
	      if(isset($_GET['ct']) and isset($_GET['sct'])){
	          $result['product'] = $this->product_model->get_product_details_sub_cat($_GET['ct'],$_GET['sct']); 
	      }
	      if(isset($_GET['ct']) and isset($_GET['sct']) and isset($_GET['ssct'])){
	          $result['product'] = $this->product_model->get_product_details_sub_sub_cat($_GET['ct'],$_GET['sct'],$_GET['ssct']); 
	      }
	      
	      $result['cat'] = $this->home_model->get_all_categories_for_header();
          $result['subcat'] = $this->home_model->get_all_subcat();
          $result['subsubcat'] = $this->home_model->get_all_subsubcat();
       
	      //$result['cat'] = $this->home_model->get_all_categories_for_header();
          //foreach($result['cat'] as $ct){

            //            $cat_id = $ct['id'];        
              //  }

	    // echo "<pre>"; print_r($result['cat']); echo "<pre>";die;
	     //$result['subcat'] = $this->home_model->get_all_subcategories_for_header($cat_id); 
         //foreach($result['subcat'] as $sct){

           //             $scat_id = $sct['id'];        
             //   }
       //    echo "<pre>"; print_r($result['subcat']); echo "<pre>";die; 
        //$result['subsubcat'] = $this->home_model->get_all_subsubcategories_for_header($scat_id);    
       // echo "<pre>"; print_r($result); echo "<pre>";die; 
       
        //$result['product'] = $this->product_model->get_all_product_list(); 
		$this->load->view('category',$result);
	}
}

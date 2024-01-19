<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MX_Controller {

	function __construct() {
		parent::__construct();
        $this->load->helper('url');
        $this->load->model("home_model");
		$this->load->model("product_model");

	}
	public function index()
	
	{
	         $result['cat'] = $this->home_model->get_all_categories_for_header();
	         $result['subcat'] = $this->home_model->get_all_subcat();
             $result['subsubcat'] = $this->home_model->get_all_subsubcat(); 
    		 $this->load->view('product',$result);
	        
	}
	
	public function product($id)
	
	{  
	      $result['cat'] = $this->home_model->get_all_categories_for_header();
	     $result['subcat'] = $this->home_model->get_all_subcat();
        $result['subsubcat'] = $this->home_model->get_all_subsubcat(); 
    	 $result['product'] = $this->product_model->get_product_details($id);
    	 
	     //echo "<pre>"; print_r($result['product']); echo "<pre>";die; 
		 $this->load->view('product',$result);
	        
	}
	
	
}

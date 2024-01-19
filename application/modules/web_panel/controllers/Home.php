<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {
	function __construct() {
		parent::__construct();
		/* !!!!!! Warning !!!!!!!11
		 *  admin panel initialization
		 *  do not over-right or remove auth_panel/auth_panel_ini/auth_ini
		 */
	
		$this->load->model("home_model");
		$this->load->model("product_model");

	}
	public function index()
	
	{
	   
	   $result['cat'] = $this->home_model->get_all_categories_for_header();
        //foreach($result['cat'] as $ct){

                      //  $cat_id = $ct['id'];        
                //}

	     //echo "<pre>"; print_r($result['cat']); echo "<pre>";die;
	  //$result['subcat'] = $this->home_model->get_all_subcategories_for_header($cat_id); 
         
          //foreach($result['subcat'] as $sct){

                       // $scat_id = $sct['id'];        
//}
          //echo "<pre>"; print_r($result['subcat']); echo "<pre>";die; 
     //$result['subsubcat'] = $this->home_model->get_all_subsubcategories_for_header($scat_id);    
       
       $result['subcat'] = $this->home_model->get_all_subcat();
       //echo "<pre>"; print_r($result['subcat']); echo "<pre>";die; 
       $result['subsubcat'] = $this->home_model->get_all_subsubcat();    
        $result['product'] = $this->product_model->get_all_product_list(); 
        
	     $result['product1'] = $this->product_model->get_all_product_list1();
	     $result['product2'] = $this->product_model->get_all_product_list2();
	        $result['product3'] = $this->product_model->get_all_product_list3();
	        $result['product4'] = $this->product_model->get_all_product_list4();
	        $result['product5'] = $this->product_model->get_all_product_list5();
	       $result['product6'] = $this->product_model->get_all_product_list6();
	        $result['video']= $this->db->get('master_video',6)->result_array();
	        $this->db->limit(0, 6);
		$this->load->view('index',$result);
	}
	
		
	public function sub_cat()
	
	{
	    $this->db->where('master_services_id',1);
	    $result['sub_cat']=$this->db->get('master_sub_category')->result_array();
        //echo "<pre>"; print_r($result['sub_cat']); echo "<pre>";die;
    	$this->load->view('index',$result);
	}
	
  public function sub_sub_cat()
	
	{
	    $result['sub_sub_cat']=$this->db->get('master_sub_sub_category')->result_array();
        //echo "<pre>"; print_r($result['sub_sub_cat']); echo "<pre>";die;
    	$this->load->view('index',$result);
	}
	
	
	public function all_product()
	
	{
	     $result['product'] = $this->product_model->get_all_product_list(); 
	     $result['product1'] = $this->product_model->get_all_product_list1();
	     $result['product2'] = $this->product_model->get_all_product_list2();
	        $result['product3'] = $this->product_model->get_all_product_list3();
	        $result['product4'] = $this->product_model->get_all_product_list4();
	        $result['product5'] = $this->product_model->get_all_product_list5();
	       $result['product6'] = $this->product_model->get_all_product_list6();
        //echo "<pre>"; print_r($result['products']); echo "<pre>";die;
    	$this->load->view('index',$result);
	}
	
	
}

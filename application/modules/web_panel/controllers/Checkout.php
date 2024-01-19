<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends MX_Controller {
    function __construct() {
        parent::__construct();
        $this->load->library('session');
        modules::run('web_panel/User_panel_ini/user_ini');
        $this->load->helper('custom');
        $this->load->model('Checkout_model');
        $this->load->model("MailModel");
    }

	public function index()
	{      
	      $this->load->view('checkout');
	}
	
	public function checkout(){
		$data['main_content'] = $this->load->view('login',@$data);
// 		$this->load->view('front/index',$data);
	}
	
 public function customer_registration(){
     $input=	$this->input->post();
    // print_r($input);die();
    if($input){
		$customer_id = $this->Checkout_model->save_customer_info();
		
		if($customer_id){
		  //  echo 'success';
		    $this->customer_login();
		    
		    redirect("index.php/admin_panel/Admin/index");
    }

	}else{
			$this->customer_registration();//checkout means login page
		}
	}
	
	public function customer_login(){
		$cus_email = $this->input->post('cus_email',true);
		$cus_pass = md5($this->input->post('cus_password',true));
		$user_details = $this->Checkout_model->get_user_login_by_email($cus_email);
		if($cus_pass==$user_details->cus_password){
			$sdata['cus_id'] = $user_details->cus_id;
			$sdata['cus_name'] =$user_details->cus_name;
			$sdata['cus_email'] =$user_details->cus_email;
			$sdata['cus_id'] = $this->session->set_userdata($sdata);
			redirect("index.php/web_panel/Home/index");
		}else{
			$this->session->set_flashdata('flash_msg','Incorrect Email Or Password...!');
			redirect("index.php/web_panel/Home/index");
		}
	}
	
	public function billing(){
		$data= array();
		$customer_id= $this->session->userdata("cus_id");
		$data['cus_info'] = $this->Checkout_model->select_customer_info_by_id($customer_id);
		$data['main_content'] = $this->load->view('billing',@$data);
// 		$this->load->view('front/index',$data);
	}
	public function shipping(){
		 
			$data['main_content'] = $this->load->view('shipping',@$data);
// 			$this->load->view('front/index',$data);

	}
	
	public function update_billing(){
		 $this->form_validation->set_rules('cus_mobile', 'Mobile Number', 'trim|required');
		 $this->form_validation->set_rules('cus_address', 'Address', 'trim|required|min_length[5]');
		 $this->form_validation->set_rules('cus_city', 'City', 'trim|required');
		 $this->form_validation->set_rules('cus_zip', 'Zip', 'trim|required|min_length[4]');
		if($this->form_validation->run()){
			$this->Checkout_model->upate_billing_by_id();
			//$shipping_id = $this->session->userdata("shipping_id");
			$cart_total = $this->cart->total();
			if($cart_total==NUll){
				redirect("products");
			}else{
				$shipping_status= $this->input->post('shipping_info');
				if($shipping_status=="on"){
					redirect("index.php/web_panel/checkout/payment");
				}else{
				redirect("shipping");
				}
			}
		}else{
			$this->billing();
		}
	}
	
	public function payment(){
	$customer_id = $this->session->userdata('cus_id');
	if($customer_id==NUll){
		redirect("checkout");
	}else{
		$data['main_content'] = $this->load->view('payment',@$data);
// 		$this->load->view('front/index',$data);
		}
	}
	
	public function customer_logout(){
		$this->session->sess_destroy();
		redirect("Home");
	}
	
	public function insert_shipping(){
		$this->form_validation->set_rules('cus_mobile', 'Mobile Number', 'trim|required');
		 $this->form_validation->set_rules('cus_address', 'Address', 'trim|required|min_length[5]');
		 $this->form_validation->set_rules('cus_city', 'City', 'trim|required');
		 $this->form_validation->set_rules('cus_zip', 'Zip', 'trim|required|min_length[4]');
		 $this->form_validation->set_rules('cus_email', 'Email', 'trim|required|valid_email');
		 $this->form_validation->set_rules('cus_name', 'Email', 'trim|required');
			if($this->form_validation->run()){
			$this->Checkout_model->insert_shipping();
			redirect("payment");
		}else{
			$this->shipping();
		}
	}
	
	
	public function place_order(){

		$payment_method = $this->input->post('payment_gateway',true);
		if($payment_method!=NUll){
			$this->Checkout_model->save_payment_info();
			if($payment_method=='cash_on_delivery'){
				$this->Checkout_model->save_order_info();
				// start Order Successfull mail 

		$mdata = array();
		$mdata['cus_full_name'] = $this->session->userdata("cus_name");
		$mdata['to'] = $this->session->userdata("cus_email");
		$mdata['from'] = "citysoftweb@gmail.com";
		$mdata['admin_full_name'] = "sunilsingh.com";
		$mdata['subject'] = "Order Successfully Complete......";

		$mdata['g_total'] = $this->session->userdata("g_total");



		$this->MailModel->Order_success_mail_send($mdata,'order_successfull');

		// end Order successfull  mail 
		$this->cart->destroy();
				redirect('index.php/web_panel/checkout/order_success');
			}
			if($payment_method=='paypal'){
				
			}
		}else{
			$this->session->set_flashdata("flash_msg","<font class='btn-warning alert alert-danger'>Please Select A Payment Pemthod</font>");
			redirect("payment");
		}
	}
	
	
	public function order_success(){
		$data =array();
	
		$data['main_content'] = $this->load->view('order_success',@$data);
	
// 		$this->load->view('front/index',$data);
	}
}

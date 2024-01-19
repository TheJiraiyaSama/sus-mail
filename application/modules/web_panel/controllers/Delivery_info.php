<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delivery_info extends MX_Controller {

	
	public function index()
	{
		$this->load->view('delivery-information');
	}
}

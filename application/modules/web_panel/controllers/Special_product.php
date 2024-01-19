<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Special_product extends MX_Controller {

	
	public function index()
	{
		$this->load->view('special-product');
	}
}

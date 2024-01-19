<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gift_certificate extends MX_Controller {

	
	public function index()
	{
		$this->load->view('gift-certificate');
	}
}

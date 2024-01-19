<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Terms extends MX_Controller {

	
	public function index()
	{
		$this->load->view('terms');
	}
}

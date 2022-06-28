<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class signup extends CI_Controller {

	public function index()
	{   
		$this->load->view('main_header');
		$this->load->view('signup_view');
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

	public function index()
	{   
		$this->load->view('main_header');
		$this->load->view('home_view');
	}
}

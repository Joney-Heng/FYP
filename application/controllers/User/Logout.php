<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('User_model');
    }

	public function logout() {
		$this->session->sess_destroy(); // Destroy the user's session
		redirect('home'); // Redirect the user to the login page
	}
	
}

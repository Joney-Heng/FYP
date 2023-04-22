<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('User_model');
    }

	public function index()
	{   
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if ($this->form_validation->run() == FALSE) {	
			$this->load->view('login_view');
		} else {
			$this->load->model('User_model');
			
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			
			$user = $this->User_model->get_user_by_email_password($email, $password);
		  
			if ($user) {
				// Set user session data and redirect to dashboard
				$this->session->set_userdata('user_id', $user->id);
				redirect('mainsite');
			} else {
				$this->session->set_flashdata('error_message', 'Invalid email or password');
				redirect('user/login');
			}
		}
	  
	}
}

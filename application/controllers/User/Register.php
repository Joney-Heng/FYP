<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('User_model');
    }
  
    public function index() {
      $this->load->helper('form');
      $this->load->library('form_validation');
      
      $this->form_validation->set_rules('name', 'Name', 'required');
      $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
      $this->form_validation->set_rules('password', 'Password', 'required');
      $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
      
      if ($this->form_validation->run() == FALSE) {
        $this->load->view('register_view');
      } else {
        $this->load->model('user_model');
        
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        
        $user_data = array(
          'name' => $name,
          'email' => $email,
          'password' => md5($password) // you may want to use a stronger encryption algorithm
        );
        
        $user_id = $this->User_model->create_user($user_data);
        
        if ($user_id) {
          // Set user session data and redirect to dashboard
          $this->session->set_userdata('user_id', $user_id);
          redirect('mainsite');
        } else {
          $this->session->set_flashdata('error_message', 'Failed to create user');
          redirect('user/register');
        }
      }
    }
    
  }

?>

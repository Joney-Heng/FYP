<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends CI_Controller
{

//   public function __construct()
//   {
//     parent::__construct();
//     $this->load->library('form_validation');
//     $this->load->library('session');
//     $this->load->model('Product_model');
//   }

  /*
      Display all records in page
   */
  public function index()
  {
    $data['title'] = 'Admin Dashboard';
    $this->load->view('layout/admin_header');
    $this->load->view('admin/dashboard', $data);
    // $this->load->view('layout/footer');
  }
}

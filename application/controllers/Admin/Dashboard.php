<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends CI_Controller
{

  public function index()
  {
    $data['title'] = 'Admin Dashboard';
    $this->load->view('layout/_loading');
    $this->load->view('layout/admin_header');
    $this->load->view('admin/dashboard', $data);
    // $this->load->view('layout/footer');
  }
}

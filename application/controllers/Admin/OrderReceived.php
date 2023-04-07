<?php
defined('BASEPATH') or exit('No direct script access allowed');
class OrderReceived extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->library('session');
    $this->load->model('Product_model');
    $this->load->model('Order_model');

  }

  public function index()
  {
    $data['orders'] = $this->Order_model->get_OrderSuccess();
    $data['title'] = 'Order Received';
    $this->load->view('layout/admin_header');
    $this->load->view('admin/order_received', $data);
    // $this->load->view('layout/footer');
  }

  public function show($id)
  {
    $data['order'] = $this->Order_model->get($id);
    $data['product'] = $this->Order_model->getDetailsbyOrderID($id);
    $data['title'] = "Order Details";
    $this->load->view('layout/admin_header');
    $this->load->view('admin/order_details', $data);
    // $this->load->view('layout/footer'); 
  }

}

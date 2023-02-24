<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Order extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->library('session');
    $this->load->model('Order_model');
  }

  public function index()
  {
    $data['addressbooks'] = $this->Address_model->getAddressbyUserId(1);

    // $this->load->view('layout/header');
    $this->load->view('mainsite/shopping-cart', $data);
  }

  public function createOrder()
  {
      $this->Order_model->createOrderbyUserID($this->input->post('user_id'));
  }

  public function deleteAddress()
  {
    $this->Order_model->deleteAddressbyId($this->input->post('address_id'));
  }

  public function updateAddress()
  {
    echo json_encode($this->Order_model->updateAddressbyID($this->input->post('address_id')));
  }

  public function getAddressDetails()
  {
    echo json_encode($this->Order_model->getAddressbyUserId(1));

  }

  public function getDefaultAddressDetails()
  {
    echo json_encode($this->Order_model->getDefaultAddressbyUserId(1));

  }
}

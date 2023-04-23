<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Address extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->library('session');
    $this->load->model('Address_model');
  }

  public function index()
  {
    // $data['products'] = $this->Product_model->get_all();
    $data['title'] = 'Address Book';
    $data['addressbooks'] = $this->Address_model->getAddressbyUserId($this->session->userdata('user_id'));

    // $this->load->view('layout/header');
    $this->load->view('mainsite/shopping-cart', $data);
  }

  public function addAddress()
  {
      $this->Address_model->insert();
  }

  public function deleteAddress()
  {
    $this->Address_model->deleteAddressbyId($this->input->post('address_id'));
  }

  public function updateAddress()
  {
    echo json_encode($this->Address_model->updateAddressbyID($this->input->post('address_id')));
  }

  public function getAddressDetails()
  {
    echo json_encode($this->Address_model->getAddressbyUserId($this->session->userdata('user_id')));

  }

  public function getDefaultAddressDetails()
  {
    echo json_encode($this->Address_model->getDefaultAddressbyUserId($this->session->userdata('user_id')));

  }
}

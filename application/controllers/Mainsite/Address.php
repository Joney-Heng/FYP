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
    $data['addressbooks'] = $this->Address_model->getAddressbyUserId(1);

    // $this->load->view('layout/header');
    $this->load->view('mainsite/shopping-cart', $data);
  }

  public function addAddress()
  {
      $this->Address_model->insert();
  }

  public function deleteAddress()
  {
    $this->Address_model->deleteAddressbyAddressId($this->input->post('address_id'));
  }

  public function updateAddress()
  {
    $cart_item = $this->Address_model->getCartbyUserIDandProductId($this->input->post('product_id'), 1);
    if ($cart_item) {

      $this->Address_model->updateQuantitybyID($cart_item->id, $this->input->post('selected_quantity'));
    } else {

      $this->Address_model->insert();
    }

    echo json_encode(array());
  }

  public function getAddressDetails()
  {
    echo json_encode($this->Address_model->getAddressbyUserId(1));

  }

  public function getDefaultAddressDetails()
  {
    echo json_encode($this->Address_model->getDefaultAddressbyUserId(1));

  }
}

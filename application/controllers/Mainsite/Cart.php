<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Cart extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->library('session');
    $this->load->model('Cart_model');
    $this->load->model('Order_model');

    $this->load->library('paypal_lib'); 
  }

  /*
      Display all records in page
   */
  public function index()
  {
    // $data['products'] = $this->Product_model->get_all();
    $data['title'] = 'Shopping Cart';
    $data['orders'] = $this->Order_model->get_Order();
    $this->load->view('layout/_loading');
    $this->load->view('layout/header');
    $this->load->view('mainsite/shopping-cart', $data);
    $this->load->view('layout/footer');

    // 
    // echo json_encode($this->Cart_model->getCartbyUserId(1)); 
    // $data["response"] = $this->Cart_model->getCartbyUserId(1);exit;
    // $this->Cart_model->getCartbyUserId());
    // $this->load->view('layout/footer');
  }

  public function addtoCart()
  {
    $cart_item = $this->Cart_model->getCartbyUserIDandProductId($this->input->post('product_id'), $this->session->userdata('user_id'));
    if ($cart_item) {
      //Update the new quantity to DB quantity

      // echo json_encode($cart_item->id);
      // exit;

      // echo json_encode((int)$this->input->post('selected_quantity'));
      // exit; //New quantity

      // echo json_encode((int)$cart_item->selected_quantity);
      // exit; //DB quantity

      $this->Cart_model->updateQuantitybyID($cart_item->id, (int)$this->input->post('selected_quantity') + (int)$cart_item->selected_quantity);
    } else {

      $this->Cart_model->insert();
    }
    echo json_encode(array());
  }

  public function deleteCart()
  {
    $this->Cart_model->deleteCartbyCartId($this->input->post('cart_id'));
  }

  public function updateCart()
  {
    $cart_item = $this->Cart_model->getCartbyUserIDandProductId($this->input->post('product_id'), $this->session->userdata('user_id'));
    if ($cart_item) {

      $this->Cart_model->updateQuantitybyID($cart_item->id, $this->input->post('selected_quantity'));
    } else {

      $this->Cart_model->insert();
    }

    echo json_encode(array());
  }

  public function getCartDetails()
  {
    echo json_encode($this->Cart_model->getCartbyUserId($this->session->userdata('user_id')));
  }
}
?>
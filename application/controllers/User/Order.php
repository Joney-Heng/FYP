<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Order extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->library('session');
    $this->load->library('paypal_lib');

    $this->load->model('Order_model');
    $this->load->model('Payment');
  }

  public function createOrder()
  {
      $orderNumber = $this->Order_model->createOrderbyUserID($this->session->userdata('user_id'));
      echo json_encode(['orderNumber' => $orderNumber]);
  }

  function pay($order_number) { 
    // Set variables for paypal form 
    $returnURL = base_url().'paypal/success';  //payment success url 
    $cancelURL = base_url().'paypal/cancel';  //payment cancel url 
    $notifyURL = base_url().'paypal/ipn';     //ipn url 

    //joney-todo: use order_number to get order, because you need the total amount
    $order = $this->Order_model->getOrderbyOrderNumber($order_number);
    
    // create a row of payment, and return the payment_id, because you need item_number

    $paymentID = $this->Payment->createPaymentbyOrderID($order[0]['id'],$order[0]['order_total']);

    // Add fields to paypal form 
    $this->paypal_lib->add_field('return', $returnURL); 
    $this->paypal_lib->add_field('cancel_return', $cancelURL); 
    $this->paypal_lib->add_field('notify_url', $notifyURL); 
    $this->paypal_lib->add_field('item_name', $order_number); 
    $this->paypal_lib->add_field('item_number', $paymentID); 
    $this->paypal_lib->add_field('custom', $this->session->userdata('user_id')); 

    if(is_array($order)) {
      $this->paypal_lib->add_field('amount',  $order[0]['order_total']); 
    }
     
    // Render paypal form 
    $this->paypal_lib->paypal_auto_form(); 
  }
}
?>
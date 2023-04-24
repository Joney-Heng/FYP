<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Main extends CI_Controller {
 
   public function __construct() {
      parent::__construct();
      $this->load->library('form_validation');
      $this->load->library('session');
      $this->load->model('Product_model');
      $this->load->model('Order_model');
           
      // Load paypal library 
      $this->load->library('paypal_lib'); 
   }
 
   /*
      Display all records in page
   */
  public function index()
  {
    $data['products'] = $this->Product_model->get_all();
    $data['title'] = 'Mainsite - Shopping View';
    $this->load->view('layout/_header');
    $this->load->view('mainsite/main_view',$data);
    $this->load->view('layout/footer');
  }
 
  public function show($id)
  {
    $this->load->view('layout/header');
    $data['product'] = $this->Product_model->get($id);
    $data['title'] = "Product Details";
    $this->load->view('mainsite/product-details', $data);
  }

  
  //Filter Product
  public function filter_products() {
      // Retrieve the products from your database
      $this->load->model('product_model');
      $products = $this->product_model->get_products();
      
      // Sort the products by name in ascending order
      usort($products, function($a, $b) {
          return strcmp($a->name, $b->name);
      });
      
      // Return the sorted products as JSON
      echo json_encode($products);
  }

  function buy($id){ 
    $this->load->model('Product_model');

    // Set variables for paypal form 
    $returnURL = base_url().'paypal/success'; //payment success url 
    $cancelURL = base_url().'paypal/cancel'; //payment cancel url 
    $notifyURL = base_url().'paypal/ipn'; //ipn url 
     
    // Get product data from the database 
    $products = $this->Product_model->getRows($id); 
     
    // Add fields to paypal form 
    $this->paypal_lib->add_field('return', $returnURL); 
    $this->paypal_lib->add_field('cancel_return', $cancelURL); 
    $this->paypal_lib->add_field('notify_url', $notifyURL); 
    $this->paypal_lib->add_field('item_name', $products['name']); //order Number -> auto generate order number
    // $this->paypal_lib->add_field('custom', $userID);
    $this->paypal_lib->add_field('item_number',  $products['id']); //payment ID
    $this->paypal_lib->add_field('amount',  $products['price']); 
    $this->paypal_lib->add_field('amount',  $products['price']); //payment Gross = Order Total
     
    // Render paypal form 
    $this->paypal_lib->paypal_auto_form(); 
  }

  public function getUserOrder() {
    
    $data['orders'] = $this->Order_model->getOrderbyUserID($this->session->userdata('user_id'));

    $this->load->view('layout/_loading');
    $this->load->view('layout/header');
    $this->load->view('mainsite/order_view', $data);
    $this->load->view('layout/footer');
  }
}
?>
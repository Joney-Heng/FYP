<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Main extends CI_Controller {
 
   public function __construct() {
      parent::__construct();
      $this->load->library('form_validation');
      $this->load->library('session');
      $this->load->model('Product_model');
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
    // $this->load->view('layout/footer');
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
}
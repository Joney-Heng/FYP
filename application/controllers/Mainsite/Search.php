<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Search extends CI_Controller {
 
   public function __construct() {
      parent::__construct();
      $this->load->library('form_validation');
      $this->load->library('session');
      $this->load->model('Product_model');
   }
   public function index() {
    // load the view for the search page
    $this->load->view('main_view');
  }

  public function search() {
    // get the search query from the AJAX request
    $search_query = $this->input->post('search_query');

    // load the model for the products
    $this->load->model('product_model');

    // call the method to search for products
    $results = $this->product_model->search_products($search_query);

    // return the results as JSON
    echo json_encode($results);
  }
  
}
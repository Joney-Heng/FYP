<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product extends CI_Controller {
 
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
    $data['title'] = 'Products Management';
    // $this->load->view('layout/header');
    $this->load->view('product/index',$data);
    // $this->load->view('layout/footer');
  }
 
  /*
 
    Display a record
  */
  public function show($id)
  {
    $data['product'] = $this->Product_model->get($id);
    $data['title'] = "Show Products";
    // $this->load->view('layout/header');
    $this->load->view('product/show', $data);
    // $this->load->view('layout/footer'); 
  }
 
  /*
    Create a record page
  */
  public function create()
  {
    $data['title'] = "Create Products";
    // $this->load->view('layout/header');
    $this->load->view('product/create',$data);
    // $this->load->view('layout/footer');
  }
 
  /*
    Save the submitted record
  */
  public function store()
  {  
    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('description', 'Description', 'required');
 
    if (!$this->form_validation->run())
    {
        $this->session->set_flashdata('errors', validation_errors());
        redirect(base_url('product/create'));
    }
    else
    {
       $this->Product_model->store();
       $this->session->set_flashdata('success', "Saved Successfully!");
       redirect(base_url('product'));
    }
 
  }
 
  /*
    Edit a record page
  */
  public function edit($id)
  {
    $data['product'] = $this->Product_model->get($id);
    $data['title'] = "Edit Product";
    // $this->load->view('layout/header');
    $this->load->view('product/edit', $data);
    // $this->load->view('layout/footer');    
  }
 
  /*
    Update the submitted record
  */
  public function update($id)
  {
    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('description', 'Description', 'required');
 
    if (!$this->form_validation->run())
    {
        $this->session->set_flashdata('errors', validation_errors());
        redirect(base_url('product/edit/' . $id));
    }
    else
    {
       $this->Product_model->update($id);
       $this->session->set_flashdata('success', "Updated Successfully!");
       redirect(base_url('product'));
    }
 
  }
 
  /*
    Delete a record
  */
  public function delete($id)
  {
    $item = $this->Product_model->delete($id);
    $this->session->set_flashdata('success', "Deleted Successfully!");
    redirect(base_url('product'));
  }
 
 
}
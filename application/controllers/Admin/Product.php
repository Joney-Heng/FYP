<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Product extends CI_Controller
{

  public function __construct()
  {
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
    $this->load->view('layout/admin_header');
    $this->load->view('product/index', $data);
    // $this->load->view('layout/footer');
  }

  /*
 
    Display a record
  */
  public function show($id)
  {
    $data['product'] = $this->Product_model->get($id);
    $data['title'] = "Show Products";
    $this->load->view('layout/admin_header');
    $this->load->view('product/show', $data);
    // $this->load->view('layout/footer'); 
  }

  /*
    Create a record page
  */
  public function create()
  {
    $data['title'] = "Create Products";
    $this->load->view('layout/admin_header');
    $this->load->view('product/create', $data);
    // $this->load->view('layout/footer');
  }

  /*
    Save the submitted record
  */
  public function store()
  {

    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('description', 'Description', 'required');

    if (!$this->form_validation->run()) {
      $this->session->set_flashdata('errors', validation_errors());
      redirect(base_url('product/create'));
    } else {
      $this->Product_model->store();
      $this->session->set_flashdata('success', "Saved Successfully!");
      redirect(base_url('product'));
    }
  }

  public function uploadImage()
  {
    // // $target_dir = "uploads/";
    // // $target_file = $target_dir . basename($_FILES["multipartFile"]["name"]);

    // // move_uploaded_file($_FILES["multipartFile"]["tmp_name"], $target_file);

    // $postData = array(
    //   "file" => new CURLFile($_FILES['multipartFile']['tmp_name'], $_FILES['multipartFile']['type'], $_FILES['multipartFile']['name'])
    // );
    // echo json_encode($_FILES['multipartFile']); exit;

    // $postHeaderData = array(
    //   'Content-Type: multipart/form-data',
    //   'Accept: */*'
    //   // $this->session->userdata("key") . ': ' . $this->session->userdata("jwtToken")
    // );
    // // Prepare new cURL resource
    // $response = $this->initiateCurl('https://storage-api-ten.vercel.app/files', $postData, $postHeaderData);
    // echo json_encode($response); exit;
    // echo json_encode(array("status" => true, "msg" => $response));

    $uploadDir = 'uploads/';
    $uploadedFile = $uploadDir . basename($_FILES['multipartFile']['name']);

    move_uploaded_file($_FILES['multipartFile']['tmp_name'], $uploadedFile);

    // C:\wamp64\www\FYP\application\controllers\Admin\Product.php

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://storage-api-ten.vercel.app/files',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => array('file'=> new CURLFILE('C:/wamp64/www/FYP/' . $uploadedFile)),
      CURLOPT_SSL_VERIFYPEER => false,
    ));

    $response = curl_exec($curl);
    $error = curl_error($curl);
    
    curl_close($curl);
    
    if ($error) {
      echo "cURL Error: $error";
    } else {
      echo $response;
    }

  }

  function initiateCurl($url, $postData, $postHeaderData)
  {
    // echo ($url); exit;

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLINFO_HEADER_OUT, true);

    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

    // Set HTTP Header for POST request 
    curl_setopt($ch, CURLOPT_HTTPHEADER, $postHeaderData);

    // Submit the POST request
    $result = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    // Close cURL session handle
    curl_close($ch);
    // $response = json_decode($result, true); 
    // $response["headerCode"] = $httpCode;
    echo $result;exit;
    $response = $result;
    // echo json_encode(array($httpCode, $result));exit;
    return $result;
  }

  /*
    Edit a record page
  */
  public function edit($id)
  {
    $data['product'] = $this->Product_model->get($id);
    $data['title'] = "Edit Product";
    $this->load->view('layout/admin_header');
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

    if (!$this->form_validation->run()) {
      $this->session->set_flashdata('errors', validation_errors());
      redirect(base_url('product/edit/' . $id));
    } else {
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

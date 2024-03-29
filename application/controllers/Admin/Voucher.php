<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Voucher extends CI_Controller
{

    public function __construct()
    {
      parent::__construct();
      $this->load->library('form_validation');
      $this->load->library('session');
      $this->load->model('Voucher_model');
    }

    /*
      Display all records in page
   */
    public function index()
    {
      $data['vouchers'] = $this->Voucher_model->get_all();
      $data['title'] = 'Voucher Management';
      $this->load->view('layout/admin_header');
      $this->load->view('voucher/index', $data);
      // $this->load->view('layout/footer');
    }

    /*
 
    Display a record
  */
    public function show($id)
    {
      $data['vouchers'] = $this->Voucher_model->getVoucherDetails($id);
      $data['title'] = "Show Voucher";
      $this->load->view('layout/admin_header');
      $this->load->view('voucher/show', $data);
      // $this->load->view('layout/footer'); 
    }

    /*
    Create a record page
  */
    public function create()
    {
      $data['title'] = "Create Voucher";
      $this->load->view('layout/admin_header');
      $this->load->view('voucher/create', $data);
      // $this->load->view('layout/footer');
    }

    /*
    Save the submitted record
  */
    public function store()
    {
      $this->Voucher_model->store();
    }

    /*
    Edit a record page
  */
    public function edit($id)
    {
      $data['voucherDetails'] = $this->Voucher_model->getVoucherDetails($id);
      $data['title'] = "Edit voucher";
      $this->load->view('layout/admin_header');
      $this->load->view('voucher/edit', $data);
      // $this->load->view('layout/footer');    
    }

    /*
    Update the submitted record
  */
    public function update($id)
    {
      $this->form_validation->set_rules('campaignName', 'Name', 'required');
      // $this->form_validation->set_rules('description', 'Description', 'required');Pcr

      if (!$this->form_validation->run()) {
          $this->session->set_flashdata('errors', validation_errors());
          redirect(base_url('voucher/edit/' . $id));
      } else {
          $this->Voucher_model->update($id);
          $this->session->set_flashdata('success', "Updated Successfully!");
          redirect(base_url('voucher'));
      }
    }

    public function deleteVoucher()
    {
      echo json_encode( $this->Voucher_model->deleteVoucherbyID($this->input->post('voucher_id')));
    }

    public function getAvailableVouchers()
    {
      echo json_encode($this->Voucher_model->getAvailableVouchersbyDate());
    }

    public function getAppliedVoucherDetails()
    {
      echo json_encode($this->Voucher_model->getAppliedVoucherbyID($this->input->post('voucher_id')));
    }

    public function generate_vouchers() {
      $this->load->model('voucher_model');
      $this->voucher_model->insert_voucher_codes($voucher_code, $quantity);
      
      echo 'success';
    }

    public function getAvailableRedeemVouchers()
    {
      $this->load->model('voucher_model');
      echo json_encode($this->voucher_model->getAvailableRedeemVouchers($this->session->userdata('user_id')));
    }

    public function getClaimedRedeemVouchers()
    {
      $this->load->model('voucher_model');
      echo json_encode($this->voucher_model->getRedeemedVouchers($this->session->userdata('user_id')));
    }

    public function updateClaimedVoucher()
    {
      $this->load->model('voucher_model');
      $voucherID = $this->input->post('voucher_id');
      echo json_encode($this->voucher_model->updateClaimedVoucherbyUserID($this->session->userdata('user_id'),$voucherID));
    }
}

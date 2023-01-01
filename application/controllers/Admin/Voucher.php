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
        // $this->load->view('layout/header');
        $this->load->view('voucher/index', $data);
        // $this->load->view('layout/footer');
    }

    /*
 
    Display a record
  */
    public function show($id)
    {
        $data['voucher'] = $this->Voucher_model->getVoucherDetails($id);
        $data['title'] = "Show Voucher";
        // $this->load->view('layout/header');
        $this->load->view('voucher/show', $data);
        // $this->load->view('layout/footer'); 
    }

    /*
    Create a record page
  */
    public function create()
    {
        $data['title'] = "Create Voucher";
        // $this->load->view('layout/header');
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
        // $this->load->view('layout/header');
        $this->load->view('voucher/edit', $data);
        // $this->load->view('layout/footer');    
    }

    /*
    Update the submitted record
  */
    public function update($id)
    {
        $this->form_validation->set_rules('campaignName', 'Name', 'required');
        // $this->form_validation->set_rules('description', 'Description', 'required');

        if (!$this->form_validation->run()) {
            $this->session->set_flashdata('errors', validation_errors());
            redirect(base_url('voucher/edit/' . $id));
        } else {
            $this->Voucher_model->update($id);
            $this->session->set_flashdata('success', "Updated Successfully!");
            redirect(base_url('voucher'));
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

    public function getAvailableVouchers()
    {
        echo json_encode($this->Voucher_model->getAvailableVouchersbyDate());
    }

    public function getAppliedVoucherDetails()
    {
        echo json_encode($this->Voucher_model->getAppliedVoucherbyID($this->input->post('voucher_id')));
    }
}

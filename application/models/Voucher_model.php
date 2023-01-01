<?php
 
 
class Voucher_model extends CI_Model{
 
    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('date');
    }

    public function get_all()
    {
        $vouchers = $this->db->get("vouchers")->result();
        return $vouchers;
    }
 
    public function store()
    {    
        $data = [
            'voucher_type'              => $this->input->post('voucher_type'),
            'campaign_name'             => $this->input->post('campaign_name'),
            'discount_type'             => $this->input->post('discount_type'),
            'min_spend'                 => $this->input->post('min_spend'),
            'capped_amount'             => $this->input->post('capped_amount'),
            'voucher_code'              => $this->input->post('voucher_code'),
            'voucher_quantity'          => $this->input->post('voucher_quantity'),
            'start_date'                => date('Y-m-d H:i:s', strtotime($this->input->post('start_date'))),
            'end_date'                  => date('Y-m-d H:i:s', strtotime($this->input->post('end_date'))),
            'voucher_status'            => $this->input->post('voucher_status'),
        ];
        $result = $this->db->insert('vouchers', $data);
        return $result;
    }
 
    public function getVoucherDetails($id)
    {
        $voucherDetails = $this->db->get_where('vouchers', ['id' => $id ])->row();
        return $voucherDetails;
    }
 
    public function update($id) 
    {
        $data = [
            'voucher_type'              => $this->input->post('voucherType'),
            'campaign_name'             => $this->input->post('campaignName'),
            'discount_type'             => $this->input->post('discountType'),
            'min_spend'                 => $this->input->post('minSpend'),
            'capped_amount'             => $this->input->post('cappedAmount'),
            'voucher_code'              => $this->input->post('voucherCode'),
            'voucher_quantity'          => $this->input->post('voucherQuantity'),
            'start_date'                => date('Y-m-d H:i:s', strtotime($this->input->post('startDate'))),
            'end_date'                  => date('Y-m-d H:i:s', strtotime($this->input->post('endDate'))),
            'voucher_status'            => empty($this->input->post('voucher_status')) ? 0 : 1,
        ];

        $result = $this->db->where('id',$id)->update('vouchers',$data);
        return $result;
                 
    }

    public function delete($id)
    {
        $result = $this->db->delete('products', array('id' => $id));
        return $result;
    }

    public function getAvailableVouchersbyDate()
    {
        $this->db->select('*');
        // $this->db->from('vouchers');
        // $this->db->where('start_date <= ', date('Y-m-d H:i:s', time()));
        // $this->db->where('end_date >= ', date('Y-m-d H:i:s', time()));
        $this->db->where('voucher_status', 1);
        
        $vouchers = $this->db->get('vouchers');
        return $vouchers->result_array();
    }

    public function getAppliedVoucherbyID($id)
    {
        $this->db->select('*');
        $this->db->from('vouchers');
        $this->db->where('id', $id);
        
        $vouchers = $this->db->get();
        return $vouchers->result_array();

    }
     
}
?>
<?php
 
 
class Voucher_model extends CI_Model{
 
    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('date');
        $this->load->library('session'); // Load the session library
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

        $quantity = $this->input->post('voucher_quantity');
        $savedID = $this->db->insert_id();
        
        // loop quantity and pass code to the voucher_details table
        for ($i = 0; $i < $quantity; $i++) {
            $code = "";  // generate a 6-digit random code
            // Check DB's code == $code 

            do {
                $code = $this->input->post('voucher_code') . '-' . mt_rand(100000, 999999); 
                $this->db->select('voucher_code');
                $this->db->from('voucher_details');
                $this->db->where('voucher_code', $code);
                
                $db_code = $this->db->get()->row();

            }  while($db_code != null); //true run again

            $data = array(
                'voucher_code' => $code,
                'claimed_status' => 'NEW',
                'voucher_id' => $savedID,
            );

            $result = $this->db->insert('voucher_details', $data);
        }
        
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

    public function deleteVoucherbyID($id)
    {
        $result = $this->db->delete('vouchers', array('id' => $id));
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
        return $vouchers->row();
    }
     
    // public function insert_voucher_codes($quantity) {
    //     for ($i = 0; $i < $quantity; $i++) {
    //       $code = 'VOU' . mt_rand(100000, 999999); // generate a 6-digit random code
          
    //       $data = array(
    //         'voucher_code' => $code,
    //         'voucher_status' => 'NEW', // You can set the quantity to 1 for each voucher generated
    //       );
          
    //       $this->db->insert('voucher', $data);
    //     }
    // }

    public function getAvailableRedeemVouchers($user_id)
    {
        $this->db->select('voucher_id');
        $this->db->from('voucher_details');
        $this->db->where('user_id',$user_id); // check user get what vouchers

        $query = $this->db->get();

        $result_array = [];
        foreach ($query->result() as $row) {
            $result_array[] = $row->voucher_id;
        }

        $this->db->select('*');
        $this->db->from('vouchers');

        if(count($result_array) > 0) {
            $this->db->where_not_in('id', $result_array); //Claimed
        }

        // $this->db->where_not_in('id', $result_array); //Claimed
        // $this->db->join('products','carts.product_id = products.id');

        $vouchers = $this->db->get();
        return $vouchers->result_array();
    }

    public function getRedeemedVouchers($user_id)
    {
        $this->db->select('voucher_id');
        $this->db->from('voucher_details');
        $this->db->where('claimed_status', 'CLAIMED');
        $this->db->where('user_id',$user_id); // check user get what vouchers

        $query = $this->db->get();

        $result_array = [];
        foreach ($query->result() as $row) {
            $result_array[] = $row->voucher_id;
        }

        $this->db->select('*');
        $this->db->from('vouchers');
        if(count($result_array) > 0) {
            $this->db->where_in('id', $result_array); //Claimed
        }

        else {
            $this->db->where('id', -1); 
        }

        $vouchers = $this->db->get();
        return $vouchers->result_array();
        
    }

    public function updateClaimedVoucherbyUserID($user_id, $voucherID)
    {
        $this->db->select('*');
        $this->db->from('vouchers');
        $this->db->where('id',$voucherID); // check voucher valid in DB or not

        $voucher = $this->db->get()->row();

        if($voucher == null) {
            echo json_encode(['result'=>false,'message'=> 'voucher not found']); // If not valid return error message
            exit;
        }

        $this->db->select('*');
        $this->db->from('voucher_details');
        $this->db->where('user_id',$user_id);
        $this->db->where('voucher_id',$voucherID);

        $check_voucher_details_claimed = $this->db->get()->row();

        if($check_voucher_details_claimed != null) {
            echo json_encode(['result'=>false,'message'=> 'You have claimed this voucher before.']); // If not valid return error message
            exit;
        }

        $this->db->select('*');
        $this->db->from('voucher_details');
        $this->db->where('voucher_id',$voucherID);
        $this->db->where('user_id', 0);   // check user_id == 0 means havent claim

        $available_voucher_details = $this->db->get()->row();

        if($available_voucher_details == null) { // null means that all voucher been claimed
            echo json_encode(['result'=>false,'message'=> 'All vouchers has been fully redeemed']); // If not valid return error message
            exit;
        }

        $update_voucher_details_data = [
            'claimed_status'    => 'CLAIMED',
            'user_id'           => $user_id
        ];
        
        $result = $this->db->where('id',$available_voucher_details->id)->update('voucher_details',$update_voucher_details_data);
        return $result;
    }

    public function updateVoucherDetailStatus($id, $newStatus)
    {
        $data = [
            'claimed_status'            => $newStatus,
        ];

        $result = $this->db->where('id',$id)->update('voucher_details',$data);
        return $result;
                 
    }

    public function getVoucherDetailByUserIDAndVoucherID($userID, $voucherID)
    {
        $this->db->select('*');
        $this->db->from('voucher_details');
        $this->db->where('voucher_id',$voucherID);
        $this->db->where('user_id', $userID);

        $voucher_details = $this->db->get()->row();
        return $voucher_details;
                 
    }
}
?>
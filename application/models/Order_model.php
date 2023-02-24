<?php
 

class Order_model extends CI_Model{
 
    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('date');
    } 
    
    public function createOrderbyUserID($id)
    {    
        $data = [
            'order_number'          => 1,
            'receiver_name'         => $this->input->post('receiver_name'),
            'receiver_contact_no'   => $this->input->post('receiver_contact_no'),
            'shipping_address'      => $this->input->post('shipping_address'),
            'order_created'         => date('Y-m-d H:i:s', time()),
            'courier_company'       => $this->input->post('courier_company'),
            'shipping_amount'       => $this->input->post('shipping_amount'),
            'voucher_amount'        => $this->input->post('voucher_amount'),
            'voucher_code_applied'  => $this->input->post('voucher_code_applied'),
            'product_subtotal'      => $this->input->post('product_subtotal'),
            'order_total'           => $this->input->post('order_total'),
            'order_status'          => 1,
            'user_id'               => 1,
        ];

        $this->db->where('user_id', $id);

        $result = $this->db->insert('orders', $data);
        return $result;
    }

    public function updateAddressbyID($id) 
    {
        if ($this->input->post('default_address'))
        {
            $data = [
                'default_address'     => 0
            ];

            $this->db->where('user_id', 1)->update('address', $data);
        }

        $data = [
            'address_line1'         => $this->input->post('address_line1'),
            'address_line2'         => $this->input->post('address_line2'),
            'postcode'              => $this->input->post('postcode'),
            'state'                 => $this->input->post('state'),
            'city'                  => $this->input->post('city'),
            'country'               => $this->input->post('country'),
            'contact_name'          => $this->input->post('contact_name'),
            'contact_no'            => $this->input->post('contact_no'),
            'email'                 => $this->input->post('email'),
            'default_address'       => $this->input->post('default_address'),
            'user_id'               => 1,
        ];

        $this->db->where('id', $id);
        $result = $this->db->where('user_id', 1)->update('address', $data);

        return $result;
                 
    }

    public function getAddressbyUserId($id)
    {
        $this->db->select('id,address_line1,address_line2,postcode,state,city,country,contact_name,contact_no,email,default_address');
        $this->db->from('address');
        $this->db->where('user_id', $id);
        $query=$this->db->get();
        return $query->result_array();
    }

    public function deleteAddressbyId($id)
    {
        $result = $this->db->delete('address', array('id' => $id));
        return $result;
    }

    public function getDefaultAddressbyUserId($id)
    {
        $this->db->select('id,address_line1,address_line2,postcode,state,city,country,contact_name,contact_no,email,default_address');
        $this->db->from('address');
        $this->db->where('default_address', 1);
        $this->db->where('user_id', $id);

        $query=$this->db->get();
        return $query->result_array();
    }
     
     
}
?>
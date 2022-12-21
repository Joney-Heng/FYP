<?php
 
class Address_model extends CI_Model{
 
    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('date');
    }

    public function insert()
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

        $result = $this->db->insert('address', $data);
        return $result;
    }

    public function updateQuantitybyID($id,$quantity) 
    {
        $data = [
            'selected_quantity'     => $quantity
        ];

        $result = $this->db->where('id',$id)->update('carts',$data);
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

    public function getCartbyUserIDandProductId($product_id, $user_id)
    {
        
        $cart = $this->db->get_where('carts', ['product_id' => $product_id,'user_id' => $user_id ])->row();
        return $cart;
    }

    public function deleteCartbyCartId($id)
    {
        $result = $this->db->delete('carts', array('id' => $id));
        return $result;
    }
     
}

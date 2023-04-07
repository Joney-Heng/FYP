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
        // Generate a new order number
        $order_number = '';

        do {
            // Generate a new order number
            $timestamp = round(microtime(true) * 1000);
            $random_num = str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT);
            $order_number = 'ORD' . $timestamp . $random_num;
            $this->db->where('order_number', $order_number);
            $result = $this->db->get('orders');
        } while ($result->num_rows() > 0); // If order number already exists, generate a new one
        
        $data = [
            'order_number'          => $order_number,
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
            'order_status'          => 'ORDER CREATED',
            'user_id'               => $id,
        ];
        

        $result = $this->db->insert('orders', $data);

        // get last order
        $lastOrderID = $this->db->insert_id();
        
        // insert data to order_Details
        $orderDetails = json_decode($this->input->post('product_details'));
        foreach($orderDetails as $orderItem) {
            // insert order item to db
            $data = [
                'order_id'          => $lastOrderID,
                'product_id'        => $orderItem->productID,
                'quantity'          => $orderItem->quantity
            ];
            $result = $this->db->insert('order_details', $data);
        }

        // Clear Shopping Cart by User ID
        $this->db->where("user_id", $id);
        $this->db->delete("carts");

        return $order_number;
    }

    public function updateOrder($id,$data) 
    {
        $this->db->where('id', $id);
        $result = $this->db->update('Orders', $data);

        return $result;
                 
    }

    public function getOrderbyOrderNumber($order_number)
    {
        $this->db->select('*');
        $this->db->from('orders');
        $this->db->where('order_number', $order_number);
        $query=$this->db->get();
        return $query->result_array();
    }
    
    public function get_Order()
    {
        // Retrieve the products from your database
        $query = $this->db->get('orders');
        $orders = $query->result_array();
        
        // Return the order as an array of objects
        return $orders;
    }

    public function get_OrderSuccess()
    {
        // Retrieve the products from your database
        $this->db->select('*');
        $this->db->from('orders');
        $this->db->where('order_status', 'PAYMENT RECEIVED');
        $query=$this->db->get();
        $orders = $query->result_array();
        
        // Return the order as an array of objects
        return $orders;
    }

    public function get($id)
    {
        $order = $this->db->get_where('orders', ['id' => $id ])->row();
        return $order;
    }

    public function getRows($id = '')
    {
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        if($id){ 
            $this->db->where('id', $id); 
            $query = $this->db->get(); 
            $result = $query->row_array(); 
        }else{ 
            $this->db->order_by('name', 'asc'); 
            $query = $this->db->get(); 
            $result = $query->result_array(); 
        } 
         
        // return fetched data 
        return !empty($result)?$result:false; 
    }

    public function getDetailsbyOrderID($order_id)
    {
        $this->db->select('*');
        $this->db->from('order_details');
        $this->db->where('order_id', $order_id);
        $this->db->join('products', 'products.id = order_details.product_id');
        $query=$this->db->get();
        return $query->result_array();
    }
}
?>
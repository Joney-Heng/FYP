<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Payment extends CI_Model{ 
     
    function __construct() { 
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('date');
    } 
     
    /* 
     * Fetch payment data from the database 
     * @param id returns a single record if specified, otherwise all records 
     */ 
    public function getPayment($conditions = array()){ 
        $this->db->select('*'); 
        $this->db->from('payments'); 

        if(!empty($conditions)){ 
            foreach($conditions as $key=>$val){ 
                $this->db->where($key, $val); 
            } 
        } 
         
        $result = $this->db->get(); 
        return ($result->num_rows() > 0)?$result->row_array():false; 
        // return $result->result_array();

    }

    public function createPaymentbyOrderID($id,$amount)
    {    
        $data = [
            'order_id'              => $id,
            'user_id'               => 1,
            'payment_gross'         => $amount,
            'currency_code'         => 'MYR',
            'status'                => 'PENDING PAYMENT',
        ];
        
        $result = $this->db->insert('payments', $data);

        $insert_id = $this->db->insert_id();

        return $insert_id;
    }
     
    public function insertTransaction($data){ 
        $insert = $this->db->insert('payments', $data);

        return $insert ? true : false; 
    }

    public function createPayment()
    {
        $orderNumber = $this->Payment->createOrderbyUserID(1);
        echo json_encode(['orderNumber' => $orderNumber]);
    }

    public function getPaymentbyPaymentID($id)
    {
        $this->db->select('*');
        $this->db->from('payments');
        $this->db->where('id', $id);
        $this->db->order_by('id', 'desc');
        $this->db->limit(1);
        $query = $this->db->get();
        
        return $query->result_array();
    }

    public function updatePayment($id,$data) 
    {
        $this->db->where('id', $id);
        $result = $this->db->update('Payments', $data);

        return $result;
                 
    }
     
}

?>
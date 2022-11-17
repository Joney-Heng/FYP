<?php
 
 
class Cart_model extends CI_Model{
 
    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('date');
    }
 
    /*
        Get all the records from the database
    */
    // public function get_all()
    // {
    //     $products = $this->db->get("products")->result();
    //     return $products;
    // }
 
    /*
        Store the record in the database
    */

    public function insert()
    {    

        $data = [
            'product_id'            => $this->input->post('product_id'),
            'selected_quantity'     => $this->input->post('selected_quantity'),
            'user_id'               => 1
        ];

        $result = $this->db->insert('carts', $data);
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
 
    /*
        Get an specific record from the database
    */

    public function getCartbyUserId($id)
    {
        $cart = $this->db->get_where('carts', ['user_id' => $id ])->row();
        return $cart;
    }

    public function getCartbyUserIDandProductId($product_id, $user_id)
    {
        
        $cart = $this->db->get_where('carts', ['product_id' => $product_id,'user_id' => $user_id ])->row();
        return $cart;
    }

    // /*
    //     Destroy or Remove a record in the database
    // */
    public function delete($id)
    {
        $result = $this->db->delete('carts', array('id' => $id));
        return $result;
    }
     
}
?>
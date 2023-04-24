<?php
 
 
class Product_model extends CI_Model{
 
    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('date');
        $this->proTable   = 'products'; 
    }
 
    /*
        Get all the records from the database
    */
    public function get_all()
    {
        $products = $this->db->get("products")->result();
        return $products;
    }
 
    /*
        Store the record in the database
    */
    public function store()
    {    
        $data = [
            'name'              => $this->input->post('name'),
            'description'       => $this->input->post('description'),
            'price'             => $this->input->post('price'),
            'stock_quantity'    => $this->input->post('stock_quantity'),
            'sku_number'        => $this->input->post('sku_number'),
            'date_created'      => date('Y-m-d H:i:s', time()),
            'date_updated'      => date('Y-m-d H:i:s', time()),
            'photo'             => $this->input->post('product_photo'),
            'product_status'    => empty($this->input->post('product_status')) ? 0 : 1
        ];
        $result = $this->db->insert('products', $data);
        return $result;
    }
 
    /*
        Get an specific record from the database
    */
    public function get($id)
    {
        $product = $this->db->get_where('products', ['id' => $id ])->row();
        return $product;
    }
 
 
    /*
        Update or Modify a record in the database
    */
    public function update($id) 
    {
        $data = [
            'name'              => $this->input->post('name'),
            'description'       => $this->input->post('description'),
            'price'             => $this->input->post('price'),
            'stock_quantity'    => $this->input->post('stock_quantity'),
            'sku_number'        => $this->input->post('sku_number'),
            'date_updated'      => date('Y-m-d H:i:s', time()),
            'photo'             => $this->input->post('product_photo'),
            'product_status'    => empty($this->input->post('product_status')) ? 0 : 1
        ];

        $result = $this->db->where('id',$id)->update('products',$data);
        return $result;
                 
    }
 
    /*
        Destroy or Remove a record in the database
    */
    public function delete($id)
    {
        $result = $this->db->delete('products', array('id' => $id));
        return $result;
    }

    public function search_products($search_query) {
        // query the database for products that match the search query
        $this->db->select('*');
        $this->db->from('products');
        $this->db->like('name', $search_query);
        $query = $this->db->get();
    
        // return the results as an array of objects
        return $query->result();
    }

    public function get_products() {
        // Retrieve the products from your database
        $query = $this->db->get('products');
        $products = $query->result();
        
        // Return the products as an array of objects
        return $products;
    }
     
    public function getRows($id = ''){ 
        $this->db->select('*'); 
        $this->db->from('products'); 
        if($id){ 
            $this->db->where('id', $id); 
            $query = $this->db->get(); 
            $result = $query->row_array(); 
        }else{ 
            $this->db->order_by('name', 'asc'); 
            $query = $this->db->get(); 
            $result = $query->result_array(); 
        } 
         
        return !empty($result)?$result:false; 
    }

    public function getExistingQtybyID(){ 
        $this->db->select('*'); 
        $this->db->from('products'); 
         
        $stockQty=$this->db->get()->row();
        
        return $stockQty;
    }

    public function updateDetails($id, $details){ 

        $result = $this->db->where('id',$id)->update('products',$details);
        return $result;
    }
}
?>
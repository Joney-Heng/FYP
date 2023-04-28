<?php
 
 
 class User_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('date');
    }
  
    public function get_user_by_email_password($email, $password) {
        $this->db->where('email', $email);
        $this->db->where('password', md5($password)); // you may want to use a stronger encryption algorithm
        
        $query = $this->db->get('users');
        
        if ($query->num_rows() == 1) {
        return $query->row();
        } else {
        return false;
        }
    }

    public function register_user($data) {
        // Insert the user data into the database
        $this->db->insert('users', $data);

        // Get the ID of the newly created user
        $user_id = $this->db->insert_id();

        return $user_id;
    }

    public function get_user_by_email($email) {
        // Retrieve the user data from the database
        $query = $this->db->get_where('users', array('email' => $email));
        return $query->row();
    }

    public function create_user($data) {
        // Insert the user data into the database
        $this->db->insert('users', $data);

        // Get the ID of the newly created user
        $user_id = $this->db->insert_id();

        return $user_id;
    }

    public function get_user_by_id($user_id) {
        $query = $this->db->get_where('users', array('id' => $user_id)); // Retrieve the user's data from the database

        echo json_encode($query);exit;
        return $query->row(); // Return the user's data as an object

        
    }
  
}

?>

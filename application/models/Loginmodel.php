<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Loginmodel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function checkEmail($email)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email',$email);
        $this->db->where('status', 1);   
        $query = $this->db->get();
        $row = $query->row_array();
        return $row;       
    }

    public function registerUser($userData){
        $res = $this->db->insert("users", $userData);
        return $res;
    }

    
    public function getUserData($userEmail)
    {
        $this->db->where('email', $userEmail);
        $query = $this->db->get('users');
        $userData = $query->row_array();

        $_SESSION['id']     = $userData['id'];
        $_SESSION['name']   = $userData['name'];
        $_SESSION['email']  = $userData['email'];
    
    }
 
}

?>
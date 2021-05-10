<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usermodel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function addUser($dataArray){
        $res = $this->db->insert("demo_data" , $dataArray);
        return $res;
    }

    public function getAllData(){
        $this->db->select("*");
        $this->db->from("demo_data");
        $this->db->where("status",1);
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }

    public function getUserDataForEdit($id){
        $this->db->select('*');
        $this->db->from('demo_data');
        $this->db->where('id',$id);
        $query = $this->db->get();
        $data = $query->row_array();
        return $data;

    }

    public function editUser($id , $editDataArray){
        $this->db->where('id',$id);
        $res = $this->db->update('demo_data',$editDataArray);
        return $res;
    }

    public function deleteUser($id){
        $this->db->set("status",0);
        $this->db->where('id',$id);
        $res = $this->db->update('demo_data');
        return $res;
    }
 
}

?>
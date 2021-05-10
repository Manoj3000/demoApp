<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
        $this->check_session();
    }
    
    public function index(){
        $this->load->view("user/user");
    }

    public function addUser(){
        $dataArray = array(
            "name"          => $this->input->post('name'),
            "email"         => $this->input->post("email"),
            "status"        => 1,
            "created_at"    => date("Y-m-d H:i:s"),
            "created_by"    => $this->input->post("name")
        );

        $res = $this->Usermodel->addUser($dataArray);
        echo $res;
    }

    public function getAllData(){
        $data['data'] = $this->Usermodel->getAllData();
        echo json_encode($data, JSON_NUMERIC_CHECK);
    }

    public function getUserDataForEdit(){
        $id = $this->input->post('id');
        $data = $this->Usermodel->getUserDataForEdit($id);
        echo json_encode($data , JSON_NUMERIC_CHECK);
    }

    public function editUser(){
        $id = $this->input->post('id');
        $editDataArray = array(
            "name"          => $this->input->post('name'),
            "email"         => $this->input->post("email"),
            "updated_at"    => date("Y-m-d H:i:s"),
            "updated_by"    => $this->input->post("name")
        );
        $res = $this->Usermodel->editUser($id , $editDataArray);
        echo $res;
    }

    public function deleteUser(){
        $id = $this->input->post('id');
        $res = $this->Usermodel->deleteUser($id);
        echo $res;
    }


    /****************************************************************************/	

	function logout() {
		$this->session->unset_userdata('users_ID');
		$this->session->sess_destroy();
		redirect('login');
	}

	function check_session() {
		$users_ID = $this->session->userdata('users_ID');
		if(!$users_ID) {
			redirect('login');
		}
	}
}

?>
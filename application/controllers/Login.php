<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
        $this->check_session();
    }
    
    public function index(){
        $this->load->view("login_page");
    }

    public function register(){
        $this->load->view('register_page');
    }

    public function checkEmail()
    {
        $email = trim($this->input->post('email'));
        $result = $this->Loginmodel->checkEmail($email); 
        if(!empty($result))
        {
            echo true;
        }
        else
        {
            echo false;
        }
    }

    public function registerUser(){
        $userData = array(
            "name"          => $this->input->post('name'),
            "email"         => $this->input->post('email'),
            "password"      => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
            "status"        => 1,
            "created_at"    => date("Y-m-d H-i-s"),
            "created_by"    => $this->input->post('name')
        );
        $res = $this->Loginmodel->registerUser($userData);
        echo $res;
    }

    public function checkLogin() {
		$userEmail = $this->input->post('email');
        $userPass = $this->input->post('password');
        
		if($this->_resolve_user_login($userEmail,$userPass)) {
			$user_ID = $this->_get_user_ID_from_username($userEmail);
			$ip_address = $this->input->ip_address();
			$create_session = array(
				'users_ID'=> $user_ID,
				'ip_address'=> $ip_address
			);
            $this->session->set_userdata($create_session);
            $this->Loginmodel->getUserData($userEmail);
			echo $_SESSION['id'];
		}
		else
		{
			echo 0;
		}
	
	}

	private function _resolve_user_login($userEmail,$userPass) {
		$this->db->where('email',$userEmail);
		$hash = $this->db->get('users')->row('password');
		return $this->_verify_password_hash($userPass,$hash);
    }
    
    private function _verify_password_hash($userPass,$hash) {
		return password_verify($userPass,$hash);
	}

	private function _get_user_ID_from_username($userEmail) {
		$this->db->select('id');
		$this->db->from('users');
		$this->db->where('email',$userEmail);
		return $this->db->get()->row('id');
	}

    function check_session() {
		$users_ID = $this->session->userdata('users_ID');
		if($users_ID) {
			redirect('User');
		}
	}

}

?>
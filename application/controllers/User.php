<?php

class User extends CI_Controller {

	public function __construct(){

		parent::__construct();
			$this->load->helper('url');
			$this->load->model('user_model');
		$this->load->library('session');
				$this->user_model = new User_model;
	}

	public function index()
	{
		$this->load->view("register.php");
	}

	public function register_user(){

		$user=array(
			'username'=>$this->input->post('user_name'),
			'password'=>$this->input->post('user_password'),

		);
		print_r($user);
		if($user['username'] == "" || $user['password'] == "" || $user['password'] != $this->input->post('user_conf_password') || $this->input->post('user_conf_password') == "") {
			redirect('user');
		}
		else {
			$name_check=$this->user_model->name_check($user['username']);
		
			if($name_check){
				$this->user_model->register_user($user);
				$this->session->set_flashdata('success_msg', 'Registered successfully.Now login to your account.');
				unset($_SESSION['error_msg']);
				redirect('user/login_view');
			}
			else{
		
				$this->session->set_flashdata('error_msg', 'Error occured,Try again.');
				unset($_SESSION['success_msg']);
				redirect('user');
			}
		}

	}

	public function login_view(){
		$this->load->view("login.php");

	}

	function login_user(){ 
		$user_login=array(

			'username'=>$this->input->post('user_name'),
			'password'=>$this->input->post('user_password')

		); 
		//$user_login['user_email'],$user_login['user_password']
		$data['users']=$this->user_model->login_user($user_login);
		if($data['users'] == true)
			{
			
				$this->session->set_userdata('user_id',$data['users'][0]['id']);
				$this->session->set_userdata('user_name',$data['users'][0]['username']);
				echo $this->session->set_userdata('user_id'); 
				$data['flag'] = false;
				$data['data'] = [];
				redirect('ItemCRUD/westin');

		}
		else{
			$this->session->set_flashdata('error_msg', 'Error occured,Try again.');
			unset($_SESSION['success_msg']);
			$this->load->view("login.php");

		}


	}

	public function user_logout(){

		$this->session->sess_destroy();
		redirect('user/login_view', 'refresh');
	}

}

?>

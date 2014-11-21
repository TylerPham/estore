<?php

class login extends CI_Controller{
// 	function __construct() {
// 		// Call the Controller constructor
// 		parent::__construct();

// 	}
	function index(){
		$this->load->view('login.php');
// 		//load the session library
// 		$this->load->driver('session');
// 		//load the view/session.php
// 		$this->load->view('session_input');
		
	}
	
	function logout(){
				$this->session->sess_destroy();
				$this->load->view('login.php');
		
	}
	
	function login_form(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','Username', 'required|max_length[24]|alpha_numeric');
		$this->form_validation->set_rules('password','Password','required|max_length[16]');
		
		$this->load->model('customer_model');
		
		$login_info = new Customer();	
		$login_info->login = $this->input->get_post('username');
		$login_info->password = $this->input->get_post('password');
		
		if($this->form_validation->run() == TRUE && $this->customer_model->user_exists($login_info) == TRUE){
			if($login_info->login == 'admin' && $login_info->password == 'admin'){
				redirect('store/admin_control');
			}
			//$this->load->view('login_success.php');
			$this->session->set_userdata('login', $login_info);
			
			
			$this->session->set_userdata('id',$this->customer_model->get_id($login_info->login)->id);
			$this->session->set_userdata('user',$this->customer_model->get_id($login_info->login)->login);
				
			
				
			redirect('customer_store/index');
			
		}
		else{
			$this->load->view('login.php');
			//redirect('store/admin_control');
		}
	}	
	
	function register(){
		$this->load->view('register');
	}
	
	function register_form(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','Username', 'required|max_length[16]|alpha_numeric');
		$this->form_validation->set_rules('password','Password','required|min_length[6]|max_length[16]|matches[retype_password]');
		$this->form_validation->set_rules('retype_password','Password Confirmation','required|min_length[6]|max_length[16]');
		
		$this->form_validation->set_rules('firstname','First Name','required|max_length[24]');
		$this->form_validation->set_rules('lastname','Last Name','required|max_length[24]');
		
		$this->form_validation->set_rules('email','Email','required|valid_email|matches[retype_email]|max_length[45]');
		$this->form_validation->set_rules('retype_email','Email Confirmation','required|valid_email||max_length[45]');
		
		if($this->form_validation->run() == TRUE){
			
			$this->load->model('customer_model');
				
			$new_user = new Customer();
			
			$new_user->login = $this->input->get_post('username');
			$new_user->password = $this->input->get_post('password');
			$new_user->email = $this->input->get_post('email');
			$new_user->first = $this->input->get_post('firstname');
			$new_user->last = $this->input->get_post('lastname');
							
			$this->customer_model->register_newuser($new_user);
			
	
			$this->load->view('register_success.php');
		}
		else{
			$this->load->view('register.php');
		}
		
	}
}


?>
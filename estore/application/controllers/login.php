<?php

class login extends CI_Controller{
// 	function __construct() {
// 		// Call the Controller constructor
// 		parent::__construct();

// 	}
	
	function index(){
		//$this->load->helper(array('login', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','Username','required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('password','Password','required');
		
		if($this->form_validation->run() == FALSE){
			$this->load->view('login');
		}
		else{
			echo "Form succesful True";
		}
	}	
}

?>
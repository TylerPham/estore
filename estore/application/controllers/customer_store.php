<?php
class customer_store extends CI_Controller{
		function __construct() {
			// Call the Controller constructor
			parent::__construct();
		}
		
	function index(){
		$this->load->model('product_model');
		$products = $this->product_model->getAll();
		$data['products']=$products;
		//$this->load->view('product/list.php',$data);
		$this->load->view('store_customer.php', $data);
	}
	
}
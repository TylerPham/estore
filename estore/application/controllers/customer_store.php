<?php
class customer_store extends CI_Controller
{
		function __construct()
		{
			// Call the Controller constructor
			parent::__construct();
			$this->load->library('cart');
				
		}
		
	function index()
	{
		$this->load->model('product_model');
		$products = $this->product_model->getAll();
		$data['products']=$products;
		//$this->load->view('product/list.php',$data);
		
		
		$this->load->view('store_customer.php', $data);
	}
	
	function display_shopping_cart()
	{
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('quantity','Quantity', 'required|is_natural_no_zero');
		
		if($this->form_validation->run() == TRUE)
		{
			$item_id = $this->input->get_post('id');
			$item_qty = $this->input->get_post('quantity');

			$data = array(
					'id' => $item_id,
					'qty' => $item_qty,
					'price' => $this->input->get_post('price'),
					'name' => $this->input->get_post('name')					
			);

			$this->cart->insert($data);
			$this->load->view('shopping_cart.php');
		}
		else
		{
			$this->load->model('product_model');
			$products = $this->product_model->getAll();
			$data['products']=$products;
			$this->load->view('store_customer.php', $data);

		}
	}
	function lookat_cart()
	{
		$this->load->view('shopping_cart.php');
	}
	function update_cart()
	{
// 		//print_r($this->cart->contents());

		for ($i = 1; $i <= $this->cart->total_items(); $i++)
		{
			$item = $this->input->post($i);
				$data = array(
				'rowid' => $item['rowid'],
				'qty' => $item['qty']
				);
				$this->cart->update($data);
		}
		//redirect('customer_store/index');
		$this->load->view('shopping_cart.php');
    }
    
    function check_out()
    {
    	$this->load->helper('date');

		$month = date("m"); // 01 through 12
    	$year = date("Y"); // 2011

		$c_month= $this->input->post('expirymonth');
		$c_year = $this->input->post('expiryyear');

    	$this->load->library('form_validation');
		$this->form_validation->set_rules('creditnumber','Credit Card Number','required|exact_length[16]');
		$this->form_validation->set_rules('expirymonth','Expiry Month','required|is_natural_no_zero|less_than[13]');
		$this->form_validation->set_rules('expiryyear','Expiry Year','required|is_natural_no_zero');

		if($this->form_validation->run() == TRUE)
		{
			if ($c_year == $year)
			{
				if ($c_month > $month)
				{
					$this->load->view('receipt.php');
				}

				else
				{
					echo "Card Expired, please use a different card!";
					$this->load->view('check_out.php');
					//Same year expired
				}
			}

			else
			{
				if ($c_year > $year)
				{
					$this->load->view('receipt.php');
				}

				else
				{
					echo "Card Expired, please use a different card!";
					$this->load->view('check_out.php');
					//Expired
				}
			}
		}

		else
		{
			$this->load->view('check_out.php');
		}
    }
    
    function receipt(){
    	$this->load->model('order_model');
    	$this->load->helper('date');
    	 
    	//Insert the order into the orders db
    	$new_order = new Order();
    	$new_order->customer_id = $this->session->userdata('id');
    	$new_order->order_date = unix_to_human(now());
    	$new_order->order_time = gettimeofday();
    	$new_order->total = $this->input->get_post($this->cart->total());
    	$new_order->creditcard_number = $this->input->get_post('');
    	$new_order->creditcard_month = $this->input->get_post('');
    	$new_order->creditcard_year = $this->input->get_post('');
    	 
    	
    	$this->order_model->insert_order();
    	$this->load->view('receipt.php');
    }
}
	
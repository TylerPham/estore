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
    	$this->load->model('customer_model');
    	$id = $this->session->userdata('id');

    	$customer = $this->customer_model->get_email($id);
    	$email = $customer->email;

    	$this->load->library('email');
    	$config = Array(
		   'protocol' => 'smtp',
		   'smtp_host' => 'smtp.gmail.com',
		   'smtp_port' => 465,
		   'smtp_crypto' => 'ssl',
		   'smtp_user' => '309estoremail@gmail.com',
		   'smtp_pass' => 'estore123',
		   'mailtype'  => 'html', 
		   'charset'   => 'iso-8859-1',
		);

		$this->email->from('your@example.com', 'Steven and Tyler');
		$this->email->to('steven_vetson@hotmail.com');
		//$this->email->cc('another@another-example.com');
		//$this->email->bcc('them@their-example.com');

		$this->email->subject('Your Receipt is Enclosed in this Email');
		$this->email->message('Hello There.');

		$this->email->send();


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
					$this->load->model('order_model');
					$this->load->helper('date');
					
					//Insert the order into the orders db
					$new_order = new Order();
					//echo $this->cart->total()."<br>";
					
// 					echo $this->input->get_post('creditnumber'."<br>");
// 					echo $this->input->get_post('expirymonth')."<br>";
					//echo  mdate( "%h:%i", time());
					
					$new_order->customer_id = $this->session->userdata('id');
					$new_order->order_date = mdate( "%Y-%m-%d", time());
					$new_order->order_time = mdate( "%h:%i", time());
					$new_order->total = $this->cart->total();
					$new_order->creditcard_number = $this->input->get_post('creditnumber');
					$new_order->creditcard_month = $this->input->get_post('expirymonth');
					$new_order->creditcard_year = $this->input->get_post('expiryyear');

					$this->order_model->insert_order($new_order);
					//echo $this->order_model->get(483.56)->id;
					//$this->order_model->find_id($new_order);
					//echo $order_id;
					
					//print_r($this->cart->contents());
					
					$this->load->model('orderitem_model');
					$this->orderitem_model->add_all_items($this->order_model->find_id()[0]->id);					
// 					$new_order_item->product_id = $this->order_model->find_id()[0]->id;
// 					$new_order_item->
					
						
					$this->load->view('receipt.php'); /*This line needs to be here*/
					$this->session->sess_destroy();
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
					
					$this->load->model('order_model');
					$this->load->helper('date');
					
					//Insert the order into the orders db
					$new_order = new Order();
					//echo $this->cart->total()."<br>";
					
// 					echo $this->input->get_post('creditnumber'."<br>");
// 					echo $this->input->get_post('expirymonth')."<br>";
					//echo  mdate( "%h:%i", time());
					
					$new_order->customer_id = $this->session->userdata('id');
					$new_order->order_date = mdate( "%Y-%m-%d", time());
					$new_order->order_time = mdate( "%h:%i", time());
					$new_order->total = $this->cart->total();
					$new_order->creditcard_number = $this->input->get_post('creditnumber');
					$new_order->creditcard_month = $this->input->get_post('expirymonth');
					$new_order->creditcard_year = $this->input->get_post('expiryyear');

					$this->order_model->insert_order($new_order);
					//echo $this->order_model->get(483.56)->id;
					//$this->order_model->find_id($new_order);
					//echo $order_id;
					
					//print_r($this->cart->contents());
					
					$this->load->model('orderitem_model');
					$this->orderitem_model->add_all_items($this->order_model->find_id()[0]->id);					
// 					$new_order_item->product_id = $this->order_model->find_id()[0]->id;
// 					$new_order_item->
					
						
					$this->load->view('receipt.php'); /*This line needs to be here*/
					$this->session->sess_destroy();				
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

		function send_mail()
		{
			// https://ellislab.com/forums/viewthread/217672/#1060038
			// Discussion about sending email with gmail.
			$this->load->library('email');
	    	$config = Array(
			   'protocol' => 'smtp',
			   'smtp_host' => 'ssl://smtp.gmail.com',
			   'smtp_port' => 465,
			   'smtp_crypto' => 'ssl',
			   'smtp_user' => '309estoremail@gmail.com',
			   'smtp_pass' => 'estore123',
			   'mailtype'  => 'html', 
			   'charset'   => 'iso-8859-1',
			);

			$this->email->from('309estoremail@gmail.com', 'Steven and Tyler');
			$this->email->to('steven_vetson@hotmail.com');
			//$this->email->cc('another@another-example.com');
			//$this->email->bcc('them@their-example.com');

			$this->email->subject('Your Receipt is Enclosed in this Email');
			$this->email->message('Would this email actually send?');

			$this->email->send();
			echo $this->email->print_debugger();
		}


    }
    
//     function receipt(){
    	
//     	$this->load->model('order_model');
//     	$this->load->helper('date');
    	 
//     	//Insert the order into the orders db
//     	$new_order = new Order();
//     	$new_order->customer_id = $this->session->userdata('id');
//     	$new_order->order_date = unix_to_human(now());
//     	$new_order->order_time = gettimeofday();
//     	$new_order->total = $this->cart->total();
//     	$new_order->creditcard_number = $this->input->get_post('creditcard_number');
//     	$new_order->creditcard_month = $this->input->get_post('creditcard_month');
//     	$new_order->creditcard_year = $this->input->get_post('creditcard_year');
    	 
    	
//     	$this->order_model->insert_order($new_order);
//     	$this->load->view('receipt.php');
//     }
}
	
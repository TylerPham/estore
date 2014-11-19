<?php
class Order_model extends CI_Model
{
	function initializer($order)
	{
		// Set up the order_id and customer_id
		return $this->db->insert("orders", array('customer_id' => $order->customer_id));
	}

	function getAll()
	{  
		// A list of all existing orders
		$query = $this->db->get('orders');
		return $query->result('Order');
	}
	 
	function credit_info($order)
	{
		//Inserts credit card information
		$this->db->where('id', $order->id);
		return $this->db->insert("orders", array('creditcard_number' => $order->creditcard_number,
												'creditcard_month' => $order->creditcard_month,
												'creditcard_year' => $order->creditcard_year));
	}

	function generate_receipt($order)
	{
		//Prints all the items in this order
		// You dont need this by default it adds the star
		//$this->db->select(*);
		$this->db->from('order_items');
		$this->db->where('id', $order->id);
		return $query->result('OrderItem');
	}
}
?>
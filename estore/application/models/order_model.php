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

	function insert_order($order){
		 $this->db->insert("orders",
				array(	'customer_id' => $order->customer_id,
						'order_date' => $order->order_date,
						'order_time' => $order->order_time,
						'total' => $order->total,
						'creditcard_number' => $order->creditcard_number,
						'creditcard_month' => $order->creditcard_month,
						'creditcard_year' => $order->creditcard_year));
	
	}
	

	
	function find_id(){
// 		$this->db->where('customer_id',$order->customer_id);
// 		$this->db->where('order_date',$order->order_date);
// 		$this->db->where('order_time', $order->order_time);
// 		$this->db->where('total', $order->total );
// 		$this->db->where('creditcard_number', $order->creditcard_number );
// 		$this->db->where('creditcard_month', $order->creditcard_month );
// 		$this->db->where('creditcard_year', $order->creditcard_year );
// 		$query = $this->db->get('orders');
// 		$this->db->where('id', $row);
// 		$query = $this->db->get(); 

		// A list of all existing orders
		//$query = $this->db->get('orders');
		$this->db->select_max('id');
		$query = $this->db->get('orders');
		
		
		return $query->result('Order');
	}
	


}
?>
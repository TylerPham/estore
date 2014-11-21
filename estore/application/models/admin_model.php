<?php
class Admin_model extends CI_Model
{
	function order_history()
	{  

		// A list of all existing orders and order_items
// 		$this->db->select('*');
// 		$this->db->from('products');
// 		$this->db->join('order_items', 'products.id = order_items.product_id');
 		$this->db->join('orders', 'order_items.order_id = orders.id');
		$query = ($this->db->get('order_items'));
		echo "<p>" . anchor('store/admin_control','Back to Control Panel') . "</p>";
		
		$this->load->library('table');
		$this->table->set_heading(array('Order ID','Customer ID','Order Date', 'Order Time', 'Product ID', 'QTY', 'Creditcard Number', 'Total Cost'));
		
		
		//echo "<p>" . anchor('store/admin_control','Back to Control Panel') . "</p>";
		
		foreach($query->result() as $row){
			$this->table->add_row(array(
					$row->order_id,
					$row->customer_id,
					$row->order_date,
					$row->order_time,
					 $row->product_id,
					 $row->quantity,
					$row->creditcard_number,
					$row->total
			));
// 			echo "Customer ID:".$row->customer_id."<br>";
// 			echo "Order_ID:".$row->order_id."<br>";
// 			echo "Order Date:". $row->order_date."<br>";
// 			echo "Order Time:".$row->order_time."<br>";
// 			echo "Order Total:".$row->total."<br>";
// 			echo "CC Number:".$row->creditcard_number."<br>";
// 			echo "Product ID:".$row->product_id."<br>";
// 			echo "Quantity:".$row->quantity."<br>";
// 			echo "<br>";
			//print_r($row);
		}
		echo $this->table->generate();

		//return $query->result('DetailedProducts');

	}

	function database_wipe()
	{

		$this->db->empty_table('orders');
		$this->db->empty_table('order_items');

		/*This deletes every user that isn't the admin*/
		$this->db->where('login !=', 'admin');
		$this->db->delete('customers');

	}
}
?>
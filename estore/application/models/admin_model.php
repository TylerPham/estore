<?php
class Admin_model extends CI_Model
{
	function order_history()
	{  
		// A list of all existing orders and order_items
		$this->db->select('*');
		$this->db->from('products');
		$this->db->join('order_items', 'products.id = order_items.product_id');
		$this->db->join('orders', 'order_items.order_id = orders.id');

		return $query->result('DetailedProducts');
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
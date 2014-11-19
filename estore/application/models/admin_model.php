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
		$tables = array('orders', 'order_items', 'customers');
		return $this->db->delete($tables);
	}
}
?>
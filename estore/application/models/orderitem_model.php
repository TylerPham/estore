<?php
class Orderitem_model extends CI_Model
{
	function getAll($id)
	{
		$this->db->select('products.id, products.name, products.description,
			products.price, products.photo_url, order_items.quantity');
		$this->db->from('products');
		$this->db->join('order_items', 'products.id = order_items.product_id');

		$query = $this->db->get_where('orders', array('id' => $id));
		return $query->result('DetailedProducts');
	}

	function remove_item($id)
	{
		return $this->db->delete("order_items",array('id' => $id ));
	}
	
	function add_item($orderitem)
	{
		return $this->db->insert("order_items", array('order_id' => $orderitem->order_id,
														'product_id' => $orderitem->product_id,
														'quantity' => $orderitem->quantity));
	}
	
	function add_all_items($order_id)
	{
		foreach($this->cart->contents() as $items){
			$this->db->insert('order_items', array(
					'order_id' => $order_id,
					'product_id' => $items['id'],
					'quantity' => $items['qty']));
		}
	}
	 
	function update_amount($orderitem)
	{
		$this->db->where('id', $order->id);
		return $this->db->update("order_items", array('quantity' => $orderitem->quantity));
	}
}
?>
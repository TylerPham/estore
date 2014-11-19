<?php
class Order
{
	public $id;
	public $customer_id;
	public $order_date;
	public $order_time;
	public $total;
	public $creditcard_number;
	public $creditcard_month;
	public $creditcard_year;
}

class OrderItem
{
	public $id;
	public $order_id;
	public $product_id;
	public $quantity;
}

<h2>Finalized Orders</h2>
<?php 
		echo "<p>" . anchor('store/admin_control','Back to Control Panel') . "</p>";
 	  
		echo "<table>";
		echo "<tr>
 	  		<th>Customer ID</th>
 	  		<th>Order Date</th>
 	  		<th>Order Time</th>
 	  		<th>Total</th>
 	  		<th>Creditcard Number</th>
 	  		<th>CC Month</th>
 	  		<th>CC Year</th>
 	  		</tr>";
				
		foreach ($orders as $order) {
			echo "<tr>";
			echo "<td>" . $order->customer_id . "</td>";
			echo "<td>" . $order->order_date . "</td>";
			echo "<td>" . $order->order_time . "</td>";
			echo "<td>" . $order->total . "</td>";
			echo "<td>" . $order->creditcard_number . "</td>";
			echo "<td>" . $order->creditcard_month . "</td>";
			echo "<td>" . $order->creditcard_year . "</td>";
				
// 			echo "<td>" . anchor("store/delete/$order->id",'Delete',"onClick='return confirm(\"Do you really want to delete this record?\");'") . "</td>";
// 			echo "<td>" . anchor("store/editForm/$order->id",'Edit') . "</td>";
// 			echo "<td>" . anchor("store/read/$order->id",'View') . "</td>";
				
			echo "</tr>";
		}
		echo "<table>";
?>	



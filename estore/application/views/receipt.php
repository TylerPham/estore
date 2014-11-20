<h2>Receipt</h2>
<?php 
		
		echo "<table>";
		echo "<tr><th>Name</th><th>Description</th><th>Price</th><th>Photo</th><th>QTY</th></tr>";
		
		foreach ($products as $product) {
			echo "<tr>";
			echo "<td>" . $product->name . "</td>";
			echo "<td>" . $product->description . "</td>";
			echo "<td>" . $product->price . "</td>";
			echo "<td><img src='" . base_url() . "images/product/" . $product->photo_url . "' width='100px' /></td>";
			echo "<td>" . form_input('quantity',set_value('quantity'),'required') . "</td>";
					
			echo "</tr>";
		}

		echo "total is" . $order_items->quantity . "dollars";
		
?>	



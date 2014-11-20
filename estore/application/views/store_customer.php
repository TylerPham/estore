<h2>Available Products</h2>
<?php 

		echo $this->session->userdata('session_id');
		
		echo "<p>" . anchor('customer_store/lookat_cart','Go to Cart') . "</p>";
		echo "<p>" . anchor('login','Logout') . "</p>";
		
		
		echo "<table>";
		echo "<tr>
				<th>Name</th>
				<th>Description</th>
				<th>Price</th>
				<th>Photo</th>
				
				<th></th>
				</tr>";
		
		foreach ($products as $product) {
			echo form_open('customer_store/display_shopping_cart');
				
			echo "<tr>";
			echo "<td>" . $product->name . "</td>";
			echo "<td>" . $product->description . "</td>";
			echo "<td>" . $product->price . "</td>";
			echo "<td><img src='" . base_url() . "images/product/" . $product->photo_url . "' width='100px' /></td>";

			echo form_hidden('name',$product->name);
			echo form_hidden('price',$product->price);
			echo form_hidden('id',$product->id);
				
			echo "<td>" . form_input('quantity',set_value('quantity'),'required') . "</td>";
			echo "<td>" . form_submit('submit', 'Add to cart') . "</td>";
			
		
	
			       
					
			echo "</tr>";
			echo form_close();
			
		}
		echo "<table>";
		
		//$product->id,$product->name,$product->price
		
?>	



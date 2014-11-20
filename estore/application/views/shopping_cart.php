<<<<<<< HEAD
               
                <?php echo form_open('customer_store/update_cart'); ?>
				
				<table border="2" style="width:100%">
				                
                <p><?php echo anchor('customer_store', 'Continue Shopping'); ?></p>
                
                <tr>
                  <th>QTY</th>
                  <th>Item Description</th>
                  <th>Item Price</th>
                  <th>Sub-Total</th>
                </tr>
                
                <?php $i = 1; ?>
                <?php foreach($this->cart->contents() as $items): ?>
                    <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
                    
                    <tr>
                      <td><?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?></td>
                      <td>
                        <?php echo $items['name']; ?>
                                    
                            <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>
                                    
                                <p>
                                    <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>
                                        
                                        <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />
                                                        
                                    <?php endforeach; ?>
                                </p>
                                
                            <?php endif; ?>
                                
                      </td>
                      <td><?php echo $this->cart->format_number($items['price']); ?></td>
                      <td>$<?php echo $this->cart->format_number($items['subtotal']); ?></td>
                    </tr>
          
                <?php $i++; ?>
                <?php endforeach; ?>
                
                <tr>
                  <td colspan="2"> </td>
                  <td><strong>Total</strong></td>
                  <td>$<?php echo $this->cart->format_number($this->cart->total()); ?></td>
                </tr>
                
                </table>
                
                <p><?php echo form_submit('', 'Update your Cart'); ?></p>
                
                <p><?php echo anchor('customer_store', 'Continue to checkout');  ?></p>
                
                
=======
<h2>Shopping Cart</h2>
<?php 

		echo "<p>" . anchor('customer_store/index','Back To Store') . "</p>";
		echo "<p>" . anchor('login','Checkout') . "</p>";
		
		echo "<table>";
		echo "<tr><th>Name</th><th>Description</th><th>Price</th><th>Photo</th><th>QTY</th></tr>";
		
		foreach ($products as $product) {
			echo "<tr>";
			echo "<td>" . $product->name . "</td>";
			echo "<td>" . $product->description . "</td>";
			echo "<td>" . $product->price . "</td>";
			echo "<td><img src='" . base_url() . "images/product/" . $product->photo_url . "' width='100px' /></td>";
			echo "<td>" . form_input('quantity',set_value('quantity'),'required') . "</td>";
					
			echo "<td>" . anchor("store/editForm/$product->id",'Update') . "</td>";
					
			echo "</tr>";
		}
		echo "<table>";
		
		
?>	


>>>>>>> origin/master

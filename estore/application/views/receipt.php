<h2>Receipt</h2>
<?php 
		
//echo $this->session->userdata('session_id');

echo "<br>";


foreach($this->cart->contents() as $items){

	echo $items['name'];
	echo "<br>";
	echo $items['price'];
	echo "<br>";
	echo $items['qty'];
	echo "<br>";
	echo "<br>";
	
	//take this out after
	//echo $items['id'];
}
$total = $this->cart->total();
echo "Your total is $total"."<br>";

echo anchor('customer_store/index', 'Back to shop');
//$this->session->sess_destroy();

?>	
<p><button onClick="window.print()">Print receipt</button><p>




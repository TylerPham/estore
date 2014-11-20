<h2>Receipt</h2>
<?php 
		
echo $this->session->userdata('session_id');

echo "<br>";
echo "<br>";


foreach($this->cart->contents() as $items){

	echo $items['name'];
	echo "<br>";
	echo $items['price'];
	echo "<br>";
	echo $items['qty'];
	echo "<br>";
	echo "<br>";
}
$total = $this->cart->total();
echo "Your total is $total";
		
?>	



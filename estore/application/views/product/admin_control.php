<h1>ADMINISTRATOR SETTINGS</h1>

<?php 	echo "<h2>" . anchor('store/index','Add, Delete and Edit Products') . "</h2>";?>

<?php 	echo "<h2>" . anchor('store/index','Display All Finalized Orders') . "</h2>";?>


<h2>Delete All Customers and Order Information</h2>


<?php
echo form_open('store/delete_everything');
echo form_submit('delete', 'Delete Everything');
echo form_close();
?>
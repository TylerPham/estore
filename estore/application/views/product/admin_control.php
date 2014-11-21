<h1>ADMINISTRATOR SETTINGS</h1>

<?php 	echo "<h2>" . anchor('store/index','Add, Delete and Edit Products') . "</h2>";?>

<?php 	echo "<h2>" . anchor('store/display_orders','Display All Finalized Orders') . "</h2>";?>

<?php echo "<h2>" . anchor("store/delete_customer_and_orders",'Wipe Database',"onClick='return confirm(\"Do you really want to delete all records?\");'") . "</h2>";?>

<?php echo "<p>" . anchor('login','Logout') . "</p>";?>


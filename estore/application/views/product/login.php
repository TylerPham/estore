<h2>Welcome to the login screen</h2>

<?php
	echo "hello world";
	echo "<p>" . anchor('store/index','Back') . "</p>";

	echo form_label('Username');
	echo form_error('username');
	echo form_input('username',set_value('username'),"required");
	
	echo form_label('Password');
	echo form_error('password');
	echo form_input('password',set_value('password'),"required");
	
	if(isset($fileerror))
		echo $fileerror;
	
	echo form_submit('submit', 'Login');
	echo form_close();
	
?>
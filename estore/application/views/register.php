<h2>New User Registration</h2>
<style>
	input { display: block;}
	
</style>

<?php
	echo "<p>" . anchor('login/login_form','Back to login Page') . "</p>";

	echo form_open('login/register_form');
	
	echo form_label('Username');
	echo form_error('username');
	echo form_input('username',set_value('username'),"required");

	echo form_label('Password');
	echo form_error('password');
	echo form_password('password',set_value('password'),"required");
	
	echo form_label('Retype Password');
	echo form_error('retype_password');
	echo form_password('retype_password',set_value('retype_password'),"required");
	
	echo form_label('First Name');
	echo form_error('firstname');
	echo form_input('firstname',set_value('firstname'),"required");
	
	echo form_label('Last name');
	echo form_error('lastname');
	echo form_input('lastname',set_value('lastname'),"required");
	
	echo form_label('Email');
	echo form_error('email');
	echo form_input('email',set_value('email'),"required");
	
	echo form_label('Retype Email');
	echo form_error('retype_email');
	echo form_input('retype_email',set_value('retype_email'),"required");
	
	echo form_submit('submit', 'Register!');
	echo form_close();


?>
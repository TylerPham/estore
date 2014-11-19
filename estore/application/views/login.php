<h2>Welcome to the login screen</h2>

<?php 

echo form_open('login/login_form');

echo form_label('Username');
echo form_error('username');
echo form_input('username',set_value('username'),"required");

echo form_label('Password');
echo form_error('password');
echo form_password('password',set_value('password'),"required");

echo form_submit('submit', 'Login');
echo form_close();

echo anchor('login/register', 'New around here? Register!');


?>
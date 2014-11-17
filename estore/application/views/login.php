<!-- <h2>Welcome to the login screen</h2> -->

// <?php
// 	//echo "hello world";
// 	echo "<p>" . anchor('store/index','Back') . "</p>";

// 	echo form_label('Username');
// 	echo form_error('username');
// 	echo form_input('username',set_value('username'),"required");
	
// 	echo form_label('Password');
// 	echo form_error('password');
// 	echo form_input('password',set_value('password'),"required");
	
// 	echo form_submit('submit', 'Login');
// 	echo form_close();
	
// 	echo "<p>" . anchor('store/register','Register as new User') . "</p>";
// ?>

<html>
<head>
<title>Login</title>
</head>
<body>

<?php echo validation_errors(); ?>

<?php echo form_open('login'); ?>

<h5>Username</h5>

<?php 
echo form_label('Username');
echo form_error('username');
echo form_input('username',set_value('username'),"required");?>



<h5>Password</h5>
<input type="text" name="password" value="<?php echo set_value('password'); ?>" size="50" />

<h5>Password Confirm</h5>
<input type="text" name="passconf" value="<?php echo set_value('passconf'); ?>" size="50" />

<h5>Email Address</h5>
<input type="text" name="email" value="<?php echo set_value('email'); ?>" size="50" />

<div><input type="submit" value="Submit" /></div>

</form>

</body>
</html>
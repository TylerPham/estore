<h2>Finishing Up Your Purchase</h2>

<?php 

echo form_open('customer_store/check_out');

echo form_label('Credit Card Number');
echo form_error('creditnumber');
echo form_input('creditnumber',set_value('creditnumber'),"required");

echo form_label('Expiry Month');
echo form_error('expirymonth');
echo form_input('expirymonth',set_value('expirymonth'),"required");

echo form_label('Expiry Year');
echo form_error('expiryyear');
echo form_input('expiryyear',set_value('expiryyear'),"required");

echo form_submit('submit', 'Finished!');
echo form_close();

echo anchor('customer_store/lookat_cart', 'Go Back');


?>
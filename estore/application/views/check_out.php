<h2>Finishing Up Your Purchase</h2>

<?php 

echo form_open('login/login_form');

echo form_label('Credit Card Number');
echo form_error('creditnumber');
echo form_input('creditnumber',set_value('creditnumber'),"required");

echo form_label('Expiry Date');
echo form_error('creditexpiry');
echo form_input('creditexpiry',set_value('creditexpiry'),"required");

echo form_submit('submit', 'Finished!');
echo form_close();

echo anchor('login/register', 'Go Back');


?>
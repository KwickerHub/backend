<?php
/*

We will need the verification_code, email and new_password.

The verification code will be sent to the email of the user. 
The Front-end developer will link the functionality.

before we change the password, we will need to salt and hash the password.(check 'register_user.php' or the 'hashing' folder for more understanding)
We will also need to confirm the uniquesness of the situation.

If the verification_code is correct and belongs to thesame user as the email, then we will change the password.

*/

?>
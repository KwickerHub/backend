<?php

//include all that you may need.

//get the parameters for login(email and password) from the POST request
    //you can use GET METHOD to test and for simplicity but the Project will be using POST since login details are sensitive.

//check if a user exist with the email(Take example from the 'register_user.php' page)

//get other details of the user by using his email

//only users who have verified == 1 in the database will be able to login.

//compare the password gotten from the user with the already hashed password gotten from the database.
    //because we used BCRYPT, you will use password_verify($password_4rm_user, $hashed_in_DB)
    //if the condition is true, then the password is thesame as the hashed one. 

//Apart from the Json structure that will be set out, Some Cookies and sessions will be created if the login details are correct.

?>
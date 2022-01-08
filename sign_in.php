<?php
    include "the_connector/connect_area.php";
    include "users/get_users.php";
    include "hashing/all_hash_algo.php";
    include "sanitizer/clean_up.php";

    // Array for error responses
    $array = ["status" => "false", "msg" => "No possible connection"];

    //get the parameters for login(email and password) from the POST request
    //you can use GET METHOD to test and for simplicity but the Project will be using POST since login details are sensitive.
    if (isset($_POST["email"]) and isset($_POST["password"])) {
	    $email = cleaner_4_DB($_POST["email"]);

        // Get users password seperately so as to compare with the ACES_OPEN_SOURCE string
        $password = cleaner_4_DB($_POST["password"]);

        // Concatenate it with the string it was hashed with, so as to compare correctly
        $password = "ACES_OPEN_SOURCE{$password}";

        // Check if a user exist with the email (Take example from the 'register_user.php' page)
        $user_already = num_count_email($connect, $email);

        if ($user_already >= 1) { // User exists
            //get other details of the user by using his email
            $user_existance = get_user_by_email($connect, $email);

            //only users who have verified == 1 in the database will be able to login.
            if ($user_existance["verified"] === 1) {
                //compare the password gotten from the user with the already hashed password gotten from the database.
                if (password_verify($password, $user_existance["password"])) {
                    $array = ["status" => "true", "user" => $user_existance, "msg" => "Login Successful"];
                } else {
                    $array = ["status" => "false", "msg" => "Your password is incorrect"];
                }
            } else {
                $array = ["status" => "false", "msg" => "This account is not verified to log in"];
            }
        } else {
            $array = ["status" => "false", "msg" => "This account is not registered"];
        }
    }

    echo json_encode($array);
?>
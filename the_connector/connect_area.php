<?php

//offline, chanage this to your localhost username and password
#we can make this a function that can be called.
$host_name = 'localhost';
$database = 'ACES_DB';
$user_name = 'root';
$password = '';


//online
$host_name = 'localhost';
$database = 'kwicsczj_ACES_DB';
$user_name = 'kwicsczj_admin';
$password = 'admin0@@=@@';

$connect = mysqli_connect($host_name, $user_name, $password, $database);

if (mysqli_connect_errno()) {

} else {

}

?>

<?php

//offline, chanage this to your localhost username and password
#we can make this a function that can be called.
$host_name = 'localhost';
$database = 'ACES_DB';
$user_name = 'root';
$password = '';


$connect = mysqli_connect($host_name, $user_name, $password, $database);

if (mysqli_connect_errno()) {

} else {

}

?>

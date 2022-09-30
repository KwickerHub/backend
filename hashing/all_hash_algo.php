<?php


function salt_and_BCRYPT($password){
	$password =  "ACES_OPEN_SOURCE". $password . '';
	$password = password_hash($password, PASSWORD_BCRYPT);
	return $password;
}

function salting($pass){
	$pass__ = "ACES_OPEN_SOURCE". $pass . '';
	return $pass__;
}

function md5_sha1($password){
	$md5pass = md5($password);
	$sha1pass = sha1($md5pass);
	return $sha1pass;
} 

?>
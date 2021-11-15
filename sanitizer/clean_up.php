<?php

function cleaner_4_DB($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = strip_tags($data);
	$data = htmlspecialchars($data);
	return $data;
}

function cleaner_4_representation($data){
	$data = htmlspecialchars($data);
	return $data;
	#this function will handle preparing the data from the database to the user.
}
?>
<?php

function get_user_details($id){
		$user_id= $id;
		require "../the_connector/connect_area.php";
		$stmt = $connect->prepare("SELECT * FROM `clients` WHERE `id`=?;");
		$stmt->bind_param("i", $user_id);
		$stmt->execute();
		$result = $stmt->get_result();
		if(!$stmt){
			echo "could not get the results";
			return array();
		}else{
			$row = $result->fetch_assoc();
			return $row;
	}
		$stmt->close();
}


function get_project_details($id){
	$user_id= $id;
	require "../the_connector/connect_area.php";
	$stmt = $connect->prepare("SELECT * FROM `projects` WHERE `user_id`=?; ");
	$stmt->bind_param("i", $user_id);
	$stmt->execute();
	$result = $stmt->get_result();
	if(!$stmt){
		echo "could not get the results";
		return array();
	}else{
		$row = $result->fetch_assoc();
		return $row;
}
	$stmt->close();
}

function get_user_by_email($connect, $email){
		$email= $email;
		#require "the_connector/connect_area.php";
		$stmt = $connect->prepare("SELECT * FROM `clients` WHERE `email`=?;");
		$stmt->bind_param("s", $email);
		$stmt->execute();
		$result = $stmt->get_result();
		if(!$stmt){
			echo "could not get the results";
			return array();
		}else{
			$row = $result->fetch_assoc();
			return $row;
	}
		$stmt->close();
}

function get_user_by_code($connect, $unique_code){
		#require "the_connector/connect_area.php";
		$stmt = $connect->prepare("SELECT * FROM `clients` WHERE `unique_co`=?;");
		$stmt->bind_param("i", $unique_code);
		$stmt->execute();
		$result = $stmt->get_result();
		if(!$stmt){
			echo "could not get the results";
			return array();
		}else{
			$row = $result->fetch_assoc();
			return $row;
	}
		$stmt->close();
}

function get_user_by_username($connect, $username){
		#require "the_connector/connect_area.php";
		$stmt = $connect->prepare("SELECT * FROM `clients` WHERE `username`=?;");
		$stmt->bind_param("s", $username);
		$stmt->execute();
		$result = $stmt->get_result();
		if(!$stmt){
			echo "could not get the results";
			return array();
		}else{
			$row = $result->fetch_assoc();
			return $row;
	}
		$stmt->close();
}

function num_count_email($connect, $email){
    #require "the_connector/connect_area.php";
	$num_rows = 0;
    $stmt = $connect->prepare("SELECT COUNT(*) FROM `clients` WHERE `email`=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($num_rows);
    $stmt->fetch();
    return $num_rows;
}


?>
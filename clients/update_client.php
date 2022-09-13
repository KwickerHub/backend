<?php


function change_singles($connect, $parameter, $value, $id ) {
	#require "../config/config_side.php";
	$ret = false;
	$parameter = innner_clean($parameter);
	$value = innner_clean($value);
	$sql = "UPDATE `passenger` SET $parameter = ? WHERE `passenger`.`id` = ?;";
	$updater = $connect->prepare($sql);
	$updater->bind_param("ii", $value, $id );
	$updater->execute();
	if ($updater) {
		$ret = true;
	}

	return $ret;

}

function change_singles_str($connect, $parameter, $value, $id ) {
	#require "../config/config_side.php";
	$ret = false;
	$parameter = innner_clean($parameter);
	$value = innner_clean($value);
	$sql = "UPDATE `passenger` SET $parameter = ? WHERE `passenger`.`id` = ?;";
	$updater = $connect->prepare($sql);
	$updater->bind_param("si", $value, $id );
	$updater->execute();
	if ($updater) {
		$ret = true;
	}

	return $ret;

}

function change_singles_by_email($connect, $parameter, $value, $email ) {
	#require "../config/config_side.php";
	$ret = false;
	$parameter = innner_clean($parameter);
	$value = innner_clean($value);
	$sql = "UPDATE `passenger` SET $parameter = ? WHERE `passenger`.`email` = ?;";
	$updater = $connect->prepare($sql);
	$updater->bind_param("ds", $value, $email );
	$updater->execute();
	if ($updater) {
		$ret = true;
	}

	return $ret;

}


function innner_clean($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = strip_tags($data);
	$data = htmlspecialchars($data);
	return $data;
}
/*if ($updater) {
	$array = ["status"=>"true", "msg"=>"Verification Successful"];
	//return true;
}else{
	$array = ["status"=>"false", "msg"=>"Could not Verify, Try Again later."];
	//return false;
}*/

?>
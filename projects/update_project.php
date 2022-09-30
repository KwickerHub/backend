<?php


function change_singles($connect, $parameter, $value, $project_id ) {
	#require "../config/config_sproject_project_ide.php";
	$ret = false;
	$parameter = innner_clean($parameter);
	$value = innner_clean($value);
	$sql = "UPDATE `projects` SET $parameter = ? WHERE `projects`.`project_id` = ?;";
	$updater = $connect->prepare($sql);
	$updater->bind_param("ii", $value, $project_id );
	$updater->execute();
	if ($updater) {
		$ret = true;
	}

	return $ret;

}

function change_singles_str($connect, $parameter, $value, $project_id ) {
	#require "../config/config_sproject_project_ide.php";
	$ret = false;
	$parameter = innner_clean($parameter);
	$value = innner_clean($value);
	$sql = "UPDATE `projects` SET $parameter = ? WHERE `projects`.`project_id` = ?;";
	$updater = $connect->prepare($sql);
	$updater->bind_param("si", $value, $project_id );
	$updater->execute();
	if ($updater) {
		$ret = true;
	}

	return $ret;

}

// function change_singles_by_email($connect, $parameter, $value, $email ) {
// 	#require "../config/config_sproject_ide.php";
// 	$ret = false;
// 	$parameter = innner_clean($parameter);
// 	$value = innner_clean($value);
// 	$sql = "UPDATE `projects` SET $parameter = ? WHERE `projects`.`email` = ?;";
// 	$updater = $connect->prepare($sql);
// 	$updater->bind_param("ds", $value, $email );
// 	$updater->execute();
// 	if ($updater) {
// 		$ret = true;
// 	}

// 	return $ret;

// }


function innner_clean($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = strip_tags($data);
	$data = htmlspecialchars($data);
	return $data;
}


?>
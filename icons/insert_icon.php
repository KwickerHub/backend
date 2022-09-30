<?php
include "../the_connector/connect_area.php";
include "../users/get_users.php";
include "../icons/get_icon.php"; // "get_icon.php"
//include "../hashing/all_hash_algo.php";
include "../sanitizer/clean_up.php";
//include "../generator/generator.php";
//include "../publicity/mailer.php";
session_start();
$array = ["status"=>"false", "msg"=>"No possible connection"];
$output = "";
if( isset($_POST["icon_name"]) and isset($_POST["description"]) and isset($_POST["type"]) ){
    $user_id = isset($_POST["userid"]) ? cleaner_4_DB($_POST["userid"]) : 0; //check if id was sent from POST
	$user_id = isset($_SESSION["userid"]) ? cleaner_4_DB($_SESSION["userid"]) : 0; // session should override POST else 0 as default
	$icon_name = cleaner_4_DB($_POST["icon_name"]);
    $icon_type = cleaner_4_DB($_POST["type"]);
    $description = cleaner_4_DB($_POST["description"]);
    $icon_location = isset($_POST["icon_location"]) ? cleaner_4_DB($_POST["icon_location"]) : "";
    $icon_height = isset($_POST["icon_height"]) ? cleaner_4_DB($_POST["icon_height"]) : "";
    $icon_width = isset($_POST["icon_width"]) ? cleaner_4_DB($_POST["icon_width"]) : "";
    $icon_default = isset($_POST["icon_default"]) ? cleaner_4_DB($_POST["icon_default"]) : "";
    $variables = isset($_POST["variables"]) ? cleaner_4_DB($_POST["variables"]) : "";
	$addon = isset($_POST["addon"]) ? cleaner_4_DB($_POST["addon"]) : "";
	$likes = 0; //check if id was sent from POST
    $dislikes = 0; 
	$property = isset($_SESSION["property"]) ? cleaner_4_DB($_SESSION["property"]) : ""; // session should override POST else 0 as default

	$date_time = date('Y-m-d H:i:s');
	$output = isset($_POST["output"]) ? cleaner_4_DB($_POST["output"]) : "text"; 

	$tag_already = num_check_icon($connect, $icon_name);
	//echo $user_already;
	if( $tag_already >= 1){
		$array = ["status"=>"false", "msg"=>"This CSS icon already exist. If you feel you have better description to add to this icon Do well to reach out to 'OPEN_SOURCE_IMPROVEMENT' via email: support@kwickerhub.com or nkenyor@gmail.com "];
	}else if($tag_already < 1 AND $icon_name != ""  ){

		$inserter = $connect->prepare("INSERT INTO `icons` (`icon_id`, `user_id`, `icon_name`, `icon_type`, `icon_location`, `icon_description`, `icon_height`, `icon_width`, `icon_default`, `variables`, `likes`, `dislikes`, `addon`, `date`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP);");
		$inserter->bind_param("issssssssiis", $user_id, $icon_name, $icon_type, $icon_location, $description, $icon_height, $icon_width, $icon_default, $variables, $likes, $dislikes, $addon );		
		$inserter->execute();

		if (!$inserter){
			$array = ["status"=>"false", "msg"=>"Could not add your icon. We are really sorry."];
			//echo "Could not register users";
		}else{
			//echo "inserted and done man";
			if(num_check_icon($connect, $icon_name) > 0){
				$elem_existance = get_icon_by_name($connect, $icon_name);
				$array = ["status"=>"true", "element"=>$elem_existance, "msg"=>"Thank you for contributing. You have successfully added a icon."];
			}else{
				$array = ["status"=>"false", "msg"=>"We had some issues with computing your details"];
			}
		}
	}else{
		$array = ["status"=>"false", "msg"=>"You may have entered invalid details."];
	}
	
}

if ($output ==  "text") {
	echo $array['msg'];
}else if($output == "json"){
	echo json_encode($array);
}


?>
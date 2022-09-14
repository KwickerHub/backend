<?php
include "../the_connector/connect_area.php";
include "../users/get_users.php";
include "../style/get_style.php"; // "get_style.php"
//include "../hashing/all_hash_algo.php";
include "../sanitizer/clean_up.php";
//include "../generator/generator.php";
//include "../publicity/mailer.php";
session_start();
$array = ["status"=>"false", "msg"=>"No possible connection"];
if( isset($_POST["style_name"]) and isset($_POST["description"]) and isset($_POST["type"]) ){
    $user_id = isset($_POST["userid"]) ? cleaner_4_DB($_POST["userid"]) : 0; //check if id was sent from POST
	$user_id = isset($_SESSION["userid"]) ? cleaner_4_DB($_SESSION["userid"]) : 0; // session should override POST else 0 as default
	$style_name = cleaner_4_DB($_POST["style_name"]);
    $type = cleaner_4_DB($_POST["type"]); 
    $description = cleaner_4_DB($_POST["description"]);

    $style_default = isset($_POST["style_default"]) ? cleaner_4_DB($_POST["style_default"]) : "";
    $style_values = isset($_POST["style_values"]) ? cleaner_4_DB($_POST["style_values"]) : "";
	$addon = isset($_POST["addon"]) ? cleaner_4_DB($_POST["addon"]) : "";
	$likes = isset($_POST["likes"]) ? cleaner_4_DB($_POST["likes"]) : 0; //check if id was sent from POST
	$property = isset($_SESSION["property"]) ? cleaner_4_DB($_SESSION["property"]) : 0; // session should override POST else 0 as default

	$date_time = date('Y-m-d H:i:s');
	$output = isset($_POST["output"]) ? cleaner_4_DB($_POST["output"]) : "text"; 

	$tag_already = num_check_style($connect, $style_name);
	//echo $user_already;
	if( $tag_already >= 1){
		$array = ["status"=>"false", "msg"=>"This CSS Style already exist. If you feel you have better description to add to this STYLE Do well to reach out to 'OPEN_SOURCE_IMPROVEMENT' via email: support@kwickerhub.com or nkenyor@gmail.com "];
	}else if($tag_already < 1 AND $style_name != ""  ){

		$inserter = $connect->prepare("INSERT INTO `style` (`style_id`, `user_id`, `style_name`, `type`, `style_default`, `style_values`, `addon`, `description`, `likes`, `property`, `date_time`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP);");
		
		$inserter->bind_param("issssssis", $user_id, $style_name, $type, $style_default, $style_values, $addon, $description, $likes, $property );		
		$inserter->execute();

		if (!$inserter){
			$array = ["status"=>"false", "msg"=>"Could not add your STYLE. We are really sorry."];
			//echo "Could not register users";
		}else{
			//echo "inserted and done man";
			if(num_check_style($connect, $style_name) > 0){
				$elem_existance = get_style_by_name($connect, $style_name);
				$array = ["status"=>"true", "element"=>$elem_existance, "msg"=>"Thank you for contributing. You have successfully added a STYLE."];
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
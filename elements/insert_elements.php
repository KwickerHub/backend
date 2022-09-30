<?php
include "../the_connector/connect_area.php";
include "../users/get_users.php";
include "../elements/get_element.php"; // "get_elements.php"
//include "../hashing/all_hash_algo.php";
include "../sanitizer/clean_up.php";
//include "../generator/generator.php";
//include "../publicity/mailer.php";
session_start();
$array = ["status"=>"false", "msg"=>"No possible connection"];
$output = "";
if( isset($_POST["element_description"]) and isset($_POST["element_name"])){
	$elem = cleaner_4_DB($_POST["element_name"]);
	$tag_type = isset($_POST["tag_type"]) ? cleaner_4_DB($_POST["tag_type"]) : "";
	$user_id = isset($_POST["userid"]) ? cleaner_4_DB($_POST["userid"]) : 0; //check if id was sent from POST
	$user_id = isset($_SESSION["userid"]) ? cleaner_4_DB($_SESSION["userid"]) : 0; // session should override POST else 0 as default

	//$add_on = isset($_POST["addon"]) ? cleaner_4_DB($_POST["addon"]) : "";
	$tag_example = '<' . $elem . '>' . '</' . $elem . '>';
	$tag_description = cleaner_4_DB($_POST["element_description"]);
	$default_style = isset($_POST["tag_type"]) ? cleaner_4_DB($_POST["tag_type"]) : "";
	$addon = isset($_POST["addon"]) ? cleaner_4_DB($_POST["addon"]) : ""; 
	$likes = 0;
	$output = isset($_POST["output"]) ? cleaner_4_DB($_POST["output"]) : "text"; 
	$date_time = date('Y-m-d H:i:s');

	$tag_already = num_check_html_tag($connect, $elem);
	//echo $user_already;
	if( $tag_already >= 1){
		$array = ["status"=>"false", "msg"=>"This HTML_TAG already exist. If you feel you have better description to add to this HTML TAG, Do well to reach out to 'OPEN_SOURCE_IMPROVEMENT' via email: support@kwickerhub.com or nkenyor@gmail.com "];
	}else if($tag_already < 1 AND $elem != ""  ){

		$inserter = $connect->prepare("INSERT INTO `elements` (`tag_id`, `user_id`, `tag_name`, `tag_type`, `tag_example`, `tag_description`, `default_style`, `likes`, `addon`, `date_time`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP);");
		
		$inserter->bind_param("issssiss", $user_id, $elem, $tag_type, $tag_example, $tag_description, $default_style, $likes, $addon );		
		$inserter->execute();

		if (!$inserter){
			$array = ["status"=>"false", "msg"=>"Could not add HTML TAG."];
			//echo "Could not register users";
		}else{
			//echo "inserted and done man";
			if(num_check_html_tag($connect, $elem) > 0){
				$elem_existance = get_elem_by_name($connect, $elem);
				$array = ["status"=>"true", "element"=>$elem_existance, "msg"=>"Thank you for contributing. You have successfully added an element(HTML TAG)."];
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
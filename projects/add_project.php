<?php

include "../the_connector/connect_area.php";
include "../users/get_users.php";
//include "hashing/all_hash_algo.php";
include "../sanitizer/clean_up.php";
include "../generator/generator.php";
include "../publicity/mailer.php";
include "get_project.php";

$array = ["status"=>"false", "msg"=>"No possible connection"];
if( isset($_POST["project_content"]) and isset($_POST["project_name"])){
    $user_id = cleaner_4_DB($_POST["user_id"]);
    $project_name = cleaner_4_DB($_POST["project_name"]);
    $project_description = cleaner_4_DB($_POST["project_description"]);
    $type = isset($_POST["type"]) ? cleaner_4_DB($_POST["type"]) : "private"; 
    $project_settings = isset($_POST["project_settings"]) ? cleaner_4_DB($_POST["project_settings"]) : ""; 
    $addon = isset($_POST["addon"]) ? cleaner_4_DB($_POST["addon"]) : "";
    $date = date('Y-m-d H:i:s');
    $date_updated = date('Y-m-d H:i:s');

    $project_location = $project_name . generate_faster() . '.html';
	
    $project_path = '../../storage/projects/' . $project_location ;
    $project_content = $_POST["project_content"];

	$array = array();
	$project_already = 0;

	$project_already = num_count_user_project($connect, $project_name, $user_id);
	//echo $user_already;
	if( $project_already == 1){
		$array = ["status"=>"false", "msg"=>"This project already exist."];
	}else if($project_already < 1 ){

		$inserter = $connect->prepare("INSERT INTO `projects`(`project_id`, `user_id`, `project_name`, `type`, `project_location`, `project_settings`, `project_description`, `addon`, `date`, `date_updated`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$inserter->bind_param("issssssss", $user_id, $project_name, $type, $project_location, $project_settings, $project_description, $addon, $date, $date_updated );		 
        $inserter->execute();

		if (!$inserter){
			$array = ["status"=>"false", "msg"=>"Could not insert the project."];
			//echo "Could not register users";
		}else{
			//echo "inserted and done man";
			if(num_count_user_project($connect, $project_name, $user_id) > 0){
				$user_existance = get_user_details($connect, $user_id);			
				$array = ["status"=>"false", "msg"=>"Project entered DB for could not save properly"];
				#mail_on_signup($email);
                if($project_content != ""){
                    //writing the code into memory and telling the user the success story
                    $myfile = fopen($project_path, "w") or die("Unable to open file for storage paths!");
                    chmod($project_path, 0777);
                    fwrite($myfile, $project_content);
                    fclose($myfile);

					if( file_exists($project_path) ){
						$array = ["status"=>"true", "user"=>$user_existance, "msg"=>"The process was successful."];
					}
                }
			}else{
				$array = ["status"=>"false", "msg"=>"We had some issues with computing your details"];
			}
		}
	}else{
		$array = ["status"=>"false", "msg"=>"You may have entered invalid details."];
	}
}

echo json_encode($array);


?>
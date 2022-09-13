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
    //TODO::
    // receive the public key from the user and verify it with the secretly stored privately key
    // we may need to return the user_id after verification and stop showing it to users...
    $project_name = cleaner_4_DB($_POST["project_name"]);
    $project_description = cleaner_4_DB($_POST["project_description"]);
    // $type = isset($_POST["type"]) ? cleaner_4_DB($_POST["type"]) : "private"; 
    // $project_settings = isset($_POST["project_settings"]) ? cleaner_4_DB($_POST["project_settings"]) : ""; 
    // $addon = isset($_POST["addon"]) ? cleaner_4_DB($_POST["addon"]) : "";
    // $date = date('Y-m-d H:i:s');
    // $date_updated = date('Y-m-d H:i:s');

    

    
    $project_content = $_POST["project_content"];

	$array = array();
	$project_already = 0;

	$project_already = num_count_user_project($connect, $project_name, $user_id);
	//echo $user_already;
	if( $project_already == 1){
        $project = get_projects_details_by_name($project_name);
        $project_location = $project['project_location'];
        $project_path = '../../storage/projects/' . $project_location;

        //if(change_singles_str($connect, 'project_name', $value, $project_id )){
        if($project_content != ""){
            try {
                //$myfile = fopen($project_path, "w") or die("Unable to open file for storage paths!");
                $myfile = fopen($project_path, "w");
                chmod($project_path, 0775);
                fwrite($myfile, $project_content);
                fclose($myfile);
                if( file_exists($project_path) ){
                    $array = ["status"=>"true", "msg"=>"The process was successful."];
                }
            } catch (\Throwable $th) {
                $array = ["status"=>"false", "msg"=>"Fcing some issues with saving this project"];
            }
        }
	}else if($project_already < 1 ){
        $array = ["status"=>"false", "msg"=>"This has not been created"];
	}else{
		$array = ["status"=>"false", "msg"=>"You may have entered invalid details."];
	}
}

echo json_encode($array);


?>
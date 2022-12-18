<?php

include "../the_connector/connect_area.php";
include "../users/get_users.php";
//include "hashing/all_hash_algo.php";
include "../sanitizer/clean_up.php";
include "../generator/generator.php";
include "../publicity/mailer.php";
include "get_project.php";

$output = "";
session_start();
if(isset($_POST["project_name"])){
    //$user_id = cleaner_4_DB($_POST["user_id"]);
    $user_id = cleaner_4_DB($_SESSION["userid"]);
    $project_location = cleaner_4_DB($_POST["project_location"]);
    // $project_description = cleaner_4_DB($_POST["project_description"]);
    // $type = isset($_POST["type"]) ? cleaner_4_DB($_POST["type"]) : "private"; 
    // $project_settings = isset($_POST["project_settings"]) ? cleaner_4_DB($_POST["project_settings"]) : ""; 
    // $addon = isset($_POST["addon"]) ? cleaner_4_DB($_POST["addon"]) : "";
    // $date = date('Y-m-d H:i:s');
    // $date_updated = date('Y-m-d H:i:s');

    $project_path = '../../storage/projects/' . $project_location ;
    //$project_content = $_POST["project_content"];

    if( file_exists($project_path) and is_readable($project_path)){
        $myfile = fopen($project_path, "r") or die("Unable to open file for storage paths!");
        //chmod($project_path, 0777);
        $output = fread($myfile ,filesize($project_path));
        fclose($myfile);
    }else{
        //$output = 'no project loaded in: ';
    }

}

echo $output;

?>
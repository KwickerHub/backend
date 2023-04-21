<?php

include "../the_connector/connect_area.php";
include "../users/get_users.php";
//include "hashing/all_hash_algo.php";
include "../sanitizer/clean_up.php";
include "../generator/generator.php";
include "../publicity/mailer.php";
include "get_project.php";

$array = ["status"=>"false", "msg"=>"No possible connection"];
session_start();
if(isset($_POST["project_name"])){
    if( isset($_SESSION["userid"])  ){

        $user_id = cleaner_4_DB($_SESSION["userid"]);
        // $project_description = cleaner_4_DB($_POST["project_description"]);
        // $type = isset($_POST["type"]) ? cleaner_4_DB($_POST["type"]) : "private"; 
        // $project_settings = isset($_POST["project_settings"]) ? cleaner_4_DB($_POST["project_settings"]) : ""; 
        // $addon = isset($_POST["addon"]) ? cleaner_4_DB($_POST["addon"]) : "";
        // $date = date('Y-m-d H:i:s');
        // $date_updated = date('Y-m-d H:i:s');

        // $project_location = $project_name . generate_faster() . '.html';

        //$project_path = '../../storage/projects/' . $project_location ;
        //$project_content = $_POST["project_content"];
        //$user_id = cleaner_4_DB($_POST["user_id"]);
        $project_name = cleaner_4_DB($_POST["project_name"]);
        $array = array();
        $project_already = 0;

        //echo $project_name;

        $project_already = num_count_user_project($connect, $project_name, $user_id);
        //echo $user_already;
        if( $project_already == 1){
            //$array = ["status"=>"false", "msg"=>"This project already exist."];
            $project = get_projects_details_by_name($connect, $project_name);
            $array = ["status"=>"true", "project"=>$project, "msg"=>"Successfully loaded project details."];
        }else if($project_already < 1 ){
            $array = ["status"=>"false", "msg"=>"This project does not exist."];
        }else{
            $array = ["status"=>"false", "msg"=>"You may have entered invalid details."];
        }
    }else{
        $array = ["status"=>"false", "msg"=>"Invalid User: Looks like you are not logged in."];
    }
    
}

echo json_encode($array);

function fetchProjectDetails($project_id) {
    $stmt = $conn->prepare("SELECT project_name, project_location FROM projects WHERE project_id = ?");
    $stmt->bind_param("i", $project_id);
    $stmt->execute();
    $stmt->bind_result($project_name, $project_location);
    $stmt->fetch();
    $stmt->close();

    $project_details = array(
        "project_id" => $project_id,
        "project_name" => $project_name,
        "project_location" => $project_location
    );
    return $project_details;

}
if (isset($_GET['project_id'])) {
    // Fetch project details using the provided project_id
    $project_id = $_GET['project_id'];
    $project_details = fetchProjectDetails($project_id);
    
    // Convert the associative array to JSON and send as response
    header('Content-Type: application/json');
    echo json_encode($project_details);
} else {
    // Send an error response if project_id is not provided
    http_response_code(400);
    echo json_encode(array("error" => "project_id parameter is missing"));
}

?>

<?php
    
    #include all that you may need
    #you will get two parameters from the POST REQUEST.(email and verification_code)
    /* if the verification_code is thesame with the unique_co in the database for the given email, 
    then the verified column of the Database for that user will be updated to true(1)
    */
	
    session_start();
	if( $id = $_GET['id'] ?? $_SESSION['userid'] ){
		/*require "config/config_side.php";
		require "updaters/update_users.php";*/
		include "the_connector/connect_area.php";
        include "users/get_users.php";
        include "users/update_users.php";
        
		//$id = intval(b_cleaner($_GET["id"]));
        $user_existance = get_user_details_profile($connect, $id);
		$project_details= get_project_details($connect, $id);
    $array = ["name" => $user_existance["name"],"designation" => $user_existance["designation"],"age"=>$user_existance["age"],"location"=>$user_existance["location"],"status"=>$user_existance["status"],"date"=>$user_existance["joined_date"],"bio"=>$user_existance["bio"],"achievements"=>$user_existance["achievements"],"intro"=>$user_existance["intro"],"skills"=>$user_existance["skills"],"projects"=>$project_details["project_name"],"status"=>"True"];


		//print(num_count($connect, $user_id));
		
		echo json_encode($array);
		
	}

	


function b_cleaner($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = strip_tags($data);
	$data = htmlspecialchars($data);
	return $data;
}

?>
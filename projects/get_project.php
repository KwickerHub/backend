<?php

//will contain code to select from this table and more SQL Actions

function get_projects_details($id){
    require "../the_connector/connect_area.php";
    $stmt = $connect->prepare("SELECT * FROM `projects` WHERE `projects_id`=?;");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if(!$stmt){
        echo "could not get the results";
        return array();
    }else{
        $row = $result->fetch_assoc();
        return $row;
    }
    $stmt->close();
}


function get_projects_details_by_name($name){
    require "../the_connector/connect_area.php";
    $stmt = $connect->prepare("SELECT * FROM `projects` WHERE `project_name`=?;");
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $result = $stmt->get_result();
    if(!$stmt){
        echo "could not get the results";
        return array();
    }else{
        $row = $result->fetch_assoc();
        return $row;
    }
    $stmt->close();
}


function get_all_projects(){
	require "../the_connector/connect_area.php";

	$result = array();
		//$category_ = 'driver';
		$stmt = $connect->prepare("SELECT `projects_id`, `user_id`, `projects_name`, `type`, `projects_default`, `projects_values`, `addon`, `description`, `likes`, `property`, `date_time` FROM `projects` ");
		$stmt->execute();
		$stmt->bind_result($projects_id, $user_id, $projects_name, $type, $projects_default, $projects_values, $addon, $description, $likes, $property, $date_time );

		if(!$stmt){
			$result = array("status"=>"false", "msg"=>"Could not get the coins symbols.");

		}elseif($stmt){
			while ($stmt->fetch()) {
				array_push($result, array( "id"=>$projects_id, "user_id"=>$user_id, "projects_name"=>$projects_name, "type"=>$type, "projects_default"=>$projects_default, "projects_values"=>$projects_values, "addon"=>$addon, "description"=>$description, "likes"=>$likes, "property"=>$property, "date_time"=>$date_time) );
			}
	}
	
	$stmt->close();
	return $result;
}

function get_all_raw_projects(){
    require "../the_connector/connect_area.php";

	$result = "";
    $stmt = $connect->prepare("SELECT `projects_id`, `user_id`, `projects_name`, `type`, `projects_default`, `projects_values`, `addon`, `description`, `likes`, `property`, `date_time` FROM `projects` ");
    $stmt->execute();
    $stmt->bind_result($projects_id, $user_id, $projects_name, $type, $projects_default, $projects_values, $addon, $description, $likes, $property, $date_time );

    if(!$stmt){
        $result = array("status"=>"false", "msg"=>"Could not get the coins symbols.");

    }elseif($stmt){
        while ($stmt->fetch()) {
            $result .= '<li class="each_item">
                <input onchange="projects_changed(\'height\')" id="projects_height_status" class="the_check_side" type="checkbox" checked value="yes" name="_height_state">
                <label>Height</label>
                <input onkeyup="projects_changed(\'height\')" id="projects_height" list="size" class="the_input_side" type="text" name="projects_height_value">
            </li>';
            #array_push($result, array( "id"=>$projects_id, "user_id"=>$user_id, "projects_name"=>$projects_name, "type"=>$type, "projects_default"=>$projects_default, "projects_values"=>$projects_values, "addon"=>$addon, "description"=>$description, "likes"=>$likes, "property"=>$property, "date_time"=>$date_time) );
        }
    }
	
	$stmt->close();
	return $result;
}


function num_count_user_project($connect, $project_name, $user_id){
    #require "the_connector/connect_area.php";
	$num_rows = 0;
    $stmt = $connect->prepare("SELECT COUNT(*) FROM `projects` WHERE `user_id` = ? AND `project_name`=? " );
    $stmt->bind_param("is", $user_id, $project_name);
    $stmt->execute();
    $stmt->bind_result($num_rows);
    $stmt->fetch();
    return $num_rows;
}

	
if (isset($_GET['echo'])) {
    //print("entered here");
    if($_GET['echo'] == "json"){
        print( json_encode(["status"=>"true", "result"=>get_all_projects(),  "msg"=>"Done Loading projects."] ));
    }else if($_GET['echo'] == "raw"){
        print(get_all_raw_projects());
    }
}else{
	//echo(json_encode(["status"=>"false", "msg"=>"Parameters not complete"]));
    //can just be included as function in another php file.. 
}

?>
<?php


//will contain code to select from this table and more SQL Actions
function get_icon_details($id){
    require "../the_connector/connect_area.php";
    $stmt = $connect->prepare("SELECT * FROM `icons` WHERE `icon_id`=?;");
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


function get_all_icon(){
	require "../the_connector/connect_area.php";

	$result = array();
		//$category_ = 'driver';
		$stmt = $connect->prepare("SELECT `icon_id`, `user_id`, `icon_name`, `icon_type`, `icon_location`, `icon_description`, `icon_height`, `icon_width`, `icon_default`, `variables`, `likes`, `dislikes`, `addon`, `date` FROM `icons`");
        $stmt->execute();
        $stmt->bind_result($icon_id, $user_id, $icon_name, $icon_type, $icon_location, $description, $icon_height, $icon_width, $icon_default, $variables, $likes, $dislikes, $addon, $date_time );

		if(!$stmt){
			$result = array("status"=>"false", "msg"=>"Could not get the coins symbols.");

		}elseif($stmt){
			while ($stmt->fetch()) {
				array_push($result, array( "icon_id"=>$icon_id, "user_id"=>$user_id, "icon_name"=>$icon_name, "icon_type"=>$icon_type, "icon_location"=>$icon_location, "description"=>$description, "icon_height"=>$icon_height, "icon_width"=>$icon_width, "icon_default"=>$icon_default, "variables"=>$variables, "likes"=>$likes, "dislikes"=>$dislikes, "addon"=>$addon, "date_time"=>$date_time ) );
			}
	}
	
	$stmt->close();
	return $result;
}

function get_all_raw_icon(){
    require "../the_connector/connect_area.php";

	$result = "";
    $stmt = $connect->prepare("SELECT `icon_id`, `user_id`, `icon_name`, `icon_type`, `icon_location`, `icon_description`, `icon_height`, `icon_width`, `icon_default`, `variables`, `likes`, `dislikes`, `addon`, `date` FROM `icons`");
    $stmt->execute();
    $stmt->bind_result($icon_id, $user_id, $icon_name, $icon_type, $icon_location, $description, $icon_height, $icon_width, $icon_default, $variables, $likes, $dislikes, $addon, $date_time );

    if(!$stmt){
        $result = array("status"=>"false", "msg"=>"Could not get the coins symbols.");

    }elseif($stmt){
        while ($stmt->fetch()) {
            $result .= '<span class="individual_icon" onclick="add_FA_icon(\''.$icon_name.'\')"><i class="fa fa-'.$icon_name.'"></i><label class="icon_label">'.$icon_name.'</label></span>';
        }
    }
	
	$stmt->close();
	return $result;
}


function get_icon_by_name($connect, $icon){
    //require "../the_connector/connect_area.php";
    $stmt = $connect->prepare("SELECT * FROM `icons` WHERE `icon_name`=?;");
    $stmt->bind_param("s", $icon);
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

function num_check_icon($connect, $icon){
    #require "the_connector/connect_area.php";
	$num_rows = 0;
    $stmt = $connect->prepare("SELECT COUNT(*) FROM `icons` WHERE `icon_name`=?");
    $stmt->bind_param("s", $icon);
    $stmt->execute();
    $stmt->bind_result($num_rows);
    $stmt->fetch();
    return $num_rows;
}
	
if (isset($_GET['echo'])) {
    //print("entered here");
    if($_GET['echo'] == "json"){
        print( json_encode(["status"=>"true", "result"=>get_all_icon(),  "msg"=>"Done Loading icon."] ));
    }else if($_GET['echo'] == "raw"){
        print(get_all_raw_icon());
    }
}else{
	//echo(json_encode(["status"=>"false", "msg"=>"Parameters not complete"]));
    //can just be included as function in another php file.. 
}


?>
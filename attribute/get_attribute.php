<?php

//will contain code to select from this table and more SQL Actions

function get_attr_details($id){
    require "../the_connector/connect_area.php";
    $stmt = $connect->prepare("SELECT * FROM `attributes` WHERE `attr_id`=?;");
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


function get_all_attr(){
	require "../the_connector/connect_area.php";

	$result = array();
		//$category_ = 'driver';
		$stmt = $connect->prepare("SELECT `attr_id`, `user_id`, `attr_name`, `type`, `attr_default`, `attr_values`, `addon`, `description`, `likes`, `property`, `date_time` FROM `attributes`");
		$stmt->execute();
		$stmt->bind_result($attr_id, $user_id, $attr_name, $type, $attr_default, $attr_values, $addon, $description, $likes, $property, $date_time );

		if(!$stmt){
			$result = array("status"=>"false", "msg"=>"Could not get the coins symbols.");

		}elseif($stmt){
			while ($stmt->fetch()) {
				array_push($result, array( "id"=>$attr_id, "user_id"=>$user_id, "attr_name"=>$attr_name, "type"=>$type, "attr_default"=>$attr_default, "attr_values"=>$attr_values, "addon"=>$addon, "description"=>$description, "likes"=>$likes, "property"=>$property, "date_time"=>$date_time) );
			}
	}
	
	$stmt->close();
	return $result;
}

function get_all_raw_attr(){
    require "../the_connector/connect_area.php";

	$result = "<ul>";
    $stmt = $connect->prepare("SELECT `attr_id`, `user_id`, `attr_name`, `type`, `attr_default`, `attr_values`, `addon`, `description`, `likes`, `property`, `date_time` FROM `attributes`");
    $stmt->execute();
    $stmt->bind_result($attr_id, $user_id, $attr_name, $type, $attr_default, $attr_values, $addon, $description, $likes, $property, $date_time );

    if(!$stmt){
        $result = array("status"=>"false", "msg"=>"Could not get the coins symbols.");

    }elseif($stmt){
        while ($stmt->fetch()) {
            $result .= '<li class="each_item">
                <input onchange="attr_changed(\'height\')" id="attr_height_status" class="the_check_side" type="checkbox" checked value="yes" name="_height_state">
                <label>Height</label>
                <input onkeyup="attr_changed(\'height\')" id="attr_height" list="size" class="the_input_side" type="text" name="attr_height_value">
            </li>';
            //$result .= "dance dance to the debug";
            #array_push($result, array( "id"=>$attr_id, "user_id"=>$user_id, "attr_name"=>$attr_name, "type"=>$type, "attr_default"=>$attr_default, "attr_values"=>$attr_values, "addon"=>$addon, "description"=>$description, "likes"=>$likes, "property"=>$property, "date_time"=>$date_time) );
        }
    }
	
	$stmt->close();
    $result .= "</ul>";
	return $result;
}

function get_attr_by_name($connect, $attr){
    //require "../the_connector/connect_area.php";
    $stmt = $connect->prepare("SELECT * FROM `attributes` WHERE `attr_name`=?;");
    $stmt->bind_param("s", $attr);
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

function num_check_attr($connect, $attr){
    #require "the_connector/connect_area.php";
	$num_rows = 0;
    $stmt = $connect->prepare("SELECT COUNT(*) FROM `attributes` WHERE `attr_name`=?");
    $stmt->bind_param("s", $attr);
    $stmt->execute();
    $stmt->bind_result($num_rows);
    $stmt->fetch();
    return $num_rows;
}

	
if (isset($_GET['echo'])) {
    //print("entered here");
    if($_GET['echo'] == "json"){
        print( json_encode(["status"=>"true", "result"=>get_all_attr(),  "msg"=>"Done Loading attr."] ));
    }else if($_GET['echo'] == "raw"){
        print(get_all_raw_attr());
    }
}else{
	//echo(json_encode(["status"=>"false", "msg"=>"Parameters not complete"]));
    //can just be included as function in another php file.. 
}

?>
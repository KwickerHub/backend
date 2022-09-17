<?php


//will contain code to select from this table and more SQL Actions

function get_style_details($id){
    require "../the_connector/connect_area.php";
    $stmt = $connect->prepare("SELECT * FROM `style` WHERE `style_id`=?;");
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


function get_all_style(){
	require "../the_connector/connect_area.php";

	$result = array();
		//$category_ = 'driver';
		$stmt = $connect->prepare("SELECT `style_id`, `user_id`, `style_name`, `type`, `style_default`, `style_values`, `addon`, `description`, `likes`, `property`, `date_time` FROM `style`");
		$stmt->execute();
		$stmt->bind_result($style_id, $user_id, $style_name, $type, $style_default, $style_values, $addon, $description, $likes, $property, $date_time );

		if(!$stmt){
			$result = array("status"=>"false", "msg"=>"Could not get the coins symbols.");

		}elseif($stmt){
			while ($stmt->fetch()) {
				array_push($result, array( "id"=>$style_id, "user_id"=>$user_id, "style_name"=>$style_name, "type"=>$type, "style_default"=>$style_default, "style_values"=>$style_values, "addon"=>$addon, "description"=>$description, "likes"=>$likes, "property"=>$property, "date_time"=>$date_time) );
			}
	}
	
	$stmt->close();
	return $result;
}

function get_all_raw_style(){
    require "../the_connector/connect_area.php";

	$result = "";
    $stmt = $connect->prepare("SELECT `style_id`, `user_id`, `style_name`, `type`, `style_default`, `style_values`, `addon`, `description`, `likes`, `property`, `date_time` FROM `style`");
    $stmt->execute();
    $stmt->bind_result($style_id, $user_id, $style_name, $type, $style_default, $style_values, $addon, $description, $likes, $property, $date_time );

    if(!$stmt){
        $result = array("status"=>"false", "msg"=>"Could not get the coins symbols.");

    }elseif($stmt){
        while ($stmt->fetch()) {
            $result .= '<li class="each_item">
                <input onchange="style_changed(\'height\')" id="style_height_status" class="the_check_side" type="checkbox" checked value="yes" name="_height_state">
                <label>Height</label>
                <input onkeyup="style_changed(\'height\')" id="style_height" list="size" class="the_input_side" type="text" name="style_height_value">
            </li>';
            #array_push($result, array( "id"=>$style_id, "user_id"=>$user_id, "style_name"=>$style_name, "type"=>$type, "style_default"=>$style_default, "style_values"=>$style_values, "addon"=>$addon, "description"=>$description, "likes"=>$likes, "property"=>$property, "date_time"=>$date_time) );
        }
    }
	
	$stmt->close();
	return $result;
}


function get_style_by_name($connect, $style){
    //require "../the_connector/connect_area.php";
    $stmt = $connect->prepare("SELECT * FROM `style` WHERE `style_name`=?;");
    $stmt->bind_param("s", $style);
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

function num_check_style($connect, $style){
    #require "the_connector/connect_area.php";
	$num_rows = 0;
    $stmt = $connect->prepare("SELECT COUNT(*) FROM `style` WHERE `style_name`=?");
    $stmt->bind_param("s", $style);
    $stmt->execute();
    $stmt->bind_result($num_rows);
    $stmt->fetch();
    return $num_rows;
}
	
if (isset($_GET['echo'])) {
    //print("entered here");
    if($_GET['echo'] == "json"){
        print( json_encode(["status"=>"true", "result"=>get_all_style(),  "msg"=>"Done Loading style."] ));
    }else if($_GET['echo'] == "raw"){
        print(get_all_raw_style());
    }
}else{
	//echo(json_encode(["status"=>"false", "msg"=>"Parameters not complete"]));
    //can just be included as function in another php file.. 
}

?>
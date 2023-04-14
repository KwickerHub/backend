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

	$result = "<ul>";
    $display_type = isset($_GET["display_by"]) ? ($_GET["display_by"]) : "";
    if($display_type == "like"){
        $stmt = $connect->prepare("SELECT `style_id`, `user_id`, `style_name`, `type`, `style_default`, `style_values`, `addon`, `description`, `likes`, `property`, `date_time` FROM `style` ORDER BY `likes` DESC ");
    } else if($display_type == "date-new"){
        $stmt = $connect->prepare("SELECT `style_id`, `user_id`, `style_name`, `type`, `style_default`, `style_values`, `addon`, `description`, `likes`, `property`, `date_time` FROM `style` ORDER BY `date_time` DESC ");
    } else if($display_type == "date-old"){
        $stmt = $connect->prepare("SELECT `style_id`, `user_id`, `style_name`, `type`, `style_default`, `style_values`, `addon`, `description`, `likes`, `property`, `date_time` FROM `style` ORDER BY `date_time` ASC ");
    }
    else{
        $stmt = $connect->prepare("SELECT `style_id`, `user_id`, `style_name`, `type`, `style_default`, `style_values`, `addon`, `description`, `likes`, `property`, `date_time` FROM `style`");
    }

    //$stmt = $connect->prepare("SELECT `style_id`, `user_id`, `style_name`, `type`, `style_default`, `style_values`, `addon`, `description`, `likes`, `property`, `date_time` FROM `style`");
    $stmt->execute();
    $stmt->bind_result($style_id, $user_id, $style_name, $type, $style_default, $style_values, $addon, $description, $likes, $property, $date_time );

    if(!$stmt){
        $result = array("status"=>"false", "msg"=>"Could not get the coins symbols.");

    }elseif($stmt){
        while ($stmt->fetch()) {
            if(strstr(strtolower($style_name), "color")  ){
                $result .= '<li class="each_item">
                    <input onchange="style_changed(\''.$style_name.'\')" id="style_'.$style_name.'_status" class="the_check_side" type="checkbox" checked value="yes" name="_'.$style_name.'_state">
                    <label>'.$style_name.'</label>
                    <input onchange="style_changed(\''.$style_name.'\')" id="style_'.$style_name.'" type="color" class="the_input_side" name="style_'.$style_name.'_value">
                </li>';
            }else if(strstr(strtolower($style_name), "size") or strstr(strtolower($style_name), "width") or strstr(strtolower($style_name), "height") or strstr(strtolower($style_name), "top") or strstr(strtolower($style_name), "bottom") or strstr(strtolower($style_name), "left") or strstr(strtolower($style_name), "right") or strstr(strtolower($style_name), "padding")    ){
                $result .= '<li class="each_item">
                    <input onchange="style_changed(\''.$style_name.'\')" id="style_'.$style_name.'_status" class="the_check_side" type="checkbox" checked value="yes" name="_'.$style_name.'_state">
                    <label>'.$style_name.'</label>
                    <input onchange="style_changed(\''.$style_name.'\')" id="style_'.$style_name.'" list="size" class="the_input_side" type="text" name="style_'.$style_name.'_value">
                </li>';
            }else if(  $style_name == "display" or $style_name == "float" or $style_name == "position" ){
                $the_datalist = "style_".$style_name."_data_list";
                $result .= '<li class="each_item">
                    <input onchange="style_changed(\''.$style_name.'\')" id="style_'.$style_name.'_status" class="the_check_side" type="checkbox" checked value="yes" name="_'.$style_name.'_state">
                    <label>'.$style_name.'</label>
                    <input onchange="style_changed(\''.$style_name.'\')" id="style_'.$style_name.'" list="'.$the_datalist.'" class="the_input_side" type="text" name="style_'.$style_name.'_value">
                </li>';
            }
            else{
                $result .= '<li class="each_item">
                    <input onchange="style_changed(\''.$style_name.'\')" id="style_'.$style_name.'_status" class="the_check_side" type="checkbox" checked value="yes" name="_'.$style_name.'_state">
                    <label>'.$style_name.'</label>
                    <input onkeyup="style_changed(\''.$style_name.'\')" id="style_'.$style_name.'" class="the_input_side" type="text" name="style_'.$style_name.'_value">
                </li>';
                }

            
            #array_push($result, array( "id"=>$style_id, "user_id"=>$user_id, "style_name"=>$style_name, "type"=>$type, "style_default"=>$style_default, "style_values"=>$style_values, "addon"=>$addon, "description"=>$description, "likes"=>$likes, "property"=>$property, "date_time"=>$date_time) );
        }
    }
	
	$stmt->close();
    $result .= "</ul>";
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
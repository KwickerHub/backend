<?php

//will contain code to select from this table and more SQL Actions

function get_elem_details($id){
    require "../the_connector/connect_area.php";
    $stmt = $connect->prepare("SELECT * FROM `elements` WHERE `elem_id`=?;");
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


function get_all_elem(){
	require "../the_connector/connect_area.php";
	$result = array();
    $stmt = $connect->prepare("SELECT `tag_id`, `user_id`, `tag_name`, `tag_type`, `tag_example`, `tag_description`, `default_style`, `addon`, `date_time` FROM `elements`");
    $stmt->execute();
    $stmt->bind_result($elem_id, $user_id, $elem_name, $type, $elem_example, $description, $elem_default, $addon, $date_time );

    if(!$stmt){
        $result = array("status"=>"false", "msg"=>"Could not get the coins symbols.");

    }elseif($stmt){
        while ($stmt->fetch()) {
            array_push($result, array( "id"=>$elem_id, "user_id"=>$user_id, "elem_name"=>$elem_name, "type"=>$type, "elem_default"=>$elem_default, "elem_values"=>$elem_values, "addon"=>$addon, "description"=>$description, "likes"=>$likes, "property"=>$property, "date_time"=>$date_time) );
        }
    }
	
	$stmt->close();
	return $result;
}

function get_all_raw_elem(){
    require "../the_connector/connect_area.php";

	$result = "";
    
    $stmt = $connect->prepare("SELECT `tag_id`, `user_id`, `tag_name`, `tag_type`, `tag_example`, `tag_description`, `default_style`, `addon`, `date_time` FROM `elements`");
    $stmt->execute();
    $stmt->bind_result($elem_id, $user_id, $elem_name, $type, $elem_example, $description, $elem_default, $addon, $date_time );

    if(!$stmt){
        $result = array("status"=>"false", "msg"=>"Could not get the coins symbols.");

    }elseif($stmt){
        while ($stmt->fetch()) {
            $result .= '<span ondragstart="elem_drag(event, \'div\')" draggable="true" class="the_bottom_elems" onclick="add_element_2_dashboard(\'div\')">div</span>';
            #array_push($result, array( "id"=>$elem_id, "user_id"=>$user_id, "elem_name"=>$elem_name, "type"=>$type, "elem_default"=>$elem_default, "elem_values"=>$elem_values, "addon"=>$addon, "description"=>$description, "likes"=>$likes, "property"=>$property, "date_time"=>$date_time) );
        }
    }
	
	$stmt->close();
	return $result;
}
	
if (isset($_GET['echo'])) {
    //print("entered here");
    if($_GET['echo'] == "json"){
        print( json_encode(["status"=>"true", "result"=>get_all_elem(),  "msg"=>"Done Loading elem."] ));
    }else if($_GET['echo'] == "raw"){
        print(get_all_raw_elem());
    }
}else{
	//echo(json_encode(["status"=>"false", "msg"=>"Parameters not complete"]));
    //can just be included as function in another php file.. 
}

?>
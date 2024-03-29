<?php
include "the_connector/connect_area.php";
include "users/get_users.php";
include "hashing/all_hash_algo.php";
include "sanitizer/clean_up.php";
include "generator/generator.php";
include "publicity/mailer.php";

$array = ["status"=>"false", "msg"=>"No possible connection"];
if( isset($_POST["email"]) and isset($_POST["password"])){
	$username = cleaner_4_DB($_POST["username"]);
	$email = cleaner_4_DB($_POST["email"]);
	$password = cleaner_4_DB($_POST["password"]);
	$device = isset($_POST["device"]) ? cleaner_4_DB($_POST["device"]) : "";
	$add_on = isset($_POST["addon"]) ? cleaner_4_DB($_POST["addon"]) : "";

	$public_hash = generate_strings(16);
	$private_hash = salt_and_BCRYPT($public_hash);

	$randt = generate_faster();
	$verified = 0;

	$password = salt_and_BCRYPT($password);

	$date_time = date('Y-m-d H:i:s');

	$array = array();
	$user_already = array();

	$user_already = num_count_email($connect, $email);
	//echo $user_already;
	if( $user_already >= 1){
		$array = ["status"=>"false", "msg"=>"This Account is already in existance."];
	}else if($user_already < 1 AND (filter_var($email, FILTER_VALIDATE_EMAIL))  ){

		 $inserter = $connect->prepare("INSERT INTO `clients`(`id`, `username`, `email`, `password`, `verified`, `unique_co`, `public_hash`, `private_hash`, `last_in`, `devices`, `addon`, `date_time`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		
		$inserter->bind_param("sssisssssss", $username, $email, $password, $verified, $randt, $public_hash, $private_hash, $date_time, $device, $add_on, $date_time );		
		$inserter->execute();

		if (!$inserter){
			$array = ["status"=>"false", "msg"=>"Could not register users."];
			//echo "Could not register users";
		}else{
			//echo "inserted and done man";
			if(num_count_email($connect, $email) > 0){
				$user_existance = get_user_by_email($connect, $email);			
				#$user_id = $user_existance["id"];
				#$code = $user_existance["unique_co"];
				$array = ["status"=>"true", "user"=>$user_existance, "msg"=>"Registration Successful. Check your mail box for our verification link."];
				session_start();
    			$_SESSION['uname'] = $user_existance["username"];
    			$_SESSION['userid'] = $user_existance["id"];
    			$_SESSION['user_code'] = $user_existance["unique_co"];
                $_SESSION['public_key'] = $user_existance["public_hash"];
    			$_SESSION['email'] = $email;
				mail_on_signup($email, $randt);
			}else{
				$array = ["status"=>"false", "msg"=>"We had some issues with computing your details"];
			}
		}
	}else{
		$array = ["status"=>"false", "msg"=>"You may have entered invalid details."];
	}
	
}

echo json_encode($array);

?>

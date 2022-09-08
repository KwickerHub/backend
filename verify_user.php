<?php
    
    #include all that you may need
    #you will get two parameters from the POST REQUEST.(email and verification_code)
    /* if the verification_code is thesame with the unique_co in the database for the given email, 
    then the verified column of the Database for that user will be updated to true(1)
    */
    session_start();
	$array = ["status"=>"false", "msg"=>"Missing parameters"];
	if( isset($_GET["email"])  and isset($_GET["unique"]) ){
		/*require "config/config_side.php";
		require "updaters/update_users.php";*/
		include "the_connector/connect_area.php";
        include "users/get_users.php";
        include "users/update_users.php";
        
		$email = strval(b_cleaner($_GET["email"]));
		$unique = intval(b_cleaner($_GET["unique"]));

		$array = ["status"=>"false", "msg"=>"Could not Connect."];
		//print(num_count($connect, $user_id));
		if (num_count_email($connect, $email) == 1){
			$user_info = get_user_by_email($connect, $email);
			//print(json_encode($user_info));
			if ($unique == $user_info["unique_co"] ){
				$verified = 1;
				if (change_singles_by_email($connect, 'verified', $verified, $email )){
					//$array = ["status"=>"true", "user"=>$user_info, "msg"=>"Verification Successful"];
					print("Verification Successful");
					echo '<div id="loader_side_success">
                        <br/>
                            <center>
                                <svg class="bi bi-check-circle-fill" width="120px" height="120px" viewBox="0 0 16 16" fill="green">
                                <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                </svg>
                                <br/><br/>
                                <div>
                                    <label id="msg_success" style="color: #00050A; font-family: tahoma; font-size: 20px;"> 
                                        Process Successful
                                    </label>
                                </div>
                            </center>
                        <br/>
                    </div>';
				}else{
					//$array = ["status"=>"false", "msg"=>"Could not Verify, Try Again later."];
					echo 'could not verify';
					
				}
			}else{
				//$array = ["status"=>"false", "msg"=>" Incorrect code, Could not get stored pair."];
				echo 'Incorrect code, could not get the stored pair';
			}
			
		}else{
			//$array = ["status"=>"false", "msg"=>" Could not find user Account. "];
			echo 'Could not find user.';
		}

		
	}else if(isset($_POST["unique"]) ){
		include "the_connector/connect_area.php";
        include "users/get_users.php";
        include "users/update_users.php";
        
		$email = strval(b_cleaner($_SESSION['email']));
		$unique = intval(b_cleaner($_POST["unique"]));

		$array = ["status"=>"false", "msg"=>"Could not Connect."];
		//print(num_count($connect, $user_id));
		if (num_count_email($connect, $email) == 1){
			$user_info = get_user_by_email($connect, $email);
			//print(json_encode($user_info));
			if ($unique == $user_info["unique_co"] ){
				$verified = 1;
				if (change_singles_by_email($connect, 'verified', $verified, $email )){
					$array = ["status"=>"true", "user"=>$user_info, "msg"=>"Verification Successful"];
				}else{
					$array = ["status"=>"false", "msg"=>"Could not Verify, Try Again later."];
				}
			}else{
				$array = ["status"=>"false", "msg"=>" Incorrect code, Could not get stored pair."];
			}
			
		}else{
			$array = ["status"=>"false", "msg"=>" Could not find user Account. "];
			//return flase;
		}
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
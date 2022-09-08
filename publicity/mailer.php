<?php

function mail_on_signup($email, $randt){
	    $subject = "Verify Your KwickerHub Account";
		$content = '
		<html>
            <head>
            <title> '.$subject.' </title>
            </head>
            <body style="font-family: "Lato", sans-serif;background-color:#00058A; color: #ffffff; font-size: 18px; text-align: center;">

             <center> 
            	<img style="width: 200px; height: 100px;" src="https://kwickerhub.com/assets/img/brand_kwickerhub/kwickerhub.png" alt="KwickerHub">
            </center>
            <p> Use the code below to verify your account:
            <br/>
             <center> <b> <h4> '.$randt.' </h4>  </b> </center>
            <br/>
            
            OR
            
            <br/>
            <p> You can also use the link below to verify your account. </p>    
            <a href="https://kwickerhub.com/backend/verify_user.php?email='.$email.'&unique='.$randt.'"><button style="width: 40%; padding:12px; font-weight: bold; border-radius: 12px;text-align: center; background-color: #45de32;color: #ffffff;"> Verify </button> </a>
            
             </p>
            </body>';
		
		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		
		// More headers
		$headers .= 'From: <kwicker@kwickerhub.com>' . "\r\n";
		
		mail($email,$subject,$content,$headers);

}



function mail_the_client($to, $message, $subject){
		$content = '
		<html>
            <head>
            <title> '.$subject.' </title>
            </head>
            <body style="font-family: "Lato", sans-serif;background-color:#00058A; color: #ffffff; font-size: 18px; text-align: center;">

             <center> 
            	<img style="width: 200px; height: 100px;" src="https://kwickerhub.com/assets/img/brand_kwickerhub/kwickerhub.png" alt="KwickerHub">
            </center>
            <p> '.$message.'
            <br/>
             
            <br/>
            <br/>
                
            <a href="kwickerhub.com"><button style="width: 60%; padding:12px; font-weight: bold; border-radius: 12px;text-align: center; background-color: #45de32;color: #ffffff;"> MORE </button> </a>
            
             </p>
            </body>';
		
		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		
		// More headers
		$headers .= 'From: <kwicker@kwickerhub.com>' . "\r\n";
		
		mail($to,$subject,$content,$headers);

}

?>
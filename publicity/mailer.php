<?php

function mail_on_signup($email, $randt){
    include "../email_credentials.php";
    #this function will send an email to the user upon sign-up.

    $auth_domain = email_crendential_userAuth();
    $host = email_crendential_userHost();
    $smtp_username = email_crendential_userN();
    $smpt_pass = email_crendential_userPass();
    $ses_identity = email_crendential_userEmail();

    $to = $email;
    $subject = "KwickerHub Verification";
    $body = "Please use this code to verify your account with KwickerHub " . $randt . " <br/> <br/> Ignore this message if this account was not created by you. " ;

    #It will also send the verification code to the user to complete the verification process.

    Send_Mail($auth_domain, $ses_identity, $host, $smtp_username, $smpt_pass, $to, $subject,$body);
    
}

function Send_Mail($auth_domain, $ses_identity, $smtp_host, $smtp_username, $smpt_pass,  $to,$subject,$body) {
    
    //$auth_domain = $auth_domain; // 'yourdomain.com or verified email address'
    $from = $ses_identity;
    $mail = new PHPMailer();
    $mail->IsSMTP(true); // SMTP
    $mail->SMTPAuth   = true;  // SMTP authentication
    $mail->Mailer = "smtp";

    $mail->Host= $stmp_host; // Amazon SES
    $mail->Port = 587;  // SMTP Port
    // $mail->Username = "kwickerhub";  // SMTP  Username
    // $mail->Password = "kwickerhub@ACES";  // SMTP Password 
    $mail->Username = $smtp_username;  // SMTP  Username
    $mail->Password = $smpt_pass;  // SMTP Password 
    $mail->SetFrom($from, 'KwickerHUb');
    $mail->AddReplyTo($from, $auth_domain);
    $mail->Subject = $subject;
    $mail->MsgHTML($body);
    $address = $to;
    $mail->AddAddress($address, $to);

    if(!$mail->Send())
        return false;
    else
        return true;

}

?>
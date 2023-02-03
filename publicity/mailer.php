<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
include "knowledge_power.php";

mail_on_signup("kwickerhub@gmail.com", 567383);
function mail_on_signup($to, $randt){
    //$to = $email;
    $subject = "KwickerHub";
    $body = "Please use this code to verify your account with KwickerHub " . $randt . " <br/> <br/> Ignore this message if this account was not created by you. " ;
    $auth_domain = "icogrowser@gmail.com"; // 'yourdomain.com or verified email address'

    $from = "icogrowser@gmail.com"; // $from = "verified_email address";
    $mail = new PHPMailer();
    $mail->IsSMTP(true); // SMTP
    $mail->SMTPAuth   = true;  // SMTP authentication
    $mail->Mailer = "smtp";

    $mail->Host= "tls://email-smtp.us-east-1.amazonaws.com"; // Amazon SES
    $mail->Port = 587;  // SMTP Port
    $mail->Username = email_crendential_userN();  // SMTP  Username
    $mail->Password = email_crendential_userPass();  // SMTP Password 
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

//Send_Mail_2("kwickerhub@gmail.com", "KwickerHub", "Please use this code to verify your account with KwickerHub "); 
function Send_Mail_2($to,$subject,$body) {
    $auth_domain = "icogrowser@gmail.com"; // 'yourdomain.com or verified email address'

    $from = "icogrowser@gmail.com"; // $from = "verified_email address";
    $mail = new PHPMailer();
    $mail->IsSMTP(true); // SMTP
    $mail->SMTPAuth   = true;  // SMTP authentication
    $mail->Mailer = "smtp";

    $mail->Host= "tls://email-smtp.us-east-1.amazonaws.com"; // Amazon SES
    $mail->Port = 587;  // SMTP Port
    $mail->Username = email_crendential_userN();  // SMTP  Username
    $mail->Password = email_crendential_userPass();  // SMTP Password 
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

/* function Send_Mail($auth_domain, $ses_identity, $smtp_host, $smtp_username, $smpt_pass,  $to,$subject,$body) {
    
    //$auth_domain = $auth_domain; // 'yourdomain.com or verified email address'
    $from = $ses_identity;
    $mail = new PHPMailer();
    $mail->IsSMTP(true); // SMTP
    $mail->SMTPAuth   = true;  // SMTP authentication
    $mail->Mailer = "smtp";

    $mail->Host= $smtp_host; // Amazon SES
    $mail->Port = 465;  // SMTP Port
    // $mail->Username = "kwickerhub";  // SMTP  Username
    // $mail->Password = "kwickerhub@ACES";  // SMTP Password 
    $mail->Username = $smtp_username;  // SMTP  Username
    $mail->Password = $smpt_pass;  // SMTP Password 
    $mail->SetFrom($from, 'KwickerHub');
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
 */
?>
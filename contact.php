<?php
require 'phpmailer/PHPMailerAutoload.php';

$contactName = $_REQUEST['name'];
$contactSurname=$_REQUEST['surname'];
$contactEmail=$_REQUEST['email'];
$contactPhone=$_REQUEST['phone'];
$contactMessage=$_REQUEST['message'];
$contactSubject="Message from ".$contactName;
$message = '<html><body><table><tr><td>Email id :  </td><td> '.$contactEmail.'</td></tr><tr><td>Name : </td><td> '.$contactName.''.$contactSurname.'</td></tr><tr><td>Says : </td><td> '.$contactMessage.'</td></tr></table></body></html>';



$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = 'localhost';
$mail->Port = 25;
$mail->SMTPAuth = false;
$mail->SMTPSecure = false;
/*$mail->Username = "afthab000@gmail.com";
$mail->Password = "elgoog80890#";*/


/*$mail->Host = localhost;*/

$mail->setFrom('info@smartgentech.com', 'Mailer');
$mail->addAddress('info@smartgentech.com', 'Smartgen Technologies'); 
$mail->addAddress('tony.jose.in@gmail.com', 'Tony Jose');
$mail->addCC('sabaishinfo@gmail.com');
$mail->SMTPDebug = 2;


$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $contactSubject;
$mail->Body    = $message ;
$mail->AltBody = "Email id :   ".$contactEmail. "\r\n" .$contactName." " .$contactSurname. " Says : ".$contactMessage;

/*$mail->AltBody = "Did you request a password reset for your account?\r\n\r\nIf yes, click here:\r\nhttp://www.website.com";*/

if(!$mail->send()) {
    echo '<script language="javascript">';
    echo 'alert("Oops, Something went wrong. Please try again later");';
    echo 'window.location.href="contact.html";';
    echo '</script>';
} else {
    echo '<script language="javascript">';
    echo 'alert("Thank You for Contacting Us, We will get back to you soon.");';
    echo 'window.location.href="contact.html";';
    echo '</script>';
}

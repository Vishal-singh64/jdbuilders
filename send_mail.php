<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP; // Import the SMTP class

require 'vendor/src/Exception.php';
require 'vendor/src/PHPMailer.php';
require 'vendor/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                   
        $mail->isSMTP();                                         
        $mail->Host       = 'smtp.gmail.com';                    
        $mail->SMTPAuth   = true;                                
        $mail->Username   = 'vs598480@gmail.com';                
        $mail->Password   = 'naxtacczrfuighdx';                  
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         
        $mail->Port       = 465;                                 

        // Recipients
        $mail->setFrom($email,$name);       //Your email and name
        $mail->addAddress('vs598480@gmail.com', 'Jd Builders'); //Recipient's email and name

        // Content
        $mail->isHTML(true);                                    //Set email format to HTML
        $mail->Subject = 'New Message from Contact Form';
        $mail->Body    = "Name: $name<br>Email: $email<br>Message: $message";

        $mail->send();
        header("Location: thank_you.html");                     //Redirect to the thank you page after successful email
        exit();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Invalid request.";
}
?>

<?php
/**
 * Scenario B: Email Processing Script
 */

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/PHPMailer/Exception.php';
require '../vendor/PHPMailer/PHPMailer.php';
require '../vendor/PHPMailer/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $userName    = htmlspecialchars($_POST['name']);
    $userEmail   = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $userMessage = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);

    try {
        $mail->SMTPDebug = SMTP::DEBUG_OFF; 
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        
        $mail->Username   = 'CrispyTeam05@gmail.com';
        $mail->Password   = 'vrxixiokfkwqdmyn'; 
        
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('CrispyTeam05@gmail.com', 'Crispy Support Team');
        $mail->addAddress($userEmail, $userName);

        $mail->isHTML(true);
        $mail->Subject = 'Confirmation: We received your message';
        
        $mail->Body    = "
            <h2>Hello, $userName!</h2>
            <p>I've already received the message, the message you sent is:</p>
            <blockquote style='border-left: 5px solid #ccc; padding-left: 10px;'>
                $userMessage
            </blockquote>
            <p>Best regards,<br>Crispy Team Support</p>
        ";

        $mail->send();

        header("Location: thanks.php");
        exit();

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    header("Location: index.php");
    exit();
}
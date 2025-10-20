<?php

// Check if all required fields are set
$requiredFields = ['name', 'email', 'subject', 'message'];
foreach ($requiredFields as $field) {
    if (!isset($_POST[$field]) || empty(trim($_POST[$field]))) {
        header("Location: ../../../contact.php?msg=Alle velden dienen te worden ingevuld.&type=error");
        exit();
    }
}

// Validate email format
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    header("Location: ../../../contact.php?msg=Ongeldig email formaat.&type=error");
    exit();
}

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

require '../../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true); // true enables exceptions

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'hidayatestbreda@gmail.com'; // Sender's email address
    $mail->Password = 'bqja kgbv oehx hvwk'; // Sender's app password
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Recipients
    $mail->setFrom($email, $name);
    $mail->addAddress('alhidayabreda@gmail.com'); // Replace with your recipient's email address

    // Content
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = "<h1>$subject</h1>
                    <p><strong>Email:</strong> $email</p>
                   <p><strong>Naam:</strong> $name</p>
                   " . nl2br($message);
    $mail->AltBody = strip_tags($message);

    // Send email
    $mail->send();
    header("Location: ../../../contact.php?msg=Email is successvol verzonden!&type=success");
} catch (Exception $e) {
    header("Location: ../../../contact.php?msg=Email is niet verzonden. Mailer Error: " . $mail->ErrorInfo . "&type=error");
}



<?php

// Define required fields
$requiredFields = ['name', 'email', 'phone', 'birthdate', 'preferences'];

// Check if all required fields are set and not empty
foreach ($requiredFields as $field) {
    if (!isset($_POST[$field]) || empty(trim($_POST[$field]))) {
        header("Location: ../../../vrijwilligers.php?msg=Alle velden dienen te worden ingevuld.&type=error");
        exit();
    }
}

// Validate email format
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    header("Location: ../../../vrijwilligers.php?msg=Ongeldig email formaat.&type=error");
    exit();
}

// Validate name: no numbers, max 50 characters
if (!preg_match("/^[a-zA-ZÀ-ÿ\s'-]+$/u", $_POST['name']) || strlen($_POST['name']) > 50) {
    header("Location: ../../../vrijwilligers.php?msg=Naam mag geen cijfers bevatten en moet minder dan 50 tekens zijn.&type=error");
    exit();
}

// Validate phone number: only numbers, between 10-15 digits
if (!preg_match("/^\d{10,15}$/", $_POST['phone'])) {
    header("Location: ../../../vrijwilligers.php?msg=Telefoonnummer moet tussen de 10 en 15 cijfers zijn.&type=error");
    exit();
}

// Validate birthdate: cannot be in the future
$currentYear = date("Y");
$birthYear = (int)date("Y", strtotime($_POST['birthdate']));
if ($birthYear > $currentYear) {
    header("Location: ../../../vrijwilligers.php?msg=Geboorte datum kan niet in de toekomst liggen.&type=error");
    exit();
}

// Sanitize and assign variables
$name = htmlspecialchars(trim($_POST['name']));
$email = htmlspecialchars(trim($_POST['email']));
$phone = htmlspecialchars(trim($_POST['phone']));
$birthdate = htmlspecialchars(trim($_POST['birthdate']));
$preferences = htmlspecialchars(trim($_POST['preferences']));
$message = isset($_POST['message']) ? nl2br(htmlspecialchars(trim($_POST['message']))) : 'Geen extra bericht.';


require '../../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    // --- SEND FIRST EMAIL TO YOUR TEAM ---
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Update with your SMTP host
    $mail->SMTPAuth = true;
    $mail->Username = 'hidayatestbreda@gmail.com'; // Sender's email address
    $mail->Password = 'bqja kgbv oehx hvwk'; // Sender's app password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Recipients
    $mail->setFrom($email, $name);
    $mail->addAddress('info@alhidaya.nl'); // Recipient's email address

    // Content for team email
    $mail->isHTML(true);
    $mail->Subject = 'Nieuwe Vrijwilligersaanmelding';
    $mail->Body = "
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; background-color: #f7f7f7; color: #333; }
                .email-container { background-color: #ffffff; border-radius: 8px; padding: 20px; margin: 20px auto; width: 600px; }
                .email-header { border-bottom: 2px solid #2c3e50; padding-bottom: 15px; text-align: center; }
                .email-header h2 { color: #2c3e50; }
                .email-body p { margin: 10px 0; }
            </style>
        </head>
        <body>
            <div class='email-container'>
                <div class='email-header'>
                    <h2>Nieuwe Vrijwilligersaanmelding</h2>
                </div>
                <div class='email-body'>
                    <p><strong>Naam:</strong> $name</p>
                    <p><strong>E-mailadres:</strong> $email</p>
                    <p><strong>Telefoonnummer:</strong> $phone</p>
                    <p><strong>Geboorte datum:</strong> $birthdate</p>
                    <p><strong>Voorkeur voor activiteiten:</strong> $preferences</p>
                    <p><strong>Bericht:</strong><br>$message</p>
                </div>
            </div>
        </body>
        </html>
    ";
    $mail->AltBody = "Nieuwe Vrijwilligersaanmelding:\n\nNaam: $name\nE-mailadres: $email\nTelefoonnummer: $phone\nTalent: $talents\nVoorkeuren: $preferences\nBericht: $message";

    // Send first email
    $mail->send();

    // --- PREPARE SECOND EMAIL FOR THE USER ---
    $mail->clearAddresses(); // Clear recipients for the next email
    $mail->setFrom('info@alhidaya.nl', 'Al Hidaya'); // Set from Al Hidaya's official email
    $mail->addAddress($email, $name); // Send to the user

    $mail->Subject = 'Bevestiging van Jouw Aanmelding als Vrijwilliger bij Al Hidaya';


    // Add logo URL
    $logoUrl = 'https://alhidaya.nl/public/img/alhidayaBredaKaal2.png'; // Replace with the actual URL of your logo

    $mail->Body = "
    <html>
    <head>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #fefbf3;
                color: #5c5c5c;
                margin: 0;
                padding: 0;
            }

            .email-container {
                background-color: #ffffff;
                border-radius: 8px;
                width: 100%;
                max-width: 600px;
                margin: 30px auto;
                padding: 20px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                border: 1px solid #f0e5d8;
            }

            .email-header {
                text-align: center;
                padding-bottom: 15px;
                border-bottom: 2px solid #e8dcb3;
                margin-bottom: 20px;
            }

            .email-header img {
                max-width: 150px;
                margin-bottom: 10px;
            }

            .email-header h2 {
                color: #d4a72c;
                margin: 0;
            }

            .email-body {
                line-height: 1.6;
            }

            .email-body p {
                margin: 15px 0;
            }

            .email-body a {
                color: #d4a72c;
                text-decoration: none;
            }

            .email-body a:hover {
                text-decoration: underline;
            }

            .email-footer {
                text-align: center;
                font-size: 0.9em;
                margin-top: 30px;
                color: #8c8c8c;
                border-top: 2px solid #e8dcb3;
                padding-top: 15px;
            }

            .email-footer p {
                margin: 5px 0;
            }
        </style>
    </head>
    <body>
        <div class='email-container'>
            <div class='email-header'>
                <img src='$logoUrl' alt='Al Hidaya Logo'>
                <h2>Bevestiging van Jouw Aanmelding</h2>
            </div>
            <div class='email-body'>
                <p>Beste $name,</p>
                <p>Bedankt voor jouw aanmelding als vrijwilliger bij Al Hidaya! Moge Allah jouw intenties belonen en jouw inspanningen zegenen.</p>
                <p>Onze vrijwilligerscoördinator zal binnenkort contact met je opnemen om jouw aanmelding verder te bespreken. We kijken ernaar uit om samen met jou een positieve bijdrage te leveren aan de gemeenschap.</p>
                <p>Heb je in de tussentijd nog vragen? Neem gerust contact met ons op via <a href='mailto:info@alhidaya.nl'>info@alhidaya.nl</a>.</p>
                <p>Moge Allah jouw inzet in goede daden vermeerderen.</p>
            </div>
            <div class='email-footer'>
                <p>Met vriendelijke groet,</p>
                <p><strong>Team Al Hidaya</strong></p>
                <p><a href='https://alhidaya.nl'>www.alhidaya.nl</a></p>
            </div>
        </div>
    </body>
    </html>
    ";

    $mail->AltBody = "Beste $name,\n\nBedankt voor jouw aanmelding als vrijwilliger bij Al Hidaya! Moge Allah jouw intenties belonen en jouw inspanningen zegenen.\n\nOnze vrijwilligerscoördinator zal binnenkort contact met je opnemen om jouw aanmelding verder te bespreken. We kijken ernaar uit om samen met jou een positieve bijdrage te leveren aan de gemeenschap.\n\nHeb je in de tussentijd nog vragen? Neem gerust contact met ons op via info@alhidaya.nl.\n\nMoge Allah jouw inzet in goede daden vermeerderen.\n\nMet vriendelijke groet,\nTeam Al Hidaya";

    // Send second email
    $mail->send();

    header("Location: ../../../vrijwilligers.php?msg=Je aanmelding is succesvol verzonden!&type=success");

} catch (Exception $e) {
    header("Location: ../../../vrijwilligers.php?msg=Er is een fout opgetreden bij het verzenden van de e-mails. Mailer Error: " . $mail->ErrorInfo . "&type=error");
}

?>

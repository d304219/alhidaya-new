<?php
require '../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

session_start();  // Start the session

$mollie = new \Mollie\Api\MollieApiClient();
$mollie->setApiKey("live_j8z3UD2w7hhqGbVCMxngznTPUW6Eap");

$payment_id = $_SESSION['payment_id'];

try {
    $payment = $mollie->payments->get($payment_id);

    if ($payment->isPaid()) {
        // Initialize PHPMailer
        $mail = new PHPMailer(true);
        try {
            // Enable SMTP debugging
            $mail->SMTPDebug = 0;  // Set to 0 for no debugging, or 2 for detailed output
            $mail->Debugoutput = 'html';  // Output in HTML format
            
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'hidayatestbreda@gmail.com'; // Sender's email address
            $mail->Password = 'bqja kgbv oehx hvwk'; // Sender's app password
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Recipients
            $recipientEmail = $payment->metadata->email;
            $mail->setFrom('alhidayabreda@gmail.com', 'Alhidaya');  // Replace with your sender's email and name
            $mail->addAddress($recipientEmail); // Recipient's email address from metadata

            // Content for user email
            $mail->isHTML(true);
            $mail->Subject = 'Bevestiging van je inschrijving/donatie';
            $mail->Body = "
            <html>
            <head>
                <style>
                    .email-wrapper {
                        font-family: Arial, sans-serif;
                        max-width: 600px;
                        margin: 0 auto;
                        border: 1px solid #ddd;
                        border-radius: 10px;
                        padding: 20px;
                        background-color: #f9f9f9;
                    }
                    .header {
                        text-align: center;
                        margin-bottom: 30px;
                    }
                    .confirmation {
                        text-align: center;
                        font-size: 18px;
                        color: #333;
                    }
                    .footer {
                        text-align: center;
                        margin-top: 30px;
                        font-size: 12px;
                        color: #999;
                    }
                </style>
            </head>
            <body>
                <div class='email-wrapper'>
                    <div class='header'>
                        <h2>Bevestiging van je inschrijving/donatie</h2>
                    </div>
                    <div class='confirmation'>
                        As-Salaam ou Alaikum,<br><br>
                        Bedankt voor je inschrijving voor het seminar. De biografie van de Profeet Mohammed (vrede zij met hem) in vogelvlucht dat op zaterdag 12 oktober zal plaatsvinden.<br><br>
                        Het seminar begint om 10:30 uur en zal eindigen om 16:00 uur (Asr-gebed).<br><br>
                        <strong>Locatie:</strong><br>
                        Antiloopstraat 51<br>
                        4817LB Breda <br><br>
                        Vergeet niet om schrijfgerei mee te nemen, en je zuivere intentie (Ikhlaas).<br><br>
                        We kijken ernaar uit je te verwelkomen! Mocht je vragen hebben, dan kun je reageren op deze mail.
                    </div>
                    <div class='footer'>
                        Met vriendelijke groet,<br>
                        <i>~Team Al-Hidaya Jongerencommissie</i><br><br>
                        Blijf in contact via ons <a href='https://whatsapp.com/channel/0029VaYZDcBHltYIlbj5ye2Q'>WhatsApp-kanaal!</a><br>
                    </div>
                </div>
            </body>
            </html>
            ";



            
            // Send the user confirmation email
            $mail->send();

            // Now send the admin email
            $adminMail = new PHPMailer(true);
            try {
                // Server settings for admin email
                $adminMail->isSMTP();
                $adminMail->Host = 'smtp.gmail.com';
                $adminMail->SMTPAuth = true;
                $adminMail->Username = 'hidayatestbreda@gmail.com'; // Sender's email address
                $adminMail->Password = 'bqja kgbv oehx hvwk'; // Sender's app password
                $adminMail->SMTPSecure = 'tls';
                $adminMail->Port = 587;

                // Recipient for admin email
                $adminMail->setFrom('alhidayabreda@gmail.com', 'Alhidaya');  // Replace with your sender's email and name
                $adminMail->addAddress('hanserief12@gmail.com'); // Admin email address Jongeren@alhidaya.nl

                // Content for admin email
                $adminMail->isHTML(true);
                $adminMail->Subject = 'Nieuwe inschrijving voor het seminar';
                $adminMail->Body = "
                <html>
                <head>
                    <style>
                        .email-wrapper {
                            font-family: Arial, sans-serif;
                            max-width: 600px;
                            margin: 0 auto;
                            border: 1px solid #ddd;
                            border-radius: 10px;
                            padding: 20px;
                            background-color: #f9f9f9;
                        }
                        .details-heading {
                            font-weight: bold;
                            font-size: 16px;
                            margin-bottom: 10px;
                        }
                        .details-item {
                            margin-bottom: 10px;
                            font-size: 14px;
                        }
                    </style>
                </head>
                <body>
                    <div class='email-wrapper'>
                        <h2>Nieuwe inschrijving</h2>
                        <div class='details-heading'>Klantinformatie:</div>
                        <div class='details-item'>
                            <strong>Naam:</strong> {$payment->metadata->name}
                        </div>
                        <div class='details-item'>
                            <strong>E-mailadres:</strong> {$recipientEmail}
                        </div>
                        <div class='details-item'>
                            <strong>Geslacht:</strong> {$payment->metadata->gender}  <!-- Show gender -->
                        </div>
                        <div class='details-item'>
                            <strong>Betalings ID:</strong> {$payment_id}
                        </div>
                        <div class='details-item'>
                            <strong>Bedrag:</strong> {$payment->amount->currency} {$payment->amount->value}
                        </div>
                    </div>
                </body>
                </html>
                ";

                // Send the admin email
                $adminMail->send();

            } catch (Exception $e) {
                echo "Admin email could not be sent. Mailer Error: {$adminMail->ErrorInfo}";
            }

            // Clear the session variable after sending the email
            unset($_SESSION['payment_id']);
            header("Location: https://alhidaya.nl/payment_succes.php");
            exit(); // Make sure to stop the script after redirection
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Payment not completed!";
    }
} catch (\Mollie\Api\Exceptions\ApiException $e) {
    echo "API call failed: " . htmlspecialchars($e->getMessage());
}
?>

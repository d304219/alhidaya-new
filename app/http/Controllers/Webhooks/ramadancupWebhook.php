<?php
require '../../../../vendor/autoload.php'; 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mollie = new \Mollie\Api\MollieApiClient();
$mollie->setApiKey("live_j8z3UD2w7hhqGbVCMxngznTPUW6Eap");

try {
    if (!isset($_POST["id"])) {
        http_response_code(400);
        echo "Geen betalings-ID ontvangen.";
        exit;
    }

    $payment = $mollie->payments->get($_POST["id"]);

    if ($payment->isPaid() && !$payment->hasRefunds() && !$payment->hasChargebacks()) {
        $recipientEmail = $payment->metadata->email;
        $teamName = $payment->metadata->teamName;
        $number = $payment->metadata->number;
        $adminEmail = "jongeren@alhidaya.nl"; 

        // Bevestigingsmail naar deelnemer
        $userMail = new PHPMailer(true);
        try {
            $userMail->isSMTP();
            $userMail->Host = 'mail.yourhosting.nl';
            $userMail->SMTPAuth = true;
            $userMail->Username = 'jongeren@alhidaya.nl';
            $userMail->Password = 'Shabaab2022';
            $userMail->SMTPSecure = 'tls';
            $userMail->Port = 587;

            $userMail->setFrom('jongeren@alhidaya.nl', 'Al-Hidaya');
            $userMail->addAddress($recipientEmail);

            $userMail->isHTML(true);
            $userMail->Subject = 'Bevestiging inschrijving Ramadan Cup 2025';
            $userMail->Body = "
            <html>
            <head>
                <style>
                    body { font-family: Arial, sans-serif; background-color: #f9f9f9; margin: 0; padding: 0; }
                    .email-wrapper { max-width: 600px; margin: 20px auto; border: 1px solid #ddd; border-radius: 10px; background-color: #ffffff; padding: 20px; }
                    .header { background-color: #f0e5d1; padding: 20px; text-align: center; }
                    .header img { max-width: 148px; margin-bottom: 10px; }
                    .body { color: #333; line-height: 1.6; }
                    .footer { text-align: center; padding: 15px; font-size: 12px; color: #999; }
                </style>
            </head>
            <body>
                <div class='email-wrapper'>
                    <div class='header'>
                        <img src='https://alhidaya.nl/public/img/alhidayaBredaKaal2.png' alt='Al-Hidaya Logo'>
                        <h1>Bevestiging inschrijving Ramadan Cup 2025</h1>
                    </div>
                    <div class='body'>
                        <p>Salaamoulaikom broeders,</p>
                        <p>Jullie inschrijving voor de Al Hidaya Ramadan Cup is hierbij bevestigd. Dit bericht dient als bewijs van inschrijving voor jullie team.</p>
                        <p>Wij herinneren jullie eraan dat de islamitische kledingvoorschriften nageleefd dienen te worden en dat sportiviteit en broederschap centraal staan. Behandel jullie medespelers en tegenstanders met respect, zoals onze deen ons leert.</p>
                        <p>We kijken uit naar een gezegend en sportief toernooi!</p>
                        <p>Met vriendelijke groet,<br><strong>Team jongeren Al Hidaya</strong></p>
                    </div>
                    <div class='footer'>
                        Deze e-mail is automatisch gegenereerd. Vragen? <a href='https://alhidaya.nl/contact.php'>Neem contact op</a>.
                    </div>
                </div>
            </body>
            </html>";

            $userMail->send();
        } catch (Exception $e) {
            error_log("E-mail verzenden mislukt: " . $userMail->ErrorInfo);
        }

        // Mail naar admin
        $adminMail = new PHPMailer(true);
        try {
            $adminMail->isSMTP();
            $adminMail->Host = 'smtp.gmail.com';
            $adminMail->SMTPAuth = true;
            $adminMail->Username = 'hidayatestbreda@gmail.com';
            $adminMail->Password = 'bqja kgbv oehx hvwk';
            $adminMail->SMTPSecure = 'tls';
            $adminMail->Port = 587;

            $adminMail->setFrom('alhidayabreda@gmail.com', 'Alhidaya');
            $adminMail->addAddress($adminEmail);

            $adminMail->isHTML(true);
            $adminMail->Subject = 'Nieuwe inschrijving Ramadan Cup';
            $adminMail->Body = "
            <html>
            <head>
                <style>
                    body { font-family: Arial, sans-serif; background-color: #f9f9f9; margin: 0; padding: 0; }
                    .email-wrapper { max-width: 600px; margin: 20px auto; border: 1px solid #ddd; border-radius: 10px; background-color: #ffffff; padding: 20px; }
                    .header { background-color: #f0e5d1; padding: 20px; text-align: center; }
                    .header h1 { font-size: 20px; color: #333; }
                    .body { color: #333; line-height: 1.6; padding: 20px; }
                    .details-table { width: 100%; border-collapse: collapse; margin-top: 15px; }
                    .details-table th, .details-table td { text-align: left; padding: 8px; border: 1px solid #ddd; }
                    .details-table th { background-color: #f7f7f7; }
                    .footer { text-align: center; padding: 15px; font-size: 12px; color: #999; }
                </style>
            </head>
            <body>
                <div class='email-wrapper'>
                    <div class='header'>
                        <h1>Nieuwe inschrijving Ramadan Cup</h1>
                    </div>
                    <div class='body'>
                        <h2>Inschrijvingsdetails:</h2>
                        <table class='details-table'>
                            <tr><th>Teamnaam</th><td>$teamName</td></tr>
                            <tr><th>Email</th><td>$recipientEmail</td></tr>
                            <tr><th>Email</th><td>$number</td></tr>
                        </table>
                    </div>
                    <div class='footer'>
                        Deze e-mail is automatisch gegenereerd.
                    </div>
                </div>
            </body>
            </html>";

            $adminMail->send();
        } catch (Exception $e) {
            error_log("E-mail verzenden naar admin mislukt: " . $adminMail->ErrorInfo);
        }
    }
} catch (\Mollie\Api\Exceptions\ApiException $e) {
    http_response_code(500);
    echo "Mollie API fout: " . htmlspecialchars($e->getMessage());
}
?>

<?php
require "../vendor/autoload.php"; // Laad Mollie SDK en PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Initialiseer de Mollie API
$mollie = new \Mollie\Api\MollieApiClient();
$mollie->setApiKey("live_j8z3UD2w7hhqGbVCMxngznTPUW6Eap");

try {
    // Controleer of de payment ID aanwezig is
    if (!isset($_POST["id"])) {
        http_response_code(400); // Bad request
        echo "Geen betalings-ID ontvangen.";
        exit;
    }

    // Haal de betaling op via Mollie
    $payment = $mollie->payments->get($_POST["id"]);

    if ($payment->isPaid() && !$payment->hasRefunds() && !$payment->hasChargebacks()) {
        // Initialiseer PHPMailer
        $mail = new PHPMailer(true);
        try {
            // E-mail instellingen voor gebruiker
            $mail->SMTPDebug = 0; // Geen debugging (gebruik 2 voor debugging)
            $mail->isSMTP();
            $mail->Host = 'mail.yourhosting.nl';
            $mail->SMTPAuth = true;
            $mail->Username = 'jongeren@alhidaya.nl';
            $mail->Password = 'Shabaab2022'; // App-wachtwoord
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Ontvanger gegevens
            $recipientEmail = $payment->metadata->email;
            $mail->setFrom('jongeren@alhidaya.nl', 'Alhidaya');
            $mail->addAddress($recipientEmail);

            // Bepaal geslacht voor begroeting
            $genderGreeting = ($payment->metadata->gender === 'Man') ? 'Beste broeder,' : 'Beste zuster,';

            // E-mail inhoud gebruiker
            $mail->isHTML(true);
            $mail->Subject = 'Bevestiging inschrijving seminar Fiqh as-Siyaam';
            $mail->Body = "
                            <html>
                            <head>
                                <style>
                                    body {
                                        font-family: Arial, sans-serif;
                                        margin: 0;
                                        padding: 0;
                                        background-color: #f9f9f9;
                                    }
                                    .email-wrapper {
                                        max-width: 600px;
                                        margin: 20px auto;
                                        border: 1px solid #ddd;
                                        border-radius: 10px;
                                        background-color: #ffffff;
                                        overflow: hidden;
                                    }
                                    .header {
                                        background-color: #f0e5d1; /* Beige kleur */
                                        padding: 20px;
                                        text-align: center;
                                    }
                                    .header img {
                                        max-width: 148px;
                                        margin-bottom: 10px;
                                    }
                                    .header h1 {
                                        font-size: 22px;
                                        color: #333333;
                                        margin: 0;
                                    }
                                    .body {
                                        padding: 20px;
                                        color: #333333;
                                        line-height: 1.6;
                                    }
                                    .body h2 {
                                        font-size: 18px;
                                        color: #555555;
                                        margin-bottom: 15px;
                                    }
                                    .body p {
                                        margin: 10px 0;
                                    }
                                    .footer {
                                        text-align: center;
                                        background-color: #f7f7f7;
                                        text-align: center;
                                        padding: 15px;
                                        font-size: 12px;
                                        color: #999999;
                                    }
                                </style>
                            </head>
                            <body>
                                <div class='email-wrapper'>
                                    <div class='header'>
                                        <img src='https://alhidaya.nl/public/img/alhidayaBredaKaal2.png' alt='Al-Hidaya Logo'> <!-- Vervang de URL door jullie logo -->
                                        <h1>Bevestiging inschrijving seminar</h1>
                                    </div>
                                    <div class='body'>
                                        <p>$genderGreeting</p>
                                        <p>
                                            Bedankt voor je inschrijving voor het seminar 
                                            Fiqh as-Siyaam – Alles wat je moet weten over het vasten</strong> op 
                                            <strong>zaterdag 15 februari</strong>.
                                        </p>
                                        <p>
                                            Hierbij bevestigen we je deelname. De inloop start om <strong>09:30 uur</strong>, 
                                            en het programma begint om <strong>10:00 uur</strong>. Het dagprogramma ontvang je 
                                            uiterlijk twee dagen vóór het seminar via e-mail.
                                        </p>
										<p>
											Mocht je geen dagprogramma ontvangen, controleer dan ook je map met ongewenste e-mails.
										</p>
                                        <p>
                                            We kijken ernaar uit om je te verwelkomen, in sha Allah!
                                        </p>
                                        <p>
                                            Wa Salam Alaikom,<br>
                                            Team Al-Hidaya Breda
                                        </p>
                                    </div>
                                    <div class='footer' style='justify-content: center;
                                    flex-direction: column;
                                    align-items: center;'>
                                        Deze e-mail is automatisch gegenereerd. Heb je vragen? <a href='https://alhidaya.nl/contact.php'>Neem gerust contact met ons op</a>
                                        <br>
                                        Blijf in contact via ons <a href='https://whatsapp.com/channel/0029VaYZDcBHltYIlbj5ye2Q'>WhatsApp-kanaal!</a>
                                    </div>
                                </div>
                            </body>
                            </html>
                            ";


            $mail->send();

            // Admin e-mail
            $adminMail = new PHPMailer(true);
            $adminMail->isSMTP();
            $adminMail->Host = 'mail.yourhosting.nl';
            $adminMail->SMTPAuth = true;
            $adminMail->Username = 'jongeren@alhidaya.nl';
            $adminMail->Password = 'Shabaab2022';
            $adminMail->SMTPSecure = 'tls';
            $adminMail->Port = 587;

            $adminMail->setFrom('jongeren@alhidaya.nl', 'Alhidaya');
            $adminMail->addAddress('jongeren@alhidaya.nl'); // Admin e-mailadres

            $adminMail->isHTML(true);
            $adminMail->Subject = 'Inschrijving Fiqh as-Siyam seminar';
            $adminMail->Body = "
                                <html>
                                <head>
                                    <style>
                                        body {
                                            font-family: Arial, sans-serif;
                                            margin: 0;
                                            padding: 0;
                                            background-color: #f9f9f9;
                                        }
                                        .email-wrapper {
                                            max-width: 600px;
                                            margin: 20px auto;
                                            border: 1px solid #ddd;
                                            border-radius: 10px;
                                            background-color: #ffffff;
                                            overflow: hidden;
                                        }
                                        .header {
                                            background-color: #f0e5d1; /* Beige kleur */
                                            padding: 20px;
                                            text-align: center;
                                        }
                                        .header img {
                                            max-width: 120px;
                                            margin-bottom: 10px;
                                        }
                                        .header h1 {
                                            font-size: 24px;
                                            color: #333333;
                                            margin: 0;
                                        }
                                        .body {
                                            padding: 20px;
                                            color: #333333;
                                            line-height: 1.6;
                                        }
                                        .body h2 {
                                            font-size: 18px;
                                            color: #555555;
                                            margin-bottom: 15px;
                                        }
                                        .body p {
                                            margin: 10px 0;
                                        }
                                        .details-table {
                                            width: 100%;
                                            border-collapse: collapse;
                                            margin-top: 15px;
                                        }
                                        .details-table th, .details-table td {
                                            text-align: left;
                                            padding: 8px;
                                            border: 1px solid #ddd;
                                        }
                                        .details-table th {
                                            background-color: #f7f7f7;
                                        }
                                        .footer {
                                            background-color: #f7f7f7;
                                            text-align: center;
                                            padding: 15px;
                                            font-size: 12px;
                                            color: #999999;
                                        }
                                    </style>
                                </head>
                                <body>
                                    <div class='email-wrapper'>
                                        <div class='header'>
                                            <img src='https://alhidaya.nl/public/img/alhidayaBredaKaal2.png' alt='Al-Hidaya Logo'> <!-- Vervang de URL door jullie logo -->
                                            <h1>Nieuwe inschrijving voor de seminar</h1>
                                        </div>
                                        <div class='body'>
                                            <h2>Inschrijvingsdetails:</h2>
                                            <table class='details-table'>
                                                <tr>
                                                    <th>Naam</th>
                                                    <td>{$payment->metadata->name}</td>
                                                </tr>
                                                <tr>
                                                    <th>Achternaam</th>
                                                    <td>{$payment->metadata->lastname}</td>
                                                </tr>
                                                <tr>
                                                    <th>E-mailadres</th>
                                                    <td>{$recipientEmail}</td>
                                                </tr>
                                                <tr>
                                                    <th>Geslacht</th>
                                                    <td>{$payment->metadata->gender}</td>
                                                </tr>
                                                <tr>
                                                    <th>Bericht (optioneel)</th>
                                                    <td>{$payment->metadata->description}</td>
                                                </tr>
                                                <tr>
                                                    <th>Betalings-ID</th>
                                                    <td>{$payment->id}</td>
                                                </tr>
                                                <tr>
                                                    <th>Bedrag</th>
                                                    <td>{$payment->amount->currency} {$payment->amount->value}</td>
                                                </tr>
                                            </table>
                                            <p>
                                                Controleer de bovenstaande gegevens en onderneem actie indien nodig.
                                            </p>
                                        </div>
                                        <div class='footer'>
                                            Deze e-mail is automatisch gegenereerd. Heb je vragen? Neem contact op via 
                                            <a href='mailto:info@alhidaya.nl'>info@alhidaya.nl</a>.<br><br>
                                        </div> 
                                    </div>
                                </body>
                                </html>
                                ";


            $adminMail->send();
        } catch (Exception $e) {
            error_log("E-mail verzenden mislukt: " . $mail->ErrorInfo);
        }
    }
} catch (\Mollie\Api\Exceptions\ApiException $e) {
    http_response_code(500);
    echo "Mollie API fout: " . htmlspecialchars($e->getMessage());
}

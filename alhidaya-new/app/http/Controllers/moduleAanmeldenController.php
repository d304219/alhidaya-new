<?php

// Vereiste velden
$requiredFields = ['firstname', 'email' ,'lastname', 'phone', 'gender'];

foreach ($requiredFields as $field) {
    if (!isset($_POST[$field]) || empty(trim($_POST[$field]))) {
        header("Location: https://alhidaya.nl/basiskennisislam.php?msg=Alle velden dienen te worden ingevuld.&type=error");
        exit();
    }
}

// Validatie
if (!preg_match("/^[a-zA-ZÀ-ÿ\s'-]+$/u", $_POST['firstname']) || strlen($_POST['firstname']) > 50) {
    header("Location: https://alhidaya.nl/basiskennisislam.php?msg=Voornaam mag geen cijfers bevatten en moet minder dan 50 tekens zijn.&type=error");
    exit();
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    header("Location: www.alhidaya.nl/itikaf.php?msg=Ongeldig email formaat.&type=error");
    exit();
}

if (!preg_match("/^[a-zA-ZÀ-ÿ\s'-]+$/u", $_POST['lastname']) || strlen($_POST['lastname']) > 50) {
    header("Location: .https://alhidaya.nl/basiskennisislam.php?msg=Achternaam mag geen cijfers bevatten en moet minder dan 50 tekens zijn.&type=error");
    exit();
}
if (!preg_match("/^\d{10,15}$/", $_POST['phone'])) {
    header("Location: https://alhidaya.nl/basiskennisislam.php?msg=Telefoonnummer moet tussen de 10 en 15 cijfers zijn.&type=error");
    exit();
}
$allowedGenders = ['man', 'vrouw'];
if (!in_array(strtolower($_POST['gender']), $allowedGenders)) {
    header("Location: https://alhidaya.nl/basiskennisislam.php?msg=Ongeldige keuze voor geslacht.&type=error");
    exit();
}

// Sanitize
$firstname = htmlspecialchars(trim($_POST['firstname']));
$lastname = htmlspecialchars(trim($_POST['lastname']));
$phone = htmlspecialchars(trim($_POST['phone']));
$gender = htmlspecialchars(trim($_POST['gender']));
$name = "$firstname $lastname";
$emailRecp = $_POST['email'];
// $extra = $_POST['extra'];
// <tr><th>Ik ben geintereseerde</th><td>$extra</td></tr>
// Geen e-mailadres meegegeven in formulier, dus definieer zelf:
$email = "no-reply@alhidaya.nl"; // Of haal van elders als nodig

require '../../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    // --- E-MAIL NAAR ADMIN ---
    $mail->isSMTP();
    $mail->Host = 'mail.yourhosting.nl';
    $mail->SMTPAuth = true;
    $mail->Username = 'info@alhidaya.nl';
    $mail->Password = '4816dnBreda';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;
    

    $mail->setFrom('info@alhidaya.nl', 'Al-Hidaya Breda');
    $mail->addAddress('info@alhidaya.nl');

    $mail->CharSet = 'UTF-8';
    $mail->isHTML(true);
    $mail->Subject = 'Nieuwe aanmelding: 6-weekse module – Ontdek de Islam';
    $mail->Body = "
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
            <div class='email-header'>
                <h2>Nieuwe Aanmelding – Ontdek de Islam</h2>
            </div>
            <div class='body'>
                <table class='details-table'>
                    <tr><th>Naam</th><td>$firstname $lastname</td></tr>
                    <tr><th>E-mail</th><td>$emailRecp</td></tr>
                    <tr><th>Tel</th><td>$phone</td></tr>
                    <tr><th>Geslacht</th><td>$gender</td></tr>
                    
                </table>
            </div>
            <div class='footer'>
                Deze e-mail is automatisch gegenereerd.
            </div>
        </div>
    </body>
    </html>
";
    $mail->AltBody = "Nieuwe aanmelding:\nNaam: $firstname $lastname\nTelefoon: $phone\nGeslacht: $gender";

    $mail->send();

    // --- BEVESTIGING NAAR DEELNEMER ---
    $mail->clearAddresses();
    $mail->addAddress($_POST['email']); // alleen als e-mail beschikbaar is

    $mail->Subject = 'Bevestiging van je aanmelding – Ontdek de Islam 6-weekse module';

    $mail->Body = "
                    <html>
                    <head>
                        <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
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
                                <img src='https://alhidaya.nl/public/img/alhidayaBredaKaal2.png' alt='Al Hidaya Logo'>
                                <h2>Bevestiging van je aanmelding</h2>
                            </div>
                            <div class='body'>
                                <p>Assalamu alaikum wa rahmatullahi wa barakatuh,</p>
                                <p>Beste $firstname,</p>
                                <p>Hartelijk dank voor je aanmelding voor de 6-weekse module <strong>Ontdek de Islam</strong>.</p>
                                <p>We bevestigen hierbij dat je succesvol bent geregistreerd.</p>
                                <p><strong>Data & tijd:</strong> 24 mei t/m 28 juni – elke zaterdag van 11:00 tot 14:00.</p>
                                <p><strong>Belangrijk om te weten:</strong></p>
                                <ul>
                                    <li>Deelname is gratis</li>
                                    <li>Lunch wordt verzorgd</li>
                                    <li>Zorg dat je op tijd aanwezig bent</li>
                                    <li>Neem schrijfgerei mee</li>
                                </ul>
                                <p><strong>Spreker:</strong> Achmed El Ayadi</p>
                                <p>We kijken ernaar uit om je te verwelkomen, in sha Allah.</p>
                                <br>            
                                <p>Met vriendelijke groet,</p>
                                <p><strong>Team Al Hidaya</strong></p>
                            </div>
                            <div class='footer'>
                                Deze e-mail is automatisch gegenereerd. Vragen? <a href='https://alhidaya.nl/contact.php'>Neem contact op</a>.
                            </div>
                        </div>
                    </body>
                    </html>
                    ";


    $mail->AltBody = "Assalamu alaikum wa rahmatullahi wa barakatuh,\n\nHartelijk dank voor uw aanmelding voor de 6-weekse module: Ontdek de Islam.\n\nDe lessen vinden plaats van 24 mei t/m 28 juni, elke zaterdag van 11:00 tot 14:00.\n\n- Deelname is gratis\n- Lunch wordt verzorgd\n- Zorg dat je op tijd aanwezig bent\n- Zorg dat je schrijfgerei meeneemt\n\nSpreker: Achmed El Ayadi\n\nWe kijken ernaar uit om u te verwelkomen, in sha Allah.\n\nMet vriendelijke groet,\nTeam Al-Hidaya";

    $mail->send();

    header("Location: https://alhidaya.nl/basiskennisislam.php?msg=Je aanmelding is succesvol verzonden! Check uw Spam folder als u geen email hebt ontvangen.&type=success");

} catch (Exception $e) {
    header("Location: https://alhidaya.nl/basiskennisislam.php?msg=Fout bij verzenden e-mail: " . $mail->ErrorInfo . "&type=error");
}
?>

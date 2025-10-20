<?php

require '../../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Define required fields
$requiredFields = ['name', 'email', 'phone', 'birthdate', 'days', 'task', 'agreement'];

// Check if all required fields are set and not empty
foreach ($requiredFields as $field) {
    if (!isset($_POST[$field]) || empty(trim($_POST[$field]))) {
        header("Location: ../../../Itikaf.php?msg=Alle velden dienen te worden ingevuld.&type=error");
        exit();
    }
}

// Validate email format
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    header("Location: ../../../Itikaf.php?msg=Ongeldig email formaat.&type=error");
    exit();
}

// Validate name: no numbers, max 50 characters
if (!preg_match("/^[a-zA-ZÀ-ÿ\s'-]+$/u", $_POST['name']) || strlen($_POST['name']) > 50) {
    header("Location: ../../../Itikaf.php?msg=Naam mag geen cijfers bevatten en moet minder dan 50 tekens zijn.&type=error");
    exit();
}

// Validate phone number: only numbers, between 10-15 digits
if (!preg_match("/^\d{10,15}$/", $_POST['phone'])) {
    header("Location: ../../../Itikaf.php?msg=Telefoonnummer moet tussen de 10 en 15 cijfers zijn.&type=error");
    exit();
}

// Validate birthdate: cannot be in the future
$currentYear = date("Y");
$birthYear = (int)date("Y", strtotime($_POST['birthdate']));
if ($birthYear > $currentYear) {
    header("Location: www.alhidaya.nl/Itikaf.php?msg=Geboorte datum kan niet in de toekomst liggen.&type=error");
    exit();
}


// Sanitize and assign variables
$name = htmlspecialchars(trim($_POST['name']));
$email = htmlspecialchars(trim($_POST['email']));
$phone = htmlspecialchars(trim($_POST['phone']));
$birthdate = htmlspecialchars(trim($_POST['birthdate']));
$days = htmlspecialchars(trim($_POST['days']));
$task = htmlspecialchars(trim($_POST['task']));
$medical_conditions = isset($_POST['medical_conditions']) ? nl2br(htmlspecialchars(trim($_POST['medical_conditions']))) : 'Geen medische aandoeningen.';
$dagen = explode(',', $days); // Aantal dagen die de gebruiker heeft gekozen (bijvoorbeeld "1,2,3,...")
$datumMap = [
    '1' => '20-03-2025',
    '2' => '21-03-2025',
    '3' => '22-03-2025',
    '4' => '23-03-2025',
    '5' => '24-03-2025',
    '6' => '25-03-2025',
    '7' => '26-03-2025',
    '8' => '27-03-2025',
    '9' => '28-03-2025',
    '10' => '29-03-2025'
];

// Gebruik de dagen om de datums te genereren
$gekozenDatums = [];
foreach ($dagen as $dag) {
    if (isset($datumMap[$dag])) {
        $gekozenDatums[] = $datumMap[$dag];
    }
}
$gekozenDatumsStr = implode(', ', $gekozenDatums); // De datums in een string

// Send email to admin



try {
    $test = "hackerkiller076@gmail.com";
    

    // --- SEND CONFIRMATION EMAIL TO USER ---
    $userMail = new PHPMailer(true);
    $userMail->isSMTP();
    $userMail->Host = 'mail.yourhosting.nl'; // Update with your SMTP host
    $userMail->SMTPAuth = true;
    $userMail->Username = 'jongeren@alhidaya.nl'; // Sender's email address
    $userMail->Password = 'Shabaab2022'; // Sender's app password
    $userMail->SMTPSecure = 'tls';
    $userMail->Port = 587;
    $userMail->CharSet = 'UTF-8';

    // Recipients
    $userMail->setFrom('jongeren@alhidaya.nl', 'Al-Hidaya');
    $userMail->addAddress($email, $name);

    // Content for user email
    $userMail->isHTML(true);

    $userMail->Subject = 'Bevestiging van jouw deelname aan I’tikaaf 2025';
    $userMail->Body = "
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
                    <img src='https://alhidaya.nl/public/img/alhidayaBredaKaal2.png' alt='Al-Hidaya Logo'>
                    <h1>Bevestiging van jouw deelname aan I’tikaaf 2025</h1>
                </div>
                <div class='body'>
                    <p>Beste broeder,</p>
                    <p>Jazakallahu khayran voor jouw aanmelding voor I’tikaaf in de laatste tien nachten van Ramadan. We zijn verheugd om je te mogen ontvangen en samen deze gezegende dagen door te brengen in aanbidding en toewijding.</p>
                    <p>Mocht je nog informatie of tips nodig hebben stuur dan gerust een whatsapp bericht naar  +31 6 38 01 74 08</p>
                    <p>- Team Al-Hidaya</p>
                </div>
                <div class='footer'>
                    Deze e-mail is automatisch gegenereerd. Vragen? <a href='https://alhidaya.nl/contact.php'>Neem contact op</a>.
                </div>
            </div>
        </body>
        </html>
    ";
    $userMail->AltBody = "Beste broeder,\n\nJazakallahu khayran voor jouw aanmelding voor I’tikaaf in de laatste tien nachten van Ramadan. We zijn verheugd om je te mogen ontvangen en samen deze gezegende dagen door te brengen in aanbidding en toewijding.\n\nMocht je nog informatie of tips nodig hebben stuur dan gerust een whatsapp bericht naar  +31 6 38 01 74 08\n\n- Team Al-Hidaya";

    // Send user email
    $userMail->send();

    // --- SEND EMAIL TO ADMIN ---
    $adminMail = new PHPMailer(true);
    
    $adminMail->isSMTP();
    $adminMail->Host = 'mail.yourhosting.nl'; // Update with your SMTP host
    $adminMail->SMTPAuth = true;
    $adminMail->Username = 'jongeren@alhidaya.nl'; // Sender's email address
    $adminMail->Password = 'Shabaab2022'; // Sender's app password
    $adminMail->SMTPSecure = 'tls';
    $adminMail->Port = 587;
    $adminMail->CharSet = 'UTF-8';

    // Recipients
    $adminMail->setFrom('jongeren@alhidaya.nl', 'Al-Hidaya');
    $adminMail->addAddress("info@alhidaya.nl", "admin"); // Recipient's email address

    // Content for admin email
    $adminMail->isHTML(true);

    $adminMail->Subject = 'Nieuwe Inschrijving I’tikaf';
    $adminMail->Body = "
        <html>
        <head>
            <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
            <style>
                    body { font-family: Arial, sans-serif; background-color: #f9f9f9; margin: 0; padding: 0; }
                    .email-wrapper { max-width: 600px; margin: 20px auto; border: 1px solid #ddd; border-radius: 10px; background-color: #ffffff; padding: 20px; }
                    .header { background-color: #f0e5d1; padding: 20px; text-align: center; }
                    .header h1 { font-size: 20px; color: #333; }
                    .header img { max-width: 148px; margin-bottom: 10px; }
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
                    <img src='https://alhidaya.nl/public/img/alhidayaBredaKaal2.png' alt='Al-Hidaya Logo'>
                    <h1>Nieuwe Inschrijving I’tikaf</h1>
                </div>
                <div class='body'>
                    <h2>Inschrijvingsdetails:</h2>
                    <table class='details-table'>
                        <tr><th>Naam</th><td>$name</td></tr>
                        <tr><th>E-mailadres</th><td>$email</td></tr>
                        <tr><th>Telefoonnummer</th><td>$phone</td></tr>
                        <tr><th>Geboorte datum</th><td>$birthdate</td></tr>
                        <tr><th>Aantal dagen deelname</th><td>$gekozenDatumsStr</td></tr> <!-- Hier worden de datums weergegeven -->
                        <tr><th>Vrijwilligerstaak</th><td>$task</td></tr>
                        <tr><th>Medische aandoeningen</th><td>$medical_conditions</td></tr>
                    </table>
                </div>
                <div class='footer'>
                    Deze e-mail is automatisch gegenereerd.
                </div>
            </div>
        </body>
        </html>
    ";
    $adminMail->AltBody = "Nieuwe Inschrijving I’tikaf:\n\nNaam: $name\nE-mailadres: $email\nTelefoonnummer: $phone\nGeboorte datum: $birthdate\nAantal dagen deelname: $days\nVrijwilligerstaak: $task\nMedische aandoeningen: $medical_conditions";

    // Send admin email
    $adminMail->send();

    header("Location: https://alhidaya.nl/aanmelding-succes.php");

} catch (Exception $e) {
    header("Location: www.alhidaya.nl/Itikaf.php?msg=Er is een fout opgetreden bij het verzenden van de e-mails. Mailer Error: " . $adminMail->ErrorInfo . "&type=error");
}
?>
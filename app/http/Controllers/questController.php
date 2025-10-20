<?php
require '../../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Iban\Validation\Validator;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are set
    $requiredFields = ['KeuzeIncasso', 'firstname', 'lastname', 'street', 'postcode', 'place', 'country', 'phone', 'email', 'ibanname', 'permission'];
        // Do something with the selected country, e.g., save it to a database
        // You may also want to validate and sanitize the data before using it
    // check if iban or bic is filled
    if(!isset($_POST['ibancode']) &&  !isset($_POST['BIC']))
    {
        echo '<script>alert("Error: Iban of BIC moet gevuld zijn."); window.history.back();</script>';
        exit();
    }
    foreach ($requiredFields as $field) {
        if (!isset($_POST[$field]) || empty(trim($_POST[$field]))) {
            echo '<script>alert("Error: All fields are required. (' . $field . ' is empty)"); window.history.back();</script>';
            exit();
        }
    }
    
    //$ibanValidator = new Validator();
    //if (!$ibanValidator->validate($_POST['ibancode'])) {
    //    echo '<script>alert("Error: Invalid IBAN."); window.history.back();</script>';
    //    exit();
    //}
    // Validate Dutch IBAN
    $dutchIbanRegex = '/^NL\d{2}[A-Z]{4}\d{10}$/';
    if (!preg_match($dutchIbanRegex, $_POST['ibancode'])) {
        echo '<script>alert("Error: Invalid Dutch IBAN format."); window.history.back();</script>';
        exit();
    }

    // Validate Dutch postcode
    $dutchPostcodeRegex = '/^\d{4}\s?[A-Z]{2}$/';
    if (!preg_match($dutchPostcodeRegex, $_POST['postcode'])) {
        echo '<script>alert("Error: Invalid postcode"); window.history.back();</script>';
        exit();
    }

    // Validate first name and last name (should not contain numbers)
    $nameRegex = '/^[^\d]+$/';
    if (!preg_match($nameRegex, $_POST['firstname']) || !preg_match($nameRegex, $_POST['lastname'])) {
        echo '<script>alert("Error: First name and last name should not contain numbers."); window.history.back();</script>';
        exit();
    }

    // Validate email format
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        echo '<script>alert("Error: Invalid email format."); window.history.back();</script>';
        exit();
    }

    // If IBAN is valid, check if BIC is provided (optional)
    if (preg_match($dutchIbanRegex, $_POST['ibancode'])) {
        // Check if 'bic' key exists in $_POST
        if (isset($_POST['bic']) && !empty(trim($_POST['bic']))) {
            // Validate BIC format if provided
            $bicRegex = '/^[A-Z]{6}[A-Z0-9]{2}$/';
            if (!preg_match($bicRegex, $_POST['bic'])) {
                echo '<script>alert("Error: Invalid BIC format."); window.history.back();</script>';
                exit();
            }
        }
    }

    // Additional server-side validations can be added here

    // If all validations pass, you can proceed with processing the form data
    // ...
    $mail = new PHPMailer(true);

    try {
         // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; // Replace with your SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'hidayatestbreda@gmail.com'; // gmail
        $mail->Password   = 'bqja kgbv oehx hvwk'; // app password
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom('hidayatestbreda@gmail.com', 'Al-Hidaya - Incasso Donatie'); // Replace with your name
        $mail->addAddress('info@alhidaya.nl'); // Replace with the recipient's email address

        // Content

        // Build the email body with form data
        $emailBody = '<h2>Donation Information</h2>';
        $emailBody .= '<p><strong>Incasso keuze:</strong> ' . htmlspecialchars($_POST['KeuzeIncasso']) . '</p>';
        $emailBody .= '<p><strong>Naam:</strong> ' . htmlspecialchars($_POST['firstname'] . ' ' . $_POST['lastname']) . '</p>';
        $emailBody .= '<p><strong>Addres:</strong> ' . htmlspecialchars($_POST['street'] . ', ' . $_POST['postcode'] . ' ' . $_POST['place'] . ', ' . $_POST['country']) . '</p>';
        $emailBody .= '<p><strong>Telefoon nummer:</strong> ' . htmlspecialchars($_POST['phone']) . '</p>';
        $emailBody .= '<p><strong>Email:</strong> ' . htmlspecialchars($_POST['email']) . '</p>';
        $emailBody .= '<p><strong>IBAN:</strong> ' . (isset($_POST['ibancode']) ? htmlspecialchars($_POST['ibancode']) : 'Not provided') . '</p>';
        $emailBody .= '<p><strong>Rekeninghouder naam:</strong> ' . htmlspecialchars($_POST['ibanname']) . '</p>';
        $emailBody .= '<p><strong>BIC:</strong> ' . (isset($_POST['bic']) ? htmlspecialchars($_POST['bic']) : 'Not provided') . '</p>';
        $emailBody .= '<p><strong>Permission:</strong> ' . htmlspecialchars($_POST['permission']) . '</p>';

        $mail->isHTML(true);
        $mail->Subject = 'Donatie Incasso';
        $mail->Body    = $emailBody;

        $mail->send();
    } catch (Exception $e) {
        echo '<script>alert("Error in sending process. ' . $mail->ErrorInfo . '"); window.history.back();</script>';
    }
    try {
        // ... (your existing code)
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; // Replace with your SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'hidayatestbreda@gmail.com'; // gmail
        $mail->Password   = 'bqja kgbv oehx hvwk'; // app password
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Recipients
        
        // Send confirmation email to the user
        $userEmail = $_POST['email'];
        $userSubject = 'Bevestiging - Donatie Incasso';

        // Hier kun je de bevestigingstekst aanpassen en een logo toevoegen
        $userBody = '<p>Hartelijk dank voor uw donatie! We hebben uw informatie ontvangen.</p>';
        $userBody .= '<p>Met vriendelijke groet,<br>Team Al Hidaya<br></p>';
        $userBody .= '<img src="https://alhidaya.nl/public/img/alhidayaBredaKaal2.png" alt="Al Hidaya Logo">';

        $mail->setFrom('hidayatestbreda@gmail.com', 'Al-Hidaya - Incasso Donatie'); // Replace with your name
        $mail->addAddress($userEmail);
        $mail->Subject = $userSubject;
        $mail->Body = $userBody;

        $mail->send();
        echo '<script>alert("Inschrijving is succesvol. U ontvangt een bevestigingsmail."); window.location.href = "../../../index.php";</script>';
        exit();
    } catch (Exception $e) {
        // Improve error handling to provide more informative messages
        echo '<script>alert("Error in het versturen van uw informatie. Contacteer info@alhidaya.nl voor hulp met de error code. ' . $mail->ErrorInfo . '"); window.history.back();</script>';
        exit();
    }

    
} else {
    // Handle cases where the form is not submitted via POST method
    echo '<script>alert("Error: Form submission method not allowed."); window.history.back();</script>';
    exit();
}
?>

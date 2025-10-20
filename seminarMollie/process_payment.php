<?php
require '../vendor/autoload.php';  // Include Mollie PHP SDK

// Define required fields
$requiredFields = ['name', 'lastname', 'gender', 'email'];

// Check if all required fields are set and not empty
foreach ($requiredFields as $field) {
    if (!isset($_POST[$field]) || empty(trim($_POST[$field]))) {
        header("Location: ../seminar.php?msg=Alle verplichte velden moeten worden ingevuld.&type=error");
        exit();
    }
}

// Validate name: no numbers, max 50 characters
if (!preg_match("/^[a-zA-ZÀ-ÿ\s'-]+$/u", $_POST['name']) || strlen($_POST['name']) > 50) {
    header("Location: ../seminar.php?msg=Naam mag geen cijfers bevatten en moet minder dan 50 tekens zijn.&type=error");
    exit();
}

// Validate lastname: no numbers, max 50 characters
if (!preg_match("/^[a-zA-ZÀ-ÿ\s'-]+$/u", $_POST['lastname']) || strlen($_POST['lastname']) > 50) {
    header("Location: ../seminar.php?msg=Achternaam mag geen cijfers bevatten en moet minder dan 50 tekens zijn.&type=error");
    exit();
}

// Validate gender: must not be empty
if (empty($_POST['gender']) || !in_array($_POST['gender'], ['Man', 'Vrouw'])) {
    header("Location: ../seminar.php?msg=Geslacht moet worden geselecteerd.&type=error");
    exit();
}

// Validate email format
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    header("Location: ../seminar.php?msg=Ongeldig email formaat.&type=error");
    exit();
}

// Optional description: no validation needed
$description = isset($_POST['description']) ? nl2br(htmlspecialchars(trim($_POST['description']))) : 'Geen extra bericht.';

// Sanitize and assign variables
$name = htmlspecialchars(trim($_POST['name']));
$lastname = htmlspecialchars(trim($_POST['lastname']));
$gender = htmlspecialchars(trim($_POST['gender']));
$email = htmlspecialchars(trim($_POST['email']));

// Replace with your own Mollie API key
$mollie = new \Mollie\Api\MollieApiClient();
$mollie->setApiKey("live_j8z3UD2w7hhqGbVCMxngznTPUW6Eap");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Create the payment with Mollie
        $payment = $mollie->payments->create([
            "amount" => [
                "currency" => "EUR",
                "value" => "5.00"  // Must be a string for precise values
            ],
            "description" => "Betaling Fiqh as-Siyam Seminar  van " . $name . $lastname,
            "redirectUrl" => "https://alhidaya.nl/payment_succes.php",
            "webhookUrl" => "https://alhidaya.nl/seminarMollie/payment-webhook.php",  // Add your webhook URL here
            "metadata" => [
                "name" => $name,
                "lastname" => $lastname,
                "gender" => $gender,
                "email" => $email,
                "description" => $description
            ]
        ]);

        // Redirect the user to Mollie to complete the payment
        header("Location: " . $payment->getCheckoutUrl(), true, 303);
    } catch (\Mollie\Api\Exceptions\ApiException $e) {
        echo "API call failed: " . htmlspecialchars($e->getMessage());
    }
}

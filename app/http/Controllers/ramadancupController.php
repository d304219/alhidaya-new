<?php
require '../../../vendor/autoload.php'; // Zorg ervoor dat de Mollie API-client is geïnstalleerd via Composer

use Mollie\Api\MollieApiClient;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $teamName = htmlspecialchars($_POST['teamName']);
    $email = htmlspecialchars($_POST['email']);
    $number = htmlspecialchars($_POST['phone']);
    // Valideer de invoer
    if (empty($teamName) || empty($email)) {
        header('Location: https://alhidaya.nl/ramadancup.php?msg=Vul alle velden correct in&type=error');
        exit;
    }
        // Validate email format
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        header("Location: https://alhidaya.nl/ramadancup.php?msg==Ongeldig email formaat.&type=error");
        exit();
    }

    $mollie = new MollieApiClient();
    $mollie->setApiKey('live_j8z3UD2w7hhqGbVCMxngznTPUW6Eap'); 

    try {
        $payment = $mollie->payments->create([
            "amount" => [
                "currency" => "EUR",
                "value" => "50.00" // Formatteer het bedrag naar 2 decimalen
            ],
            "description" => "Inschrijving Ramadan Cup 2025 door $teamName | $email",
            "webhookUrl" => "https://alhidaya.nl/app/http/Controllers/Webhooks/ramadancupWebhook.php",
            "redirectUrl" => "https://alhidaya.nl/payment_succes.php", // Bedankpagina
            "metadata" => [
                "teamName" => $teamName,
                "email" => $email,
                "number" => $number
            ]
        ]);

        // Stuur de gebruiker door naar de Mollie betalingspagina
        header("Location: " . $payment->getCheckoutUrl());
        exit;
    } catch (Exception $e) {
        header('Location: https://alhidaya.nl/ramadancup.php?msg=Er is een fout opgetreden bij het verwerken van de betaling&type=error');
        exit;
    }
}
<?php
require '../../../vendor/autoload.php'; // Zorg ervoor dat de Mollie API-client is geïnstalleerd via Composer

use Mollie\Api\MollieApiClient;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $amount = floatval($_POST['amount']);

    // Valideer de invoer
    if (empty($name) || empty($email) || $amount < 1) {
        header('Location: www.alhidaya.nl/iftarbekostigen.php?msg=Vul alle velden correct in (minimaal €1)&type=error');
        exit;
    }

    // Maak een Mollie betaling aan
    $mollie = new MollieApiClient();
    $mollie->setApiKey('live_j8z3UD2w7hhqGbVCMxngznTPUW6Eap'); // Vervang door je Mollie API-sleutel

    try {
        $payment = $mollie->payments->create([
            "amount" => [
                "currency" => "EUR",
                "value" => number_format($amount, 2, '.', '') // Formatteer het bedrag naar 2 decimalen
            ],
            "description" => "Iftar bijdrage door $name | $email",
            "redirectUrl" => "https://alhidaya.nl/payment_succes.php", // Bedankpagina
            "metadata" => [
                "name" => $name,
                "email" => $email
            ]
        ]);

        // Stuur de gebruiker door naar de Mollie betalingspagina
        header("Location: " . $payment->getCheckoutUrl());
        exit;
    } catch (Exception $e) {
        header('Location: www.alhidaya.nl/iftarbekostigen.php?msg=Er is een fout opgetreden bij het verwerken van de betaling&type=error');
        exit;
    }
}
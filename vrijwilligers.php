<!DOCTYPE html>
<html lang="nl">
<?php require 'resources/views/components/head.php'; ?>
<link rel="stylesheet" href="public/css/donation.css">
<link rel="stylesheet" href="public/css/contact.css">

<body>
    <?php require 'resources/views/components/nav.php'; ?>

    <section class="heading">
        <div class="wrapper">
            <div class="headingText">
                <h2>Inschrijfformulier Vrijwilligers</h2>
            </div>
        </div>
    </section>
    <style>
        .center-box {
            max-width: 100%;
            margin: 20px auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }

        .center-box h4 {
            font-size: 1.5em;
            color: #2c3e50;
            margin-bottom: 10px;
        }

        .center-box p {
            color: #555;
            margin: 10px 0;
        }

        .talent-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
        }

        .talent-item {
            flex: 1 1 calc(33.333% - 30px); /* Three columns */
            max-width: calc(33.333% - 30px);
            padding: 15px;
            background-color: #ffffff;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease;
            font-size: 0.9rem;
            color: #34495e;
            font-weight: bold;
        }

        .talent-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        @media (max-width: 768px) {
            .talent-item {
                flex: 1 1 calc(50% - 20px); /* Two columns for smaller screens */
                max-width: calc(50% - 20px);
            }
            .btn{
                width: 120% !important;
            }
        }

        @media (max-width: 480px) {
            .talent-item {
                flex: 1 1 100%; /* Full width for mobile */
                max-width: 100%;
            }
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        select {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #2c3e50;
            color: black;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            text-align: center;
        }

        .btn:hover {
            background-color: #34495e;
        }
        .message-box {
    margin: 20px auto;
    padding: 15px;
    border-radius: 5px;
    font-weight: bold;
    text-align: center;
    max-width: 80%; /* Responsive */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

/* Success message styling */
.success-message {
    background-color: #d4edda; /* Light green background */
    color: #155724; /* Dark green text */
    border: 1px solid #c3e6cb; /* Light green border */
    font-size: 1rem;
}

/* Error message styling */
.error-message {
    background-color: #f8d7da; /* Light red background */
    color: #721c24; /* Dark red text */
    border: 1px solid #f5c6cb; /* Light red border */
    font-size: 1rem;
}

/* Adjustments for smaller screens */
@media (max-width: 768px) {
    .message-box {
        font-size: 0.9rem; /* Slightly smaller text */
        max-width: 90%; /* Adjust width for smaller screens */
    }
}

    </style>

    <div class="wrapper">
        <?php
        if (isset($_GET['msg']) && isset($_GET['type'])) {
            $msg = htmlspecialchars($_GET['msg']);
            $type = htmlspecialchars($_GET['type']);
            if ($type == 'success') {
                echo '<div class="message-box success-message">' . $msg . '</div>';
            } elseif ($type == 'error') {
                echo '<div class="message-box error-message">' . $msg . '</div>';
            }
        }
        ?>
        <div class="center-box">
            <h4><strong>"Wees een bouwer van de gemeenschap!"</strong></h4>
            <p>Al-Hidaya staat centraal in onze gemeenschap. Zet jouw talenten in voor het huis van Allah en draag bij aan een betere toekomst voor onze broeders en zusters. Word vrijwilliger bij Stichting Al Hidaya en maak een verschil!</p>
            <blockquote>
                <p>De Profeet Mohammed (vrede zij met hem) zei: "De beste mensen zijn degenen die het meest nuttig zijn voor anderen."</p>
                <p>قال رسول الله صلى الله عليه وسلم: أحبّ الناس إلى الله أنفعهم للناس</p>
            </blockquote>

            <h3>Waar passen je talenten bij?</h3>
            <p>Wij zoeken vrijwilligers met talenten in de volgende gebieden:</p>
            <div class="talent-grid">
                <div class="talent-item">Organiseren en plannen</div>
                <div class="talent-item">Medewerker onderwijs</div>
                <div class="talent-item">Communicatie en media</div>
                <div class="talent-item">Technisch onderhoud</div>
                <div class="talent-item">Keuken en catering</div>
                <div class="talent-item">Schoonmaak en opruimwerkzaamheden</div>
                <div class="talent-item">Gastvrijheid en toezicht</div>
            </div>
        </div>

        <form method="POST" name="volunteerForm" class="contactForm" action="app/http/Controllers/volunteerController.php">
            <h3>Persoonlijke Gegevens</h3>
            <div class="form-group">
                <label for="name">Naam <span class="must">*</span></label>
                <input type="text" name="name" id="name" placeholder="Voor- en achternaam" required>
            </div>

            <div class="form-group">
                <label for="email">E-mailadres <span class="must">*</span></label>
                <input type="email" name="email" id="email" placeholder="E-mailadres" required>
            </div>

            <div class="form-group">
                <label for="phone">Telefoonnummer <span class="must">*</span></label>
                <input type="text" name="phone" id="phone" placeholder="Telefoonnummer" required>
            </div>

            <div class="form-group">
                <label for="birthdate">Geboorte datum <span class="must">*</span></label>
                <input type="date" name="birthdate" id="birthdate" required>
            </div>

            <div class="form-group">
                <label for="preferences">Kies een specifieke voorkeur: <span class="must">*</span></label>
                <select name="preferences" id="preferences" required>
                    <option value disabled selected>Kies een voorkeur</option>
                    <option value="Toezicht en parkeren">Toezicht en parkeren</option>
                    <option value="Medewerker onderwijs">Medewerker onderwijs</option>
                    <option value="Medewerker Maktaba (bibliotheek)">Medewerker Maktaba (bibliotheek)</option>
                    <option value="Keukenmedewerker">Keukenmedewerker</option>
                    <option value="Medewerker schoonmaak">Medewerker schoonmaak</option>
                    <option value="Medewerker media">Medewerker media</option>
                    <option value="Activiteiten voor jongeren">Activiteiten voor jongeren</option>
                    <option value="Onderhoudswerk">Onderhoudswerk</option>
                    <option value="Geen">Geen</option>
                </select>
            </div>

            <div class="form-group">
                <label for="message">Bericht</label>
                <textarea name="message" id="message" cols="30" rows="5" placeholder="Heb je nog aanvullende informatie?"></textarea>
            </div>
            <p>Onze coördinator neemt binnenkort contact met je op voor een kennismakingsgesprek. Samen bouwen we aan een sterke gemeenschap, insha’Allah.</p>
            <p><strong>Meer informatie?</strong> Stuur een e-mail naar: <a href="mailto:info@alhidaya.nl">info@alhidaya.nl</a></p><br>
            <div class="btn-containers" style="display: flex; justify-content: center;">
                <input style="width: 50%;" type="submit" value="Verstuur Inschrijving" class="btn">
            </div>
        </form>
    </div>

    <?php require "resources/views/components/footer.php" ?>
</body>
</html>

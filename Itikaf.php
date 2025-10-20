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
                <h2>Inschrijfformulier Iʿtikaaf</h2>
            </div>
        </div>
    </section>

    <div class="wrapper">
        <!-- Eventuele succes- of foutmelding -->
        <?php if (isset($_GET['msg']) && isset($_GET['type'])): ?>
                <div class="message-box <?= htmlspecialchars($_GET['type']) == 'success' ? 'success-message' : 'error-message' ?>">
                    <?= htmlspecialchars($_GET['msg']) ?>
                </div>
            <?php endif; ?>

        <!-- Inschrijfformulier -->
        <form method="POST" name="itikafForm" class="contactForm" action="app/http/Controllers/itikafController.php">
			<h3>Persoonlijke gegevens <span class="must attention"> (alleen voor mannen)</span></h3>
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

            <!-- Nieuw veld voor het aantal dagen deelname -->
            <div class="form-group">
                <label>Hoeveel dagen neem je deel aan de I'tikaaf? <span class="must">*</span></label>
                <div class="days-selection">
                    <span class="day-block" data-day="1">20-03 - Dag 1</span>
                    <span class="day-block" data-day="2">21-03 - Dag 2</span>
                    <span class="day-block" data-day="3">22-03 - Dag 3</span>
                    <span class="day-block" data-day="4">23-03 - Dag 4</span>
                    <span class="day-block" data-day="5">24-03 - Dag 5</span>
                    <span class="day-block" data-day="6">25-03 - Dag 6</span>
                    <span class="day-block" data-day="7">26-03 - Dag 7</span>
                    <span class="day-block" data-day="8">27-03 - Dag 8</span>
                    <span class="day-block" data-day="9">28-03 - Dag 9</span>
                    <span class="day-block" data-day="10">29-03 - Dag 10</span>
                </div>
                <input type="hidden" name="days" id="selected-days" required>
            </div>


            <!-- Keuze voor Vrijwilligerstaak -->
			<div class="form-group">
				<label for="task">Kies een vrijwilligerstaak <span class="must">*</span></label>
				<select name="task" id="task" required>
					<option value="" disabled selected>Selecteer een taak...</option>
					<option value="suhoor">Suhoor</option>
					<option value="schoonmaak">Schoonmaak</option>
				</select>
			</div>

            <div class="form-group">
                <label for="message">Medische aandoeningen (indien van toepassing)</label>
                <textarea name="medical_conditions" id="medical_conditions" cols="30" rows="5" placeholder="Heb je medische aandoeningen?"></textarea>
            </div>
			

			<!-- Checkbox met de tekst -->
			<div class="form-group">
				<label class="checkbox-label">
					<input type="checkbox" class="agree" name="agreement" id="agreement" required>
					<span class="agreeText">
						Ik ben me ervan bewust dat ik bij aanvang van mijn eerste I’tikaaf-dag een kopie van mijn identiteitsbewijs zal overhandigen en de huisregels zal ondertekenen.
					</span><span class="must">*</span>
				</label>
			</div>

            <div class="btn-containers" style="display: flex; justify-content: center;">
                <input style="width: 50%;" type="submit" value="Verstuur Inschrijving" class="btn">
            </div>
        </form>
    </div>
    <script>
    // Alle geselecteerde dagen
    const dayBlocks = document.querySelectorAll('.day-block');
    const selectedDaysInput = document.getElementById('selected-days');

    // Voeg een klik functie toe aan elk blok
    dayBlocks.forEach(day => {
        day.addEventListener('click', () => {
            // Toggle de geselecteerde klasse (voor visuele feedback)
            day.classList.toggle('selected');

            // Verkrijg alle geselecteerde dagen
            const selectedDays = [...document.querySelectorAll('.day-block.selected')].map(day => day.dataset.day);
            
            // Vul de verborgen input in met de geselecteerde dagen
            selectedDaysInput.value = selectedDays.join(',');

            // Zorg ervoor dat minimaal 1 dag is geselecteerd voordat het formulier wordt verstuurd
            if (selectedDays.length === 0) {
                selectedDaysInput.setCustomValidity('Je moet minimaal 1 dag selecteren.');
            } else {
                selectedDaysInput.setCustomValidity('');
            }
        });
    });
</script>


    <?php require "resources/views/components/footer.php" ?>
    <style>
	.attention{
		font-weight: bold;
	}
    /* Voor grotere schermen */
    @media (min-width: 768px) {
        .day-block {
            width: auto; /* Laat de blokken hun normale breedte krijgen */
            font-size: 1.2rem;
        }
    }

    /* Voor kleinere schermen (mobiel) */
    @media (max-width: 768px) {
        .days-selection {
            justify-content: center;  /* Zorgt ervoor dat de blokken gecentreerd worden op kleine schermen */
        }

        .day-block {
            width: 45%; /* Zorgt ervoor dat de blokken op mobiel goed passen */
            font-size: 1.1rem;
            text-align: center;  /* Centreert de tekst binnen het blok */
            padding: 8px 12px;
        }

        /* Zorg ervoor dat de input hidden goed werkt voor mobiel */
        .days-selection span {
            margin-bottom: 10px; /* Voegt wat ruimte toe tussen de blokken */
        }
    }
</style>

    <style>
        /* Responsive header text */
        /* Responsive header text */
        .headingText h2 {
            text-align: center;
            font-size: 2rem;
        }
        .rules .wrapper .headingText h2 {
            color: black !important;
        }

        @media (max-width: 768px) {
            .headingText h2 {
                font-size: 1.8rem !important;
            }
            .btn{
                width: 100% !important;
            }
            .agree {
                width: 15px !important;
            }
        }
        .days-selection {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-top: 10px;
}

.day-block {
    display: inline-block;
    background-color: #f0e5d1;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1rem;
    text-align: center;
    transition: background-color 0.3s;
}

.day-block:hover {
    background-color: #3498db;
    color: white;
}

.day-block.selected {
    background-color: #2980b9;
    color: white;
}

input#selected-days {
    display: none; /* Dit veld zal de geselecteerde dagen bevatten */
}


        /* Form styling */
        .contactForm .form-group {
            margin-bottom: 15px;
        }
        @media (min-width: 768px) {
            .agree {
                width: 3% !important;
                display: flex;
                align-items: center;
            }
        }
        .agree {
            display: flex;
            align-items: center;
        }
        .agreeText {
            margin-left: 10px;
        }

        .contactForm .form-group input, .contactForm .form-group textarea {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .checkbox-label {
            display: flex;
            flex-direction: row;
            align-items: center;
        }

        .checkbox-label a {
            color: #2980b9;
            text-decoration: none;
        }

        .checkbox-label a:hover {
            text-decoration: underline;
        }

        .rules {
            background-color: #f2e1c1;
        }

        .toggle-rules-btn {
            background-color: #2980b9;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            margin-bottom: 20px;
        }

        .toggle-rules-btn:hover {
            background-color: #3498db;
        }

        .rules-text {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .rule-card {
            background-color: #f9f9f9;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            break-inside: avoid; /* Voorkomt dat cards worden gesplitst over meerdere kolommen */
        }

        .rule-card h3 {
            color: #2c3e50;
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .rule-card p {
            color: #7f8c8d;
            font-size: 1rem;
        }

        .final-note {
            font-size: 1rem;
            color: #2c3e50;
            margin-top: 20px;
            text-align: center;
        }

        .heading {
            padding: 27px 0;
            text-align: center;
            margin-bottom: 35px;
        }

        .headingText h2 {
            font-size: 3rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            color: white;
        }

        @media (max-width: 768px) {
            .rules-text {
                grid-template-columns: 1fr; /* Op kleinere schermen staan de cards onder elkaar */
            }
        }
		/* Success and Error Message Styling */
.message-box {
    padding: 15px;
    margin: 15px 0;
    border-radius: 5px;
    font-size: 1rem;
    text-align: center;
    transition: opacity 0.3s ease;
}

.success-message {
    background-color: #28a745; /* Green for success */
    color: white;
    border: 1px solid #218838; /* Darker green border */
}

.error-message {
    background-color: #dc3545; /* Red for error */
    color: white;
    border: 1px solid #c82333; /* Darker red border */
}

/* Add a fade-in effect for messages */
.message-box {
    opacity: 0;
    animation: fadeIn 1s forwards;
}

@keyframes fadeIn {
    to {
        opacity: 1;
    }
}

/* Responsive Message Styles */
@media (max-width: 768px) {
    .message-box {
        font-size: 0.9rem;
        padding: 12px;
    }
}

    </style>
</body>
</html>
<!DOCTYPE html>
<html lang="nl">
<?php require 'resources/views/components/head.php'; ?>
<link rel="stylesheet" href="public/css/deislam.css">
<link rel="stylesheet" href="public/css/style.css">
<link rel="stylesheet" href="public/css/donation.css">
<link rel="stylesheet" href="public/css/iftar.css">
<style>
    body {
        background-color: #f5ebe0;
    }
    .iftarGroup {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 20px;
    }

    .iftarInfo p {
        margin-bottom: 1.5rem !important; /* Minder ruimte tussen paragrafen */
        margin-top: 1rem;
    }

    /* Zachte scheiding tussen Iftar-info en het formulier */
    .iftar {
        padding-bottom: 50px;
        border-bottom: 2px solid rgba(0, 0, 0, 0.1);
    }

    .payment-form {
        background-color: #f2e1c1;
        border-radius: 10px;
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
    }
    .form-group {
        margin-bottom: 15px;
        text-align: left;
    }
    .form-group label {
        font-weight: bold;
    }
    .form-group input {
        width: 100%;
        padding: 10px;
        border: 1px solid #c9a66b;
        border-radius: 5px;
        background-color: #fff6e0;
    }
    .btn-submit {
        background-color: #b08968;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    .btn-submit:hover {
        background-color: #8d6a50;
    }

    form{
        margin: 0 0 3rem 0;
    }
    /* Media query for screens smaller than 1150px */
    @media (max-width: 1150px) {
        .iftarImgMobile {
            display: flex !important;
            width: auto !important;
            margin: 50px 0px;
            justify-content: center;
            align-items: center;   
        } 
        .iftarImgMobile img {
            width: 74%;
            height: auto;
            border-radius: 10px;
            object-fit: cover; /* Zorgt ervoor dat de afbeelding dezelfde hoogte heeft */
        }
        .iftarImg {
            display: none !important;
        }
    }
    @media (max-width: 413px) {
        .iftarImgMobile img {
            width: 97% !important;
        }
    }

    .iftarImgMobile {
        display: none;
    }
    .paymentHeader{
        margin-top: 35px;
        text-align: center;
    }
    p.hadith {
    font-style: italic;
    color: #555;  /* Donkergrijs voor subtiele uitstraling */
    background-color: #f4f4f4;  /* Lichte achtergrond om het te onderscheiden */
    padding: 10px;
    margin: 15px 0;
    border-left: 5px solid #4CAF50;  /* Groene lijn voor visuele nadruk */
}



</style>

<body>
    <?php require 'resources/views/components/nav.php'; ?>

    <section class="heading">
        <div class="wrapper">
            <div class="headingText">
                <h2>Ramadan Donatieactie</h2>
            </div>
        </div>
    </section>
    
    <section class="iftar">
        <div class="wrapper">
            <?php if (isset($_GET['msg']) && isset($_GET['type'])): ?>
                <div class="message-box <?= htmlspecialchars($_GET['type']) == 'success' ? 'success-message' : 'error-message' ?>">
                    <?= htmlspecialchars($_GET['msg']) ?>
                </div>
            <?php endif; ?>
            
            <div class="iftarGroup">
            <div class="iftarInfo">
                <div class="info-box">
                    <h3>Steun Al-Hidaya: Donatieactie</h3>
                    <p>Al-Hidaya organiseert vanavond 26 maart een speciale donatieactie ter ondersteuning van onze Da’wah-activiteiten en het onderhoud van het pand. Jullie steun is onmisbaar om dit waardevolle werk voort te zetten.
</p>
                    <p style="font-weight: bold;">Grijp deze kans om te doneren, vooral in deze gezegende nachten!</p>
                    
                    <p class="hadith">De Profeet Mohammed zei:
					“De beste liefdadigheid is die welke gegeven wordt in de Ramadan.”
					(Tirmidhi, 663)
					</p>
					<p>
Moge Allah jullie giften accepteren en vermenigvuldigen. Doneer morgenavond of via onze website!
</p>
                    <p><em>~ Team Al-Hidaya Breda</em></p>
                </div>
            </div>
            <div class="iftarImg pcVersion">
                <img src="public/img/donatieactie.png" alt="Donatie Flyer">
            </div>
        </div>

        </div>
    </section>

    <section class="payment-form">
        <div class="wrapper">
            <h3 class="paymentHeader">Maak Laylatul Qadr nog zegenrijker met jouw donatie</h3>
            <form action="app/http/Controllers/donatieactieController.php" method="POST">
                <div class="form-group">
                    <label for="name">Naam:</label>
                    <input type="text" id="name" name="name" placeholder="Naam" required>
                </div>
                
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="E-mail" required>
                </div>

                <div class="form-group">
                    <label for="amount">Bedrag</label>
                    <input type="number" id="amount" name="amount" min="1" step="0.01" placeholder="Bedrag" required>
                </div>

                <button type="submit" class="btn-submit">Doneer nu!</button>
            </form>
        </div>
    </section>
    <div class="iftarImgMobile">
        <img src="public/img/donatieactie.png" alt="Iftaar Flyer">
    </div>
</body>

<?php require "resources/views/components/footer.php" ?>
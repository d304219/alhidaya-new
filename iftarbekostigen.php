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
</style>

<body>
    <?php require 'resources/views/components/nav.php'; ?>

    <section class="heading">
        <div class="wrapper">
            <div class="headingText">
                <h2>Ramadan 2025 - 1446 | Iftaar bij Al-Hidaya</h2>
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
                        <h3>Iftaar bij Al-Hidaya</h3>
                        <p>Tijdens de gezegende maand Ramadan biedt Al-Hidaya Breda ook dit jaar dagelijks gratis iftarmaaltijden aan in ons gelegenheidencentrum.</p>
                        <p>Vorig jaar was een groot succes! Dankzij de gulheid van onze ummah hebben we tussen de 80 en 100 personen per dag kunnen voorzien van een warme maaltijd. Dit jaar willen we opnieuw een beroep doen op jouw vrijgevigheid. </p>
                        
                        <p class="hadith">"Wie een vastende voedt om zijn vasten te verbreken, krijgt dezelfde beloning als de vastende." (Tirmidhi)</p>
                        <p><em>~ Team Al-Hidaya Breda</em></p>
                    </div>
                </div>
                <div class="iftarImg pcVersion">
                    <img src="public/img/iftaarflyer.png" alt="Iftaar Flyer">
                </div>
            </div>
        </div>
    </section>

    <section class="payment-form">
        <div class="wrapper">
            <h3 class="paymentHeader">Doe een bijdrage voor iftaar!</h3>
            <form action="app/http/Controllers/iftarbekostigenController.php" method="POST">
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
        <img src="public/img/iftaarflyer.png" alt="Iftaar Flyer">
    </div>
</body>

<?php require "resources/views/components/footer.php" ?>
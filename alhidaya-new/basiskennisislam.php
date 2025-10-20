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
                <h2>Ontdek de Islam – 6-weekse Module</h2>
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
                        <h3>Ontdek de Islam – 6-weekse Module</h3>
                        <p><strong>Voor wie:</strong><br>
                        • Broeders & zusters – jong & oud<br>
                        • Gratis deelname<br>
                        • Inclusief lunch</p>

                        <p><strong>Data & Tijd:</strong><br>
                        Van 24 mei t/m 28 juni<br>
                        Elke zaterdag van 11:00 tot 14:00</p>

                        <p><strong>Spreker:</strong><br>
                        Achmed El Ayadi</p>

                        <p><strong>Voor wie is deze module?</strong><br>
                        ☑ Geïnteresseerde<br>
                        ☑ Nieuwe Moslims<br>
                        ☑ Moslims die basiskennis willen opdoen</p>

                        <p><em>~ Team Al-Hidaya Breda</em></p>
                    </div>
                </div>
                <div class="iftarImg pcVersion">
                    <img src="public/img/moduleflyer.png" alt="Iftaar Flyer">
                </div>
            </div>
        </div>
    </section>

    <section class="form-section">
        <div class="wrapper">
            <h3 class="paymentHeader">Aanmelden voor de module</h3>
            <form action="app/http/Controllers/moduleAanmeldenController.php" method="POST">
                <div class="form-group">
                    <label for="firstname">Voornaam:</label>
                    <input type="text" id="firstname" name="firstname" placeholder="Voornaam" required>
                </div>

                <div class="form-group">
                    <label for="lastname">Achternaam:</label>
                    <input type="text" id="lastname" name="lastname" placeholder="Achternaam" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="E-mail" required>
                </div>

                <div class="form-group">
                    <label for="phone">Telefoonnummer:</label>
                    <input type="tel" id="phone" name="phone" placeholder="Bijv. 0612345678" required>
                </div>

                <div class="form-group">
                    <label for="gender">Geslacht:</label>
                    <select id="gender" name="gender" required>
                        <option value="">Selecteer</option>
                        <option value="man">Man</option>
                        <option value="vrouw">Vrouw</option>
                    </select>
                </div>

                <button type="submit" class="btn-submit">Aanmelden</button>
            </form>
        </div>
    </section>
    <div class="iftarImgMobile">
        <img src="public/img/moduleflyer2.png" alt="Iftaar Flyer">
    </div>
</body>

<?php require "resources/views/components/footer.php" ?>
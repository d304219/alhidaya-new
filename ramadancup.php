<!DOCTYPE html>
<html lang="nl">
<?php require 'resources/views/components/head.php'; ?>
<link rel="stylesheet" href="public/css/deislam.css">
<link rel="stylesheet" href="public/css/style.css">
<link rel="stylesheet" href="public/css/donation.css">
<link rel="stylesheet" href="public/css/ramadancup.css">
<style>
    body {
        background-color: #f5ebe0;
    }
    .ramadanCupGroup {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 20px;
    }

    .ramadanCupInfo p {
        margin-bottom: 0.95rem !important; /* Minder ruimte tussen paragrafen */
        margin-top: 1rem;
    }

    /* Zachte scheiding tussen Ramadan Cup-info en het formulier */
    .ramadanCup {
        padding-bottom: 50px;
        border-bottom: 2px solid rgba(0, 0, 0, 0.1);
    }

    .registration-form {
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
        .ramadanCupImgMobile {
        display: flex !important;
        width: auto !important;
        margin: 50px 10px;
        justify-content: center;
        align-items: center;
        }
        .ramadanCupImgMobile img {
            height: auto;
            border-radius: 10px;
            object-fit: cover; /* Zorgt ervoor dat de afbeelding dezelfde hoogte heeft */
            width: 100% !important;
        }
        .mobile{
            display: flex !important;
        }
        .pc{
            display: none;
        }
        .ramadanCupImg {
            display: none !important;
        }
    }
    @media (max-width: 413px) {
        .ramadanCupImgMobile img {
            width: 97% !important;
        }
    }
    @media (min-width: 1150px) {
        .mobile{
            display: none !important;
        }
    }
    .ramadanCupImgMobile {
        display: none;
    }
    
    .registrationHeader{
        margin-top: 35px;
        text-align: center;
    }

    .info-box {
    background-color: #fff6e0;
    border: 1px solid #c9a66b;
    border-radius: 12px;
    padding: 25px;
    box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
    text-align: center;
}

.info-box h3 {
    color: #8d6a50;
    font-size: 1.8rem;
    margin-bottom: 15px;
}

.info-items-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center; /* Centert de items */
    gap: 15px;
}

.info-item {
    display: flex;
    align-items: center;
    justify-content: left;
    width: 200px; /* Zorgt ervoor dat alle items dezelfde breedte hebben */
    padding: 12px;
    background: #f5ebe0;
    border-radius: 8px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    cursor: pointer;
}

.info-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.info-item i {
    font-size: 20px;
    color: #b08968;
    margin-right: 10px;
}

.event-description {
    margin-top: 15px;
    font-size: 1.1rem;
}

@media (max-width: 600px) {
    .info-items-container {
        flex-direction: column;
        align-items: center; /* Zorgt ervoor dat ze gecentreerd blijven op kleinere schermen */
    }
}

</style>

<body>
    <?php require 'resources/views/components/nav.php'; ?>

    <section class="heading">
        <div class="wrapper">
            <div class="headingText">
                <h2>Ramadan Cup 2025 | Al-Hidaya Breda</h2>
            </div>
        </div>
    </section>
    
    <section class="ramadanCup">
        <div class="wrapper">
            
            
            <div class="ramadanCupGroup">
            <div class="ramadanCupInfo">
                    <div class="info-box">
                        <h3>Ramadan Cup 2025</h3>
                        <div class="info-items-container mobile">
                            <p>Al Hidaya organiseert op 14 maart een spannend zaalvoetbaltoernooi! Dit jaar is er slechts plek voor 10 teams.</p>
                            <p>
                                Leeftijd: 17+<br>
                                Locatie: De Cour<br>
                                Marktstraat 6 Terhijden<br>
                                Start: 21:45<br>
                            </p>
                            
                            <p>Let op: Tijdens het toernooi worden de islamitische Aurah-voorschriften gerespecteerd.</p>
                            <p><em>-Team jongeren Al-Hidaya</em></p>
                        </div>
                        <div class="info-items-container pc">
                            <div class="info-item">
                                <i class="fas fa-calendar-alt"></i>
                                <p><strong>Datum:</strong> 14 maart 2025</p>
                            </div>
                            <div class="info-item">
                                <i class="fas fa-users"></i>
                                <p><strong>Plaatsen:</strong> 10 teams</p>
                            </div>
                            <div class="info-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <p><strong>Locatie:</strong> De Cour, Marktstraat 6</p>
                            </div>
                            <div class="info-item">
                                <i class="fas fa-clock"></i>
                                <p><strong>Inloop:</strong> 21:30</p>
                            </div>
                            <div class="info-item">
                                <i class="fas fa-euro-sign"></i>
                                <p><strong>Kosten:</strong> €50,- per team</p>
                            </div>
                            <div class="info-item">
                                <i class="fas fa-exclamation-circle"></i>
                                <p><strong>Dresscode:</strong> Islamitische aurah-voorschriften</p>
                            </div>
                            <p class="event-description">Mis dit sportieve en broederlijke evenement niet! Schrijf je team snel in.</p>
                            <p><em>~ Team Jongeren Al-Hidaya Breda</em></p>
                        </div>
                        
                    </div>
                </div>

                <div class="ramadanCupImg pcVersion">
                    <img src="public/img/ramdancup-flyer.png" alt="Ramadan Cup Flyer">
                </div>
            </div>
        </div>
    </section>
    
    <section class="registration-form">
        <div class="wrapper">
        <?php if (isset($_GET['msg']) && isset($_GET['type'])): ?>
                <div class="message-box <?= htmlspecialchars($_GET['type']) == 'success' ? 'success-message' : 'error-message' ?>">
                    <?= htmlspecialchars($_GET['msg']) ?>
                </div>
            <?php endif; ?>
            <h3 class="registrationHeader">Schrijf je team in voor de Ramadan Cup!</h3>
            <form action="app/http/Controllers/ramadancupController.php" method="POST">
                <div class="form-group">
                    <label for="teamName">Team Naam:</label>
                    <input type="text" id="teamName" name="teamName" placeholder="Team Naam" required>
                </div>
                
                <div class="form-group">
                    <label for="email">E-mailadres:</label>
                    <input type="email" id="email" name="email" placeholder="E-mailadres" required>
                </div>
				
				<div class="form-group">
                    <label for="phone">Telefoonnummer <span class="must">*</span></label>
                    <input type="text" name="phone" id="phone" placeholder="Telefoonnummer" required>
                </div>
				
                <button type="submit" class="btn-submit">Schrijf je team in!</button>
            </form>
        </div>
    </section>
    <div class="ramadanCupImgMobile">
        <img src="public/img/ramdancup-flyer.png" alt="Ramadan Cup Flyer">
    </div>
</body>

<?php require "resources/views/components/footer.php" ?>
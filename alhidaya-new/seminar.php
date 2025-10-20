<!DOCTYPE html>
<html lang="en">
<?php require 'resources/views/components/head.php'; ?>
<link rel="stylesheet" href="public/css/deislam.css">
<link rel="stylesheet" href="public/css/style.css">
<link rel="stylesheet" href="public/css/donation.css">
<link rel="stylesheet" href="public/css/seminar.css">
<style>
    
</style>
<body>
    <?php require 'resources/views/components/nav.php'; ?>

    <section class="heading">
        <div class="wrapper">
            <div class="headingText">
                <h2>Seminar</h2>
            </div>
        </div>
    </section>
    
    <section class="seminar">
        <div class="wrapper">
            <?php
            // Display success or error messages
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
            <div class="seminarGroup">
                <div class="seminarInfo">
                    <div class="info-box">
                        <h3>Fiqh as-Siyaam – Alles wat je moet weten over het vasten</h3>
                        <p>Bereid je voor op de gezegende maand Ramadan met dit seminar over het vasten (as-Siyam), een van de vijf pilaren van de Islam. Dit seminar biedt je inzicht in de regels van het vasten en helpt je de ware waarde en zoetheid van Ramadan te ervaren, in sha Allah.</p>
                        
                        <div class="info-items-container">
                            <div class="info-item">
                                <i class="fas fa-calendar-alt"></i>
                                <span><strong>Datum & Tijd:</strong> Zaterdag 15 februari, van 10:00 tot 14:00</span>
                            </div>
                            <div class="info-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span><strong>Locatie:</strong> Antiloopstraat 51, 4817 LB Breda</span>
                            </div>
                            <div class="info-item">
                                <i class="fas fa-chalkboard-teacher"></i>
                                <span><strong>Spreker:</strong> Ustaad Naoufal (leerling van Sheikh Aboe Ismail)</span>
                            </div>
                            <div class="info-item">
                                <i class="fas fa-hand-holding-heart"></i>
                                <span><strong>Kosten:</strong> €5 (inclusief lunch)</span>
                            </div>
                            <div class="info-item">
                                <i class="fas fa-user-friends"></i>
                                <span><strong>Voor wie:</strong> Broeders & zusters</span>
                            </div>
                            <div class="info-item">
                                <i class="fas fa-pen"></i>
                                <span><strong>Benodigdheden:</strong> Laptop of schrijfgerei (is verplicht)</span>
                            </div>
                            <div class="info-item">
                                <i class="fas fa-envelope"></i>
                                <span>Voor vragen: <a href="mailto:jongeren@alhidaya.nl" style="text-decoration: underline;">jongeren@alhidaya.nl</a></span>
                            </div>
                        </div>
                        
                        <br>
                        <p><em>~ Team Al Hidaya Breda</em></p>
                    </div>
                </div>
                <div class="seminarImg">
                    <img src="public/img/seminar.jpg" alt="Fiqh as-Siyaam Seminar">
                </div>
            </div>
        </div>
    </section>
  <!-- 
    <section class="payment-form">
        <div class="wrapper">
            <h3>Schrijf je nu in voor het seminar!</h3>
            <form action="seminarMollie/process_payment.php" method="POST">
                <div class="form-group">
                    <div>
                        <label for="name">Naam: <span class="must">*</span></label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div>
                        <label for="lastname">Achternaam: <span class="must">*</span></label>
                        <input type="text" id="lastname" name="lastname" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="gender">Geslacht: <span class="must">*</span></label>
                    <select id="gender" name="gender" required>
                        <option value="Man">Man</option>
                        <option value="Vrouw">Vrouw</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="email">Email: <span class="must">*</span></label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="description">Bericht (optioneel):</label>
                    <textarea id="description" name="description" rows="4" placeholder="Laat hier een bericht achter (optioneel)"></textarea>
                </div>
                
                <button type="submit" class="btn-submit"> €5,-</button>
            </form>
        </div>
    </section>
  -->
</body>
<?php require "resources/views/components/footer.php" ?>

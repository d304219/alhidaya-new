<!DOCTYPE html>
<html lang="en">
<?php require 'resources/views/components/head.php';?>
<link rel="stylesheet" href="public/css/donation.css">

<body>
    <?php require 'resources/views/components/nav.php';?>
    <section class="heading">
        <div class="wrapper">
            <div class="headingText">
                <h2>Word jij ook Al-Hidaya Lid/Sponsor?</h2>
            </div>
        </div>
    </section>

    <section class="donations">
        <div class="wrapper">
            <div class="donationsSection">
                <?php
                    if (isset($_GET['error'])) {
                        echo '<div class="error-message">' . $_GET['error'] . '</div>';
                    } elseif (isset($_GET['success'])) {
                        echo '<div class="success-message">' . $_GET['success'] . '</div>';
                    }
                ?>
                <form id="payment-form" action="app/http/Controllers/questController.php" method="post"
                    style='display: flex; flex-direction: column;'>

                    
                    
                    <div class="form-group">
                        <label for="bedrag">Bedrag<span class="must">*</span> </label>
                        <div class="meerkeuze">
                            <label for="monthlydonation10"><input type="radio" name="KeuzeIncasso" value="jaarlijks"> <p>Jaarlijks sponsoring met €204,- </p></label>
                            
                            <label for="monthlydonation20"><input type="radio" name="KeuzeIncasso" value="maandelijks"> <p>Maandelijkse sponsoring met €17,-</p></label>
                            
                        </div>
                    </div>
                    <script>
                                            document.querySelectorAll('.meerkeuze label').forEach(label => {
                        label.addEventListener('click', () => {
                            const input = label.querySelector('input[type="radio"]');
                            if (input) {
                                input.checked = true;
                            }
                        });
                    });

                    </script>



                    <div class="form-group Naam">
                            <label for="naam">Naam<span class="must">*</span> </label>
                            <div class="nameGrid">
                                <input type="text" class="firstName" name="firstname" placeholder="Voornaam" required>
                                <input type="text" class="lastName" name="lastname" placeholder="Achternaam" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="naam">Adres<span class="must">*</span> </label>
                            <div class="adresGrid">
                                <input type="text" class="street" name="street" placeholder="Straat + Huisnummer" required>
                                <input type="text" class="postcode" name="postcode" placeholder="Postcode" required>
                                <input type="text" class="place" name="place" placeholder="Plaatsnaam" required>
                                <select id="country" class="country" name="country" required>
                                    <option value="" disabled selected>Kies een land</option>
                                </select>
                            </div>
                        </div>

                    <div class="form-group">
                        <label for="phone">Telefoon<span class="must">*</span> </label>
                        <input type="tel" name="phone" placeholder="+31 6 12345678" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Emailadres<span class="must">*</span> </label>
                        <input type="email" name="email" placeholder="voorbeeld@email.com" required>
                    </div>

                    <div class="form-group">
                        <label for="ibancode">IBN<span class="must">*</span> </label>
                        <input type="text" id="iban" name="ibancode" placeholder="NL 99 INGB 0123456789" required>
                    </div>

                    <div class="form-group">
                        <label for="ibanname">Iban ter name van<span class="must">*</span> </label>
                        <input type="text" name="ibanname" placeholder="De naam van de eigenaar of rekeninghouder" required>
                    </div>

                    <div class="form-group">
                        <label for="password">BIC (i.h.g.v buitenlandse rekening)</label>
                        <input type="text" name="BIC" id="bic" placeholder="Buitelandse rekeningnummer" required>
                    </div>

                    <div class="form-group">
                        <label for="permission">Toestemming<span class="must">*</span></label>

                        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                        <!-- <div class="g-recaptcha" data-sitekey="YOUR_SITE_KEY"></div><br> -->
                        <div class="donationText">
                            <h4>Doorlopende Machtiging</h4>
                            <p>Door ondertekening van dit formulier geeft u toestemming aan Stichting Marokkaanse Jongeren Al-Hidaya Breda om doorlopende incassopdrachten te sturen naar uw bank om een bedrag van uw rekening af te schrijven en aan uw bank om doorlopend een bedrag van uw rekening af te schrijven overeenkomstig de opdracht van Al-Hidaya.</br></br>Als u het niet eens bent met deze afschrijving kunt u deze laten terugboeken. Neem hiervoor binnen 8 weken na afschrijving contact op met uw bank. Vraag uw bank naar de voorwaarden.</p>                            <strong><br>LET OP:</strong>
                            <ul class="donationList">
                                <li>Bedrag wordt niet direct van uw rekening afgeschreven</li>
                            </ul>
                        </div>
                        <div class="meerkeuze">
                            <label for="permission" style="font-weight: 400;"> <input type="checkbox" id="permission" name="permission" value="Geaccepteerd" required>Hierbij machtig ik Stichting Marokkaanse Jongeren Al-Hidaya het aangegeven bedrag te incasseren.</label>
                        </div>
                    </div>

                    <input class="btn" id="submitButton" name="sent" type="submit" value="Akkoord">
                </form>
                <script>
                    
                    // Get the checkbox and the submit button
                    const permissionCheckbox = document.getElementById('permission');
                    const submitButton = document.getElementById('submitButton');

                    // Add an event listener to the checkbox
                    permissionCheckbox.addEventListener('change', function () {
                        // Enable or disable the submit button based on the checkbox state
                        submitButton.disabled = !this.checked;
                    });
                    // Fetch countries from the Rest Countries API and sort alphabetically
                    fetch('https://restcountries.com/v3.1/all')
                        .then(response => response.json())
                        .then(data => {
                            const countryDropdown = document.getElementById('country');
                            // Sort countries alphabetically
                            data.sort((a, b) => a.name.common.localeCompare(b.name.common));
                            // Populate the dropdown with sorted country names
                            data.forEach(country => {
                                const option = document.createElement('option');
                                option.value = country.name.common;
                                option.textContent = country.name.common;
                                countryDropdown.appendChild(option);
                            });
                        })
                        .catch(error => console.error('Error fetching countries:', error));

                    document.getElementById('iban').addEventListener('input', function () {
                        var ibanValue = this.value.trim();
                        var bicField = document.getElementById('bic');

                        // If IBAN is entered, disable BIC field
                        bicField.disabled = ibanValue !== '';
                        
                        // If IBAN is entered, clear and remove the "required" attribute from BIC field
                        if (ibanValue !== '') {
                            bicField.value = '';
                            bicField.removeAttribute('required');
                        } else {
                            // If IBAN is not entered, add the "required" attribute to BIC field
                            bicField.setAttribute('required', 'required');
                        }
                    });
                    document.getElementById('bic').addEventListener('input', function () {
                        var bicValue = this.value.trim();
                        var ibanField = document.getElementById('iban');

                        // If BIC is entered, disable IBAN field
                        ibanField.disabled = bicValue !== '';

                        // If BIC is entered, clear and remove the "required" attribute from IBAN field
                        if (bicValue !== '') {
                            ibanField.value = '';
                            ibanField.removeAttribute('required');
                        } else {
                            // If BIC is not entered, add the "required" attribute to IBAN field
                            ibanField.setAttribute('required', 'required');
                        }
                    });
                </script>
            </div>
        </div>
    </section>
    <?php require 'resources/views/components/footer.php';?>
</body>
</html>
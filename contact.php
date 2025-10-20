<!DOCTYPE html>
<html lang="en">
<?php require 'resources/views/components/head.php'; ?>
<link rel="stylesheet" href="public/css/donation.css">
<link rel="stylesheet" href="public/css/contact.css">

<body>
    <?php require 'resources/views/components/nav.php'; ?>

    <section class="heading">
        <div class="wrapper">
            <div class="headingText">
                <h2>Contact</h2>
            </div>
        </div>
    </section>

    <div class="wrapper">

        <?php if(isset($_GET['msg'])): ?>
            <div class="msg <?php echo $_GET['type']; ?>">
                <?php echo htmlspecialchars($_GET['msg']); ?>
                <button class="close" onclick="this.parentElement.style.display='none';">&times;</button>
            </div>
        <?php endif; ?>

        <form method="POST" name="contactForm"  class="contactForm" novalidate="novalidate" action="app/http/Controllers/contactController.php">
            <div class="row">
                <div class="column">
                    <div class="form-group">
                        <label for="name">Voor- en achternaam</label>
                        <input type="text" name="name" id="name" placeholder="Name">
                    </div>

                    <div class="form-group">
                        <label for="email">Email Adres</label>
                        <input type="email" name="email" id="email" placeholder="Email">
                    </div>

                    <div class="form-group">
                        <label for="subject">Onderwerp</label>
                        <input type="text" name="subject" id="subject" placeholder="Subject">
                    </div>

                    <div class="form-group">
                        <label for="message">Bericht</label>
                        <textarea name="message" id="message" cols="30" rows="11" placeholder="Message"></textarea>
                    </div>

                    <input type="submit" value="Verstuur Bericht" style="margin: 10px 0;" class="btn">
                </div>

                <div class="column">
                    <div class="mapouter">
                        <div class="gmap_canvas">
                            <iframe width="100%" height="100%" id="gmap_canvas" src="https://maps.google.com/maps?q=Antiloopstraat%2051%2C%204817%20LB%20Breda&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php require "resources/views/components/footer.php" ?>
</body>
</html>

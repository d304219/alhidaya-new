<!DOCTYPE html>
<html lang="en">
  <?php require 'resources/views/components/head.php';?>
  <link rel="stylesheet" href="public/css/slides.css">
  <?php require_once 'config/conn.php'; ?>

  <body>
    <?php require 'resources/views/components/nav.php';?>
    <main>
      <section class="hero">
        <div class="wrapper">
          <div class="heroSection">
            <div class="heroText">
              <h1>Betaling Gelukt!</h1>
              <h3>Uw donatie is met succes verwerkt. Hartelijk dank voor uw bijdrage aan Al-Hidaya.</h3>
              <div>
                <a class="btn" href="/">Terug naar Home</a>
              </div>
            </div>
            <div class="heroIcon">
              <img src="public/img/success.png" alt="Payment Successful Icon">
            </div>
          </div>
        </div>
      </section>

      <section class="msg success">
        <div class="wrapper">
          <p>Uw donatie helpt ons bij het ondersteunen van onze projecten en gemeenschap. We waarderen uw steun enorm. Voor meer informatie over toekomstige projecten en evenementen, kunt u onze <a href="/events">Evenementenpagina</a> bezoeken.</p>
        </div>
      </section>

    </main>

    <?php require 'resources/views/components/footer.php';?>
  </body>

  <style>
    /* Styling for the Payment Success Page */
    .heroText h1 {
      font-size: var(--h1-size);
      color: #ffff;
      text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5); /* Example shadow */
    }

    .heroText h3 {
      font-size: var(--h3-size);
      margin-bottom: 25px;
    }

    .heroIcon img {
      max-height: 300px;
      width: auto;
      filter: drop-shadow(0 0 0.9rem green);
    }

    .msg.success {
      text-align: center;
      background-color: #d4edda;
      color: #155724;
      padding: 20px;
      border-radius: 8px;
    }

    .msg.success a {
      color: #155724;
      text-decoration: underline;
    }

    .wrapper {
      display: flex;
      flex-direction: column;
      gap: 12px;
      padding: 0 15rem;
    }
  </style>
</html>

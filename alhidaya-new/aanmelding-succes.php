<!DOCTYPE html>
<html lang="nl">
  <?php require 'resources/views/components/head.php'; ?>
  <link rel="stylesheet" href="public/css/slides.css">
  <?php require_once 'config/conn.php'; ?>

  <body>
    <?php require 'resources/views/components/nav.php'; ?>
    <main>
      <section class="hero">
        <div class="wrapper">
          <div class="heroSection">
            <div class="heroText">
              <h1>Aanmelding Gelukt!</h1>
              <h3>Uw aanmelding voor I’tikaaf is met succes verwerkt. Wij kijken ernaar uit u te verwelkomen.</h3>
              <div>
                <a class="btn" href="/">Terug naar Home</a>
              </div>
            </div>
            <div class="heroIcon">
              <img src="public/img/success.png" alt="Aanmelding Succesvol Icon">
            </div>
          </div>
        </div>
      </section>

      <section class="msg success">
        <div class="wrapper">
          <p>Bedankt voor uw aanmelding! U ontvangt binnenkort een bevestigingsmail met alle details. Voor vragen kunt u contact opnemen via <a href="mailto:info@alhidaya.nl">info@alhidaya.nl</a> of een WhatsApp-bericht sturen naar <a href="https://wa.me/31638017408">+31 6 38 01 74 08</a>.</p>
        </div>
      </section>
    </main>

    <?php require 'resources/views/components/footer.php'; ?>
  </body>

  <style>
    /* Styling voor de Aanmelding Succes Pagina */
    .heroText h1 {
      font-size: var(--h1-size);
      color: #ffff;
      text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5); /* Voorbeeld schaduw */
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

    .msg.success a:hover {
      text-decoration: none;
    }

    .wrapper {
      display: flex;
      flex-direction: column;
      gap: 12px;
      padding: 0 15rem;
    }

    @media (max-width: 768px) {
      .wrapper {
        padding: 0 1rem;
      }

      .heroText h1 {
        font-size: 2rem;
      }

      .heroText h3 {
        font-size: 1.2rem;
      }

      .heroIcon img {
        max-height: 200px;
      }
    }
  </style>
</html>
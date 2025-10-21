<!DOCTYPE html>
<html lang="en">
    <?php require 'resources/views/components/head.php';?>
    <link rel="stylesheet" href="public/css/slides.css">
    <?php require_once 'config/conn.php'; ?>

    <?php
    // Fetch all events, ordered by date with the latest first
    $query = "SELECT * FROM events ORDER BY date DESC";
    $statement = $conn->prepare($query);
    $statement->execute();
    $events = $statement->fetchAll(PDO::FETCH_ASSOC);

    // Debugging output
    ?>

<body>
    
    <?php require 'resources/views/components/nav.php';?>
    <main>
    <section class="hero">
    <div class="wrapper">
        <div class="heroSection">
            <div class="heroText">
                
                <h3>Al-Hidaya heet u een hartelijk welkom.</h3>
                <div><a class="btn" target="_blank" href="https://paymentlink.mollie.com/payment/FodOeiXBx1mnvgcwuBfNR/">Doneren</a></div>
            </div>
                <div class="heroIcon">
                    <img src="favicon.ico" alt="Al-Hidaya Logo">
                </div>
            </div>
        </div>
    </section>

        <section class="prayerTimes">
    <div class="wrapper" style="align-items: center;">
        <div class="prayerTimesBlock">
            <div class="prayerTimesText">
                <h3>Gebedstijden Vandaag</h3>
                <h2>Gebedstijden Stichting Al-Hidaya Breda</h2>
            </div>
            <div class="gmap_outer">
                <div class="gmap_canvas">
                    <iframe src="https://mawaqit.net/nl/m/smmib-al-hidaya?showOnly5PrayerTimes=0" frameborder="0" style="border:0; width: 100%; height: 100%; min-height: 500px;" allowfullscreen="" loading="lazy" scrolling="no"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>


                </div>
            </div>
        </section>
        
        <section class="heading">
        <div class="wrapper">
            <div class="headingText">
                <h2>Events</h2>
            </div>
        </div>
    </section>
            
    <section class="wrapper section">
    <div class="block-content events">
        <h3>Laatste Nieuws!</h3>
        <div class="events-wrapper">
            <button class="slide-arrow left-arrow" aria-label="Previous Slide">&lt;</button>
            <div class="events-slides-content">
            <?php if (empty($events)): ?>
                <div class="empty-state">
                    <h4>Geen evenementen gepland</h4>
                    <p>Momenteel staan er geen evenementen op de planning. Houd onze kanalen in de gaten voor toekomstige activiteiten.</p>
                </div>
            <?php else: ?>
                <?php foreach($events as $eventsItem): ?>
                <?php
                    $formattedDate = '';
                    if (!empty($eventsItem['date'])) {
                        $timestamp = strtotime($eventsItem['date']);
                        $formattedDate = $timestamp ? date('d-m-Y', $timestamp) : $eventsItem['date'];
                    }
                    $excerpt = strip_tags($eventsItem['description']);
                    if (function_exists('mb_strimwidth')) {
                        $excerpt = mb_strimwidth($excerpt, 0, 140, '…');
                    } else {
                        $excerpt = substr($excerpt, 0, 140) . (strlen($excerpt) > 140 ? '…' : '');
                    }
                    if (trim($excerpt) === '') {
                        $excerpt = 'Klik op "Lees meer" voor alle details.';
                    }
                ?>
                <div class="events-slide">
                    <div class="card-media">
                        <img class="image" src="public/img/events/<?= $eventsItem['img_file'] ?>" alt="<?= $eventsItem['title'] ?>">
                        <?php if ($formattedDate): ?>
                        <span class="card-badge"><?= $formattedDate ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="event-slide-text">
                        <h4><?= $eventsItem['title'] ?></h4>
                        <?php if ($formattedDate): ?>
                        <p class="event-date"><?= $formattedDate ?></p>
                        <?php endif; ?>
                        <p class="event-excerpt"><?= $excerpt ?></p>
                        <button class="slide-button" type="button">Lees meer</button>
                    </div>
                    <div class="description hidden">
                        <?= $eventsItem['description'] ?>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
            </div>
            <button class="slide-arrow right-arrow" aria-label="Next Slide">&gt;</button>
        </div>
    </div>
</section>




    <!-- Modal Structure -->
    <div id="modal" class="modal">
        <div class="modal-content">

          <div class="modal-top">
            <h4 id="modal-title"></h4>
            <span class="close">&times;</span>
          </div>

        <div class="modal-info">
          <div class="modal-image">
              <img id="modal-img" src="" alt="">
          </div>
          <div class="modal-text">
              <p id="modal-description"></p>
          </div>
        </div>

        </div>
    </div>

    <!-- Voeg hier de rest van de inhoud toe -->

<script>
document.addEventListener('DOMContentLoaded', function() {
    const slideContainer = document.querySelector('.events-slides-content');
    const leftArrow = document.querySelector('.left-arrow');
    const rightArrow = document.querySelector('.right-arrow');
    const firstSlide = document.querySelector('.events-slide');
    const slideWidth = firstSlide ? firstSlide.offsetWidth : 0;

    if (!firstSlide) {
        if (leftArrow) leftArrow.style.display = 'none';
        if (rightArrow) rightArrow.style.display = 'none';
    }

    if (slideContainer && leftArrow && rightArrow && slideWidth) {
        leftArrow.addEventListener('click', () => {
            slideContainer.scrollBy({ left: -slideWidth, behavior: 'smooth' });
        });

        rightArrow.addEventListener('click', () => {
            slideContainer.scrollBy({ left: slideWidth, behavior: 'smooth' });
        });
    }

    // Modal related code
    var modal = document.getElementById("modal");
    var span = document.getElementsByClassName("close")[0];
    var modalImg = document.getElementById("modal-img");
    var modalTitle = document.getElementById("modal-title");
    var modalDescription = document.getElementById("modal-description");

    function openModal(image, title, description) {
        modal.style.display = "flex";
        modalImg.src = image;
        modalTitle.textContent = title;
        modalDescription.innerHTML = description;
    }

    document.querySelectorAll('.events-slide').forEach(function(slide) {
        var button = slide.querySelector('.slide-button');
        var image = slide.querySelector('.card-media img');
        var description = slide.querySelector('.description');
        if (!button || !image || !description) {
            return;
        }
        button.addEventListener('click', function(event) {
            event.preventDefault();
            var title = slide.querySelector('h4').textContent;
            openModal(image.src, title, description.innerHTML);
        });
    });

    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
});
</script>

    </main>
    <?php require "resources/views/components/footer.php"?>
</body>
</html>

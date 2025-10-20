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
            <?php foreach($events as $eventsItem): ?>
                <div class="events-slide">
                    <div class="slide-info">
                        <div class="image-carousel">
                                <img class="image" src="public/img/events/<?= $eventsItem['img_file'] ?>" alt="<?= $eventsItem['title'] ?>">
                        </div>
                    </div>
                    <div class="event-slide-text">
                        <h4><?= $eventsItem['title'] ?></h4>
                        <p><?= $eventsItem['date'] ?></p>
                        <button class="slide-button">Lees meer</button>
                    </div>
                    <div class="description hidden">
                        <?= $eventsItem['description'] ?>
                    </div>
                </div>
                <?php endforeach; ?>


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
    const slideWidth = document.querySelector('.events-slide').offsetWidth;

    leftArrow.addEventListener('click', () => {
        slideContainer.scrollBy({ left: -slideWidth, behavior: 'smooth' });
    });

    rightArrow.addEventListener('click', () => {
        slideContainer.scrollBy({ left: slideWidth, behavior: 'smooth' });
    });

    // Image Carousel code
    document.querySelectorAll('.events-slide').forEach(slide => {
        let currentIndex = 0;
        const images = slide.querySelectorAll('.image-carousel img');
        images[currentIndex].classList.add('active');

        slide.addEventListener('click', () => {
            images[currentIndex].classList.remove('active');
            currentIndex = (currentIndex + 1) % images.length;
            images[currentIndex].classList.add('active');
        });

        // Modal code
        slide.addEventListener('click', function() {
            const imageSrc = images[currentIndex].src;
            const title = slide.querySelector('h4').textContent;
            const description = slide.querySelector('.description').innerHTML;
            openModal(imageSrc, title, description);
        });
    });

    // Modal related code
    var modal = document.getElementById("modal");
    var span = document.getElementsByClassName("close")[0];
    var modalImg = document.getElementById("modal-img");
    var modalTitle = document.getElementById("modal-title");
    var modalDescription = document.getElementById("modal-description");
    var buttons = document.querySelectorAll('.slide-button');

    function openModal(image, title, description) {
        modal.style.display = "flex";
        modalImg.src = image;
        modalTitle.textContent = title;
        modalDescription.innerHTML = description;
    }

    buttons.forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            var slide = button.parentElement;
            var image = slide.querySelector('.image.active').src;
            var title = slide.querySelector('h4').textContent;
            var description = slide.querySelector('.description').innerHTML;
            openModal(image, title, description);
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

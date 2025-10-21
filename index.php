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
                
                <h3>Wees welkom! Voor de dagelijkse gebeden en educatie.</h3>
                <div><a class="btn" target="_blank" href="https://paymentlink.mollie.com/payment/FodOeiXBx1mnvgcwuBfNR/">Steun ons</a></div>
            </div>
                <div class="heroIcon">
                    <img src="favicon.ico" alt="Al-Hidaya Logo">
                </div>
            </div>
        </div>
    </section>

        <section class="prayerTimes">
    <div class="wrapper">
        <div class="prayerTimesBlock">
            <div class="prayerTimesText">
                <h3>Gebedstijden Vandaag</h3>
                <h2>Gebedstijden Stichting Al-Hidaya Breda</h2>
            </div>
            <div class="prayerTimesContent">
                <div class="mawaqitSection">
                    <h4>Mawaqit Widget</h4>
            <div class="gmap_outer">
                <div class="gmap_canvas">
                            <iframe src="https://mawaqit.net/nl/m/smmib-al-hidaya?showOnly5PrayerTimes=0" frameborder="0" style="border:0; width: 100%; height: 100%; min-height: 400px;" allowfullscreen="" loading="lazy" scrolling="no"></iframe>
                        </div>
                    </div>
                </div>
                <div class="youtubeSection">
                    <h4>Al Hidaya YouTube</h4>
                    <div class="youtubeVideos">
                        <div class="youtubeVideo">
                            <iframe width="100%" height="200" src="https://www.youtube.com/embed/latest?list=PLxQqRO7u0DQCXoWcKq6iO1yxqB4n4yuAw" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <div class="youtubeVideo">
                            <iframe width="100%" height="200" src="https://www.youtube.com/embed/latest?list=PLxQqRO7u0DQCXoWcKq6iO1yxqB4n4yuAw" frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
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
                <a href="event-show.php?id=<?= $eventsItem['id'] ?>" class="events-slide-link">
                    <div class="events-slide">
                        <div class="slide-info">
                            <div class="image-carousel">
                                    <img class="image" src="public/img/events/<?= $eventsItem['img_file'] ?>" alt="<?= $eventsItem['title'] ?>">
                            </div>
                        </div>
                        <div class="event-slide-text">
                            <h4><?= $eventsItem['title'] ?></h4>
                            <p><?= $eventsItem['date'] ?></p>
                            <span class="slide-button">Lees meer</span>
                        </div>
                        <div class="description hidden">
                            <?= $eventsItem['description'] ?>
                        </div>
                    </div>
                </a>
                <?php endforeach; ?>


            </div>
            <button class="slide-arrow right-arrow" aria-label="Next Slide">&gt;</button>
        </div>
    </div>
</section>





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
});
</script>

    </main>
    <?php require "resources/views/components/footer.php"?>
</body>
</html>

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
?>

<body>
    <?php require 'resources/views/components/nav.php';?>
    
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


    <?php require 'resources/views/components/footer.php';?>

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
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<?php require 'resources/views/components/head.php';?>
<?php require 'data/educatieData.php';?>
<?php require 'config/config.php' ?>

<link rel="stylesheet" href="public/css/slides.css">

<body>
    <?php require 'resources/views/components/nav.php';?>
    <section class="heading">
        <div class="wrapper">
            <div class="headingText">
                <h2>Educatie</h2>
            </div>
        </div>
    </section>
            
    <?php require_once 'config/conn.php'; 
        
        $query = "SELECT * FROM education"; 
        $statement = $conn->prepare($query); 
        $statement->execute(); 
        $education = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

    <section class="wrapper section">
    <div class="block-content">
        <h3>Kennis Vergaren</h3>
        <p>De Profeet ﷺ zei : "Wie een pad bewandelt op zoek naar kennis, Allah zal voor hem het pad naar het Paradijs gemakkelijk maken. Mensen komen niet samen in de huizen van Allah, om het boek van Allah te reciteren en het samen te bestuderen, maar de rust zal op hen neerdalen, genade zal hen bedekken, engelen zullen hen omringen, en Allah zal hen vermelden aan degenen die dicht bij hem staan."</p>
        <p><i>- Ṣaḥīḥ Muslim 2699</i></p>
        <div class="educatie-slides-content">
        <?php if (empty($education)): ?>
            <div class="empty-state">
                <h4>Momenteel geen lessen beschikbaar</h4>
                <p>Er staan op dit moment geen educatieve activiteiten gepland. Kom later terug of schrijf je in voor onze nieuwsbrief.</p>
            </div>
        <?php else: ?>
        <?php foreach($education as $educationItem): ?>
        <?php
            $excerpt = strip_tags($educationItem['description']);
            if (function_exists('mb_strimwidth')) {
                $excerpt = mb_strimwidth($excerpt, 0, 160, '…');
            } else {
                $excerpt = substr($excerpt, 0, 160) . (strlen($excerpt) > 160 ? '…' : '');
            }
            if (trim($excerpt) === '') {
                $excerpt = 'Klik op "Lees meer" voor alle details.';
            }
        ?>
        <div class="educatie-slide">
            <div class="card-media">
                <img class="educatie-slide-img" src="public/img/educatie/<?= $educationItem['img_file'] ?>" alt="<?= $educationItem['title'] ?>">
            </div>
            <div class="event-slide-text">
                <h4><?= $educationItem['title'] ?></h4>
                <p class="event-date"><?= $educationItem['undertitle'] ?></p>
                <p class="event-excerpt"><?= $excerpt ?></p>
                <button class="slide-button" type="button">Lees meer</button>
            </div>
            <div class="description hidden">
                <?= $educationItem['description'] ?>
            </div>
        </div>

        <?php endforeach; ?>
        <?php endif; ?>
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

    <?php require 'resources/views/components/footer.php';?>

    <script>document.addEventListener('DOMContentLoaded', function() {
    // Get the modal
    var modal = document.getElementById("modal");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // Get the modal content elements
    var modalImg = document.getElementById("modal-img");
    var modalTitle = document.getElementById("modal-title");
    var modalDescription = document.getElementById("modal-description");

    // Function to open the modal
    function openModal(image, title, description) {
        modal.style.display = "flex";
        modalImg.src = image;
        modalTitle.textContent = title;
        modalDescription.innerHTML = description;
    }

    // Attach event listeners to education slides
    document.querySelectorAll('.educatie-slide').forEach(function(slide) {
        var button = slide.querySelector('.slide-button');
        var imageEl = slide.querySelector('.educatie-slide-img');
        var descriptionEl = slide.querySelector('.description');

        if (!button || !imageEl || !descriptionEl) {
            return;
        }

        button.addEventListener('click', function(event) {
            event.preventDefault();
            var title = slide.querySelector('h4').textContent;
            openModal(imageEl.src, title, descriptionEl.innerHTML);
        });
    });

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
});

    </script>
</body>
</html>

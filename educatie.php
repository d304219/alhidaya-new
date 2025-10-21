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
        <div class="block-content educatie-content">
            <div class="educatie-intro">
                <h3>Kennis Vergaren</h3>
                <div class="intro-text">
                    <p>De Profeet ﷺ zei : "Wie een pad bewandelt op zoek naar kennis, Allah zal voor hem het pad naar het Paradijs gemakkelijk maken. Mensen komen niet samen in de huizen van Allah, om het boek van Allah te reciteren en het samen te bestuderen, maar de rust zal op hen neerdalen, genade zal hen bedekken, engelen zullen hen omringen, en Allah zal hen vermelden aan degenen die dicht bij hem staan."</p>
                    <p class="hadith-source"><i>- Ṣaḥīḥ Muslim 2699</i></p>
                </div>
            </div>
            
            <div class="educatie-grid">
                <?php foreach($education as $educationItem): ?>
                <a href="educatie-show.php?id=<?= $educationItem['id'] ?>" class="educatie-card-link">
                    <div class="educatie-card">
                        <div class="educatie-image">
                            <img src="public/img/educatie/<?= $educationItem['img_file'] ?>" alt="<?= $educationItem['title'] ?>">
                        </div>
                        <div class="educatie-info">
                            <h4><?= $educationItem['title'] ?></h4>
                            <p class="educatie-subtitle"><?= $educationItem['undertitle'] ?></p>
                            <span class="slide-button">Lees meer</span>
                        </div>
                        <div class="description hidden">
                            <?= $educationItem['description'] ?>
                        </div>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>


    <?php require 'resources/views/components/footer.php';?>

</body>
</html>

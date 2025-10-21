<!DOCTYPE html>
<html lang="en">
<?php require 'resources/views/components/head.php';?>
<?php require_once 'config/conn.php'; ?>

<?php
// Get education ID from URL parameter
$education_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($education_id > 0) {
    $query = "SELECT * FROM education WHERE id = ?";
    $statement = $conn->prepare($query);
    $statement->execute([$education_id]);
    $education = $statement->fetch(PDO::FETCH_ASSOC);
    
    if (!$education) {
        header('Location: educatie.php');
        exit;
    }
} else {
    header('Location: educatie.php');
    exit;
}
?>

<body>
    <?php require 'resources/views/components/nav.php';?>
    
    <section class="heading">
        <div class="wrapper">
            <div class="headingText">
                <h2><?= htmlspecialchars($education['title']) ?></h2>
            </div>
        </div>
    </section>
            
    <section class="wrapper section">
        <div class="show-page-content">
            <div class="show-page-image">
                <img src="public/img/educatie/<?= htmlspecialchars($education['img_file']) ?>" alt="<?= htmlspecialchars($education['title']) ?>">
            </div>
            <div class="show-page-info">
                <div class="show-page-meta">
                    <span class="education-subtitle"><?= htmlspecialchars($education['undertitle']) ?></span>
                </div>
                <div class="show-page-description">
                    <?= $education['description'] ?>
                </div>
                <div class="show-page-actions">
                    <a href="educatie.php" class="btn">Terug naar Educatie</a>
                </div>
            </div>
        </div>
    </section>

    <?php require 'resources/views/components/footer.php';?>
</body>
</html>

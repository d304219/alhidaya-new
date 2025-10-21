<!DOCTYPE html>
<html lang="en">
<?php require 'resources/views/components/head.php';?>
<?php require_once 'config/conn.php'; ?>

<?php
// Get event ID from URL parameter
$event_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($event_id > 0) {
    $query = "SELECT * FROM events WHERE id = ?";
    $statement = $conn->prepare($query);
    $statement->execute([$event_id]);
    $event = $statement->fetch(PDO::FETCH_ASSOC);
    
    if (!$event) {
        header('Location: events.php');
        exit;
    }
} else {
    header('Location: events.php');
    exit;
}
?>

<body>
    <?php require 'resources/views/components/nav.php';?>
    
    <section class="heading">
        <div class="wrapper">
            <div class="headingText">
                <h2><?= htmlspecialchars($event['title']) ?></h2>
            </div>
        </div>
    </section>
            
    <section class="wrapper section">
        <div class="show-page-content">
            <div class="show-page-image">
                <img src="public/img/events/<?= htmlspecialchars($event['img_file']) ?>" alt="<?= htmlspecialchars($event['title']) ?>">
            </div>
            <div class="show-page-info">
                <div class="show-page-meta">
                    <span class="event-date"><?= htmlspecialchars($event['date']) ?></span>
                </div>
                <div class="show-page-description">
                    <?= $event['description'] ?>
                </div>
                <div class="show-page-actions">
                    <a href="events.php" class="btn">Terug naar Events</a>
                </div>
            </div>
        </div>
    </section>

    <?php require 'resources/views/components/footer.php';?>
</body>
</html>

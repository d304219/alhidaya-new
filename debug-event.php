<?php
require_once 'config/conn.php';

echo "Database connection test:<br>";

try {
    $query = "SELECT * FROM events LIMIT 1";
    $statement = $conn->prepare($query);
    $statement->execute();
    $events = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    echo "Database connection successful!<br>";
    echo "Number of events found: " . count($events) . "<br>";
    
    if (count($events) > 0) {
        echo "First event ID: " . $events[0]['id'] . "<br>";
        echo "First event title: " . $events[0]['title'] . "<br>";
    }
    
} catch (Exception $e) {
    echo "Database error: " . $e->getMessage() . "<br>";
}

echo "<br>GET parameters: ";
print_r($_GET);

echo "<br><br>Try accessing: <a href='event-show.php?id=1'>event-show.php?id=1</a>";
?>

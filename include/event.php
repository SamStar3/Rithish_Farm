<?php 
include("config.php");

// Initialize the $events variable as an empty array
$events = [];

$selQuery = "SELECT * FROM `events`";
$res_event = mysqli_query($conn, $selQuery);

// Check for DB errors
if (!$res_event) {
    die("Query Failed: " . mysqli_error($conn));
}

// Fetch rows only if they exist
if (mysqli_num_rows($res_event) > 0) {
    while ($row = mysqli_fetch_assoc($res_event)) {
        $eventId = $row['id'];
        $events[$eventId] = [
            'name' => $row['name'],  
            'id'   => $row['id']
        ];
    }
}

?>

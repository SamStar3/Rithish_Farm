<?php
include("config.php");

    if(isset($_GET['id'])){
        $id = intval($_GET['id']);
        $queryView = " SELECT * FROM view_event_activities WHERE event_id = $id";
       
        $activities = mysqli_query($conn, $queryView); 

        // event name 

        $eventId = $_GET['id'] ?? $_GET['event_id'] ?? $_POST['event_id'] ?? null;

        if ($eventId) {
            $sql = "SELECT name FROM events WHERE id = $eventId";
            $result = mysqli_query($conn, $sql);
            $eventName = ($row = mysqli_fetch_assoc($result)) ? $row['name'] : 'Unknown Event';
        } else {
            $eventName = 'Unknown Event';
        }
    }
?>

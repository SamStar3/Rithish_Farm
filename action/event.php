<?php
include("../include/config.php");

// Add Event
if (isset($_POST['hdnAction']) && $_POST['hdnAction'] == 'addEvent') {
    $event_name = trim($_POST['event_name']);

    $check = mysqli_prepare($conn, "SELECT id FROM events WHERE name = ?");
    mysqli_stmt_bind_param($check, 's', $event_name);
    mysqli_stmt_execute($check);
    $result = mysqli_stmt_get_result($check);

    if (mysqli_num_rows($result) > 0) {
        echo json_encode(['status' => 'error', 'message' => 'Event already exists.']);
        exit;
    }

    $insert = mysqli_prepare($conn, "INSERT INTO events (name, created_at, status) VALUES (?, NOW(), 'Active')");
    mysqli_stmt_bind_param($insert, 's', $event_name);

    if (mysqli_stmt_execute($insert)) {
        echo json_encode(['status' => 'success', 'message' => 'Event added successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to add event.']);
    }
    exit;
}

// Get all events
if (isset($_POST['action']) && $_POST['action'] == 'getEvents') {
    $events = [];
    $res = mysqli_query($conn, "SELECT id, name, created_at, status FROM events");

    while ($row = mysqli_fetch_assoc($res)) {
        $events[] = $row;
    }
    echo json_encode($events);
    exit;
}

// Fetch single event for edit
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['fetch_id'])) {
    $response = ['status' => 'error', 'data' => null];

    $id = intval($_POST['fetch_id']);
    $query = "SELECT id, name, description FROM events WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        $response['status'] = 'success';
        $response['data'] = $row;
    }

    echo json_encode($response);
    exit;
}

// Fetch single event (alternative)
if (isset($_POST['event_id']) && isset($_POST['action']) && $_POST['action'] == 'fetchEvent') {
    $event_id = intval($_POST['event_id']);
    $sql = "SELECT name FROM events WHERE id = $event_id";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo json_encode(['event_name' => $row['name']]);
    } else {
        echo json_encode(["error" => "Event not found"]);
    }
    exit;
}

// Update event
if (isset($_POST['event_id']) && isset($_POST['hdnAction']) && $_POST['hdnAction'] == 'updateEvent') {
    $event_id = intval($_POST['event_id']);
    $event_name = mysqli_real_escape_string($conn, $_POST['event_name']);
    $sql = "UPDATE events SET name = '$event_name' WHERE id = $event_id";

    if (mysqli_query($conn, $sql)) {
        echo "success";
    } else {
        echo "error";
    }
    exit;
}

// Delete event
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['hdnAction']) && $_POST['hdnAction'] === 'delete_event') {
    $event_id = intval($_POST['event_id']);
    $query = "DELETE FROM events WHERE id = $event_id";

    if (mysqli_query($conn, $query)) {
        echo "success";
    } else {
        echo "error: " . mysqli_error($conn);
    }
    exit;
}
?>

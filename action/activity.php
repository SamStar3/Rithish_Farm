<?php
include("../include/config.php");

// ADD ACTIVITY
if (isset($_POST['hdnAction']) && $_POST['hdnAction'] === 'addActivity') {
    $event_id = $_POST['event_id'];
    $activity_name = trim($_POST['activity_name']);
    $activity_description = trim($_POST['activity_description']);

    // Insert into activities table
    $stmt = $conn->prepare("INSERT INTO activities (name, description, created_at, status) VALUES (?, ?, NOW(), 1)");
    $stmt->bind_param("ss", $activity_name, $activity_description);

    if ($stmt->execute()) {
        $activity_id = $stmt->insert_id; // Get the newly inserted activity ID

        // Insert into event_activities table
        $stmt2 = $conn->prepare("INSERT INTO event_activities (event_id, activities_id, created_at, status) VALUES (?, ?, NOW(), 1)");
        $stmt2->bind_param("ii", $event_id, $activity_id);

        if ($stmt2->execute()) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to link activity to event']);
        }
        $stmt2->close();
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to insert activity']);
    }
    $stmt->close();
    exit;
}

// ✅ FETCH SINGLE TOPIC (AJAX for Edit Modal) - NO NEED PROCEDURE
$response = ['status' => 'error', 'data' => null];
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['fetch_id'])) {
    $id = intval($_POST['fetch_id']);
    $query = "SELECT id, name, description FROM activities WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn, $query);
    if ($row = mysqli_fetch_assoc($result)) {
        $response['status'] = 'success';
        $response['data'] = $row;
    }
    echo json_encode($response);
    exit;
}

// Fetch activity data
if (isset($_POST['activity_id']) && isset($_POST['action']) && $_POST['action'] == 'fetchActivity') {
    $activity_id = intval($_POST['activity_id']); // safer

    $sql = "SELECT name, description FROM activities WHERE id = $activity_id";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo json_encode([
            'activity_name' => $row['name'],
            'description' => $row['description']
        ]);
    } else {
        echo json_encode(["error" => "Activity not found"]);
    }
}

// Update activity
if (isset($_POST['activity_id']) && isset($_POST['hdnAction']) && $_POST['hdnAction'] == 'updateActivity') {
    $activity_id = intval($_POST['activity_id']);
    $activity_name = mysqli_real_escape_string($conn, $_POST['activity_name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    $sql = "UPDATE activities SET name = '$activity_name', description = '$description' WHERE id = $activity_id";

    if (mysqli_query($conn, $sql)) {
        echo "success";
    } else {
        echo "error";
    }
}

// DELETE ACTIVITY
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['hdnAction']) && $_POST['hdnAction'] === 'delete_activity') {
    $activityId = $_POST['activity_id'];

    // Check if activity ID is valid
    if (empty($activityId) || !is_numeric($activityId)) {
        echo "error: Invalid Activity ID";
        exit;
    }

    // Start deleting from event_activities
    $stmt1 = $conn->prepare("DELETE FROM event_activities WHERE activities_id = ?");
    if (!$stmt1) {
        echo "error: Prepare failed for event_activities - " . $conn->error;
        exit;
    }

    $stmt1->bind_param("i", $activityId);
    if ($stmt1->execute()) {

        // Now delete from activities
        $stmt2 = $conn->prepare("DELETE FROM activities WHERE id = ?");
        if (!$stmt2) {
            echo "error: Prepare failed for activities - " . $conn->error;
            exit;
        }

        $stmt2->bind_param("i", $activityId);
        if ($stmt2->execute()) {
            echo "success";
        } else {
            echo "error: Execute failed for activities - " . $stmt2->error;
        }
        $stmt2->close();
    } else {
        echo "error: Execute failed for event_activities - " . $stmt1->error;
    }
    $stmt1->close();
    exit;
}

?>

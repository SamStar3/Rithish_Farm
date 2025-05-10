<?php
include("../include/config.php");


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'] ?? '';
    $id = $_POST['id'] ?? '';
    $name = $_POST['name'] ?? '';
    $description = $_POST['description'] ?? '';
    $amount = $_POST['amount'] ?? '';

    if ($action == 'fetch' && $id != '') {
        $result = mysqli_query($conn, "SELECT * FROM games WHERE id='$id'");
        echo json_encode(mysqli_fetch_assoc($result));
        exit;
    }

    if ($action == 'delete' && $id != '') {
        mysqli_query($conn, "DELETE FROM games WHERE id='$id'");
        echo "Game deleted successfully";
        exit;
    }

    if ($id != '') {
        // Update
        $query = "UPDATE games SET name='$name', description='$description', amount='$amount' WHERE id='$id'";
        mysqli_query($conn, $query);
        echo "Game updated successfully";
    } else {
        // Insert
        $query = "INSERT INTO games (name, description, amount) VALUES ('$name', '$description', '$amount')";
        mysqli_query($conn, $query);
        echo "Game added successfully";
    }
}
?>



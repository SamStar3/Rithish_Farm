<?php
include("../include/config.php");

// Total Events
$result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM events WHERE status = 1");
$row = mysqli_fetch_assoc($result);
$totalEvents = $row['total'];

// Total Games
$result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM games WHERE status = 1");
$row = mysqli_fetch_assoc($result);
$totalGames = $row['total'];

// Total Visitors
$result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM visitor WHERE 1");
$row = mysqli_fetch_assoc($result);
$totalVisitors = $row['total'];

// Total Colleges
$result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM visitor WHERE visitor_type_id = 2"); // update type_id if needed
$row = mysqli_fetch_assoc($result);
$totalColleges = $row['total'];

// Total Schools
$result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM visitor WHERE visitor_type_id = 1"); // update type_id if needed
$row = mysqli_fetch_assoc($result);
$totalSchools = $row['total'];

// Total Corporate Companies
$result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM visitor WHERE visitor_type_id = 3"); // update type_id if needed
$row = mysqli_fetch_assoc($result);
$totalCompanies = $row['total'];

// Total Echo Tourists
$result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM visitor WHERE visitor_type_id = 4"); // update type_id if needed
$row = mysqli_fetch_assoc($result);
$totalEchoTourists = $row['total'];

// Total Monthly Income
$result = mysqli_query($conn, "SELECT SUM(paid_amount) AS total FROM payment WHERE MONTH(created_at) = MONTH(CURDATE()) AND YEAR(created_at) = YEAR(CURDATE())");
$row = mysqli_fetch_assoc($result);
$totalIncome = $row['total'] ?? 0; // If null, default to 0
?>

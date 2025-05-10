<?php

include("config.php");

$result = mysqli_query($conn, "SELECT * FROM dashboard_summary");
$data = mysqli_fetch_assoc($result);

$totalEvents = $data['total_events'];
$totalGames = $data['total_games'];
$totalVisitors = $data['total_visitors'];
$totalColleges = $data['total_colleges'];
$totalSchools = $data['total_schools'];
$totalCorporates = $data['total_corporates'];
$totalEcoTourists = $data['total_eco_tourists'];
$totalIncomeMonth = $data['total_income_month'];

?>
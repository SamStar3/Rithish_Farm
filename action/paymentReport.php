<?php
include("../include/config.php");

$visitorname = $_POST['visitorname'] ?? '';
$payment_date = $_POST['payment_date'] ?? '';
$visitortype = $_POST['visitortype'] ?? '';

// Build dynamic query
$query = "SELECT visitor_name, payment_date, visitor_type, amount FROM payment WHERE 1=1";

if (!empty($visitorname)) {
    $visitorname = mysqli_real_escape_string($conn, $visitorname);
    $query .= " AND visitor_name = '$visitorname'";
}

if (!empty($payment_date)) {
    $payment_date = mysqli_real_escape_string($conn, $payment_date);
    $query .= " AND DATE(payment_date) = '$payment_date'";
}

if (!empty($visitortype)) {
    $visitortype = mysqli_real_escape_string($conn, $visitortype);
    $query .= " AND visitor_type = '$visitortype'";
}

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
            <td>" . htmlspecialchars($row['visitor_name']) . "</td>
            <td>" . htmlspecialchars($row['payment_date']) . "</td>
            <td>" . htmlspecialchars($row['visitor_type']) . "</td>
            <td>" . htmlspecialchars($row['amount']) . "</td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='4' class='text-center'>No records found</td></tr>";
}
// 1) Grab & sanitize inputs
// $visitorname   = isset($_POST['visitorname'])   ? trim($_POST['visitorname'])   : '';
// $visitortype   = isset($_POST['visitortype'])   ? trim($_POST['visitortype'])   : '';
// $payment_date  = isset($_POST['payment_date'])  ? trim($_POST['payment_date'])  : '';

// 2) Start your base query
// $sql = "SELECT * 
//         FROM view_participant_info
//         WHERE 1=1";   // makes appending "AND ..." easier

// 3) Add filters only if they’re non-empty
// if ($visitorname !== '') {
//     $vn = mysqli_real_escape_string($conn, $visitorname);
//     $sql .= " AND visitor_name LIKE '%{$vn}%'";
// }

// if ($visitortype !== '') {
//     $vt = mysqli_real_escape_string($conn, $visitortype);
//     $sql .= " AND visitor_type = '{$vt}'";
// }

// if ($payment_date !== '') {
    // assume incoming date is YYYY-MM-DD; adjust format checks as you need
//     $pd = mysqli_real_escape_string($conn, $payment_date);
//     $sql .= " AND DATE(payment_date) = '{$pd}'";
// }

// 4) Execute
// $result = mysqli_query($conn, $sql);

// 5) Render rows (or “no data” message)
// if ($result && mysqli_num_rows($result) > 0) {
//     $i = 1;
//     while ($row = mysqli_fetch_assoc($result)) {
        // Note: change colspan in the “no data” cell if you have 8 columns now
//         echo "<tr>
//                 <td>{$i}</td>
//                 <td>{$row['visitor_name']}</td>
//                 <td>{$row['visitor_type']}</td>
//                 <td>{$row['events_name']}</td>
//                 <td>{$row['activities_name']}</td>
//                 <td>{$row['received_by']}</td>
//                 <td>₹" . number_format($row['paid_amount'], 2) . "</td>
//                 <td>" . date('d-m-Y', strtotime($row['payment_date'])) . "</td>
//               </tr>";
//         $i++;
//     }
// } else {
//     echo "<tr><td colspan='8' class='text-center'>No payment records found.</td></tr>";
// }

?>



<?php
    session_start();
    include("include/paymentReport.php"); 
?>
<!doctype html>
<html lang="en">
<?php include("include/head.php"); ?>

<body>
    <div class="wrapper">
        <?php include("include/top.php"); ?>
        <?php include("include/left.php"); ?>

        <div class="page-wrapper">
            <div class="page-content">

                <!-- Title Section -->
                <div class="page-title-box">
                    <h2 class="page-title">Payment Report</h2>
                </div>

              
<!-- Filter Section -->
<div class="card">
    <div class="card-body">
        <div class="container-fluid py-4">
            <div class="card shadow-sm p-4">
                <div class="row g-3">

                    <div class="col-md-3 col-12">
                        <label for="reportPaymentDate" class="form-label">Payment Date</label>
                        <input type="date" id="reportPaymentDate" class="form-control" />
                    </div>

                    <div class="col-md-3 col-12">
                        <label for="visitortype" class="form-label">Visitor Type</label>
                        <select id="visitortype" class="form-select">
                            <option value="">-- Select Visitor Type --</option>
                            <?php
                            $result = mysqli_query($conn, "SELECT name FROM visitor_type");
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . htmlspecialchars($row['name']) . '">' . htmlspecialchars($row['name']) . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col-md-3 col-12">
                        <label for="visitorname" class="form-label">Visitor Name</label>
                        <select id="visitorname" class="form-select">
                            <option value="">-- Select Visitor Name --</option>
                            <?php
                            $result = mysqli_query($conn, "SELECT name FROM visitor");
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<option value="' . htmlspecialchars($row['name']) . '">' . htmlspecialchars($row['name']) . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col-md-3 col-12 d-flex align-items-end ms-auto">
                        <div class="w-100 d-flex justify-content-end gap-2">
                            <button id="filterBtn" class="btn btn-primary">Filter</button>
                            <button id="clearBtn" class="btn btn-secondary">Clear</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


                <!-- Table Section -->
                <div class="table-responsive">
                    <table id="addPaymentTable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Event Name</th>
                                <th>Activities</th>
                                <th>Received By</th>
                                <th>Amount</th>
                                <th>Payment Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                             // Assuming you have a database connection $conn already established
                             
                             $query = "SELECT * FROM view_participant_info";
                             $resPayment = mysqli_query($conn, $query);
                             
                             if (mysqli_num_rows($resPayment) > 0):
                                 $i = 1;
                                 while ($row = mysqli_fetch_assoc($resPayment)):
                             ?>
                                 <tr>
                                     <td><?php echo $i++; ?></td>
                                     <td><?php echo $row['visitor_name']; ?></td>
                                     <td><?php echo $row['visitor_type']; ?></td>
                                     <td><?php echo $row['event_name']; ?></td>
                                     <td><?php echo $row['activity_name']; ?></td>
                                     <td><?php echo $row['received_by']; ?></td>
                                     <td>₹<?php echo number_format($row['paid_amount'], 2); ?></td>
                                     <td><?php echo date('d-m-Y', strtotime($row['from_date'])); ?></td>
                                 </tr>
                             <?php endwhile; ?>
                             <?php else: ?>
                                 <tr><td colspan="6">No payment records found.</td></tr>
                             <?php endif; ?>

                        </tbody>
                    </table>
                </div>
            </div> <!-- page-content -->
            <?php include("include/footer.php"); ?>
        </div> <!-- page-wrapper -->
    </div> <!-- wrapper -->

    <!-- Scripts -->
    <script src="js_functions/paymentReport.js" type="text/javascript"></script>
    
</body>
</html>

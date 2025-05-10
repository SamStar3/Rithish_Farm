<?php
    session_start();
    include("include/activity.php"); 
?>

<!doctype html>
<html lang="en">
<?php include("include/head.php"); ?>
<body>
<div class="wrapper">
    <?php include("include/left.php"); ?>
    <?php include("include/top.php"); ?>
    <div class="page-wrapper">
        <div class="page-content" id="activity-content">
            <?php
                  include("include/activity.php"); 
              ?>                
                <h2 id="h4subId">Activity : <?= htmlspecialchars($eventName); ?></h2>

            <br>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <button type="button" class="btn btn-success" onclick="location.href='event.php'"><i class='bx bx-arrow-back'></i></button>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addActivityModal">Add Activity</button>
                </div>

                <div class="row" id="activityCards">
                        <?php
                        if (!empty($activities)) {
                            foreach ($activities as $row) {
                        ?>
                            <div class="col-md-4 mb-4">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo htmlspecialchars($row['activity_name']); ?></h5>
                                        <p class="card-text"><?php echo htmlspecialchars($row['activity_description']); ?></p>
                                        <div class="d-flex justify-content-between">
                                            <button class="coustome_btn text-success btn-sm" title="Edit" onclick="goEditActivity(<?php echo $row['activity_id']; ?>)">
                                                <i class="fas fa-pencil-alt"></i> 
                                            </button>
                                            <button class="coustome_btn text-danger btn-sm delete-activity" data-id="<?php echo $row['activity_id']; ?>" title="Delete">
                                                <i class="fas fa-trash-alt"></i> 
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                            }
                        } else {
                        ?>
                        <div class="col-12 text-center">
                                <p>No activities found for this event</p>
                            </div>
                        <?php } ?>
                    </div>
        </div> 
    </div>
    <?php include("include/footer.php"); ?>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="js_functions/activity.js" type="text/javascript"></script>
<?php include("modal/activity.php"); ?>

</body>
</html>

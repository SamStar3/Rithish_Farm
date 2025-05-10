<?php
    session_start();
    include("include/event.php"); 
?>

<!doctype html>
<html lang="en">
<?php include("include/head.php");?>
<body>
  <div class="wrapper">
    <?php include("include/left.php");?>
    <?php include("include/top.php");?>

    <div class="page-wrapper">
      <div class="page-content" id="event-content">
        <div class="page-title-box">
          <div class="page-title-right">
            <h2 class="page-title">Events</h2>
          </div>
        </div>

        <!-- Add Event Button -->
        <div class="d-flex justify-content-end mb-3">
          <button type="button"
                  class="btn btn-success"
                  id="btnAddEvent"
                  data-bs-toggle="modal"
                  data-bs-target="#addEventModal">
            Add Event
          </button>
        </div>

        <div class="row">
          <?php if (!empty($events)): ?>
            <?php foreach ($events as $eventId => $event): ?>
              <div class="col-md-6 mb-4">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($event['name']) ?></h5>
                    <button class="coustome_btn text-success" data-bs-toggle="tooltip" data-bs-placement="top" title="View" 
                            onclick="window.location.href='activity.php?id=<?php echo $event['id']; ?>';">
                            <i class="lni lni-eye"></i></i> 
                    </button>
                    <button type="button" class="coustome_btn text-warning" onclick="goEditEvent(<?= $event['id']; ?>);" data-bs-toggle="modal" data-bs-target="#editEventModal">
                            <i class="lni lni-pencil"></i>
                    </button>
                    <button type="button" class="coustome_btn text-danger delete-event" data-id="<?= $event['id']; ?>">
                            <i class="lni lni-trash"></i>
                    </button>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <div class="col-12">
              <div class="alert alert-info text-center">
                No events found.
              </div>
            </div>
          <?php endif; ?>
        </div>
      </div>

      <?php include("modal/event.php");?>
    </div>

    <?php include("include/footer.php");?>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="js_functions/event.js" type="text/javascript"></script>
</body>
</html>
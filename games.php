<?php
    session_start();
    include("include/games.php"); 
?>

<!doctype html>
<html lang="en">

<?php include("include/head.php");?>

<body>
<div class="wrapper">
    <?php include("include/left.php");?>
    <?php include("include/top.php");?>
	<div class="page-wrapper">
        <div class="page-content">
            <div class="page-title-box">
                <div class="page-title-right">
                    <h2 class="page-title">Games</h2>
                </div>
            </div>
            <div class="d-flex justify-content-end mb-3">
            <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Add Games
                </button>
            </div>

             <div class="row" id="activityCards">
             <?php
                     if (mysqli_num_rows($rescourse) > 0) {
                         $sno = 1; 
                     while ($row = mysqli_fetch_assoc($rescourse)) {
                 ?>
                            <div class="col-md-4 mb-4">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $row['name']; ?></h5>
                                        <p class="card-text"><?php echo $row['description']; ?></p>
                                        <p class="card-text"><?php echo $row['amount']; ?></p>
                                        <div class="d-flex justify-content-between">
                                        <button type="button" class="coustome_btn text-success edit-game" data-id="<?php echo $row['id']; ?>">
                                            <i class="lni lni-pencil"></i>
                                        </button>
                                        <button type="button" class="coustome_btn text-danger delete-game" data-id="<?php echo $row['id']; ?>">
                                            <i class="lni lni-trash"></i>
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
    </div>
</div>
<div class="overlay toggle-icon"></div>
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    <footer class="page-footer">
        <p class="mb-0">Copyright © 2024. All right reserved.</p>
    </footer>
</div>
<?php include("modal/games.php");?>
<script src="js_functions/games.js" type="text/javascript"></script>
</body>
</html>

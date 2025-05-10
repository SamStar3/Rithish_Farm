<?php
    session_start();
    include("include/index.php"); 
?>

<!doctype html>
<html lang="en">	
	<?php include("include/head.php"); ?>
<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
			<?php include "include/left.php";?>
		<!--end sidebar wrapper -->
		<!--start header -->
			<?php include "include/top.php";?>
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">


			<div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">				
	<div class="col">
		<div class="card radius-10">
			<div class="card-body">
				<div class="d-flex align-items-center">
					<div>
						<p class="mb-0 text-secondary">Total Events</p>
						<h4 class="my-1"><?= $totalEvents ?></h4>
						</div>
					<div class="widgets-icons bg-light-success text-success ms-auto"><i class="bx bxs-user"></i></div>
				</div>
			</div>
		</div>
	</div>	

	<div class="col">
		<div class="card radius-10">
		    <a href="trainee.php">
			<div class="card-body">
				<div class="d-flex align-items-center">
					<div>
						<p class="mb-0 text-secondary">Total Games</p>
						<h4 class="my-1"><?= $totalGames ?></h4>
					</div>
					<div class="widgets-icons bg-light-success text-success ms-auto"><i class="bx bxs-user"></i></div>
				</div>
			</div>
			</a>
		</div>
	</div>

	<div class="col">
		<div class="card radius-10">
		    <a href="course.php">
			<div class="card-body">
				<div class="d-flex align-items-center">
					<div>
						<p class="mb-0 text-secondary">Total Visitors</p>
						<h4 class="my-1"><?= $totalVisitors ?></h4>
					</div>
					<div class="widgets-icons bg-light-success text-success ms-auto"><i class="lni lni-book me-2"></i></div>
				</div>
			</div>
			</a>
		</div>
	</div>	

	<div class="col">
		<div class="card radius-10">
		    <a href="trainee.php">
			<div class="card-body">
				<div class="d-flex align-items-center">
					<div>
						<p class="mb-0 text-secondary">Total Colleges</p>
						<h4 class="my-1"><?= $totalColleges ?></h4>
					</div>
					<div class="widgets-icons bg-light-success text-success ms-auto"><i class="bx bxs-user"></i></div>
				</div>
			</div>
			</a>
		</div>
	</div>

	<div class="col">
		<div class="card radius-10">
		    <a href="trainee.php">
			<div class="card-body">
				<div class="d-flex align-items-center">
					<div>
						<p class="mb-0 text-secondary">Total Schools</p>
						<h4 class="my-1"><?= $totalSchools ?></h4>
					</div>
					<div class="widgets-icons bg-light-success text-success ms-auto"><i class="bx bxs-user"></i></div>
				</div>
			</div>
			</a>
		</div>
	</div>

	<div class="col">
		<div class="card radius-10">
		    <a href="trainee.php">
			<div class="card-body">
				<div class="d-flex align-items-center">
					<div>
						<p class="mb-0 text-secondary">Total Co.Companies</p>
						<h4 class="my-1"><?= $totalCorporates ?></h4>
					</div>
					<div class="widgets-icons bg-light-success text-success ms-auto"><i class="bx bxs-user"></i></div>
				</div>
			</div>
			</a>
		</div>
	</div>

	<div class="col">
		<div class="card radius-10">
		    <a href="trainee.php">
			<div class="card-body">
				<div class="d-flex align-items-center">
					<div>
						<p class="mb-0 text-secondary">Total Echo Tourist</p>
						<h4 class="my-1"><?= $totalEcoTourists ?></h4>
					</div>
					<div class="widgets-icons bg-light-success text-success ms-auto"><i class="bx bxs-user"></i></div>
				</div>
			</div>
			</a>
		</div>
	</div>

	<div class="col">
		<div class="card radius-10">
		    <a href="traineePayment.php">
			<div class="card-body">
				<div class="d-flex align-items-center">
					<div>
						<p class="mb-0 text-secondary">Total Income in this Month</p>
						<h4 class="my-1">₹ <?= number_format($totalIncomeMonth, 2) ?></h4>
					</div>
					<div class="widgets-icons bg-light-success text-success ms-auto font-35"><i class='bx bxl-shopify'></i></div>
				</div>
			</div>
			</a>
		</div>
	</div>	
</div>


			</div>
				<!--end row-->		
		
		<!--end page wrapper -->
		<!--start overlay-->

		 <?php include "include/footer.php"; ?>
	</div>
	<!--end wrapper-->




	<!--start switcher-->
	
	<!--end switcher-->
	<!-- Bootstrap JS -->
	<script src="<?php echo $bootsrapBundle; ?>"></script>
	<!--plugins-->
	<script src="<?php echo $js; ?>"></script>
	<script src="<?php echo $simplebar;?>"></script>
	<script src="<?php echo $mentimenu; ?>"></script>
	<script src="<?php echo $perfectScrolbar;  ?>"></script>
	<script src="<?php echo $charts;  ?>"></script>
	<script src="<?php echo $datatableMin; ?>"></script>
	<script src="<?php echo $datatbaleBootstrap;?>"></script>
	
	<script src="<?php echo $index;?>"></script>
	<!--app JS-->
	<script src="<?php echo $app; ?>"></script>
</body>

</html>

<?php include('inc/header.php') ?>


				<!-- Page header start -->
				<div class="page-header">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">Home</li>
						<li class="breadcrumb-item active">Dashboard</li>
					</ol>

					<ul class="app-actions">
						<li>
							<a href="#" id="reportrange">
								<span class="range-text"></span>
								<i class="icon-chevron-down"></i>	
							</a>
						</li>
						<li>
							<a href="#">
								<i class="icon-export"></i>
							</a>
						</li>
					</ul>
				</div>
				<!-- Page header end -->
				
				<!-- Main container start -->
				<div class="main-container">
				<div class="row gutters">
						<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
							<div class="info-stats4">
								<div class="info-icon">
									<i class="icon-users"></i>
								</div>
								<div class="sale-num">
									<h3><?php echo number_format(count($data['users'],2)); ?></h3>
									<p>Users</p>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
							<div class="info-stats4">
								<div class="info-icon">
									<i class="icon-user"></i>
								</div>
								<div class="sale-num">
									<h3><?php echo number_format(count($data['customers'],2)); ?></h3>
									<p>Customers</p>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
							<div class="info-stats4">
								<div class="info-icon">
									<i class="icon-border_color"></i>
								</div>
								<div class="sale-num">
									<h3><?php echo number_format(count($data['bookings'],2)); ?></h3>
									<p>Booking</p>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
							<div class="info-stats4">
								<div class="info-icon">
									<i class="icon-local_taxi"></i>
								</div>
								<div class="sale-num">
									<h3><?php echo number_format(count($data['buses'],2)); ?></h3>
									<p>Buses</p>
								</div>
							</div>
						</div>
					</div>

				</div>
				<!-- Main container end -->
			<!-- Page content end -->

	<?php include('inc/footer.php') ?>
</html>
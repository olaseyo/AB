<?php if(!isset($_SESSION['id'])){
//header('location:'.BASE_URL);
}
?>
<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Meta -->
		<meta name="description" content=">
		<meta name="author" content="ParkerThemes">
		<link rel="shortcut icon" href="img/fav.png" />

		<!-- Title -->
		<title>Booking</title>


		<!-- *************
			************ Common Css Files *************
		************ -->
		<!-- Bootstrap css -->
		<link rel="stylesheet" href="<?php echo ASSET ?>/assets/css/bootstrap.min.css">
		<!-- Icomoon Font Icons css -->
		<link rel="stylesheet" href="<?php echo ASSET ?>/assets/fonts/style.css">
		<!-- Main css -->
		<link rel="stylesheet" href="<?php echo ASSET ?>/assets/css/main.css">


		<!-- *************
			************ Vendor Css Files *************
		************ -->
		<!-- DateRange css -->
		<link rel="stylesheet" href="<?php echo ASSET ?>/assets/vendor/daterange/daterange.css" />

	</head>
    <body>
	<!-- Loading starts -->
		<div id="loading-wrapper">
			<div class="spinner-border" role="status">
				<span class="sr-only">Loading...</span>
			</div>
		</div>
		<!-- Loading ends -->


		<!-- Page wrapper start -->
		<div class="page-wrapper">
			
			<!-- Sidebar wrapper start -->
			<nav id="sidebar" class="sidebar-wrapper">
				
				<!-- Sidebar brand start  -->
				<div class="sidebar-brand">
					<a href="#" class="logo" style="color:#fff;">
						<h2>A&D</h2>
					</a>
				</div>
				<!-- Sidebar brand end  -->

				<!-- Sidebar content start -->
				<div class="sidebar-content">

				<?php include('nav.php'); ?>

				</div>
				<!-- Sidebar content end -->
				
			</nav>
			<!-- Sidebar wrapper end -->


			<!-- Page content start  -->
			<div class="page-content">

				<!-- Header start -->
				<header class="header">
					<div class="toggle-btns">
						<a id="toggle-sidebar" href="#">
							<i class="icon-list"></i>
						</a>
						<a id="pin-sidebar" href="#">
							<i class="icon-list"></i>
						</a>
					</div>
					<div class="header-items">
					
						<!-- Header actions start -->
						<ul class="header-actions">
							<li class="dropdown">
								<a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
									<span class="user-name"><?php echo $_SESSION['username'] ?></span>
									<span class="avatar">
									</span>
								</a>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userSettings">
									<div class="header-profile-actions">
										<div class="header-user-profile">
											
											<h5><?php echo $_SESSION['username'] ?></h5>
											<p>Admin</p>
										</div>
										<a href="<?php echo BASE_URL ?>"><i class="icon-log-out1"></i> Sign Out</a>
									</div>
								</div>
							</li>
						</ul>						
						<!-- Header actions end -->
					</div>
				</header>
				<!-- Header end -->


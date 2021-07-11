
<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Meta -->
		<meta name="description" content="Responsive Bootstrap4 Dashboard Template">
		<meta name="author" content="ParkerThemes">
		<link rel="shortcut icon" href="img/fav.png" />

		<!-- Title -->
		<title>A&D</title>
		
		<!-- *************
			************ Common Css Files *************
		************ -->
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="<?php echo ASSET ?>/assets/css/bootstrap.min.css" />

		<!-- Master CSS -->
		<link rel="stylesheet" href="<?php echo ASSET ?>/assets/css/main.css" />

	</head>

	<body class="authentication">

		<!-- Container start -->
		<div class="container">
			
			<form action="<?php echo BASE_URL?>/Auth/login" method="POST">
				<div class="row justify-content-md-center">
					<div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
						<div class="login-screen">
							<div class="login-box"><h3> A&D Booking Console</h3>
								<h5>Welcome back,<br />Please Login to your Account.</h5>
								<?php if(isset($data['error'])){?>
								<div class="alert alert-danger"><?php echo $data['error']; ?></div>
								<?php } ?>
								<div class="form-group">
									<input type="text" name="username" class="form-control" placeholder="Username" />
								</div>
								<div class="form-group">
									<input type="password" name="password" class="form-control" placeholder="Password" />
								</div>
								<div class="actions mb-4">
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="remember_pwd">
										<label class="custom-control-label" for="remember_pwd">Remember me</label>
									</div>
									<button type="submit" name="login_btn" class="btn btn-primary ">Login</button>
								</div>
								<hr>
							</div>
						</div>
					</div>
				</div>
			</form>

		</div>
		<!-- Container end -->

	</body>
</html>
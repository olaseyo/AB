<?php include(__DIR__.'../../inc/header.php') ?>

<!-- Page header start -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Edit System Users</li>
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
<!-- Row start -->
<div class="row gutters">
                        <div class="col-xl-3 col-lg-3 col-md-3"></div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Edit User</div>

                                    <?php include(__DIR__.'../../inc/alert.php') ?>
								</div>
								<div class="card-body">
                                <form action="<?php echo BASE_URL?>/Driver/update" method="POST" id="form_category">
									<div class="form-group">
										<label for="exampleFormControlTextarea1">FullName</label>
										<input name="fullname" value="<?php echo isset($data['data']['fullname'])? $data['data']['fullname']:""; ?>" class="form-control" id="exampleFormControlTextarea1" >
									</div>
                         
                                    <div class="form-group">
										<label for="exampleFormControlTextarea1">Contact</label>
										<input name="contact" value="<?php echo isset($data['data']['contact'])? $data['data']['contact']:""; ?>" class="form-control" id="exampleFormControlTextarea1" >
									</div>

                                   
										<input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>" >
                                        <input type="hidden" name="id" value="<?php echo $data['data']['id'] ?>" >
                                    <button  type="submit" class="btn btn-success btn-block btn-rounded">Submit</button>

								</form>      
								</div>
							</div>
							</div>
						</div>
                        <div class="col-xl-3 col-lg-3 col-md-3"></div>


</div>
<!-- Main container end -->
<!-- Page content end -->

<?php include(__DIR__.'../../inc/footer.php') ?>
</html>
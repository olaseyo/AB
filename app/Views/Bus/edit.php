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
									<div class="card-title">Edit Bus</div>

                                    <?php include(__DIR__.'../../inc/alert.php') ?>
								</div>
								<div class="card-body">
                                <form action="<?php echo BASE_URL?>/Bus/update" method="POST" id="form_category">
									<div class="form-group">
										<label for="exampleFormControlTextarea1">Name</label>
										<input name="name" value="<?php echo isset($data['data']['name'])? $data['data']['name']:""; ?>" class="form-control" id="exampleFormControlTextarea1" >
									</div>
                         
                                    <div class="form-group">
										<label for="exampleFormControlTextarea1">Class</label>
										<input name="class" value="<?php echo isset($data['data']['class'])? $data['data']['class']:""; ?>" class="form-control" id="exampleFormControlTextarea1" >
									</div>

                                    <div class="form-group">
										<label for="exampleFormControlTextarea1">Reg No</label>
										<input name="reg_no" value="<?php echo isset($data['data']['reg_no'])? $data['data']['reg_no']:""; ?>" class="form-control" id="exampleFormControlTextarea1" >
									</div>

                                    <div class="form-group">
										<label for="exampleFormControlTextarea1">Total Seat</label>
										<input name="total_seat" value="<?php echo isset($data['data']['total_seat'])? $data['data']['total_seat']:""; ?>" class="form-control" id="exampleFormControlTextarea1" >
									</div>

                                   
										<input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>" >
                                        <input type="hidden" name="id" value="<?php echo isset($data['data']['id'])? $data['data']['id']:""; ?>" >
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
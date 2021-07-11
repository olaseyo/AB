<?php include(__DIR__.'../../inc/header.php') ?>

<!-- Page header start -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Add System Users</li>
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
									<div class="card-title">Create User</div>

                                    <?php include(__DIR__.'../../inc/alert.php') ?>
								</div>
								<div class="card-body">
                                    <form action="<?php echo BASE_URL?>/user/store" method="POST" id="form_category">
									<div class="form-group">
										<label for="exampleFormControlTextarea1">Username</label>
										<input name="username" value="<?php echo isset($data['data']['username'])? $data['data']['username']:""; ?>" class="form-control" id="exampleFormControlTextarea1" >
									</div>
                                    <div class="form-group">
										<label for="exampleFormControlTextarea1">Fullname</label>
										<input name="fullname" value="<?php echo isset($data['data']['fullname'])? $data['data']['fullname']:""; ?>" class="form-control" id="exampleFormControlTextarea1" >
									</div>

                                    <div class="form-group">
										<label for="exampleFormControlTextarea1">Email</label>
										<input name="email" value="<?php echo isset($data['data']['email'])? $data['data']['email']:""; ?>" class="form-control" id="exampleFormControlTextarea1" >
									</div>
                                    <div class="form-group">
										<label for="exampleFormControlTextarea1">Contact</label>
										<input name="contact" value="<?php echo isset($data['data']['contact'])? $data['data']['contact']:""; ?>" class="form-control" id="exampleFormControlTextarea1" >
									</div>

                                    <div class="form-group">
										<label for="exampleFormControlTextarea1">Status</label>
										<select name="status" class="form-control" id="exampleFormControlTextarea1" >
                                        <option value="Active">Active</option>  
                                        <option value="InActive">InActive</option>    
                                    </select>
                                    <div class="form-group">
										<label for="exampleFormControlTextarea1">Is Admin</label>
										<select name="is_admin" class="form-control" id="exampleFormControlTextarea1" >
                                        <option value="0">No</option>  
                                        <option value="1">Yes</option>    
                                    </select>
									</div>

                                    <div class="form-group">
										<label for="exampleFormControlTextarea1">Password</label>
										<input name="password" type="password" value="<?php echo isset($data['data']['password'])? $data['data']['password']:""; ?>" class="form-control" id="exampleFormControlTextarea1" >
									</div>
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
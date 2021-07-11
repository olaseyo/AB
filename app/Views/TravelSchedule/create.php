<?php include(__DIR__.'../../inc/header.php') ?>

<!-- Page header start -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Add Schedule</li>
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
									<div class="card-title">Create Schedule</div>

                                    <?php include(__DIR__.'../../inc/alert.php') ?>
								</div>
								<div class="card-body">
                                    <form action="<?php echo BASE_URL?>/TravelSchedule/store" method="POST" id="form_category">
                                    <div class="form-group">
										<label for="exampleFormControlTextarea1">Select Driver</label>
										<select name="driver_id" class="form-control" id="exampleFormControlTextarea1" >
                                        <?php 
                                        if(count($data['data']['drivers'])>0){
                                            foreach($data['data']['drivers'] as $driver){
                                                   ?>
                                        <option value="<?php echo $driver['id'] ?>"><?php echo $driver['fullname'] ?></option>  
                                        <?php }
                                                }
                                                 ?>   
                                    </select>


                                    <div class="form-group">
										<label for="exampleFormControlTextarea1">Select Bus</label>
										<select name="bus_id" class="form-control" id="exampleFormControlTextarea1" >
                                        <?php 
                                        if(count($data['data']['buses'])>0){
                                            foreach($data['data']['buses'] as $bus){
                                                   ?>
                                        <option value="<?php echo $bus['id'] ?>"><?php echo $bus['name'] ?></option>  
                                        <?php }
                                                }
                                                 ?>    
                                    </select>
									<div class="form-group">
										<label for="exampleFormControlTextarea1">Starting Point</label>
										<input name="starting_point" value="<?php echo isset($data['data']['starting_point'])? $data['data']['starting_point']:""; ?>" class="form-control" id="exampleFormControlTextarea1" >
									</div>
                         
                                    <div class="form-group">
										<label for="exampleFormControlTextarea1">Destination</label>
										<input name="destination" value="<?php echo isset($data['data']['destination'])? $data['data']['destination']:""; ?>" class="form-control" id="exampleFormControlTextarea1" >
									</div>

                                    <div class="form-group">
										<label for="exampleFormControlTextarea1">Departure Time</label>
										<input name="departure_time" value="<?php echo isset($data['data']['departure_time'])? $data['data']['departure_time']:""; ?>" class="form-control" id="exampleFormControlTextarea1" >
									</div>

                                    <div class="form-group">
										<label for="exampleFormControlTextarea1">Estimated Arrival Time</label>
										<input name="estimated_arrival_time" value="<?php echo isset($data['data']['estimated_arrival_time'])? $data['data']['estimated_arrival_time']:""; ?>" class="form-control" id="exampleFormControlTextarea1" >
									</div>

                                    <div class="form-group">
										<label for="exampleFormControlTextarea1">Fare Amount</label>
										<input name="fare_amount" value="<?php echo isset($data['data']['fare_amount'])? $data['data']['fare_amount']:""; ?>" class="form-control" id="exampleFormControlTextarea1" >
									</div>

                                    <div class="form-group">
										<label for="exampleFormControlTextarea1">Remark</label>
										<textarea name="remark" class="form-control" id="exampleFormControlTextarea1" ><?php echo isset($data['data']['remark'])? $data['data']['remark']:""; ?></textarea>
									</div>

                                   
										<input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>" >
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
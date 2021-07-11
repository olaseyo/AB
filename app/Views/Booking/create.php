<?php include(__DIR__.'../../inc/header.php') ?>

<!-- Page header start -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Book </li>
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
									<div class="card-title">Booking</div>

                                    <?php include(__DIR__.'../../inc/alert.php') ?>
								</div>
								<div class="card-body">
                                    <form action="<?php echo BASE_URL?>/Booking/store" method="POST" id="form_category">
                                    <div class="form-group">
										<label for="exampleFormControlTextarea1">Select Destination</label>
										<select name="driver_id" class="form-control" onchange="getDestinationBuses(this.value)" id="exampleFormControlTextarea1" >
                                            <option value="">Select Destination</option>
                                        <?php 
                                        if(count($data['data']['destination'])>0){
                                            foreach($data['data']['destination'] as $destination){
                                                   ?>
                                        <option value="<?php echo $destination['destination'] ?>"><?php echo $destination['destination'] ?></option>  
                                        <?php }
                                                }
                                                 ?>   
                                    </select>


                                    <div class="form-group">
										<label for="exampleFormControlTextarea1">Select Bus Class</label>
										<select onchange="getFare(this.value)" name="bus_id" class="form-control" id="exampleFormControlTextarea1" >
                                        <option value="">Select Bus Class</option>
                                        <?php 
                                        if(count($data['data']['buses'])>0){
                                            foreach($data['data']['buses'] as $bus){
                                                   ?>
                                        <option value="<?php echo $bus['schedule_id'] ?>"><?php echo $bus['name']." (". $bus['class'] ?>)</option>  
                                        <?php }
                                                }
                                                 ?>    
                                    </select>
                                    </div>
									<div class="form-group">
										<label for="exampleFormControlTextarea1">Total Seat</label>
										<input onblur="getTotal()" name="number_of_seat" value="<?php echo isset($data['data']['starting_point'])? $data['data']['starting_point']:"1"; ?>" class="form-control" id="seat_id" >
									</div>
                         

                                    <div class="form-group">
										<label for="exampleFormControlTextarea1">Total Available Seats</label>
										<input value="<?php echo isset($data['data']['fare']['total_seat'])? $data['data']['fare']['total_seat']:"0"; ?>" class="form-control" readonly >
									</div>

                                   
                                    <div class="form-group">
										<label for="exampleFormControlTextarea1">Fare Amount</label>
										<input onblur="getTotal()" name="fare_amount" value="<?php echo isset($data['data']['fare']['fare_amount'])? $data['data']['fare']['fare_amount']:""; ?>" class="form-control" id="fare_id" readonly>
									</div>

                                    <div class="form-group">
										<label for="exampleFormControlTextarea1">Total Fare</label>
										<input name="total_amount" value="<?php echo isset($data['data']['total_amount'])? $data['data']['fare_amount']:""; ?>" class="form-control" id="total_id" readonly>
									</div>

                                    <div class="form-group">
										<label for="exampleFormControlTextarea1">Phone</label>
										<input name="phone" class="form-control" >
									</div>
                                   
										<input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>" >
                                        <input type="hidden" name="schedule_id" value="<?php echo $bus['schedule_id']; ?>" >
                                         
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

<script>
function getDestinationBuses(value){
    var data=btoa(value);
  var url="<?php echo BASE_URL ?>";
  window.location.href=url+"/Booking/Create/"+data;
}

function getFare(value){
    var data=btoa(value);
  var url="<?php echo BASE_URL ?>";
  window.location.href=url+"/Booking/Create/<?php echo explode('/',$_GET['url'])[2]?>/"+data;
}

function getTotal(){
    var seat=$('#seat_id').val();
    var fare=$('#fare_id').val();
    $('#total_id').val(parseFloat(seat)*parseFloat(fare));
}
<?php 
if(isset(explode('/',$_GET['url'])[2])){ 
?>
$(document).ready(function(){
    getTotal();
})
<?php } ?>
</script>
</html>
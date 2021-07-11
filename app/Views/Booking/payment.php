<?php include(__DIR__.'../../inc/header.php') ?>

<!-- Page header start -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Payment </li>
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
									<div class="card-title">Make Payment</div>

                                    <?php include(__DIR__.'../../inc/alert.php') ?>
								</div>
								<div class="card-body">
                                    <form action="<?php echo BASE_URL?>/Booking/confirm" method="POST" id="form_category">
                               
                                        <h2>Pay &#x20A6;<?php echo number_format($data['data']['booking']['total_amount'],2); ?></h2>

                                        <h2>Booking Code: <b><?php echo (isset($data['data']['booking']['code']) && isset($data['response']['success']))? $data['data']['booking']['code']:"";?></b></h2>
                                        
                                    <div class="form-group">
										<label for="exampleFormControlTextarea1">Payment Method</label>
										<select onchange="getFare(this.value)" name="payment_method" class="form-control" id="exampleFormControlTextarea1" >
                                        <option value="">Select Payment Method</option>
                                        <option value="Cash">Cash</option>
                                        <option value="POS">POS</option>
                                           
                                    </select>
                                    </div>
										<input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>" >
                                        <input type="hidden" name="booking_id" value="<?php echo $_SESSION['booking_id']; ?>">
                                        <input type="hidden" name="amount_paid" value="<?php echo $data['data']['booking']['total_amount'] ?>" >
                                         
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
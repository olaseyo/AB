

<?php include(__DIR__.'../../inc/header.php') ?>

<!-- Page header start -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">View Bookings</li>
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
<!-- Row start -->
<div class="row gutters">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="table-container">
								<div class="t-header">Bookings List</div>
								<div class="table-responsive">
                                <?php include(__DIR__.'../../inc/alert.php') ?>
									<table class="table table-striped" id="CategoryTable">
										<thead>
										<tr role="row">
												<th>S/N</th>
												<th>Customer</th>
												<th>Payment Method</th>
												<th>Fare Amount</th>
												<th>Total Seat</th>
												<th>Total Fare</th>
												<th>Starting Point</th>
												<th>Destination</th>
												<th>Departure Time</th>
												<th>Estimated Arrival TIme</th>
                                                <th>Date</th>
											</tr>
										</thead>
										<tbody>
											<?php $sn=1; ?>
									<?php foreach($data['data'] as $user){
                                    ?>
										<tr role="row">
												<td><?php echo $sn; ?></td>
												<td><?php echo $user['phone']; ?></td>
												<td><?php echo $user['payment_method']; ?></td>
												<td><?php echo $user['fare_amount']; ?></td>
												<td><?php echo $user['total_seat']; ?></td>
                                                <td><?php echo $user['total_amount']; ?></td>
												<td><?php echo $user['starting_point']; ?></td>
												<td><?php echo $user['destination']; ?></td>
												<td><?php echo $user['departure_time']; ?></td>
												<td><?php echo $user['estimated_arrival_time']; ?></td>
												<td><?php echo $user['schedule_date']; ?></td>
												</tr>
											<?php $sn++; }?>
											
										</tbody>
									</table>
								</div>
								</div>
							</div>
						</div>
					<!-- Row end -->
<!-- Main container end -->
<!-- Page content end -->

<?php include(__DIR__.'../../inc/footer.php') ?>
</html>











	
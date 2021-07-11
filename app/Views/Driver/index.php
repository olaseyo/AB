

<?php include(__DIR__.'../../inc/header.php') ?>

<!-- Page header start -->
<div class="page-header">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">View Drivers</li>
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
								<div class="t-header">Drivers List</div>
								<div class="table-responsive">
                                <?php include(__DIR__.'../../inc/alert.php') ?>
									<table class="table table-striped" id="CategoryTable">
										<thead>
										<tr role="row">
												<th>S/N</th>
												<th colspan="2">Action</th>
												<th>Fullname</th>
												<th>Contact</th>
                                                <th>Date</th>
											</tr>
										</thead>
										<tbody>
											<?php $sn=1; ?>
									<?php foreach($data['data'] as $user){
                                    ?>
										<tr role="row">
												<td><?php echo $sn; ?></td>
												<td><a href="<?php echo BASE_URL ?>/Driver/destroy/<?php echo base64_encode($user['id']); ?>" class="btn btn-danger" ><i class="fas fa-trash"></i> Delete</a></td>
                                                <td><a href="<?php echo BASE_URL ?>/Driver/edit/<?php echo base64_encode($user['id']); ?>" class="btn btn-success"><i class="fas fa-pencil"></i> Edit</button></td>
												<td><?php echo $user['fullname']; ?></td>
												<td><?php echo $user['contact']; ?></td>
                                                <td><?php echo $user['created_at']; ?></td>
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











	
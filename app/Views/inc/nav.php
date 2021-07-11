	<!-- sidebar menu start -->
    <div class="sidebar-menu">
						<ul>
							<li class="header-menu">General</li>

                            <li>
								<a href="<?php echo BASE_URL ?>/Dashboard">
									<i class="icon-schedule"></i>
									<span class="menu-text">Dashboards</span>
								</a>
							</li>
			<?php if($_SESSION['is_admin']){ ?>
							<li class="sidebar-dropdown">
								<a href="#">
									<i class="icon-devices_other"></i>
									<span class="menu-text">User</span>
								</a>
								<div class="sidebar-submenu">
									<ul>
										<li>
											<a href="<?php echo BASE_URL ?>/User/Create" class="current-page">Create</a>
										</li>
										<li>
											<a href="<?php echo BASE_URL ?>/User">View</a>
										</li>
									</ul>
								</div>
							</li>

							<li class="sidebar-dropdown">
								<a href="#">
									<i class="icon-devices_other"></i>
									<span class="menu-text">Driver</span>
								</a>
								<div class="sidebar-submenu">
									<ul>
										<li>
											<a href="<?php echo BASE_URL ?>/Driver/Create" class="current-page">Create</a>
										</li>
										<li>
											<a href="<?php echo BASE_URL ?>/Driver">View</a>
										</li>
									</ul>
								</div>
							</li>


							<li class="sidebar-dropdown">
								<a href="#">
									<i class="icon-devices_other"></i>
									<span class="menu-text">Bus</span>
								</a>
								<div class="sidebar-submenu">
									<ul>
										<li>
											<a href="<?php echo BASE_URL ?>/Bus/Create" class="current-page">Create</a>
										</li>
										<li>
											<a href="<?php echo BASE_URL ?>/Bus">View</a>
										</li>
									</ul>
								</div>
							</li>


							<li class="sidebar-dropdown">
								<a href="#">
									<i class="icon-devices_other"></i>
									<span class="menu-text">Travel Schedule</span>
								</a>
								<div class="sidebar-submenu">
									<ul>
										<li>
											<a href="<?php echo BASE_URL ?>/TravelSchedule/Create" class="current-page">Create</a>
										</li>
										<li>
											<a href="<?php echo BASE_URL ?>/TravelSchedule">View</a>
										</li>
									</ul>
								</div>
							</li>
							<?php }  ?>

							<li class="sidebar-dropdown">
								<a href="#">
									<i class="icon-devices_other"></i>
									<span class="menu-text">Booking</span>
								</a>
								<div class="sidebar-submenu">
									<ul>
										<li>
											<a href="<?php echo BASE_URL ?>/Booking/Create" class="current-page">Book</a>
										</li>
										<li>
											<a href="<?php echo BASE_URL ?>/Booking">View</a>
										</li>
									</ul>
								</div>
							</li>
							
						</ul>
					</div>
					<!-- sidebar menu end -->					
				
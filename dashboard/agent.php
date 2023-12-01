<?php
include 'connect.php';

$mobile = 6300278963;

$sql = "SELECT * FROM `users` WHERE `mobile` = '$mobile'";
$result = mysqli_query($con, $sql);
while ($row = $result->fetch_assoc()) {
	$name = $row['name'];
	$a_id = $row['a_id'];
	$blood_grp = $row['blood_grp'];
	$rider_id = $row['rider_id'];
	$status = $row['status'];
}

$sql1 = "SELECT * FROM `agencies` WHERE `a_id` = '$a_id'";
$result1 = mysqli_query($con, $sql1);
while ($row = $result1->fetch_assoc()) {
	$a_name = $row['a_name'];
	$a_type = $row['a_type'];
	$a_mobile = $row['a_mobile'];
	$a_lat = $row['a_lat'];
	$a_lon = $row['a_lon'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Agent - Dashboard</title>

	<!-- Favicon -->
	<!-- <link rel="shortcut icon" href="assets/img/favicon.png"> -->

	<!-- Fontfamily -->
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

	<!-- Feathericon CSS -->
	<link rel="stylesheet" href="assets/plugins/feather/feather.css">

	<!-- Pe7 CSS -->
	<link rel="stylesheet" href="assets/plugins/icons/flags/flags.css">

	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

	<!-- Main CSS -->
	<link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

	<!-- Main Wrapper -->
	<div class="main-wrapper">

		<!-- Header -->
		<div class="header">

			<!-- Logo -->
			<div class="header-left">
				<a href="index.php" class="logo">
					<img src="assets/img/logo1.png" alt="Logo">
				</a>
				<!-- <a href="index.html" class="logo logo-small">
						<img src="assets/img/logo-small.png" alt="Logo" width="30" height="30">
					</a> -->
			</div>
			<!-- /Logo -->

			<div class="menu-toggle">
				<a href="javascript:void(0);" id="toggle_btn">
					<i class="fas fa-bars"></i>
				</a>
			</div>

			<!-- Search Bar -->
			<!-- <div class="top-nav-search">
					<form>
						<input type="text" class="form-control" placeholder="Search here">
						<button class="btn" type="submit"><i class="fas fa-search"></i></button>
					</form>
				</div> -->
			<!-- /Search Bar -->

			<!-- Mobile Menu Toggle -->
			<a class="mobile_btn" id="mobile_btn">
				<i class="fas fa-bars"></i>
			</a>
			<!-- /Mobile Menu Toggle -->

			<!-- Header Right Menu -->
			<ul class="nav user-menu">
				<li class="nav-item dropdown noti-dropdown language-drop me-2">
					<i class="flag flag-in" data-bs-toggle="tooltip"></i>
					<!-- <div class="dropdown-menu ">
							<div class="noti-content">
								<div >
									<a class="dropdown-item"><i class="flag flag-in" data-bs-toggle="tooltip" title="flag flag-in"></i>India</a>
								
								</div>
							</div>
						</div> -->
				</li>
				<!-- Notifications -->
				<li class="nav-item dropdown noti-dropdown me-2">
					<a href="#" class="dropdown-toggle nav-link header-nav-list" data-bs-toggle="dropdown">
						<img src="assets/img/icons/header-icon-05.svg" alt="">
					</a>
					<div class="dropdown-menu notifications">
						<!-- <div class="topnav-dropdown-header">
								<span class="notification-title">Notifications</span>
								<a href="javascript:void(0)" class="clear-noti"> Clear All </a>
							</div>
							<div class="noti-content">
								<ul class="notification-list">
									<li class="notification-message">
										<a href="#">
											<div class="media d-flex">
												<span class="avatar avatar-sm flex-shrink-0">
													<img class="avatar-img rounded-circle" alt="User Image" src="assets/img/profiles/avatar-02.jpg">
												</span>
												<div class="media-body flex-grow-1">
													<p class="noti-details"><span class="noti-title">Carlson Tech</span> has approved <span class="noti-title">your estimate</span></p>
													<p class="noti-time"><span class="notification-time">4 mins ago</span></p>
												</div>
											</div>
										</a>
									</li>
									<li class="notification-message">
										<a href="#">
											<div class="media d-flex">
												<span class="avatar avatar-sm flex-shrink-0">
													<img class="avatar-img rounded-circle" alt="User Image" src="assets/img/profiles/avatar-11.jpg">
												</span>
												<div class="media-body flex-grow-1">
													<p class="noti-details"><span class="noti-title">International Software Inc</span> has sent you a invoice in the amount of <span class="noti-title">$218</span></p>
													<p class="noti-time"><span class="notification-time">6 mins ago</span></p>
												</div>
											</div>
										</a>
									</li>
									<li class="notification-message">
										<a href="#">
											<div class="media d-flex">
												<span class="avatar avatar-sm flex-shrink-0">
													<img class="avatar-img rounded-circle" alt="User Image" src="assets/img/profiles/avatar-17.jpg">
												</span>
												<div class="media-body flex-grow-1">
												<p class="noti-details"><span class="noti-title">John Hendry</span> sent a cancellation request <span class="noti-title">Apple iPhone XR</span></p>
												<p class="noti-time"><span class="notification-time">8 mins ago</span></p>
												</div>
											</div>
										</a>
									</li>
									<li class="notification-message">
										<a href="#">
											<div class="media d-flex">
												<span class="avatar avatar-sm flex-shrink-0">
													<img class="avatar-img rounded-circle" alt="User Image" src="assets/img/profiles/avatar-13.jpg">
												</span>
												<div class="media-body flex-grow-1">
													<p class="noti-details"><span class="noti-title">Mercury Software Inc</span> added a new product <span class="noti-title">Apple MacBook Pro</span></p>
													<p class="noti-time"><span class="notification-time">12 mins ago</span></p>
												</div>
											</div>
										</a>
									</li>
								</ul>
							</div>
							<div class="topnav-dropdown-footer">
								<a href="#">View all Notifications</a>
							</div> -->
					</div>
				</li>
				<!-- /Notifications -->
				<li class="nav-item zoom-screen me-2">
					<a href="#" class="nav-link header-nav-list win-maximize">
						<img src="assets/img/icons/header-icon-04.svg" alt="">
					</a>
				</li>

				<!-- User Menu -->
				<li class="nav-item dropdown has-arrow new-user-menus">
					<a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
						<span class="user-img">
							<img class="rounded-circle" src="assets/img/profiles/avatar-01.jpg" width="31" alt="Ryan Taylor">
							<div class="user-text">
								<h6><?php echo $name; ?> </h6>
								<p class="text-muted mb-0">Admin</p>
							</div>
						</span>
					</a>
					<div class="dropdown-menu">
						<div class="user-header">
							<div class="avatar avatar-sm">
								<img src="assets/img/profiles/avatar-01.jpg" alt="User Image" class="avatar-img rounded-circle">
							</div>
							<div class="user-text">
								<h6><?php echo $name; ?></h6>
								<p class="text-muted mb-0">Admin</p>
							</div>
						</div>
						<a class="dropdown-item" href="profile.php">My Profile</a>
						<!-- <a class="dropdown-item" href="inbox.php">Inbox</a> -->
						<!-- <a class="dropdown-item" href="login.html">Logout</a> -->
					</div>
				</li>
				<!-- /User Menu -->

			</ul>
			<!-- /Header Right Menu -->

		</div>
		<!-- /Header -->

		<!-- Sidebar -->
		<div class="sidebar" id="sidebar">
			<div class="sidebar-inner slimscroll">
				<div id="sidebar-menu" class="sidebar-menu">
					<ul>
						<li class="menu-title">
							<span>Main Menu</span>
						</li>
						<li class="submenu active">
							<a href="#"><i class="feather-grid"></i> <span> Dashboard</span> <span class="menu-arrow"></span></a>
							<ul>
								<li><a href="agent.php" class="active">Dashboard</a></li>
								<li><a href="locate.php">Locate</a></li>
								<!-- <li><a href="student-dashboard.html">Student Dashboard</a></li> -->
							</ul>
						</li>
						<!-- <li class="submenu">
							<a href="#"><i class="fas fa-graduation-cap"></i> <span>Agents</span> <span class="menu-arrow"></span></a>
							<ul>
								<li><a href="agent-list.php">Agents List</a></li>
								<li><a href="add-agent.php">Agent Add</a></li>

							</ul>
						</li> -->

				</div>
			</div>
		</div>
		<!-- /Sidebar -->

		<!-- Page Wrapper -->
		<div class="page-wrapper">

			<div class="content container-fluid">
				<!-- Page Header -->
				<div class="page-header">
					<div class="row">
						<div class="col-sm-12">
							<div class="page-sub-header">
								<h3 class="page-title">Welcome Back! <?php echo $name; ?></h3>
								<ul class="breadcrumb">
									<!-- <li class="breadcrumb-item"><a href="index.html">Home</a></li> -->
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- /Page Header -->

				<!-- Overview Section -->
				<!-- <div class="row">
					<div class="col-xl-3 col-sm-6 col-12 d-flex">
						<div class="card bg-comman w-100">
							<div class="card-body">
								<div class="db-widgets d-flex justify-content-between align-items-center">
									<div class="db-info">
										<h6>Hospitals</h6>
										<h3>5</h3>
									</div>
									<div class="db-icon">
										<img src="assets/img/hospital.png" alt="Dashboard Icon">
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-xl-3 col-sm-6 col-12 d-flex">
						<div class="card bg-comman w-100">
							<div class="card-body">
								<div class="db-widgets d-flex justify-content-between align-items-center">
									<div class="db-info">
										<h6>Food</h6>
										<h3>50+</h3>
									</div>
									<div class="db-icon">
										<img src="assets/img/food.png" alt="Dashboard Icon">
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-xl-3 col-sm-6 col-12 d-flex">
						<div class="card bg-comman w-100">
							<div class="card-body">
								<div class="db-widgets d-flex justify-content-between align-items-center">
									<div class="db-info">
										<h6>Shelter</h6>
										<h3>30+</h3>
									</div>
									<div class="db-icon">
										<img src="assets/img/icons/dash-icon-03.svg" alt="Dashboard Icon">
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-xl-3 col-sm-6 col-12 d-flex">
						<div class="card bg-comman w-100">
							<div class="card-body">
								<div class="db-widgets d-flex justify-content-between align-items-center">
									<div class="db-info">
										<h6>Rescue</h6>
										<h3>5</h3>
									</div>
									<div class="db-icon">
										<img src="assets/img/fire.png" alt="Dashboard Icon">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div> -->
				<!-- /Overview Section -->

				<div class="row">
					<div class="col-md-12 col-lg-6">

						<!-- Revenue Chart -->
						<!-- <div class="card card-chart">
								<div class="card-header">
									<div class="row align-items-center">
										<div class="col-6">
											<h5 class="card-title">Overview</h5>
										</div>
										<div class="col-6">
											<ul class="chart-list-out">
												<li><span class="circle-blue"></span>Agencies</li>
												<li><span class="circle-green"></span>Registered</li>
												<li class="star-menus"><a href="javascript:;"><i class="fas fa-ellipsis-v"></i></a></li>
											</ul>                                       
										</div>
									</div>						
								</div>
								<div class="card-body">
									<div id="apexcharts-area"></div>
								</div>
							</div> -->
						<!-- /Revenue Chart -->

					</div>

					<div class="col-md-12 col-lg-6">

						<!-- Student Chart -->
						<!-- <div class="card card-chart">
								<div class="card-header">
									<div class="row align-items-center">
										<div class="col-6">
											<h5 class="card-title">Number of Students</h5>
										</div>
										<div class="col-6">
											<ul class="chart-list-out">
												<li><span class="circle-blue"></span>Girls</li>
												<li><span class="circle-green"></span>Boys</li>
												<li class="star-menus"><a href="javascript:;"><i class="fas fa-ellipsis-v"></i></a></li>
											</ul>                                       
										</div>
									</div>									
								</div>
								<div class="card-body">
									<div id="bar"></div>
								</div>
							</div> -->
						<!-- /Student Chart -->
					</div>
				</div>

				<div class="row">
					<div class="col-xl-6 d-flex">
						<!-- Star Students -->

						<!-- /Star Students -->
					</div>

					<div class="card flex-fill student-space comman-shadow">
						<div class="card-header d-flex align-items-center">
							<h5 class="card-title"><?php echo $a_name; ?>&nbsp; Agency</h5>
							<ul class="chart-list-out student-ellips">
								<li class="star-menus"><a href="javascript:;"><i class="fas fa-ellipsis-v"></i></a></li>
							</ul>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table star-student table-hover table-center table-borderless table-striped">
									<thead class="thead-light">
										<tr>
											<th>Name</th>
											<th>Moblie</th>

											<th class="text-center">Status</th>
											<th class="text-center">Alert</th>
											<!-- <th class="text-center">Percentage</th>
													<th class="text-end">Year</th> -->
										</tr>
									</thead>
									<tbody>
										<?php
										while ($row = $result1->fetch_assoc()) {
											echo '<tr> <td class="text-nowrap"> <a>';
											echo $row['name'];
											echo '</a> </td>';
											echo '<td class="text-nowrap"> <div>';
											echo $row['mobile'];
											echo '</div> </td>';
											if ($row['status'] == 1) {
												echo '<td class="text-center"><span class="badge bg-success">Online</span></td>';
											} else {
												echo '<td class="text-center"><span class="badge bg-danger">Away</span></td>';
											}
											echo '<td class="text-center"><button class="btn btn-sm btn-danger" onclick="sendMobile(\'' . $row['mobile'] . '\')">Alert</button></td>';
											echo '</tr>';
										}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>

					<div class="col-xl-6 d-flex">
						<!-- Feed Activity -->
						<!-- <div class="card flex-fill comman-shadow">
								<div class="card-header d-flex align-items-center">
									<h5 class="card-title ">Student Activity </h5>
									<ul class="chart-list-out student-ellips">
										<li class="star-menus"><a href="javascript:;"><i class="fas fa-ellipsis-v"></i></a></li>
									</ul> 
								</div>
								<div class="card-body">
									<div class="activity-groups">
										<div class="activity-awards">
											<div class="award-boxs">
												<img  src="assets/img/icons/award-icon-01.svg"  alt="Award">
											</div>
											<div class="award-list-outs">
												<h4>1st place in "Chess”</h4>
												<h5>John Doe won 1st place in "Chess"</h5>
											</div>
											<div class="award-time-list">
												<span>1 Day ago</span>
											</div>
										</div>
										<div class="activity-awards">
											<div class="award-boxs">
												<img  src="assets/img/icons/award-icon-02.svg"  alt="Award">
											</div>
											<div class="award-list-outs">
												<h4>Participated in "Carrom"</h4>
												<h5>Justin Lee participated in "Carrom"</h5>
											</div>
											<div class="award-time-list">
												<span>2 hours ago</span>
											</div>
										</div>
										<div class="activity-awards">
											<div class="award-boxs">
												<img  src="assets/img/icons/award-icon-03.svg"  alt="Award">
											</div>
											<div class="award-list-outs">
												<h4>Internation conference in "St.John School"</h4>
												<h5>Justin Leeattended internation conference in "St.John School"</h5>
											</div>
											<div class="award-time-list">
												<span>2 Week ago</span>
											</div>
										</div>
										<div class="activity-awards mb-0">
											<div class="award-boxs">
												<img  src="assets/img/icons/award-icon-04.svg"  alt="Award">
											</div>
											<div class="award-list-outs">
												<h4>Won 1st place in "Chess"</h4>
												<h5>John Doe won 1st place in "Chess"</h5>
											</div>
											<div class="award-time-list">
												<span>3 Day ago</span>
											</div>
										</div>
									</div>
								</div>
							</div> -->
						<!-- /Feed Activity -->
					</div>
				</div>

				<!-- Socail Media Follows -->
				<!-- <div class="row">
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card flex-fill fb sm-box">
								<div class="social-likes">
									<p>Like us on facebook</p>
									<h6>50,095</h6>
								</div>
								<div class="social-boxs">
									<img  src="assets/img/icons/social-icon-01.svg"  alt="Social Icon">
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card flex-fill twitter sm-box">
								<div class="social-likes">
									<p>Follow us on twitter</p>
									<h6>48,596</h6>
								</div>
								<div class="social-boxs">
									<img  src="assets/img/icons/social-icon-02.svg"  alt="Social Icon">
								</div>
							</div>
						</div>
	
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card flex-fill insta sm-box">
								<div class="social-likes">
									<p>Follow us on instagram</p>
									<h6>52,085</h6>
								</div>
								<div class="social-boxs">
									<img  src="assets/img/icons/social-icon-03.svg"  alt="Social Icon">
								</div>
							</div>
						</div>
	
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card flex-fill linkedin sm-box">
								<div class="social-likes">
									<p>Follow us on linkedin</p>
									<h6>69,050</h6>
								</div>
								<div class="social-boxs">
									<img  src="assets/img/icons/social-icon-04.svg"  alt="Social Icon">
								</div>
							</div>
						</div>
					</div> -->
				<!-- /Socail Media Follows -->
			</div>

			<!-- Footer -->
			<footer>
				<p>Copyright © 2023 Innov8ors.</p>
			</footer>
			<!-- /Footer -->

		</div>
		<!-- /Page Wrapper -->



	</div>
	<!-- /Main Wrapper -->

	<!-- jQuery -->
	<script src="assets/js/jquery-3.6.0.min.js"></script>

	<!-- Bootstrap Core JS -->
	<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Feather Icon JS -->
	<script src="assets/js/feather.min.js"></script>

	<!-- Slimscroll JS -->
	<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

	<!-- Chart JS -->
	<script src="assets/plugins/apexchart/apexcharts.min.js"></script>
	<script src="assets/plugins/apexchart/chart-data.js"></script>

	<!-- Custom JS -->
	<script src="assets/js/script.js"></script>



</body>

</html>
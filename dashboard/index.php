<?php
session_start();
require_once '../vendor/autoload.php';

use Twilio\Rest\Client;

include 'connect.php';
if (!isset($_SESSION['a_id'])) {
	header('location: ../resqconnect.php');
	exit();
}

$a_id = $_SESSION['a_id'];

$sql = "SELECT * FROM `agencies` WHERE `a_id` = '$a_id'";
$result = mysqli_query($con, $sql);
$sql1 = "SELECT * FROM `users` WHERE `a_id` = '$a_id'";
$result1 = mysqli_query($con, $sql1);
while ($row = $result->fetch_assoc()) {
	$a_name = $row['a_name'];
	$a_type = $row['a_type'];
	$a_mobile = $row['a_mobile'];
	$a_lat = $row['a_lat'];
	$a_lon = $row['a_lon'];
}

$account_sid = 'AC60df12d0cc71a3ea9f4e01fa0a666a47';
$auth_token = '9b8da26cdc70e2dd6516529c4eeaa56f';

$twilio = new Client($account_sid, $auth_token);

if ($twilio) {
	$calls = $twilio->calls->read();
} else {
	echo "Failed to initialize Twilio client.";
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Agency - Dashboard</title>

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
								<h6><?php echo $a_name; ?> </h6>
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
								<h6><?php echo $a_name; ?></h6>
								<p class="text-muted mb-0">Admin</p>
							</div>
						</div>
						<a class="dropdown-item" href="profile.php">My Profile</a>
						<!-- <a class="dropdown-item" href="inbox.php">Inbox</a> -->
						<a class="dropdown-item" href="../resqconnect.php">Logout</a>
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
								<li><a href="index.php" class="active">Call Logs</a></li>
								<li><a href="locate.php">Locate</a></li>
								<!-- <li><a href="teacher-dashboard.html">Teacher Dashboard</a></li>
									<li><a href="student-dashboard.html">Student Dashboard</a></li> -->
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
								<h3 class="page-title"><?php echo $a_name; ?></h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>

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
					<div class="col-xl-6 d-flex">
						<!-- Star Students -->

						<!-- /Star Students -->
					</div>

					<div class="card flex-fill student-space comman-shadow">
						<div class="card-header d-flex align-items-center">
							<h5 class="card-title"><?php echo $a_name; ?>&nbsp; Agents</h5>
							<ul class="chart-list-out student-ellips">
								<li class="star-menus"><a href="javascript:;"><i class="fas fa-ellipsis-v"></i></a></li>
							</ul>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table star-student table-hover table-center table-borderless table-striped">
									<thead class="thead-light">
										<tr>
											<th>To</th>
											<th>Date</th>
											<!-- 
											<th class="text-center">Status</th>
											<th class="text-center">Alert</th> -->
											<!-- <th class="text-center">Percentage</th>
													<th class="text-end">Year</th> -->
										</tr>
									</thead>
									<tbody>
										<?php
										foreach ($calls as $call) {
											$to = $call->to;
											$dateCreated = $call->dateCreated->format('Y-m-d H:i:s');
											echo '<tr> <td class="text-nowrap"> <a>';
											echo $to;
											echo '</a> </td>';
											echo '<td class="text-nowrap"> <div>';
											echo $dateCreated;
											echo '</div> </td>';
											echo '</tr>';
										}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>


				</div>


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
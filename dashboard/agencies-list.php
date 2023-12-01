<?php
include 'connect.php';

$sql = "SELECT * FROM `agencies`";
$result = mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Agency Members</title>

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

	<!-- Datatables CSS -->
	<link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">

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
					<a href="#" class="nav-link header-nav-list">
						<img src="assets/img/icons/header-icon-04.svg" alt="">
					</a>
				</li>

				<!-- User Menu -->
				<li class="nav-item dropdown has-arrow new-user-menus">
					<a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
						<span class="user-img">
							<img class="rounded-circle" src="assets/img/profiles/avatar-01.jpg" width="31" alt="Ryan Taylor">
							<div class="user-text">
								<h6>Aid-Finder</h6>
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
								<h6>Aid-Finder</h6>
								<p class="text-muted mb-0">Admin</p>
							</div>
						</div>
						<a class="dropdown-item" href="profile.php">My Profile</a>
						<a class="dropdown-item" href="inbox.php">Inbox</a>
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
						<li class="submenu">
							<a href="#"><i class="feather-grid"></i> <span> Dashboard</span> <span class="menu-arrow"></span></a>
							<ul>
								<li><a href="super_admin.php">Admin Dashboard</a></li>
								<!-- <li><a href="teacher-dashboard.html">Teacher Dashboard</a></li>
									<li><a href="student-dashboard.html">Student Dashboard</a></li> -->
							</ul>
						</li>
						<li class="submenu active">
							<a href="#"><i class="fas fa-graduation-cap"></i> <span>Agencies</span> <span class="menu-arrow"></span></a>
							<ul>
								<li><a href="agencies-list.php" class="active">Agent List</a></li>
								<!-- <li><a href="agent-edit.php">Agent Edit</a></li> -->
							</ul>
						</li>
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
								<h3 class="page-title">Agents</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="students.html">Agent</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- /Page Header -->

				<!-- <div class="student-group-form">
						<div class="row">
							<div class="col-lg-3 col-md-6">  
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Search by ID ...">
								</div>
							</div>
							<div class="col-lg-3 col-md-6">  
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Search by Name ...">
								</div>
							</div>
							<div class="col-lg-4 col-md-6">  
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Search by Phone ...">
								</div>
							</div>
							<div class="col-lg-2">  
								<div class="search-student-btn">
									<button type="btn" class="btn btn-primary">Search</button>
								</div>
							</div>
						</div>
					</div> -->

				<div class="row">
					<div class="col-sm-12">

						<div class="card card-table comman-shadow">
							<div class="card-body">

								<!-- Page Header -->
								<div class="page-header">
									<div class="row align-items-center">
										<div class="col">
											<h3 class="page-title">Students</h3>
										</div>
										<!-- <div class="col-auto text-end float-end ms-auto download-grp">
													<a href="students.html" class="btn btn-outline-gray me-2 active"><i class="feather-list"></i></a>
													<a href="students-grid.html" class="btn btn-outline-gray me-2"><i class="feather-grid"></i></a>
													<a href="#" class="btn btn-outline-primary me-2"><i class="fas fa-download"></i> Download</a>
													<a href="add-student.html" class="btn btn-primary"><i class="fas fa-plus"></i></a>
												</div> -->
									</div>
								</div>
								<!-- /Page Header -->

								<div class="table-responsive">
									<table class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
										<thead class="student-thread">
											<tr>
												<!-- <th>
													<div class="form-check check-tables">
														<input class="form-check-input" type="checkbox" id="selectAll">
													</div>
												</th> -->
												<th>Name</th>
												<th>Mobile</th>
												<th>Mail</th>
												<th>Type</th>

												<!-- <th class="text-end">Action</th> -->
											</tr>
										</thead>
										<tbody>
											<?php
											while ($row = $result->fetch_assoc()) {
												echo '<tr> <td class="text-nowrap"> <a>';
												echo $row['a_name'];
												echo '</a> </td>';
												echo '<td class="text-nowrap"> ';
												echo $row['a_moblie'];
												echo ' </td>';
												echo '<td class="text-nowrap"> ';
												echo $row['a_mail'];
												echo ' </td>';
												echo '<td class="text-nowrap"> ';
												if ($row['a_type'] == 1) {
													echo 'Fire Department';
												} elseif ($row['a_type'] == 2) {
													echo 'Ambulance Services';
												} elseif ($row['a_type'] == 3) {
													echo 'Medical';
												} elseif ($row['a_type'] == 4) {
													echo 'Animal Rescue';
												} elseif ($row['a_type'] == 5) {
													echo 'Police';
												} elseif ($row['a_type'] == 6) {
													echo 'NGO';
												} elseif ($row['a_type'] == 7) {
													echo 'Air Rescue';
												} elseif ($row['a_type'] == 8) {
													echo 'Volunteer Search and Rescue';
												}
												echo ' </td>';
												echo '</tr>';
											}

											?>
										</tbody>
									</table>

									<script>
										// JavaScript code to handle checkbox functionality
										const selectAllCheckbox = document.getElementById('selectAll');
										const agentCheckboxes = document.querySelectorAll('tbody .form-check-input');

										selectAllCheckbox.addEventListener('change', function() {
											agentCheckboxes.forEach(function(checkbox) {
												checkbox.checked = selectAllCheckbox.checked;
											});
										});
									</script>

								</div>
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

	<!-- Datatables JS -->
	<script src="assets/plugins/datatables/datatables.min.js"></script>

	<!-- Custom JS -->
	<script src="assets/js/script.js"></script>
</body>

</html>
<?php
include 'connect.php';
$id = $_GET['editid'];
$sql = "select * from `agent_info` where id=$id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$id = $row['id'];
$agent_id = $row['agent_id'];
$agent_name = $row['agent_name'];
$gender = $row['gender'];
$blood_group = $row['blood_group'];
$email = $row['email'];
$mobile = $row['mobile'];

if (isset($_POST['submit'])) {
	$agent_id = $_POST['agent_id'];
	$agent_name = $_POST['agent_name'];
	$gender = $_POST['gender'];
	$blood_group = $_POST['blood_group'];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];

	$sql = "UPDATE `agent_info` SET agent_id='$agent_id', agent_name='$agent_name', gender='$gender', blood_group='$blood_group', email='$email', mobile='$mobile' WHERE id='$id'";
	$result = mysqli_query($con, $sql);

	if ($result) {
		// echo "Data Inserted Successfully";
		header('location:agent-list.php');
	} else {
		die(mysqli_error($con));
	}
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Edit Agent</title>

	<!-- Favicon -->
	<!-- <link rel="shortcut icon" href="assets/img/favicon.png"> -->

	<!-- Fontfamily -->
	<link
		href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap"
		rel="stylesheet">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

	<!-- Feathericon CSS -->
	<link rel="stylesheet" href="assets/plugins/feather/feather.css">

	<!-- Pe7 CSS -->
	<link rel="stylesheet" href="assets/plugins/icons/flags/flags.css">

	<!-- Datepicker CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">

	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

	<!-- Select CSS -->
	<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

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
			<li  class="nav-item dropdown noti-dropdown language-drop me-2">
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
							<img class="rounded-circle" src="assets/img/profiles/avatar-01.jpg" width="31"
								alt="Ryan Taylor">
							<div class="user-text">
								<h6>Aid-Finder</h6>
								<p class="text-muted mb-0">Admin</p>
							</div>
						</span>
					</a>
					<div class="dropdown-menu">
						<div class="user-header">
							<div class="avatar avatar-sm">
								<img src="assets/img/profiles/avatar-01.jpg" alt="User Image"
									class="avatar-img rounded-circle">
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
							<a href="#"><i class="feather-grid"></i> <span> Dashboard</span> <span
									class="menu-arrow"></span></a>
							<ul>
								<li><a href="index.php">Admin Dashboard</a></li>
							</ul>
						</li>
						<li class="submenu active">
							<a href="#"><i class="fas fa-graduation-cap"></i> <span> Agents</span> <span
									class="menu-arrow"></span></a>
							<ul>
								<li><a href="agent-list.php">Agent List</a></li>
								<li><a href="add-agent.php" class="active">Agent Add</a></li>
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
					<div class="row align-items-center">
						<div class="col-sm-12">
							<div class="page-sub-header">
								<h3 class="page-title">Add Agents</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="students.html">Agent</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- /Page Header -->

				<div class="row">
					<div class="col-sm-12">

						<div class="card comman-shadow">
							<div class="card-body">
								<form method="post" action="#">
									<div class="row">
										<div class="col-12">
											<h5 class="form-title student-info">Agent Information <span><a
														href="javascript:;"><i
															class="feather-more-vertical"></i></a></span></h5>
										</div>
										<div class="col-12 col-sm-4">
											<div class="form-group local-forms">
												<label>Agent Id <span class="login-danger">*</span></label>
												<input class="form-control" name="agent_id" type="text"
													placeholder="Enter Your Id" value="<?php echo $agent_id ?>">
											</div>
										</div>
										<div class="col-12 col-sm-4">
											<div class="form-group local-forms">
												<label>Agent Name <span class="login-danger">*</span></label>
												<input class="form-control" name="agent_name" type="text"
													placeholder="Enter Your Name" value="<?php echo $agent_name ?>">
											</div>
										</div>
										<div class="col-12 col-sm-4">
											<div class="form-group local-forms">
												<label>Gender <span class="login-danger">*</span></label>
												<select class="form-control select" name="gender">
													<option value="Select Gender" <?php if ($gender == "Select Gender")
														echo "selected"; ?>>Select Gender</option>
													<option value="Female" <?php if ($gender == "Female")
														echo "selected"; ?>>Female</option>
													<option value="Male" <?php if ($gender == "Male")
														echo "selected"; ?>>
														Male</option>
													<option value="Others" <?php if ($gender == "Others")
														echo "selected"; ?>>Others</option>
												</select>

											</div>
										</div>
										<div class="col-12 col-sm-4">
											<div class="form-group local-forms">
												<label>Blood Group <span class="login-danger">*</span></label>
												<input class="form-control" name="blood_group" type="text"
													placeholder="Enter Your Blood Group"
													value="<?php echo $blood_group ?>">
											</div>
										</div>

										<div class="col-12 col-sm-4">
											<div class="form-group local-forms">
												<label>E-Mail <span class="login-danger">*</span></label>
												<input class="form-control" name="email" type="text"
													placeholder="Enter Your Email" value="<?php echo $email ?>">
											</div>
										</div>


										<div class="col-12 col-sm-4">
											<div class="form-group local-forms">
												<label>Mobile </label>
												<input class="form-control" name="mobile" type="text"
													placeholder="Enter Phone Number" value="<?php echo $mobile ?>">
											</div>
										</div>
										<div class="col-12">
											<div class="student-submit">
												<button type="submit" name="submit"
													class="btn btn-primary">Submit</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
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

	<!-- Select2 JS -->
	<script src="assets/plugins/select2/js/select2.min.js"></script>

	<!-- Datepicker Core JS -->
	<script src="assets/plugins/moment/moment.min.js"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js"></script>

	<!-- Custom JS -->
	<script src="assets/js/script.js"></script>

</body>

</html>
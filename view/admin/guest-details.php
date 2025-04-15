<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from maraviyainfotech.com/projects/luxurious-html-v22/admin/./guest-details.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Jan 2025 15:13:52 GMT -->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Best Luxurious Hotel Booking Template.">
	<meta name="keywords"
		content="hotel, booking, business, restaurant, spa, resort, landing, agency, corporate, start up, site design, new business site, business template, professional template, classic, modern">
	<meta name="author" content="ashishmaraviya">

	<title>Chef Restaurent</title>

	<!-- App favicon -->
	<link rel="shortcut icon" href="../../assets_admin/img/logo/logo1.png">

	<!-- Icon CSS -->
	<link href="../../assets_admin/css/vendor/materialdesignicons.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

	<ink href="../../assets_admin /css/vendor/remixicon.css" rel="stylesheet">

		<!-- Vendor -->
		<link href='../../assets_admin/css/vendor/datatables.bootstrap5.min.css' rel='stylesheet'>
		<link href='../../assets_admin/css/vendor/responsive.datatables.min.css' rel='stylesheet'>
		<link href='../../assets_admin/css/vendor/daterangepicker.css' rel='stylesheet'>
		<link href="../../assets_admin/css/vendor/bootstrap.min.css" rel="stylesheet">
		<link href="../../assets_admin/css/vendor/apexcharts.css" rel="stylesheet">
		<link href="../../assets_admin/css/vendor/simplebar.css" rel="stylesheet">
		<link href="../../assets_admin/css/vendor/jquery-jvectormap-1.2.2.css" rel="stylesheet">

		<!-- Main CSS -->
		<link id="mainCss" href="../../assets_admin/css/style.css" rel="stylesheet">
</head>

<body data-lh-mode="light">
	<main class="wrapper sb-default">
		<!-- Loader -->
		<div class="lh-loader">
			<span class="loader"></span>
		</div>

		<!-- Header -->
		<header class="lh-header">
			<div class="container-fluid">
				<div class="lh-header-items">
					<div class="left-header">
						<a href="javascript:void(0)" class="lh-toggle-sidebar">
							<span class="outer-ring">
								<span class="inner-ring"></span>
							</span>
						</a>
						<div class="header-search-box">
							<div class="header-search-drop">
								<a href="javascript:void(0)" class="open-search"><i class="ri-search-line"></i></a>
								<form class="lh-search">
									<input class="search-input" type="text" placeholder="Search...">
									<a href="javascript:void(0)" class="search-btn"><i class="ri-search-line"></i>
									</a>
								</form>
							</div>
						</div>
					</div>
					<div class="right-header">
						<div class="lh-right-tool display-screen">
							<a class="lh-screen full" href="javascript:void(0)"><i class="fa-solid fa-expand"></i></a>
							<a class="lh-screen reset" href="javascript:void(0)">
								<!-- <i class="ri-fullscreen-exit-line"></i> -->
								<i class="fa-solid fa-expand"></i>
							</a>
						</div>
						<div class="lh-right-tool">
							<a class="lh-notify" href="javascript:void(0)">
								<i class="fa-regular fa-bell"></i>
								<span class="label"></span>
							</a>
						</div>
						<div class="lh-right-tool display-dark">
							<a class="lh-mode dark" href="javascript:void(0)"><i class="fa-regular fa-moon"></i></a>
							<a class="lh-mode light" href="javascript:void(0)"><i class="fa-regular fa-sun"></i></a>
						</div>
						<div class="lh-right-tool lh-user-drop">
							<div class="lh-hover-drop">
								<div class="lh-hover-tool">
									<img class="user" src="../../assets_admin/img/user/1.jpg" alt="user">
								</div>
								<div class="lh-hover-drop-panel right">
									<div class="details">
										<h6>Moris Waites</h6>
										<p>moris@example.com</p>
									</div>
									<ul class="border-top">
										<li><a href="./team-profile.php">Profile</a></li>
										<li><a href="#">Help</a></li>
										<li><a href="#">Messages</a></li>
										<li><a href="./team-update.php">Settings</a></li>
									</ul>
									<ul class="border-top">
										<li><a href="./signin.php"><i class="ri-logout-circle-r-line"></i>Logout</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>

		<!-- sidebar -->
		<div class="lh-sidebar-overlay"></div>
		<div class="lh-sidebar" data-mode="light">
			<div class="lh-sb-logo">
				<a href="./index.php" class="sb-full"><img src="../../assets_admin/img/logo/logo2.png" alt="logo" style="width:326px;text-align:center;margin-left:-60px"></a>
				<a href="./index.php" class="sb-collapse"><img src="../../assets_admin/img/logo/collapse-logo.png" alt="logo"></a>
			</div>
<div class="lh-sb-wrapper">
				<div class="lh-sb-content">
					<ul class="lh-sb-list">
						<li class="lh-sb-item sb-drop-item">
							<a href="javascript:void(0)" class="lh-drop-toggle">
								<i class="fa-regular fa-clock"></i>
								<span class="condense">Bảng Điều Khiển<i class="drop-arrow fa-regular fa-circle-left"></i></span>
							</a>
							<ul class="lh-sb-drop condense">
								<li class="list"><a href="./index.php" class="lh-page-link drop">
										<i class="fa-solid fa-code-commit"></i>Report</a></li>
							</ul>
						</li>
						<li class="lh-sb-item-separator"></li>
					<?php
						if ($_SESSION['role_id'] == 1) {
						echo '
						<li class="lh-sb-title condense">Apps</li>
						<li class="lh-sb-item sb-drop-item">
							<a href="javascript:void(0)" class="lh-drop-toggle">
								<i class="fa-regular fa-address-card"></i><span class="condense">Nhân Viên
									<i class="drop-arrow fa-regular fa-circle-left"></i></span></a>
							<ul class="lh-sb-drop condense">
								<li><a href="./team-profile.php" class="lh-page-link drop">
										<i class="fa-solid fa-code-commit"></i>Thông tin </a></li>
								<li><a href="./team-add.php" class="lh-page-link drop">
										<i class="fa-solid fa-code-commit"></i>Thêm nhân viên</a></li>
								<li><a href="./team-list.php" class="lh-page-link drop">
										<i class="fa-solid fa-code-commit"></i>Danh sách nhân viên</a></li>
										
							</ul>
						</li>
						<li class="lh-sb-item-separator"></li>
						<li class="lh-sb-title condense">Customer</li>
						<li class="lh-sb-item">
							<a href="./guest.php" class="lh-page-link">
								<i class="fa-solid fa-user-group"></i><span class="condense"><span
										class="hover-title">Khách hàng</span> </span>
							</a>
						</li>
						<li class="lh-sb-item">
							<a href="./guest-details.php" class="lh-page-link">
								<i class="fa-solid fa-user-pen"></i><span class="condense">
									<span class="hover-title">Khách hàng Chi tiết
									</span> </span>
							</a>
						</li>
						<li class="lh-sb-item">
							<a href="./rooms.php" class="lh-page-link">
								<i class="fa-solid fa-gift"></i><span class="condense"><span
										class="hover-title">Khuyến mãi </span> </span>
							</a>
						</li>
						<li class="lh-sb-item">
							<a href="./bookings.php" class="lh-page-link">
								<i class="fa-solid fa-file"></i><span class="condense"><span
										class="hover-title">Đặt chỗ</span> </span>
							</a>
						</li>
						<li class="lh-sb-item">
							<a href="./invoice.php" class="lh-page-link">
								<i class="fa-regular fa-money-bill-1"></i><span class="condense"><span
										class="hover-title">Hoá đơn</span> </span>
							</a>
						</li>
						<li class="lh-sb-item-separator"></li>
						<li class="lh-sb-title condense">Foods</li>
						<li class="lh-sb-item">
							<a href="./menu.php" class="lh-page-link">
								<i class="fa-solid fa-utensils"></i><span class="condense"><span
										class="hover-title">Thực đơn</span> </span>
							</a>
						</li>
						<li class="lh-sb-item">
							<a href="./menu-add.php" class="lh-page-link">
								<i class="fa-solid fa-utensils"></i><span class="condense"><span
										class="hover-title">Thêm thực đơn</span> </span>
							</a>
						</li>
						<li class="lh-sb-item">
							<a href="./orders.php" class="lh-page-link">
								<i class="fa-regular fa-bookmark"></i><span class="condense"><span
										class="hover-title">Đặt chỗ</span> </span>
							</a>
						</li>
						<li class="lh-sb-item-separator"></li>
						<li class="lh-sb-title condense">Login</li>
						<li class="lh-sb-item sb-drop-item">
							<a href="javascript:void(0)" class="lh-drop-toggle">
								<i class="ri-pages-line"></i><span class="condense">Kho
									<i class="drop-arrow fa-regular fa-circle-left"></i></span></a>
							<ul class="lh-sb-drop condense">
								<li><a href="./material.php" class="lh-page-link drop">
										<i class="fa-solid fa-code-commit"></i>Nguyên liệu</a></li>
								<li><a href="./material-add.php" class="lh-page-link drop">
										<i class="fa-solid fa-code-commit"></i>Thêm Nguyên liệu</a></li>
								<li><a href="./forgot.php" class="lh-page-link drop">
										<i class="fa-solid fa-code-commit"></i>Cập nhật nguyên liệu</a></li>
								
							</ul>
						</li>';
						} else if ($_SESSION['role_id'] == 2) {
							echo '<li class="lh-sb-item-separator"></li>
							<li class="lh-sb-title condense">Customer</li>
							<li class="lh-sb-item">
								<a href="./guest.php" class="lh-page-link">
									<i class="fa-solid fa-user-group"></i><span class="condense"><span
											class="hover-title">Khách hàng</span> </span>
								</a>
							</li>
							<li class="lh-sb-item">
								<a href="./guest-details.php" class="lh-page-link">
									<i class="fa-solid fa-user-pen"></i><span class="condense">
										<span class="hover-title">Khách hàng Chi tiết
										</span> </span>
								</a>
							</li>
							<li class="lh-sb-item">
								<a href="./rooms.php" class="lh-page-link">
									<i class="fa-solid fa-gift"></i><span class="condense"><span
											class="hover-title">Khuyến mãi </span> </span>
								</a>
							</li>
							<li class="lh-sb-item">
								<a href="./bookings.php" class="lh-page-link">
									<i class="fa-solid fa-file"></i><span class="condense"><span
											class="hover-title">Đặt chỗ</span> </span>
								</a>
							</li>
							<li class="lh-sb-item">
								<a href="./invoice.php" class="lh-page-link">
									<i class="fa-regular fa-money-bill-1"></i><span class="condense"><span
											class="hover-title">Hoá đơn</span> </span>
								</a>
							</li>
							<li class="lh-sb-item-separator"></li>
							<li class="lh-sb-title condense">Foods</li>
							<li class="lh-sb-item">
								<a href="./menu.php" class="lh-page-link">
									<i class="fa-solid fa-utensils"></i><span class="condense"><span
											class="hover-title">Thực đơn</span> </span>
								</a>
							</li>
							<li class="lh-sb-item">
								<a href="./menu-add.php" class="lh-page-link">
									<i class="fa-solid fa-utensils"></i><span class="condense"><span
											class="hover-title">Thêm thực đơn</span> </span>
								</a>
							</li>
							<li class="lh-sb-item">
								<a href="./orders.php" class="lh-page-link">
									<i class="fa-regular fa-bookmark"></i><span class="condense"><span
											class="hover-title">Đặt chỗ</span> </span>
								</a>
							</li>
							<li class="lh-sb-item sb-drop-item">
							<a href="javascript:void(0)" class="lh-drop-toggle">
								<i class="ri-pages-line"></i><span class="condense">Kho
									<i class="drop-arrow fa-regular fa-circle-left"></i></span></a>
							<ul class="lh-sb-drop condense">
								<li><a href="./material.php" class="lh-page-link drop">
										<i class="fa-solid fa-code-commit"></i>Nguyên liệu</a></li>
								<li><a href="./material-add.php" class="lh-page-link drop">
										<i class="fa-solid fa-code-commit"></i>Thêm Nguyên liệu</a></li>
								<li><a href="./forgot.php" class="lh-page-link drop">
										<i class="fa-solid fa-code-commit"></i>Cập nhật nguyên liệu</a></li>
								
							</ul>
						</li>';}

						?>
						<!-- // <li class="lh-sb-item sb-drop-item">
						// 	<a href="javascript:void(0)" class="lh-drop-toggle">
						// 		<i class="ri-service-line"></i><span class="condense">Service pages
						// 			<i class="drop-arrow fa-regular fa-circle-left"></i></span></a>
						// 	<ul class="lh-sb-drop condense">
						// 		<li><a href="./404-error-page.php" class="lh-page-link drop">
						// 				<i class="fa-solid fa-code-commit"></i>404 error</a></li>
						// 		<li><a href="./maintenance.php" class="lh-page-link drop">
						// 				<i class="fa-solid fa-code-commit"></i>Maintenance</a></li>
						// 	</ul>
						// </li>
						// <li class="lh-sb-item-separator"></li>
						// <li class="lh-sb-title condense">Elements</li>
						// <li class="lh-sb-item">
						// 	<a href="./remix-icons.php" class="lh-page-link">
						// 		<i class="ri-remixicon-line"></i><span class="condense"><span class="hover-title">remix
						// 				icons</span></span></a>
						// </li>
						// <li class="lh-sb-item">
						// 	<a href="./material-icons.php" class="lh-page-link">
						// 		<i class="mdi mdi-material-ui"></i><span class="condense"><span
						// 				class="hover-title">Material icons</span></span></a>
						// </li>
						// <li class="lh-sb-item">
						// 	<a href="./alert-popup.php" class="lh-page-link">
						// 		<i class="ri-file-warning-line"></i><span class="condense"><span
						// 				class="hover-title">Alert Popup</span></span></a>
						// </li>
						// <li class="lh-sb-item-separator"></li>
						// <li class="lh-sb-title condense">Settings</li>
						// <li class="lh-sb-item">
						// 	<a href="./role.php" class="lh-page-link">
						// 		<i class="ri-magic-line"></i><span class="condense"><span
						// 				class="hover-title">Role</span></span></a>
						// </li> -->
					</ul>
				</div>
			</div>				<div class="lh-sb-content">
					<ul class="lh-sb-list">
						<li class="lh-sb-item sb-drop-item">
							<a href="javascript:void(0)" class="lh-drop-toggle">
								<i class="fa-regular fa-clock"></i>
								<span class="condense">Bảng Điều Khiển<i class="drop-arrow fa-regular fa-circle-left"></i></span>
							</a>
							<ul class="lh-sb-drop condense">
								<li class="list"><a href="./index.php" class="lh-page-link drop">
										<i class="fa-solid fa-code-commit"></i>Report</a></li>
							</ul>
						</li>
						<li class="lh-sb-item-separator"></li>
						<li class="lh-sb-title condense">Apps</li>
						<li class="lh-sb-item sb-drop-item">
							<a href="javascript:void(0)" class="lh-drop-toggle">
								<i class="fa-regular fa-address-card"></i><span class="condense">Nhân Viên
									<i class="drop-arrow fa-regular fa-circle-left"></i></span></a>
							<ul class="lh-sb-drop condense">
								<li><a href="./team-profile.php" class="lh-page-link drop">
										<i class="fa-solid fa-code-commit"></i>Thông tin </a></li>
								<li><a href="./team-add.php" class="lh-page-link drop">
										<i class="fa-solid fa-code-commit"></i>Thêm nhân viên</a></li>
							
								<li><a href="./team-list.php" class="lh-page-link drop">
										<i class="fa-solid fa-code-commit"></i>Xoá nhân viên</a></li>
							</ul>
						</li>
						<li class="lh-sb-item-separator"></li>
						<li class="lh-sb-title condense">Customer</li>
						<li class="lh-sb-item">
							<a href="./guest.php" class="lh-page-link">
								<i class="fa-solid fa-user-group"></i><span class="condense"><span
										class="hover-title">Khách hàng</span> </span>
							</a>
						</li>
						<li class="lh-sb-item">
							<a href="./guest-details.php" class="lh-page-link">
								<i class="fa-solid fa-user-pen"></i><span class="condense">
									<span class="hover-title">Khách hàng Chi tiết
									</span> </span>
							</a>
						</li>
						<li class="lh-sb-item">
							<a href="./rooms.php" class="lh-page-link">
								<i class="fa-solid fa-gift"></i><span class="condense"><span
										class="hover-title">Khuyến mãi </span> </span>
							</a>
						</li>
						<li class="lh-sb-item">
							<a href="./bookings.php" class="lh-page-link">
								<i class="fa-solid fa-file"></i><span class="condense"><span
										class="hover-title">Đặt chỗ</span> </span>
							</a>
						</li>
						<li class="lh-sb-item">
							<a href="./invoice.php" class="lh-page-link">
								<i class="fa-regular fa-money-bill-1"></i><span class="condense"><span
										class="hover-title">Hoá đơn</span> </span>
							</a>
						</li>
						<li class="lh-sb-item-separator"></li>
						<li class="lh-sb-title condense">Foods</li>
						<li class="lh-sb-item">
							<a href="./menu.php" class="lh-page-link">
								<i class="fa-solid fa-utensils"></i><span class="condense"><span
										class="hover-title">Thực đơn</span> </span>
							</a>
						</li>
						<li class="lh-sb-item">
							<a href="./menu-add.php" class="lh-page-link">
								<i class="fa-solid fa-utensils"></i><span class="condense"><span
										class="hover-title">Thêm thực đơn</span> </span>
							</a>
						</li>
						<li class="lh-sb-item">
							<a href="./orders.php" class="lh-page-link">
								<i class="fa-regular fa-bookmark"></i><span class="condense"><span
										class="hover-title">Đặt chỗ</span> </span>
							</a>
						</li>
						<li class="lh-sb-item-separator"></li>
						<li class="lh-sb-title condense">Login</li>
						<li class="lh-sb-item sb-drop-item">
							<a href="javascript:void(0)" class="lh-drop-toggle">
								<i class="ri-pages-line"></i><span class="condense">Authentication
									<i class="drop-arrow fa-regular fa-circle-left"></i></span></a>
							<ul class="lh-sb-drop condense">
								<li><a href="./signin.php" class="lh-page-link drop">
										<i class="fa-solid fa-code-commit"></i>Đăng nhập</a></li>
								<li><a href="./signup.php" class="lh-page-link drop">
										<i class="fa-solid fa-code-commit"></i>Đăng ký</a></li>
								<li><a href="./forgot.php" class="lh-page-link drop">
										<i class="fa-solid fa-code-commit"></i>Quên Mật Khẩu</a></li>
								<li><a href="./reset-password.php" class="lh-page-link drop">
										<i class="fa-solid fa-code-commit"></i>Đặt lại mật khẩu</a></li>
							</ul>
						</li>
						<li class="lh-sb-item sb-drop-item">
							<a href="javascript:void(0)" class="lh-drop-toggle">
								<i class="ri-service-line"></i><span class="condense">Service pages
									<i class="drop-arrow fa-regular fa-circle-left"></i></span></a>
							<ul class="lh-sb-drop condense">
								<li><a href="./404-error-page.php" class="lh-page-link drop">
										<i class="fa-solid fa-code-commit"></i>404 error</a></li>
								<li><a href="./maintenance.php" class="lh-page-link drop">
										<i class="fa-solid fa-code-commit"></i>Maintenance</a></li>
							</ul>
						</li>
						<li class="lh-sb-item-separator"></li>
						<li class="lh-sb-title condense">Elements</li>
						<li class="lh-sb-item">
							<a href="./remix-icons.php" class="lh-page-link">
								<i class="ri-remixicon-line"></i><span class="condense"><span class="hover-title">remix
										icons</span></span></a>
						</li>
						<li class="lh-sb-item">
							<a href="./material-icons.php" class="lh-page-link">
								<i class="mdi mdi-material-ui"></i><span class="condense"><span
										class="hover-title">Material icons</span></span></a>
						</li>
						<li class="lh-sb-item">
							<a href="./alert-popup.php" class="lh-page-link">
								<i class="ri-file-warning-line"></i><span class="condense"><span
										class="hover-title">Alert Popup</span></span></a>
						</li>
						<li class="lh-sb-item-separator"></li>
						<li class="lh-sb-title condense">Settings</li>
						<li class="lh-sb-item">
							<a href="./role.php" class="lh-page-link">
								<i class="ri-magic-line"></i><span class="condense"><span
										class="hover-title">Role</span></span></a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- Notify sidebar -->
		<div class="lh-notify-bar-overlay"></div>
		<div class="lh-notify-bar">
			<div class="lh-bar-title">
				<h6>Notifications<span class="label">12</span></h6>
				<a href="javascript:void(0)" class="close-notify"><i class="ri-close-line"></i></a>
			</div>
			<div class="lh-bar-content">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item" role="presentation">
						<button class="nav-link active" id="alert-tab" data-bs-toggle="tab" data-bs-target="#alert"
							type="button" role="tab" aria-controls="alert" aria-selected="true">Alert</button>
					</li>
					<li class="nav-item" role="presentation">
						<button class="nav-link" id="messages-tab" data-bs-toggle="tab" data-bs-target="#messages"
							type="button" role="tab" aria-controls="messages" aria-selected="false">Messages</button>
					</li>
				</ul>
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="alert" role="tabpanel" aria-labelledby="alert-tab">
						<div class="lh-alert-list">
							<ul>
								<li>
									<div class="icon lh-alert">
										<i class="ri-alarm-warning-line"></i>
									</div>
									<div class="detail">
										<div class="title">Your final report is overdue</div>
										<p class="time">Just now</p>
										<p class="message">Please submit your quarterly report before - June 15.</p>
									</div>
								</li>
								<li>
									<div class="icon lh-warn">
										<i class="ri-error-warning-line"></i>
									</div>
									<div class="detail">
										<div class="title">Your Booking campaign is stop!</div>
										<p class="time">5:45AM - 25/05/2024</p>
										<p class="message">Please submit your quarterly report before Jun 15.</p>
									</div>
								</li>
								<li>
									<div class="icon lh-success">
										<i class="ri-check-double-line"></i>
									</div>
									<div class="detail">
										<div class="title">Your payment is successfully processed</div>
										<p class="time">9:20PM - 19/06/2024</p>
										<p class="message">Check your account wallet. if there is any issue, create
											support ticket.</p>
									</div>
								</li>
								<li>
									<div class="icon lh-warn">
										<i class="ri-error-warning-line"></i>
									</div>
									<div class="detail">
										<div class="title">Budget threshold exceeded!</div>
										<p class="time">4:15AM - 01/04/2024</p>
										<p class="message">Budget threshold was exceeded for project "Luxurious" B612
											elements.</p>
									</div>
								</li>
								<li>
									<div class="icon lh-warn">
										<i class="ri-close-line"></i>
									</div>
									<div class="detail">
										<div class="title">Booking was decline!</div>
										<p class="time">4:15AM - 01/04/2024</p>
										<p class="message">Your booking "B126" is declined by Theresa Mayeras.</p>
									</div>
								</li>
								<li>
									<div class="icon lh-success">
										<i class="ri-check-double-line"></i>
									</div>
									<div class="detail">
										<div class="title">Your payment is successfully processed</div>
										<p class="time">9:20PM - 19/06/2024</p>
										<p class="message">Check your account wallet. if there is any issue, create
											support ticket.</p>
									</div>
								</li>
								<li class="check"><a class="lh-primary-btn" href="#">View all</a></li>
							</ul>
						</div>
					</div>
					<div class="tab-pane fade" id="messages" role="tabpanel" aria-labelledby="messages-tab">
						<div class="lh-message-list">
							<ul>
								<li>
									<a href="#" class="reply">Reply</a>
									<div class="user">
										<img src="../../assets_admin/img/user/9.jpg" alt="user">
										<span class="label online"></span>
									</div>
									<div class="detail">
										<a href="#" class="name">Boris Whisli</a>
										<p class="time">5:30AM, Today</p>
										<p class="message">Hello, Room 204 need to be clean.</p>
										<span class="download-files">
											<span class="download">
												<img src="../../assets_admin/img/room/1.png" alt="image">
												<a href="javascript:void(0)"><i class="ri-download-2-line"></i></a>
											</span>
											<span class="download">
												<img src="../../assets_admin/img/room/2.png" alt="image">
												<a href="javascript:void(0)"><i class="ri-download-2-line"></i></a>
											</span>
											<span class="download">
												<img src="../../assets_admin/img/room/3.png" alt="image">
												<a href="javascript:void(0)"><i class="ri-download-2-line"></i></a>
											</span>
										</span>
									</div>
								</li>
								<li>
									<a href="#" class="reply">Reply</a>
									<div class="user">
										<img src="../../assets_admin/img/user/8.jpg" alt="user">
										<span class="label offline"></span>
									</div>
									<div class="detail">
										<a href="#" class="name">Frank N. Stein</a>
										<p class="time">8:30PM, 05/12/2024</p>
										<p class="message">Please take a look and get order from table 06.</p>
									</div>
								</li>
								<li>
									<a href="#" class="reply">Reply</a>
									<div class="user">
										<img src="../../assets_admin/img/user/7.jpg" alt="user">
										<span class="label busy"></span>
									</div>
									<div class="detail">
										<a href="#" class="name">Frank N. Stein</a>
										<p class="time">8:30PM, 05/12/2024</p>
										<p class="message">Room 65 AC repair service is done.</p>
										<span class="download-files">
											<span class="download">
												<img src="../../assets_admin/img/facilities/1.png" alt="image">
												<a href="javascript:void(0)"><i class="ri-download-2-line"></i></a>
											</span>
										</span>
									</div>
								</li>
								<li>
									<a href="#" class="reply">Reply</a>
									<div class="user">
										<img src="../../assets_admin/img/user/6.jpg" alt="user">
										<span class="label busy"></span>
									</div>
									<div class="detail">
										<a href="#" class="name">Paige Turner</a>
										<p class="time">4:30PM, 12/12/2024</p>
										<p class="message">Take a Spa trainer interview.</p>
									</div>
								</li>
								<li>
									<a href="#" class="reply">Reply</a>
									<div class="user">
										<img src="../../assets_admin/img/user/5.jpg" alt="user">
										<span class="label busy"></span>
									</div>
									<div class="detail">
										<a href="#" class="name">Allie Grater</a>
										<p class="time">8:30PM, 05/12/2024</p>
										<p class="message">Take marketing module task.</p>
									</div>
								</li>
								<li class="check"><a class="lh-primary-btn" href="#">View all</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- main content -->
		<div class="lh-main-content">
			<div class="container-fluid">
				<!-- Page title & breadcrumb -->
				<div class="lh-page-title">
					<div class="lh-breadcrumb">
						<h5>Guest</h5>
						<ul>
							<li><a href="./index.php">Home</a></li>
							<li>Guest</li>
						</ul>
					</div>
					<div class="lh-tools">
						<a href="javascript:void(0)" title="Refresh" class="refresh"><i class="fa-solid fa-arrows-rotate"></i></a>
						<div id="pagedate">
							<div class="lh-date-range" title="Date">
								<span></span>
							</div>
						</div>
						<div class="filter">
							<div class="dropdown" title="Filter">
								<button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
									data-bs-toggle="dropdown" aria-expanded="false">
									<i class="fa-solid fa-arrow-down-short-wide"></i>
								</button>
								<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
									<li><a class="dropdown-item" href="#">Booking</a></li>
									<li><a class="dropdown-item" href="#">Revenue</a></li>
									<li><a class="dropdown-item" href="#">Expence</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xxl-3 col-xl-4 col-md-12">
						<div class="lh-card-sticky guest-card">
							<div class="lh-card">
								<div class="lh-card-content card-default">
									<div class="guest-profile">
										<img src="../../assets_admin/img/user/1.jpg" alt="profile">
										<h5>John Ritrow</h5>
										<p>#LH-2546</p>
									</div>
									<ul class="list">
										<li><i class="ri-phone-line"></i><span>+91 9876543210</span></li>
										<li><i class="ri-mail-line"></i><span>support@luxurious.com</span></li>
										<li><i class="ri-map-pin-line"></i><span>47 Street view, Lorence park, Gujarat,
												Bharat.</span></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xxl-9 col-xl-8 col-md-12">
						<div class="lh-card" id="bookingtbl">
							<div class="lh-card-header">
								<h4 class="lh-card-title">Booking Details</h4>
								<div class="header-tools">
									<a href="javascript:void(0)" class="lh-full-card">
										<i class="fa-solid fa-expand" title="Full Screen"></i></a>
								</div>
							</div>
							<div class="lh-card-content card-default">
								<div class="booking-details">
									<i class="fa-solid fa-house"></i>
									<span>
										<p>ID : #LH-2546</p>
										<h6>Deluxe King Double Bed</h6>
									</span>
								</div>
								<div class="booking-box">
									<div class="booking-info">
										<p><i class="ri-calendar-check-line"></i>checkIn</p>
										<h6>15/05/23</h6>
									</div>
									<div class="booking-info">
										<p><i class="ri-calendar-check-line"></i>checkOut</p>
										<h6>17/05/23</h6>
									</div>
									<div class="booking-info">
										<p><i class="ri-user-line"></i>Person</p>
										<h6>4 Person</h6>
									</div>
									<div class="booking-info">
										<p><i class="ri-hotel-bed-line"></i>Bed Type</p>
										<h6>Double</h6>
									</div>
									<div class="booking-info">
										<p><i class="ri-hotel-bed-line"></i>Rooms</p>
										<h6><span>101</span>, <span>102</span></h6>
									</div>
									<div class="booking-info">
										<p><i class="ri-pass-valid-line"></i>Proof</p>
										<h6>Pan Card</h6>
									</div>
								</div>
								<div class="facilities-details">
									<h6 class="lh-card-title">Room Facilities</h6>
									<div class="row">
										<div class="col-lg-3 col-md-6">
											<div class="facilities-info">
												<img src="../../assets_admin/img/facilities/1.png" alt="facilities">
												<p>Air Conditioner</p>
											</div>
										</div>
										<div class="col-lg-3 col-md-6">
											<div class="facilities-info">
												<img src="../../assets_admin/img/facilities/2.png" alt="facilities">
												<p>LED TV</p>
											</div>
										</div>
										<div class="col-lg-3 col-md-6">
											<div class="facilities-info">
												<img src="../../assets_admin/img/facilities/3.png" alt="facilities">
												<p>Breakfast</p>
											</div>
										</div>
										<div class="col-lg-3 col-md-6">
											<div class="facilities-info">
												<img src="../../assets_admin/img/facilities/4.png" alt="facilities">
												<p>GYM</p>
											</div>
										</div>
										<div class="col-lg-3 col-md-6">
											<div class="facilities-info">
												<img src="../../assets_admin/img/facilities/5.png" alt="facilities">
												<p>Parking</p>
											</div>
										</div>
										<div class="col-lg-3 col-md-6">
											<div class="facilities-info">
												<img src="../../assets_admin/img/facilities/6.png" alt="facilities">
												<p>Swimming Pool</p>
											</div>
										</div>
										<div class="col-lg-3 col-md-6">
											<div class="facilities-info">
												<img src="../../assets_admin/img/facilities/7.png" alt="facilities">
												<p>Restaurant</p>
											</div>
										</div>
										<div class="col-lg-3 col-md-6">
											<div class="facilities-info">
												<img src="../../assets_admin/img/facilities/8.png" alt="facilities">
												<p>Game zone</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-12 col-md-12">
						<div class="lh-card" id="bookingtbl">
							<div class="lh-card-header">
								<h4 class="lh-card-title">Bookings</h4>
								<div class="header-tools">
									<a href="javascript:void(0)" class="m-r-10 lh-full-card">
										<i class="fa-solid fa-expand" title="Full Screen"></i></a>
									<div class="lh-date-range dots">
										<i class="fa-solid fa-sliders"></i>
										<span></span>
									</div>
								</div>
							</div>
							<div class="lh-card-content card-default">
								<div class="booking-table">
									<div class="table-responsive">
										<table id="booking_table" class="table">
											<thead>
												<tr>
													<th>ID</th>
													<th>Room_Name</th>
													<th>CheckIn</th>
													<th>CheckOut</th>
													<th>Proof</th>
													<th>Payment</th>
													<th>Amount</th>
													<th>RoomNo</th>
													<th>Rooms</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td class="token">2650</td>
													<td><img class="cat-thumb" src="../../assets_admin/img/room/1.png"
															alt="clients Image"><span class="name">Deluxe King Double Bed</span>
													</td>
													<td>15/01/2024</td>
													<td>20/01/2024</td>
													<td>Passport</td>
													<td class="active">Cash</td>
													<td>$550</td>
													<td class="type"><span>VIP : </span>101, 102</td>
													<td class="rooms">
														<span class="mem">6 Member</span> /
														<span class="room">2 Room</span>
													</td>
													<td>
														<div class="d-flex justify-content-center">
															<button type="button" class="btn btn-outline-success"><i
																	class="ri-information-line"></i></button>
															<button type="button"
																class="btn btn-outline-success dropdown-toggle dropdown-toggle-split"
																data-bs-toggle="dropdown" aria-haspopup="true"
																aria-expanded="false" data-display="static">
																<span class="sr-only"><i
																		class="ri-settings-3-line"></i></span>
															</button>
															<div class="dropdown-menu">
																<a class="dropdown-item" href="#">Edit</a>
																<a class="dropdown-item" href="#">Delete</a>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td class="token">2650</td>
													<td><img class="cat-thumb" src="../../assets_admin/img/room/2.png"
															alt="clients Image"><span class="name">VIP King Double Bed</span></td>
													<td>19/04/2024</td>
													<td>29/04/2024</td>
													<td>Pan Card</td>
													<td class="close">Cheque</td>
													<td>$200</td>
													<td class="type"><span>Junior : </span>105</td>
													<td class="rooms">
														<span class="mem">4 Member</span> /
														<span class="room">1 Room</span>
													</td>
													<td>
														<div class="d-flex justify-content-center">
															<button type="button" class="btn btn-outline-success"><i
																	class="ri-information-line"></i></button>
															<button type="button"
																class="btn btn-outline-success dropdown-toggle dropdown-toggle-split"
																data-bs-toggle="dropdown" aria-haspopup="true"
																aria-expanded="false" data-display="static">
																<span class="sr-only"><i
																		class="ri-settings-3-line"></i></span>
															</button>
															<div class="dropdown-menu">
																<a class="dropdown-item" href="#">Edit</a>
																<a class="dropdown-item" href="#">Delete</a>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td class="token">2365</td>
													<td><img class="cat-thumb" src="../../assets_admin/img/room/3.png"
															alt="clients Image"><span class="name">Junior Suites Double Bed</span></td>
													<td>01/07/2024</td>
													<td>02/07/2024</td>
													<td>Pan Card</td>
													<td class="pending">Pending</td>
													<td>$400</td>
													<td class="type"><span>VVIP : </span>107</td>
													<td class="rooms">
														<span class="mem">2 Member</span> /
														<span class="room">1 Room</span>
													</td>
													<td>
														<div class="d-flex justify-content-center">
															<button type="button" class="btn btn-outline-success"><i
																	class="ri-information-line"></i></button>
															<button type="button"
																class="btn btn-outline-success dropdown-toggle dropdown-toggle-split"
																data-bs-toggle="dropdown" aria-haspopup="true"
																aria-expanded="false" data-display="static">
																<span class="sr-only"><i
																		class="ri-settings-3-line"></i></span>
															</button>
															<div class="dropdown-menu">
																<a class="dropdown-item" href="#">Edit</a>
																<a class="dropdown-item" href="#">Delete</a>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td class="token">2205</td>
													<td><img class="cat-thumb" src="../../assets_admin/img/room/4.png"
															alt="clients Image"><span class="name">Deluxe King Double Bed</span></td>
													<td>01/07/2024</td>
													<td>02/07/2024</td>
													<td>Adhar Card</td>
													<td class="success">Gpay</td>
													<td>$1200</td>
													<td class="type"><span>Premium :</span> 103, 104, <span>Delux : </span>106</td>
													<td class="rooms">
														<span class="mem">12 Member</span> /
														<span class="room">3 Room</span>
													</td>
													<td>
														<div class="d-flex justify-content-center">
															<button type="button" class="btn btn-outline-success"><i
																	class="ri-information-line"></i></button>
															<button type="button"
																class="btn btn-outline-success dropdown-toggle dropdown-toggle-split"
																data-bs-toggle="dropdown" aria-haspopup="true"
																aria-expanded="false" data-display="static">
																<span class="sr-only"><i
																		class="ri-settings-3-line"></i></span>
															</button>
															<div class="dropdown-menu">
																<a class="dropdown-item" href="#">Edit</a>
																<a class="dropdown-item" href="#">Delete</a>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td class="token">2187</td>
													<td><img class="cat-thumb" src="../../assets_admin/img/room/5.png"
															alt="clients Image"><span class="name">VVIP Queen Double Bed</span>
													</td>
													<td>22/03/2024</td>
													<td>05/04/2024</td>
													<td>Passport</td>
													<td class="active">Cash</td>
													<td>$1200</td>
													<td class="type"><span>Delux : </span>108</td>
													<td class="rooms">
														<span class="mem">1 Member</span> /
														<span class="room">1 Room</span>
													</td>
													<td>
														<div class="d-flex justify-content-center">
															<button type="button" class="btn btn-outline-success"><i
																	class="ri-information-line"></i></button>
															<button type="button"
																class="btn btn-outline-success dropdown-toggle dropdown-toggle-split"
																data-bs-toggle="dropdown" aria-haspopup="true"
																aria-expanded="false" data-display="static">
																<span class="sr-only"><i
																		class="ri-settings-3-line"></i></span>
															</button>
															<div class="dropdown-menu">
																<a class="dropdown-item" href="#">Edit</a>
																<a class="dropdown-item" href="#">Delete</a>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td class="token">2050</td>
													<td><img class="cat-thumb" src="../../assets_admin/img/room/6.png"
															alt="clients Image"><span class="name">Deluxe King Double Bed</span>
													</td>
													<td>09/09/2022</td>
													<td>15/09/2022</td>
													<td>Adhar Card</td>
													<td class="close">Cheque</td>
													<td>$1560</td>
													<td class="type"><span>VIP : </span>203</td>
													<td class="rooms">
														<span class="mem">2 Member</span> /
														<span class="room">1 Room</span>
													</td>
													<td>
														<div class="d-flex justify-content-center">
															<button type="button" class="btn btn-outline-success"><i
																	class="ri-information-line"></i></button>
															<button type="button"
																class="btn btn-outline-success dropdown-toggle dropdown-toggle-split"
																data-bs-toggle="dropdown" aria-haspopup="true"
																aria-expanded="false" data-display="static">
																<span class="sr-only"><i
																		class="ri-settings-3-line"></i></span>
															</button>
															<div class="dropdown-menu">
																<a class="dropdown-item" href="#">Edit</a>
																<a class="dropdown-item" href="#">Delete</a>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td class="token">1995</td>
													<td><img class="cat-thumb" src="../../assets_admin/img/room/2.png"
															alt="clients Image"><span class="name">Junior Double Bed</span>
													</td>
													<td>16/08/2024</td>
													<td>20/08/2024</td>
													<td>Pan Card</td>
													<td class="success">Gpay</td>
													<td>$1560</td>
													<td class="type"><span>VIP : </span>204, <span>Junior : </span>401, 402</td>
													<td class="rooms">
														<span class="mem">6 Member</span> /
														<span class="room">3 Room</span>
													</td>
													<td>
														<div class="d-flex justify-content-center">
															<button type="button" class="btn btn-outline-success"><i
																	class="ri-information-line"></i></button>
															<button type="button"
																class="btn btn-outline-success dropdown-toggle dropdown-toggle-split"
																data-bs-toggle="dropdown" aria-haspopup="true"
																aria-expanded="false" data-display="static">
																<span class="sr-only"><i
																		class="ri-settings-3-line"></i></span>
															</button>
															<div class="dropdown-menu">
																<a class="dropdown-item" href="#">Edit</a>
																<a class="dropdown-item" href="#">Delete</a>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td class="token">1985</td>
													<td><img class="cat-thumb" src="../../assets_admin/img/room/4.png"
															alt="clients Image"><span class="name">Deluxe King Double Bed</span>
													</td>
													<td>19/12/2021</td>
													<td>25/12/2021</td>
													<td>Pan Card</td>
													<td class="success">Gpay</td>
													<td>$1560</td>
													<td class="type"><span>Deluxe : </span>104, <span>Junior : </span>401, 402</td>
													<td class="rooms">
														<span class="mem">10 Member</span> /
														<span class="room">4 Room</span>
													</td>
													<td>
														<div class="d-flex justify-content-center">
															<button type="button" class="btn btn-outline-success"><i
																	class="ri-information-line"></i></button>
															<button type="button"
																class="btn btn-outline-success dropdown-toggle dropdown-toggle-split"
																data-bs-toggle="dropdown" aria-haspopup="true"
																aria-expanded="false" data-display="static">
																<span class="sr-only"><i
																		class="ri-settings-3-line"></i></span>
															</button>
															<div class="dropdown-menu">
																<a class="dropdown-item" href="#">Edit</a>
																<a class="dropdown-item" href="#">Delete</a>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td class="token">1945</td>
													<td><img class="cat-thumb" src="../../assets_admin/img/room/6.png"
															alt="clients Image"><span class="name">VIP Double Bed</span>
													</td>
													<td>25/02/2024</td>
													<td>25/02/2024</td>
													<td>Pan Card</td>
													<td class="pending">pending</td>
													<td>$400</td>
													<td class="type"><span>VIP : </span>104</td>
													<td class="rooms">
														<span class="mem">1 Member</span> /
														<span class="room">1 Room</span>
													</td>
													<td>
														<div class="d-flex justify-content-center">
															<button type="button" class="btn btn-outline-success"><i
																	class="ri-information-line"></i></button>
															<button type="button"
																class="btn btn-outline-success dropdown-toggle dropdown-toggle-split"
																data-bs-toggle="dropdown" aria-haspopup="true"
																aria-expanded="false" data-display="static">
																<span class="sr-only"><i
																		class="ri-settings-3-line"></i></span>
															</button>
															<div class="dropdown-menu">
																<a class="dropdown-item" href="#">Edit</a>
																<a class="dropdown-item" href="#">Delete</a>
															</div>
														</div>
													</td>
												</tr>
												<tr>
													<td class="token">1865</td>
													<td><img class="cat-thumb" src="../../assets_admin/img/room/1.png"
															alt="clients Image"><span class="name">Deluxe King Double Bed</span>
													</td>
													<td>28/02/2024</td>
													<td>05/03/2024</td>
													<td>Passport</td>
													<td class="active">Cash</td>
													<td>$800</td>
													<td class="type"><span>Deluxe : </span>304, 305</td>
													<td class="rooms">
														<span class="mem">7 Member</span> /
														<span class="room">2 Room</span>
													</td>
													<td>
														<div class="d-flex justify-content-center">
															<button type="button" class="btn btn-outline-success"><i
																	class="ri-information-line"></i></button>
															<button type="button"
																class="btn btn-outline-success dropdown-toggle dropdown-toggle-split"
																data-bs-toggle="dropdown" aria-haspopup="true"
																aria-expanded="false" data-display="static">
																<span class="sr-only"><i
																		class="ri-settings-3-line"></i></span>
															</button>
															<div class="dropdown-menu">
																<a class="dropdown-item" href="#">Edit</a>
																<a class="dropdown-item" href="#">Delete</a>
															</div>
														</div>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Footer -->
		<footer>
			<div class="container-fluid">
				<div class="copyright">
					<p>
						<span id="copyright_year"></span>
						<span style="margin-left: 22px"> Nhóm 24</span>
					</p>
				</div>
			</div>
		</footer>

		<!-- Feature tools -->
		<div class="lh-tools-sidebar-overlay"></div>
		<div class="lh-tools-sidebar">
			<a href="javascript:void(0)" class="lh-tools-sidebar-toggle in-out">
				<i class="ri-settings-4-line"></i>
			</a>
			<div class="lh-bar-title">
				<h6>Tools</h6>
				<a href="javascript:void(0)" class="close-tools"><i class="ri-close-line"></i></a>
			</div>
			<div class="lh-tools-detail">
				<div class="lh-tools-block">
					<h3>Modes</h3>
					<div class="lh-tools-info">
						<div class="lh-tools-item mode active" data-lh-mode-tool="light">
							<img src="../../assets_admin/img/tools/light.png" alt="light">
							<p>light</p>
						</div>
						<div class="lh-tools-item mode" data-lh-mode-tool="dark">
							<img src="../../assets_admin/img/tools/dark.png" alt="dark">
							<p>dark</p>
						</div>
					</div>
				</div>
				<div class="lh-tools-block">
					<h3>Sidebar</h3>
					<div class="lh-tools-info">
						<div class="lh-tools-item sidebar active" data-sidebar-mode-tool="light">
							<img src="../../assets_admin/img/tools/side-light.png" alt="light">
							<p>light</p>
						</div>
						<div class="lh-tools-item sidebar" data-sidebar-mode-tool="dark">
							<img src="../../assets_admin/img/tools/side-dark.png" alt="dark">
							<p>dark</p>
						</div>
						<div class="lh-tools-item sidebar" data-sidebar-mode-tool="bg-1">
							<img src="../../assets_admin/img/tools/side-bg-1.png" alt="background">
							<p>Bg-1</p>
						</div>
						<div class="lh-tools-item sidebar" data-sidebar-mode-tool="bg-2">
							<img src="../../assets_admin/img/tools/side-bg-2.png" alt="background">
							<p>Bg-2</p>
						</div>
						<div class="lh-tools-item sidebar" data-sidebar-mode-tool="bg-3">
							<img src="../../assets_admin/img/tools/side-bg-3.png" alt="background">
							<p>Bg-3</p>
						</div>
						<div class="lh-tools-item sidebar" data-sidebar-mode-tool="bg-4">
							<img src="../../assets_admin/img/tools/side-bg-4.png" alt="background">
							<p>Bg-4</p>
						</div>
					</div>
				</div>
				<div class="lh-tools-block">
					<h3>Header</h3>
					<div class="lh-tools-info">
						<div class="lh-tools-item header active" data-header-mode="light">
							<img src="../../assets_admin/img/tools/header-light.png" alt="light">
							<p>light</p>
						</div>
						<div class="lh-tools-item header" data-header-mode="dark">
							<img src="../../assets_admin/img/tools/header-dark.png" alt="dark">
							<p>dark</p>
						</div>
					</div>
				</div>
				<div class="lh-tools-block">
					<h3>Backgrounds</h3>
					<div class="lh-tools-info">
						<div class="lh-tools-item bg active" data-bg-mode="default">
							<img src="../../assets_admin/img/tools/bg-0.png" alt="default">
							<p>Default</p>
						</div>
						<div class="lh-tools-item bg" data-bg-mode="bg-1">
							<img src="../../assets_admin/img/tools/bg-1.png" alt="bg-1">
							<p>Bg-1</p>
						</div>
						<div class="lh-tools-item bg" data-bg-mode="bg-2">
							<img src="../../assets_admin/img/tools/bg-2.png" alt="bg-2">
							<p>Bg-2</p>
						</div>
						<div class="lh-tools-item bg" data-bg-mode="bg-3">
							<img src="../../assets_admin/img/tools/bg-3.png" alt="bg-3">
							<p>Bg-3</p>
						</div>
						<div class="lh-tools-item bg" data-bg-mode="bg-4">
							<img src="../../assets_admin/img/tools/bg-4.png" alt="bg-4">
							<p>Bg-4</p>
						</div>
						<div class="lh-tools-item bg" data-bg-mode="bg-5">
							<img src="../../assets_admin/img/tools/bg-5.png" alt="bg-5">
							<p>Bg-5</p>
						</div>
					</div>
				</div>
				<div class="lh-tools-block">
					<h3>Box Design</h3>
					<div class="lh-tools-info">
						<div class="lh-tools-item box active" data-box-mode-tool="default">
							<img src="../../assets_admin/img/tools/box-0.png" alt="default">
							<p>Default</p>
						</div>
						<div class="lh-tools-item box" data-box-mode-tool="box-1">
							<img src="../../assets_admin/img/tools/box-1.png" alt="box-1">
							<p>Box-1</p>
						</div>
						<div class="lh-tools-item box" data-box-mode-tool="box-2">
							<img src="../../assets_admin/img/tools/box-2.png" alt="box-2">
							<p>Box-2</p>
						</div>
						<div class="lh-tools-item box" data-box-mode-tool="box-3">
							<img src="../../assets_admin/img/tools/box-3.png" alt="box-3">
							<p>Box-3</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>

	<!-- Vendor Custom -->
	<script src="../../assets_admin/js/vendor/jquery-3.6.4.min.js"></script>
	<script src="../../assets_admin/js/vendor/simplebar.min.js"></script>
	<script src="../../assets_admin/js/vendor/bootstrap.bundle.min.js"></script>

	<script src="../../assets_admin/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
	<script src="../../assets_admin/js/vendor/jquery-jvectormap-world-mill-en.js"></script>
	<!-- Data Tables -->
	<script src='../../assets_admin/js/vendor/jquery.datatables.min.js'></script>
	<script src='../../assets_admin/js/vendor/datatables.bootstrap5.min.js'></script>
	<script src='../../assets_admin/js/vendor/datatables.responsive.min.js'></script>
	<!-- Caleddar -->
	<script src="../../assets_admin/js/vendor/jquery.simple-calendar.js"></script>
	<!-- Date Range Picker -->
	<script src="../../assets_admin/js/vendor/moment.min.js"></script>
	<script src="../../assets_admin/js/vendor/daterangepicker.js"></script>
	<script src="../../assets_admin/js/vendor/date-range.js"></script>

	<!-- Main Custom -->
	<script src="../../assets_admin/js/main.js"></script>

	<!-- Main Custom -->

</body>


<!-- Mirrored from maraviyainfotech.com/projects/luxurious-html-v22/admin/./guest-details.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Jan 2025 15:13:54 GMT -->

</html>
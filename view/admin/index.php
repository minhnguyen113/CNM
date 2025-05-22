<?php
session_start();


error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_SESSION['success'])) {
	$successMessage = $_SESSION['success'];
	unset($_SESSION['success']);
} else {
	$successMessage = '';
}

?>

<!--
    Item Name: Luxurious - Hotel Booking HTML Template + Admin Dashboard.
    Author: ashishmaraviya
    Version: 2.2.0
    Copyright 2024
	Author URI: https://themeforest.net/user/ashishmaraviya
-->
<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from maraviyainfotech.com/projects/luxurious-html-v22/admin/./index.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Jan 2025 15:13:20 GMT -->

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
	<?php
	include('./head-resource-ad.php');
	?>
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
									<img class="user" id="user-img"
										src="<?php echo !empty($data['HinhAnh']) ? '../../assets_admin/img/user/' . htmlspecialchars($data['HinhAnh']) : '../../assets_admin/img/user/minh.jpg'; ?>"
										alt="user">
								</div>
								<div class="lh-hover-drop-panel right">
									<div class="details">
										<ul class="border-top" style="margin-top:-20px;">
											<li><a href="./team-profile.php">Thông tin</a></li>

										</ul>
										<ul class="border-top">
											<li><a href="../customer/login.php"><i
														class="ri-logout-circle-r-line"></i>Đăng xuất</a></li>
										</ul>
									</div>
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
				<a href="./index.php" class="sb-full"><img src="../../assets_admin/img/logo/logo2.png" alt="logo"
						style="width:326px;text-align:center;margin-left:-60px"></a>
				<a href="./index.php" class="sb-collapse"><img src="../../assets_admin/img/logo/collapse-logo.png"
						alt="logo"></a>
			</div>
			<div class="lh-sb-wrapper">
				<div class="lh-sb-content">
					<ul class="lh-sb-list">
						<li class="lh-sb-item sb-drop-item">
							<a href="javascript:void(0)" class="lh-drop-toggle">
								<i class="fa-regular fa-clock"></i>
								<span class="condense">Bảng Điều Khiển<i
										class="drop-arrow fa-regular fa-circle-left"></i></span>
							</a>
							<ul class="lh-sb-drop condense">
								<li class="list"><a href="./index.php" class="lh-page-link drop">
										<i class="fa-solid fa-code-commit"></i>Report</a></li>
							</ul>
						</li>
						<li class="lh-sb-item-separator">
							<?php
							include('./setRole.php');
							?>

						</li>


					</ul>
				</div>
			</div>
			<div class="lh-sb-content">
				<ul class="lh-sb-list">
					<li class="lh-sb-item sb-drop-item">
						<a href="javascript:void(0)" class="lh-drop-toggle">
							<i class="fa-regular fa-clock"></i>
							<span class="condense">Bảng Điều Khiển<i
									class="drop-arrow fa-regular fa-circle-left"></i></span>
						</a>
						<ul class="lh-sb-drop condense">
							<li class="list"><a href="./index.php" class="lh-page-link drop">
									<i class="fa-solid fa-code-commit"></i>Report</a></li>
						</ul>
					</li>
					<li class="lh-sb-item-separator"></li>

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
						<h5>Dashboard</h5>
						<ul>
							<li><a href="./index.php">Home</a>
								<i class="fa-solid fa-chevron-right"></i>
							</li>
							<li>Dashboard</li>
						</ul>
					</div>
					<div class="lh-tools">
						<a href="javascript:void(0)" title="Refresh" id="refreshBtn" class="refresh">
							<i class="fa-solid fa-arrows-rotate"></i>
						</a>
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
				<!-- ROW 1: 4 BIỂU ĐỒ MINI -->
				<div class="row">
					<!-- Món ăn -->
					<div class="col-xl-3 col-md-6">
						<div class="lh-card lh-card-1">
							<div class="lh-card-content label-card">
								<div class="title">
									<div class="growth-numbers">
										<h4>Tổng số món ăn</h4>
										<h5 id="visitor-total">0</h5>
										<p class="text-muted" style="font-size: 13px;">
											<i class="ri-arrow-up-line"></i>
											<span id="visitor-growth">+0%</span> so với tháng trước
										</p>
									</div>
									<span class="icon"><i class="ri-restaurant-line"></i></span>
								</div>
								<div class="mini-chart">
									<div id="chart-visitor"></div>
								</div>
							</div>
						</div>
					</div>

					<!-- Đặt bàn -->
					<div class="col-xl-3 col-md-6">
						<div class="lh-card lh-card-2">
							<div class="lh-card-content label-card">
								<div class="title">
									<div class="growth-numbers">
										<h4>Lượt đặt bàn</h4>
										<h5 id="bookings-total">0</h5>
										<p class="text-muted" style="font-size: 13px;">
											<i class="ri-arrow-down-line"></i>
											<span id="bookings-growth">-0%</span> so với tháng trước
										</p>
									</div>
									<span class="icon"><i class="ri-calendar-check-line"></i></span>
								</div>
								<div class="mini-chart">
									<div id="chart-bookings"></div>
								</div>
							</div>
						</div>
					</div>

					<!-- Doanh thu -->
					<div class="col-xl-3 col-md-6">
						<div class="lh-card lh-card-3">
							<div class="lh-card-content label-card">
								<div class="title">
									<div class="growth-numbers">
										<h4>Doanh thu</h4>
										<h5 id="revenue-total">0 đ</h5>
										<p class="text-muted" style="font-size: 13px;">
											<i class="ri-arrow-up-line"></i>
											<span id="revenue-growth">+0%</span> so với tháng trước
										</p>
									</div>
									<span class="icon"><i class="ri-money-dollar-circle-line"></i></span>
								</div>
								<div class="mini-chart">
									<div id="chart-revenue"></div>
								</div>
							</div>
						</div>
					</div>

					<!-- Top món -->
					<div class="col-xl-3 col-md-6">
						<div class="lh-card lh-card-4">
							<div class="lh-card-content label-card">
								<div class="title">
									<div class="growth-numbers">
										<h4>Top món được chọn</h4>
										<h5>
											<span id="rooms-available">0</span> món / <span
												id="rooms-total">tháng</span>
										</h5>
										<p class="text-muted" style="font-size: 13px;">
											Món bán chạy nhất: <strong><span id="rooms-topname">---</span></strong>
										</p>
										<p class="text-muted" style="font-size: 13px;">
											<i class="ri-arrow-up-line"></i>
											<span id="rooms-growth">+0%</span> so với tháng trước
										</p>
									</div>
									<span class="icon"><i class="ri-star-line"></i></span>
								</div>
								<div class="mini-chart">
									<div id="chart-rooms"></div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- ROW 2: 2 BIỂU ĐỒ CHÍNH -->
				<div class="row">
					<!-- Biểu đồ Tổng quan -->
					<div class="col-xl-8 col-md-12">
						<div class="lh-card">
							<div class="lh-card-header">
								<h4 class="lh-card-title">Biểu đồ tổng quan theo tháng</h4>
							</div>
							<div class="lh-card-content">
								<div id="chart-overview" style="height: 350px;"></div>
							</div>
						</div>
					</div>

					<!-- Top 5 thực đơn bán chạy -->
					<div class="col-xl-4 col-md-12">
						<div class="lh-card">
							<div class="lh-card-header">
								<h4 class="lh-card-title">Top 5 thực đơn bán chạy nhất</h4>
							</div>
							<div class="lh-card-content">
								<div id="chart-top-menus" style="height: 350px;"></div>
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
				<i class="fa-solid fa-gear"></i>
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
	<?php
	include('../customer/chatbot.php');
	include('./footer-scripts-ad.php');
	?>

	<!-- Vendor Custom -->

</body>
<style>
	#user-img {
		width: 40px;
		/* Kích thước nhỏ lại */
		height: 40px;
		border-radius: 50%;
		/* Bo tròn thành hình tròn */
		object-fit: cover;
		/* Cắt ảnh để vừa khung */
		border: 2px solid #fff;
	}
</style>

<!-- Mirrored from maraviyainfotech.com/projects/luxurious-html-v22/admin/./index.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Jan 2025 15:13:42 GMT -->

// Remove the unnecessary

</html> tag
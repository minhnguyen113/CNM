<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from maraviyainfotech.com/projects/luxurious-html-v22/admin/alert-popup.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Jan 2025 15:13:59 GMT -->
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
		<div id="lh-overlay">
			<div class="lh-ellipsis">
				<div></div>
				<div></div>
				<div></div>
				<div></div>
			</div>
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
								<img class="user" id="user-img" src="<?php echo !empty($data['HinhAnh']) ? '../../assets_admin/img/user/' . htmlspecialchars($data['HinhAnh']) : '../../assets_admin/img/user/minh.jpg'; ?>" alt="user">
								</div>
								<div class="lh-hover-drop-panel right">
									<div class="details">
									<ul class="border-top" style="margin-top:-20px;">
										<li><a href="./team-profile.php">Thông tin</a></li>

									</ul>
									<ul class="border-top">
										<li><a href="../customer/login.php"><i class="ri-logout-circle-r-line"></i>Đăng xuất</a></li>
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
								include('./setRole.php');
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
							<a href="./list-customer.php" class="lh-page-link">
								<i class="fa-solid fa-user-group"></i><span class="condense"><span
										class="hover-title">Khách hàng</span> </span>
							</a>
						</li>
						<li class="lh-sb-item">
							<a href="./customer-details.php" class="lh-page-link">
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
				<div class="lh-page-title lh-page-title-2">
					<div class="lh-breadcrumb">
						<h5>Alert Popup</h5>
						<ul>
							<li><a href="./index.php">Luxurious</a></li>
							<li>Alert Popup</li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-12">
						<div class="lh-card">
							<div class="lh-card-content label-card">
								<div class="alert-popup">
									<ul>
										<li>A basic message<button class="pop-basic lh-btn-primary">Click</button></li>
										<li>A Success message<button class="pop-success lh-btn-primary">Click</button></li>
										<li>A title with a text under<button class="pop-text-under lh-btn-primary">Click</button></li>
										<li>A modal with a title, an error icon, a text, and a footer<button class="pop-error-icon lh-btn-primary">Click</button></li>
										<li>A modal window with a long content inside:<button class="pop-long-content lh-btn-primary">Click</button></li>
										<li>Custom HTML description and buttons with ARIA labels<button class="pop-like lh-btn-primary">Click</button></li>
										<li>A dialog with three buttons<button class="pop-save lh-btn-primary">Click</button></li>
										<li>A custom positioned dialog<button class="pop-positioned-timeout lh-btn-primary">Click</button></li>
										<li>Custom animation with Animate.css<button class="pop-fade-down lh-btn-primary">Click</button></li>
										<li>A confirm dialog, with a function attached to the "Confirm"-button<button class="pop-delete lh-btn-primary">Click</button></li>
										<li>By passing a parameter, you can execute something else for "Cancel"<button class="pop-delete-cancel lh-btn-primary">Click</button></li>
										<li>A message with a custom image<button class="pop-img lh-btn-primary">Click</button></li>
										<li>A message with custom width, padding, background<button class="pop-custom lh-btn-primary">Click</button></li>
										<li>A message with auto close timer<button class="pop-auto-close lh-btn-primary">Click</button></li>
										<li>Right-to-left support for Arabic, Persian, Hebrew, and other RTL languages<button class="pop-rtl lh-btn-primary">Click</button></li>
										<li>AJAX request example<button class="pop-ajax lh-btn-primary">Click</button></li>
									</ul>
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
	</body>


<!-- Mirrored from maraviyainfotech.com/projects/luxurious-html-v22/admin/alert-popup.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Jan 2025 15:13:59 GMT -->
</html>
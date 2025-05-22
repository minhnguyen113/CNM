<?php
session_start();
include_once('../../controller/cDonHang.php');
$donHang = new DonHangController();
include_once("../../controller/cThanhToan.php");
$ttController = new cThanhToan();
// Xử lý đổi trạng thái đơn hàng
if (isset($_GET['xacnhan'])) {
	$donHang->updateTrangThai($_GET['xacnhan'], 'Đã xác nhận');
	header('Location: invoice.php');
	exit;
}
if (isset($_GET['chebien'])) {
	$donHang->updateTrangThai($_GET['chebien'], 'Đang chế biến');
	header('Location: invoice.php');
	exit;
}
if (isset($_GET['giaohang'])) {
	$donHang->updateTrangThai($_GET['giaohang'], 'Đang giao hàng');
	header('Location: invoice.php');
	exit;
}
if (isset($_GET['thanhtoan'])) {
	$donHang->updateTrangThai($_GET['thanhtoan'], 'Đã thanh toán');
	header('Location: invoice.php');
	exit;
}
if (isset($_GET['hoanthanh'])) {
	$donHang->updateTrangThai($_GET['hoanthanh'], 'Đã hoàn thành');
	header('Location: invoice.php');
	exit;
}
if (isset($_GET['huy'])) {
	$donHang->updateTrangThai($_GET['huy'], 'Đã hủy');
	header('Location: invoice.php');
	exit;
}
if (isset($_GET['xoa'])) {
	$donHang->deleteDonHang($_GET['xoa']);
	header('Location: invoice.php');
	exit;
}

$ds = $donHang->getAll();
$ct = [];
$donHangDetail = null;
$user = null;
if (isset($_GET['id'])) {
	$ct = $donHang->getChiTiet($_GET['id']);
	$donHangDetail = $donHang->getById($_GET['id']);
	if ($donHangDetail && !empty($donHangDetail['ID_User'])) {
		include_once("../../controller/cUser.php");
		$userController = new UserController();
		// Thử lấy theo khách hàng
		$userResult = $userController->StaffGetCustomerById($donHangDetail['ID_User']);
		if (!$userResult || mysqli_num_rows($userResult) == 0) {
			// Nếu không phải khách hàng, thử lấy theo nhân viên
			$userResult = $userController->StaffGetUserById($donHangDetail['ID_User']);
		}
		if ($userResult && mysqli_num_rows($userResult) > 0) {
			$user = mysqli_fetch_assoc($userResult);
		}
	}

	// Tính tổng tiền, khuyến mãi, thành tiền sau khuyến mãi
	$tong = 0;
	foreach ($ct as $c) {
		$tong += $c['SoLuongMon'] * $c['Gia'];
	}
	$giamGia = 0;
	$tenKhuyenMai = '';
	if ($donHangDetail && !empty($donHangDetail['ID_KhuyenMai'])) {
		include_once("../../controller/cKhuyenMai.php");
		$kmController = new KhuyenMaiController();
		$km = $kmController->getKhuyenMaiById($donHangDetail['ID_KhuyenMai']);
		if ($km) {
			$tenKhuyenMai = $km['TenKhuyenMai'];
			$giamGia = $km['GiamGia'];
		}
	}
	$soTienGiam = $tong * $giamGia / 100;
	$tongTienSauKM = $tong - $soTienGiam;
}

$phuongThuc = '';
if ($donHangDetail && !empty($donHangDetail['ID_DonHang'])) {
	$phuongThuc = $ttController->getPhuongThucByDonHang($donHangDetail['ID_DonHang']);
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from maraviyainfotech.com/projects/luxurious-html-v22/admin/invoice.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Jan 2025 15:13:54 GMT -->

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

					</ul>
				</div>
			</div>
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
				<div class="lh-page-title">
					<div class="lh-breadcrumb">
						<h5>Danh sách hoá đơn</h5>
						<ul>
							<li><a href="./index.php">Trang chủ</a></li>
							<li>Danh sách</li>
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

				<div class="row">
					<div class="col-md-12">
						<table class="invoice-table">
							<tr>
								<th>ID</th>
								<th>Tổng tiền</th>
								<th>ID User</th>
								<th>Trạng thái</th>
								<th>Thời gian</th>
								<th>Thao tác</th>
							</tr>
							<?php foreach ($ds as $row): ?>
								<tr>
									<td><?= $row['ID_DonHang'] ?></td>
									<td><?= number_format($row['TongTien']) ?> VND</td>
									<td><?= $row['ID_User'] ?></td>
									<td>
										<?php
										$color = 'gray';
										switch ($row['TrangThai']) {
											case 'Chờ xử lý':
												$color = '#ffa500';
												break;
											case 'Đã xác nhận':
												$color = '#1e90ff';
												break;
											case 'Đang chế biến':
												$color = '#9370db';
												break;
											case 'Đang giao hàng':
												$color = '#ffd700';
												break;
											case 'Đã thanh toán':
												$color = '#16a34a';
												break;
											case 'Đã hoàn thành':
												$color = '#6b7280';
												break;
											case 'Đã hủy':
												$color = '#dc2626';
												break;
										}
										?>
										<span class="status-badge" style="background: <?= $color ?>">
											<?= $row['TrangThai'] ?>
										</span>
									</td>
									<td><?= $row['ThoiGianDat'] ?></td>
									<td class="action-links">
										<a href="?id=<?= $row['ID_DonHang'] ?>">Xem</a>
										<?php if ($row['TrangThai'] == 'Chờ xử lý'): ?>
											| <a href="?xacnhan=<?= $row['ID_DonHang'] ?>">Xác nhận</a>
											| <a href="?huy=<?= $row['ID_DonHang'] ?>" onclick="return confirm('Hủy đơn hàng này?')">Hủy</a>
										<?php elseif ($row['TrangThai'] == 'Đã xác nhận'): ?>
											| <a href="?chebien=<?= $row['ID_DonHang'] ?>">Chế biến</a>
										<?php elseif ($row['TrangThai'] == 'Đang chế biến'): ?>
											| <a href="?giaohang=<?= $row['ID_DonHang'] ?>">Đang giao hàng</a>
										<?php elseif ($row['TrangThai'] == 'Đang giao hàng'): ?>
											| <a href="?thanhtoan=<?= $row['ID_DonHang'] ?>">Đã thanh toán</a>
										<?php elseif ($row['TrangThai'] == 'Đã thanh toán'): ?>
											| <a href="?hoanthanh=<?= $row['ID_DonHang'] ?>">Hoàn thành</a>
										<?php endif; ?>
										<?php if ($row['TrangThai'] == 'Đã hoàn thành' || $row['TrangThai'] == 'Đã hủy'): ?>
											| <a href="?xoa=<?= $row['ID_DonHang'] ?>" onclick="return confirm('Bạn có chắc muốn xóa đơn hàng này?');">Xóa</a>
										<?php endif; ?>
									</td>
								</tr>
							<?php endforeach; ?>
						</table>

						<?php if ($ct): ?>
							<div class="invoice-center">
								<div class="detail-box">
									<span class="detail-title">Chi tiết đơn hàng #<?= htmlspecialchars($_GET['id']) ?></span>
									<span class="detail-close" onclick="window.location='invoice.php'">[Đóng]</span>
									<div style="margin-bottom:12px;"><span class="detail-label">Ngày đặt:</span> <span class="detail-value"><?= date('d/m/Y H:i', strtotime($donHangDetail['ThoiGianDat'])) ?></span></div>
									<div style="margin-bottom:12px;"><span class="detail-label">Trạng thái:</span> <span class="detail-status" style="background: <?= ($donHangDetail['TrangThai'] === 'Đã thanh toán' ? '#16a34a' : ($donHangDetail['TrangThai'] === 'Đã hoàn thành' ? '#6b7280' : ($donHangDetail['TrangThai'] === 'Đã hủy' ? '#dc2626' : '#2563eb'))) ?>;">
											<?= htmlspecialchars($donHangDetail['TrangThai']) ?></span></div>
									<?php if ($user && isset($user['ID_User'])): ?>
										<div style="margin-bottom:10px;"><span class="detail-label">Mã khách:</span> <span class="detail-value"><?= htmlspecialchars($user['ID_User']) ?></span></div>
										<div style="margin-bottom:10px;"><span class="detail-label">Họ tên:</span> <span class="detail-value"><?= htmlspecialchars($user['TenUser']) ?></span></div>
										<div style="margin-bottom:10px;"><span class="detail-label">Số điện thoại:</span> <span class="detail-value"><?= htmlspecialchars($user['SoDienThoai']) ?></span></div>
										<div style="margin-bottom:10px;"><span class="detail-label">Email:</span> <span class="detail-value"><?= htmlspecialchars($user['Email']) ?></span></div>
										<div style="margin-bottom:10px;"><span class="detail-label">Địa chỉ:</span> <span class="detail-value"><?= htmlspecialchars($user['DiaChi']) ?></span></div>
									<?php else: ?>
										<div style="margin-bottom:10px; color:#e11d48; font-weight:bold;">Đơn hàng này không có thông tin khách hàng.</div>
									<?php endif; ?>
									<div style="margin-bottom:10px;"><span class="detail-label">Phương thức thanh toán:</span> <span class="detail-value"><?= $phuongThuc ? htmlspecialchars($phuongThuc) : 'Chưa cập nhật' ?></span></div>
									<table class="detail-table">
										<tr>
											<th>Tên món</th>
											<th>Số lượng</th>
											<th>Đơn giá</th>
											<th>Thành tiền</th>
										</tr>
										<?php foreach ($ct as $c): $thanhTien = $c['SoLuongMon'] * $c['Gia']; ?>
											<tr>
												<td><?= htmlspecialchars($c['TenMon']) ?></td>
												<td><?= $c['SoLuongMon'] ?></td>
												<td><?= number_format($c['Gia']) ?> VND</td>
												<td><?= number_format($thanhTien) ?> VND</td>
											</tr>
										<?php endforeach; ?>
										<tr class="tr-promo">
											<td colspan="2" align="right"><b>Khuyến mãi:</b></td>
											<td colspan="2">
												<?php
												if (!empty($tenKhuyenMai) && $giamGia > 0) {
													echo htmlspecialchars($tenKhuyenMai) . ' (-' . $giamGia . '%) <span style="color: #059669;">- ' . number_format($soTienGiam) . ' VND</span>';
												} else {
													echo 'Không áp dụng';
												}
												?>
											</td>
										</tr>
										<tr class="tr-highlight">
											<td colspan="2" align="right"><b>Thành tiền sau khuyến mãi:</b></td>
											<td colspan="2"><b><?= number_format($tongTienSauKM) ?> VND</b></td>
										</tr>
										<tr class="tr-total">
											<td colspan="2" align="right"><b>Tổng tiền:</b></td>
											<td colspan="2"><b><?= number_format($tong) ?> VND</b></td>
										</tr>
									</table>
								</div>
							</div>
						<?php endif; ?>
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

	<!-- Vendor Custom -->
	<?php
	include('../customer/chatbot.php');
	include('./footer-scripts-ad.php');
	?>
</body>
<style>
    .lh-main-content {
        padding: 20px;
        background: #f8f9fa;
    }

    .lh-page-title {
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        margin-bottom: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .lh-breadcrumb h5 {
        margin: 0;
        color: #2c3e50;
        font-size: 1.5rem;
    }

    .lh-breadcrumb ul {
        list-style: none;
        padding: 0;
        margin: 5px 0 0 0;
        display: flex;
        gap: 10px;
    }

    .lh-breadcrumb a {
        color: #6c757d;
        text-decoration: none;
    }

    .lh-tools {
        display: flex;
        gap: 15px;
        align-items: center;
    }

    .lh-tools a, .lh-tools button {
        background: #f8f9fa;
        border: none;
        padding: 8px;
        border-radius: 5px;
        color: #6c757d;
        transition: all 0.3s;
    }

    .lh-tools a:hover, .lh-tools button:hover {
        background: #e9ecef;
        color: #2c3e50;
    }

    .invoice-table {
        width: 100%;
        background: white;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    .invoice-table th {
        background: #f8f9fa;
        padding: 15px;
        text-align: left;
        font-weight: 600;
        color: #2c3e50;
        border-bottom: 2px solid #dee2e6;
    }

    .invoice-table td {
        padding: 12px 15px;
        border-bottom: 1px solid #dee2e6;
        color: #495057;
    }

    .invoice-table tr:hover {
        background: #f8f9fa;
    }

    .status-badge {
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 500;
        color: white;
    }

    .action-links a {
        color: #0d6efd;
        text-decoration: none;
        margin: 0 5px;
        font-size: 0.9rem;
    }

    .action-links a:hover {
        text-decoration: underline;
    }

    .invoice-center {
        background: white;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        padding: 25px;
        margin-top: 20px;
    }

    .detail-box {
        position: relative;
    }

    .detail-title {
        font-size: 1.5rem;
        color: #2c3e50;
        font-weight: 600;
        margin-bottom: 20px;
        display: block;
    }

    .detail-close {
        position: absolute;
        top: 0;
        right: 0;
        color: #6c757d;
        cursor: pointer;
        font-size: 0.9rem;
    }

    .detail-label {
        color: #6c757d;
        font-weight: 500;
        min-width: 150px;
        display: inline-block;
    }

    .detail-value {
        color: #2c3e50;
    }

    .detail-status {
        display: inline-block;
        padding: 5px 12px;
        border-radius: 20px;
        color: white;
        font-size: 0.85rem;
        font-weight: 500;
    }

    .detail-table {
        width: 100%;
        margin-top: 20px;
        border-collapse: collapse;
    }

    .detail-table th {
        background: #f8f9fa;
        padding: 12px;
        text-align: left;
        font-weight: 600;
        color: #2c3e50;
        border-bottom: 2px solid #dee2e6;
    }

    .detail-table td {
        padding: 12px;
        border-bottom: 1px solid #dee2e6;
        color: #495057;
    }

    .tr-promo {
        background: #f8f9fa;
    }

    .tr-highlight {
        background: #e9ecef;
    }

    .tr-total {
        background: #f8f9fa;
        font-weight: 600;
    }
</style>



<!-- refresh  -->
<script>
	document.getElementById("refreshBtn").addEventListener("click", function() {
		location.reload(); // Câu lệnh reload toàn trang
	});
</script>

<!-- Mirrored from maraviyainfotech.com/projects/luxurious-html-v22/admin/invoice.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Jan 2025 15:13:55 GMT -->

</html>
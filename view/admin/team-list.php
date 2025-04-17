<?php
session_start();

include_once(__DIR__ . "/../../controller/cUser.php");

$userController = new UserController();
$result = $userController->StaffGetAllUsers($data);

// Fetch dữ liệu thành mảng
$data = [];
if ($result && mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		$data[] = $row;
	}
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_user_id'])) {
	$idToDelete = intval($_POST['delete_user_id']); // Chống inject
	$controller = new UserController();
	$result = $controller->StaffDeleteUser($idToDelete);

	if ($result) {
		echo "<script>alert('Xoá thành công!'); window.location.href='team-list.php';</script>";
		exit;
	} else {
		echo "<script>alert('Xoá thất bại hoặc không tìm thấy nhân viên!');</script>";
	}
}

error_reporting(E_ALL);
ini_set('display_errors', 1);



?>




<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from maraviyainfotech.com/projects/luxurious-html-v22/admin/./team-list.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Jan 2025 15:13:52 GMT -->

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
										<li><a href="./material-update.php" class="lh-page-link drop">
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
										<li><a href="./material-update.php" class="lh-page-link drop">
										<i class="fa-solid fa-code-commit"></i>Cập nhật nguyên liệu</a></li>
								
							</ul>
						</li>';
						}

						?>

					</ul>
				</div>
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

					<div class="tab-pane fade" id="messages" role="tabpanel" aria-labelledby="messages-tab">
						<div class="lh-message-list">
							<ul>
								<li>
									<a href="#" class="reply">Reply</a>
									<div class="user">

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
										<span class="label busy"></span>
									</div>
									<div class="detail">
										<a href="#" class="name">Frank N. Stein</a>
										<p class="time">8:30PM, 05/12/2024</p>
										<p class="message">Room 65 AC repair service is done.</p>
										<span class="download-files">
											<span class="download">
												<a href="javascript:void(0)"><i class="ri-download-2-line"></i></a>
											</span>
										</span>
									</div>
								</li>
								<li>
									<a href="#" class="reply">Reply</a>
									<div class="user">
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
		<div class="lh-main-content team-list">
			<div class="container-fluid">
				<!-- Page title & breadcrumb -->
				<div class="lh-page-title lh-page-title-2">
					<div class="lh-breadcrumb">
						<h5>Danh Sách nhân viên</h5>
						<ul>
							<li><a href="./index.php">Chef</a></li>
							<li><i class="fa-solid fa-right-long"></i></li>
							<li>Danh sách</li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-xxl-4 col-lg-5 col-md-12">
						<div class="team-sticky-bar">
							<div class="lh-card">
								<div class="lh-card-header">
									<h4 class="lh-card-title">Danh sách</h4>

								</div>
								<div class="lh-card-content">
									<ul class="nav nav-tabs lh-body" role="tablist">
										<?php if (!empty($data)): ?>
											<?php foreach ($data as $row): ?>
												<li class="nav-item staff-hover" role="presentation" id="user-<?php echo $row['ID_User']; ?>">
													<a class="nav-link active user-item"
														data-user-id="<?php echo $row['ID_User']; ?>"
														data-name="<?php echo $row['TenUser']; ?>"
														data-email="<?php echo $row['Email']; ?>"
														data-phone="<?php echo $row['SoDienThoai']; ?>"
														data-address="<?php echo $row['DiaChi']; ?>"
														data-birthdate="<?php echo $row['NgaySinh']; ?>"
														data-image="<?php echo $row['HinhAnh']; ?>">
														<div class="form-group">
															<img class="team-img" src="../../assets_admin/img/user/<?php echo htmlspecialchars($row['HinhAnh']); ?>" alt="team">
															<span><?php echo htmlspecialchars($row['TenUser']); ?></span>
														</div>
													</a>
													<div class="lh-tool">
														<div class="dropdown">
															<button class="btn btn-secondary dropdown-toggle" type="button"
																data-bs-toggle="dropdown"
																aria-expanded="false">
																<i class="mdi mdi-dots-vertical"></i>
															</button>
															<ul class="dropdown-menu">
																<li>
																	<form method="POST" action="">
																		<input type="hidden" name="delete_user_id" value="<?php echo $row['ID_User']; ?>">
																		<button class="dropdown-item" type="submit" onclick="return confirm('Bạn có chắc chắn muốn xoá nhân viên này không?');">
																			Xoá
																		</button>
																	</form>
																</li>
															</ul>
														</div>
													</div>
												</li>
											<?php endforeach; ?>
										<?php else: ?>
											<p>Không có nhân viên nào.</p>
										<?php endif; ?>
									</ul>






								</div>
							</div>
						</div>
					</div>
					<div class="col-xxl-8 col-lg-7 col-md-12">
						<div class="lh-card" id="assigntbl">
							<div class="lh-card-header">
								<h4 class="lh-card-title">Thông tin chi tiết</h4>

							</div>
							<div class="lh-card-content card-default">
								<div class="tab-content">
									<div class="tab-pane fade show active" id="tab1" role="tabpanel">
										<div class="team-overview">
											<div class="team-details lh-card-team-content">
												<div class="row">
													<!-- Email -->
													<div class="col-lg-6 col-md-12">
														<div class="lh-team-detail">
															<h6>E-mail address</h6>
															<div class="form-group">
																<input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($data['Email'] ?? ''); ?>" readonly>
															</div>
														</div>
													</div>

													<!-- Số điện thoại -->
													<div class="col-lg-6 col-md-12">
														<div class="lh-team-detail">
															<h6>Contact number</h6>
															<div class="form-group">
																<input type="text" class="form-control" name="phone" value="<?php echo htmlspecialchars($data['SoDienThoai'] ?? ''); ?>" readonly>
															</div>
														</div>
													</div>

													<!-- Địa chỉ -->
													<div class="col-lg-6 col-md-12">
														<div class="lh-team-detail">
															<h6>Address</h6>
															<div class="form-group">
																<textarea class="form-control" name="address" rows="2" readonly><?php echo htmlspecialchars($data['DiaChi'] ?? ''); ?></textarea>
															</div>
														</div>
													</div>

													<!-- Ngày sinh -->
													<div class="col-lg-6 col-md-12">
														<div class="lh-team-detail">
															<h6>Ngày/ tháng/ năm sinh</h6>
															<div class="form-group">
																<input type="date" class="form-control" name="date" value="<?php echo isset($data['NgaySinh']) ? date('Y-m-d', strtotime($data['NgaySinh'])) : ''; ?>" readonly>
															</div>
														</div>
													</div>

												</div>
											</div>
										</div>
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


	<!-- Main Custom -->
	<script>
		document.querySelectorAll('.user-item').forEach(item => {
			item.addEventListener('click', function() {
				const email = this.getAttribute('data-email');
				const phone = this.getAttribute('data-phone');
				const address = this.getAttribute('data-address');
				const birthdate = this.getAttribute('data-birthdate');
				const image = this.getAttribute('data-image');

				document.querySelector('input[name="email"]').value = email;
				document.querySelector('input[name="phone"]').value = phone;
				document.querySelector('textarea[name="address"]').value = address;
				document.querySelector('input[name="date"]').value = birthdate;

				// Nếu bạn có phần hiển thị hình ảnh
				document.querySelector('.profile-img').src = `../../assets_admin/img/user/${image}`;
			});
		});
	</script>
	<?php
	include('../customer/chatbot.php');
	include('./footer-scripts-ad.php');
	?>


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

	<!-- xoá  -->
	<!-- <script>
		document.addEventListener('DOMContentLoaded', function() {
			document.querySelectorAll('.btn-delete-user').forEach(button => {
				button.addEventListener('click', function() {
					const userId = this.getAttribute('data-id');

					if (confirm('Bạn có chắc chắn muốn xoá nhân viên này không?')) {
						fetch(`../../controller/cUserAction.php?action=deleteUser&id=${userId}`, {
								method: 'GET'
							})
							.then(response => response.json()) // vì server trả về JSON
							.then(data => {
								alert(data.message); // lấy thông điệp từ JSON
								if (data.status === 'success') {
									location.reload();
								}
							})
							.catch(error => console.error('Lỗi:', error));
					}
				});
			});
		});
	</script> -->


</body>


<!-- Mirrored from maraviyainfotech.com/projects/luxurious-html-v22/admin/./team-list.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Jan 2025 15:13:52 GMT -->

</html>
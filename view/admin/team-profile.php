<?php
session_start();
include_once(__DIR__ . "/../../controller/cUser.php");

$userId = $_SESSION['user_id'] ?? null;
$data = [];

if ($userId) {
	$userController = new UserController();
	$staffResult = $userController->StaffGetUserById($userId);

	if ($staffResult && mysqli_num_rows($staffResult) > 0) {
		$data = mysqli_fetch_assoc($staffResult);
	}
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_profile'])) {
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$date = $_POST['date'];
	$avatar = $_FILES['avatar'];

	// Xử lý ảnh nếu người dùng upload mới
	$avatarFileName = $data['HinhAnh'] ?? '';
	if (!empty($avatar['name'])) {
		$uploadDir = __DIR__ . '/../../assets_admin/img/user/';
		$avatarFileName = basename($avatar['name']);
		move_uploaded_file($avatar['tmp_name'], $uploadDir . $avatarFileName);
	}

	// Cập nhật thông tin
	$userController = new UserController();
	$updateSuccess = $userController->StaffUpdateUserById($userId, $email, $phone, $address, $date, $avatarFileName);

	if ($updateSuccess) {
		echo "<script>alert('Cập nhật thông tin thành công!'); window.location.href ='team-profile.php';</script>";
		exit;
	} else {
		echo "<script>alert('Cập nhật thất bại. Vui lòng thử lại.');</script>";
	}
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from maraviyainfotech.com/projects/luxurious-html-v22/admin/team-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Jan 2025 15:13:51 GMT -->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Best Luxurious Hotel Booking Template.">
	<meta name="keywords"
		content="hotel, booking, business, restaurant, spa, resort, landing, agency, corporate, start up, site design, new business site, business template, professional template, classic, modern">
	<meta name="author" content="ashishmaraviya">

	<title>Chef Restaurent</title>
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
										<h6 class="name"><?php echo htmlspecialchars($data['TenUser'] ?? ''); ?></h6>
										<p><?php echo htmlspecialchars($data['Email'] ?? ''); ?>"</p>

									</div>
									<ul class="border-top">
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


		<!-- main content -->
		<div class="lh-main-content">
			<div class="container-fluid">
				<!-- Page title & breadcrumb -->
				<div class="lh-page-title">
					<div class="lh-breadcrumb">
						<h5>Chi tiết nhân viên</h5>
						<ul>
							<li><a href="index.html">Nhân viên</a></li>
							<li>Chi tiết</li>
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
				<!-- form -->
				<form action="" method="POST" enctype="multipart/form-data">
					<div class="row">
						<div class="col-xxl-3 col-xl-4 col-md-12">
							<div class="team-sticky-bar">
								<div class="col-xl-12">
									<div class="lh-card">
										<div class="lh-card-content">
											<div class="lh-team-block-img">
												<div class="lh-team-block-detail">
													<div class="profile-img" style="position: relative;">
														<label for="avatar" style="cursor: pointer;">
															<img class="t-img" src="<?php echo !empty($data['HinhAnh']) ? '../../assets_admin/img/user/' . htmlspecialchars($data['HinhAnh']) : '../../assets_admin/img/user/minh.jpg'; ?>" alt="team image">
															<input type="file" name="avatar" id="avatar" accept="image/*" style="display: none;">
														</label>
														<span class="tag-label online"></span>
													</div>
													<h5 class="name"><?php echo htmlspecialchars($data['TenUser'] ?? ''); ?></h5>

													<di v class="lh-settings">
														<button type="submit" name="update_profile" class="lh-btn-primary m-r-10" style="width:160px;">
															Cập nhật thông tin
														</button>
													</di>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-xxl-9 col-xl-8 col-md-12">
							<div class="lh-card team-overview">
								<div class="lh-card-content lh-card-team team-details">
									<div class="row">
										<!-- Email -->
										<div class="col-lg-6 col-md-12">
											<div class="lh-team-detail">
												<h6>E-mail address</h6>
												<div class="form-group">
													<input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($data['Email'] ?? ''); ?>" required>
												</div>
											</div>
										</div>

										<!-- Số điện thoại -->
										<div class="col-lg-6 col-md-12">
											<div class="lh-team-detail">
												<h6>Contact number</h6>
												<div class="form-group">
													<input type="text" class="form-control" name="phone" value="<?php echo htmlspecialchars($data['SoDienThoai'] ?? ''); ?>" required>
												</div>
											</div>
										</div>

										<!-- Địa chỉ -->
										<div class="col-lg-6 col-md-12">
											<div class="lh-team-detail">
												<h6>Address</h6>
												<div class="form-group">
													<textarea class="form-control" name="address" rows="2"><?php echo htmlspecialchars($data['DiaChi'] ?? ''); ?></textarea>
												</div>
											</div>
										</div>

										<!-- Ngày sinh -->
										<div class="col-lg-6 col-md-12">
											<div class="lh-team-detail">
												<h6>Ngày/ tháng/ năm sinh</h6>
												<div class="form-group">
													<input type="date" class="form-control" name="date" value="<?php echo isset($data['NgaySinh']) ? date('Y-m-d', strtotime($data['NgaySinh'])) : ''; ?>" required>
												</div>
											</div>
										</div>

									</div>
								</div>
							</div>
						</div>
					</div>

				</form>

			</div>
		</div>

		<!-- Footer -->
		<footer>
			<div class="container-fluid">
				<div class="copyright">
					<p><span id="copyright_year"></span> Nhóm 24</p>

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
	include('./footer-scripts-ad.php');
	?>
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

<!-- refresh  -->
<script>
	document.getElementById("refreshBtn").addEventListener("click", function() {
		location.reload(); // Câu lệnh reload toàn trang
	});
</script>


<!-- Mirrored from maraviyainfotech.com/projects/luxurious-html-v22/admin/team-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Jan 2025 15:13:51 GMT -->

</html>
<?php
session_start();
include_once('../../controller/cThucDon.php');
include_once('../../controller/cMonAn.php');

$controller = new ThucDonController();
$monAnController = new MonAnController();

$dsThucDon = $controller->getAllThucDon();

// Xử lý thêm món ăn


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['them_monan'])) {
	$ten = $_POST['TenMon'];
	$gia = $_POST['Gia'];
	$idThucDon = $_POST['ID_ThucDon'];
	

	// Kiểm tra trùng tên món ăn trong cùng thực đơn
	if ($monAnController->model->existsInThucDon($ten, $idThucDon)) {
		echo '<script>alert("❌ Món ăn đã tồn tại trong thực đơn này!"); window.location.href="menu.php";</script>';
		exit;
	}

	// Xử lý upload hình ảnh
	$hinhAnh = '';
	if (isset($_FILES['HinhAnh']) && $_FILES['HinhAnh']['error'] === UPLOAD_ERR_OK) {
		$uploadDir = __DIR__ . '/../../assets_admin/img/restaurant/';

		if (!file_exists($uploadDir)) {
			mkdir($uploadDir, 0777, true);
		}

		$fileExtension = pathinfo($_FILES['HinhAnh']['name'], PATHINFO_EXTENSION);
		$hinhAnh = uniqid() . '.' . $fileExtension;
		$uploadFile = $uploadDir . $hinhAnh;

		if (!move_uploaded_file($_FILES['HinhAnh']['tmp_name'], $uploadFile)) {
			echo '<script>alert("Lỗi khi upload hình ảnh!");</script>';
			$hinhAnh = '';
		}
	}
	$monAnController->ControllerAddMonAn($ten, $gia, $idThucDon, $hinhAnh);

	header("Location: menu.php");
	exit;
}

// Xử lý xoá món ăn
if (isset($_GET['xoa_monan'])) {
	$id = $_GET['xoa_monan'];
	$monAnController->deleteMonAn($id);
	header("Location: menu.php");
	exit;
}

// Xử lý sửa món ăn
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sua_monan'])) {
	$id = $_POST['ID_MonAn'];
	$ten = $_POST['TenMon'];
	$gia = $_POST['Gia'];

	$hinhAnh = $_POST['HinhAnhCu'];
	if (isset($_FILES['HinhAnh']) && $_FILES['HinhAnh']['error'] === UPLOAD_ERR_OK) {
		$uploadDir = __DIR__ . '/../../assets_admin/img/restaurant/';
		if (!file_exists($uploadDir)) {
			mkdir($uploadDir, 0777, true);
		}
	
		$fileExtension = pathinfo($_FILES['HinhAnh']['name'], PATHINFO_EXTENSION);
		$hinhAnh = uniqid() . '.' . $fileExtension;
		$uploadFile = $uploadDir . $hinhAnh;
	
		if (!move_uploaded_file($_FILES['HinhAnh']['tmp_name'], $uploadFile)) {
			echo '<script>alert("❌ Lỗi khi upload hình ảnh: ' . $_FILES['HinhAnh']['error'] . '");</script>';
			$hinhAnh = '';
		}
	}
	

	if ($monAnController->updateMonAn($id, $ten, $gia, $hinhAnh)) {
		echo '<script>alert("Cập nhật món ăn thành công!");</script>';
	} else {
		echo '<script>alert("Có lỗi xảy ra khi cập nhật món ăn!");</script>';
	}
	header("Location: menu.php");
	exit;
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from maraviyainfotech.com/projects/luxurious-html-v22/admin/menu.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Jan 2025 15:13:55 GMT -->

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
			<div class="lh-page-title">
				<div class="lh-breadcrumb">
					<h5>Thực đơn</h5>
					<ul>
						<li><a href="./index.php">Home</a></li>
						<li>Thực đơn</li>
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
				</div>
			</div>
			<div class="container-fluid">
				<?php foreach ($dsThucDon as $item): ?>
					<?php $dsMonAn = $monAnController->getMonAnByThucDon($item['ID_ThucDon']); ?>
					<div class="thucdon">
						<h3 onclick="toggleMonAn(<?= $item['ID_ThucDon'] ?>)">
							🍽 <?= $item['TenThucDon'] ?>
						</h3>
						<ul class="monan" id="monan-<?= $item['ID_ThucDon'] ?>">
							<?php if (empty($dsMonAn)): ?>
								<li>Không có món ăn nào.</li>
							<?php else: ?>
								<?php foreach ($dsMonAn as $mon): ?>
									<li class="mon-an-item">
										<div class="mon-an-info">
											<img src="../../assets_admin/img/restaurant/<?php echo $mon['HinhAnh']; ?>" alt="<?php echo $mon['TenMon']; ?>" class="mon-an-image">
											<div class="mon-an-details">
												<h4><?php echo $mon['TenMon']; ?></h4>
												<p class="gia"><?php echo number_format($mon['Gia']); ?> VNĐ</p>
											</div>
										</div>
										<div class="mon-an-actions">
											<button class="btn-sua" onclick="showFormSua(<?php echo $mon['ID_MonAn']; ?>)">Sửa</button>
											<a href="?xoa_monan=<?php echo $mon['ID_MonAn']; ?>" class="btn-xoa" onclick="return confirm('Bạn có chắc muốn xóa món này?')">Xóa</a>
										</div>
									</li>
									<div id="form-sua-<?php echo $mon['ID_MonAn']; ?>" class="form-sua-inline" style="display: none;">
										<form method="POST" enctype="multipart/form-data">
											<input type="hidden" name="ID_MonAn" value="<?php echo $mon['ID_MonAn']; ?>">
											<input type="hidden" name="HinhAnhCu" value="<?php echo $mon['HinhAnh']; ?>">
											<div class="form-group">
												<label for="TenMon">Tên món:</label>
												<input type="text" name="TenMon" id="TenMon" value="<?php echo htmlspecialchars($mon['TenMon']); ?>" required>
											</div>
											<div class="form-group">
												<label for="Gia">Giá:</label>
												<input type="number" name="Gia" id="Gia" value="<?php echo $mon['Gia']; ?>" required>
											</div>
											<div class="form-group">
												<label for="HinhAnh">Hình ảnh mới (nếu muốn thay đổi):</label>
												<input type="file" name="HinhAnh" id="HinhAnh" accept="image/*">
												<small>Để trống nếu không muốn thay đổi hình ảnh</small>
											</div>
											<div class="form-actions">
												<button type="submit" name="sua_monan" class="btn-primary">Lưu thay đổi</button>
												<button type="button" class="btn-secondary" onclick="hideFormSua(<?php echo $mon['ID_MonAn']; ?>)">Hủy</button>
											</div>
										</form>
									</div>
								<?php endforeach; ?>
							<?php endif; ?>
							<!-- Form thêm món ăn -->
							<li>
								<form class="form-them-monan" method="post" enctype="multipart/form-data">
									<input type="hidden" name="ID_ThucDon" value="<?= $item['ID_ThucDon'] ?>">
									<div class="form-group">
										<input type="text" name="TenMon" placeholder="Tên món" required>
									</div>
									<div class="form-group">
										<input type="number" name="Gia" placeholder="Giá" required>
									</div>
									<div class="form-group">
									<input type="file" name="HinhAnh" accept=".jpg,.jpeg,.png,.gif" required>
									</div>
									<button type="submit" name="them_monan">Thêm</button>
								</form>
							</li>
						</ul>
					</div>
				<?php endforeach; ?>
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

	<?php
	include('../customer/chatbot.php');
	include('./footer-scripts-ad.php');
	?>
	<script>
		function toggleMonAn(id) {
			var monAn = document.getElementById('monan-' + id);
			if (monAn.style.display === 'none') {
				monAn.style.display = 'block';
			} else {
				monAn.style.display = 'none';
			}
		}

		function showFormSua(id) {
			// Ẩn tất cả các form sửa khác
			var allForms = document.querySelectorAll('.form-sua-inline');
			allForms.forEach(function(form) {
				form.style.display = 'none';
			});

			// Hiển thị form sửa của món được chọn
			var formSua = document.getElementById('form-sua-' + id);
			if (formSua) {
				formSua.style.display = 'block';
			}
		}

		function hideFormSua(id) {
			var formSua = document.getElementById('form-sua-' + id);
			if (formSua) {
				formSua.style.display = 'none';
			}
		}

		function confirmDelete(id) {
			return confirm('Bạn có chắc chắn muốn xóa món ăn này?');
		}

		// refreshBtn

		document.getElementById("refreshBtn").addEventListener("click", function() {
			location.reload(); // Câu lệnh reload toàn trang
		});
	</script>


	<style>
		.thucdon {
			border: 1px solid #ccc;
			border-radius: 10px;
			padding: 15px;
			margin-bottom: 20px;
			background: #f9f9f9;
		}

		.thucdon h3 {
			margin: 0;
			cursor: pointer;
			font-weight: 600;
			font-size: 1.6rem;
			color: #484d54;
		}

		.monan {
			margin-top: 10px;
			padding-left: 20px;
		}

		.monan li {
			list-style: none;
			margin-bottom: 15px;
		}

		.mon-an-item {
			display: flex;
			justify-content: space-between;
			align-items: center;
			padding: 10px;
			background: white;
			border-radius: 8px;
			box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
		}

		.mon-an-info {
			display: flex;
			align-items: center;
			gap: 15px;
		}

		.mon-an-image {
			width: 80px;
			height: 80px;
			object-fit: cover;
			border-radius: 8px;
		}

		.mon-an-details h4 {
			margin: 0 0 5px 0;
			color: #333;
		}

		.mon-an-details .gia {
			margin: 0;
			color: #e44d26;
			font-weight: bold;
		}

		.mon-an-actions {
			display: flex;
			gap: 10px;
		}

		.btn-sua,
		.btn-xoa {
			padding: 5px 15px;
			border-radius: 4px;
			text-decoration: none;
			color: white;
			border: none;
			cursor: pointer;
		}

		.btn-sua {
			background: #007bff;
		}

		.btn-xoa {
			background: #dc3545;
		}

		.form-sua-inline {
			background: #f8f9fa;
			padding: 15px;
			border-radius: 8px;
			margin-top: 10px;
		}

		.form-sua-inline .form-group {
			margin-bottom: 10px;
		}

		.form-sua-inline input[type="text"],
		.form-sua-inline input[type="number"] {
			width: 100%;
			padding: 8px;
			border: 1px solid #ddd;
			border-radius: 4px;
		}

		.form-sua-inline small {
			color: #666;
			font-size: 0.8em;
		}

		.form-actions {
			display: flex;
			gap: 10px;
			margin-top: 10px;
		}

		.form-actions button {
			padding: 8px 20px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
		}

		.btn-primary {
			background: #28a745;
			color: white;
		}

		.btn-secondary {
			background: #6c757d;
			color: white;
		}

		.form-them-monan {
			margin-top: 10px;
			background: white;
			padding: 15px;
			border-radius: 8px;
			box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
		}

		.form-group {
			margin-bottom: 10px;
		}

		.form-them-monan input[type="text"],
		.form-them-monan input[type="number"],
		.form-them-monan input[type="file"] {
			width: 100%;
			padding: 8px;
			border: 1px solid #ddd;
			border-radius: 4px;
			margin-bottom: 5px;
		}

		.form-them-monan button {
			background: #28a745;
			color: white;
			border: none;
			padding: 8px 20px;
			border-radius: 4px;
			cursor: pointer;
		}

		.form-them-monan button:hover {
			background: #218838;
		}
	</style>
</body>


<!-- Mirrored from maraviyainfotech.com/projects/luxurious-html-v22/admin/menu.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Jan 2025 15:13:56 GMT -->

</html>
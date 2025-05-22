<?php
session_start();
include_once('../../controller/cNguyenLieu.php');

$controller = new NguyenLieuController();
$mode = isset($_GET['mode']) ? $_GET['mode'] : 'list';
$dsNguyenLieu = $controller->getAllNguyenLieu();

// Xử lý thêm nguyên liệu
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['them_nguyenlieu'])) {
	$tenNguyenLieu = $_POST['TenNguyenLieu'];
	$donViTinh = $_POST['DonViTinh'];
	$soLuongTon = $_POST['SoLuongTon'];
	$ghiChu = $_POST['GhiChu'];

	$controller->addNguyenLieu($tenNguyenLieu, $donViTinh, $soLuongTon, $ghiChu);
	header("Location: material.php");
	exit;
}

// Xử lý xóa nguyên liệu
if (isset($_GET['xoa_nguyenlieu'])) {
	$id = $_GET['xoa_nguyenlieu'];
	$controller->deleteNguyenLieu($id);
	header("Location: material.php");
	exit;
}

// Lấy thông tin nguyên liệu cần sửa
if ($mode === 'edit' && isset($_GET['id'])) {
	$id = $_GET['id'];
	$nguyenLieu = $controller->getNguyenLieuById($id);

	if (!$nguyenLieu) {
		header("Location: material.php");
		exit;
	}
}

// Xử lý cập nhật nguyên liệu
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sua_nguyenlieu'])) {
	$id = $_POST['ID_NguyenLieu'];
	$tenNguyenLieu = $_POST['TenNguyenLieu'];
	$donViTinh = $_POST['DonViTinh'];
	$soLuongTon = $_POST['SoLuongTon'];
	$ghiChu = $_POST['GhiChu'];

	$controller->updateNguyenLieu($id, $tenNguyenLieu, $donViTinh, $soLuongTon, $ghiChu);
	header("Location: material.php");
	exit;
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from maraviyainfotech.com/projects/luxurious-html-v22/admin/./guest.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Jan 2025 15:13:52 GMT -->

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
				<?php if ($mode === 'edit'): ?>
					<!-- Form sửa nguyên liệu -->
					<div class="form-sua-nguyenlieu">
						<h2 class="text-center mb-4">Sửa nguyên liệu</h2>
						<form method="post">
							<input type="hidden" name="ID_NguyenLieu" value="<?= $nguyenLieu['ID_NguyenLieu'] ?>">

							<div class="mb-3">
								<label class="form-label">Tên nguyên liệu</label>
								<input type="text" class="form-control" name="TenNguyenLieu"
									value="<?= $nguyenLieu['TenNguyenLieu'] ?>" required>
							</div>

							<div class="mb-3">
								<label class="form-label">Đơn vị tính</label>
								<input type="text" class="form-control" name="DonViTinh"
									value="<?= $nguyenLieu['DonViTinh'] ?>" required>
							</div>

							<div class="mb-3">
								<label class="form-label">Số lượng tồn</label>
								<input type="number" class="form-control" name="SoLuongTon"
									value="<?= $nguyenLieu['SoLuongTon'] ?>" required>
							</div>

							<div class="mb-3">
								<label class="form-label">Ghi chú</label>
								<input type="text" class="form-control" name="GhiChu"
									value="<?= $nguyenLieu['GhiChu'] ?>">
							</div>

							<div class="d-grid gap-2">
								<button type="submit" name="sua_nguyenlieu" class="btn btn-primary">Cập nhật</button>
								<a href="material.php" class="btn btn-secondary">Quay lại</a>
							</div>
						</form>
					</div>
				<?php else: ?>
					<h2 class="text-center my-4">Quản lý nguyên liệu</h2>

					<!-- Form thêm nguyên liệu -->
					<div class="form-them-nguyenlieu">
						<h4>Thêm nguyên liệu mới</h4>
						<form method="post" class="row g-3">
							<div class="col-md-3">
								<input type="text" class="form-control" name="TenNguyenLieu" placeholder="Tên nguyên liệu" required>
							</div>
							<div class="col-md-2">
								<input type="text" class="form-control" name="DonViTinh" placeholder="Đơn vị tính" required>
							</div>
							<div class="col-md-2">
								<input type="number" class="form-control" name="SoLuongTon" placeholder="Số lượng tồn" required>
							</div>
							<div class="col-md-3">
								<input type="text" class="form-control" name="GhiChu" placeholder="Ghi chú">
							</div>
							<div class="col-md-2">
								<button type="submit" name="them_nguyenlieu" class="btn btn-success w-100">Thêm</button>
							</div>
						</form>
					</div>

					<!-- Bảng danh sách nguyên liệu -->
					<div class="table-responsive nguyenlieu-table">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>ID</th>
									<th>Tên nguyên liệu</th>
									<th>Đơn vị tính</th>
									<th>Số lượng tồn</th>
									<th>Ghi chú</th>
									<th>Thao tác</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($dsNguyenLieu as $nl): ?>
									<?php
										$isLow = false;
										if (strtolower($nl['DonViTinh']) === 'quả') {
											$isLow = $nl['SoLuongTon'] < 100;
										} elseif (strtolower($nl['DonViTinh']) === 'gram') {
											$isLow = $nl['SoLuongTon'] < 2000;
										} elseif (strtolower($nl['DonViTinh']) === 'ml') {
											$isLow = $nl['SoLuongTon'] < 5000;
										}
										$rowClass = $isLow ? 'nguyenlieu-low' : '';
									?>
									<tr class="<?= $rowClass ?>">
										<td><?= $nl['ID_NguyenLieu'] ?></td>
										<td><?= $nl['TenNguyenLieu'] ?></td>
										<td><?= $nl['DonViTinh'] ?></td>
										<td>
											<?php if ($isLow): ?>
												<span style="color:#e11d48;font-weight:bold;">
													<?= $nl['SoLuongTon'] ?> <?= htmlspecialchars($nl['DonViTinh']) ?> ⚠️
												</span>
											<?php else: ?>
												<?= $nl['SoLuongTon'] ?> <?= htmlspecialchars($nl['DonViTinh']) ?>
											<?php endif; ?>
										</td>
										<td><?= $nl['GhiChu'] ?></td>
										<td>
											<a href="?mode=edit&id=<?= $nl['ID_NguyenLieu'] ?>" class="btn btn-warning btn-sm">Cập nhật</a>
											<a href="?xoa_nguyenlieu=<?= $nl['ID_NguyenLieu'] ?>"
												onclick="return confirm('Bạn có chắc muốn xóa nguyên liệu này?')"
												class="btn btn-danger btn-sm">Xóa</a>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				<?php endif; ?>
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
	<!-- Main Custom -->
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
	
		.nguyenlieu-table {
			margin-top: 20px;
		}

		.form-them-nguyenlieu {
			margin: 20px 0;
			padding: 20px;
			background: #f8f9fa;
			border-radius: 5px;
		}

		.form-sua-nguyenlieu {
			max-width: 600px;
			margin: 20px auto;
			padding: 20px;
			background: #f8f9fa;
			border-radius: 5px;
		}

		.nguyenlieu-low {
			background: #fff0f0 !important;
			animation: blink 1s linear infinite alternate;
		}
		@keyframes blink {
			0% { background: #fff0f0; }
			100% { background: #ffeaea; }
		}
	</style>

</body>


<!-- Mirrored from maraviyainfotech.com/projects/luxurious-html-v22/admin/./guest.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Jan 2025 15:13:52 GMT -->

</html>
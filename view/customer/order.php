<?php
session_start();
include_once('../../controller/cDonHang.php');
include_once('../../model/mKhuyenMai.php');


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$idUser = $_SESSION['user_id'] ?? null;
if (!$idUser) {
    echo "<script>alert('Bạn cần đăng nhập để đặt hàng!'); window.location='login.php';</script>";
    exit;
}

$kmModel = new KhuyenMaiModel();
$dsKhuyenMai = $kmModel->getAllKhuyenMai();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Cập nhật số lượng
    if (isset($_POST['update_cart']) && isset($_POST['soluong']) && is_array($_POST['soluong'])) {
        foreach ($_POST['soluong'] as $index => $sl) {
            $_SESSION['cart'][$index]['soluong'] = max(1, intval($sl));
        }
        $_SESSION['khuyenmai'] = $_POST['khuyenmai'] ?? null;
        header("Location: order.php");
        exit;
    }

    // Xoá món ăn
    if (isset($_POST['remove_index'])) {
        $removeIndex = $_POST['remove_index'];
        unset($_SESSION['cart'][$removeIndex]);
        $_SESSION['cart'] = array_values($_SESSION['cart']);
        if (empty($_SESSION['cart'])) {
            unset($_SESSION['cart']);
        }
        $_SESSION['khuyenmai'] = $_POST['khuyenmai'] ?? null;
        header("Location: order.php");
        exit;
    }

    // Đặt hàng
    if (isset($_POST['dat_hang'])) {
        $_SESSION['khuyenmai'] = $_POST['khuyenmai'] ?? null;
        // Tạo đơn hàng ở đây
        include_once('../../controller/cDonHang.php');
        $idUser = $_SESSION['user_id'];
        $idKhuyenMai = $_SESSION['khuyenmai'] ?? null;
        $donHangController = new DonHangController();
        $idDonHang = $donHangController->datHang($idUser, $idKhuyenMai);
        if ($idDonHang) {
            $_SESSION['idDonHang'] = $idDonHang;
            header("Location:payment.php");
            exit;
        } else {
            echo "<script>alert('Tạo đơn hàng thất bại!'); window.location='order.php';</script>";
            exit;
        }
    }
}

$cart = $_SESSION['cart'] ?? [];
$total = 0;
$giamGia = 0;
$tongTienSauKM = 0;

// Tính tổng tiền
foreach ($cart as $item) {
    $total += $item['gia'] * $item['soluong'];
}

// Tính khuyến mãi
$selectedKM = $_SESSION['khuyenmai'] ?? ($_POST['khuyenmai'] ?? '');
if (!empty($selectedKM)) {
    foreach ($dsKhuyenMai as $km) {
        if ($km['ID_KhuyenMai'] == $selectedKM) {
            $giamGia = $km['GiamGia'];
            break;
        }
    }
    $tongTienSauKM = $total - ($total * $giamGia / 100);
} else {
    $tongTienSauKM = $total;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Best Luxurious Hotel Booking Template.">
	<meta name="keywords"
		content="hotel, booking, business, restaurant, spa, resort, landing, agency, corporate, start up, site design, new business site, business template, professional template, classic, modern">
	<meta name="author" content="ashishmaraviya">
    <link rel="icon" href="../../assets_customer/img/logo/logo1.png" type="image/x-icon">

	<title>Chef Restaurent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
   
</head>
<body>
<div class="container py-5">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white d-flex align-items-center">
            <i class="fas fa-shopping-cart me-2"></i>
            <h4 class="mb-0">Giỏ hàng của bạn</h4>
        </div>
        <div class="card-body">
            <?php if (empty($cart)): ?>
                <div class="alert alert-warning">Giỏ hàng trống. <a href="menu.php" class="alert-link">Quay lại thực đơn</a></div>
            <?php else: ?>
                <form method="post">
                    <div class="table-responsive mb-4">
                        <table class="table table-bordered align-middle text-center">
                            <thead class="table-secondary">
                                <tr>
                                    <th>#</th>
                                    <th>Món ăn</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($cart as $index => $item): ?>
                                    <tr>
                                        <td><?= $index + 1 ?></td>
                                        <td class="text-start"><?= htmlspecialchars($item['ten']) ?></td>
                                        <td class="text-danger fw-bold"><?= number_format($item['gia']) ?> VNĐ</td>
                                        <td>
                                            <input type="number" class="form-control text-center" name="soluong[<?= $index ?>]" value="<?= $item['soluong'] ?>" min="1" style="width:80px;">
                                        </td>
                                        <td class="fw-semibold"><?= number_format($item['gia'] * $item['soluong']) ?> VNĐ</td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-danger" type="submit" name="remove_index" value="<?= $index ?>" onclick="return confirm('Bạn chắc chắn muốn xoá món này?')">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Khuyến mãi và Tổng tiền -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Chọn khuyến mãi:</label>
                            <select name="khuyenmai" class="form-select shadow-sm">
                                <option value="">-- Không áp dụng --</option>
                                <?php foreach ($dsKhuyenMai as $km): ?>
                                    <option value="<?= $km['ID_KhuyenMai'] ?>" <?= ($selectedKM == $km['ID_KhuyenMai']) ? 'selected' : '' ?>>
                                        <?= $km['TenKhuyenMai'] ?> (-<?= $km['GiamGia'] ?>%)
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-6 text-end">
                            <p class="mb-1 fw-bold">Tổng tiền: <span class="text-primary"><?= number_format($total) ?> VNĐ</span></p>
                            <?php if ($giamGia > 0): ?>
                                <p class="mb-1 text-success">Giảm giá (<?= $giamGia ?>%): -<?= number_format($total * $giamGia / 100) ?> VNĐ</p>
                                <p class="fw-bold">Thành tiền: <span class="text-danger"><?= number_format($tongTienSauKM) ?> VNĐ</span></p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Nút hành động -->
                    <div class="d-flex justify-content-end gap-3">
                        <a href="menu.php" class="btn btn-outline-secondary">
                            <i class="fas fa-chevron-left me-1"></i>Tiếp tục đặt món
                        </a>
                        <button type="submit" name="update_cart" class="btn btn-warning text-dark">
                            <i class="fas fa-sync-alt me-1"></i>Cập nhật giỏ
                        </button>
                        <button type="submit" name="dat_hang" class="btn btn-success">
                            <i class="fas fa-check-circle me-1"></i>Tiến hành đặt hàng
                        </button>
                    </div>
                </form>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- FontAwesome và Bootstrap -->
<script src="https://kit.fontawesome.com/a2d9d6c29f.js" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
>

<script src="https://kit.fontawesome.com/a2d9d6c29f.js" crossorigin="anonymous"></script>

<style>

    body {
        background-color: #ccc;
    }
    .cart-container {
        border: 1px solid #ddd;
        padding: 15px;
        margin-top: 20px;
        border-radius: 5px;
    }
    .cart-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 0;
        border-bottom: 1px solid #eee;
    }
    .cart-total {
        margin-top: 15px;
        font-weight: bold;
        text-align: right;
    }
    .cart-actions {
        margin-top: 10px;
        display: flex;
        gap: 10px;
    }
    .cart-actions button {
        background: #007bff;
        color: white;
        border: none;
        padding: 7px 12px;
        border-radius: 3px;
        cursor: pointer;
    }
    .cart-actions button:hover {
        background: #0056b3;
    }
    button.remove {
        background: #ff4444;
    }
    button.remove:hover {
        background: #cc0000;
    }
</style>

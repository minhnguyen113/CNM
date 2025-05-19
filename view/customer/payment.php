<?php
session_start();
include_once("../../controller/cDonHang.php");
include_once("../../controller/cThanhToan.php");
include_once("../../controller/cUser.php");

// Lấy id đơn hàng từ session hoặc GET
$idDonHang = $_SESSION['idDonHang'] ?? ($_GET['idDonHang'] ?? null);
if (!$idDonHang) {
    echo "<script>alert('Không tìm thấy đơn hàng!'); window.location='dat-hang.php';</script>";
    exit;
}

$cDonHang = new DonHangController();
$donHang = $cDonHang->getById($idDonHang);
$chiTietDonHang = $cDonHang->getChiTiet($idDonHang);

// Kiểm tra dữ liệu đầu vào
if (!$donHang || empty($donHang['TongTien'])) {
    echo "<script>alert('Đơn hàng không hợp lệ!'); window.location='order.php';</script>";
    exit;
}

// Xử lý khi khách nhấn thanh toán
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['thanhToan'])) {
    $phuongThuc = $_POST['phuongthuc'] ?? '';
    $soTien = floatval($donHang['TongTien']);
    $trangThai = ($phuongThuc === 'VNPAY') ? 'Đã thanh toán' : 'Chờ xử lý';
    $maGiaoDich = null;

    // Kiểm tra phương thức hợp lệ
    if (!in_array($phuongThuc, ['QR', 'Tiền mặt', 'VNPAY'])) {
        echo "<script>alert('Phương thức thanh toán không hợp lệ!');</script>";
    } else {
        $cThanhToan = new cThanhToan();
        $cThanhToan->taoThanhToan($idDonHang, $phuongThuc, $soTien, $trangThai, $maGiaoDich);
        // Cập nhật trạng thái đơn hàng theo phương thức thanh toán
        if ($phuongThuc === 'VNPAY') {
            $cDonHang->updateTrangThai($idDonHang, 'Đã thanh toán');
        } else {
            $cDonHang->updateTrangThai($idDonHang, 'Chờ xử lý');
        }
        unset($_SESSION['idDonHang']);
        echo "<script>alert('Đã ghi nhận thanh toán!');window.location='menu.php';</script>";
        exit;
    }
}

$userController = new UserController();
$userResult = $userController->StaffGetCustomerById($donHang['ID_User']);
$user = mysqli_fetch_assoc($userResult);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thanh toán đơn hàng</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            background: linear-gradient(120deg, #f8fafc 0%, #e0e7ef 100%);
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .pay-form {
            max-width: 700px;
            margin: 40px auto;
            border-radius: 18px;
            padding: 32px 28px 24px 28px;
            background: #fff;
            box-shadow: 0 8px 32px rgba(60, 72, 88, 0.15);
        }
        .pay-form h2, .pay-form h3 {
            text-align: center;
            color: #2d3748;
            margin-bottom: 12px;
        }
        .pay-form label {
            font-weight: 600;
            color: #374151;
        }
        .pay-form select, .pay-form button {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border-radius: 6px;
            border: 1px solid #cbd5e1;
            font-size: 1rem;
        }
        .pay-form button {
            background: linear-gradient(90deg, #4f8cff 0%, #38b6ff 100%);
            color: #fff;
            font-weight: bold;
            border: none;
            margin-top: 18px;
            box-shadow: 0 2px 8px #b6d0ff44;
            transition: background 0.2s;
            cursor: pointer;
        }
        .pay-form button:hover {
            background: linear-gradient(90deg, #38b6ff 0%, #4f8cff 100%);
        }
        #qr-section {
            text-align: center;
            margin-top: 18px;
            margin-bottom: 10px;
        }
        #qr-section img {
            border-radius: 12px;
            border: 2px solid #e0e7ef;
            box-shadow: 0 2px 12px #b6d0ff33;
        }
        table {
            width: 100%;
            background: #fff;
            border-collapse: collapse;
            margin-bottom: 18px;
        }
        th, td {
            text-align: center;
            border: 1px solid #e2e8f0;
            padding: 10px 6px;
            font-size: 1rem;
        }
        th {
            background: #f1f5f9;
            color: #2563eb;
            font-weight: 600;
        }
        .info-row {
            margin-bottom: 8px;
            color: #475569;
        }
        .order-summary {
            background: #f8fafc;
            border-radius: 10px;
            padding: 12px 18px;
            margin-bottom: 18px;
            box-shadow: 0 1px 4px #b6d0ff22;
        }
        .order-summary b {
            color: #2563eb;
        }
        @media (max-width: 800px) {
            .pay-form { max-width: 98vw; padding: 10px; }
            table, th, td { font-size: 0.95rem; }
        }
        @media (max-width: 500px) {
            .pay-form { padding: 2vw; }
            th, td { padding: 6px 2px; }
        }
    </style>
</head>
<body>
    <div class="pay-form">
        <h2><i class="fa-solid fa-money-check-dollar"></i> Thanh toán đơn hàng #<?php echo $idDonHang; ?></h2>
        <div class="order-summary">
            <div class="info-row"><b><i class="fa-regular fa-calendar"></i> Ngày đặt:</b> <?php echo date('d/m/Y H:i', strtotime($donHang['ThoiGianDat'])); ?></div>
            <div class="info-row"><b><i class="fa-solid fa-clipboard-check"></i> Trạng thái:</b> <?php echo htmlspecialchars($donHang['TrangThai']); ?></div>
        </div>
        <h3><i class="fa-solid fa-bowl-food"></i> Chi tiết đơn hàng</h3>
        <table>
            <tr>
                <th>Tên món</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Thành tiền</th>
            </tr>
            <?php
            $tong = 0;
            foreach ($chiTietDonHang as $item):
                $thanhTien = $item['SoLuongMon'] * $item['Gia'];
                $tong += $thanhTien;
            ?>
            <tr>
                <td><?= htmlspecialchars($item['TenMon']) ?></td>
                <td><?= $item['SoLuongMon'] ?></td>
                <td><?= number_format($item['Gia']) ?> VNĐ</td>
                <td><?= number_format($thanhTien) ?> VNĐ</td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="3" align="right"><b>Tổng tiền:</b></td>
                <td><b><?= number_format($tong) ?> VNĐ</b></td>
            </tr>
            <tr>
                <td colspan="3" align="right"><b>Khuyến mãi:</b></td>
                <td>
                    <?php
                    if (!empty($donHang['ID_KhuyenMai'])) {
                        echo 'Đã áp dụng';
                    } else {
                        echo 'Không áp dụng';
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan="3" align="right"><b>Thành tiền cần thanh toán:</b></td>
                <td><b style="color:#e11d48; font-size:1.1em;"><?= number_format($donHang['TongTien']) ?> VNĐ</b></td>
            </tr>
        </table>
        <h3><i class="fa-solid fa-user"></i> Thông tin khách hàng</h3>
        <div class="info-row"><b>Mã khách:</b> <?= $user['ID_User'] ?></div>
        <div class="info-row"><b>Họ tên:</b> <?= htmlspecialchars($user['TenUser']) ?></div>
        <div class="info-row"><b>Số điện thoại:</b> <?= htmlspecialchars($user['SoDienThoai']) ?></div>
        <div class="info-row"><b>Email:</b> <?= htmlspecialchars($user['Email']) ?></div>
        <div class="info-row"><b>Địa chỉ:</b> <?= htmlspecialchars($user['DiaChi']) ?></div>
        <hr style="margin:18px 0;">
        <form method="POST" id="main-payment-form" action="">
            <label><i class="fa-solid fa-credit-card"></i> Chọn phương thức thanh toán:</label><br>
            <select name="phuongthuc" id="phuongthuc" required>
                <option value="QR" selected>QR Code</option>
                <option value="Tiền mặt">Tiền mặt</option>
                <option value="VNPAY">VNPAY</option>
            </select><br><br>
            <div id="qr-section">
                <?php
                $noidung = "Thanh toan don hang #$idDonHang - So tien: " . number_format($donHang['TongTien'], 0, ',', '.') . " VND";
                $qr_url = "https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=" . urlencode($noidung);
                ?>
                <img src="<?php echo $qr_url; ?>" alt="QR code" width="200"><br>
                <small style="color:#2563eb;"><i class="fa-solid fa-qrcode"></i> Quét mã QR để thanh toán</small>
            </div>
            <div id="vnpay-section" style="display: none;">
                <input type="hidden" name="amount" value="<?php echo $donHang['TongTien']; ?>" />
                <input type="hidden" name="idDonHang" value="<?php echo $idDonHang; ?>" />
                <button type="submit" name="redirect" class="btn btn-primary" style="width: 100%; padding: 10px; background: linear-gradient(90deg, #4f8cff 0%, #38b6ff 100%); color: white; border: none; border-radius: 6px; cursor: pointer;">
                    <i class="fa-solid fa-credit-card"></i> Thanh toán qua VNPAY
                </button>
            </div>
            <button type="submit" name="thanhToan" id="normal-payment-btn"><i class="fa-solid fa-circle-check"></i> Xác nhận thanh toán</button>
        </form>
    </div>
    <script>
    document.getElementById('phuongthuc').addEventListener('change', function() {
        const qrSection = document.getElementById('qr-section');
        const vnpaySection = document.getElementById('vnpay-section');
        const normalPaymentBtn = document.getElementById('normal-payment-btn');
        const form = document.getElementById('main-payment-form');

        if (this.value === 'QR') {
            qrSection.style.display = 'block';
            vnpaySection.style.display = 'none';
            normalPaymentBtn.style.display = 'block';
            form.action = "";
        } else if (this.value === 'VNPAY') {
            qrSection.style.display = 'none';
            vnpaySection.style.display = 'block';
            normalPaymentBtn.style.display = 'none';
            form.action = "confirm_vnpay.php";
        } else {
            qrSection.style.display = 'none';
            vnpaySection.style.display = 'none';
            normalPaymentBtn.style.display = 'block';
            form.action = "";
        }
    });
    // Luôn hiển thị QR mặc định khi vào trang
    document.getElementById('qr-section').style.display = 'block';
    document.getElementById('vnpay-section').style.display = 'none';
    </script>
</body>
</html>
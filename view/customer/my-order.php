<?php
session_start();
include_once("../../controller/cDonHang.php");
include_once("../../controller/cKhuyenMai.php");
include_once("../../controller/cUser.php");
include_once("../../controller/cThanhToan.php");
$ttController = new cThanhToan();
$idUser = $_SESSION['user_id'] ?? null;
if (!$idUser) {
    echo "<script>alert('Bạn cần đăng nhập!'); window.location='login.php';</script>";
    exit;
}
$cDonHang = new DonHangController();
$dsDonHang = $cDonHang->getByUser($idUser);
// Lấy chi tiết đơn hàng nếu có id trên URL
$chiTiet = [];
$khuyenMai = null;
$user = null;
$phuongThuc = '';
$donHangDetail = null;
if (isset($_GET['id'])) {
    $chiTiet = $cDonHang->getChiTiet($_GET['id']);
    // Lấy thêm thông tin đơn hàng để hiển thị tổng tiền, trạng thái...
    foreach ($dsDonHang as $d) {
        if ($d['ID_DonHang'] == $_GET['id']) {
            $donHangDetail = $d;
            break;
        }
    }
    // Lấy thông tin khuyến mãi nếu có
    if (!empty($donHangDetail['ID_KhuyenMai'])) {
        $kmController = new KhuyenMaiController();
        $khuyenMai = $kmController->getKhuyenMaiById($donHangDetail['ID_KhuyenMai']);
    }
    // Lấy thông tin khách hàng
    $userController = new UserController();
    $userResult = $userController->StaffGetCustomerById($donHangDetail['ID_User']);
    $user = mysqli_fetch_assoc($userResult);
}
// Xử lý khi khách hàng bấm hủy đơn hàng
if (isset($_GET['huy'])) {
    $cDonHang->updateTrangThai($_GET['huy'], 'Đã hủy');
    header('Location: my-order.php');
    exit;
}
// Xử lý khi khách hàng bấm xóa đơn hàng
if (isset($_GET['xoa']) && is_numeric($_GET['xoa'])) {
    $id = $_GET['xoa'];
    
    // Kiểm tra trạng thái đơn hàng
    $thanhToan = $ttController->getThanhToanById($id);
    if ($thanhToan && (isset($thanhToan['TrangThai']) && ($thanhToan['TrangThai'] == 'Chờ xử lý' || $thanhToan['TrangThai'] == 'Đã hủy'))) {
        $result = $ttController->xoaThanhToan($id);
        if ($result) {
            $cDonHang->deleteDonHang($id);
            echo "<script>
                alert('Xóa đơn hàng thành công!');
                window.location.href='my-order.php';
            </script>";
        } else {
            echo "<script>
                alert('Không thể xóa đơn hàng này!');
                window.location.href='my-order.php';
            </script>";
        }
    } else {
        echo "<script>
            alert('Chỉ có thể xóa đơn hàng ở trạng thái Chờ xử lý hoặc Đã hủy!');
            window.location.href='my-order.php';
        </script>";
    }
    exit();
}
if ($donHangDetail && !empty($donHangDetail['ID_DonHang'])) {
    $phuongThuc = $ttController->getPhuongThucByDonHang($donHangDetail['ID_DonHang']);
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đơn hàng của tôi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #f8fafc; }
        .container { max-width: 900px; margin: 40px auto; background: #fff; border-radius: 12px; box-shadow: 0 2px 12px #b6d0ff33; padding: 24px; }
        h2 { text-align: center; color: #2563eb; }
        table { width: 100%; border-collapse: collapse; margin-top: 18px; background: #fff; }
        th, td { text-align: center; border: 1px solid #e2e8f0; padding: 10px 6px; font-size: 1rem; }
        th { background: #f1f5f9; color: #2563eb; font-weight: 600; }
        .status { color: white; padding: 3px 10px; border-radius: 8px; font-weight: bold; }
        .st-cho { background: orange; }
        .st-xacnhan { background: dodgerblue; }
        .st-chebien { background: purple; }
        .st-giaohang { background: orchid; }
        .st-thanhtoan { background: green; }
        .st-hoanthanh { background: gray; }
        .st-huy { background: red; }
        a.detail { color: #2563eb; text-decoration: underline; }
        .order-detail { margin: 30px auto 0 auto; max-width: 700px; background: #f8fafc; border-radius: 10px; box-shadow: 0 2px 8px #b6d0ff22; padding: 18px; }
        .order-detail h3 { color: #e11d48; text-align: center; }
        .close-btn { float: right; color: #e11d48; font-weight: bold; cursor: pointer; }
        .info-row { margin-bottom: 6px; color: #374151; }
        @media (max-width: 600px) { th, td { font-size: 0.95rem; padding: 6px 2px; } .container { padding: 6px; } }
    </style>
</head>
<body>
<div class="container">
    <h2>Đơn hàng của tôi</h2>
    <table>
        <tr>
            <th>Mã đơn</th>
            <th>Ngày đặt</th>
            <th>Tổng tiền</th>
            <th>Trạng thái</th>
            <th>Chi tiết</th>
            <th>Thao tác</th>
        </tr>
        <?php foreach ($dsDonHang as $row): ?>
        <?php
            $stClass = 'st-hoanthanh';
            switch ($row['TrangThai']) {
                case 'Chờ xử lý': $stClass = 'st-cho'; break;
                case 'Đã xác nhận': $stClass = 'st-xacnhan'; break;
                case 'Đang chế biến': $stClass = 'st-chebien'; break;
                case 'Đang giao hàng': $stClass = 'st-giaohang'; break;
                case 'Đã thanh toán': $stClass = 'st-thanhtoan'; break;
                case 'Đã hoàn thành': $stClass = 'st-hoanthanh'; break;
                case 'Đã hủy': $stClass = 'st-huy'; break;
            }
        ?>
        <tr>
            <td><?= $row['ID_DonHang'] ?></td>
            <td><?= date('d/m/Y H:i', strtotime($row['ThoiGianDat'])) ?></td>
            <td><?= number_format($row['TongTien']) ?> VND</td>
            <td><span class="status <?= $stClass ?>"><?= $row['TrangThai'] ?></span></td>
            <td><a class="detail" href="?id=<?= $row['ID_DonHang'] ?>">Xem</a></td>
            <td>
                <?php if ($row['TrangThai'] == 'Chờ xử lý'): ?>
                    <a href="?huy=<?= $row['ID_DonHang'] ?>" onclick="return confirm('Bạn có chắc muốn hủy đơn hàng này?');">Hủy</a>
                <?php elseif ($row['TrangThai'] == 'Đã xác nhận'): ?>
                    <a href="sua-don-hang.php?id=<?= $row['ID_DonHang'] ?>">Chỉnh sửa</a> |
                    <a href="?xoa=<?= $row['ID_DonHang'] ?>" onclick="return confirm('Bạn có chắc muốn xóa đơn hàng này?');">Xóa</a>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <?php if (empty($dsDonHang)): ?>
        <p style="text-align:center; color:#888; margin-top:24px;">Bạn chưa có đơn hàng nào.</p>
    <?php endif; ?>

    <?php if (isset($_GET['id'])): ?>
        <div class="order-detail">
            <span class="close-btn" onclick="window.location='my-order.php'">[Đóng]</span>
            <h3>Chi tiết đơn hàng #<?= htmlspecialchars($_GET['id']) ?></h3>
            <?php if (!empty($donHangDetail)): ?>
                <p><b>Ngày đặt:</b> <?= date('d/m/Y H:i', strtotime($donHangDetail['ThoiGianDat'])) ?></p>
                <p><b>Trạng thái:</b> <span class="status <?= $stClass ?>"><?= $donHangDetail['TrangThai'] ?></span></p>
                <!--<div class="info-row"><b>Mã khách:</b> <?= $user['ID_User'] ?? '' ?></div>-->
                <div class="info-row"><b>Họ tên:</b> <?= htmlspecialchars($user['TenUser'] ?? '') ?></div>
                <div class="info-row"><b>Số điện thoại:</b> <?= htmlspecialchars($user['SoDienThoai'] ?? '') ?></div>
                <div class="info-row"><b>Email:</b> <?= htmlspecialchars($user['Email'] ?? '') ?></div>
                <div class="info-row"><b>Địa chỉ:</b> <?= htmlspecialchars($user['DiaChi'] ?? '') ?></div>
                <div class="info-row"><b>Phương thức thanh toán:</b> <?= $phuongThuc ? htmlspecialchars($phuongThuc) : 'Chưa cập nhật' ?></div>
            <?php endif; ?>
            <?php if (!empty($chiTiet)): ?>
                <table>
                    <tr>
                        <th>Tên món</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Thành tiền</th>
                    </tr>
                    <?php $tong = 0; foreach ($chiTiet as $item): $thanhTien = $item['SoLuongMon'] * $item['Gia']; $tong += $thanhTien; ?>
                    <tr>
                        <td><?= htmlspecialchars($item['TenMon']) ?></td>
                        <td><?= $item['SoLuongMon'] ?></td>
                        <td><?= number_format($item['Gia']) ?> VND</td>
                        <td><?= number_format($thanhTien) ?> VND</td>
                    </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="3" align="right"><b>Chương trình khuyến mãi:</b></td>
                        <td>
                            <?php
                            if ($khuyenMai) {
                                echo htmlspecialchars($khuyenMai['TenKhuyenMai']) . " (-" . $khuyenMai['GiamGia'] . "%)";
                            } else {
                                echo "Không áp dụng";
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" align="right"><b>Thành tiền sau khuyến mãi:</b></td>
                        <td><b>
                            <?php
                            $giamGia = $khuyenMai ? $khuyenMai['GiamGia'] : 0;
                            $tongTienSauKM = $tong;
                            if ($giamGia > 0) {
                                $tongTienSauKM = $tong * (1 - $giamGia / 100);
                            }
                            echo number_format($tongTienSauKM) . " VND";
                            ?>
                        </b></td>
                    </tr>
                </table>
            <?php else: ?>
                <div style="color:red;text-align:center;">Không tìm thấy chi tiết đơn hàng!</div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>
</body>
</html>

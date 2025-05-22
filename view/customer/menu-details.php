<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once('../../controller/cMonAn.php');
include_once('../../controller/cDanhGia.php');
include_once('../../controller/cChiTietNguyenLieu.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $_SESSION['id_monan'] = intval($_GET['id']);
    header("Location: menu-details.php");
    exit;
}
$idMonAn = $_SESSION['id_monan'] ?? 0;

$monAnController = new MonAnController();
$danhGiaController = new DanhGiaController();
$chiTietNguyenLieuController = new ChiTietNguyenLieuController();
$mon = $monAnController->getMonAnById($idMonAn);
$danhgias = $danhGiaController->layDanhGiaTheoMonAn($idMonAn);
$chiTietNguyenLieu = $chiTietNguyenLieuController->getChiTietNguyenLieuByMonAn($idMonAn);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_danhgia'])) {
    $idMonAn = $_POST['id_monan'] ?? $idMonAn;
    $idUser = $_SESSION['user_id'] ?? null;
    $soSao = intval($_POST['soSao']);
    $noiDung = trim($_POST['noiDung']);
    if ($idUser && $idMonAn) {
        $danhGiaController->themDanhGia($idMonAn, $idUser, $soSao, $noiDung);
        header("Location: menu.php?id=$idMonAn");
        exit;
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['xoa_danhgia'])) {
    $idDanhGia = intval($_POST['xoa_danhgia']);
    $idUser = $_SESSION['user_id'] ?? null;
    // Lấy lại đánh giá để kiểm tra quyền xóa
    $danhGia = null;
    foreach ($danhGiaController->layDanhGiaTheoMonAn($idMonAn) as $dg) {
        if ($dg['ID_DanhGia'] == $idDanhGia) {
            $danhGia = $dg;
            break;
        }
    }
    if ($danhGia && $idUser && $danhGia['ID_User'] == $idUser) {
        $danhGiaController->xoaDanhGia($idDanhGia);
    }
    header("Location: menu.php?id=$idMonAn");
    exit;
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Chef Restaurent</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <?php
    include('./head-resources.php');
    ?>


    <style>
        /* Style đẹp cho chi tiết món ăn và đánh giá */
        .monan-detail-container {
            max-width: 700px;
            margin: 0 auto 30px auto;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.09);
            padding: 36px 32px 28px 32px;
            position: relative;
        }

        .monan-img {
            width: 100%;
            height: 260px;
            object-fit: cover;
            border-radius: 12px;
            margin-bottom: 22px;
            border: 2px solid #e0e7ef;
            transition: box-shadow 0.2s;
        }

        .monan-img:hover {
            box-shadow: 0 8px 32px rgba(225,29,72,0.18);
        }

        .monan-title {
            font-size: 2em;
            color: #e11d48;
            letter-spacing: 1px;
            margin-bottom: 8px;
        }

        .monan-price {
            font-size: 1.3em;
        }

        .monan-desc {
            font-size: 1.1em;
            line-height: 1.6;
            margin-bottom: 18px;
        }

        .review-list {
            background: #f4f7fb;
            border-radius: 10px;
            padding: 18px 20px 12px 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
            margin-bottom: 10px;
            border: 1px solid #e3e6ed;
        }

        .review-list strong {
            font-size: 1.1em;
            color: #007bff;
            margin-bottom: 8px;
            display: block;
        }

        .review-item {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            border-bottom: 1px solid #e0e0e0;
            padding: 12px 0 10px 0;
        }

        .review-item:last-child {
            border-bottom: none;
        }

        .review-avatar {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: #e11d48;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4em;
            color: #fff;
            font-weight: bold;
            flex-shrink: 0;
            overflow: hidden;
            border: 2px solid #fff;
            box-shadow: 0 2px 8px rgba(225,29,72,0.08);
            transition: box-shadow 0.2s;
        }

        .review-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        .review-info {
            flex: 1;
        }

        .review-user {
            font-weight: bold;
            color: #e11d48;
            margin-right: 8px;
        }

        .star-rating-view {
            color: #FFD700;
            font-size: 1.1em;
            margin-right: 8px;
        }

        .review-date {
            color: #888;
            font-size: 0.97em;
        }

        .review-content {
            margin: 3px 0 0 0;
            color: #444;
            font-size: 1em;
        }

        .review-form {
            margin-top: 16px;
            background: #fff;
            border-radius: 10px;
            padding: 20px 20px 14px 20px;
            box-shadow: 0 1px 6px rgba(0,0,0,0.06);
            border: 1px solid #e3e6ed;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .review-form label {
            font-weight: 500;
            color: #333;
            margin-bottom: 3px;
        }

        .review-form .star-rating-input {
            margin-bottom: 8px;
            font-size: 1.6em;
            justify-content: flex-start;
        }

        .review-form textarea {
            margin-top: 4px;
            margin-bottom: 8px;
            width: 100%;
            border-radius: 6px;
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 1em;
            resize: vertical;
            min-height: 60px;
        }

        .review-form button {
            background: #e11d48;
            color: #fff;
            border: none;
            padding: 10px 0;
            border-radius: 6px;
            font-size: 1.1em;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.2s;
            margin-top: 5px;
        }

        .review-form button:hover {
            background: #be123c;
        }

        .review-login-note {
            font-size: 1em;
            color: #888;
            margin-top: 10px;
            text-align: center;
        }

        .star-rating-input {
            direction: rtl;
            display: inline-flex;
            font-size: 1.7em;
            gap: 2px;
        }

        .star-rating-input input[type="radio"] {
            display: none;
        }

        .star-rating-input label {
            color: #ccc;
            cursor: pointer;
            transition: color 0.2s;
        }

        .star-rating-input input[type="radio"]:checked~label,
        .star-rating-input label:hover,
        .star-rating-input label:hover~label {
            color: #FFD700;
        }

        .star-rating-wrapper {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .table thead tr {
            background: #e0e7ef;
        }

        .table tbody tr:hover {
            background: #f1f5f9;
        }

        @media (max-width: 800px) {
            .monan-detail-container {
                padding: 18px 6px 12px 6px;
            }
            .monan-img {
                height: 180px;
            }
        }
    </style>
</head>

<body>
    <div style="max-width: 700px; margin: 30px auto 0 auto;">
        <a href="menu.php" style="display:inline-block;margin-bottom:18px;color:#fff;background:#e11d48;padding:8px 18px;border-radius:6px;text-decoration:none;font-weight:500;box-shadow:0 2px 8px rgba(225,29,72,0.08);transition:background 0.2s;">← Quay lại thực đơn</a>
    </div>
    <div class="monan-detail-container">
        <img src="../../assets_admin/img/restaurant/<?= $mon['HinhAnh'] ?>" alt="<?= htmlspecialchars($mon['TenMon']) ?>" class="monan-img" style="box-shadow:0 4px 16px rgba(225,29,72,0.10);">
        <div class="monan-title" style="font-size:2em;color:#e11d48;letter-spacing:1px;">🍽️ <?= htmlspecialchars($mon['TenMon']) ?></div>
        <div class="monan-price" style="font-size:1.3em;">Giá: <span style="color:#059669;"><?= number_format($mon['Gia']) ?> VNĐ</span></div>
        <div class="monan-desc" style="font-size:1.1em;line-height:1.6;">Mô tả: <?= htmlspecialchars($mon['MoTa'] ?? '') ?></div>
        <div id="chiTietNguyenLieu" style="margin-top: 28px;">
            <h3 style="color:#2563eb;font-size:1.2em;margin-bottom:10px;">🥗 Thành phần nguyên liệu</h3>
            <div style="overflow-x:auto;">
            <table class="table" style="background:#f8fafc;border-radius:10px;box-shadow:0 1px 6px rgba(0,0,0,0.04);min-width:340px;">
                <thead style="background:#e0e7ef;">
                    <tr>
                        <th style="padding:10px 8px;">Nguyên liệu</th>
                        <th style="padding:10px 8px;">Số lượng</th>
                        <th style="padding:10px 8px;">Đơn vị</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($chiTietNguyenLieu as $nl): ?>
                    <tr style="transition:background 0.2s;">
                        <td style="padding:8px 8px;"><span style="color:#e11d48;font-weight:500;">🍀 <?= htmlspecialchars($nl['TenNguyenLieu']) ?></span></td>
                        <td style="padding:8px 8px;"><?= $nl['SoLuong'] ?></td>
                        <td style="padding:8px 8px;"><?= htmlspecialchars($nl['DonViTinh']) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            </div>
        </div>

        <div class="review-list">
            <strong>Đánh giá:</strong>
            <?php if ($danhgias): ?>
                <?php foreach ($danhgias as $dg): ?>
                    <div class="review-item">
                        <div class="review-avatar">
                            <?php
                            if (!empty($dg['HinhAnh'])) {
                                echo '<img src=\"../../assets_admin/img/user/' . htmlspecialchars($dg['HinhAnh']) . '\" alt=\"avatar\" style=\"width:100%;height:100%;object-fit:cover;border-radius:50%;\">';
                            } else {
                                echo strtoupper(mb_substr($dg['TenUser'], 0, 1, 'UTF-8'));
                            }
                            ?>
                        </div>
                        <div class="review-info">
                            <span class="review-user"><?= htmlspecialchars($dg['TenUser']) ?></span>
                            <span class="star-rating-view">
                                <?php
                                $sosao = $dg['SoSao'];
                                for ($i = 1; $i <= 5; $i++) {
                                    if ($i <= $sosao) {
                                        echo '<i class="fa fa-star" style="color:#FFD700;"></i>';
                                    } else {
                                        echo '<i class="fa fa-star" style="color:#ccc;"></i>';
                                    }
                                }
                                ?>
                            </span>
                            <span class="review-date">
                                (<?= date('d/m/Y H:i', strtotime($dg['NgayDanhGia'])) ?>)
                            </span>
                            <div style="display:flex;justify-content:space-between;">
                            <div class="review-content"><?= nl2br(htmlspecialchars($dg['NoiDung'])) ?></div>
                            <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $dg['ID_User']): ?>
                                <form method="POST">
                                    <input type="hidden" name="xoa_danhgia" value="<?= $dg['ID_DanhGia'] ?>">
                                    <button type="submit" style="background:#dc3545;color:#fff;border:none;padding:2px 10px;border-radius:3px;cursor:pointer;margin-left:8px;" onclick="return confirm('Bạn có chắc muốn xóa đánh giá này?')">
                                        Xóa
                                    </button>
                                </form>
                            <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div style="color:#888;">Chưa có đánh giá.</div>
            <?php endif; ?>
        </div>

        <?php if (isset($_SESSION['user_id'])): ?>
            <form method="POST" class="review-form">
                <input type="hidden" name="id_monan" value="<?= $idMonAn ?>">
                <div class="star-rating-wrapper">
                    <label>Số sao:</label>
                    <div class="star-rating-input">
                        <input type="radio" id="star5" name="soSao" value="5" required>
                        <label for="star5"><i class="fa fa-star"></i></label>
                        <input type="radio" id="star4" name="soSao" value="4">
                        <label for="star4"><i class="fa fa-star"></i></label>
                        <input type="radio" id="star3" name="soSao" value="3">
                        <label for="star3"><i class="fa fa-star"></i></label>
                        <input type="radio" id="star2" name="soSao" value="2">
                        <label for="star2"><i class="fa fa-star"></i></label>
                        <input type="radio" id="star1" name="soSao" value="1">
                        <label for="star1"><i class="fa fa-star"></i></label>
                    </div>
                </div>

                <label>Nội dung đánh giá:
                    <textarea name="noiDung" rows="2" required placeholder="Nhận xét của bạn"></textarea>
                </label>
                <button type="submit" name="submit_danhgia"> Gửi đánh giá</button>
            </form>
        <?php else: ?>
            <div class="review-login-note">Vui lòng <a href="login.php">đăng nhập</a> để đánh giá.</div>
        <?php endif; ?>
    </div>

    <script>
    document.getElementById('btnChiTiet').addEventListener('click', function() {
        var chiTiet = document.getElementById('chiTietNguyenLieu');
        if (chiTiet.style.display === 'none') {
            chiTiet.style.display = 'block';
        } else {
            chiTiet.style.display = 'none';
        }
    });
    </script>
</body>

</html>
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once('../../controller/cMonAn.php');
include_once('../../controller/cDanhGia.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $_SESSION['id_monan'] = intval($_GET['id']);
    header("Location: menu-details.php");
    exit;
}
$idMonAn = $_SESSION['id_monan'] ?? 0;

$monAnController = new MonAnController();
$danhGiaController = new DanhGiaController();
$mon = $monAnController->getMonAnById($idMonAn);
$danhgias = $danhGiaController->layDanhGiaTheoMonAn($idMonAn);

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
            max-width: 600px;
            margin: 30px auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.07);
            padding: 30px;
        }

        .monan-img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 18px;
        }

        .monan-title {
            font-size: 1.4em;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .monan-price {
            color: #e44d26;
            font-weight: bold;
            font-size: 1.1em;
            margin-bottom: 12px;
        }

        .monan-desc {
            color: #444;
            margin-bottom: 18px;
        }

        .review-list {
            background: #f4f7fb;
            border-radius: 10px;
            padding: 15px 18px 10px 18px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
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
            gap: 12px;
            border-bottom: 1px solid #e0e0e0;
            padding: 10px 0 8px 0;
        }

        .review-avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #e3e3e3;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3em;
            color: #fff;
            font-weight: bold;
            flex-shrink: 0;
            overflow: hidden;
        }

        .review-info {
            flex: 1;
        }

        .review-user {
            font-weight: bold;
            color: #333;
            margin-right: 8px;
        }

        .star-rating-view {
            color: #FFD700;
            font-size: 1.1em;
            margin-right: 8px;
        }

        .review-date {
            color: #888;
            font-size: 0.95em;
        }

        .review-content {
            margin: 3px 0 0 0;
            color: #444;
            font-size: 1em;
        }

        .review-form {
            margin-top: 12px;
            background: #fff;
            border-radius: 10px;
            padding: 18px 18px 12px 18px;
            box-shadow: 0 1px 6px rgba(0, 0, 0, 0.06);
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
            background: #007bff;
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
            background: #0056b3;
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
    </style>
</head>

<body>


    <div class="monan-detail-container">
        <img src="../../assets_admin/img/restaurant/<?= $mon['HinhAnh'] ?>" alt="<?= htmlspecialchars($mon['TenMon']) ?>" class="monan-img">
        <div class="monan-title"><?= htmlspecialchars($mon['TenMon']) ?></div>
        <div class="monan-price"><?= number_format($mon['Gia']) ?> VNĐ</div>
        <div class="monan-desc"><?= htmlspecialchars($mon['MoTa'] ?? '') ?></div>

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
                            <div class="review-content"><?= nl2br(htmlspecialchars($dg['NoiDung'])) ?></div>
                            <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $dg['ID_User']): ?>
                                <form method="POST" style="display:inline;">
                                    <input type="hidden" name="xoa_danhgia" value="<?= $dg['ID_DanhGia'] ?>">
                                    <button type="submit" style="background:#dc3545;color:#fff;border:none;padding:2px 10px;border-radius:3px;cursor:pointer;margin-left:8px;" onclick="return confirm('Bạn có chắc muốn xóa đánh giá này?')">
                                        Xóa
                                    </button>
                                </form>
                            <?php endif; ?>
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
</body>

</html>
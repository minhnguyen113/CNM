<?php
session_start();
include_once(__DIR__ . "/../../controller/cUser.php");
include_once(__DIR__ . "/../../controller/cBooking.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Kiểm tra đăng nhập
if (!isset($_SESSION['role_id'])) {
    header("Location: ../customer/login.php");
    exit;
}

// Lấy thông tin user
$userId = $_SESSION['user_id'] ?? null;
$data = [];
if ($userId) {
    $userController = new UserController();
    $staffResult = $userController->StaffGetCustomerById($userId);
    if ($staffResult && mysqli_num_rows($staffResult) > 0) {
        $data = mysqli_fetch_assoc($staffResult);
    }
}

// Lấy lịch sử đặt bàn
$ctrl = new cDatBan();
$lichSu = $ctrl->layLichSu();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lịch sử đặt bàn | Chef Restaurant</title>

    <?php
    include('../admin/head-resource-ad.php');
    ?>

</head>

<body data-lh-mode="light">
    <main class="wrapper sb-default">
        <div class="lh-loader"><span class="loader"></span></div>

        <!-- Header -->
        <header class="lh-header">
            <div class="container-fluid">
                <div class="lh-header-items">
                    <div class="left-header">
                        <a href="javascript:void(0)" class="lh-toggle-sidebar">
                            <span class="outer-ring"><span class="inner-ring"></span></span>
                        </a>
                        <div class="header-search-box">
                            <form class="lh-search">
                                <input class="search-input" type="text" placeholder="Search...">
                                <a href="javascript:void(0)" class="search-btn"><i class="ri-search-line"></i></a>
                            </form>
                        </div>
                    </div>
                    <div class="right-header">
                        <div class="lh-right-tool">
                            <img class="user" id="user-img" src="<?php echo !empty($data['HinhAnh']) ? '../../assets_admin/img/user/' . htmlspecialchars($data['HinhAnh']) : '../../assets_admin/img/user/minh.jpg'; ?>" alt="user">
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Sidebar -->
        <div class="lh-sidebar" data-mode="light">
            <div class="lh-sb-logo">
                <a href="./index.php" class="sb-full"><img src="../../assets_admin/img/logo/logo2.png" alt="logo" style="width:326px;margin-left:-60px"></a>
            </div>
            <div class="lh-sb-wrapper">
                <ul class="lh-sb-list">
                    <li><a href="./index.php" class="lh-page-link"><i class="fa-solid fa-code-commit"></i>Trang chủ</a></li>
                    <li><a href="./history-booking.php" class="lh-page-link"><i class="fa-solid fa-code-commit"></i>Lịch sử đặt bàn</a></li>
                </ul>
            </div>
        </div>

        <!-- Main content -->
        <div class="lh-main-content">
            <div class="container-fluid my-4">
                <div class="card shadow-sm rounded">
                    <div class="card-header bg-primary text-white d-flex align-items-center">
                        <i class="ri-calendar-check-line me-2 fs-5"></i>
                        <h5 class="mb-0">Lịch sử đặt bàn của bạn</h5>
                    </div>
                    <div class="card-body p-0">
                        <?php if (!empty($lichSu)): ?>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Tên bàn</th>
                                            <th>Vị trí</th>
                                            <th>Số chỗ</th>
                                            <th>Số lượng đặt</th>
                                            <th>Thời gian đặt</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($lichSu as $row): ?>
                                            <tr>
                                                <td><?= $i++ ?></td>
                                                <td><?= htmlspecialchars($row['TenBan']) ?></td>
                                                <td><?= htmlspecialchars($row['ViTri']) ?></td>
                                                <td><?= $row['SoChoNgoi'] ?></td>
                                                <td><?= $row['soLuong'] ?></td>
                                                <td><i class="ri-time-line me-1"></i><?= date('H:i d/m/Y', strtotime($row['ThoiGianDat'])) ?></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php else: ?>
                            <div class="p-4 text-center text-muted">
                                <i class="ri-inbox-line fs-2 d-block mb-2"></i>
                                Bạn chưa có lịch sử đặt bàn nào.
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
    include('../customer/chatbot.php');
    include('../admin/footer-scripts-ad.php');
    ?>

</body>
<style>
    #user-img {
    width: 40px;
    height: 40px;
    object-fit: cover;
    border-radius: 50%;
}

</style>
</html>
<?php
session_start();
include_once("../../controller/cMenu.php");
include_once('../../controller/cThucDon.php');
include_once('../../controller/cDanhGia.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$controller = new ThucDonController();
$dsThucDon = $controller->getAllThucDon();
$danhGiaController = new DanhGiaController();
$menuCtrl = new MenuController();

// Xử lý chọn thực đơn (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['chon_thuc_don'])) {
    $_SESSION['thuc_don_id'] = $_POST['chon_thuc_don'];
    header("Location: menu.php");
    exit;
}

$thucDonID = $_SESSION['thuc_don_id'] ?? null;
$monAnList = [];
if ($thucDonID) {
    $monAnList = $controller->getMonAnByThucDon($thucDonID);
}

// Xử lý thêm vào giỏ hàng
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    $item = [
        'id' => $_POST['id'],
        'ten' => $_POST['ten'],
        'gia' => $_POST['gia'],
        'soluong' => $_POST['soluong']
    ];
    $_SESSION['cart'][] = $item;
    header("Location: menu.php");
    exit;
}

// Cập nhật giỏ hàng
if (isset($_POST['update_cart'])) {
    foreach ($_POST['soluong'] as $index => $sl) {
        $_SESSION['cart'][$index]['soluong'] = max(1, intval($sl));
    }
    header("Location: menu.php");
    exit;
}

// Xoá món
if (isset($_POST['remove_index'])) {
    $removeIndex = $_POST['remove_index'];
    unset($_SESSION['cart'][$removeIndex]);
    $_SESSION['cart'] = array_values($_SESSION['cart']);
    header("Location: menu.php");
    exit;
}
?>



<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from maraviyainfotech.com/projects/luxurious-html-v22/luxurious-html/restaurant.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Jan 2025 15:10:12 GMT -->

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Best Luxurious Hotel Booking Template.">
    <meta name="keywords"
        content="hotel, booking, business, restaurant, spa, resort, landing, agency, corporate, start up, site design, new business site, business template, professional template, classic, modern">
    <title>Chef Restaurent</title>
    <?php
    include('./head-resources.php');
    ?>

    <!-- Main Style -->
    <link id="mainCss" href="../../assets_customer/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Overlay -->
    <div class="overlay"></div>
    <div class="lh-loader">
        <span class="loader"></span>
    </div>

    <!-- Header -->
    <header>

        <div class="lh-header h-180">
            <div class="container h-100">
                <div class="row h-100">
                    <nav class="navbar navbar-expand-lg h-100">
                        <a class="navbar-brand" href="./index.php">
                            <img src="../../assets_customer/img/logo/logo1.png" alt="logo" class="lh-logo">
                        </a>
                        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <i class="ri-menu-2-line"></i>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item dropdown">
                                    <a href="javascript:void(0)" role="button" data-bs-toggle="dropdown">
                                        <a class="nav-link dropdown-toggle" href="../index.php">Trang chủ</a>

                                    </a>

                                </li>
                                <li class="nav-item dropdown">
                                    <a href="javascript:void(0)" role="button" data-bs-toggle="dropdown">
                                        <a class="nav-link dropdown-toggle" href="./discount.php"> Khuyến mãi</a>


                                    </a>

                                </li>
                                <li class="nav-item dropdown">
                                    <a href="javascript:void(0)" role="button" data-bs-toggle="dropdown">
                                        <a class="nav-link dropdown-toggle" href="book.php"> Đặt bàn</a>
                                    </a>

                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="menu.php">
                                        Thực đơn
                                    </a>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="Message.php">Liên hệ </a>
                                </li>
                                
                                <li class="nav-item dropdown">
                                    <?php if (isset($_SESSION['username'])): ?>
                                        <?php if ($_SESSION['role_id'] == 1 || $_SESSION['role_id'] == 2): ?>
                                            <a class="nav-link dropdown-toggle" href="../admin/index.php">Quản lý</a>
                                        <?php elseif ($_SESSION['role_id'] == 3): ?>
                                            <a class="nav-link dropdown-toggle" href="team-profile-cus.php">
                                                Xin chào, <?php echo htmlspecialchars($_SESSION['username']); ?>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="logout.php">Đăng Xuất</a></li>
                                            </ul>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <a class="nav-link dropdown-toggle" href="login.php">Đăng nhập</a>
                                    <?php endif; ?>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <!-- Mobile-menu -->


    <!-- Banner -->
    <section class="section-banner">
        <div class="row banner-image">
            <div class="banner-overlay"></div>
            <div class="banner-section">
                <div class="lh-banner-contain">
                    <h2>Thực đơn</h2>
                    <div class="lh-breadcrumb">
                        <h5>
                            <span class="lh-inner-breadcrumb">
                                <a href="./index.php">Trang chủ</a>
                            </span>
                            <span> / </span>
                            <span>
                                <a href="javascript:void(0)">Thực đơn</a>
                            </span>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Restaurant-menu -->
    <section class="section-restaurant padding-tb-100">
        <div class="container">
            <div class="banner" data-aos="fade-up" data-aos-duration="1000">
                <h2><span>Thực đơn</span></h2>
            </div>

            <!-- Tabs danh mục thực đơn để post thay GET -->
            <div class="menu-categories d-flex flex-wrap justify-content-center gap-2 mt-4">
                <?php foreach ($dsThucDon as $td): ?>
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="chon_thuc_don" value="<?= $td['ID_ThucDon'] ?>">
                        <button type="submit" class="btn btn-outline-danger rounded-pill px-4 py-2 <?= (isset($_SESSION['thuc_don_id']) && $_SESSION['thuc_don_id'] == $td['ID_ThucDon']) ? 'active' : '' ?>">
                            <?= $td['TenThucDon'] ?>
                        </button>
                    </form>
                <?php endforeach; ?>
            </div>

            <?php
            // Xử lý chọn thực đơn POST
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['chon_thuc_don'])) {
                $_SESSION['thuc_don_id'] = $_POST['chon_thuc_don'];
                header("Location: menu.php");
                exit;
            }

            $thucDonID = $_SESSION['thuc_don_id'] ?? null;
            if ($thucDonID) {
                $monAnList = $controller->getMonAnByThucDon($thucDonID);
            }
            ?>

            <?php if (!empty($monAnList)): ?>
                <div class="row mt-5">
                    <?php foreach ($monAnList as $mon): ?>
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card shadow-sm h-100">
                                <img src="../../assets_admin/img/restaurant/<?= $mon['HinhAnh'] ?>"
                                    alt="<?= htmlspecialchars($mon['TenMon']) ?>"
                                    class="card-img-top" style="height: 220px; object-fit: cover;">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title text-center"><?= htmlspecialchars($mon['TenMon']) ?></h5>
                                    <p class="text-center text-danger fw-bold fs-5">
                                        <?= number_format($mon['Gia'], 0, ',', '.') ?> VNĐ
                                    </p>
                                    <form method="POST" class="d-flex justify-content-between align-items-center gap-2">
                                        <input type="hidden" name="id" value="<?= $mon['ID_MonAn'] ?>">
                                        <input type="hidden" name="ten" value="<?= htmlspecialchars($mon['TenMon']) ?>">
                                        <input type="hidden" name="gia" value="<?= $mon['Gia'] ?>">
                                        <input type="number" name="soluong" value="1" min="1" class="form-control" style="width: 60px">
                                        <button type="submit" name="add_to_cart" class="btn btn-success">
                                            <i class="fa-solid fa-cart-shopping"></i> Thêm vào giỏ hàng
                                        </button>
                                    </form>
                                    <a href="menu-details.php?id=<?= $mon['ID_MonAn'] ?>" class="btn btn-outline-primary btn-sm mt-2">
                                       Đánh giá <i class="fa-solid fa-star"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="text-center mt-5">
                    <p class="fs-5 text-muted">Vui lòng chọn thực đơn để xem món ăn</p>
                </div>
            <?php endif; ?>

            <div class="text-center mt-4">
                <a href="order.php" class="btn btn-primary">
                    <i class="fas fa-shopping-cart"></i>
                    Giỏ hàng (<?= count($_SESSION['cart'] ?? []) ?>)
                </a>
                <a href="don-hang-cua-toi.php" class="btn btn-outline-secondary ms-2">
                    <i class="fas fa-receipt"></i> Đơn hàng của tôi
                </a>
            </div>
        </div>
    </section>


    <!-- testimonials -->
    <section class="section-testimonials padding-tb-100">
        <div class="container">
            <div class="row">
                <div class="lh-testimonials-banner d-none" data-aos="fade-up" data-aos-duration="1500">
                    <div class="banner">
                        <h2>What Our Client <span>Says</span></h2>
                    </div>
                </div>
                <div class="col-lg-12" data-aos="fade-up" data-aos-duration="2000">
                    <div class="lh-slider">
                        <div class="lh-slide slide-1">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 p-0 align-self-center">
                                        <div class="lh-testimonials">
                                            <div class="row">
                                                <div class="lh-testimonials-contain">
                                                    <div class="d-flex">
                                                        <div class="lh-testimonials-inner">
                                                            <img src="../../assets_customer/img/businessman/businessman-1.jpg"
                                                                alt="businessman" class="businessman">
                                                            <div class="lh-testimonials-name-detalis">
                                                                <h5>Hồng Ánh</h5>
                                                                <span>QUận 3, TP.HCM</span>
                                                            </div>
                                                        </div>
                                                        <div class="lh-testimonials-side-image">
                                                            <img src="../../assets_customer/img/testimonials/quotes.svg"
                                                                class="testimonials svg-img" alt="quotes">
                                                        </div>
                                                    </div>
                                                    <p>
                                                        "Lần đầu ăn bún chả Hà Nội đúng vị như ở phố cổ. Không gian ấm cúng, nhân viên dễ thương. Sẽ quay lại"
                                                    </p>
                                                    <div class="lh-testimonials-holiday">
                                                        <span>"Đánh giá của khách hàng"</span>
                                                        <div class="lh-star">
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-fill"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="lh-slide slide-2">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 p-0 align-self-center">
                                        <div class="lh-testimonials">
                                            <div class="row">
                                                <div class="lh-testimonials-contain">
                                                    <div class="d-flex">
                                                        <div class="lh-testimonials-inner">
                                                            <img src="../../assets_customer/img/businessman/businessman-2.jpg"
                                                                alt="businessman" class="businessman">
                                                            <div class="lh-testimonials-name-detalis">
                                                                <h5>John Doe</h5>
                                                                <span>Bristol, Uk</span>
                                                            </div>
                                                        </div>
                                                        <div class="lh-testimonials-side-image">
                                                            <img src="../../assets_customer/img/testimonials/quotes.svg"
                                                                class="testimonials svg-img" alt="quotes">
                                                        </div>
                                                    </div>
                                                    <p>
                                                        "This is the dolor sit amet consectetur adipisicing elit. Cumque
                                                        odit,
                                                        voluptatum quibusdam fugiat ratione exercitationem, voluptates
                                                        deserunt
                                                        atque sint veniam sit ducimus optio! Blanditiis earum nesciunt
                                                        exercitationem, animi alias ab!"
                                                    </p>
                                                    <div class="lh-testimonials-holiday">
                                                        <span>"Room Service"</span>
                                                        <div class="lh-star">
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-fill"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="lh-slide slide-3">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 p-0 align-self-center">
                                        <div class="lh-testimonials">
                                            <div class="row">
                                                <div class="lh-testimonials-contain">
                                                    <div class="d-flex">
                                                        <div class="lh-testimonials-inner">
                                                            <img src="../../assets_customer/img/businessman/businessman-3.jpg"
                                                                alt="businessman" class="businessman">
                                                            <div class="lh-testimonials-name-detalis">
                                                                <h5>Moris Selemen</h5>
                                                                <span>Bristol, Uk</span>
                                                            </div>
                                                        </div>
                                                        <div class="lh-testimonials-side-image">
                                                            <img src="../../assets_customer/img/testimonials/quotes.svg"
                                                                class="testimonials svg-img" alt="quotes">
                                                        </div>
                                                    </div>
                                                    <p>
                                                        "This is the dolor sit amet consectetur adipisicing elit. Cumque
                                                        odit,
                                                        voluptatum quibusdam fugiat ratione exercitationem, voluptates
                                                        deserunt
                                                        atque sint veniam sit ducimus optio! Blanditiis earum nesciunt
                                                        exercitationem, animi alias ab!"
                                                    </p>
                                                    <div class="lh-testimonials-holiday">
                                                        <span>"Restaurants Dessert"</span>
                                                        <div class="lh-star">
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-fill"></i>
                                                            <i class="ri-star-fill"></i>
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
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-top-section">
                <div class="row">
                    <div class="col-lg-3 col-md-6 rs-pb-24 p-991 order-lg-1 order-md-2 order-2">
                        <div class="lh-footer-cols-contain">
                            <div class="lh-footer-heading">
                                <h4>Explore</h4>
                            </div>
                            <ul>
                                <li>
                                    <code>*</code>
                                    <a href="./index.php">Trang chủ</a>
                                </li>
                                <li>
                                    <code>*</code>
                                    <a href="./discount.php">Khuyến mãi</a>
                                </li>
                                <li>
                                    <code>*</code>
                                    <a href="./book.php">Đặt bàn</a>
                                </li>
                                <li>
                                    <code>*</code>
                                    <a href="./menu.php">Thực đơn</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 rs-pb-24 order-lg-2 order-md-1 order-1">
                        <div class="lh-social-media">
                            <div class="footer-logos">
                                <img src="../../assets_customer/img/logo/logo1.png" alt="logo">
                            </div>
                            <div class="lh-footer-social">
                                <p>Chào mừng đến với nhà hàng Chef – nơi hội tụ tinh hoa ẩm thực Việt. Chúng tôi luôn mang đến cho bạn trải nghiệm tuyệt vời nhất từ món ăn đến phục vụ.</p>
                                <form class="lh-control-footer" role="search">
                                    <div class="lh-control-inner-icons">
                                        <i class="ri-send-plane-line"></i>
                                    </div>
                                    <input class="form-control shadow-none me-4" type="search"
                                        placeholder="Subscribe..." aria-label="Search">
                                </form>
                            </div>
                            <div class="lh-follow-social">
                                <h4 class="heading">Follow On Social</h4>
                                <div class="footer-logo-image">
                                    <a href="#"><img src="../../assets_customer/img/logo/facebook.png"
                                            alt="facebook"></a>
                                    <a href="#"><img src="../../assets_customer/img/logo/twitter.png" alt="twitter"></a>
                                    <a href="#"><img src="../../assets_customer/img/logo/instagram.png"
                                            alt="instagram"></a>
                                    <a href="#"><img src="../../assets_customer/img/logo/linkedin.png"
                                            alt="linkedin"></a>
                                    <a href="#"><img src="../../assets_customer/img/logo/dribbble.png"
                                            alt="dribbble"></a>
                                    <a href="#"><img src="../../assets_customer/img/logo/pinterest.png"
                                            alt="pinterest"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 rs-pb-24 order-lg-3 order-md-3 order-3">
                        <div class="lh-footer-cols-contain ">
                            <div class="lh-footer-heading">
                                <h4>Thông tin liên lạc</h4>
                            </div>
                            <div class="lh-footer-contact-infoemation">
                                <ul>
                                    <li class="lh-information">
                                        <h5 class="heading">Địa chỉ</h5>
                                        <span>4 Nguyễn Văn Bảo, Gò Vấp, TP. Hồ Chí Minh</span>
                                    </li>
                                    <li class="lh-information">
                                        <h5 class="heading">Email</h5>
                                        <span>example@ec-email.com</span>
                                    </li>
                                    <li class="lh-information">
                                        <h5 class="heading">Điện thoại</h5>
                                        <span>+84 379789461</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom-copy">
                <span>Copyright @ <span id="copyright_year"></span> <a href="./index.php">Luxurious</a> All Rights Reserved</span>
            </div>
        </div>
    </footer>

    <!-- Tap to top -->
    <a href="#" class="back-to-top result-placeholder">
        <i class="ri-arrow-up-double-line"></i>
    </a>

    <!-- Side-tool -->
    <div class="tool-overlay"></div>
    <div class="lh-tool">
        <div class="lh-tool-btn">
            <button type="button" class="btn-lh-tool result-placeholder close-tool">
                <i class="ri-settings-line"></i>
            </button>
            <div class="color-variant">
                <div class="tool-header">
                    <h5>Tools</h5>
                </div>
                <div class="heading">
                    <h2>Select Color</h2>
                </div>
                <ul class="lh-color">
                    <li class="colors c1 active-colors">
                        <span class="lh-all-color"></span>
                    </li>
                    <li class="colors c2">
                        <span class="lh-all-color"></span>
                    </li>
                    <li class="colors c3">
                        <span class="lh-all-color"></span>
                    </li>
                    <li class="colors c4">
                        <span class="lh-all-color"></span>
                    </li>
                    <li class="colors c5">
                        <span class="lh-all-color"></span>
                    </li>
                    <li class="colors c6">
                        <span class="lh-all-color"></span>
                    </li>
                    <li class="colors c7">
                        <span class="lh-all-color"></span>
                    </li>
                    <li class="colors c8">
                        <span class="lh-all-color"></span>
                    </li>
                    <li class="colors c9">
                        <span class="lh-all-color"></span>
                    </li>
                    <li class="colors c10">
                        <span class="lh-all-color"></span>
                    </li>
                </ul>
                <div class="heading">
                    <h2>Dark mode</h2>
                </div>
                <ul class="dark-mode">
                    <li class="dark">
                        <span class="lh-all-color"></span>
                    </li>
                    <li class="white active-dark-mode">
                        <span class="lh-all-color"></span>
                    </li>
                </ul>
                <div class="heading">
                    <h2>Skin mode</h2>
                </div>
                <ul class="skin-mode">
                    <li class="skin-1">
                        <span class="lh-all-color"><img src="../../assets_customer/img/skin/1.png" alt="skin-1"></span>
                    </li>
                    <li class="skin-2">
                        <span class="lh-all-color"><img src="../../assets_customer/img/skin/2.png" alt="skin-2"></span>
                    </li>
                    <li class="skin-3 active">
                        <span class="lh-all-color"><img src="../../assets_customer/img/skin/3.png" alt="skin-3"></span>
                    </li>
                </ul>
                <div class="heading">
                    <h2>Border Radius Mode</h2>
                </div>
                <ul class="border-mode">
                    <li class="lh-radius radius-mode active-radius">
                        <span class="lh-all-color"><img src="assets/img/skin/box-1.png" alt="skin-1"></span>
                    </li>
                    <li class="lh-radius radius-mode-none">
                        <span class="lh-all-color"><img src="assets/img/skin/box-2.png" alt="skin-1"></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Plugins JS -->
    <?php
    include('./footer-scripts.php');
    ?>

    <script>
        function toggleMonAn(id) {
            const el = document.getElementById("monan-" + id);
            el.style.display = (el.style.display === "block") ? "none" : "block";
        }

        function toggleDetail(id) {
            var detail = document.getElementById('detail-' + id);
            if (detail.style.display === 'none' || detail.style.display === '') {
                detail.style.display = 'block';
            } else {
                detail.style.display = 'none';
            }
        }
    </script>


</body>


<!-- Mirrored from maraviyainfotech.com/projects/luxurious-html-v22/luxurious-html/restaurant.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Jan 2025 15:10:27 GMT -->

</html>
<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once("../../controller/cBooking.php");

$datBan = new cDatBan();
$datBan->xuLyTaoBanVaDatBan();



?>


<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from maraviyainfotech.com/projects/luxurious-html-v22/luxurious-html/room-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Jan 2025 15:10:57 GMT -->

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

        <div class="lh-header" style="height:180px;">
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
    <div class="lh-sidebar-overlay"></div>


    <!-- Banner -->
    <section class="section-banner">
        <div class="row banner-image">
            <div class="banner-overlay"></div>
            <div class="banner-section">
                <div class="lh-banner-contain">
                    <h2>Đặt bàn</h2>
                    <div class="lh-breadcrumb">
                        <h5>
                            <span class="lh-inner-breadcrumb">
                                <a href="./index.php">Trang chủ</a>
                            </span>
                            <span> / </span>
                            <span>
                                <a href="javascript:void(0)">Đặt bàn</a>
                            </span>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Rooms -->
    <section class="section-rooms bg-gray padding-tb-100">
        <div class="container">
            <div class="banner" data-aos="fade-up" data-aos-duration="2000">
                <h2>Không Gian Ẩm Thực Sang Trọng - <span>Đặt Bàn Ngay Hôm Nay</span></h2>
            </div>
            <div class="row mtb-m-12">
                <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-duration="1500">
                    <div class="rooms-card">
                        <img src="../../assets_customer/img/instagram/ban-2-nguoi.jpg" alt="room" id="book-room">
                        <div class="details">
                            <h3>Bàn 2 người</h3>
                            <span>Giá cả liên hệ</span>
                            <ul>
                                <li><i class="ri-group-line"></i>2 Người</li>
                                <li><i class="ri-restaurant-2-line"></i>Loại Bàn : Bàn đơn</li>
                                <li><i class="mdi mdi-pool"></i>Không gian: Gần cửa kính view đẹp</li>
                                <li><i class="ri-wifi-line"></i>Phục vụ: Wifi miễn phí, điều hòa mát lạnh</li>
                            </ul>
                            <a href="#" class="lh-buttons-2 text-decoration-none"
                                data-bs-toggle="modal"
                                data-bs-target="#bookingModal"
                                onclick="setBanThongTin('Bàn 2 Người', 2 , 'N')"> <!-- thay 1 bằng ID_Ban thật -->
                                Đặt bàn ngay <i class="ri-arrow-right-line"></i>
                            </a>


                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-duration="1500">
                    <div class="rooms-card">
                        <img src="../../assets_customer/img/instagram/ban-gia-dinh.jpg" alt="room" id="book-room">
                        <div class="details">
                            <h3>Bàn gia đình</h3>
                            <span>Giá cả liên hệ</span>
                            <ul>
                                <li><i class="ri-group-line"></i>4-6 Người</li>
                                <li><i class="ri-restaurant-2-line"></i> Loại bàn: Bàn tròn</li>
                                <li><i class="mdi mdi-pool"></i>Phù hợp với gia đình </li>
                                <li><i class="ri-wifi-line"></i>Có sẵn ghế trẻ em</li>
                            </ul>
                            <a href="#" class="lh-buttons-2 text-decoration-none"
                                data-bs-toggle="modal"
                                data-bs-target="#bookingModal"
                                onclick="setBanThongTin('Bàn Gia đình', 3 ,'G')"> <!-- thay 1 bằng ID_Ban thật -->
                                Đặt bàn ngay <i class="ri-arrow-right-line"></i>
                            </a>


                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-duration="1500">
                    <div class="rooms-card">
                        <img src="../../assets_customer/img/instagram/ban-vip.jpg" alt="room" id="book-room">
                        <div class="details">
                            <h3>Bàn vip - Phòng riêng</h3>
                            <span>Giá cả thương lượng</span>
                            <ul>
                                <li><i class="ri-group-line"></i>2-4 Người</li>
                                <li><i class="ri-restaurant-2-line"></i>Phòng riêng sang trọng</li>
                                <li><i class="mdi mdi-pool"></i>Rượu vang kèm</li>
                                <li><i class="ri-wifi-line"></i>Không gian sang trọng, kín đáo</li>
                            </ul>
                            <a href="#" class="lh-buttons-2 text-decoration-none"
                                data-bs-toggle="modal"
                                data-bs-target="#bookingModal"
                                onclick="setBanThongTin('Bàn Vip', 4 ,'V')"> <!-- thay 1 bằng ID_Ban thật -->
                                Đặt bàn ngay <i class="ri-arrow-right-line"></i>
                            </a>


                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-duration="1500">
                    <div class="rooms-card">
                        <img src="../../assets_customer/img/instagram/ban-ngoai-troi.jpg" alt="room" id="book-room">
                        <div class="details">
                            <h3>Bàn ngoài trời</h3>
                            <span>Gía cả liên hệ</span>
                            <ul>
                                <li><i class="ri-group-line"></i>2- 4 Người</li>
                                <li><i class="ri-restaurant-2-line"></i>Không gian ngoài trời</li>
                                <li><i class="mdi mdi-pool"></i>Vườn cây thoáng mát tự nhiên</li>
                                <li><i class="ri-wifi-line"></i>View check-in cực chill</li>
                            </ul>
                            <a href="#" class="lh-buttons-2 text-decoration-none"
                                data-bs-toggle="modal"
                                data-bs-target="#bookingModal"
                                onclick="setBanThongTin('Bàn ngoài trời', 5 ,'T')"> <!-- thay 1 bằng ID_Ban thật -->
                                Đặt bàn ngay <i class="ri-arrow-right-line"></i>
                            </a>

                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-duration="1500">
                    <div class="rooms-card">
                        <img src="../../assets_customer/img/instagram/ban-tiec.jpg" alt="room" id="book-room">
                        <div class="details">
                            <h3>Bàn tiệc - Nhóm 8+ </h3>
                            <span>Giá cả liên hệ</span>
                            <ul>
                                <li><i class="ri-group-line"></i>8 - 12 Người</li>
                                <li><i class="ri-restaurant-2-line"></i>Không gian tiệc nhỏ</li>
                                <li><i class="mdi mdi-pool"></i>Đầy đủ tiện nghi</li>
                                <li><i class="ri-wifi-line"></i>Menu gọi món theo set- Nhiều ưu đãi hấp dẫn</li>
                            </ul>
                            <a href="#" class="lh-buttons-2 text-decoration-none"
                                data-bs-toggle="modal"
                                data-bs-target="#bookingModal"
                                onclick="setBanThongTin('Bàn Tiệc', 6 ,'A')"> <!-- thay 1 bằng ID_Ban thật -->
                                Đặt bàn ngay <i class="ri-arrow-right-line"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-duration="1500">
                    <div class="rooms-card">
                        <img src="../../assets_customer/img/instagram/to-chuc-su-kien.jpg" alt="room" id="book-room">
                        <div class="details">
                            <h3>Phòng tổ chức sự kiện</h3>
                            <span>Giá cả liên hệ</span>
                            <ul>
                                <li><i class="ri-group-line"></i>15 - 30 Người</li>

                                <li><i class="ri-restaurant-2-line"></i>Setup phù hợp với các sự kiện </li>
                                <li><i class="mdi mdi-pool"></i>Gói trang trí - bánh + nến</li>
                                <li><i class="ri-wifi-line"></i>Loa đèn ánh sáng</li>
                            </ul>
                            <a href="#" class="lh-buttons-2 text-decoration-none"
                                data-bs-toggle="modal"
                                data-bs-target="#bookingModal"
                                onclick="setBanThongTin('Bàn sự kiện', 7, 'S')"> <!-- thay 1 bằng ID_Ban thật -->
                                Đặt bàn ngay <i class="ri-arrow-right-line"></i>
                            </a>
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



    <!-- Modal đặt bàn -->
    <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="bookingModalLabel">Đặt Bàn Ngay</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="">
                        <!-- Dữ liệu ẩn cần truyền -->
                        <input type="hidden" name="id_ban" id="id_ban_input" value="">
                        <input type="hidden" name="ten_ban" id="ten_ban_input" value="">
                        <input type="hidden" name="so_cho" id="so_cho_input" value="">
                        <input type="hidden" name="prefix" id="prefix_input">


                        <div class="mb-3">
                            <label for="bookingTime" class="form-label">Thời gian đặt</label>
                            <input type="datetime-local" class="form-control" name="bookingTime" id="bookingTime" required>
                        </div>

                        <div class="mb-3">
                            <label for="tableCount" class="form-label">Số lượng bàn</label>
                            <input type="number" class="form-control" name="tableCount" id="tableCount" min="1" value="1" required>
                        </div>

                        <div class="text-end">
                            <button type="submit" name="book_table" class="btn btn-success">Xác nhận đặt bàn</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




</body>
<script>
    function setBanThongTin(tenBan, soCho, prefix) {
        document.getElementById('ten_ban_input').value = tenBan;
        document.getElementById('so_cho_input').value = soCho;
        document.getElementById('prefix_input').value = prefix;
    }
</script>



<!-- Mirrored from maraviyainfotech.com/projects/luxurious-html-v22/luxurious-html/room-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Jan 2025 15:10:57 GMT -->


<style>
    #book-room {
        width: 100% !important;
        height: 400px !important;
        object-fit: cover;
    }

    /* --- Modal đẹp nhẹ nhàng --- */
    .modal-content {
        border: none;
        border-radius: 20px;
        background: #fff;
        box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
        animation: fadeUp 0.4s ease-in-out;
        overflow: hidden;
    }

    .modal-header {
        border-bottom: none;
        background: linear-gradient(to right, #f45c43, #eb3349);
        color: #fff;
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
    }

    .modal-title {
        font-weight: bold;
        font-size: 1.25rem;
    }

    .modal-body {
        padding: 25px;
    }

    .form-label {
        font-weight: 600;
        color: #333;
    }

    .form-control,
    .form-select {
        border-radius: 10px;
        border: 1px solid #ccc;
        transition: all 0.3s ease;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #f45c43;
        box-shadow: 0 0 0 0.2rem rgba(244, 92, 67, 0.25);
    }

    .btn-success {
        background: linear-gradient(to right, #f45c43, #eb3349);
        border: none;
        padding: 10px 24px;
        border-radius: 30px;
        font-weight: bold;
        transition: all 0.3s ease-in-out;
    }

    .btn-success:hover {
        background: linear-gradient(to right, #eb3349, #f45c43);
        transform: scale(1.05);
    }

    /* --- Custom animation --- */
    @keyframes fadeUp {
        0% {
            opacity: 0;
            transform: translateY(30px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>




</html>
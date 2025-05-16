<?php
session_start();
include_once('../../model/mUser.php');
if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 3) {
    header('Location: login.php');
    exit;
}
$user_id = $_SESSION['user_id'];
$userModel = new UserModel();
$admins = $userModel->getAllUsers();
$admin = mysqli_fetch_assoc($admins);
$other_id = $admin['ID_User']; // luôn là admin
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Mirrored from maraviyainfotech.com/projects/luxurious-html-v22/luxurious-html/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Jan 2025 15:10:59 GMT -->
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
    <div class="lh-sidebar-overlay"></div>


    <!-- Banner -->
    <section class="section-banner">
        <div class="row banner-image">
            <div class="banner-overlay"></div>
            <div class="banner-section">
                <div class="lh-banner-contain">
                    <h2>Liên hệ</h2>
                    <div class="lh-breadcrumb">
                        <h5>
                            <span class="lh-inner-breadcrumb">
                                <a href="./index.php">Trang chủ</a>
                            </span>
                            <span> / </span>
                            <span>
                                <a href="javascript:void(0)">Liên hệ</a>
                            </span>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact -->
    <section class="section-contact padding-tb-100">
        <div class="container">
            <div class="lh-contact-touch" data-aos="fade-up" data-aos-duration="2000">
                <div class="row">
                    <div class="col-lg-12 rs-pb-24">
                        <div class="lh-contact-touch-inner">
                            <div class="chat-container">
                                <div class="chat-header">Liên hệ với chúng tôi</div>
                                <div id="chat-messages"></div>
                                <form id="chat-form" class="chat-form" autocomplete="off">
                                    <input type="hidden" id="other_id" value="<?= $other_id ?>">
                                    <input type="text" id="message" placeholder="Nhập tin nhắn..." required>
                                    <button type="submit">Gửi</button>
                                </form>
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

    <?php
    include('./footer-scripts.php');
    ?>

<style>
        body {
            background: #f0f2f5;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .chat-container {
            background: #fff;
            min-height: 500px;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }
        .chat-header {
            padding: 24px 32px 10px 32px;
            font-size: 1.25em;
            font-weight: 600;
            color: #1976d2;
            background: #f7fafc;
        }
        #chat-messages {
            flex: 1;
            min-height: 200px;
            max-height: 420px;
            overflow-y: auto;
            padding: 0 32px 0 32px;
            margin-bottom: 10px;
            display: flex;
            flex-direction: column;
        }
        .msg {
            margin: 8px 0;
            padding: 10px 18px;
            border-radius: 18px;
            max-width: 60%;
            word-break: break-word;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
            font-size: 1em;
            position: relative;
        }
        .msg.me {
            align-self: flex-end;
            background: linear-gradient(90deg, #1976d2 60%, #42a5f5 100%);
            color: #fff;
            border-bottom-right-radius: 4px;
        }
        .msg.other {
            align-self: flex-start;
            background: #e3f2fd;
            color: #222;
            border-bottom-left-radius: 4px;
        }
        .msg .sender {
            font-weight: 600;
            font-size: 0.97em;
            margin-right: 8px;
        }
        .msg .time {
            font-size: 0.85em;
            color: #f7fafc;
            margin-left: 8px;
        }
        .chat-form {
            display: flex;
            gap: 10px;
            padding: 18px 32px 24px 32px;
            background: #f7fafc;
            border-top: 1px solid #e0e0e0;
        }
        .chat-form input[type=text] {
            flex: 1;
            padding: 12px 16px;
            border: 1px solid #bdbdbd;
            border-radius: 22px;
            font-size: 1em;
            outline: none;
            background: #f7fafc;
            transition: border 0.2s;
        }
        .chat-form input[type=text]:focus {
            border: 1.5px solid #1976d2;
            background: #fff;
        }
        .chat-form button {
            padding: 0 28px;
            background: linear-gradient(90deg, #1976d2 60%, #42a5f5 100%);
            color: #fff;
            border: none;
            border-radius: 22px;
            font-size: 1em;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
            box-shadow: 0 2px 8px rgba(25, 118, 210, 0.08);
        }
        .chat-form button:hover {
            background: linear-gradient(90deg, #1565c0 60%, #1976d2 100%);
        }
        @media (max-width: 700px) {
            .chat-container { min-width: 100vw; border-radius: 0; }
            .chat-header, .chat-form { padding-left: 12px; padding-right: 12px; }
            #chat-messages { padding-left: 12px; padding-right: 12px; }
        }
    </style>

</body>


<!-- Mirrored from maraviyainfotech.com/projects/luxurious-html-v22/luxurious-html/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Jan 2025 15:11:00 GMT -->

</html>
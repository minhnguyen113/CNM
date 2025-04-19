<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from maraviyainfotech.com/projects/luxurious-html-v22/luxurious-html/services.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Jan 2025 15:11:01 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Best Luxurious Hotel Booking Template.">
    <meta name="keywords"
        content="hotel, booking, business, restaurant, spa, resort, landing, agency, corporate, start up, site design, new business site, business template, professional template, classic, modern">
    <title>Luxurious - Hotel Booking HTML Template</title>
  
    <link rel="icon" href="assets/img/favicons/favicon.png" type="image/x-icon">

    <!-- Css All Plugins Files -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/vendor/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/vendor/aos.css">
    <link rel="stylesheet" href="assets/css/vendor/remixicon.css">
    <link rel="stylesheet" href="assets/css/vendor/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/css/vendor/flaticon.min.css">
    <link rel="stylesheet" href="assets/css/vendor/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/vendor/semantic.min.css">
    <link rel="stylesheet" href="assets/css/vendor/slick.min.css">

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
        
 <div class="lh-header h-180" >            <div class="container h-100">
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
                                        <a class="nav-link dropdown-toggle" href="./index.php">Trang chủ</a>

                                    </a>
                                  
                                </li>
                               <li class="nav-item dropdown">
                                    <a href="javascript:void(0)" role="button" data-bs-toggle="dropdown">
                                        <a class="nav-link dropdown-toggle" href="./discount.php"> Khuyến mãi</a>


                                    </a>
                                    
                                </li>
                                 <li class="nav-item dropdown">
                                    <a  href="javascript:void(0)" role="button" data-bs-toggle="dropdown">
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
                                        <a class="nav-link dropdown-toggle" href="team-profile.php">
                                            Xin chào, <?php echo htmlspecialchars($_SESSION['username']); ?>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="logout.php">Đăng xuất</a></li>
                                        </ul>
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
                    <h2>Our Services</h2>
                    <div class="lh-breadcrumb">
                        <h5>
                            <span class="lh-inner-breadcrumb">
                                <a href="./index.php">Home</a>
                            </span>
                            <span> / </span>
                            <span>
                                <a href="javascript:void(0)">Our Services</a>
                            </span>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services -->
    <section class="section-services padding-tb-100">
        <div class="container">
            <div class="banner" data-aos="fade-up" data-aos-duration="1200">
                <h2>Enjoy Your Best <span>Services</span></h2>
            </div>
            <div class="row mtb-m-12">
                <div class="col-lg-4 col-md-6 m-tb-12">
                    <div class="lh-services" data-aos="fade-up" data-aos-duration="1200">
                        <div class="lh-services-contain">
                            <div class="lh-icon">
                                 <img src="../../assets_customer/img/services/service-1.svg" class="svg-img" alt="services img">
                            </div>
                            <h4 class="lh-services-heading">Private Dining Rooms</h4>
                            <p>This is the dolor sit amet consectetur adipisicing eligendi.</p>
                        </div>
                        <div class="lh-services-image">
                            <img src="assets/img/services/1.jpg" alt="services-1">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 m-tb-12">
                    <div class="lh-services" data-aos="fade-up" data-aos-duration="1800">
                        <div class="lh-services-contain">
                            <div class="lh-icon">
                                   <img src="../../assets_customer/img/services/service-2.svg" class="svg-img" alt="services img">
                            </div>                            
                            <h4 class="lh-services-heading">Distinctive Rooms</h4>
                            <p>This is the dolor sit amet consectetur adipisicing eligendi.</p>
                        </div>
                        <div class="lh-services-image">
                            <img src="assets/img/services/2.jpg" alt="services-2">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 m-tb-12">
                    <div class="lh-services" data-aos="fade-up" data-aos-duration="2500">
                        <div class="lh-services-contain">
                            <div class="lh-icon">
                                <img src="../../assets_customer/img/services/service-3.svg" class="svg-img" alt="services img">
                            </div>
                            <h4 class="lh-services-heading">Complimentary Offers</h4>
                            <p>This is the dolor sit amet consectetur adipisicing eligendi.</p>
                        </div>
                        <div class="lh-services-image">
                            <img src="assets/img/services/3.jpg" alt="services-3">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 m-tb-12">
                    <div class="lh-services" data-aos="fade-up" data-aos-duration="1200">
                        <div class="lh-services-contain">
                            <div class="lh-icon">
                               <img src="../../assets_customer/img/services/service-4.svg" class="svg-img" alt="services img">
                            </div>                            
                            <h4 class="lh-services-heading">The Pool</h4>
                            <p>This is the dolor sit amet consectetur adipisicing eligendi.</p>
                        </div>
                        <div class="lh-services-image">
                            <img src="assets/img/services/4.jpg" alt="services-4">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 m-tb-12">
                    <div class="lh-services" data-aos="fade-up" data-aos-duration="1800">
                        <div class="lh-services-contain">
                            <div class="lh-icon">
                               <img src="../../assets_customer/img/services/service-5.svg" class="svg-img" alt="services img">
                            </div>
                            <h4 class="lh-services-heading">Fitness Center</h4>
                            <p>This is the dolor sit amet consectetur adipisicing eligendi.</p>
                        </div>
                        <div class="lh-services-image">
                            <img src="assets/img/services/5.jpg" alt="services-5">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 m-tb-12">
                    <div class="lh-services" data-aos="fade-up" data-aos-duration="2500">
                        <div class="lh-services-contain">
                            <div class="lh-icon">
                               <img src="../../assets_customer/img/services/service-6.svg" class="svg-img" alt="services img">
                            </div>
                            <h4 class="lh-services-heading">Spa Center</h4>
                            <p>This is the dolor sit amet consectetur adipisicing eligendi.</p>
                        </div>
                        <div class="lh-services-image">
                            <img src="assets/img/services/6.jpg" alt="services-6">
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
                                <a href="./index.php">Home</a>
                            </li>
                            <li>
                                <code>*</code>
                                <a href="about.html">About</a>
                            </li>
                            <li>
                                <code>*</code>
                                <a href="room-details.html">Rooms & suites</a>
                            </li>
                            <li>
                                <code>*</code>
                                <a href="spa.html">spa & Wellness</a>
                            </li>
                            <li>
                                <code>*</code>
                                <a href="restaurant.html">Restaurant</a>
                            </li>
                            <li>
                                <code>*</code>
                                <a href="gallery.html">Gallery</a>
                            </li>
                            <li>
                                <code>*</code>
                                <a href="contact.html">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
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



</body>


<!-- Mirrored from maraviyainfotech.com/projects/luxurious-html-v22/luxurious-html/services.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Jan 2025 15:11:03 GMT -->
</html>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from maraviyainfotech.com/projects/luxurious-html-v22/luxurious-html/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Jan 2025 15:10:59 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Best Luxurious Hotel Booking Template.">
    <meta name="keywords"
        content="hotel, booking, business, restaurant, spa, resort, landing, agency, corporate, start up, site design, new business site, business template, professional template, classic, modern">
    <title>Luxurious - Hotel Booking HTML Template</title>
   
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
                    <h2>Contact Us</h2>
                    <div class="lh-breadcrumb">
                        <h5>
                            <span class="lh-inner-breadcrumb">
                                <a href="./index.php">Home</a>
                            </span>
                            <span> / </span>
                            <span>
                                <a href="javascript:void(0)">Contact Us</a>
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
            <div class="row mb-24">
                <div class="col-lg-4 rs-pb-24">
                    <div class="lh-contact" data-aos="fade-up" data-aos-duration="1000">
                        <div class="lh-contact-image">
                            <img src="assets/img/contact/call-1.svg" class="svg-img" alt="call">
                        </div>
                        <div class="lh-contact-detalis">
                            <h4 class="lh-contact-detalis-heading">Make A call</h4>
                            <p>This is the dolor sit amet consectetur adipisicing elit. In, quis!</p>
                            <div class="lh-contact-detalis-buttons">
                                <a href="#">+91 (123) (4560) (789)</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 rs-pb-24">
                    <div class="lh-contact" data-aos="fade-up" data-aos-duration="1500">
                        <div class="lh-contact-image">
                            <img src="assets/img/contact/email-1.svg" class="svg-img" alt="contact">
                        </div>
                        <div class="lh-contact-detalis">
                            <h4 class="lh-contact-detalis-heading">Send A Email</h4>
                            <p>This is the dolor sit amet consectetur adipisicing elit. In, quis!</p>
                            <div class="lh-contact-detalis-buttons">
                                <a href="#">example@gmail.com</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 rs-pb-24">
                    <div class="lh-contact" data-aos="fade-up" data-aos-duration="2000">
                        <div class="lh-contact-image">
                            <img src="assets/img/contact/support-1.svg" class="svg-img" alt="contact">
                        </div>
                        <div class="lh-contact-detalis">
                            <h4 class="lh-contact-detalis-heading">Address</h4>
                            <p>125, This is the, dolor sit amet, consectetur, quister 253 254!</p>
                            <div class="lh-contact-detalis-buttons">
                                <p class="main">United States Of America</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="lh-contact-touch" data-aos="fade-up" data-aos-duration="2000">
                <div class="row">
                <div class="col-lg-6 rs-pb-24">
                    <div class="lh-contact-touch-inner">
                        <div class="lh-contact-touch-contain">
                            <h4 class="lh-contact-touch-contain-heading">Get In Touch With Us Fell Free To Write Us</h4>
                            <p>This is the dolor consectetur adpisicing elit. Deleniti quam exercitationem a
                                expedita natus quisquam. Deleniti Facere exercitationem ratione nihil Deleniti delectus
                                possimus!</p>
                        </div>
                        <div class="lh-contact-touch-inner-form">
                            <form action="#">
                                <div class="lh-contact-touch-inner-form-warp">
                                    <input type="text" name="firstname" placeholder="Your Name*"
                                        class="lh-form-control mr-30" required="">
                                    <input type="email" name="email" placeholder="Your Email*" class="lh-form-control"
                                        required="">
                                </div>
                                <div class="lh-contact-touch-inner-form-warp">
                                    <input type="text" name="firstname" placeholder="Your Subject*"
                                        class="lh-form-control" required="">
                                </div>
                                <div class="lh-contact-touch-inner-form-warp">
                                    <textarea class="lh-form-control" placeholder="Message*"></textarea>
                                </div>
                                <div class="lh-contact-touch-inner-form-button">
                                    <button class="lh-buttons result-placeholder" type="submit">
                                        Send Message
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 rs-pb-24">
                    <div class="lh-contact-touch-ifrem">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29749.225774882685!2d72.84343101893258!3d21.245595574425934!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04f4fb5c0b087%3A0xb7aabd8a90da0679!2sMota%20Varachha%2C%20Surat%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1690017805909!5m2!1sen!2sin"
                            style="border:0;"></iframe>
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
                <div class="col-lg-6 rs-pb-24 order-lg-2 order-md-1 order-1">
                    <div class="lh-social-media">
                        <div class="footer-logos">
                            <img src="assets/img/logo/logo.png" alt="logo">
                        </div>
                        <div class="lh-footer-social">
                            <p>This is the dolor sit amet consectetur adipisicing elit. Libero voluptatem soluta eaque
                                ullam accusantium animi!</p>
                            <form class="lh-control-footer" role="search">
                                <div class="lh-control-inner-icons">
                                    <i class="ri-send-plane-line"></i>
                                </div>
                                <input class="form-control shadow-none me-4" type="search" placeholder="Subscribe..."
                                    aria-label="Search">
                            </form>
                        </div>
                        <div class="lh-follow-social">
                            <h4 class="heading">Follow On Social</h4>
                            <div class="footer-logo-image">
                                <a href="#"><img src="assets/img/logo/facebook.png" alt="facebook"></a>
                                <a href="#"><img src="assets/img/logo/twitter.png" alt="twitter"></a>
                                <a href="#"><img src="assets/img/logo/instagram.png" alt="instagram"></a>
                                <a href="#"><img src="assets/img/logo/linkedin.png" alt="linkedin"></a>
                                <a href="#"><img src="assets/img/logo/dribbble.png" alt="dribbble"></a>
                                <a href="#"><img src="assets/img/logo/pinterest.png" alt="pinterest"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 rs-pb-24 order-lg-3 order-md-3 order-3">
                    <div class="lh-footer-cols-contain ">
                        <div class="lh-footer-heading">
                            <h4>Contact Information</h4>
                        </div>
                        <div class="lh-footer-contact-infoemation">
                            <ul>
                                <li class="lh-information">
                                    <h5 class="heading">Location</h5>
                                    <span>5 Green st.Huntington stati on, Ny 11746, Libero voluptatem soluta
                                        Bharat.</span>
                                </li>
                                <li class="lh-information">
                                    <h5 class="heading">Email</h5>
                                    <span>example@ec-email.com</span>
                                </li>
                                <li class="lh-information">
                                    <h5 class="heading">Phone No</h5>
                                    <span>+91(1234)(567)(890)</span>
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



</body>


<!-- Mirrored from maraviyainfotech.com/projects/luxurious-html-v22/luxurious-html/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Jan 2025 15:11:00 GMT -->
</html>
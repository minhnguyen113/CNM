<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from maraviyainfotech.com/projects/luxurious-html-v22/luxurious-html/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Jan 2025 15:11:04 GMT -->
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
                    <h2>Checkout</h2>
                    <div class="lh-breadcrumb">
                        <h5>
                            <span class="lh-inner-breadcrumb">
                                <a href="./index.php">Home</a>
                            </span>
                            <span> / </span>
                            <span>
                                <a href="javascript:void(0)">Checkout</a>
                            </span>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Checkout-detsils -->
    <section class="checkout-page padding-tb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 check-dash" data-aos="fade-up" data-aos-duration="2000">
                    <div class="lh-checkout">
                        <div class="lh-checkout-content">
                            <div class="lh-checkout-inner">
                                <div class="lh-checkout-wrap mb-24">
                                    <div class="lh-checkout-block lh-check-new">
                                        <h3 class="lh-checkout-title">New Customer</h3>
                                        <div class="lh-check-block-content">
                                            <div class="lh-check-subtitle">Checkout Options</div>
                                            <form action="#">
                                                <span class="lh-new-option">
                                                    <span>
                                                        <input type="radio" id="account1" name="radio-group" checked>
                                                        <label for="account1">Register Account</label>
                                                    </span>
                                                    <span>
                                                        <input type="radio" id="account2" name="radio-group">
                                                        <label for="account2">Guest Account</label>
                                                    </span>
                                                </span>
                                            </form>
                                            <div class="lh-new-desc">By creating an account you will be able to shop faster,
                                                be up to date on an order's status, and keep track of the orders you have
                                                previously made.
                                            </div>
                                            <div class="lh-new-btn"><a href="#" class="lh-buttons">Continue</a></div>
    
                                        </div>
                                    </div>
                                    <div class="lh-checkout-block lh-check-login">
                                        <h3 class="lh-checkout-title">Returning Customer</h3>
                                        <div class="lh-check-login-form">
                                            <form action="#" method="post">
                                                <span class="lh-check-login-wrap">
                                                    <label>Email Address</label>
                                                    <input type="text" name="name" placeholder="Enter your email address"
                                                        required />
                                                </span>
                                                <span class="lh-check-login-wrap">
                                                    <label>Password</label>
                                                    <input type="password" name="password" placeholder="Enter your password"
                                                        required />
                                                </span>
    
                                                <span class="lh-check-login-wrap lh-check-login-btn">
                                                    <button class="lh-buttons mr-12" type="submit">Login</button>
                                                    <a class="lh-check-login-fp" href="#">Forgot Password?</a>
                                                </span>
                                            </form>
                                        </div>
                                    </div>
    
                                </div>
                                <div class="lh-checkout-wrap">
                                    <div class="lh-checkout-block lh-check-bill">
                                        <h3 class="lh-checkout-title">Billing Details</h3>
                                        <div class="lh-bl-block-content">
                                            <div class="lh-check-subtitle">Checkout Options</div>
                                            <span class="lh-bill-option">
                                                <span>
                                                    <input type="radio" id="bill1" name="radio-group">
                                                    <label for="bill1">I want to use an existing address</label>
                                                </span>
                                                <span>
                                                    <input type="radio" id="bill2" name="radio-group" checked>
                                                    <label for="bill2">I want to use new address</label>
                                                </span>
                                            </span>
                                            <div class="lh-check-bill-form">
                                                <form action="#" method="post">
                                                    <span class="lh-bill-wrap lh-bill-half">
                                                        <label>First Name*</label>
                                                        <input type="text" name="firstname"
                                                            placeholder="Enter your first name" required />
                                                    </span>
                                                    <span class="lh-bill-wrap lh-bill-half">
                                                        <label>Last Name*</label>
                                                        <input type="text" name="lastname"
                                                            placeholder="Enter your last name" required />
                                                    </span>
                                                    <span class="lh-bill-wrap">
                                                        <label>Address</label>
                                                        <input type="text" name="address" placeholder="Address Line 1" />
                                                    </span>
                                                    <span class="lh-bill-wrap lh-bill-half mb-15">
                                                        <label>City *</label>
                                                        <span class="lh-bl-select-inner">
                                                            <select name="ec_select_city" id="lh-select-city"
                                                                class="lh-bill-select">
                                                                <option selected disabled>City</option>
                                                                <option value="1">City 1</option>
                                                                <option value="2">City 2</option>
                                                                <option value="3">City 3</option>
                                                                <option value="4">City 4</option>
                                                                <option value="5">City 5</option>
                                                            </select>
                                                        </span>
                                                    </span>
                                                    <span class="lh-bill-wrap lh-bill-half">
                                                        <label>Post Code</label>
                                                        <input type="text" name="postalcode" placeholder="Post Code" />
                                                    </span>
                                                    <span class="lh-bill-wrap lh-bill-half m-xl-0">
                                                        <label>Country *</label>
                                                        <span class="lh-bl-select-inner">
                                                            <select name="ec_select_country" id="lh-select-country"
                                                                class="lh-bill-select">
                                                                <option selected disabled>Country</option>
                                                                <option value="1">Country 1</option>
                                                                <option value="2">Country 2</option>
                                                                <option value="3">Country 3</option>
                                                                <option value="4">Country 4</option>
                                                                <option value="5">Country 5</option>
                                                            </select>
                                                        </span>
                                                    </span>
                                                    <span class="lh-bill-wrap lh-bill-half">
                                                        <label>Region State</label>
                                                        <span class="lh-bl-select-inner">
                                                            <select name="ec_select_state" id="lh-select-state"
                                                                class="lh-bill-select">
                                                                <option selected disabled>Region/State</option>
                                                                <option value="1">Region/State 1</option>
                                                                <option value="2">Region/State 2</option>
                                                                <option value="3">Region/State 3</option>
                                                                <option value="4">Region/State 4</option>
                                                                <option value="5">Region/State 5</option>
                                                            </select>
                                                        </span>
                                                    </span>
                                                </form>
                                            </div>
    
                                        </div>
                                    </div>
    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 check-sidebar" data-aos="fade-up" data-aos-duration="3000">
                    <div class="lh-side-room">
                        <h4 class="lh-room-inner-heading">Reservation</h4>
                        <div class="lh-side-reservation">
                            <form>
                                <div class="lh-side-reservation-from">
                                    <label>Check In</label>
                                    <div class="calendar" id="date_1">
                                        <input type="text" class="reservation-form-control" placeholder="Sep 09,2024">
                                        <i class="ri-calendar-line"></i>
                                    </div>
                                </div>
                                <div class="lh-side-reservation-from">
                                    <label>Check Out</label>
                                    <div class="calendar" id="date_2">
                                        <input type="text" class="reservation-form-control" placeholder="Sep 09,2024">
                                        <i class="ri-calendar-line"></i>
                                    </div>
                                </div>
                                <div class="lh-side-reservation-from">
                                    <label>Room</label>
                                    <div class="custom-select reservation-form-control">
                                        <select>
                                            <option value="option1">1</option>
                                            <option value="option2">2</option>
                                            <option value="option3">3</option>
                                            <option value="option4">4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="lh-side-reservation-from">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label>Adult</label>
                                            <div class="custom-select reservation-form-control">
                                                <select>
                                                    <option value="option1">1</option>
                                                    <option value="option2">2</option>
                                                    <option value="option3">3</option>
                                                    <option value="option4">4</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label>Children</label>
                                            <div class="custom-select reservation-form-control">
                                                <select>
                                                    <option value="option1">1</option>
                                                    <option value="option2">2</option>
                                                    <option value="option3">3</option>
                                                    <option value="option4">4</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="lh-side-reservation-from ex-service">
                                    <h4>Extra Services</h4>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="flexcheckboxDefault"
                                            id="flexcheckboxDefault1">
                                        <label class="form-check-label" for="flexcheckboxDefault1">
                                            Air Conditioner
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="flexcheckboxDefault"
                                            id="flexcheckboxDefault2" checked>
                                        <label class="form-check-label" for="flexcheckboxDefault2">
                                            Free Internet
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="flexcheckboxDefault"
                                            id="flexcheckboxDefault3" checked>
                                        <label class="form-check-label" for="flexcheckboxDefault3">
                                            LCD Television
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="flexcheckboxDefault"
                                            id="flexcheckboxDefault4" checked>
                                        <label class="form-check-label" for="flexcheckboxDefault4">
                                            Microwave
                                        </label>
                                    </div>
                                </div>
                                <div class="lh-side-reservation-from">
                                    <h4>Your Price</h4>
                                    <span>$210 / per room</span>
                                </div>
                                <div class="lh-side-reservation-from">
                                    <div class="lh-side-reservation-from-buttons">
                                        <button class="lh-buttons result-placeholder" type="submit">
                                            Book Now
                                        </button>
                                    </div>
                                </div>
                            </form>
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
                                    <span>example@lh-email.com</span>
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


<!-- Mirrored from maraviyainfotech.com/projects/luxurious-html-v22/luxurious-html/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Jan 2025 15:11:05 GMT -->
</html>
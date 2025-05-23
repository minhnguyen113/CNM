<!--
    Item Name: Luxurious - Hotel Booking HTML Template + Admin Dashboard.
    Author: ashishmaraviya
    Version: 2.2.0
    Copyright 2024
	Author URI: https://themeforest.net/user/ashishmaraviya
-->
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from maraviyainfotech.com/projects/luxurious-html-v22/luxurious-html/demo-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Jan 2025 15:10:44 GMT -->
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
    <link rel="stylesheet" href="../../assets_customer/css/demo-2.css">
    <link rel="stylesheet" href="../../assets_customer/css/box-radius.css" id="add_radius_mode">
    <link rel="stylesheet" href="../../assets_customer/css/color-9.css" id="add_class">
</head>

<body>
    <!-- Overlay -->
    <div class="overlay"></div>
    <div class="lh-loader">
        <span class="loader"></span>
    </div>

    <!-- Header -->
    <header>
        <div class="lh-header">
            <div class="container">
                <div class="row">
                      <nav class="navbar navbar-expand-lg">
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
                                    <a class="nav-link dropdown-toggle" href="javascript:void(0)" role="button"
                                        data-bs-toggle="dropdown">
                                        Trang chủ
                                        <i class="ri-arrow-down-s-line"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="./index.php">Home Layout 1</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="./demo-2.php">Home Layout 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="javascript:void(0)" role="button"
                                        data-bs-toggle="dropdown">
                                        Khuyến mãi
                                        <i class="ri-arrow-down-s-line"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="./gallery.php">gallery 1</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="./gallery-2.php">gallery 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="javascript:void(0)" role="button"
                                        data-bs-toggle="dropdown">
                                        Đặt bàn
                                        <i class="ri-arrow-down-s-line"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="./room.php">Rooms</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="./room-2.php">Rooms 2</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="./room-details.php">Rooms details</a>
                                        </li>
                                    </ul>
                                </li>
                                
                                  <li class="nav-item dropdown">
                                    <a class="nav-link" href="menu.php">
                                        Thực đơn
                                    </a>
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
    <div id="lh_mobile_menu" class="lh-side-cart lh-mobile-menu">
        <div class="lh-menu-title">
            <span class="menu-title">My Menu</span>
            <button class="lh-close">×</button>
        </div>
        <div class="lh-menu-inner">
            <input type="text" placeholder="Search" class="lh-menu-box">
            <div class="lh-menu-content">
                <ul>
                    <li class="dropdown drop-list">
                        <a href="#" class="dropdown-list">Home</a>
                        <ul class="sub-menu">
                            <li><a href="./index.php">Home Layout 1</a></li>
                            <li><a href="demo-2.php">Home Layout 2</a></li>
                        </ul>
                    </li>
                    <li class="dropdown drop-list">
                        <a href="#" class="dropdown-list">Categories</a>
                        <ul class="sub-menu">
                            <li><a href="gallery.php">gallery 1</a></li>
                            <li><a href="gallery-2.php">gallery 2</a></li>
                        </ul>
                    </li>
                    <li class="dropdown drop-list">
                        <a href="#" class="dropdown-list">Room</a>
                        <ul class="sub-menu">
                            <li><a href="room.php">Rooms 1</a></li>
                            <li><a href="room-2.php">Rooms 2</a></li>
                            <li><a href="room-details.php">Room Details</a></li>
                        </ul>
                    </li>
                    <li class="dropdown drop-list">
                        <a href="#" class="dropdown-list">Pages</a>
                        <ul class="sub-menu">
                            <li><a href="about.php">About Us</a></li>
                            <li><a href="contact.php">Contact</a></li>
                            <li><a href="facilities.php">Facilities</a></li>
                            <li><a href="faq.php">Faq</a></li>
                            <li><a href="prices.php">Prices</a></li>
                            <li><a href="services.php">Services</a></li>
                            <li><a href="spa.php">Spa</a></li>
                            <li><a href="team.php">Team</a></li>
                            <li><a href="checkout.php">Checkout</a></li>
                        </ul>
                    </li>
                    <li class="dropdown drop-list">
                        <a href="#" class="dropdown-list">Blog</a>
                        <ul class="sub-menu">
                            <li><a href="blog.php">Blog</a></li>
                            <li><a href="blog-details.php">Blog Details</a></li>
                        </ul>
                    </li>
                    <li class="dropdown drop-list">
                        <a href="restaurant.php">Restaurant</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Hero Slider Start -->
    <section class="section lh-hero m-tb-40">
        <div class="lh-main-content">
            <!-- Hero Slider Start -->
            <div class="lh-slider-content hero-image">
                <div class="lh-main-slider">
                    <div class="lh-main-slider swiper-container main-slider-nav main-slider-dot">
                        <!-- Main slider  -->
                        <div class="swiper-wrapper">
                            <div class="lh-slide-item swiper-slide d-flex slide-1">
                                <div class="lh-slide-content slider-animation">
                                    <p>Rooms Starting at $200/Night</p>
                                    <h1 class="lh-slide-title">Best Five Star Hotel & Facilities.</h1>
                                    <div class="lh-slide-btn">
                                        <a href="#" class="lh-buttons-2">Rooms & Suites<i
                                                class="fi-rr-angle-double-small-right" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="lh-slide-item swiper-slide d-flex slide-2">
                                <div class="lh-slide-content slider-animation">
                                    <p>Spa Starting at $150</p>
                                    <h1 class="lh-slide-title">Enjoy the best spa facilities.</h1>
                                    <div class="lh-slide-btn">
                                        <a href="#" class="lh-buttons-2">Book Now <i
                                                class="fi-rr-angle-double-small-right" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="lh-slide-item swiper-slide d-flex slide-3">
                                <div class="lh-slide-content slider-animation">
                                    <p>Sun, Fun, and Poolside Escape.</p>
                                    <h1 class="lh-slide-title">Make Waves of Memories Here.</h1>
                                    <div class="lh-slide-btn">
                                        <a href="#" class="lh-buttons-2">Book Now <i
                                                class="fi-rr-angle-double-small-right" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination swiper-pagination-white"></div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Slider End -->

    <!-- search-control -->
    <section class="section-search-control section-search-control-2">
        <div class="container">
            <form>
                <div class="search-control-boxing search-control-boxing-2">
                    <div class="lh-col">
                        <div class="search-box search-box-2">
                            <h4 class="heading">
                                Check in
                            </h4>
                            <div class="calendar" id="date_1">
                                <i class="ri-calendar-2-line"></i>
                                <input type="text" placeholder="Arrival Date" class="lh-book-form-control">
                            </div>
                        </div>
                    </div>
                    <div class="lh-col">
                        <div class="search-box search-box-2">
                            <h4 class="heading">
                                Check Out
                            </h4>
                            <div class="calendar" id="date_2">
                                <i class="ri-calendar-2-line"></i>
                                <input type="text" placeholder="Leave Date" class="lh-book-form-control">
                            </div>
                        </div>
                    </div>
                    <div class="lh-col">
                        <div class="search-box search-box-2">
                            <h4 class="heading">
                                Adults
                            </h4>
                            <div class="custom-select">
                                <select>
                                    <option value="option1">Select</option>
                                    <option value="option2">One</option>
                                    <option value="option3">Two</option>
                                    <option value="option4">Three</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="lh-col">
                        <div class="search-box search-box-2">
                            <h4 class="heading">
                                Children
                            </h4>
                            <div class="custom-select">
                                <select>
                                    <option value="option1">Select</option>
                                    <option value="option2">One</option>
                                    <option value="option3">Two</option>
                                    <option value="option4">Three</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="lh-col-check">
                        <div class="search-control-button">
                            <a class="lh-buttons result-placeholder" href="checkout.php">
                                Check Now
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <!-- About -->
    <section class="section-about padding-tb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 rs-pb-24" data-aos="fade-up" data-aos-duration="1500">
                    <img src="../../assets_customer/img/about/about-3.png" alt="about" class="w-100">
                </div>
                <div class="col-lg-6 rs-pb-24" data-aos="fade-up" data-aos-duration="2000">
                    <div class="lh-about-detail">
                        <div class="banner t-left">
                            <span><img class="logo" src="../../assets_customer/img/logo/logo1.png" alt="logo"></span>
                            <h2>Enjoy the best Luxury hotel <span>Experience</span>.</h2>
                        </div>
                        <div class="lh-branches-paragraph">
                            <p>This is the dolor sit amet consectetur adipisicing elit. Quasi eos ducimus magnam unde
                                fugit qui perferendis repudiandae modi officia. Quae eaque fugiat minima quasi sapiente,
                                vel
                                dolore numquam quo!</p>
                            <p>Quasi eos ducimus magnam unde fugit qui perferendis This is the dolor sit amet
                                consectetur adipisicing elit. Quasi eos ducimus magnam unde
                                fugit qui perferendis repudiandae modi officia. Quae eaque fugiat minima quasi sapiente,
                                vel dolore numquam quo!</p>
                        </div>
                        <div class="lh-abouts-buttons">
                            <a class="lh-buttons result-placeholder" href="about.html">
                                View More
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Rooms -->
    <section class="section-rooms bg-gray padding-tb-100">
        <div class="container">
            <div class="banner" data-aos="fade-up" data-aos-duration="2000">
                <h2>Our Luxury <span>Rooms</span></h2>
                <p>Checkout our luxury rooms and enjoy!</p>
            </div>
            <div class="row" data-aos="fade-up" data-aos-duration="2000">
                <div class="rooms-slider">
                    <div class="rooms-card">
                        <img src="../../assets_customer/img/room/6.jpg" alt="room">
                        <div class="details">
                            <h3>Junior Rooms</h3>
                            <span>$400 / Night</span>
                            <ul>
                                <li><i class="ri-group-line"></i>2 Persons</li>
                                <li><i class="ri-hotel-bed-line"></i>1 Double Bed</li>
                                <li><i class="ri-restaurant-2-line"></i>Breakfast</li>
                                <li><i class="mdi mdi-pool"></i>Swimming Pool</li>
                                <li><i class="ri-wifi-line"></i>Free Wifi</li>
                            </ul>
                            <a href="room-details.php" class="lh-buttons-2">View More <i
                                    class="ri-arrow-right-line"></i></a>
                        </div>
                    </div>
                    <div class="rooms-card">
                        <img src="../../assets_customer/img/room/7.jpg" alt="room">
                        <div class="details">
                            <h3>Family Rooms</h3>
                            <span>$600 / Night</span>
                            <ul>
                                <li><i class="ri-group-line"></i>2 Persons</li>
                                <li><i class="ri-hotel-bed-line"></i>1 Double Bed</li>
                                <li><i class="ri-restaurant-2-line"></i>Breakfast</li>
                                <li><i class="mdi mdi-pool"></i>Swimming Pool</li>
                                <li><i class="ri-wifi-line"></i>Free Wifi</li>
                            </ul>
                          <a href="room-details.php" class="lh-buttons-2">View More <i
                                    class="ri-arrow-right-line"></i></a>
                        </div>
                    </div>
                    <div class="rooms-card">
                        <img src="../../assets_customer/img/room/8.jpg" alt="room">
                        <div class="details">
                            <h3>Deluxe Rooms</h3>
                            <span>$800 / Night</span>
                            <ul>
                                <li><i class="ri-group-line"></i>2 Persons</li>
                                <li><i class="ri-hotel-bed-line"></i>1 Double Bed</li>
                                <li><i class="ri-restaurant-2-line"></i>Breakfast</li>
                                <li><i class="mdi mdi-pool"></i>Swimming Pool</li>
                                <li><i class="ri-wifi-line"></i>Free Wifi</li>
                            </ul>
                          <a href="room-details.php" class="lh-buttons-2">View More <i
                                    class="ri-arrow-right-line"></i></a>
                        </div>
                    </div>
                    <div class="rooms-card">
                        <img src="../../assets_customer/img/room/9.jpg" alt="room">
                        <div class="details">
                            <h3>Premium Rooms</h3>
                            <span>$1000 / Night</span>
                            <ul>
                                <li><i class="ri-group-line"></i>2 Persons</li>
                                <li><i class="ri-hotel-bed-line"></i>1 Double Bed</li>
                                <li><i class="ri-restaurant-2-line"></i>Breakfast</li>
                                <li><i class="mdi mdi-pool"></i>Swimming Pool</li>
                                <li><i class="ri-wifi-line"></i>Free Wifi</li>
                            </ul>
                          <a href="room-details.php" class="lh-buttons-2">View More <i
                                    class="ri-arrow-right-line"></i></a>
                        </div>
                    </div>
                    <div class="rooms-card">
                        <img src="../../assets_customer/img/room/10.jpg" alt="room">
                        <div class="details">
                            <h3>VIP Rooms</h3>
                            <span>$1200 / Night</span>
                            <ul>
                                <li><i class="ri-group-line"></i>2 Persons</li>
                                <li><i class="ri-hotel-bed-line"></i>1 Double Bed</li>
                                <li><i class="ri-restaurant-2-line"></i>Breakfast</li>
                                <li><i class="mdi mdi-pool"></i>Swimming Pool</li>
                                <li><i class="ri-wifi-line"></i>Free Wifi</li>
                            </ul>
                          <a href="room-details.php" class="lh-buttons-2">View More <i
                                    class="ri-arrow-right-line"></i></a>
                        </div>
                    </div>
                    <div class="rooms-card">
                        <img src="../../assets_customer/img/room/11.jpg" alt="room">
                        <div class="details">
                            <h3>VVIP Rooms</h3>
                            <span>$1600 / Night</span>
                            <ul>
                                <li><i class="ri-group-line"></i>2 Persons</li>
                                <li><i class="ri-hotel-bed-line"></i>1 Double Bed</li>
                                <li><i class="ri-restaurant-2-line"></i>Breakfast</li>
                                <li><i class="mdi mdi-pool"></i>Swimming Pool</li>
                                <li><i class="ri-wifi-line"></i>Free Wifi</li>
                            </ul>
                          <a href="room-details.php" class="lh-buttons-2">View More <i
                                    class="ri-arrow-right-line"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Amenities -->
    <section class="section-amenities padding-tb-100">
        <div class="container">
            <div class="banner d-none" data-aos="fade-up" data-aos-duration="2000">
                <h2>Amenities At <span>Hotel</span></h2>
            </div>
            <div class="row mtb-m-12">
                <div class="col-md-6 col-sm-12 m-tb-12">
                    <div class="lh-amenities" data-aos="fade-up" data-aos-duration="1500">
                        <div class="amenities-detail">
                            <div class="amenities-box">
                                <img src="../../assets_customer/img/amenities/1.jpg" alt="amenities_1" class="amenities-left-image">
                            </div>
                            <div class="amenities-box detail-box">
                                <div class="lh-amenities-in">
                                    <h4 class="side-number">01</h4>
                                    <div class="lh-top-dish">
                                        <img src="../../assets_customer/img/amenities/amenities-dish-1.svg" class="svg-img"
                                            alt="amenities-dish-1">
                                    </div>
                                    <div class="amenities-contain">
                                        <h4 class="amenities-heading">Our Restaurant</h4>
                                        <p>This is the dolor sit amet adipisicing elit. Ducimus corrupti sit amet
                                            tempore placeat ipsa.</p>
                                        <a href="facilities.php">Read more <i class="ri-arrow-right-line"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 m-tb-12">
                    <div class="lh-amenities" data-aos="fade-up" data-aos-duration="2000">
                        <div class="amenities-detail">
                            <div class="amenities-box">
                                <img src="../../assets_customer/img/amenities/2.jpg" alt="amenities_2" class="amenities-left-image">
                            </div>
                            <div class="amenities-box detail-box">
                                <div class="lh-amenities-in">
                                    <h4 class="side-number">02</h4>
                                    <div class="lh-top-dish">
                                        <img src="../../assets_customer/img/amenities/amenities-dish-2.svg" class="svg-img"
                                            alt="amenities-dish-2">
                                    </div>
                                    <div class="amenities-contain">
                                        <h4 class="amenities-heading">Spa & Beauty</h4>
                                        <p>This is the dolor sit amet adipisicing elit. Ducimus corrupti sit amet
                                            tempore placeat ipsa.</p>
                                        <a href="facilities.php">Read more <i class="ri-arrow-right-line"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 m-tb-12">
                    <div class="lh-amenities" data-aos="fade-up" data-aos-duration="1500">
                        <div class="amenities-detail">
                            <div class="amenities-box detail-box">
                                <div class="lh-amenities-in lh-amenities-right">
                                    <h4 class="side-number">03</h4>
                                    <div class="lh-top-dish">
                                        <img src="../../assets_customer/img/amenities/amenities-dish-4.svg" class="svg-img"
                                            alt="amenities-dish-3">
                                    </div>
                                    <div class="amenities-contain">
                                        <h4 class="amenities-heading">Golf & Garden</h4>
                                        <p>This is the dolor sit amet adipisicing elit. Ducimus corrupti sit amet
                                            tempore placeat ipsa.</p>
                                        <a href="facilities.php">Read more <i class="ri-arrow-right-line"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="amenities-box">
                                <img src="../../assets_customer/img/amenities/3.jpg" alt="amenities_3" class="amenities-right-image">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 m-tb-12">
                    <div class="lh-amenities" data-aos="fade-up" data-aos-duration="2000">
                        <div class="amenities-detail">
                            <div class="amenities-box detail-box">
                                <div class="lh-amenities-in lh-amenities-right">
                                    <h4 class="side-number">04</h4>
                                    <div class="lh-top-dish">
                                        <img src="../../assets_customer/img/amenities/amenities-dish-3.svg" class="svg-img"
                                            alt="amenities-dish-4">
                                    </div>
                                    <div class="amenities-contain">
                                        <h4 class="amenities-heading">Fitness & Gym</h4>
                                        <p>This is the dolor sit amet adipisicing elit. Ducimus corrupti sit amet
                                            tempore placeat ipsa.</p>
                                        <a href="facilities.php">Read more <i class="ri-arrow-right-line"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="amenities-box">
                                <img src="../../assets_customer/img/amenities/4.jpg" alt="amenities_4" class="amenities-right-image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services -->
    <section class="section-services dark-bg padding-tb-100">
        <div class="container">
            <div class="banner" data-aos="fade-up" data-aos-duration="1200">
                <h2>Enjoy Our Best <span>Services</span></h2>
                <p>Enjoy our best luxury service!</p>
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
                            <a class="direct" href="services.php"><i class="ri-arrow-right-line"></i></a>
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
                          <a class="direct" href="services.php"><i class="ri-arrow-right-line"></i></a>
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
                          <a class="direct" href="services.php"><i class="ri-arrow-right-line"></i></a>
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
                          <a class="direct" href="services.php"><i class="ri-arrow-right-line"></i></a>
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
                          <a class="direct" href="services.php"><i class="ri-arrow-right-line"></i></a>
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
                          <a class="direct" href="services.php"><i class="ri-arrow-right-line"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Prices -->
    <section class="section-prices padding-tb-100">
        <div class="container">
            <div class="row">
                <div class="banner" data-aos="fade-up" data-aos-duration="1000">
                    <h2>The Best <span>Extra Services</span></h2>
                    <p>Enjoy our best luxury extra service!</p>
                </div>
                <div class="col-lg-4 rs-pb-24">
                    <div class="lh-prices" data-aos="fade-up" data-aos-duration="1000">
                        <img src="../../assets_customer/img/prices/1.jpg" alt="prices_1" class="prices-image">
                        <div class="lh-prices-out">
                            <div class="lh-prices-in">
                                <h4 class="lh-price-dollar"><span>$</span>50<code> / Per night</code></h4>
                                <h4 class="lh-prices-heading">Standard Room</h4>
                            </div>
                            <div class="lh-prices-viwe">
                                <ul>
                                    <li>
                                        <span>Bed & Breakfast</span>
                                        <i class="ri-arrow-right-line"></i>
                                    </li>
                                    <li>
                                        <span>Home Made Food</span>
                                        <i class="ri-arrow-right-line"></i>
                                    </li>
                                    <li>
                                        <span>Tour Guide</span>
                                        <i class="ri-arrow-right-line"></i>
                                    </li>
                                    <li>
                                        <span>Safety & security</span>
                                        <i class="ri-arrow-right-line"></i>
                                    </li>
                                    <li>
                                        <span>Local Heritage</span>
                                        <i class="ri-arrow-right-line"></i>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 rs-pb-24">
                    <div class="lh-prices" data-aos="fade-up" data-aos-duration="2000">
                        <img src="../../assets_customer/img/prices/2.jpg" alt="prices_2" class="prices-image active">
                        <div class="lh-prices-out">
                            <div class="lh-prices-in">
                                <h4 class="lh-price-dollar"><span>$</span>75<code> / Per night</code></h4>
                                <h4 class="lh-prices-heading">Deluxe Room</h4>
                            </div>
                            <div class="lh-prices-viwe">
                                <ul>
                                    <li>
                                        <span>Bed & Breakfast</span>
                                        <i class="ri-arrow-right-line"></i>
                                    </li>
                                    <li>
                                        <span>Home Made Food</span>
                                        <i class="ri-arrow-right-line"></i>
                                    </li>
                                    <li>
                                        <span>Tour Guide</span>
                                        <i class="ri-arrow-right-line"></i>
                                    </li>
                                    <li>
                                        <span>Safety & security</span>
                                        <i class="ri-arrow-right-line"></i>
                                    </li>
                                    <li>
                                        <span>Local Heritage</span>
                                        <i class="ri-arrow-right-line"></i>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 rs-pb-24">
                    <div class="lh-prices" data-aos="fade-up" data-aos-duration="3000">
                        <img src="../../assets_customer/img/prices/3.jpg" alt="prices_3" class="prices-image">
                        <div class="lh-prices-out">
                            <div class="lh-prices-in">
                                <h4 class="lh-price-dollar"><span>$</span>99<code> / Per night</code></h4>
                                <h4 class="lh-prices-heading">Premium Suite</h4>
                            </div>
                            <div class="lh-prices-viwe">
                                <ul>
                                    <li>
                                        <span>Bed & Breakfast</span>
                                        <i class="ri-arrow-right-line"></i>
                                    </li>
                                    <li>
                                        <span>Home Made Food</span>
                                        <i class="ri-arrow-right-line"></i>
                                    </li>
                                    <li>
                                        <span>Tour Guide</span>
                                        <i class="ri-arrow-right-line"></i>
                                    </li>
                                    <li>
                                        <span>Safety & security</span>
                                        <i class="ri-arrow-right-line"></i>
                                    </li>
                                    <li>
                                        <span>Local Heritage</span>
                                        <i class="ri-arrow-right-line"></i>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Video -->
    <section class="section-video v-bg padding-tb-100 p-0">
        <div class="banner d-none" data-aos="fade-up" data-aos-duration="1000">
            <h2>The Best <span>Video</span></h2>
        </div>
        <div class="container" data-aos="fade-up" data-aos-duration="2000">
            <div class="v-details">
                <div class="banner">
                    <h2>The Best <span>Luxurious</span> Hotel In Brazil.</h2>
                    <p>This is the dolor sit amet consectetur adipisicing elit. Quasi eos ducimus magnam unde
                        fugit qui perferendis repudiandae modi officia. Quae eaque fugiat minima quasi sapiente,
                        vel</p>
                        <a class="lh-header-btn lh-header-wishlist lh-video-icon" data-link-action="quickview" title="video Player" data-bs-toggle="modal" data-bs-target="#lh_video_player_modal">
                            <div class="header-icon"><i class="ri-play-line"></i></div>
                        </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
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
                                                                <h5>Jenifer Brown</h5>
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
                                                        <span>"Amenities At Hotel"</span>
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

    <!-- Blog -->
    <section class="section-blog bg-gray padding-tb-100">
        <div class="container">
            <div class="banner" data-aos="fade-up" data-aos-duration="2000">
                <h2>Stay Update With <span>Us</span></h2>
                <p>Check our latest news & Blogs and stay update!</p>
            </div>
            <div class="slick-slider blog-slider" data-aos="fade-up" data-aos-duration="2000">
                <div class="blog-card">
                    <figure><img src="../../assets_customer/img/blog/2.jpg" alt="blog-img" class="blog-image-top"></figure>
                    <div class="lh-blog">
                        <div class="lh-blog-date">
                            <span><code>Restaurant</code> - 09 Jan 2024 - 05 Comment</span>
                        </div>
                        <a class="top-heding" href="blog-details.html">Offers Exclusive amenities & Facilities To Guests
                            and free offers.</a>
                    </div>
                </div>
                <div class="blog-card">
                    <figure><img src="../../assets_customer/img/blog/3.jpg" alt="blog-img" class="blog-image-top"></figure>
                    <div class="lh-blog">
                        <div class="lh-blog-date">
                            <span><code>Marketing</code> - 15 Feb 2024 - 22 Comment</span>
                        </div>
                        <a class="top-heding" href="blog-details.html">Announces A Private Island Hotel In The Maldives
                            for couple.</a>
                    </div>
                </div>
                <div class="blog-card">
                    <figure><img src="../../assets_customer/img/blog/4.jpg" alt="blog-img" class="blog-image-top"></figure>
                    <div class="lh-blog">
                        <div class="lh-blog-date">
                            <span><code>Hotel</code> - 22 Dec 2024 - 00 Comment</span>
                        </div>
                        <a class="top-heding" href="blog-details.html">Exclusive amenities Facilities to Guests Offers
                            rooms free.</a>
                    </div>
                </div>
                <div class="blog-card">
                    <figure><img src="../../assets_customer/img/blog/5.jpg" alt="blog-img" class="blog-image-top"></figure>
                    <div class="lh-blog">
                        <div class="lh-blog-date">
                            <span><code>Rooms</code> - 11 Nov 2024 - 01 Comment</span>
                        </div>
                        <a class="top-heding" href="blog-details.html">Island Hotel In The Maldives Exclusive amenities
                            Facilities.</a>
                    </div>
                </div>
                <div class="blog-card">
                    <figure><img src="../../assets_customer/img/blog/6.jpg" alt="blog-img" class="blog-image-top"></figure>
                    <div class="lh-blog">
                        <div class="lh-blog-date">
                            <span><code>Spa</code> - 02 Mar 2024 - 25 Comment</span>
                        </div>
                        <a class="top-heding" href="blog-details.html">Amenities Facilities to Guests Offers rooms free
                            Exclusive.</a>
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
                    <div class="col-lg-4 rs-pb-24">
                        <div class="lh-social-media">
                            <div class="footer-logos">
                                <img src="../../assets_customer/img/logo/logo1.png" alt="logo">
                            </div>
                            <div class="lh-footer-social">
                                <p>This is the dolor sit amet consectetur adipisicing elit. Libero voluptatem soluta
                                    eaque
                                    ullam accusantium animi!</p>
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
                                    <a href="#"><img src="../../assets_customer/img/logo/facebook.png" alt="facebook"></a>
                                    <a href="#"><img src="../../assets_customer/img/logo/twitter.png" alt="twitter"></a>
                                    <a href="#"><img src="../../assets_customer/img/logo/instagram.png" alt="instagram"></a>
                                    <a href="#"><img src="../../assets_customer/img/logo/linkedin.png" alt="linkedin"></a>
                                    <a href="#"><img src="../../assets_customer/img/logo/dribbble.png" alt="dribbble"></a>
                                    <a href="#"><img src="../../assets_customer/img/logo/pinterest.png" alt="pinterest"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="offset-lg-1 col-lg-2 col-md-6 rs-pb-24">
                        <div class="lh-footer-cols-contain">
                            <div class="lh-footer-heading">
                                <h4>Explore</h4>
                            </div>
                            <ul class="f-list">
                                <li>
                                    <a href="./index.php">Home</a>
                                </li>
                                <li>
                                    <a href="about.php">About</a>
                                </li>
                                <li>
                                    <a href="room-details.php">Rooms & suites</a>
                                </li>
                                <li>
                                    <a href="spa.php">spa & Wellness</a>
                                </li>
                                <li>
                                    <a href="restaurant.php">Restaurant</a>
                                </li>
                                <li>
                                    <a href="gallery.php">Gallery</a>
                                </li>
                                <li>
                                    <a href="contact.php">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 rs-pb-24">
                        <div class="lh-footer-cols-contain">
                            <div class="lh-footer-heading">
                                <h4>City Branches</h4>
                            </div>
                            <ul class="f-list">
                                <li>
                                    <a href="about.php">India</a>
                                </li>
                                <li>
                                    <a href="about.php">Mexico</a>
                                </li>
                                <li>
                                    <a href="about.php">Venezuela</a>
                                </li>
                                <li>
                                    <a href="about.php">Germany</a>
                                </li>
                                <li>
                                    <a href="about.php">Australia</a>
                                </li>
                                <li>
                                    <a href="about.php">swidden</a>
                                </li>
                                <li>
                                    <a href="about.php">California</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 rs-pb-24">
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

    <!-- Modal Video -->
    <div class="modal fade" id="lh_video_player_modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered v-modal-dialog" role="document">
            <div class="modal-content v-modal-content">
                <div class="modal-body lh-video-player">
                    <a href="#" class="qty_close" data-bs-dismiss="modal"
                        aria-label="Close"><i class="ri-close-line"></i></a>
                    <!--HTML5 Video Plyr.io -->
                    <div class="lh-player-wrapper">
                        <video poster="../../assets_customer/img/video/1.jpg" class="js-player" autoplay muted crossorigin
                            playsinline controls>
                            <source src="../../assets_customer/img/video/2.mp4" />
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end -->

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
                    <li class="colors c1">
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
                    <li class="colors c10 active-colors">
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
                    <li class="lh-radius radius-mode">
                        <span class="lh-all-color"><img src="../../assets_customer/img/skin/box-1.png" alt="skin-1"></span>
                    </li>
                    <li class="lh-radius radius-mode-none active-radius">
                        <span class="lh-all-color"><img src="../../assets_customer/img/skin/box-2.png" alt="skin-1"></span>
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


<!-- Mirrored from maraviyainfotech.com/projects/luxurious-html-v22/luxurious-html/demo-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Jan 2025 15:10:48 GMT -->
</html>
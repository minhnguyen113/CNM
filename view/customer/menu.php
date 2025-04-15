<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
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
                                        <a class="nav-link dropdown-toggle" href="../index.php">Trang chủ</a>

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
                    <h2>Restaurant</h2>
                    <div class="lh-breadcrumb">
                        <h5>
                            <span class="lh-inner-breadcrumb">
                                <a href="./index.php">Home</a>
                            </span>
                            <span> / </span>
                            <span>
                                <a href="javascript:void(0)">Restaurant</a>
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
                <h2>Restaurant <span>Menu</span></h2>
            </div>
            <nav class="p-0" data-aos="fade-up" data-aos-duration="1500">
                <div class="nav nav-tabs lh-menu-restaurant" id="nav-tab" role="tablist">
                    <button class="nav-link active lh-menu-buttons" id="nav-Breakfast-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-Breakfast" type="button" role="tab" aria-controls="nav-Breakfast"
                        aria-selected="true">
                        Breakfast
                    </button>
                    <button class="nav-link lh-menu-buttons" id="nav-Lunch-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-Lunch" type="button" role="tab" aria-controls="nav-Lunch"
                        aria-selected="false">
                        Lunch
                    </button>
                    <button class="nav-link lh-menu-buttons" id="nav-Dinner-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-Dinner" type="button" role="tab" aria-controls="nav-Dinner"
                        aria-selected="false">
                        Dinner
                    </button>
                    <button class="nav-link lh-menu-buttons" id="nav-Starters-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-Starters" type="button" role="tab" aria-controls="nav-Starters"
                        aria-selected="false">
                        Starters
                    </button>
                    <button class="nav-link lh-menu-buttons" id="nav-Beverages-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-Beverages" type="button" role="tab" aria-controls="nav-Beverages"
                        aria-selected="false">
                        Beverages
                    </button>
                </div>
            </nav>
            <div class="tab-content ld-menu-contact border-none" id="nav-tabContent">
                <div class="tab-pane fade active show" id="nav-Breakfast" role="tabpanel"
                    aria-labelledby="nav-Breakfast-tab">
                    <div class="row p-0 lh-Breakfast-rs">
                        <div class="col-lg-6">
                            <div class="ld-restaurant-menu" data-aos="fade-up" data-aos-duration="1500">
                                <div class="ld-restaurant-menu-image">
                                    <img src="assets/img/restaurant/1.jpg" alt="restaurant-1">
                                </div>
                                <div class="ld-restaurant-menu-contain">
                                    <h4>Mustrd Chicken with <span>$60</span></h4>
                                    <p>This is the dolor sit amet consectetur adipisicing elit. Id non
                                        namsequicum voluptatum soluta sed placeat.</p>
                                </div>
                            </div>
                            <div class="ld-restaurant-menu" data-aos="fade-up" data-aos-duration="1800">
                                <div class="ld-restaurant-menu-image">
                                    <img src="assets/img/restaurant/2.jpg" alt="restaurant-2">
                                </div>
                                <div class="ld-restaurant-menu-contain">
                                    <h4>Pan Con Berenjina Frita <span>$30</span></h4>
                                    <p>This is the dolor sit amet consectetur adipisicing elit. Id non
                                        namsequicum voluptatum soluta sed placeat.</p>
                                </div>
                            </div>
                            <div class="ld-restaurant-menu" data-aos="fade-up" data-aos-duration="2100">
                                <div class="ld-restaurant-menu-image">
                                    <img src="assets/img/restaurant/3.jpg" alt="restaurant-3">
                                </div>
                                <div class="ld-restaurant-menu-contain">
                                    <h4>Salmon Tataki Capaccio <span>$45</span></h4>
                                    <p>This is the dolor sit amet consectetur adipisicing elit. Id non
                                        namsequicum voluptatum soluta sed placeat.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="ld-restaurant-menu" data-aos="fade-up" data-aos-duration="1500">
                                <div class="ld-restaurant-menu-image">
                                    <img src="assets/img/restaurant/4.jpg" alt="restaurant-4">
                                </div>
                                <div class="ld-restaurant-menu-contain">
                                    <h4>Lubina Marinada <span>$15</span></h4>
                                    <p>This is the dolor sit amet consectetur adipisicing elit. Id non
                                        namsequicum voluptatum soluta sed placeat.</p>
                                </div>
                            </div>
                            <div class="ld-restaurant-menu" data-aos="fade-up" data-aos-duration="1800">
                                <div class="ld-restaurant-menu-image">
                                    <img src="assets/img/restaurant/5.jpg" alt="restaurant-5">
                                </div>
                                <div class="ld-restaurant-menu-contain">
                                    <h4>Nashville Hot Chicken <span>$30</span></h4>
                                    <p>This is the dolor sit amet consectetur adipisicing elit. Id non
                                        namsequicum voluptatum soluta sed placeat.</p>
                                </div>
                            </div>
                            <div class="ld-restaurant-menu" data-aos="fade-up" data-aos-duration="2100">
                                <div class="ld-restaurant-menu-image">
                                    <img src="assets/img/restaurant/6.jpg" alt="restaurant-6">
                                </div>
                                <div class="ld-restaurant-menu-contain">
                                    <h4>Biscuits and Gravy <span>$55</span></h4>
                                    <p>This is the dolor sit amet consectetur adipisicing elit. Id non
                                        namsequicum voluptatum soluta sed placeat.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-Lunch" role="tabpanel" aria-labelledby="nav-Lunch-tab">
                    <div class="row p-0 lh-Breakfast-rs">
                        <div class="col-lg-6">
                            <div class="ld-restaurant-menu">
                                <div class="ld-restaurant-menu-image">
                                    <img src="assets/img/restaurant/1.jpg" alt="restaurant-1">
                                </div>
                                <div class="ld-restaurant-menu-contain">
                                    <h4>Mustrd Chicken with <span>$50</span></h4>
                                    <p>This is the dolor sit amet consectetur adipisicing elit. Id non
                                        namsequicum voluptatum soluta sed placeat.</p>
                                </div>
                            </div>
                            <div class="ld-restaurant-menu">
                                <div class="ld-restaurant-menu-image">
                                    <img src="assets/img/restaurant/2.jpg" alt="restaurant-2">
                                </div>
                                <div class="ld-restaurant-menu-contain">
                                    <h4>Pan Con Berenjina Frita <span>$80</span></h4>
                                    <p>This is the dolor sit amet consectetur adipisicing elit. Id non
                                        namsequicum voluptatum soluta sed placeat.</p>
                                </div>
                            </div>
                            <div class="ld-restaurant-menu">
                                <div class="ld-restaurant-menu-image">
                                    <img src="assets/img/restaurant/3.jpg" alt="restaurant-3">
                                </div>
                                <div class="ld-restaurant-menu-contain">
                                    <h4>Salmon Tataki Capaccio <span>$40</span></h4>
                                    <p>This is the dolor sit amet consectetur adipisicing elit. Id non
                                        namsequicum voluptatum soluta sed placeat.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="ld-restaurant-menu">
                                <div class="ld-restaurant-menu-image">
                                    <img src="assets/img/restaurant/4.jpg" alt="restaurant-4">
                                </div>
                                <div class="ld-restaurant-menu-contain">
                                    <h4>Lubina Marinada <span>$60</span></h4>
                                    <p>This is the dolor sit amet consectetur adipisicing elit. Id non
                                        namsequicum voluptatum soluta sed placeat.</p>
                                </div>
                            </div>
                            <div class="ld-restaurant-menu">
                                <div class="ld-restaurant-menu-image">
                                    <img src="assets/img/restaurant/5.jpg" alt="restaurant-5">
                                </div>
                                <div class="ld-restaurant-menu-contain">
                                    <h4>Nashville Hot Chicken <span>$70</span></h4>
                                    <p>This is the dolor sit amet consectetur adipisicing elit. Id non
                                        namsequicum voluptatum soluta sed placeat.</p>
                                </div>
                            </div>
                            <div class="ld-restaurant-menu">
                                <div class="ld-restaurant-menu-image">
                                    <img src="assets/img/restaurant/6.jpg" alt="restaurant-6">
                                </div>
                                <div class="ld-restaurant-menu-contain">
                                    <h4>Biscuits and Gravy <span>$90</span></h4>
                                    <p>This is the dolor sit amet consectetur adipisicing elit. Id non
                                        namsequicum voluptatum soluta sed placeat.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-Dinner" role="tabpanel" aria-labelledby="nav-Dinner-tab">
                    <div class="row p-0 lh-Breakfast-rs">
                        <div class="col-lg-6">
                            <div class="ld-restaurant-menu">
                                <div class="ld-restaurant-menu-image">
                                    <img src="assets/img/restaurant/1.jpg" alt="restaurant-1">
                                </div>
                                <div class="ld-restaurant-menu-contain">
                                    <h4>Mustrd Chicken with <span>$10</span></h4>
                                    <p>This is the dolor sit amet consectetur adipisicing elit. Id non
                                        namsequicum voluptatum soluta sed placeat.</p>
                                </div>
                            </div>
                            <div class="ld-restaurant-menu">
                                <div class="ld-restaurant-menu-image">
                                    <img src="assets/img/restaurant/2.jpg" alt="restaurant-2">
                                </div>
                                <div class="ld-restaurant-menu-contain">
                                    <h4>Pan Con Berenjina Frita <span>$50</span></h4>
                                    <p>This is the dolor sit amet consectetur adipisicing elit. Id non
                                        namsequicum voluptatum soluta sed placeat.</p>
                                </div>
                            </div>
                            <div class="ld-restaurant-menu">
                                <div class="ld-restaurant-menu-image">
                                    <img src="assets/img/restaurant/3.jpg" alt="restaurant-3">
                                </div>
                                <div class="ld-restaurant-menu-contain">
                                    <h4>Salmon Tataki Capaccio <span>$70</span></h4>
                                    <p>This is the dolor sit amet consectetur adipisicing elit. Id non
                                        namsequicum voluptatum soluta sed placeat.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="ld-restaurant-menu">
                                <div class="ld-restaurant-menu-image">
                                    <img src="assets/img/restaurant/4.jpg" alt="restaurant-4">
                                </div>
                                <div class="ld-restaurant-menu-contain">
                                    <h4>Lubina Marinada <span>$40</span></h4>
                                    <p>This is the dolor sit amet consectetur adipisicing elit. Id non
                                        namsequicum voluptatum soluta sed placeat.</p>
                                </div>
                            </div>
                            <div class="ld-restaurant-menu">
                                <div class="ld-restaurant-menu-image">
                                    <img src="assets/img/restaurant/5.jpg" alt="restaurant-5">
                                </div>
                                <div class="ld-restaurant-menu-contain">
                                    <h4>Nashville Hot Chicken <span>$60</span></h4>
                                    <p>This is the dolor sit amet consectetur adipisicing elit. Id non
                                        namsequicum voluptatum soluta sed placeat.</p>
                                </div>
                            </div>
                            <div class="ld-restaurant-menu">
                                <div class="ld-restaurant-menu-image">
                                    <img src="assets/img/restaurant/6.jpg" alt="restaurant-6">
                                </div>
                                <div class="ld-restaurant-menu-contain">
                                    <h4>Biscuits and Gravy <span>$70</span></h4>
                                    <p>This is the dolor sit amet consectetur adipisicing elit. Id non
                                        namsequicum voluptatum soluta sed placeat.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-Starters" role="tabpanel" aria-labelledby="nav-Starters-tab">
                    <div class="row p-0 lh-Breakfast-rs">
                        <div class="col-lg-6">
                            <div class="ld-restaurant-menu">
                                <div class="ld-restaurant-menu-image">
                                    <img src="assets/img/restaurant/1.jpg" alt="restaurant-1">
                                </div>
                                <div class="ld-restaurant-menu-contain">
                                    <h4>Mustrd Chicken with <span>$70</span></h4>
                                    <p>This is the dolor sit amet consectetur adipisicing elit. Id non
                                        namsequicum voluptatum soluta sed placeat.</p>
                                </div>
                            </div>
                            <div class="ld-restaurant-menu">
                                <div class="ld-restaurant-menu-image">
                                    <img src="assets/img/restaurant/2.jpg" alt="restaurant-2">
                                </div>
                                <div class="ld-restaurant-menu-contain">
                                    <h4>Pan Con Berenjina Frita <span>$50</span></h4>
                                    <p>This is the dolor sit amet consectetur adipisicing elit. Id non
                                        namsequicum voluptatum soluta sed placeat.</p>
                                </div>
                            </div>
                            <div class="ld-restaurant-menu">
                                <div class="ld-restaurant-menu-image">
                                    <img src="assets/img/restaurant/3.jpg" alt="restaurant-3">
                                </div>
                                <div class="ld-restaurant-menu-contain">
                                    <h4>Salmon Tataki Capaccio <span>$20</span></h4>
                                    <p>This is the dolor sit amet consectetur adipisicing elit. Id non
                                        namsequicum voluptatum soluta sed placeat.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="ld-restaurant-menu">
                                <div class="ld-restaurant-menu-image">
                                    <img src="assets/img/restaurant/4.jpg" alt="restaurant-4">
                                </div>
                                <div class="ld-restaurant-menu-contain">
                                    <h4>Lubina Marinada <span>$60</span></h4>
                                    <p>This is the dolor sit amet consectetur adipisicing elit. Id non
                                        namsequicum voluptatum soluta sed placeat.</p>
                                </div>
                            </div>
                            <div class="ld-restaurant-menu">
                                <div class="ld-restaurant-menu-image">
                                    <img src="assets/img/restaurant/5.jpg" alt="restaurant-5">
                                </div>
                                <div class="ld-restaurant-menu-contain">
                                    <h4>Nashville Hot Chicken <span>$40</span></h4>
                                    <p>This is the dolor sit amet consectetur adipisicing elit. Id non
                                        namsequicum voluptatum soluta sed placeat.</p>
                                </div>
                            </div>
                            <div class="ld-restaurant-menu">
                                <div class="ld-restaurant-menu-image">
                                    <img src="assets/img/restaurant/6.jpg" alt="restaurant-6">
                                </div>
                                <div class="ld-restaurant-menu-contain">
                                    <h4>Biscuits and Gravy <span>$80</span></h4>
                                    <p>This is the dolor sit amet consectetur adipisicing elit. Id non
                                        namsequicum voluptatum soluta sed placeat.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-Beverages" role="tabpanel" aria-labelledby="nav-Beverages-tab">
                    <div class="row p-0 lh-Breakfast-rs">
                        <div class="col-lg-6">
                            <div class="ld-restaurant-menu">
                                <div class="ld-restaurant-menu-image">
                                    <img src="assets/img/restaurant/1.jpg" alt="restaurant-1">
                                </div>
                                <div class="ld-restaurant-menu-contain">
                                    <h4>Mustrd Chicken with <span>$70</span></h4>
                                    <p>This is the dolor sit amet consectetur adipisicing elit. Id non
                                        namsequicum voluptatum soluta sed placeat.</p>
                                </div>
                            </div>
                            <div class="ld-restaurant-menu">
                                <div class="ld-restaurant-menu-image">
                                    <img src="assets/img/restaurant/2.jpg" alt="restaurant-2">
                                </div>
                                <div class="ld-restaurant-menu-contain">
                                    <h4>Pan Con Berenjina Frita <span>$65</span></h4>
                                    <p>This is the dolor sit amet consectetur adipisicing elit. Id non
                                        namsequicum voluptatum soluta sed placeat.</p>
                                </div>
                            </div>
                            <div class="ld-restaurant-menu">
                                <div class="ld-restaurant-menu-image">
                                    <img src="assets/img/restaurant/3.jpg" alt="restaurant-3">
                                </div>
                                <div class="ld-restaurant-menu-contain">
                                    <h4>Salmon Tataki Capaccio <span>$55</span></h4>
                                    <p>This is the dolor sit amet consectetur adipisicing elit. Id non
                                        namsequicum voluptatum soluta sed placeat.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="ld-restaurant-menu">
                                <div class="ld-restaurant-menu-image">
                                    <img src="assets/img/restaurant/4.jpg" alt="restaurant-4">
                                </div>
                                <div class="ld-restaurant-menu-contain">
                                    <h4>Lubina Marinada <span>$50</span></h4>
                                    <p>This is the dolor sit amet consectetur adipisicing elit. Id non
                                        namsequicum voluptatum soluta sed placeat.</p>
                                </div>
                            </div>
                            <div class="ld-restaurant-menu">
                                <div class="ld-restaurant-menu-image">
                                    <img src="assets/img/restaurant/5.jpg" alt="restaurant-5">
                                </div>
                                <div class="ld-restaurant-menu-contain">
                                    <h4>Nashville Hot Chicken <span>$10</span></h4>
                                    <p>This is the dolor sit amet consectetur adipisicing elit. Id non
                                        namsequicum voluptatum soluta sed placeat.</p>
                                </div>
                            </div>
                            <div class="ld-restaurant-menu">
                                <div class="ld-restaurant-menu-image">
                                    <img src="assets/img/restaurant/6.jpg" alt="restaurant-6">
                                </div>
                                <div class="ld-restaurant-menu-contain">
                                    <h4>Biscuits and Gravy <span>$90</span></h4>
                                    <p>This is the dolor sit amet consectetur adipisicing elit. Id non
                                        namsequicum voluptatum soluta sed placeat.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- testimonials -->
    <section class="section-testimonials bg-gray padding-tb-100">
        <div class="container">
            <div class="row">
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

    <!-- Book-table -->
    <section class="section-book-table padding-tb-100">
        <div class="container">
            <div class="row" data-aos="fade-up" data-aos-duration="2000">
                <div class="banner">
                    <h2>Book Your <span>Private Table</span></h2>
                </div>
                <div class="col-lg-3 col-md-6 rs-pb-24">
                    <div class="lh-book-tale-box">
                        <label>Name*</label>
                        <input type="text" name="firstname" class="lh-book-form-control">
                        <i class="ri-user-line"></i>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 rs-pb-24">
                    <div class="lh-book-tale-box">
                        <label>Phone No*</label>
                        <input type="text" name="number" class="lh-book-form-control">
                        <i class="ri-phone-line"></i>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 rs-pb-24">
                    <div class="lh-book-tale-box">
                        <label>No. Of Gust*</label>
                        <input type="text" name="gust" class="lh-book-form-control">
                        <i class="ri-user-line"></i>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="lh-book-tale-box">
                        <label>Date & Time*</label>
                        <div class="calendar" id="date_1">
                            <input type="text" class="lh-book-form-control">
                            <i class="ri-calendar-event-line"></i>
                        </div>

                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="lh-book-tale-contain">
                        <h6>No refunds will be given once you booked</h6>
                    </div>
                    <div class="lh-book-tale-buttons">
                        <a class="lh-buttons result-placeholder" href="checkout.html">
                            Book Table
                        </a>
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


<!-- Mirrored from maraviyainfotech.com/projects/luxurious-html-v22/luxurious-html/restaurant.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Jan 2025 15:10:27 GMT -->
</html>
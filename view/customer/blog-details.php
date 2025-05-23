<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from maraviyainfotech.com/projects/luxurious-html-v22/luxurious-html/blog-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Jan 2025 15:11:08 GMT -->
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
                    <h2>Blog Detalis</h2>
                    <div class="lh-breadcrumb">
                        <h5>
                            <span class="lh-inner-breadcrumb">
                                <a href="./index.php">Home</a>
                            </span>
                            <span> / </span>
                            <span>
                                <a href="javascript:void(0)">Blog Detalis</a>
                            </span>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog-details -->
    <section class="section-blog-details padding-tb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="lh-blog-details" data-aos="fade-up" data-aos-duration="1500">
                        <div class="lh-blog-details-image">
                            <img src="assets/img/blog/1.jpg" alt="blog-1">
                        </div>
                        <div class="lh-blog-details-contain">
                            <div class="blog-top-details"><span>By Admin</span> - <span>06 Comment</span> -
                                <span>15 Nov 2024</span>
                            </div>
                            <h4 class="lh-blog-details-heding">Most Expensive Hotel Rooms In New York</h4>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quasi assumenda dolorum
                                molestiae voluptates, voluptate, facilis iure cumque eum fugit nihil harum dolor quas
                                dolorem mollitia excepturi explicabo aut voluptatibus totam! Nulla quas quae, cupiditate
                                sapiente aliquam.</p>
                        </div>
                        <div class="lh-blog-details-quote">
                            <div class="lh-blog-details-quote-image">
                                <img src="assets/img/testimonials/quotes.svg" class="svg-img" alt="quotes">
                            </div>
                            <div class="lh-blog-details-quote-side">
                                <p>This is the, dolor sit amet consectetur adipisicing elit. Possimus, eius tempore
                                    quidem a modi nemo aperiam beatae corporis adipisci repellendus?</p>
                                <h4>Martyn Garcia <span>Hr Manager</span></h4>
                            </div>
                        </div>
                        <div class="lh-blog-text">
                            <p>This is the dolor sit amet consectetur adipisicing elit. Architecto obcaecati illo nam
                                veritatis modi reiciendis quisquam, fuga, magni, enim inventore ratione? Accusantium
                                eum, iure tempora iusto sapiente libero quidem laborum.</p>
                        </div>
                    </div>
                    <div class="lh-blog-relaxation" data-aos="fade-up" data-aos-duration="1500">
                        <h5 class="lh-blog-details-heding">The True Space For Relaxation</h5>
                        <div class="row">
                            <div class="col-6">
                                <div class="lh-blog-relaxation-image">
                                    <img src="assets/img/blog/2.jpg" alt="blog-2">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="lh-blog-relaxation-image">
                                    <img src="assets/img/blog/3.jpg" alt="blog-3">
                                </div>
                            </div>
                        </div>
                        <p>This is the dolor sit amet consectetur adipisicing elit. Illum porro autem reprehenderit
                            accusantium possimus minus voluptate dolor odit, dicta atque, obcaecati eius voluptatem
                            sunt, aliquid quisquam. Totam quia quo consequuntur?</p>
                        <div class="lh-blog-relaxation-tages">
                            <h4>Topics :</h4> 
                            <span><a href="#">Entertainment</a></span> 
                            <span><a href="#">Bloking</a></span> 
                            <span><a href="#">Fitness</a></span>
                            <span><a href="#">Marketing</a></span>
                            <span><a href="#">Finance</a></span>
                        </div>
                    </div>
                    <div class="ld-blog-replic">
                        <h4 class="lh-blog-details-heding" data-aos="fade-up" data-aos-duration="1500">3 Replies to
                            "Simple Steps For Replacing Old Tiling"</h4>
                        <div class="ld-blog-replic-inner" data-aos="fade-up" data-aos-duration="1500">
                            <div class="ld-blog-replic-image">
                                <img src="assets/img/blog/busness-1.jpg" alt="busness-1">
                            </div>
                            <div class="ld-blog-replic-contain">
                                <div class="d-flex">
                                    <h4 class="heading">Roberr Martin <span>- 22 Feb 2024</span></h4>
                                    <div class="ld-blog-star">
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                    </div>
                                </div>
                                <p>This is the dolor sit amet consectetur adipisicing elit. Accusamus distinctio neque
                                    voluptates atque consequatur recusandae consectetur modi illum molestiae quam.</p>
                                <a href="#">Reply</a>
                            </div>
                        </div>
                        <div class="ld-blog-replic-inner" data-aos="fade-up" data-aos-duration="1500">
                            <div class="ld-blog-replic-image">
                                <img src="assets/img/blog/busness-2.jpg" alt="busness-2">
                            </div>
                            <div class="ld-blog-replic-contain">
                                <div class="d-flex">
                                    <h4 class="heading">Roberr Martin <span>- 11 Jan 2024</span></h4>
                                    <div class="ld-blog-star">
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                    </div>
                                </div>
                                <p>This is the dolor sit amet consectetur adipisicing elit. Accusamus distinctio neque
                                    voluptates atque consequatur recusandae consectetur modi illum molestiae quam.</p>
                                <a href="#">Reply</a>
                            </div>
                        </div>
                        <div class="ld-blog-replic-inner" data-aos="fade-up" data-aos-duration="1500">
                            <div class="ld-blog-replic-image">
                                <img src="assets/img/blog/busness-3.jpg" alt="busness-3">
                            </div>
                            <div class="ld-blog-replic-contain">
                                <div class="d-flex">
                                    <h4 class="heading">Roberr Martin <span>- 31 Oct 2024</span></h4>
                                    <div class="ld-blog-star">
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                        <i class="ri-star-line"></i>
                                    </div>
                                </div>
                                <p>This is the dolor sit amet consectetur adipisicing elit. Accusamus distinctio neque
                                    voluptates atque consequatur recusandae consectetur modi illum molestiae quam.</p>
                                <a href="#">Reply</a>
                            </div>
                        </div>
                    </div>
                    <div class="ld-blog-leave" data-aos="fade-up" data-aos-duration="1500">
                        <h4 class="lh-blog-details-heding">Leave a Reply</h4>
                        <div class="lh-blog-address">
                            <span>Your email address Will not be Published</span>
                        </div>
                        <form action="#">
                            <div class="lh-blog-inner-form-warp">
                                <textarea class="lh-form-control" placeholder="Comment"></textarea>
                            </div>
                            <div class="lh-blog-inner-form-warp">
                                <input type="text" name="fullname" placeholder="Full Name" class="lh-form-control mr-30"
                                    required="">
                                <input type="email" name="email" placeholder="Email" class="lh-form-control"
                                    required="">
                            </div>
                            <div class="lh-contact-touch-inner-form-button">
                                <button class="lh-buttons result-placeholder" type="submit">
                                    Post Comment
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 blog-rs">
                    <div class="lh-our-blog" data-aos="fade-up" data-aos-duration="1500">
                        <div class="lh-businessman-detalis">
                            <div class="lh-businessman-detalis-image">
                                <img src="assets/img/blog/busness-1.jpg" alt="businessman">
                            </div>
                            <div class="lh-businessman-detalis-contain">
                                <span>Hr Manager</span>
                                <h4 class="lh-businessman-detalis-name">Martyn Garcia</h4>
                                <p>This is the dolor sit amet consectetur adipisicing elit. voluptatum.</p>
                                <div class="lh-businessman-detalis-logos">
                                    <img src="assets/img/logo/facebook.png" alt="facebook">
                                    <img src="assets/img/logo/twitter.png" alt="twitter">
                                    <img src="assets/img/logo/instagram.png" alt="instagram">
                                    <img src="assets/img/logo/linkedin.png" alt="linkedin">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="lh-our-blog" data-aos="fade-up" data-aos-duration="1500">
                        <div class="lh-our-blog-serch-box">
                            <form class="form-inline my-lg-0 d-flex">
                                <input class="form-conrol" type="search" placeholder="Search here" aria-label="Search">
                                <button class="lh-our-blog-button">
                                    <i class="ri-search-line"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="lh-our-blog" data-aos="fade-up" data-aos-duration="1500">
                        <div class="lh-our-blog-categories">
                            <div class="lh-our-blog-heading">
                                <h4>Categories</h4>
                            </div>
                            <ul>
                                <li>
                                    <a href="#">
                                        <code>*</code>
                                        <p>Managment</p>
                                        <span>[02]</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <code>*</code>
                                        <p>Facilities</p>
                                        <span>[26]</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <code>*</code>
                                        <p>Events</p>
                                        <span>[33]</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <code>*</code>
                                        <p>Restaurant</p>
                                        <span>[85]</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <code>*</code>
                                        <p>Hotel Design</p>
                                        <span>[12]</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="lh-our-blog" data-aos="fade-up" data-aos-duration="1500">
                        <div class="lh-our-blog-post">
                            <div class="lh-our-blog-heading">
                                <h4>Popular Post</h4>
                            </div>
                            <div class="row lh-our-blog-post-pb">
                                <div class="col-12 lh-our-blog-post-inner">
                                    <img src="assets/img/blog/blog-1.jpg" alt="blog_post-1">
                                    <div class="lh-our-blog-post-contain">
                                        <span>Feb 11,2024</span>
                                        <a href="blog-details.html">Grandeur Voted Top Will Three Hotel...</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row lh-our-blog-post-pb">
                                <div class="col-12 lh-our-blog-post-inner">
                                    <img src="assets/img/blog/blog-2.jpg" alt="blog_post-2">
                                    <div class="lh-our-blog-post-contain">
                                        <span>May 22,2024</span>
                                        <a href="blog-details.html">Enjoy Your Vacation With Your Beloved Partner</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row lh-our-blog-post-pb">
                                <div class="col-12 lh-our-blog-post-inner">
                                    <img src="assets/img/blog/blog-3.jpg" alt="blog_post-3">
                                    <div class="lh-our-blog-post-contain">
                                        <span>Sep 09,2024</span>
                                        <a href="blog-details.html">The Best Hotels For Business Vacations</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="lh-our-blog" data-aos="fade-up" data-aos-duration="1500">
                        <div class="lh-our-blog-tages">
                            <div class="lh-our-blog-heading">
                                <h4>Popular Tages</h4>
                            </div>
                            <div class="lh-our-blog-tages-inner">
                                <ul class="lh-our-blog-tages-inner-element">
                                    <li><a href="blog-details.html">Entertainment</a></li>
                                    <li><a href="blog-details.html">Booking</a></li>
                                    <li><a href="blog-details.html">Gym</a></li>
                                    <li><a href="blog-details.html">Hotel</a></li>
                                    <li><a href="blog-details.html">Entertainment</a></li>
                                    <li><a href="blog-details.html">Guests</a></li>
                                    <li><a href="blog-details.html">Entertainment</a></li>
                                    <li><a href="blog-details.html">Booking</a></li>
                                    <li><a href="blog-details.html">Gym</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="lh-our-blog" data-aos="fade-up" data-aos-duration="2200">
                        <div class="lh-our-blog-instagram">
                            <div class="lh-our-blog-heading">
                                <h4>instagram</h4>
                            </div>
                            <div class="lh-our-blog-instagram-image">
                                <div class="lh-our-blog-instagram-image-inner">
                                    <a href="javascript:void(0)"><img src="assets/img/instagram/1.jpg" alt="instagram"></a>
                                    <a href="javascript:void(0)"><img src="assets/img/instagram/2.jpg" alt="instagram"></a>
                                    <a href="javascript:void(0)"><img src="assets/img/instagram/3.jpg" alt="instagram"></a>
                                    <a href="javascript:void(0)"><img src="assets/img/instagram/4.jpg" alt="instagram"></a>
                                    <a href="javascript:void(0)"><img src="assets/img/instagram/5.jpg" alt="instagram"></a>
                                    <a href="javascript:void(0)"><img src="assets/img/instagram/6.jpg" alt="instagram"></a>
                                    <a href="javascript:void(0)"><img src="assets/img/instagram/7.jpg" alt="instagram"></a>
                                    <a href="javascript:void(0)"><img src="assets/img/instagram/8.jpg" alt="instagram"></a>
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


<!-- Mirrored from maraviyainfotech.com/projects/luxurious-html-v22/luxurious-html/blog-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Jan 2025 15:11:09 GMT -->
</html>
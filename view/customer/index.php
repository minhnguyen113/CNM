<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from maraviyainfotech.com/projects/luxurious-html-v22/luxurious-html/./index.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Jan 2025 15:10:38 GMT -->

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
                                    <a class="nav-link dropdown-toggle" href="./index.php">Trang chủ</a>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="discount.php">Khuyến mãi</a>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="book.php">Đặt bàn</a>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="menu.php">
                                        Thực đơn
                                    </a>
                                </li>

                                <li class="nav-item dropdown">
                                    <?php if (isset($_SESSION['username'])): ?>
                                        <a class="nav-link dropdown-toggle" href="team-profile-cus.php">
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
    <div class="lh-sidebar-overlay"></div>
    <div id="lh_mobile_menu" class="lh-side-cart lh-mobile-menu">
        <div class="lh-menu-title">
            <span class="menu-title">My Menu</span>
            <button class="lh-close">×</button>
        </div>

    </div>

    <!-- Hero -->
    <section class="section-hero">
        <div class="container-fulid">
            <div class="row hero-image">
                <div class="hero-section">
                    <div class="particles-bg" id="particles-js"></div>
                    <div class="lh-hero-contain container mt-lg-5" style="height: 50%;">
                        <h4 data-aos="fade-up" data-aos-duration="1000">Cheft Restaurent</h4>
                        <h1 data-aos="fade-up" class="mt-n4" data-aos-duration="1500">Bản hòa tấu của hương vị & tinh hoa
                        </h1>
                        <a class="lh-buttons result-placeholder" style="height:40px;" href="#rooms">
                            Khám phá tại đây
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- search-control -->
    <section class="section-search-control">
        <div class="container">
            <form>
                <div class="search-control-boxing">
                    <div class="lh-col">
                        <div class="search-box">
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
                        <div class="search-box">
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
                        <div class="search-box">
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
                        <div class="search-box">
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

    <!-- Room -->
    <section class="section-room padding-tb-100" data-aos="fade-up" data-aos-duration="2000" id="rooms">
        <div class="container">
            <div class="banner">
                <h2>Khám phá thực đơn <span>Đặc sắc</span></h2>
            </div>
            <nav>
                <div class="nav nav-tabs rooms lh-room" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-Deluxe-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-Deluxe" type="button" role="tab" aria-controls="nav-Deluxe"
                        aria-selected="true">
                        <img src="../../assets_customer/img/menu/mien-bac.jpg" class="h-75" alt="1">
                        Ẩm thực miền Bắc
                    </button>
                    <button class="nav-link" id="nav-Single-tab" data-bs-toggle="tab" data-bs-target="#nav-Single"
                        type="button" role="tab" aria-controls="nav-Single" aria-selected="false">
                        <img src="../../assets_customer/img/menu/mien-trung.jpg" class="h-75" alt="2">
                        Ẩm thực miền Trung
                    </button>
                    <button class="nav-link" id="nav-Super-tab" data-bs-toggle="tab" data-bs-target="#nav-Super"
                        type="button" role="tab" aria-controls="nav-Super" aria-selected="false">
                        <img src="../../assets_customer/img/menu/banh-mi-sai-gon.jpg" class="h-75" alt="3">
                        Ẩm thực miền Nam
                    </button>
                    <button class="nav-link" id="nav-Presidential-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-Presidential" type="button" role="tab" aria-controls="nav-Presidential"
                        aria-selected="false">
                        <img src="../../assets_customer/img/menu/chay-viet.jpg" class="h-75" alt="4">
                        Món chay Việt
                    </button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade active show" id="nav-Deluxe" role="tabpanel" aria-labelledby="nav-Deluxe-tab">
                    <div class="container">
                        <div class="row p-0 lh-d-block">
                            <div class="col-xl-6 col-lg-12">
                                <div class="lh-room-contain">
                                    <div class="lh-contain-heading">
                                        <h4>Phở Hà Nội</h4>
                                        <div class="lh-room-price">
                                            <h4>45.000đ</h4>
                                        </div>
                                    </div>
                                    <div class="lh-room-size d-flex">
                                        <p>Miền Bắc <span>|</span></p>
                                        <p> ~560kcal</p>

                                    </div>
                                    <p>Là một món ăn nổi tiếng của đất Thủ Đô Việt Nam.
                                        Với sự thơm ngon của nước dùng, sự dẻo dai của bánh Phở
                                        hoà cùng với vị dai của các loại rau ăn kèm đã làm cho phở Hà Nội
                                        trở nên đặc biệt trong mắt của những tín đồ ẩm thực. </p>
                                    <div class="lh-main-features">
                                        <div class="lh-contain-heading">
                                            <h4>Nguyên liệu chính</h4>
                                        </div>
                                        <div class="lh-room-features">
                                            <div class="lh-cols-room">
                                                <ul>
                                                    <li>Bánh Phở</li>
                                                    <li>Nước xương bò</li>
                                                    <li>Thịt bò</li>
                                                </ul>
                                            </div>
                                            <div class="lh-cols-room">
                                                <ul>
                                                    <li>Rau mùi</li>
                                                    <li>Rau gió</li>
                                                    <li>Hương liệu</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-12 p-0">
                                <div class="room-img">
                                    <img src="../../assets_customer/img/menu/pho-hanoi.jpg" alt="room-img"
                                        class="room-image">
                                    <a href="room-details.php" class="link"><i class="ri-arrow-right-line"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- mien trung -->
                <div class="tab-pane fade" id="nav-Single" role="tabpanel" aria-labelledby="nav-Single-tab">
                    <div class="container">
                        <div class="row p-0 lh-d-block">
                            <div class="col-xl-6 col-lg-12">
                                <div class="lh-room-contain">
                                    <div class="lh-contain-heading">
                                        <h4>Bún bò huế</h4>
                                        <div class="lh-room-price">
                                            <h4>40.000đ<h4>
                                        </div>
                                    </div>
                                    <div class="lh-room-size d-flex">
                                        <p>Miền Trung<span>|</span></p>
                                        <p>~500kcal</p>

                                    </div>
                                    <p>Bún bò Huế là một món ăn đặc sản trứ danh của vùng đất cố đô,
                                        mang trong mình hương vị đậm đà, cay nồng và tinh tế. Nước dùng được ninh từ xương bò và
                                        giò heo trong nhiều giờ, kết hợp cùng sả, mắm ruốc Huế và ớt sa tế tạo nên vị ngọt thanh
                                        xen lẫn chút cay đặc trưng. Tô bún được điểm xuyết bởi những lát thịt bò mềm,
                                        giò heo béo ngậy, chả Huế và hành ngò thơm lừng, ăn kèm rau sống,
                                        bắp chuối và giá. Đây không chỉ là món ăn mà còn là một trải nghiệm
                                        ẩm thực mang đậm dấu ấn miền Trung.</p>
                                    <div class="lh-main-features">
                                        <div class="lh-contain-heading">
                                            <h4>Nguyên liệu chính</h4>
                                        </div>
                                        <div class="lh-room-features">
                                            <div class="lh-cols-room">
                                                <ul>
                                                    <li>Chân giò heo</li>
                                                    <li>Thịt nạm bò</li>
                                                    <li>Bún rối</li>
                                                </ul>
                                            </div>
                                            <div class="lh-cols-room">
                                                <ul>
                                                    <li>Huyết bò</li>
                                                    <li>Chả cua</li>
                                                    <li>Chả bò</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-12 p-0">
                                <div class="room-img">
                                    <img src="../../assets_customer/img/menu/bun-bo-hue.jpg" alt="room-img"
                                        class="room-image">
                                    <a href="room-details.php" class="link"><i class="ri-arrow-right-line"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-Super" role="tabpanel" aria-labelledby="nav-Super-tab">
                    <div class="container">
                        <div class="row p-0 lh-d-block">
                            <div class="col-xl-6 col-lg-12">
                                <div class="lh-room-contain">
                                    <div class="lh-contain-heading">
                                        <h4>Lẩu mắm</h4>
                                        <div class="lh-room-price">
                                            <h4>200.000đ</h4>
                                        </div>
                                    </div>
                                    <div class="lh-room-size d-flex">
                                        <p>Miền Nam <span>|</span></p>
                                        <p>Ngày cuối tuần, tiệc gia đình</p>
                                    </div>
                                    <p>Lẩu mắm là tinh hoa ẩm thực của vùng sông nước miền Tây, nổi bật với hương vị mắm đậm đà
                                        và phong phú rau, cá đồng. Nước lẩu được nấu từ mắm cá linh hoặc mắm cá sặc kết hợp
                                        với sả, ớt, cà tím và nước dừa, tạo nên mùi thơm đặc trưng không thể trộn lẫn.
                                        Điểm đặc biệt của lẩu mắm là sự kết hợp hài hoà giữa nhiều loại cá,
                                        tôm, mực, ba rọi và hơn chục loại rau dân dã như bông súng, rau nhút,
                                        kèo nèo, cải bẹ xanh... Mỗi nồi lẩu là một bản giao hưởng hương vị mộc mạc
                                        mà cuốn hút, khiến thực khách phải xuýt xoa.</p>
                                    <div class="lh-main-features">
                                        <div class="lh-contain-heading">
                                            <h4>Nguyên liệu chính</h4>
                                        </div>
                                        <div class="lh-room-features">
                                            <div class="lh-cols-room">
                                                <ul>
                                                    <li>Mắm cá linh</li>
                                                    <li>Bún tươi</li>
                                                    <li>Thịt ba rọi</li>
                                                </ul>
                                            </div>
                                            <div class="lh-cols-room">
                                                <ul>
                                                    <li>Cá thác lác</li>
                                                    <li>Tôm, mực</li>
                                                    <li>Thịt heo xay</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-12 p-0">
                                <div class="room-img">
                                    <img src="../../assets_customer/img/menu/lau-mam.jpg" alt="room-img"
                                        class="room-image">
                                    <a href="room-details.php" class="link"><i class="ri-arrow-right-line"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-Presidential" role="tabpanel" aria-labelledby="nav-Presidential-tab">
                    <div class="container">
                        <div class="row p-0 lh-d-block">
                            <div class="col-xl-6 col-lg-12">
                                <div class="lh-room-contain">
                                    <div class="lh-contain-heading">
                                        <h4>Mâm cơm chay Việt</h4>
                                        <div class="lh-room-price">
                                            <h4>180.000đ</h4>
                                        </div>
                                    </div>
                                    <div class="lh-room-size d-flex">
                                        <p>Món chay <span>|</span></p>
                                        <p>Thực dưỡng, Rằm, mùng 1 </p>

                                    </div>
                                    <p>Mâm cơm chay Việt là sự kết hợp hài hoà giữa màu sắc, hương vị và giá trị dinh dưỡng,
                                        mang đến trải nghiệm thanh tịnh và tinh tế. Mỗi món ăn đều được chế biến từ rau củ tươi,
                                        đậu phụ, nấm, tương, mắm chay, đảm bảo giữ nguyên hương vị tự nhiên và thanh đạm</p>
                                    <div class="lh-main-features">
                                        <div class="lh-contain-heading">
                                            <h4>Nguyên liệu chính</h4>
                                        </div>
                                        <div class="lh-room-features">
                                            <div class="lh-cols-room">
                                                <ul>
                                                    <li>Đậu hũ, nấm </li>
                                                    <li>Rau củ</li>
                                                    <li>Bún tươi</li>
                                                </ul>
                                            </div>
                                            <div class="lh-cols-room">
                                                <ul>
                                                    <li>Tùa hũ ky </li>
                                                    <li>Gia vị chay</li>
                                                    <li>Nước tương, dầu mè</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-12 p-0">
                                <div class="room-img">
                                    <img src="../../assets_customer/img/menu/mon-chay.jpg" alt="room-img"
                                        class="room-image">
                                    <a href="room-details.php" class="link"><i class="ri-arrow-right-line"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About -->
    <section class="section-about bg-gray padding-tb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 rs-pb-24 mt-3" data-aos="fade-up" data-aos-duration="1500">
                    <img src="../../assets_customer/img/menu/Screenshot 2025-04-16 at 21.10.45.png" alt="about" class="w-100">
                </div>
                <div class="col-lg-6 rs-pb-24" data-aos="fade-up" data-aos-duration="2000">
                    <div class="lh-about-detail">
                        <div class="banner t-left">
                            <h2>Trải nghiệm không gian ẩm thực <span>Việt</span></h2>
                        </div>
                        <div class="lh-branches-paragraph">
                            <p>
                                Tại nhà hàng của chúng tôi, thực khách không chỉ thưởng thức những món ăn đậm đà bản sắc Việt,
                                mà còn được hòa mình vào không gian mộc mạc, gần gũi với chất liệu tre, gỗ và ánh đèn vàng ấm cúng.
                                Chúng tôi gìn giữ hương vị truyền thống trong từng chi tiết nhỏ.
                            </p>

                        </div>
                        <div class="lh-branches">
                            <div class="cols">
                                <h4> <i class="ri-arrow-right-up-line"></i>Ẩm thực truyền thống</h4>
                                <p> Mỗi món ăn là một câu chuyện văn hoá ẩm thực – từ miền núi Tây Bắc đến miền Tây sông nước</p>
                            </div>
                            <div class="cols">
                                <h4> <i class="ri-arrow-right-up-line"></i>Không gian thuần Việt</h4>
                                <p>Lấy cảm hứng từ làng quê Việt Nam, chúng tôi mang đến cảm giác ấm cúng, thân thuộc trong từng góc nhỏ</p>
                            </div>
                        </div>
                        <div class="lh-abouts-buttons">
                            <a class="lh-buttons result-placeholder" href="menu.php">
                                Khám phá thực đơn
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Amenities -->
    <section class="section-amenities padding-tb-100">
        <div class="container">
            <div class="banner" data-aos="fade-up" data-aos-duration="2000">
                <h2>Không chỉ là ẩm thực, mà còn là<span> trải nghiệm</span></h2>
            </div>
            <div class="row mtb-m-12">
                <div class="col-md-6 col-sm-12 m-tb-12">
                    <div class="lh-amenities" data-aos="fade-up" data-aos-duration="1500">
                        <div class="amenities-detail">
                            <div class="amenities-box">
                                <img src="../../assets_customer/img/amenities/am-thuc-3-mien.jpg" alt="amenities_1"
                                    class="amenities-left-image">
                            </div>
                            <div class="amenities-box">
                                <div class="lh-amenities-in">
                                    <h4 class="side-number">01</h4>
                                    <div class="lh-top-dish">
                                        <img src="../../assets_customer/img/amenities/amenities-dish-1.svg"
                                            class="svg-img" alt="amenities-dish-1">
                                    </div>
                                    <div class="amenities-contain">
                                        <h4 class="amenities-heading">Ẩm thực ba miền</h4>
                                        <p>Thưởng thức món ăn chuẩn vị ba miền 
                                                Bắc – Trung – Nam, đậm đà và chỉn chu.</p>
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
                                <img src="../../assets_customer/img/amenities/khong-gian-xanh.jpg" alt="amenities_2"
                                    class="amenities-left-image">
                            </div>
                            <div class="amenities-box">
                                <div class="lh-amenities-in">
                                    <h4 class="side-number">02</h4>
                                    <div class="lh-top-dish">
                                        <img src="../../assets_customer/img/amenities/amenities-dish-1.svg"
                                            class="svg-img" alt="amenities-dish-2">
                                    </div>
                                    <div class="amenities-contain">
                                        <h4 class="amenities-heading">Không gian xanh</h4>
                                        <p>Không gian nhà gỗ, ánh đèn vàng ấm cúng, cây xanh và vật dụng dân dã.</p>
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
                            <div class="amenities-box">
                                <div class="lh-amenities-in lh-amenities-right">
                                    <h4 class="side-number">03</h4>
                                    <div class="lh-top-dish">
                                        <img src="../../assets_customer/img/amenities/amenities-dish-1.svg"
                                            class="svg-img" alt="amenities-dish-3">
                                    </div>
                                    <div class="amenities-contain">
                                        <h4 class="amenities-heading">Thực Đơn Theo Mùa</h4>
                                        <p>Mỗi mùa trong năm đều có thực đơn riêng: thanh mát cho mùa hè, ấm nóng vào mùa đông, giữ nguyên tinh thần ẩm thực Việt.</p>
                                        <a href="facilities.php">Read more <i class="ri-arrow-right-line"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="amenities-box">
                                <img src="../../assets_customer/img/amenities/am-thuc-theo-mua.png" alt="amenities_3"
                                    class="amenities-right-image">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 m-tb-12">
                    <div class="lh-amenities" data-aos="fade-up" data-aos-duration="2000">
                        <div class="amenities-detail">
                            <div class="amenities-box">
                                <div class="lh-amenities-in lh-amenities-right">
                                    <h4 class="side-number">04</h4>
                                    <div class="lh-top-dish">
                                        <img src="../../assets_customer/img/amenities/amenities-dish-1.svg"
                                            class="svg-img" alt="amenities-dish-4">
                                    </div>
                                    <div class="amenities-contain">
                                        <h4 class="amenities-heading">Gia Vị Đặc Trưng</h4>
                                        <p>Mỗi món ăn được nâng tầm bởi những loại gia vị truyền thống. 
                                         Tất cả tạo nên bản sắc riêng cho từng vùng miền</p>
                                        <a href="facilities.php">Read more <i class="ri-arrow-right-line"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="amenities-box">
                                <img src="../../assets_customer/img/amenities/gia-vi-viet.jpg" alt="amenities_4"
                                    class="amenities-right-image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Prices -->
    <section class="section-prices bg-gray padding-tb-100">
        <div class="container">
            <div class="row">
                <div class="banner" data-aos="fade-up" data-aos-duration="1000">
                    <h2>Combo thực đơn<span> Giá tốt</span></h2>
                </div>
                <div class="col-lg-4 rs-pb-24">
                    <div class="lh-prices" data-aos="fade-up" data-aos-duration="1000">
                        <img src="../../assets_customer/img/combo/com-truâ.jpg" alt="prices_1" class="prices-image">
                        <div class="lh-prices-out">
                            <div class="lh-prices-in">
                                <h4 class="lh-price-dollar"><span>đ</span>70.000</h4>
                                <h4 class="lh-prices-heading">Combo Ăn Trưa Văn Phòng</h4>
                            </div>
                            <div class="lh-prices-viwe">
                                <ul>
                                    <li>
                                        <span>Cơm sườn</span>
                                        <i class="ri-arrow-right-line"></i>
                                    </li>
                                    <li>
                                        <span>Canh rau</span>
                                        <i class="ri-arrow-right-line"></i>
                                    </li>
                                    <li>
                                        <span>Rau sống</span>
                                        <i class="ri-arrow-right-line"></i>
                                    </li>
                                    <li>
                                        <span>Trà đá</span>
                                        <i class="ri-arrow-right-line"></i>
                                    </li>
                                    
                                </ul>
                            </div>
                            <div class="price-buttons">
                                <a href="./room-details.php" class="lh-buttons result-placeholder">Đặt món ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 rs-pb-24">
                    <div class="lh-prices" data-aos="fade-up" data-aos-duration="2000">
                        <img src="../../assets_customer/img/combo/com-gia-idnh.jpg" alt="prices_2" class="prices-image active">
                        <div class="lh-prices-out">
                            <div class="lh-prices-in">
                                <h4 class="lh-price-dollar"><span>đ</span>240.000</h4>
                                <h4 class="lh-prices-heading">Combo Bữa Tối Gia Đình</h4>
                            </div>
                            <div class="lh-prices-viwe">
                                <ul>
                                    <li>
                                        <span>Bún bò Huế</span>
                                        <i class="ri-arrow-right-line"></i>
                                    </li>
                                    <li>
                                        <span>Chả Ram</span>
                                        <i class="ri-arrow-right-line"></i>
                                    </li>
                                    <li>
                                        <span>Rau sống</span>
                                        <i class="ri-arrow-right-line"></i>
                                    </li>
                                    <li>
                                        <span>Nước sâm</span>
                                        <i class="ri-arrow-right-line"></i>
                                    </li>
                                 
                                </ul>
                            </div>
                            <div class="price-buttons">
                                <a href="./room-details.php" class="lh-buttons-invers result-placeholder">Đặt món ngay</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 rs-pb-24">
                    <div class="lh-prices" data-aos="fade-up" data-aos-duration="3000">
                        <img src="../../assets_customer/img/combo/com-3-mien.jpg" alt="prices_3" class="prices-image">
                        <div class="lh-prices-out">
                            <div class="lh-prices-in">
                                <h4 class="lh-price-dollar"><span>đ</span>175.000</h4>
                                <h4 class="lh-prices-heading">Combo Đặc Sản 3 Miền</h4>
                            </div>
                            <div class="lh-prices-viwe">
                                <ul>
                                    <li>
                                        <span>Gỏi cuốn</span>
                                        <i class="ri-arrow-right-line"></i>
                                    </li>
                                    <li>
                                        <span>Bánh xèo</span>
                                        <i class="ri-arrow-right-line"></i>
                                    </li>
                                    <li>
                                        <span>Cơm lam</span>
                                        <i class="ri-arrow-right-line"></i>
                                    </li>
                                    <li>
                                        <span>Nước sâm</span>
                                        <i class="ri-arrow-right-line"></i>
                                    </li>
                                </ul>
                            </div>
                            <div class="price-buttons">
                                <a href="./room-details.php" class="lh-buttons result-placeholder">Đặt món ngay</a>
                            </div>
                        </div>
                    </div>
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

    <!-- Blog -->
    <section class="section-blog bg-gray padding-tb-100">
        <div class="container">
            <div class="banner" data-aos="fade-up" data-aos-duration="2000">
                <h2>Có gì mới tại nhà hàng của <span> chúng tôi ?</span></h2>
            </div>
            <div class="slick-slider blog-slider" data-aos="fade-up" data-aos-duration="2000">
                <div class="blog-card">
                    <figure><img src="../../assets_customer/img/blog/banh-mi-phomai.jpg" alt="blog-img" class="blog-image-top">
                    </figure>
                    <div class="lh-blog">
                        <div class="lh-blog-date">
                            <span><code>Món ăn mới</code> - 22 Jan 2025 - 05 Comment</span>
                        </div>
                        <a class="top-heding" href="#">Ra mắt món Bánh mì thịt nướng phô mai – kết hợp hoàn hảo giữa truyền thống và hiện đại. Đừng bỏ lỡ!</a>
                    </div>
                </div>
                <div class="blog-card">
                    <figure><img src="../../assets_customer/img/blog/bua-sang.jpg" alt="blog-img" class="blog-image-top">
                    </figure>
                    <div class="lh-blog">
                        <div class="lh-blog-date">
                            <span><code>Thực đơn</code> - 15 Jan 2025 - 22 Comment</span>
                        </div>
                        <a class="top-heding" href="#">Nhà hàng vừa cập nhật thực đơn buổi sáng với nhiều món ăn nhẹ, dinh dưỡng và hấp dẫn.</a>
                    </div>
                </div>
                <div class="blog-card">
                    <figure><img src="../../assets_customer/img/blog/sale-20.jpg" alt="blog-img" class="blog-image-top">
                    </figure>
                    <div class="lh-blog">
                        <div class="lh-blog-date">
                            <span><code>Khuyến Mãi</code> 01 Apr 2025 - 00 Comment</span>
                        </div>
                        <a class="top-heding" href="#">Giảm 20% cho hóa đơn trên 300.000đ từ 01–15/4. Áp dụng cho khách đặt bàn trước online!</a>
                    </div>
                </div>
                <div class="blog-card">
                    <figure><img src="../../assets_customer/img/blog/banh-flan.jpg" alt="blog-img" class="blog-image-top">
                    </figure>
                    <div class="lh-blog">
                        <div class="lh-blog-date">
                            <span><code>Món tráng miệng mới</code> - 11 Feb 2025 - 01 Comment</span>
                        </div>
                        <a class="top-heding" href="#">Thưởng thức bánh flan phô mai caramel mềm mịn, ngọt nhẹ, được làm thủ công mỗi ngày.</a>
                    </div>
                </div>
                <div class="blog-card">
                    <figure><img src="../../assets_customer/img/blog/giam-10.jpg" alt="blog-img" class="blog-image-top">
                    </figure>
                    <div class="lh-blog">
                        <div class="lh-blog-date">
                            <span><code>Đồ uống đặc biệt</code>02 Nov 2024 - 25 Comment</span>
                        </div>
                        <a class="top-heding" href="#">Giảm 10% cho các loại trà trái cây tươi – chỉ áp dụng trong khung giờ từ 14h đến 17h mỗi ngày.</a>
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
                <span>Nhóm 24 <span id="copyright_year"></span> <a href="./index.php">Chef Restaurent</a></span>
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
                        <span class="lh-all-color"><img src="../../assets_customer/img/skin/box-1.png"
                                alt="skin-1"></span>
                    </li>
                    <li class="lh-radius radius-mode-none">
                        <span class="lh-all-color"><img src="../../assets_customer/img/skin/box-2.png"
                                alt="skin-1"></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <?php
    include('./chatbot.php');
    ?>


    <!-- Plugins JS -->
    <!-- <script src="../../assets_customer/js/chatbot.js"></script> -->
    <!--chatbot -->
    <?php
    include('./footer-scripts.php');
    ?>


</body>


<!-- Mirrored from maraviyainfotech.com/projects/luxurious-html-v22/luxurious-html/./index.php by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Jan 2025 15:10:44 GMT -->

</html>
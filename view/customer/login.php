<?php
session_start();
include_once(__DIR__ . "../../../controller/cUser.php");

if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    unset($_SESSION['error']);
}

// Xử lý khi submit form
if (isset($_POST['btn-dangnhap'])) {
    $sdt = $_POST['sdt'];
    $password = $_POST['mk'];

    $userController = new UserController();
    $user = $userController->handleLogin($sdt, $password); // ✅ Trả về dữ liệu user

    // Nếu đăng nhập thành công → cập nhật CheckIn
    if ($user && isset($user['ID_User'])) {
        include_once(__DIR__ . "../../../model/mUser.php");
        $model = new UserModel();
        $model->updateCheckIn($user['ID_User']);
    }
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Chef Restaurant Login</title>
    <link rel="shortcut icon" href="./Login/logo1.png">
    <link rel="stylesheet" href="./Login/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>
    <div class="bg-img">
        <div class="content">
            <header>Đăng nhập</header>



            <!-- Form login -->
            <form id="loginForm" action="" method="POST">
                <div class="field">
                    <span class="fa fa-user"></span>
                    <input type="text" name="sdt" id="sdt" required placeholder="Phone">
                </div>
                <div class="field space">
                    <span class="fa fa-lock"></span>
                    <input type="password" name="mk" id="mk" required placeholder="Password">
                    <span class="show">SHOW</span>
                </div>
                <div class="pass">
                    <a href="#">Quên mật khẩu?</a>
                </div>
                <div class="field">
                    <input type="submit" name="btn-dangnhap" value="ĐĂNG NHẬP">
                </div>
            </form>
            <!-- Hiển thị lỗi nếu có -->
            <?php if (!empty($error)) : ?>
                <div style="color: red; margin-bottom: 15px; text-align: center;">
                    <?php echo htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>
            <?php if (!empty($_SESSION['error'])): ?>
                <div style="color: white;"><?php echo $_SESSION['error'];
                                            unset($_SESSION['error']); ?></div>
            <?php endif; ?>

            <?php if (!empty($_SESSION['success'])): ?>
                <div style="color: green;"><?php echo $_SESSION['success'];
                                            unset($_SESSION['success']); ?></div>
            <?php endif; ?>




            <!-- Chỗ hiển thị lỗi -->
            <div id="error-message" style="color: red; text-align: center; margin-top: 10px;"></div>
            <div id="success-message" style="color: green; margin-top: 10px;"></div>


            <div class="login">Hoặc đăng nhập với</div>
            <div class="links">
                <div class="facebook">
                    <i class="fab fa-facebook-f"><span>Facebook</span></i>
                </div>
                <div class="instagram">
                    <i class="fab fa-instagram"><span>Instagram</span></i>
                </div>
            </div>
            <div class="signup">Bạn chưa có tài khoản?
                <a href="./singup.php">Đăng ký tại đây</a>
            </div>
        </div>
    </div>


</body>

</html>
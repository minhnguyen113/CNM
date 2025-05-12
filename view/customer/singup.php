<?php

session_start();
include_once(__DIR__ . "/../../../controller/cUser.php");


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'] ?? '';
  $password = $_POST['password'] ?? '';
  $email = $_POST['email'] ?? '';
  $phone = $_POST['phone'] ?? '';
  $address = $_POST['address'] ?? '';
  $dob = $_POST['dob'] ?? '';

  $controller = new UserController();
  $controller->signup($username, $email, $phone, $address, $dob, $password);
}
?>



<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Chef Restaurent Singup</title>
  <link rel="shortcut icon" href="./Login/logo1.png">
  <link rel="stylesheet" href="./Login/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>
  <div class="bg-img">
    <div class="content">
      <header>Đăng ký</header>
      <?php if (isset($_SESSION['error'])): ?>
        <div style="color: red; margin-bottom: 10px;"><?php echo $_SESSION['error'];
                                                      unset($_SESSION['error']); ?></div>
      <?php endif; ?>

      <?php if (isset($_SESSION['success'])): ?>
        <div style="color: green; margin-bottom: 10px;"><?php echo $_SESSION['success'];
                                                        unset($_SESSION['success']); ?></div>
      <?php endif; ?>

      <form action="" method="POST">
        <!-- ten -->
        <div class="field">
          <span class="fa fa-user"></span>
          <input type="text" name="username" required placeholder="Tên đăng nhập">
        </div>
        <!-- pass -->
        <div class="field space">
          <span class="fa fa-lock"></span>
          <input type="password" name="password" class="pass-key" required placeholder="Mật khẩu">
          <span class="show">SHOW</span>
        </div>
        <!-- dien thoaij -->
        <div class="field space">
          <span class="fa"> <i class="fa-solid fa-phone"></i></span>
          <input type="text" name="phone" required placeholder="Điện thoại">
        </div>
        <!-- email -->
        <div class="field space">
          <span class="fa"><i class="fa-solid fa-envelope"></i></span>
          <input type="text" name="email" required placeholder="Email">
        </div>


        <!-- ngày sinh -->
        <div class="field space">
          <span class="fa"><i class="fa-solid fa-calendar-days"></i></span>
          <input type="date" name="dob" required placeholder="Ngày sinh">
        </div>
        <!-- địa chỉ -->
        <div class="field space">
          <span class="fa"><i class="fa-solid fa-envelope"></i></span>
          <input type="text" name="address" required placeholder="Địa chỉ">
        </div>

        <div class="pass">
          <a href="#">Quên mật khẩu?</a>
        </div>
        <div class="field">
          <input type="submit" value="ĐĂNG KÝ">
        </div>
      </form>

      <div class="signup" style="margin-top:16px;">Bạn đã có tài khoản
        <a href="./login.php">Đăng nhập </a>
      </div>
    </div>
  </div>

  <script>
    const pass_field = document.querySelector('.pass-key');
    const showBtn = document.querySelector('.show');
    showBtn.addEventListener('click', function() {
      if (pass_field.type === "password") {
        pass_field.type = "text";
        showBtn.textContent = "HIDE";
        showBtn.style.color = "#3498db";
      } else {
        pass_field.type = "password";
        showBtn.textContent = "SHOW";
        showBtn.style.color = "#222";
      }
    });
  </script>


</body>

</html>
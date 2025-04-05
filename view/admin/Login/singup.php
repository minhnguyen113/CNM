<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Chef Restaurent Singup</title>

<link rel="shortcut icon" href="./logo1.png">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body>
  <div class="bg-img">
    <div class="content">
      <header>Đăng ký</header>
      <form action="#">
        <!-- ten -->
        <div class="field">
          <span class="fa fa-user"></span>
          <input type="text" required placeholder="Tên đăng nhập">
        </div>
        <!-- pass -->
        <div class="field space">
          <span class="fa fa-lock"></span>
          <input type="password" class="pass-key" required placeholder="Mật khẩu">
          <span class="show">SHOW</span>
        </div>

        <!-- dien thoaij -->
        <div class="field space">
          <span class="fa"> <i class="fa-solid fa-phone"></i></span>
          <input type="text" required placeholder="Điện thoại">
        </div>
        <!-- email -->
        <div class="field space">
          <span class="fa"><i class="fa-solid fa-envelope"></i></span>
          <input type="text" required placeholder="Email">
        </div>
        <!-- ngày sinh -->
        <div class="field space">
          <span class="fa"><i class="fa-solid fa-calendar-days"></i></span>
          <input type="date" name="ngay_sinh" required placeholder="Ngày sinh">
        </div>
        <!-- địa chỉ -->
        <div class="field space">
          <span class="fa"><i class="fa-solid fa-envelope"></i></span>
          <input type="text" required placeholder="Địa chỉ">
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
    showBtn.addEventListener('click', function () {
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
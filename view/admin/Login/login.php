
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Chef Restaurent Login</title>

  	<link rel="shortcut icon" href="./logo1.png">

    <link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
   <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </head>
  <body>
    <div class="bg-img">
      <div class="content">
        <header>Đăng nhập</header>
        <!-- form -->
        <form action="#" method="POST" >
          <div class="field">
            <span class="fa fa-user"></span>
            <input type="text" name="sdt" required placeholder="Phone" required>
          </div>
          <div class="field space">
            <span class="fa fa-lock"></span>
            <input type="password"  name="mk" class="pass-key" required placeholder="Password" required>
            <span class="show">SHOW</span>
          </div>
          <div class="pass">
            <a href="#">Quên mật khẩu?</a>
          </div>
          <div class="field">
            <input type="submit" name="btn-dangnhap" value="ĐĂNG NHẬP">
          </div>
        </form>
        <div class="login">Hoặc đăng nhập với</div>
        <div class="links">
          <div class="facebook">
            <i class="fab fa-facebook-f"><span>Facebook</span></i>
          </div>
          <div class="instagram">
            <i class="fab fa-instagram"><span>Instagram</span></i>
          </div>
        </div>
        <div class="signup">Bạn chưa có tài khoản
          <a href="./singup.php">Đăng ký tại đây</a>
        </div>
      </div>
    </div>

    <script>
      const pass_field = document.querySelector('.pass-key');
      const showBtn = document.querySelector('.show');
      showBtn.addEventListener('click', function(){
       if(pass_field.type === "password"){
         pass_field.type = "text";
         showBtn.textContent = "HIDE";
         showBtn.style.color = "#3498db";
       }else{
         pass_field.type = "password";
         showBtn.textContent = "SHOW";
         showBtn.style.color = "#222";
       }
      });
    </script>


  </body>
</html>

<?php
session_start();
include_once '../../../controller/cNhanVien.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['sdt']) && !empty($_POST['mk'])) {
        $sdt = $_POST['sdt'];
        $mk = $_POST['mk'];

        $controller = new NhanVienController();
        $controller->dangnhap($sdt, $mk);
    } else {
        echo "<script>alert('Vui lòng nhập đầy đủ thông tin!');</script>";
    }
}
?>


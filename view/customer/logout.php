
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
include_once(__DIR__ . "../../../model/mUser.php");

// Nếu đã đăng nhập → cập nhật thời gian CheckOut
if (isset($_SESSION['user_id'])) {
    $userModel = new UserModel();
    $userModel->updateCheckOut($_SESSION['user_id']);
}

// Xóa session
session_unset(); 
session_destroy(); 

// Chuyển về trang chủ
header("Location: ../index.php");
exit();
?>

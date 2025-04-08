<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();    
}
include_once(__DIR__ . "/../model/mUser.php");


class UserController
{
    private $userModel;

    public function __construct()
    {

        $this->userModel = new UserModel();
    }

    // login
    public function handleLogin($sdt, $password)
{
    $passwordHashed = md5($password);

    // Check User
    $user = $this->userModel->checkUserLogin($sdt, $passwordHashed);

    if ($user) {
        $_SESSION['user_id'] = $user['ID_User'];
        $_SESSION['username'] = $user['TenUser'];
        $_SESSION['email'] = $user['Email'];
        $_SESSION['role_id'] = $user['ID_Role'];
        $_SESSION['role_name'] = 'User'; // hoặc lấy từ bảng role
        $_SESSION['phone'] = $user['SoDienThoai'];

        // Phân quyền chính xác
        if ($user['ID_Role'] == 1) {
            $_SESSION['success'] = 'Chào mừng Quản lý';
            header("Location: ../admin/index.php");
            exit;
        } elseif ($user['ID_Role'] == 2) {
            $_SESSION['success'] = 'Chào mừng Nhân viên';
            header("Location: ../admin/index.php");
            exit;
        } elseif ($user['ID_Role'] == 3) {
            header("Location: ../customer/index.php");
            exit;
        } else {
            // Nếu role không hợp lệ (phòng ngừa)
            $_SESSION['error'] = 'Tài khoản không hợp lệ! Vui lòng kiểm tra đăng nhập.';
            header("Location: ../customer/login.php");
            exit;
        }

    } else {
        // ✅ Đây mới là chỗ xử lý tài khoản hoặc mật khẩu sai
        $_SESSION['error'] = "Số điện thoại hoặc mật khẩu không đúng!";
        header("Location: ../customer/login.php");
        exit;
    }
}

}

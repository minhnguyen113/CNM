<?php

include_once(__DIR__ . "/../model/mNhanVien.php");


class NhanVienController{

    private $nhanVienModel;

    public function __construct()
    {
        $this->nhanVienModel = new  NhanVienModel();
        
    }

    // Hàm xử lý đăng nhập
    public function login($username, $password)
    {
        return $this->nhanVienModel->checkLogin($username, $password);
    }

    // Hàm kiểm tra quyền truy cập
    public function checkAccess()
    {
        if (!isset($_SESSION['user_id'])) {
            header("Location: signin.php");
            exit();
        }
    }

    // Hàm đăng xuất
    public function logout()
    {
        session_start();
        session_destroy();
        header("Location: signin.php");
        exit();
    }

    // Hàm xác thực tài khoản
    public function authenticateUser($username, $password)
    {
        $user = $this->nhanVienModel->getUserByUsername($username);
        if ($user && $user['password'] === md5($password)) {
            return $user;
        }
        return false;
    }

    // Hàm đăng ký tài khoản
    public function register($username, $phone, $password, $roleId, $tenNguoi, $diaChi, $ngaySinh)
    {
        return $this->nhanVienModel->createUserTheoRole($username, $phone, $password, $roleId, $tenNguoi, $diaChi, $ngaySinh);

    }

    // Lấy danh sách vai trò
    public function getRoles()
    {
        return $this->nhanVienModel->getAllRoles();
    }

}









?>
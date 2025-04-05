<?php

include_once(__DIR__ . "/../model/mNhanVien.php");

class NhanVienController
{
    private $nhanVienModel;

    public function __construct()
    {
        $this->nhanVienModel = new NhanVienModel();
    }


    // dang nhap

    public function dangnhap($sdt, $mk)
    {
        $model = new NhanVienModel();
        $mk = md5($mk);
        $result = $model->getNhanVien($sdt, $mk);
        if ($result === false) {
            echo " Loi truy van:" . mysqli_error($model->$result);
        } else {

            if (mysqli_num_rows($result)) {
               while($r= mysqli_fetch_array($result)){
                session_start();
                    $row = $r;
                    $_SESSION['ID_NhanVien'] = $row['ID_NhanVien'];
                    $_SESSION['ID_Role'] = $row['ID_Role'];
                    $_SESSION['TenNhanVien'] = $row['TenNhanVien'];
                }

                echo "<script>alert('Đăng nhập thành công!');</script>";
                echo "<script>window.location.href ='../view/admin/index.php';</script>";
                
                exit();  // Kết thúc script sau khi chuyển hướng
          
            } else {
                echo "<script>alert('Đăng nhập thất bại!');</script>";
                echo "<script>window.location.href = '../view/admin/Login/login.php';</script>";
                exit();
            }
        }
    }


    /**
     * Hiển thị chi tiết nhân viên
     */
    public function chiTietNhanVien($data)
    {
        $p = new NhanVienModel();
        $kq = $p->getChiTietNhanVien($data);
        if ($kq && mysqli_num_rows($kq) > 0) {
            return mysqli_fetch_assoc($kq); // ✅ nên fetch luôn dữ liệu
        } else {
            return false;
        }
    }

    /**
     * Thêm nhân viên mới - Chỉ Admin được phép
     */
    public function addNhanVien($username, $email, $roleId, $phone, $diaChi, $ngaySinh, $avatarPath = null)
    {
        // Đảm bảo đã khởi tạo session
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Kiểm tra quyền admin
        if (!isset($_SESSION['ID_Role']) || $_SESSION['ID_role'] != 1) {
            return "access_denied";
        }

        // Gọi model để thêm nhân viên mới
        return $this->nhanVienModel->createNhanVien($username, $email, $roleId, $phone, $diaChi, $ngaySinh, $avatarPath);
    }

    /**
     * Xử lý đăng nhập
     */
    public function login($username, $password)
    {
        return $this->nhanVienModel->checkLogin($username, $password);
    }

    /**
     * Kiểm tra quyền truy cập trang quản trị
     */
    public function checkAccess()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['ID_NguoiDung'])) {
            header("Location: signin.php");
            exit();
        }
    }
}

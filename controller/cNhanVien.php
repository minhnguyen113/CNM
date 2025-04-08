<?php
include_once __DIR__ . '/../model/mNhanVien.php';

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
        $result = $this->nhanVienModel->get1NhanVien($sdt, $mk);

        if ($result === false || empty($result)) {
            exit();
        }
        if(!empty($result)){
        session_start();
        $_SESSION['ID_Role'] = $result['ID_Role'];
        $_SESSION['ID_NhanVien'] = $result['ID_NhanVien'];

       header("Location:../view/admin/index.php");
        exit();
        }else{
            echo " Tài khoản hoặc mật khẩu không đúng.";
        }
    }




    /**
     * Hiển thị chi tiết nhân viên
     */
    // public function chiTietNhanVien($data)
    // {
    //     $p = new NhanVienModel();
    //     $kq = $p->getChiTietNhanVien($data);
    //     if ($kq && mysqli_num_rows($kq) > 0) {
    //         return mysqli_fetch_assoc($kq); // ✅ nên fetch luôn dữ liệu
    //     } else {
    //         return false;
    //     }
    // }

    // /**
    //  * Thêm nhân viên mới - Chỉ Admin được phép
    //  */
    // public function addNhanVien($username, $email, $roleId, $phone, $diaChi, $ngaySinh, $avatarPath = null)
    // {
    //     // Đảm bảo đã khởi tạo session
    //     if (session_status() === PHP_SESSION_NONE) {
    //         session_start();
    //     }

    //     // Kiểm tra quyền admin
    //     if (!isset($_SESSION['ID_Role']) || $_SESSION['ID_role'] != 1) {
    //         return "access_denied";
    //     }

    //     // Gọi model để thêm nhân viên mới
    //     return $this->nhanVienModel->createNhanVien($username, $email, $roleId, $phone, $diaChi, $ngaySinh, $avatarPath);
    // }



    // /**
    //  * Kiểm tra quyền truy cập trang quản trị
    //  */
    // public function checkAccess() {}
}

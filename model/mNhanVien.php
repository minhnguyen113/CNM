<?php
include_once("Connect.php");

class NhanVienModel extends ketnoi
{


    //  Dang nhap
    public function get1NhanVien($sdt, $mk)
    {
        $db = new ketnoi();
        $conn = $db->Moketnoi();
        $sql = "SELECT * FROM NhanVien WHERE SoDienThoai = ? AND MatKhau = ?";
        $stmt = $conn->prepare($sql);
        $mk = md5($mk);
    
        $stmt->bind_param("ss", $sdt, $mk);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();
        $db->DongKetNoi($conn);


        return $user;
    }



    // public function checkLogin($username, $password)
    // {
    //     $db = new ketnoi();
    //     $con = $db->MoKetNoi();

    //     $query = "SELECT users.*, roles.TenViTri 
    //               FROM NguoiDung AS users 
    //               INNER JOIN VaiTro as roles ON users.ID_Role = roles.ID_Role 
    //               WHERE UserName = ? AND PassWord = ?";
    //     $stmt = $con->prepare($query);
    //     $hashedPassword = md5($password);
    //     $stmt->bind_param("ss", $username, $hashedPassword);
    //     $stmt->execute();

    //     $result = $stmt->get_result();
    //     $user = $result->fetch_assoc();

    //     $stmt->close();
    //     $db->DongKetNoi($con);

    //     return $user;
    // }

    // public function createNhanVien($username, $email, $roleId, $phone, $diaChi, $ngaySinh, $avatarPath = null)
    // {
    //     $db = new ketnoi();
    //     $con = $db->MoKetNoi();

    //     // Kiểm tra username
    //     $stmt = $con->prepare("SELECT * FROM NguoiDung WHERE UserName = ?");
    //     $stmt->bind_param("s", $username);
    //     $stmt->execute();
    //     if ($stmt->get_result()->num_rows > 0) {
    //         $stmt->close();
    //         $db->DongKetNoi($con);
    //         return "username_exists";
    //     }
    //     $stmt->close();

    //     // Kiểm tra email
    //     $stmt = $con->prepare("SELECT * FROM NguoiDung WHERE Email = ?");
    //     $stmt->bind_param("s", $email);
    //     $stmt->execute();
    //     if ($stmt->get_result()->num_rows > 0) {
    //         $stmt->close();
    //         $db->DongKetNoi($con);
    //         return "email_exists";
    //     }
    //     $stmt->close();

    //     // Thêm tài khoản mới
    //     $stmt = $con->prepare("INSERT INTO NguoiDung (UserName, Email, ID_Role, Phone, Adress, NgaySinh, HinhAnh) VALUES (?, ?, ?, ?, ?, ?, ?)");
    //     $stmt->bind_param("sssisss", $username, $email, $roleId, $phone, $diaChi, $ngaySinh, $avatarPath);

    //     if ($stmt->execute()) {
    //         $stmt->close();
    //         $db->DongKetNoi($con);
    //         return "registration_success";
    //     }

    //     $stmt->close();
    //     $db->DongKetNoi($con);
    //     return "registration_failed";
    // }

    // public function getChiTietNhanVien($data)
    // {
    //     $db = new ketnoi();
    //     $con = $db->MoKetNoi();

    //     $sql = "SELECT NguoiDung.Email, NguoiDung.Phone, NguoiDung.UserName, NguoiDung.Adress, NguoiDung.NgaySinh, VaiTro.TenViTri 
    //             FROM NguoiDung
    //             INNER JOIN VaiTro ON NguoiDung.ID_Role = VaiTro.ID_Role
    //             WHERE NguoiDung.ID_NguoiDung = '$data' limit 1";
    //     $stmt = $con->prepare($sql);
    //     $stmt->bind_param("i", $data);
    //     $stmt->execute();
    //     $result = $stmt->get_result();

    //     $db->DongKetNoi($con);
    //     return $result;
    // }
}

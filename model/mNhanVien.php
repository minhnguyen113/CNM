<?php
include_once("connect.php");


class NhanVienModel extends ketnoi
{
    //Kiểm tra thông tin đăng nhập
    public function checkLogin($username, $password)
    {
        $con = $this->Moketnoi();

        $query = "SELECT nd.*, vt.TenViTri 
                  FROM NguoiDung nd
                  INNER JOIN VaiTro vt ON nd.ID_Role = vt.ID_Role 
                  WHERE UserName = ? AND PassWord = ?";

        $stmt = $con->prepare($query);
        $hashedPassword = md5($password); // Nếu bạn đang dùng md5 trong database
        $stmt->bind_param("ss", $username, $hashedPassword);
        $stmt->execute();

        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        $stmt->close();
        $this->Dongketnoi($con);

        return $user;
    }

    // Thêm người dùng mới

    public function createUserTheoRole($username, $phone, $password, $roleId, $tenNguoi, $diaChi)
{
    $con = $this->Moketnoi();

    // 1. Kiểm tra username
    $stmt = $con->prepare("SELECT * FROM NguoiDung WHERE UserName = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    if ($stmt->get_result()->num_rows > 0) {
        $stmt->close(); $this->Dongketnoi($con);
        return "username_exists";
    }

    // 2. Kiểm tra phone
    $stmt = $con->prepare("SELECT * FROM NguoiDung WHERE Phone = ?");
    $stmt->bind_param("s", $phone);
    $stmt->execute();
    if ($stmt->get_result()->num_rows > 0) {
        $stmt->close(); $this->Dongketnoi($con);
        return "phone_exists";
    }

    // 3. Mã hóa mật khẩu và thêm vào bảng NguoiDung
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $con->prepare("INSERT INTO NguoiDung (UserName, Phone, PassWord, ID_Role) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $username, $phone, $hashedPassword, $roleId);
    $stmt->execute();

    // Lấy ID người dùng vừa thêm
    $newUserId = $con->insert_id;
    $stmt->close();

    // 4. Phân chia theo role
    if (in_array($roleId, [1, 2, 3])) {
        // ➤ Thêm vào bảng NhanVien
        $stmt = $con->prepare("INSERT INTO NhanVien (TenNhanVien, SoDienThoai, DiaChi, ID_Role, NgayThangNam, ID_NguoiDung)
                               VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssisi", $tenNguoi, $phone, $diaChi, $roleId, $ngaySinh, $newUserId);
        $stmt->execute();
        $stmt->close();
    } else {
        // ➤ Thêm vào bảng KhachHang
        $stmt = $con->prepare("INSERT INTO KhachHang (TenKhachHang, SoDienThoai, DiaChi, ID_NguoiDung)
                               VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $tenNguoi, $phone, $diaChi, $newUserId);
        $stmt->execute();
        $stmt->close();
    }

    $this->Dongketnoi($con);
    return "success";
}

public function getUserByUsername($username)
{
    $con = $this->Moketnoi();
    $query = "SELECT * FROM NguoiDung WHERE UserName = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    $stmt->close();
    $this->Dongketnoi($con);

    return $user;
}







// Lấy tất cả vai trò
public function getAllRoles()
    {
        $db = new ketnoi();
        $con = $db->MoKetNoi();

        $query = "SELECT * FROM VaiTro";
        $result = $con->query($query);

        $roles = [];
        while ($row = $result->fetch_assoc()) {
            $roles[] = $row;
        }

        $db->DongKetNoi($con);

        return $roles;
    }


    
}

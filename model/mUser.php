<?php
include_once(__DIR__ . "/Connect.php");

class UserModel
{
    private $conn;

    public function __construct()
    {
        $db = new ketnoi();
        $this->conn = $db->Moketnoi();
    }

    public function checkUserLogin($sdt, $password)
    {
        $sql = "SELECT * FROM NguoiDung WHERE SoDienThoai = '$sdt' AND MatKhau = '$password'";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_assoc($result);
    }


    // Lấy danh sách tất cả nhân viên

    public function getAllUsers()
    {
        $p = new ketnoi();
        $con = $p->Moketnoi();
        $sql = "SELECT * FROM `NguoiDung` WHERE ID_Role IN (1, 2)";
        $result = mysqli_query($con, $sql);
        if (!$result) {
            die("Lỗi truy vấn: " . mysqli_error($con));
        }
        $p->Dongketnoi($con);
        return $result;
    }

    // Lay chi tiết một nhân viên
    public function getUserById($id)
    {
        $p = new ketnoi();
        $con = $p->Moketnoi();
        $sql = "SELECT nd.*, vt.TenViTri 
            FROM NguoiDung as nd
            JOIN VaiTro as vt ON nd.ID_Role = vt.ID_Role
            WHERE ID_User = '$id'";

        $result = mysqli_query($con, $sql);
        if (!$result) {
            die("Lỗi truy vấn: " . mysqli_error($con));
        }
        $p->Dongketnoi($con);
        return $result;
        $staffList = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $staffList[] = $row;
        }

        return $staffList;
    }
    // Cập nhật thông tin nhân viên
    public function updateUserById($id, $email, $phone, $address, $date, $avatarFileName)
    {
        $p = new ketnoi();
        $con = $p->Moketnoi();

        $sql = "UPDATE NguoiDung SET Email='$email', SoDienThoai='$phone', DiaChi='$address', NgaySinh='$date', HinhAnh='$avatarFileName' WHERE ID_User='$id'";

        $result = mysqli_query($con, $sql);
        $p->Dongketnoi($con);
        return $result;
    }
    //thêm mới một nhân viên
    public function addUser($username, $email, $phone, $address, $date, $avatarFileName, $password, $idrole)
    {
        $p = new ketnoi();
        $con = $p->Moketnoi();

        // Kiểm tra số điện thoại đã tồn tại
        $checkPhoneQuery = "SELECT * FROM NguoiDung WHERE SoDienThoai = '$phone'";
        $stmt = mysqli_query($con, $checkPhoneQuery);

        if (mysqli_num_rows($stmt) > 0) {
            return "phone_exists";
        }

        // Thêm người dùng mới
        $sql = "INSERT INTO NguoiDung (TenUser, Email, SoDienThoai, DiaChi, NgaySinh, HinhAnh, MatKhau,ID_Role) 
                VALUES ('$username', '$email', '$phone', '$address', '$date', '$avatarFileName', '$password','$idrole')";

        $result = mysqli_query($con, $sql);
        $p->Dongketnoi($con);
        return $result;
    }

    // Xóa nhân viên

    public function deleteUser($id)
    {
        $p = new ketnoi();
        $con = $p->Moketnoi();

        // Chuẩn bị câu lệnh SQL
        $sql = "DELETE FROM NguoiDung WHERE ID_User = ? AND ID_Role IN (2, 3)";
        $stmt = mysqli_prepare($con, $sql);

        if ($stmt) {
            // Gán giá trị vào tham số
            mysqli_stmt_bind_param($stmt, "i", $id);

            // Thực thi câu lệnh
            $result = mysqli_stmt_execute($stmt);

            // Đóng statement
            mysqli_stmt_close($stmt);
        } else {
            // Nếu lỗi prepare, trả về false
            $result = false;
        }

        // Đóng kết nối
        $p->Dongketnoi($con);

        return $result;
    }

    // xem danh sách khách hàng
    public function getAllCustomers()
    {
        $p = new ketnoi();
        $con = $p->Moketnoi();
        $sql = "SELECT * FROM NguoiDung WHERE ID_Role = 3";
        $result = mysqli_query($con, $sql);
        if (!$result) {
            die("Lỗi truy vấn: " . mysqli_error($con));
        }
        $p->Dongketnoi($con);
        return $result;
    }

    //thêm khách hàng

    public function addCustomer($username, $email, $phone, $address, $date, $avatarFileName, $password)
    {
        $p = new ketnoi();
        $con = $p->Moketnoi();
    
        // Chuẩn hoá dữ liệu đầu vào
        $phone = trim($phone);
        $email = trim($email);
        $username = trim($username);
    
        // Kiểm tra số điện thoại đã tồn tại
        $checkPhoneQuery = "SELECT * FROM NguoiDung WHERE TRIM(SoDienThoai) = ?";
        $stmt = mysqli_prepare($con, $checkPhoneQuery);
        mysqli_stmt_bind_param($stmt, "s", $phone);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    
        if (mysqli_num_rows($result) > 0) {
            return "phone_exists"; 
        }
    
        // Thêm người dùng mới
        $insertQuery = "INSERT INTO NguoiDung (TenUser, Email, SoDienThoai, DiaChi, NgaySinh, HinhAnh, MatKhau, ID_Role)
                        VALUES (?, ?, ?, ?, ?, ?, ?, 3)";
        $stmt = mysqli_prepare($con, $insertQuery);
        mysqli_stmt_bind_param($stmt, "sssssss", $username, $email, $phone, $address, $date, $avatarFileName, $password);
        $success = mysqli_stmt_execute($stmt);
    
        $p->Dongketnoi($con);
        return $success;
    }
    

    // xoa khách hàng
    public function deleteCustomer($id)
    {
        $p = new ketnoi();
        $con = $p->Moketnoi();

        // Chuẩn bị câu lệnh SQL
        $sql = "DELETE FROM NguoiDung WHERE ID_User = ? AND ID_Role = 3";
        $stmt = mysqli_prepare($con, $sql);

        if ($stmt) {
            // Gán giá trị vào tham số
            mysqli_stmt_bind_param($stmt, "i", $id);

            // Thực thi câu lệnh
            $result = mysqli_stmt_execute($stmt);

            // Đóng statement
            mysqli_stmt_close($stmt);
        } else {
            // Nếu lỗi prepare, trả về false
            $result = false;
        }

        // Đóng kết nối
        $p->Dongketnoi($con);

        return $result;
    }

    // xem thông tin chi tiết khách hàng
    public function getCustomerById($id)
    {
        $p = new ketnoi();
        $con = $p->Moketnoi();
        $sql = "SELECT * FROM NguoiDung WHERE ID_User = '$id' AND ID_Role = 3";
        $result = mysqli_query($con, $sql);
        if (!$result) {
            die("Lỗi truy vấn: " . mysqli_error($con));
        }
        $p->Dongketnoi($con);
        return $result;
    }

}

<?php
include_once(__DIR__ . "/Connect.php");

class UserModel {
    private $conn;

    public function __construct() {
        $db = new ketnoi();
        $this->conn = $db->Moketnoi();
    }

    public function checkUserLogin($sdt, $password) {
        $sql = "SELECT * FROM NguoiDung WHERE SoDienThoai = '$sdt' AND MatKhau = '$password'";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_assoc($result);
    }

   
}
<?php
include_once(__DIR__ . "/Connect.php");

class KhuyenMaiModel {
    private $conn;

    public function __construct() {
        $db = new ketnoi();
        $this->conn = $db->Moketnoi();
    }

    // Lấy danh sách khuyến mãi
    public function getAllKhuyenMai() {
        $sql = "SELECT * FROM khuyenmai ORDER BY NgayBatDau DESC";
        $result = mysqli_query($this->conn, $sql);
        if (!$result) {
            die("Lỗi truy vấn SQL: " . mysqli_error($this->conn));
        }
        return $result;
    }

    // Thêm khuyến mãi mới
    public function addKhuyenMai($tenKM, $giamGia, $ngayBD, $ngayKT) {
        $sql = "INSERT INTO khuyenmai (TenKhuyenMai, GiamGia, NgayBatDau, NgayKetThuc) 
                VALUES ('$tenKM', '$giamGia', '$ngayBD', '$ngayKT')";
        $result = mysqli_query($this->conn, $sql);
        if (!$result) {
            die("Lỗi truy vấn SQL: " . mysqli_error($this->conn));
        }
        return $result;
    }

    // Lấy thông tin khuyến mãi theo ID
    public function getKhuyenMaiById($id) {
        $sql = "SELECT * FROM khuyenmai WHERE ID_KhuyenMai = '$id'";
        $result = mysqli_query($this->conn, $sql);
        if (!$result) {
            die("Lỗi truy vấn SQL: " . mysqli_error($this->conn));
        }
        return mysqli_fetch_assoc($result);
    }
    public function getGiamGia($id) {
        $conn = (new ketnoi())->Moketnoi();
        $sql = "SELECT GiamGia FROM khuyenmai 
                WHERE ID_KhuyenMai = $id AND CURDATE() BETWEEN NgayBatDau AND NgayKetThuc";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        (new ketnoi())->Dongketnoi($conn);
        return $row ? $row['GiamGia'] : 0;
    }
    // Cập nhật khuyến mãi
    public function updateKhuyenMai($id, $tenKM, $giamGia, $ngayBD, $ngayKT) {
        $sql = "UPDATE khuyenmai 
                SET TenKhuyenMai = '$tenKM', 
                    GiamGia = '$giamGia', 
                    NgayBatDau = '$ngayBD', 
                    NgayKetThuc = '$ngayKT' 
                WHERE ID_KhuyenMai = '$id'";
        $result = mysqli_query($this->conn, $sql);
        if (!$result) {
            die("Lỗi truy vấn SQL: " . mysqli_error($this->conn));
        }
        return $result;
    }

    // Xóa khuyến mãi
    public function deleteKhuyenMai($id) {
        $sql = "DELETE FROM khuyenmai WHERE ID_KhuyenMai = '$id'";
        $result = mysqli_query($this->conn, $sql);
        if (!$result) {
            die("Lỗi truy vấn SQL: " . mysqli_error($this->conn));
        }
        return $result;
    }
} 
<?php
include_once("Connect.php");

class NguyenLieuModel {
    private $conn;

    public function __construct() {
        $this->conn = (new ketnoi())->Moketnoi();
    }

    // Lấy tất cả nguyên liệu
    public function getAllNguyenLieu() {
        $sql = "SELECT * FROM nguyenlieu";
        $result = mysqli_query($this->conn, $sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    // Lấy nguyên liệu theo ID
    public function getNguyenLieuById($id) {
        $sql = "SELECT * FROM nguyenlieu WHERE ID_NguyenLieu = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Thêm nguyên liệu mới
    public function addNguyenLieu($tenNguyenLieu, $donViTinh, $soLuongTon, $ghiChu) {
        $sql = "INSERT INTO nguyenlieu (TenNguyenLieu, DonViTinh, SoLuongTon, GhiChu) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssis", $tenNguyenLieu, $donViTinh, $soLuongTon, $ghiChu);
        return $stmt->execute();
    }

    // Cập nhật nguyên liệu
    public function updateNguyenLieu($id, $tenNguyenLieu, $donViTinh, $soLuongTon, $ghiChu) {
        $sql = "UPDATE nguyenlieu SET TenNguyenLieu = ?, DonViTinh = ?, SoLuongTon = ?, GhiChu = ? WHERE ID_NguyenLieu = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssisi", $tenNguyenLieu, $donViTinh, $soLuongTon, $ghiChu, $id);
        return $stmt->execute();
    }

    // Xóa nguyên liệu
    public function deleteNguyenLieu($id) {
        $sql = "DELETE FROM nguyenlieu WHERE ID_NguyenLieu = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?> 
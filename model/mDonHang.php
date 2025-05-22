<?php
include_once("Connect.php");

class DonHang {
    public $conn;

    public function __construct() {
        $this->conn = (new ketnoi())->Moketnoi();
    }

    public function createDonHang($tongTien, $idKhuyenMai, $idUser) {
        $sql = "INSERT INTO DonHang (TongTien, ID_KhuyenMai, ID_User, TrangThai, ThoiGianDat)
                VALUES (?, ?, ?, 'Chờ xử lý', NOW())";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("dii", $tongTien, $idKhuyenMai, $idUser);
        $stmt->execute();
        $id = $stmt->insert_id;
        $stmt->close();
        return $id;
    }
    
    public function addChiTietDonHang($idDonHang, $idMonAn, $soLuong, $gia) {
        $sql = "INSERT INTO chitietdonhang (ID_DonHang, ID_MonAn, SoLuongMon, Gia)
                VALUES ($idDonHang, $idMonAn, $soLuong, $gia)";
        $this->conn->query($sql);
    }

    public function getAll() {
        $sql = "SELECT * FROM donhang ORDER BY ThoiGianDat DESC";
        $result = $this->conn->query($sql);
        $data = [];
        while ($row = $result->fetch_assoc()) $data[] = $row;
        return $data;
    }

    public function getChiTiet($idDonHang) {
        $sql = "SELECT ct.*, m.TenMon 
                FROM chitietdonhang ct 
                JOIN monan m ON ct.ID_MonAn = m.ID_MonAn 
                WHERE ct.ID_DonHang = $idDonHang";
        $result = $this->conn->query($sql);
        $data = [];
        while ($row = $result->fetch_assoc()) $data[] = $row;
        return $data;
    }

    public function getById($idDonHang) {
        $sql = "SELECT * FROM donhang WHERE ID_DonHang = $idDonHang";
        $result = $this->conn->query($sql);
        $row = $result->fetch_assoc();
        return $row;
    }

    public function updateTrangThai($idDonHang, $trangThai) {
        $sql = "UPDATE donhang SET TrangThai = ? WHERE ID_DonHang = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("si", $trangThai, $idDonHang);
        $result = $stmt->execute();
        return $result;
    }
    public function getByUser($idUser) {
        $sql = "SELECT * FROM donhang WHERE ID_User = $idUser ORDER BY ThoiGianDat DESC";
        $result = $this->conn->query($sql);
        $data = [];
        while ($row = $result->fetch_assoc()) $data[] = $row;
        return $data;
    }

    public function deleteDonHang($idDonHang) {
        // Xóa chi tiết đơn hàng trước
        $sql1 = "DELETE FROM chitietdonhang WHERE ID_DonHang = ?";
        $stmt1 = $this->conn->prepare($sql1);
        $stmt1->bind_param("i", $idDonHang);
        $stmt1->execute();
        // Xóa đơn hàng
        $sql2 = "DELETE FROM donhang WHERE ID_DonHang = ?";
        $stmt2 = $this->conn->prepare($sql2);
        $stmt2->bind_param("i", $idDonHang);
        $result = $stmt2->execute();
        return $result;
    }
}

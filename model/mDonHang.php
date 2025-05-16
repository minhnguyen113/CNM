<?php
include_once("Connect.php");

class DonHang {
    public function createDonHang($tongTien, $idKhuyenMai, $idUser) {
        $conn = (new ketnoi())->Moketnoi();
        $sql = "INSERT INTO DonHang (TongTien, ID_KhuyenMai, ID_User, TrangThai, ThoiGianDat)
                VALUES (?, ?, ?, 'Chờ xử lý', NOW())";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("dii", $tongTien, $idKhuyenMai, $idUser);
        $stmt->execute();
        $id = $stmt->insert_id;
        $stmt->close();
        (new ketnoi())->Dongketnoi($conn);
        return $id;
    }
    
    public function addChiTietDonHang($idDonHang, $idMonAn, $soLuong, $gia) {
        $conn = (new ketnoi())->Moketnoi();
        $sql = "INSERT INTO chitietdonhang (ID_DonHang, ID_MonAn, SoLuongMon, Gia)
                VALUES ($idDonHang, $idMonAn, $soLuong, $gia)";
        $conn->query($sql);
        (new ketnoi())->Dongketnoi($conn);
    }

    public function getAll() {
        $conn = (new ketnoi())->Moketnoi();
        $sql = "SELECT * FROM donhang ORDER BY ThoiGianDat DESC";
        $result = $conn->query($sql);
        $data = [];
        while ($row = $result->fetch_assoc()) $data[] = $row;
        (new ketnoi())->Dongketnoi($conn);
        return $data;
    }

    public function getChiTiet($idDonHang) {
        $conn = (new ketnoi())->Moketnoi();
        $sql = "SELECT ct.*, m.TenMon 
                FROM chitietdonhang ct 
                JOIN monan m ON ct.ID_MonAn = m.ID_MonAn 
                WHERE ct.ID_DonHang = $idDonHang";
        $result = $conn->query($sql);
        $data = [];
        while ($row = $result->fetch_assoc()) $data[] = $row;
        (new ketnoi())->Dongketnoi($conn);
        return $data;
    }

    public function getById($idDonHang) {
        $conn = (new ketnoi())->Moketnoi();
        $sql = "SELECT * FROM donhang WHERE ID_DonHang = $idDonHang";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        (new ketnoi())->Dongketnoi($conn);
        return $row;
    }

    public function updateTrangThai($idDonHang, $trangThai) {
        $conn = (new ketnoi())->Moketnoi();
        $sql = "UPDATE donhang SET TrangThai = ? WHERE ID_DonHang = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $trangThai, $idDonHang);
        $result = $stmt->execute();
        (new ketnoi())->Dongketnoi($conn);
        return $result;
    }
    public function getByUser($idUser) {
    $conn = (new ketnoi())->Moketnoi();
    $sql = "SELECT * FROM donhang WHERE ID_User = $idUser ORDER BY ThoiGianDat DESC";
    $result = $conn->query($sql);
    $data = [];
    while ($row = $result->fetch_assoc()) $data[] = $row;
    (new ketnoi())->Dongketnoi($conn);
    return $data;
}

    public function deleteDonHang($idDonHang) {
        $conn = (new ketnoi())->Moketnoi();
        // Xóa chi tiết đơn hàng trước
        $sql1 = "DELETE FROM chitietdonhang WHERE ID_DonHang = ?";
        $stmt1 = $conn->prepare($sql1);
        $stmt1->bind_param("i", $idDonHang);
        $stmt1->execute();
        // Xóa đơn hàng
        $sql2 = "DELETE FROM donhang WHERE ID_DonHang = ?";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->bind_param("i", $idDonHang);
        $result = $stmt2->execute();
        (new ketnoi())->Dongketnoi($conn);
        return $result;
    }
}

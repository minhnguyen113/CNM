<?php
class DanhGiaModel {
    private $conn;

    public function __construct() {
        include_once(__DIR__ . '/../model/Connect.php');
        $this->conn = (new ketnoi())->Moketnoi();
    }

    // Thêm đánh giá mới
    public function themDanhGia($idMonAn, $idUser, $soSao, $noiDung) {
        $stmt = $this->conn->prepare("INSERT INTO danhgia (ID_MonAn, ID_User, SoSao, NoiDung) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iiis", $idMonAn, $idUser, $soSao, $noiDung);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // Lấy danh sách đánh giá của 1 món ăn
    public function layDanhGiaTheoMonAn($idMonAn) {
        $stmt = $this->conn->prepare("SELECT dg.*, nd.TenUser FROM danhgia dg JOIN nguoidung nd ON dg.ID_User = nd.ID_User WHERE dg.ID_MonAn = ? ORDER BY NgayDanhGia DESC");
        $stmt->bind_param("i", $idMonAn);
        $stmt->execute();
        $result = $stmt->get_result();
        $danhgias = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $danhgias;
    }
    public function layTatCaDanhGia() {
        $sql = "SELECT dg.*, ma.TenMon, nd.TenUser 
                FROM danhgia dg 
                JOIN monan ma ON dg.ID_MonAn = ma.ID_MonAn 
                JOIN nguoidung nd ON dg.ID_User = nd.ID_User
                ORDER BY dg.NgayDanhGia DESC";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function xoaDanhGia($id) {
        $stmt = $this->conn->prepare("DELETE FROM danhgia WHERE ID_DanhGia = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
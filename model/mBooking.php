<?php
include_once(__DIR__ . "/Connect.php");


class mDatBan {
    private $conn;

    public function __construct()
    {
        $db = new ketnoi();
        $this->conn = $db->Moketnoi();
    }
    public function taoBanVaDatBan($tenBan, $soChoNgoi, $viTri, $thoiGian, $idUser, $soLuong) {
        $conn = $this->conn;
    
        // Bắt đầu transaction
        $conn->begin_transaction();
    
        try {
            // 1. Thêm bàn mới
            $stmt1 = $conn->prepare("INSERT INTO Ban (TenBan, SoChoNgoi, ViTri, TrangThai) VALUES (?, ?, ?, 'DaDat')");
            $stmt1->bind_param("sis", $tenBan, $soChoNgoi, $viTri);
            $stmt1->execute();
            $idBanMoi = $conn->insert_id;
    
            // 2. Thêm đặt bàn
            $stmt2 = $conn->prepare("INSERT INTO DatBan (ID_Ban, ThoiGianDat, ID_User, soLuong) VALUES (?, ?, ?, ?)");
            $stmt2->bind_param("isii", $idBanMoi, $thoiGian, $idUser, $soLuong);
            $stmt2->execute();
    
            // Commit giao dịch
            $conn->commit();
    
            return true;
        } catch (Exception $e) {
            // Rollback nếu có lỗi
            $conn->rollback();
            return false;
        }
    }

    public function demBanTheoLoai($prefix) {
        $sql = "SELECT COUNT(*) as tong FROM Ban WHERE ViTri LIKE ?";
        $stmt = $this->conn->prepare($sql);
        $param = $prefix . '%';
        $stmt->bind_param("s", $param);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        return $result['tong'] ?? 0;
    }
    // xem lịch sử đặt bàn
    public function getLichSuDatBan($idUser) {
        $sql = "SELECT db.*, b.TenBan, b.ViTri, b.SoChoNgoi
                FROM DatBan db
                JOIN Ban b ON db.ID_Ban = b.ID_Ban
                WHERE db.ID_User = ?
                ORDER BY db.ThoiGianDat DESC";
    
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $idUser);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
    
}
?>

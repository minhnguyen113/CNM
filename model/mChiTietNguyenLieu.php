<?php
include_once("Connect.php");

class ChiTietNguyenLieuModel {
    private $conn;

    public function __construct() {
        $this->conn = (new ketnoi())->Moketnoi();
    }

    // Lấy chi tiết nguyên liệu của món ăn theo ID_MonAn
    public function getChiTietNguyenLieuByMonAn($idMonAn) {
        $sql = "SELECT ctnl.*, nl.TenNguyenLieu, nl.DonViTinh, nl.SoLuongTon
                FROM ChiTietNguyenLieu ctnl
                JOIN NguyenLieu nl ON ctnl.ID_NguyenLieu = nl.ID_NguyenLieu
                WHERE ctnl.ID_MonAn = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $idMonAn);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    // Cập nhật số lượng nguyên liệu trong kho khi đặt hàng
    public function updateNguyenLieuTonKho($idMonAn, $soLuongDat) {
        // Lấy danh sách nguyên liệu cần trừ
        $chiTietNguyenLieu = $this->getChiTietNguyenLieuByMonAn($idMonAn);
        
        // Bắt đầu transaction
        $this->conn->begin_transaction();
        
        try {
            foreach ($chiTietNguyenLieu as $nl) {
                $soLuongCanTru = $nl['SoLuong'] * $soLuongDat;
                $idNguyenLieu = $nl['ID_NguyenLieu'];
                
                // Kiểm tra số lượng tồn kho
                $sql = "SELECT SoLuongTon FROM NguyenLieu WHERE ID_NguyenLieu = ? FOR UPDATE";
                $stmt = $this->conn->prepare($sql);
                $stmt->bind_param("i", $idNguyenLieu);
                $stmt->execute();
                $result = $stmt->get_result();
                $nguyenLieu = $result->fetch_assoc();
                
                if ($nguyenLieu['SoLuongTon'] < $soLuongCanTru) {
                    throw new Exception("Không đủ nguyên liệu trong kho");
                }
                
                // Cập nhật số lượng tồn kho
                $sql = "UPDATE NguyenLieu SET SoLuongTon = SoLuongTon - ? WHERE ID_NguyenLieu = ?";
                $stmt = $this->conn->prepare($sql);
                $stmt->bind_param("di", $soLuongCanTru, $idNguyenLieu);
                $stmt->execute();
            }
            
            // Commit transaction nếu mọi thứ OK
            $this->conn->commit();
            return true;
            
        } catch (Exception $e) {
            // Rollback nếu có lỗi
            $this->conn->rollback();
            throw $e;
        }
    }
}
?> 
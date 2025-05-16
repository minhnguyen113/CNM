<?php
include_once("Connect.php");

class DatBanModel {
    private $conn;

    public function __construct() {
        $this->conn = (new ketnoi())->Moketnoi();
    }

    public function getAllDatBan() {
        $sql = "SELECT * FROM DatBan ORDER BY ID_DatBan DESC";
        $result = $this->conn->query($sql);
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    public function getDatBanById($id) {
        $sql = "SELECT * FROM DatBan WHERE ID_DatBan = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function addDatBan($thoiGianDat, $idUser, $soLuong) {
        $conn = $this->conn;
    
        // Chọn 1 bàn bất kỳ (ưu tiên ID thấp nhất)
        $sqlBan = "SELECT ID_Ban FROM Ban ORDER BY ID_Ban ASC LIMIT 1";
        $result = $conn->query($sqlBan);
    
        if (!$result || $result->num_rows === 0) {
            throw new Exception("Không tìm thấy bàn nào để đặt.");
        }
    
        $row = $result->fetch_assoc();
        $idBan = $row['ID_Ban'];
    
        // Thêm dữ liệu đặt bàn
        $sqlInsert = "INSERT INTO DatBan (ID_Ban, ThoiGianDat, ID_User, soLuong) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sqlInsert);
        $stmt->bind_param("isii", $idBan, $thoiGianDat, $idUser, $soLuong);
        $stmt->execute();
    
        return true;
    }
    
    
    

    public function updateDatBan($id, $idBan, $thoiGianDat, $idUser, $soLuong) {
        $sql = "UPDATE DatBan 
                SET ID_Ban = ?, ThoiGianDat = ?, ID_User = ?, soLuong = ?
                WHERE ID_DatBan = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("isisi", $idBan, $thoiGianDat, $idUser, $soLuong, $id);
        return $stmt->execute();
    }
    

    public function deleteDatBan($id) {
        $sql = "DELETE FROM DatBan WHERE ID_DatBan = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>

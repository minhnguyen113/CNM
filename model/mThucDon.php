<?php
include_once("Connect.php");

class ThucDon {
    public function getAll() {
        $conn = (new ketnoi())->Moketnoi();
        $sql = "SELECT * FROM thucdon";
        $result = mysqli_query($conn, $sql);

        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        return $data;
    }

    public function getById($id) {
        $conn = (new ketnoi())->Moketnoi();
        $sql = "SELECT * FROM thucdon WHERE ID_ThucDon = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
    
    public function update($id, $ten, $mota) {
        $conn = (new ketnoi())->Moketnoi();
        $sql = "UPDATE thucdon SET TenThucDon = ?, MoTa = ? WHERE ID_ThucDon = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $ten, $mota, $id);
        return $stmt->execute();
    }
    
    public function delete($id) {
        $conn = (new ketnoi())->Moketnoi();
        $sql = "DELETE FROM thucdon WHERE ID_ThucDon = $id";
        return mysqli_query($conn, $sql);
    }
    public function create($ten, $mota) {
        $conn = (new ketnoi())->Moketnoi();
        $sql = "INSERT INTO thucdon (TenThucDon, MoTa) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $ten, $mota);
        return $stmt->execute();
    }
}
?>

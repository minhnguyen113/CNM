<?php
include_once("Connect.php");

class MonAn
{
    // Lấy tất cả món ăn
    public function getAll()
    {
        $conn = (new ketnoi())->Moketnoi();
        $sql = "SELECT * FROM monan";
        $result = mysqli_query($conn, $sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    // Lấy món ăn theo ID thực đơn
    public function getByThucDon($idThucDon)
    {
        $conn = (new ketnoi())->Moketnoi();
        $sql = "SELECT * FROM monan WHERE ID_ThucDon = ? ORDER BY ID_MonAn DESC"; // Thêm sắp xếp giảm dần
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $idThucDon);
        $stmt->execute();
        $result = $stmt->get_result();

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }


    // Lấy món ăn theo ID món ăn
    public function getById($idMonAn)
    {
        $conn = (new ketnoi())->Moketnoi();
        $sql = "SELECT * FROM monan WHERE ID_MonAn = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $idMonAn);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Thêm món ăn mới
    public function addMonAn($tenMon, $giaMon, $idThucDon, $hinhAnh = '')
    {
        $conn = (new ketnoi())->Moketnoi();

        // Kiểm tra kết nối
        if (!$conn) {
            echo "<script>alert('❌ Không thể kết nối CSDL');</script>";
            return false;
        }

        $stmt = $conn->prepare("INSERT INTO MonAn (TenMon, Gia, ID_ThucDon, HinhAnh) VALUES (?, ?, ?, ?)");
        if (!$stmt) {
            echo "<script>alert('❌ Lỗi prepare: " . $conn->error . "');</script>";
            return false;
        }

        $stmt->bind_param("ssis", $tenMon, $giaMon, $idThucDon, $hinhAnh);
        $result = $stmt->execute();

        if (!$result) {
            echo "<script>alert('❌ Lỗi thực thi: " . $stmt->error . "');</script>";
        }

        $stmt->close();
        (new ketnoi())->Dongketnoi($conn);
        return $result;
    }


    // Cập nhật món ăn
    public function update($idMonAn, $tenMon, $gia, $hinhAnh = null)
    {
        $conn = (new ketnoi())->Moketnoi();
        if ($hinhAnh !== null) {
            $stmt = $conn->prepare("UPDATE monan SET TenMon = ?, Gia = ?, HinhAnh = ? WHERE ID_MonAn = ?");
            $stmt->bind_param("sisi", $tenMon, $gia, $hinhAnh, $idMonAn);
        } else {
            $stmt = $conn->prepare("UPDATE monan SET TenMon = ?, Gia = ? WHERE ID_MonAn = ?");
            $stmt->bind_param("sii", $tenMon, $gia, $idMonAn);
        }
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // Xoá món ăn
    public function delete($idMonAn)
    {
        $conn = (new ketnoi())->Moketnoi();
        $stmt = $conn->prepare("DELETE FROM monan WHERE ID_MonAn = ?");
        $stmt->bind_param("i", $idMonAn);
        return $stmt->execute();
    }

    public function existsInThucDon($tenMon, $idThucDon)
    {
        $conn = (new ketnoi())->Moketnoi();
        $sql = "SELECT COUNT(*) as count FROM monan WHERE TenMon = ? AND ID_ThucDon = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $tenMon, $idThucDon);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row['count'] > 0;
    }
}

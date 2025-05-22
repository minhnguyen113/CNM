<?php
include_once("Connect.php");

class mThanhToan
{
    public function insert($idDonHang, $phuongThuc, $soTien, $trangThai, $maGiaoDich)
    {
        $p = new ketnoi();
        $conn = $p->Moketnoi();

        $sql = "INSERT INTO thanhtoan (ID_DonHang, PhuongThuc, SoTien, TrangThai, MaGiaoDich) 
                VALUES ('$idDonHang', '$phuongThuc', '$soTien', '$trangThai', '$maGiaoDich')";
        $result = mysqli_query($conn, $sql);

        $p->Dongketnoi($conn);
        return $result;
    }
    public function getPhuongThucByDonHang($idDonHang) {
        $p = new ketnoi();
        $conn = $p->Moketnoi();
        $sql = "SELECT PhuongThuc FROM thanhtoan WHERE ID_DonHang = '$idDonHang' ORDER BY ID_ThanhToan DESC LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $phuongThuc = '';
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $phuongThuc = $row['PhuongThuc'] ?? '';
        }
        $p->Dongketnoi($conn);
        return $phuongThuc;
    }
    public function getThanhToanById($idDonHang) {
        $p = new ketnoi();
        $conn = $p->Moketnoi();
        $sql = "SELECT * FROM thanhtoan WHERE ID_DonHang = '$idDonHang' ORDER BY ID_ThanhToan DESC LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $thanhToan = null;
        if ($result && mysqli_num_rows($result) > 0) {
            $thanhToan = mysqli_fetch_assoc($result);
        }
        $p->Dongketnoi($conn);
        return $thanhToan;
    }
    public function xoaThanhToan($idDonHang) {
        $p = new ketnoi();
        $conn = $p->Moketnoi();
        $sql = "DELETE FROM thanhtoan WHERE ID_DonHang = '$idDonHang'";
        $result = mysqli_query($conn, $sql);
        $p->Dongketnoi($conn);
        return $result;
    }
}
?>
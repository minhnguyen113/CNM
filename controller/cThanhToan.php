<?php
include_once(__DIR__ . '/../model/mThanhToan.php');

class cThanhToan
{
    public function taoThanhToan($idDonHang, $phuongThuc, $soTien, $trangThai, $maGiaoDich)
    {
        $mThanhToan = new mThanhToan();
        return $mThanhToan->insert($idDonHang, $phuongThuc, $soTien, $trangThai, $maGiaoDich);
    }
    public function getPhuongThucByDonHang($idDonHang) {
        $mThanhToan = new mThanhToan();
        return $mThanhToan->getPhuongThucByDonHang($idDonHang);
    }
}
?>
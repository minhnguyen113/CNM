<?php
include_once(__DIR__ . '/../model/mChiTietNguyenLieu.php');

class ChiTietNguyenLieuController {
    private $model;

    public function __construct() {
        $this->model = new ChiTietNguyenLieuModel();
    }

    // Lấy chi tiết nguyên liệu của món ăn theo ID_MonAn
    public function getChiTietNguyenLieuByMonAn($idMonAn) {
        return $this->model->getChiTietNguyenLieuByMonAn($idMonAn);
    }

    // Cập nhật số lượng nguyên liệu trong kho khi đặt hàng
    public function updateNguyenLieuTonKho($idMonAn, $soLuongDat) {
        return $this->model->updateNguyenLieuTonKho($idMonAn, $soLuongDat);
    }
}
?> 
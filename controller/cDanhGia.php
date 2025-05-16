<?php
include_once(__DIR__ . '/../model/mDanhGia.php');

class DanhGiaController {
    private $model;

    public function __construct() {
        $this->model = new DanhGiaModel();
    }

    public function themDanhGia($idMonAn, $idUser, $soSao, $noiDung) {
        return $this->model->themDanhGia($idMonAn, $idUser, $soSao, $noiDung);
    }

    public function layDanhGiaTheoMonAn($idMonAn) {
        return $this->model->layDanhGiaTheoMonAn($idMonAn);
    }
    public function layTatCaDanhGia() {
        return $this->model->layTatCaDanhGia();
    }
    public function xoaDanhGia($id) {
        return $this->model->xoaDanhGia($id);
    }
}
?>
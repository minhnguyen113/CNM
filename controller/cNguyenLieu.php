<?php
include_once(__DIR__ . '/../model/mNguyenLieu.php');

class NguyenLieuController {
    private $model;

    public function __construct() {
        $this->model = new NguyenLieuModel();
    }

    // Lấy danh sách tất cả nguyên liệu
    public function getAllNguyenLieu() {
        return $this->model->getAllNguyenLieu();
    }

    // Lấy thông tin nguyên liệu theo ID
    public function getNguyenLieuById($id) {
        return $this->model->getNguyenLieuById($id);
    }

    // Thêm nguyên liệu mới
    public function addNguyenLieu($tenNguyenLieu, $donViTinh, $soLuongTon, $ghiChu) {
        return $this->model->addNguyenLieu($tenNguyenLieu, $donViTinh, $soLuongTon, $ghiChu);
    }

    // Cập nhật nguyên liệu
    public function updateNguyenLieu($id, $tenNguyenLieu, $donViTinh, $soLuongTon, $ghiChu) {
        return $this->model->updateNguyenLieu($id, $tenNguyenLieu, $donViTinh, $soLuongTon, $ghiChu);
    }

    // Xóa nguyên liệu
    public function deleteNguyenLieu($id) {
        return $this->model->deleteNguyenLieu($id);
    }
}
?> 
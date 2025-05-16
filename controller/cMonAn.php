<?php
include_once(__DIR__ . '/../model/mMonAn.php');

class MonAnController {
    public $model;

    public function __construct() {
        $this->model = new MonAn();
    }

    // Lấy danh sách tất cả món ăn (nếu cần dùng)
    public function getAllMonAn() {
        return $this->model->getAll();
    }

    // Lấy danh sách món ăn theo ID thực đơn
    public function getMonAnByThucDon($idThucDon) {
        return $this->model->getByThucDon($idThucDon);
    }

    // Lấy thông tin 1 món ăn theo ID
    public function getMonAnById($idMonAn) {
        return $this->model->getById($idMonAn);
    }

    // Thêm món ăn mới
    public function ControllerAddMonAn($tenMon, $gia, $idThucDon, $hinhAnh = '') {
        return $this->model->addMonAn($tenMon, $gia, $idThucDon, $hinhAnh);
    }
    
    

    // Sửa món ăn
    public function updateMonAn($idMonAn, $tenMon, $gia, $hinhAnh = null) {
        return $this->model->update($idMonAn, $tenMon, $gia, $hinhAnh);
    }

    // Xoá món ăn
    public function deleteMonAn($idMonAn) {
        return $this->model->delete($idMonAn);
    }
}
?>

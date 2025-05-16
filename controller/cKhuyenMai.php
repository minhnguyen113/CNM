<?php
include_once(__DIR__ . "/../model/mKhuyenMai.php");

class KhuyenMaiController {
    private $khuyenMaiModel;

    public function __construct() {
        $this->khuyenMaiModel = new KhuyenMaiModel();
    }

    // Lấy danh sách khuyến mãi
    public function getAllKhuyenMai() {
        return $this->khuyenMaiModel->getAllKhuyenMai();
    }

    // Thêm khuyến mãi mới
    public function addKhuyenMai($tenKM, $giamGia, $ngayBD, $ngayKT) {
        // Kiểm tra dữ liệu đầu vào
        if (empty($tenKM) || empty($giamGia) || empty($ngayBD) || empty($ngayKT)) {
            $_SESSION['error'] = "Vui lòng điền đầy đủ thông tin!";
            return false;
        }

        // Kiểm tra ngày
        if (strtotime($ngayKT) <= strtotime($ngayBD)) {
            $_SESSION['error'] = "Ngày kết thúc phải sau ngày bắt đầu!";
            return false;
        }

        $result = $this->khuyenMaiModel->addKhuyenMai($tenKM, $giamGia, $ngayBD, $ngayKT);
        if ($result) {
            $_SESSION['success'] = "Thêm khuyến mãi thành công!";
            return true;
        } else {
            $_SESSION['error'] = "Thêm khuyến mãi thất bại!";
            return false;
        }
    }

    // Lấy thông tin khuyến mãi theo ID
    public function getKhuyenMaiById($id) {
        return $this->khuyenMaiModel->getKhuyenMaiById($id);
    }

    // Cập nhật khuyến mãi
    public function updateKhuyenMai($id, $tenKM, $giamGia, $ngayBD, $ngayKT) {
        // Kiểm tra dữ liệu đầu vào
        if (empty($id) || empty($tenKM) || empty($giamGia) || empty($ngayBD) || empty($ngayKT)) {
            $_SESSION['error'] = "Vui lòng điền đầy đủ thông tin!";
            return false;
        }

        // Kiểm tra ngày
        if (strtotime($ngayKT) <= strtotime($ngayBD)) {
            $_SESSION['error'] = "Ngày kết thúc phải sau ngày bắt đầu!";
            return false;
        }

        $result = $this->khuyenMaiModel->updateKhuyenMai($id, $tenKM, $giamGia, $ngayBD, $ngayKT);
        if ($result) {
            $_SESSION['success'] = "Cập nhật khuyến mãi thành công!";
            return true;
        } else {
            $_SESSION['error'] = "Cập nhật khuyến mãi thất bại!";
            return false;
        }
    }

    // Xóa khuyến mãi
    public function deleteKhuyenMai($id) {
        if (empty($id)) {
            $_SESSION['error'] = "ID không hợp lệ!";
            return false;
        }

        $result = $this->khuyenMaiModel->deleteKhuyenMai($id);
        if ($result) {
            $_SESSION['success'] = "Xóa khuyến mãi thành công!";
            return true;
        } else {
            $_SESSION['error'] = "Xóa khuyến mãi thất bại!";
            return false;
        }
    }
} 
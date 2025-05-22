<?php
include_once(__DIR__ . '/../model/mDonHang.php');
include_once(__DIR__ . '/../model/mKhuyenMai.php');
include_once(__DIR__ . '/../model/mChiTietNguyenLieu.php');
include_once(__DIR__ . '/cChiTietNguyenLieu.php');

class DonHangController {
    private $model;
    private $chiTietNguyenLieuController;

    public function __construct() {
        $this->model = new DonHang();
        $this->chiTietNguyenLieuController = new ChiTietNguyenLieuController();
    }

    public function datHang($idUser, $idKhuyenMai = null) {
        if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) return false;

        $tongTien = 0;
        foreach ($_SESSION['cart'] as $item) {
            $tongTien += $item['gia'] * $item['soluong'];
        }

        // Áp dụng khuyến mãi
        if ($idKhuyenMai) {
            $kmModel = new KhuyenMaiModel();
            $giamGia = $kmModel->getGiamGia($idKhuyenMai);
            $tongTien *= (1 - $giamGia / 100);
        }

        // Bắt đầu transaction
        $this->model->conn->begin_transaction();
        
        try {
            $idDonHang = $this->model->createDonHang($tongTien, $idKhuyenMai, $idUser);

            foreach ($_SESSION['cart'] as $item) {
                // Thêm chi tiết đơn hàng
                $this->model->addChiTietDonHang($idDonHang, $item['id'], $item['soluong'], $item['gia']);
            }

            // Commit transaction
            $this->model->conn->commit();
            unset($_SESSION['cart']);
            return $idDonHang;
            
        } catch (Exception $e) {
            // Rollback nếu có lỗi
            $this->model->conn->rollback();
            throw $e;
        }
    }

    public function getAll() {
        return $this->model->getAll();
    }

    public function getChiTiet($id) {
        return $this->model->getChiTiet($id);
    }

    public function getById($id) {
        return $this->model->getById($id);
    }

    public function updateTrangThai($idDonHang, $trangThai) {
        $result = $this->model->updateTrangThai($idDonHang, $trangThai);

        // Chỉ trừ kho khi chuyển sang trạng thái xác nhận hoặc thanh toán
        if ($result && in_array($trangThai, ['Đã xác nhận', 'Đã thanh toán'])) {
            $chiTietDonHang = $this->model->getChiTiet($idDonHang);
            foreach ($chiTietDonHang as $ct) {
                $this->chiTietNguyenLieuController->updateNguyenLieuTonKho(
                    $ct['ID_MonAn'],
                    $ct['SoLuongMon']
                );
            }
        }
        return $result;
    }

    public function getByUser($idUser) {
        return $this->model->getByUser($idUser);
    }

    public function deleteDonHang($idDonHang) {
        return $this->model->deleteDonHang($idDonHang);
    }

    // Xác nhận đơn hàng và trừ nguyên liệu
    public function xacNhanDonHang($idDonHang) {
        try {
            // Lấy chi tiết đơn hàng
            $chiTietDonHang = $this->model->getChiTiet($idDonHang);
            
            // Trừ nguyên liệu cho từng món trong đơn hàng
            foreach ($chiTietDonHang as $ct) {
                $this->chiTietNguyenLieuController->updateNguyenLieuTonKho(
                    $ct['ID_MonAn'],
                    $ct['SoLuongMon']
                );
            }
            
            // Cập nhật trạng thái đơn hàng
            return $this->model->updateTrangThai($idDonHang, 'Đã xác nhận');
            
        } catch (Exception $e) {
            // Nếu có lỗi (ví dụ: không đủ nguyên liệu), cập nhật trạng thái đơn hàng thành "Hủy"
            $this->model->updateTrangThai($idDonHang, 'Hủy');
            throw $e;
        }
    }
}

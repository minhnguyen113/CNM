<?php
include_once(__DIR__ . '/../model/mDonHang.php');
include_once(__DIR__ . '/../model/mKhuyenMai.php');

class DonHangController {
    private $model;

    public function __construct() {
        $this->model = new DonHang();
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

        $idDonHang = $this->model->createDonHang($tongTien, $idKhuyenMai, $idUser);

        foreach ($_SESSION['cart'] as $item) {
            $this->model->addChiTietDonHang($idDonHang, $item['id'], $item['soluong'], $item['gia']);
        }

        unset($_SESSION['cart']);
        return $idDonHang;
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
        return $this->model->updateTrangThai($idDonHang, $trangThai);
    }
    public function getByUser($idUser) {
        return $this->model->getByUser($idUser);
    }

    public function deleteDonHang($idDonHang) {
        return $this->model->deleteDonHang($idDonHang);
    }
}

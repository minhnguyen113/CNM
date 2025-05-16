<?php
include_once(__DIR__ . '/../model/mThucDon.php');
include_once(__DIR__ . '/../model/mMonAn.php');

class ThucDonController {
    public $modelThucDon;
    private $modelMonAn;

    public function __construct() {
        $this->modelThucDon = new ThucDon();
        $this->modelMonAn = new MonAn();
    }

    public function getAllThucDon() {
        return $this->modelThucDon->getAll();
    }

    public function getThucDonById($id) {
        return $this->modelThucDon->getById($id);
    }

    public function getMonAnByThucDon($idThucDon) {
        return $this->modelMonAn->getByThucDon($idThucDon);
    }

    public function addMonAn($tenMon, $gia, $idThucDon) {
        return $this->modelMonAn->addMonAn($tenMon, $gia, $idThucDon);
    }

    public function deleteMonAn($idMonAn) {
        return $this->modelMonAn->delete($idMonAn);
    }

    public function updateMonAn($idMonAn, $tenMon, $gia) {
        return $this->modelMonAn->update($idMonAn, $tenMon, $gia);
    }
    public function addThucDon($ten, $mota) {
        return $this->modelThucDon->create($ten, $mota);
    }
    public function updateThucDon($id, $ten, $mota) {
        return $this->modelThucDon->update($id, $ten, $mota);
    }

    public function deleteThucDon($id) {
        return $this->modelThucDon->delete($id);
    }
}
?>

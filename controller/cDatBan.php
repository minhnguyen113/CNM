<?php
include_once(__DIR__ . '/../model/mDatBan.php');

class DatBanController {
    private $model;

    public function __construct() {
        $this->model = new DatBanModel();
    }

    public function getAll() {
        return $this->model->getAllDatBan();
    }

    public function getById($id) {
        return $this->model->getDatBanById($id);
    }

   // Bỏ tham số ID_Ban ở đây
   public function add($thoiGianDat, $idUser, $soLuong) {
    return $this->model->addDatBan($thoiGianDat, $idUser, $soLuong);
}


    

public function update($id, $idBan, $thoiGianDat, $idUser, $soLuong) {
    return $this->model->updateDatBan($id, $idBan, $thoiGianDat, $idUser, $soLuong);
}


    public function delete($id) {
        return $this->model->deleteDatBan($id);
    }
}
?>

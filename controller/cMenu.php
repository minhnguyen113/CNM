<?php
include_once(__DIR__ . '/../model/mMenu.php');

class MenuController
{
   
    private $model;

    public function __construct()
    {
        $this->model = new MenuModel(); // hoặc MonAnModel nếu bạn tách riêng
    }

    public function getMonAnTheoThucDon($id_thuc_don)
    {
        return $this->model->getMonAnByThucDon($id_thuc_don);
    }
}

?>

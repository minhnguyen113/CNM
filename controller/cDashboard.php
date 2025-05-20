<?php
include_once "../model/mDashboard.php";

class cDashboard
{
    private $model;

    public function __construct()
    {
        $this->model = new mDashboard();
    }

    // 1. Số lượt đặt bàn thành công theo tháng
    public function getDatBanPerMonth()
    {
        $data = $this->model->getDatBanPerMonth();
        echo json_encode($data);
    }

    // 2. Doanh thu theo tháng
    public function getDoanhThuPerMonth()
    {
        $data = $this->model->getDoanhThuPerMonth();
        echo json_encode($data);
    }

    // 3. Số lượng món ăn được bán theo tháng
    public function getMonAnBanPerMonth()
    {
        $data = $this->model->getMonAnBanPerMonth();
        echo json_encode($data);
    }

    // 4. Top 5 món ăn bán chạy
    public function getTop5MonAn()
    {
        $data = $this->model->getTop5MonAnBanChay();
        echo json_encode($data);
    }

    // 5. Tổng quan biểu đồ kết hợp (bookings, doanh thu, số món)
    public function getTongQuan()
    {
        $data = $this->model->getTongQuanDashboard();
        echo json_encode($data);
    }

    // 6. Top 5 thực đơn bán chạy nhất
    public function getTop5ThucDon()
    {
        $data = $this->model->getTop5ThucDonBanChay();
        echo json_encode($data);
    }
}

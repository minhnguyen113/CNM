<?php
header("Content-Type: application/json");
require_once "../controller/cDashboard.php";

$dashboard = new cDashboard();

$action = $_GET['action'] ?? '';

switch ($action) {
    case 'datban':
        $dashboard->getDatBanPerMonth();
        break;
    case 'doanhthu':
        $dashboard->getDoanhThuPerMonth();
        break;
    case 'monan':
        $dashboard->getMonAnBanPerMonth();
        break;
    case 'topmon':
        $dashboard->getTop5MonAn();
        break;
    case 'tongquan':
        $dashboard->getTongQuan();
        break;
    case 'topthucdon':
        $dashboard->getTop5ThucDon();
        break;
    default:
        echo json_encode(['error' => 'Không tìm thấy action hợp lệ']);
        break;
}
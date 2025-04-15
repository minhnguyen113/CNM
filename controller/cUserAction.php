<?php
include_once "../model/UserModel.php";
include_once "./cUser.php";

if (isset($_GET['action']) && $_GET['action'] === 'deleteUser' && isset($_GET['id'])) {
    $controller = new UserController();
    $result = $controller->StaffDeleteUser($_GET['id']);

    if ($result) {
        echo json_encode(['status' => 'success', 'message' => 'Xoá nhân viên thành công!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Xoá thất bại hoặc không tìm thấy nhân viên!']);
    }
    exit;
}

<?php
session_start();
include_once('../../controller/cChat.php');

if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    exit('Chưa đăng nhập');
}

$chatCtrl = new ChatController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $other_id = intval($_POST['other_id'] ?? 0);

    if ($action === 'send' && !empty($_POST['message'])) {
        $msg = trim($_POST['message']);
        $chatCtrl->sendMessage($_SESSION['user_id'], $other_id, $msg);
        exit('OK');
    }

    if ($action === 'fetch') {
        $messages = $chatCtrl->getChatHistory($_SESSION['user_id'], $other_id);
        header('Content-Type: application/json');
        echo json_encode($messages);
        exit;
    }

    // Lấy danh sách khách hàng đã chat và số tin nhắn chưa đọc
    if ($action === 'list_customers') {
        include_once('../../model/Connect.php');
        $db = new ketnoi();
        $conn = $db->Moketnoi();
        $admin_id = $_SESSION['user_id'];
        $sql = "SELECT 
                    nguoidung.ID_User, nguoidung.TenUser,
                    SUM(CASE WHEN tinnhan.receiver_id = $admin_id AND tinnhan.is_read = 0 THEN 1 ELSE 0 END) as unread
                FROM tinnhan
                JOIN nguoidung ON (tinnhan.sender_id = nguoidung.ID_User OR tinnhan.receiver_id = nguoidung.ID_User)
                WHERE nguoidung.ID_Role = 3 AND (tinnhan.sender_id = $admin_id OR tinnhan.receiver_id = $admin_id)
                GROUP BY nguoidung.ID_User, nguoidung.TenUser
                HAVING nguoidung.ID_User != $admin_id
                ORDER BY MAX(tinnhan.created_at) DESC";
        $result = mysqli_query($conn, $sql);
        $list = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $list[] = $row;
        }
        echo json_encode($list);
        exit;
    }
}
http_response_code(400);
exit('Yêu cầu không hợp lệ');
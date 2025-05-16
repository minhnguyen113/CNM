<?php
include_once(__DIR__ . "/Connect.php");

class ChatModel
{
    private $conn;

    public function __construct()
    {
        $db = new ketnoi();
        $this->conn = $db->Moketnoi();
    }

    // Gửi tin nhắn
    public function sendMessage($sender_id, $receiver_id, $message)
    {
        $message = mysqli_real_escape_string($this->conn, $message);
        $sql = "INSERT INTO tinnhan (sender_id, receiver_id, message) VALUES ('$sender_id', '$receiver_id', '$message')";
        return mysqli_query($this->conn, $sql);
    }

    // Lấy lịch sử chat giữa 2 người
    public function getChatHistory($user1, $user2)
    {
        $sql = "SELECT tinnhan.*, nguoidung.TenUser as sender_name
                FROM tinnhan
                JOIN nguoidung ON tinnhan.sender_id = nguoidung.ID_User
                WHERE (sender_id = '$user1' AND receiver_id = '$user2')
                   OR (sender_id = '$user2' AND receiver_id = '$user1')
                ORDER BY created_at ASC";
        $result = mysqli_query($this->conn, $sql);
        $messages = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $messages[] = $row;
        }
        return $messages;
    }

    // Đánh dấu đã đọc
    public function markAsRead($sender_id, $receiver_id)
    {
        $sql = "UPDATE tinnhan SET is_read = 1 WHERE sender_id = '$sender_id' AND receiver_id = '$receiver_id' AND is_read = 0";
        return mysqli_query($this->conn, $sql);
    }
}
?>
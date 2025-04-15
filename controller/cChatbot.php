<?php
include_once(__DIR__ . "/../model/mChatbot.php");

class ChatbotController
{
    public function xuLyYeuCauChat()
    {
        header('Content-Type: application/json');

        // Kiểm tra nếu có dữ liệu từ phía client gửi lên
        if (isset($_POST['message'])) {
            $model = new ChatbotModel();

            // B1: Lấy câu hỏi gốc từ người dùng
            $cauHoiGoc = trim($_POST['message']);

            // B2: Tách từ khóa thông minh từ câu hỏi
            $tuKhoa = $model->tachTuKhoa($cauHoiGoc);

            // B3: Tìm món ăn theo từ khóa đã tách
            $ketQua = $model->timMonAn($tuKhoa);

            // B4: Nếu không có kết quả thì lấy món ăn gợi ý
            if (empty($ketQua)) {
                $ketQua = $model->layMonAnGoiY();
            }

            // B5: Trả kết quả JSON về cho frontend
            echo json_encode([
                'success' => true,
                'data' => $ketQua
            ]);
        } else {
            // Trường hợp không nhận được dữ liệu
            echo json_encode([
                'success' => false,
                'message' => 'Không nhận được tin nhắn từ client.'
            ]);
        }
    }
}

// Khởi tạo controller và xử lý yêu cầu
$chatbotController = new ChatbotController();
$chatbotController->xuLyYeuCauChat();
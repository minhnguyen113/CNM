<?php
include_once(__DIR__ . "/../model/mChatbot.php");

class ChatbotController
{
    public function xuLyYeuCauChat()
    {
        header('Content-Type: application/json');

        if (isset($_POST['message'])) {
            $model = new ChatbotModel();
            $message = trim($_POST['message']);

            $response = $model->xuLyCauHoi($message);

            echo json_encode([
                'success' => true,
                'type' => $response['type'],
                'data' => $response['data'] ?? [],
                'message' => $response['message'] ?? ''
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Không nhận được tin nhắn từ client.'
            ]);
        }
    }
}

$chatbotController = new ChatbotController();
$chatbotController->xuLyYeuCauChat();

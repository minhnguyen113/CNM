<?php
include_once(__DIR__ . '/../model/mChat.php');

class ChatController
{
    private $chatModel;

    public function __construct()
    {
        $this->chatModel = new ChatModel();
    }

    public function sendMessage($sender_id, $receiver_id, $message)
    {
        return $this->chatModel->sendMessage($sender_id, $receiver_id, $message);
    }

    public function getChatHistory($user1, $user2)
    {
        return $this->chatModel->getChatHistory($user1, $user2);
    }

    public function markAsRead($sender_id, $receiver_id)
    {
        return $this->chatModel->markAsRead($sender_id, $receiver_id);
    }
}
?>
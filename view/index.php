<?php
// Tự động chuyển hướng tới thư mục customer
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_SESSION['role_id'])) {
    if ($_SESSION['role_id'] == 1 || $_SESSION['role_id'] == 2) {
        header("Location: admin/index.php");
        exit();
    } elseif ($_SESSION['role_id'] == 3) {
        header("Location: customer/index.php");
        exit();
    }
} else {
    // Nếu chưa đăng nhập thì chuyển về trang login (hoặc giữ nguyên giao diện public)
    header("Location: customer/login.php");
    exit();
}


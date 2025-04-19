<?php
// Tự động chuyển hướng tới thư mục customer
session_start();

if ($_SESSION['role_id'] == 1 || $_SESSION['role_id'] == 2) {
    // Nếu là admin thì chuyển hướng tới trang admin
    header("Location: admin/index.php");
    exit();
} elseif ($_SESSION['role_id'] == 3) {
    // Nếu là khách hàng thì chuyển hướng tới trang khách hàng
    header("Location: customer/index.php");
    exit();
}


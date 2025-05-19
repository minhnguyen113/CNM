<?php
session_start();
include_once("../../controller/cThanhToan.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['idDonHang'])) {
        $_SESSION['idDonHang'] = $_POST['idDonHang'];
    }
    $cThanhToan = new cThanhToan();
    $cThanhToan->confirm_vnpay();
} else {
    header('Location: payment.php');
    exit;
}
?> 
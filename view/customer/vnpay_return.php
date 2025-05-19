<?php
session_start();
include_once("../../controller/cThanhToan.php");
include_once("../../controller/cDonHang.php");

$vnp_HashSecret = "BYKJBHPPZKQMKBIBGGXIYKWYFAYSJXCW"; //Secret key
$vnp_SecureHash = $_GET['vnp_SecureHash'];
$vnp_ResponseCode = $_GET['vnp_ResponseCode'];
$vnp_TxnRef = $_GET['vnp_TxnRef'];
$vnp_Amount = $_GET['vnp_Amount']/100; // Số tiền * 100
$vnp_OrderInfo = $_GET['vnp_OrderInfo'];
$vnp_BankCode = $_GET['vnp_BankCode'];
$vnp_PayDate = $_GET['vnp_PayDate'];
$vnp_TransactionNo = $_GET['vnp_TransactionNo'];
$vnp_TransactionStatus = $_GET['vnp_TransactionStatus'];

$inputData = array();
foreach ($_GET as $key => $value) {
    if (substr($key, 0, 4) == "vnp_") {
        $inputData[$key] = $value;
    }
}
unset($inputData['vnp_SecureHash']);
ksort($inputData);
$i = 0;
$hashData = "";
foreach ($inputData as $key => $value) {
    if ($i == 1) {
        $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
    } else {
        $hashData = urlencode($key) . "=" . urlencode($value);
        $i = 1;
    }
}

$secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

if ($secureHash == $vnp_SecureHash) {
    if ($vnp_ResponseCode == '00') {
        // Thanh toán thành công
        $cThanhToan = new cThanhToan();
        $cDonHang = new DonHangController();
        
        // Lấy ID đơn hàng từ session
        $idDonHang = $_SESSION['idDonHang'] ?? null;
        
        if ($idDonHang) {
            // Cập nhật trạng thái thanh toán
            $cThanhToan->taoThanhToan(
                $idDonHang,
                'VNPAY',
                $vnp_Amount,
                'Đã thanh toán',
                $vnp_TransactionNo
            );
            
            // Cập nhật trạng thái đơn hàng
            $cDonHang->updateTrangThai($idDonHang, 'Đã thanh toán');
            
            // Xóa session
            unset($_SESSION['idDonHang']);
            
            echo "<script>
                alert('Thanh toán thành công!');
                window.location='menu.php';
            </script>";
        } else {
            echo "<script>
                alert('Không tìm thấy đơn hàng!');
                window.location='menu.php';
            </script>";
        }
    } else {
        echo "<script>
            alert('Thanh toán không thành công. Mã lỗi: " . $vnp_ResponseCode . "');
            window.location='payment.php';
        </script>";
    }
} else {
    echo "<script>
        alert('Chữ ký không hợp lệ!');
        window.location='payment.php';
    </script>";
}
?> 
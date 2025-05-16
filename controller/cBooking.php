<?php
include_once(__DIR__ . "/../model/mBooking.php");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include_once(__DIR__ . "/../model/mBooking.php");

class cDatBan {
    // Hàm xử lý khi đặt bàn
    public function xuLyTaoBanVaDatBan() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['book_table'])) {
            // Kiểm tra đăng nhập
            if (!isset($_SESSION['user_id'])) {
                echo "<script>alert('⚠️ Bạn chưa đăng nhập!'); window.location.href='login.php';</script>";
                exit;
            }
    
            // Lấy dữ liệu từ form
            $idUser = $_SESSION['user_id'];
            $thoiGian = $_POST['bookingTime'] ?? '';
            $soLuong = $_POST['tableCount'] ?? 1;
            $tenBan = $_POST['ten_ban'] ?? 'Bàn đặt tự động';
            $soChoNgoi = $_POST['so_cho'] ?? 2;
            $prefix = $_POST['prefix'] ?? 'X';
    
            // Kết nối DB
            include_once "../model/Connect.php";
            $model = new mDatBan();
    
            // Đếm số bàn đã tạo theo loại prefix (VD: 'N', 'V'...)
            $soThuTu = $model->demBanTheoLoai($prefix);
    
            // ✅ GIỚI HẠN: Tối đa 50 bàn mỗi loại
            if ($soThuTu >= 50) {
                echo "<script>
                    alert('❌ Đã hết bàn mất rồi, bạn vui lòng đặt loại bàn khác nhé \"$prefix\"! Vui lòng chọn loại khác.');
                    window.location.href='book.php';
                </script>";
                exit;
            }
    
            // Tạo mã vị trí mới (N01, V02, ...)
            $maViTri = $prefix . str_pad($soThuTu + 1, 2, "0", STR_PAD_LEFT);
    
            // Thực hiện lưu vào DB
            $result = $model->taoBanVaDatBan($tenBan, $soChoNgoi, $maViTri, $thoiGian, $idUser, $soLuong);
    
            // Phản hồi
            if ($result) {
                echo "<script>
                    alert('✅ Đặt bàn thành công! Nhà hàng sẽ giữ chỗ cho bạn trong vòng 10 phút. Bạn nhớ đến sớm nhé!');
                    window.location.href='book.php';
                </script>";
            } else {
                echo "<script>alert('❌ Lỗi đặt bàn!'); window.location.href='book.php';</script>";
            }
        }
    }
    

    // Hàm lấy lịch sử đặt bàn
    public function layLichSu() {
        if (!isset($_SESSION['user_id'])) {
            echo "<script>alert('⚠️ Bạn chưa đăng nhập!'); window.location.href='login.php';</script>";
            exit;
        }

        $idUser = $_SESSION['user_id'];
        $model = new mDatBan();
        return $model->getLichSuDatBan($idUser);
    }
}
?>

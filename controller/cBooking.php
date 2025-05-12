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

            // Tạo mã vị trí mới (N01, V02, ...)
            $soThuTu = $model->demBanTheoLoai($prefix); // ví dụ: 2
            $maViTri = $prefix . str_pad($soThuTu + 1, 2, "0", STR_PAD_LEFT); // N03

            // Thực hiện lưu vào DB
            $result = $model->taoBanVaDatBan($tenBan, $soChoNgoi, $maViTri, $thoiGian, $idUser, $soLuong);

            // Phản hồi
            if ($result) {
                echo "<script>
                    alert('✅ Đặt bàn thành công! Nhà hàng sẽ giữ chỗ cho bạn trong vòng 10 phút. Bạn nhớ đến sớm nhé!');
                    window.location.href='book.php';
                </script>";
            } else {
                echo "<script>alert('❌ Lỗi đặt bàn!');</script>";
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

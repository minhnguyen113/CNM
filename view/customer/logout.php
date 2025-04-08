<?php
session_start();
session_unset(); // Xóa tất cả các biến session
session_destroy(); // ✅ Khuyến nghị thêm để huỷ session hoàn toàn

header("Location: ../index.php"); // ✅ Đúng theo yêu cầu của bạn
exit();
?>